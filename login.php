<?php
    require 'models/connect.php';
    require 'models/redirect.php';
    require 'models/user_functions.php';
    $title = 'Σύνδεση Χρήστη';
    if ( isset( $_SESSION[ 'userid' ] ) ) {
        //User has logged in, Redirect to index.php
        standardRedirect('profiler.php', [ 'uid' => $_SESSION[ 'userid' ] ] );
    }

    if ( empty( $_POST ) ) {
        require 'views/header.php';
        require 'views/user/form_errors.php';
        require 'views/user/login_form.php';
        require 'views/footer.php';
    }
    else {
        //Authenticate user
        $user = authenticate_user( $_POST );
        if ( $user === false ) {
            $errors[] = 'Τα στοιχεία που δώσατε δεν είναι σωστά';
            require 'views/header.php';
            require 'views/user/form_errors.php';
            require 'views/user/login_form.php';
            require 'views/footer.php';
        }
        else {
            foreach ( $user as $key => $value ) {
                $_SESSION[ $key ] = $value;
            }
            dynamicRedirect( 'index.php' );
        }
    }
?>
