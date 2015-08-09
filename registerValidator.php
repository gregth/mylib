<?php
    require 'models/validation_functions.php';
    if ( !empty( $_POST[ 'value' ] ) ) {
        switch ( $_POST[ 'field' ] ) {
            case 1:
                $res = validateUsername( $_POST[ 'value' ] );
                if (!$res) {
                    echo 'Το username σας περιέχει μη πετρεπτούς χαρακτήρες. Παρακαλούμε εισάγετε μόνο λατινικούς χαρακτήρες και αριθμούς';
                }
                break;
            case 2:
                $res = validateName( $_POST[ 'value' ] );
                if ( !$res ) {
                    echo 'Το όνομα σας περιέχει μη επιτρεπτούς χαρακτήρες. Παρακαλούμε εισάγετε μόνο γράμματα της αλφαβήτας';
                }
                break;
            case 3:
                $res = validateName( $_POST[ 'value' ] );
                if ( !$res ) {
                    echo 'Το επώνυμο σας περιέχει μη επιτρεπτούς χαρακτήρες. Παρακαλούμε εισάγετε μόνο γράμματα της αλφαβήτας';
                }
                break;
            case 4:
                $res = validateEmail( $_POST[ 'value' ] );
                if ( !$res ) {
                    echo 'Το e-mail σας δεν είναι έγκυρο. Παρακούμε εισάγετε ένα έγκυρο e-mail.';
                }
                break;
            case 5:
                $res = validatePassword( $_POST[ 'value' ] );
                if ( !$res ) {
                    echo 'Μη επιτρεπτός κωδικός. Ο κωδικός σας πρέπει να περιλαμβάνει τουλάχιστον 8 ψηφία.';
                }
                break;
        }
    }
?>
