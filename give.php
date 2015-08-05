<?php
    require 'models/connect.php';
    require 'models/transactions.php';
    require 'models/redirect.php';
    require 'models/show_bookcp_functions.php';

    if ( !isset( $_SESSION[ 'userid' ] ) ) {
        standardRedirect( 'login.php', [ 'red' => 'request' ], [ 'bcid' ] );
    }
    if ( empty( $_GET[ 'bcid' ] ) ) {
        standardRedirect( 'index.php' );
    }
    if ( ( $book = getBcopyDetails( $_GET[ 'bcid' ] ) ) === false ) {
        standardRedirect( 'index.php' );
    }
    if ( false ) { //!hasRequested( $_GET[ 'receiverid' ], $_GET[ 'bcid' ] ) ) {
        $result = 'Ο χρήστης δε σας ζήτησε ποτέ αυτό το βιβλίο.';
    }
    else if ( $book[ 'owner' ][ 'uid' ] != $_SESSION[ 'userid' ] ) {
        $result = 'Αυτό το αντίτυπο δεν ανήκει σε εσάς. Δεν μπορείτε να το δώσετε σε άλλο χρήστη';
    }
    else if ( $book[ 'given' ] ) {
        $result = 'To βιβλίο έχει δοθεί ήδη.';
    }
    else {
        if ( giveBook( $_GET[ 'receiverid' ], $_GET[ 'bcid' ] ) ) {
            $message = 'Ευχαριστούμε που δώσατε το βιβλίο στο χρήστη';
        }
        else {
            $message = 'Κάτι πήγε στραβά';
        }
    }
    require 'views/header.php';
    require 'views/result.php';
    require 'views/footer.php';
?>
