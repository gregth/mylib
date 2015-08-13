<?php
    require 'models/connect.php';
    require 'models/validation_functions.php';
    require 'models/user_functions.php';

    if ( isset( $_SESSION ) ) {
        $emailError = '';
        $imageError = '';
        if ( !empty( $_POST['newemail'] ) ) {
            $valid = validateEmail( $_POST[ 'newemail' ] );
            if ( $valid ) {
                $success = updateEmail( $_POST[ 'newemail' ], $_SESSION[ 'userid' ] );
                if( !$success ) {
                    $emailError = 'το E-mail';
                }
            }
            else {
                $emailError = 'το E-mail';
            }
        }
        if ( !empty( $_FILES[ 'newimg' ] ) ) {
            $path = imageUpload ( 'data/profile_imgs/', 'newimg'  );
            $success = false;
            if ( $path ) {
                $success = imageUpdate ($path, $_SESSION[ 'userid' ] );
            }
            if ( !$success ) {
                $imageError = 'την Εικόνα';
            }
        }
        if ( $emailError||$imageError ) {
            echo "Προσπαθήστε ξάνα υπήρξε πρόβλημα με : $emailError $imageError ";
        }
        else {
            echo 'Ολοκληρώθηκε.';
        }
    }
?>
