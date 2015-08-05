<?php
    //Inserts a request into requests table.
    //$uid is the id of the user who makes hte request
    function requestBook( $userid, $bcid ) {
        global $db;
        $query = 'INSERT
            INTO
                requests
            SET
                uid = ?,
                bcid = ?
            ';
        $stmt = mysqli_prepare( $db, $query );
        mysqli_stmt_bind_param( $stmt, 'ii', $userid, $bcid );
        mysqli_stmt_execute( $stmt );
        if ( mysqli_affected_rows( $db ) ) {
            return true;
        }
        return false;
    }

    //Counts the requests made from a certain user for a certain book copy.
    function countRequests( $uid, $bcid ) {
        global $db;
        $query =
            'SELECT
                COUNT( * )
            FROM
                requests
            WHERE
                uid = ? AND
                bcid = ?
            ';
        $stmt = mysqli_prepare( $db, $query );
        mysqli_stmt_bind_param( $stmt, 'ii', $uid, $bcid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $num );
        mysqli_stmt_fetch( $stmt );
        return $num;

    }

    function hasRequested( $uid, $bcid ) {
        return countRequests( $uid, $bcid ) > 0;
    }

    function giveBook( $receiverId, $bcid ) {
        global $db;
        $query =
            'UPDATE
                bcopies
            SET
                given = 1,
                receiverid = ?,
                timegiven = NOW()
            WHERE
                bcid = ?
            ';
        $stmt = mysqli_prepare( $db, $query );
        mysqli_stmt_bind_param( $stmt, 'ii', $receiverId, $bcid );
        mysqli_stmt_execute( $stmt );
        if ( mysqli_affected_rows( $db ) == 1 ) {
            return true;
        }
        return false;
    }

    function getRequestsToUser( $uid ) {
        global $db;
        $query =
            'SELECT
                requests.uid,
                UNIX_TIMESTAMP( requests.time ),
                users.username,
                requests.bcid,
                books.title
            FROM
               requests CROSS
               JOIN bcopies ON requests.bcid = bcopies.bcid CROSS
               JOIN users ON users.uid = requests.uid CROSS
               JOIN books ON books.bid = bcopies.bid
            WHERE
                bcopies.uid = ?
            ORDER BY
                requests.time DESC
            ';
        $stmt = mysqli_prepare( $db, $query );
        mysqli_stmt_bind_param( $stmt, 'i', $uid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $uid, $time, $username, $bcid, $title );
        $requests = [];
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $req[ 'username' ] = $username;
            $req[ 'uid' ] = $uid;
            $req[ 'bcid' ] = $bcid;
            $req[ 'time' ] = $time;
            $req[ 'bcid' ] = $bcid;
            $req[ 'title' ] = $title;
            $requests[] = $req;
        }
        return $requests;
    }

    function getRequestsFromUser( $uid ) {
        global $db;
        $query =
            'SELECT
                bcopies.uid,
                UNIX_TIMESTAMP( requests.time ),
                users.username,
                requests.bcid,
                books.title
            FROM
               requests CROSS
               JOIN bcopies ON requests.bcid = bcopies.bcid CROSS
               JOIN users ON users.uid = bcopies.uid CROSS
               JOIN books ON books.bid = bcopies.bid
            WHERE
                requests.uid = ?
            ORDER BY
                requests.time DESC
            ';
        $stmt = mysqli_prepare( $db, $query );
        mysqli_stmt_bind_param( $stmt, 'i', $uid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $uid, $time, $username, $bcid, $title );
        $requests = [];
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $req[ 'owner' ][ 'username' ] = $username;
            $req[ 'owner' ][ 'uid' ] = $uid;
            $req[ 'bcid' ] = $bcid;
            $req[ 'time' ] = $time;
            $req[ 'bcid' ] = $bcid;
            $req[ 'title' ] = $title;
            $requests[] = $req;
        }
        return $requests;
    }
?>
