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
?>
