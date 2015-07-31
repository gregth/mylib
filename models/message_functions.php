<?php
//gets unseen messages that the user has received and returns an array with the senter id and username , on failure returns false
    function getNewMessages ( $uid ) {
        global $db;
        $sql_query = "SELECT  senterid, username
            FROM messages CROSS 
            JOIN users ON users.uid = messages.senterid 
            WHERE receiverid = ? AND seen = 0
            GROUP BY username" ;
        $stmt = mysqli_prepare ( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt, "i", $uid );
        mysqli_stmt_execute ( $stmt );
        mysqli_stmt_bind_result ( $stmt, $senterid, $username );
        $i=0;
        while (mysqli_stmt_fetch( $stmt ) ) {
            $array[ $i ][ 'senterid' ] = $senterid ;
            $array[ $i ][ 'username' ] = $username;
            $i++;
        }
        if ( empty( $array ) ) {
            return false ;
        }
        return $array ;
    }


    

//add a message to the message table keeps track of metadata , on succes returns true , on failure returns false
    function sendMessage( $message, $senterid, $receiverid  ) {
        global $db ;
        $sql_query = "INSERT INTO messages SET senterid = ? , message = ? , receiverid = ? ,seen = 0";
        $stmt = mysqli_prepare( $db , $sql_query);
        mysqli_stmt_bind_param($stmt, "isi", $senterid, $message, $receiverid ) ;
        mysqli_stmt_execute ( $stmt );
        if (mysqli_affected_rows( $db ) ) {
            return true ;
        }
        return false ;

    }

//gets the messages exchanged by the two users and returns them in an array , on failure returns false
    function getUserMessages ( $uid, $discussant ) {
        global $db;
        $sql_query = "SELECT  mid, message , username, seen, time, senterid 
            FROM messages CROSS 
            JOIN users ON users.uid = messages.senterid 
            WHERE (receiverid = ? AND senterid = ?) OR (senterid = ? AND receiverid = ?) ORDER BY time DESC" ;
        $stmt = mysqli_prepare ( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt, "iiii", $uid, $discussant, $uid, $discussant );
        mysqli_stmt_execute ( $stmt );
        mysqli_stmt_bind_result ( $stmt, $mid, $message, $senter, $seen, $time, $senterid );
        $i=0;
        while (mysqli_stmt_fetch( $stmt ) ) {
            $array[ $i ][ 'mid' ] = $mid ;
            $array[ $i ][ 'message' ] = $message ;
            $array[ $i ][ 'senter' ] = $senter;
            $array[ $i ][ 'seen' ] = $seen;
            $array[ $i ][ 'time' ] = $time;
            $array[ $i ][ 'senterid' ] = $senterid ;
            $i++;
        }
        if ( empty( $array ) ) {
            return false ;
        }
        return $array ;
    }

//updates the seen value to 1 when the message is seen by the receiver , on failure returns false on success returbs true
    function messageSeen( $mid ) {
        global $db ;
        $sql_query = "UPDATE messages SET seen = 1 WHERE mid = ?";
        $stmt = mysqli_prepare( $db , $sql_query);
        mysqli_stmt_bind_param($stmt, "i", $mid ) ;
        mysqli_stmt_execute ( $stmt );
        if (mysqli_affected_rows( $db ) ) {
            return true ;
        }
        return false ;

    }





?>
