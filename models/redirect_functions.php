<?php
    function redirectFromLogin( $params ) {
        if ( isset( $params[ 'ref' ] )  ) {
            switch ( $params[ 'ref' ] ) {
                case 'add_book':
                    header( 'Location: add_book.php' );
                    die();
                default:
                    header( 'Location: index.php' );
                    die();
            }
        }
        header( 'Location: index.php' );
        die();
    }
?>
