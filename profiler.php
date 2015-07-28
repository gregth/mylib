<?php
    require 'models/connect.php';
    require 'models/user_functions.php';
    require 'models/comment_functions.php';
    require 'models/redirect.php';
    // if note logged in , redirect to login page
    // better replace userid with profileid as a better fitting name
    if ( !isset( $_SESSION[ 'userid' ] ) ) {
        standardRedirect( 'login.php', [ 'ref' => 'profile' ], [ 'uid' ] );
    }

    // get user data from db
    $data = getUserData( $_GET[ 'uid' ] );
    if ( !$data ) {
        standardRedirect( 'profiler.php', [ 'uid' => $_SESSION[ 'userid' ] ] );
    }

    $title = 'Προφίλ ' . $data[ 'username' ];
    require 'views/header.php';
    require 'views/profile.php';
    $comments = getProfileComments( $_GET[ 'uid' ] );
    require 'views/profile_comments.php';
    require 'views/footer.php';
?>
