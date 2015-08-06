<?php
    require 'models/connect.php';
    require 'models/redirect.php';

    //If user has logged in, redirect to index.php
    if ( isset( $_SESSION[ 'userid' ] ) ) {
        header( 'Location: index.php'  );
    }

    //User has not logged in, dhow register form
    if ( !empty( $_POST ) ) {
        include 'models/user_functions.php';
        include 'models/validation_functions.php';

        //get data errors returns a table with all errors
        $errors = getDataErrors($_POST);
        // if there are no errors continue with the reg
        if ( empty ( $errors ) ) {
            //insert user info to database
            $result = register_user( $_POST );
            if ( $result !== false ) {
                $user = getUserData( $result );
                foreach ( $user as $key => $value ) {
                    $_SESSION[ $key ] = $value;
                }
                standardRedirect( 'index.php' );
            }
            else {
                $errors[] = 'Προέκυψε σοβαρό σφάλμα, παρακαλούμε προσπαθήστε αργότερα.';
                require 'views/header.php';
                require 'views/form_errors.php';
                require 'views/register_form.php';
                require 'views/footer.php';
            }
        }
        else {
            //Include view that parses errors and form view
            require 'views/header.php';
            require 'views/form_errors.php';
            require 'views/register_form.php';
            require 'views/footer.php';
        }
    }
    else {
            require 'views/header.php';
            require 'views/register_form.php';
            require 'views/footer.php';
    }

?>
