<?php
    require 'models/connect.php';
    require 'models/transactions.php';
    require 'models/redirect.php';
    require 'models/show_bookcp_functions.php';

    //Check if user is logged in
    if ( !isset( $_SESSION[ 'userid' ] ) ) {
        standardRedirect( 'login.php', [ 'red' => 'request' ], [ 'bcid' ] );
    }

    //Check for empry bcid
    if ( empty( $_GET[ 'bcid' ] ) ) {
        standardRedirect( 'index.php' );
    }

    //Check if bcid exists
    if ( !( $res = validateBcopy( $_GET[ 'bcid' ] ) ) ) {
        standardRedirect( 'index.php' );
    }

    //A user can not request his own book
    if ( $res == $_SESSION[ 'userid' ] ) {
        $result = 'Αυτό το αντίτυπο ανήκει ήδη σε εσάς.';
    }
    //A user can request a book only once
    else if ( hasRequested( $_SESSION[ 'userid' ], $_GET[ 'bcid' ] ) ) {
        $result = 'Έχετε ήδη ζητήσει το βιβλίο';
    }
    else {
        requestBook( $_SESSION[ 'userid' ], $_GET[ 'bcid' ] );
        $result = 'Ο κάτοχος του βιβλίου έλαβε το αίτημα σας για το βιβλίο.';
    }
    require 'views/header.php';
    require 'views/result.php';
    require 'views/header.php';
?>
