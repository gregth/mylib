<?php
    //function to upload files , returns file path on success and false on failure
    //TODO security checks
    function imageUpload( $directory, $key ) {
        if (!empty( $_FILES ) ) {
            $filename = $_FILES[ $key ][ 'tmp_name' ];
            $path = $directory . $_FILES [ $key ][ 'name' ];
            $success = move_uploaded_file( $filename, $path );
            if ( $success ) {
                return $path;
            }
            else {
                return false;
            }
        }
        return false;
    }


    //updates profile  in users table , returns false on failure
    function imageUpdate( $path, $uid ) {
        global $db;
        $sql_query = "UPDATE users SET profileimg = ? WHERE uid = ? ";
        $stmt = mysqli_prepare( $db , $sql_query);
        mysqli_stmt_bind_param($stmt, "si", $path, $uid ) ;
        mysqli_stmt_execute ( $stmt );
        if (mysqli_affected_rows( $db ) ) {
            return true ;
        }
        return false ;

    }
?>
