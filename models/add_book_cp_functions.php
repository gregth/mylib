<?php
    //Return true if data are valid, otherwise a messages array
    //IMPORTANT: In if statement check with === true operator
    function validateBookCpData( $post, $files ) {
        if ( empty( $post [ 'description' ] ) ) {
            $messages[] = 'Παρακαλούμε εισάγετε περιγραφή';
        }
        if ( empty( $files[ 'bcopyimage' ][ 'name' ] ) ) {
            $messages[] = 'Παρακοαλούμε επιλέξτε εικόνα';
        }
        if ( empty( $messages ) ) {
            return true;
        }
        else return $messages;
    }


    //insert bid description and user image url into the bcopies table , on failure return false, on succes returns bcid
    function addBookCp( $getdata, $postdata ) {
        global $db;
        require 'image_upload.php';
        $description = $postdata[ 'description' ];
        $bid = $getdata[ 'bid' ];
        $path = imageUpload( 'data/bcopy_images/', 'bcopyimage' );
        $stmt = mysqli_prepare( $db, 'INSERT INTO bcopies SET bid = ?, uid = ?, description = ?,  image = ?, sold = 0 ' );
        mysqli_stmt_bind_param( $stmt,'iiss',  $bid ,$_SESSION[ 'userid' ], $description, $path );
        mysqli_execute( $stmt );
        $bcid = mysqli_insert_id( $db );
        $success = mysqli_affected_rows( $db );
        if ( $success ) {
            return $bcid;
        }
        return false;
    }
?>
