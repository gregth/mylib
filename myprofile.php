<?php
    session_start();
    if ( !isset( $_SESSION[ 'userid' ] ) ) {
        header( 'Location: login.php' );
    }
    else {
        require 'views/header.php';
        require 'views/profile_view.php';
        require 'views/footer.php';
    }
?>
