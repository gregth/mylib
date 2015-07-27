<?php
    //Return true if data are valid, otherwise a messages array
    function validateBookCpData( $data ) {
        if ( empty( $data[ 'description' ] ) ) {
            $messages[] = 'Παρακαλούμε εισάγετε περιγραφή';
            return $messages;
        }
        else {
            return true;
        }
    }


    //insert bid description and user image url into the bcopies table , on failure return false
    function addBookCp( $getdata, $postdata ) {
        global $db;
        require 'image_upload.php';
        $description = $postdata[ 'description' ];
        $bid = $getdata[ 'bid' ];
        $path = imageUpload( 'data/user_images/', 'userImage' );
        $stmt = mysqli_prepare( $db, 'INSERT INTO bcopies SET bid = ?, uid = ?, description = ?,  image = ?, sold = 0 ' );
        mysqli_stmt_bind_param( $stmt,'iiss',  $bid ,$_SESSION[ 'userid' ], $description, $path );
        mysqli_execute( $stmt );
        $bcid = mysqli_insert_id( $db );
        $success = mysqli_affected_rows( $db );
        if ( $success ) {
            return true;
        }
        return false;
    }
?>
