<?php
    require 'models/connect.php';
    require 'models/redirect.php';
    require 'models/transactions.php';

    if( !isset( $_SESSION[ 'userid' ] ) )
        standardRedirect( 'login.php', [ 'red' => 'activity' ] );

    $title = 'Δραστηριότητα';
    require 'views/header.php';
    $requests = getRequestsToUser( $_SESSION[ 'userid' ] );
    require 'views/requests_to_user.php';
    $requests = getRequestsFromUser( $_SESSION[ 'userid' ] );
    require 'views/requests_from_user.php';
    require 'views/footer.php';
