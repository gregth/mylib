<?php 
    require "models/connect.php";


    // adds a comment to the book specified by the bcid and saves the user who authored the comment
    // returns true on succes false on failure
    function addBookComment($comment, $authorid, $bcid  ) {
        global $db ;
        $sql_query = "INSERT INTO `bookcpcomments` SET authorid = ? , comment = ? , bcid = ? ";
        $stmt = mysqli_prepare( $db , $sql_query);
        mysqli_stmt_bind_param($stmt , $authorid , $comment , $bcid );
        mysqli_stmt_execute ($stmt);
        if (mysqli_affected_rows($ db ) ) {
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
        mysqli_stmt_bind_param ( $stmt, $authorid, $comment, $profileid );
        mysqli_stmt_execute( $stmt );
        if (mysqli_affected_rows( $db ) ) {
            return true ;
        }
        return false ;
    }



?>

