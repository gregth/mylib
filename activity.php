<?php
    require 'models/connect.php';
    require 'models/redirect.php';
    require 'models/transactions.php';
    require 'models/message_functions.php';

    if( !isset( $_SESSION[ 'userid' ] ) )
        standardRedirect( 'login.php', [ 'red' => 'activity' ] );

    $title = 'Δραστηριότητα';
    require 'views/header.php';
    $requests[ 'to' ] = getRequestsToUser( $_SESSION[ 'userid' ] );
    $requests[ 'from' ] = getRequestsFromUser( $_SESSION[ 'userid' ] );
    $messages = getNewMessages( $_SESSION[ 'userid' ] );
    require 'views/activity.php';
    require 'views/footer.php';
