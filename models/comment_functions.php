<?php 
    require "models/connect.php";

    // adds a comment to the book specified by the bcid and saves the user who authored the comment
    // returns true on succes false on failure
    function addBookComment($comment, $authorid, $bcid  ) {
        global $db ;
        $sql_query = "INSERT INTO `bcopycomments` SET authorid = ? , comment = ? , bcid = ? ";
        $stmt = mysqli_prepare( $db , $sql_query);
        var_dump($stmt);
        mysqli_stmt_bind_param($stmt ,"isi", $authorid , $comment , $bcid ) ;
        mysqli_stmt_execute ($stmt);
        if (mysqli_affected_rows($db ) ) {
            return true ;
        }
        return false ;
    }
    
    //adds a comment to the specified profile by the profileid and saves the user who authored the comment 
    // returns true on success or false on failure 
    function addProfileComment($comment, $authorid, $profileid ) {
        global $db;
        $sql_query = "INSERT INTO `profilecomments` SET authorid = ? , comment = ? , profileid = ? ";
        $stmt = mysqli_prepare ( $db , $sql_query);
        mysqli_stmt_bind_param ( $stmt,'isi', $authorid, $comment, $profileid );
        mysqli_stmt_execute( $stmt );
        if (mysqli_affected_rows( $db ) ) {
            return true ;
        }
        return false ;
    }
    
    //Gets the comments of a spefic book copy and returns them sorted by timestamp , on failure/nocomments returns false
    function getBcopyComments ( $bcid ) {
        global $db;
        $sql_query = "SELECT `comment` , `authorid` FROM `bcopycomments` WHERE bcid = ? " ;
        $stmt = mysqli_prepare ( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt,'i',$bcid );
        mysqli_stmt_execute ( $stmt );
        mysqli_stmt_bind_result ( $stmt, $comment, $authorid );
        $i=0;
        while (mysqli_stmt_fetch( $stmt ) ) {
            $array [$i] ['comment'] = $comment ;
            $array [$i] ['authorid']= $authorid;
            $i++;
        }
        if ( empty( $array ) ) {
            return false ;
        }
        return $array ;
    }
    // Gets the comments of a specfic profile and returns them sorted by timestamp , on failure/no comments returns false
    function getProfileComments ( $profileid ) {
        global $db;
        $sql_query = "SELECT `comment` , `authorid` FROM `profilecomments` WHERE profileid = ? " ;
        $stmt = mysqli_prepare ( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt,"i", $profileid );
        mysqli_stmt_execute ( $stmt );
        mysqli_stmt_bind_result ( $stmt, $comment, $authorid );
        $i=0;
        while (mysqli_stmt_fetch( $stmt ) ) {
            $array[$i]['comment'] = $comment ;
            $array[$i]['authorid']= $authorid;
            $i++;
        }
        if ( empty( $array ) ) {
            return false ;
        }
        return $array ;
    }
    
?>

