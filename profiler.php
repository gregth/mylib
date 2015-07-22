<?php
    require 'models/db_functions.php';
    // if note logged in , redirect to login page
    if ( !isset( $_SESSION[ 'userid' ] ) ) {
        header( 'Location: login.php' );
        die();
    }
    // get user data from db
    $data = getUserData( $_GET[ 'uid' ] );
    if ( !$data ) {
        header( 'Location: 404.php' );
        die();
    }
    require 'views/header.php';
    require 'views/profile.php';
    require 'views/footer.php';
?>
