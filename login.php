<?php
    require 'models/redirect_functions.php';
    require( 'models/db_functions.php' );
    if ( isset( $_SESSION[ 'userid' ] ) ) {
        //User has logged in, Redirect to index.php
        redirectFromLogin( $_GET );
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
                redirectFromLogin( $_GET );
            }
        }
    }
?>


