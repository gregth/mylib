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
            $value = authenticate_user( $_POST );
            if ( $value === false ) {
                require 'views/header.php';
                require 'views/login_errors.php';
                require 'views/login_form.php';
                require 'views/footer.php';
            }
            else {
                $_SESSION[ 'userid' ] = $value;
                redirectFromLogin( $_GET );
            }
        }
    }
?>


