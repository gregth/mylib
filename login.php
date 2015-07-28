<?php
    require 'models/connect.php';
    require 'models/redirect.php';
    require 'models/user_functions.php';
    $title = 'Σύνδεση Χρήστη';
    if ( isset( $_SESSION[ 'userid' ] ) ) {
        //User has logged in, Redirect to index.php
        standardRedirect('profiler.php', [ 'uid' => $_SESSION[ 'userid' ] ] );
    }
    else {
        if ( empty( $_POST ) ) {
            //Show login form
            require 'views/header.php';
            require 'views/login_form.php';
            require 'views/footer.php';
        }
        else {
            //Authenticate user
            $user = authenticate_user( $_POST );
            if ( $user === false ) {
                require 'views/header.php';
                require 'views/login_errors.php';
                require 'views/login_form.php';
                require 'views/footer.php';
            }
            else {
                foreach ( $user as $key => $value ) {
                    $_SESSION[ $key ] = $value;
                }
                dynamicRedirect( 'index.php' );
            }
        }
    }
?>


