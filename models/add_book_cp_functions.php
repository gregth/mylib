<?php
    //Return true if data are valid, otherwise a messages array
    function validateBookCpData( $data ) {
        if ( empty( $data[ 'description' ] ) ) {
            $messages[] = 'Παρακαλούμε εισάγετε περιγραφή';
            return $messages;
        }
        else {
            return true;
        }
    }
?>
