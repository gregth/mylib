<?php
    require 'models/connect.php';
    require 'models/image_upload.php';
    if ( isset( $_SESSION ) ) {
        if ( !empty($_FILES[ 'newimg' ] ) ) {
            $path = imageUpload ( 'data/profile_imgs/', 'newimg'  );
            $success = false;
            if ($path ) {
                $success = imageUpdate ($path, $_SESSION[ 'userid' ] );
            }
            if ( $success ) {
                echo "Ολοκληρώθηκε";
                die();
            }
        }
    }
    echo "Προσπαθήστε ξανά";
    die();



?>
