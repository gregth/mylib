<?php

    //Returns true if string contains valid characthers, otheerwise false
    function validateName( $string ) {
        if ( preg_match( "/^[a-zA-ΖΑ-Ωα-ωάόώήύίέΆΌΏΉΎΊΈ]+$/", $string ) ) {
            return true;
        }
        return false;
    }

    //Returns true if string contains valid characthers, otheerwise false
    function validateUsername( $string ) {
        if ( preg_match( "/^[a-zA-Z0-9]+$/", $string ) ) {
            return true;
        }
        return false;
    }

    //Returns true if email is valid, otherwise false
    function validateEmail( $email ) {
        return filter_var( $email, FILTER_VALIDATE_EMAIL );
    }

    //Return true if password meets the specified security details
    function validatePassword( $password ) {
        return ( strlen( $password ) >= 8 );
    }

    //Returns an empty map if data are valid, otherwise a map with error messages
    function getDataErrors( $data ) {
        $messages = [];
        if ( empty( $data[ 'first_name' ] ) ||
            empty( $data[ 'last_name' ] ) ||
            empty( $data[ 'username' ] ) ||
            empty( $data[ 'password' ] )
            ) {
            $messages[] = 'Παρακαλούμε συμπληρώστε όλα τα πεδία';
            return $messages;
        }
        if ( !validateName( $data[ 'first_name' ] ) ) {
            $messages[] = 'Το όνομα σας περιέχει μη επιτρεπτούς χαρακτήρες. Παρακαλούμε εισάγετε μόνο γράμματα της αλφαβήτας';
        }
        if ( !validateName( $data[ 'last_name' ] ) ) {
            $messages[] = 'Το επώνυμό σας περιέχει μη επιτρεπτούς χαρακτήρες. Παρακαλούμε εισάγετε μόνο γράμματα της αλφαβήτας';
        }
        if ( !validateUsername( $data[ 'username' ] ) ) {
            $messages[] = 'Το username σας περιέχει μη πετρεπτούς χαρακτήρες. Παρακαλούμε εισάγετε μόνο λατινικούς χαρακτήρες και αριθμούς';
        }
        if ( !validateEmail( $data[ 'email' ] ) ) {
            $messages[] = 'Το e-mail σας δεν είναι έγκυρο. Παρακούμε εισάγετε ένα έγκυρο e-mail.';
        }
        if ( !validatePassword( $data[ 'password' ] ) ) {
            $messages[] = 'Μη επιτρεπτός κωδικός. Ο κωδικός σας πρέπει να περιλαμβάνει τουλάχιστον 8 ψηφία.';
        }
        return $messages;
    }

?>
