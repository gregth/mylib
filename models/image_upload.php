<?php
    //function to upload files , returns file path on success and false on failure
    //TODO security checks
    function imageUpload( $file, $directory ) {
        if (!empty( $file ) ) {
            $filename = $file[ 'cover_img' ][ 'tmp_name' ];
            $path = $directory . $file [ 'cover_img' ][ 'name' ];
            $success = move_uploaded_file( $filename, $path );
            if ( $success ) {
                return $path;
            }
            else {
                return false;
            }
        }
    }
?>
