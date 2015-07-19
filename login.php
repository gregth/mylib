<?php
    if ( isset( $_SESSION[ 'userid' ] ) ) {
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
            require( 'models/db_functions.php' );
            //Authenticate user
            $value = authenticate_user( $_POST );
            if ( $value === false ) {
                require 'views/header.php';
                require 'views/login_errors.php';
                require 'views/login_form.php';
                require 'views/footer.php';
            }
            else {
                session_start();
                $_SESSION[ 'userid' ] = $value;
                header( "Location: index.php" );
            }
        }
    }
?>


