<?php
    require 'connect.php';
    //function to upload files , returns file path on success and false on failure
   //allages sto path wste na doulevei me to localhost
    //themata asfaleias
    function imageUploader( $file, $path ) {
        if (!empty( $_FILES ) ) {
            $filename = $file[ 'cover_img' ][ 'tmp_name' ];
            $path.= $file [ 'cover_img' ][ 'name' ];
            $success = move_uploaded_file( $filename, $path );
            if ( $success ) {
                return $file[ 'cover_img' ][ 'name' ];
            }
            else {
                return false;
            }
        }
    }
?>
