<?php
    if ( isset( $_SESSION ) ) {
        //User has logged in, Redirect to index.php
        header( 'Location: index.php' );
    }
    else {
        if ( empty( $_POST ) ) {
            //Show login form
            require 'views/header.php';
            require 'views/login_form.php';
            require 'views/footer.php';
        }
        else {
            require( 'models/db_functions' );
            //Authenticate user
            $value = authenticate_user( $_POST );
            if ( $value === false ) {
                require 'views/header.php';
                require 'views/login_error.php';
                require 'views/login_form.php';
                require 'views/footer.php';
            }
            else {
                session_start();
                $_SESSION[ 'uid' ] = $value;
                header( "Location: profile.php?$value" );
            }
        }
    }
?>


