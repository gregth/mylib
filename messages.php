<?php
    require 'models/connect.php';
    require 'models/message_functions.php';

    if (!isset( $_SESSION[ 'userid' ] ) ) {
        header("Location: index.php");
        die();
    }
    if(isset( $_GET[ 'discussant' ] ) ) {
        if ( isset( $_GET[ 'addmsg'] ) ) {
            sendMessage ($_POST[ 'message' ], $_SESSION[ 'userid' ], $_GET[ 'discussant']  );
            header("Location: messages.php?discussant=".$_GET[ 'discussant' ] );
        }
        $messages = getUserMessages( $_SESSION[ 'userid' ], $_GET[ 'discussant' ] );
        var_dump($messages);
        require 'views/header.php';
        require 'views/messages.php';
        require 'views/footer.php';
        //after rendering the page mark every message as seen
        if ( $messages ) {
            foreach ( $messages as $message ) {
                if ( $_SESSION[ 'userid' ] != $message[ 'senterid' ] ) {
                    messageSeen( $message[ 'mid' ] );
                }
            }
        }
    }
    else {
        //redirect ekei pou briskotane 
    }
?>
