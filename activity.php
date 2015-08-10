<?php
    require 'models/connect.php';
    require 'models/redirect.php';
    require 'models/transactions.php';
    require 'models/message_functions.php';

    if( !isset( $_SESSION[ 'userid' ] ) )
        standardRedirect( 'login.php', [ 'red' => 'activity' ] );

    $title = 'Δραστηριότητα';
    $requests[ 'to' ] = getRequestsToUser( $_SESSION[ 'userid' ] );
    $requests[ 'from' ] = getRequestsFromUser( $_SESSION[ 'userid' ] );
    $messages = getNewMessages( $_SESSION[ 'userid' ] );
    require 'views/header.php';
    require 'views/activity/activity_board.php';
    require 'views/footer.php';
