<?php
    require 'models/connect.php';
    require 'models/user_functions.php';
    require 'models/comment_functions.php';
    require 'models/redirect.php';
    require 'models/show_bookcp_functions.php';
    // if note logged in , redirect to login page
    // better replace userid with profileid as a better fitting name
    if ( !isset( $_SESSION[ 'userid' ] ) ) {
        redirect( 'login.php', [ 'ref' => 'profile' ], [ 'uid' ],  'force' );
    }
    // get user data from db
    $data = getUserData( $_GET[ 'uid' ] );
    if ( !$data ) {
        header( 'Location: 404.php' );
        die();
    }
    $title = 'Προφίλ ' . $data[ 'username' ];
    require 'views/header.php';
    require 'views/profile.php';
    $comments = getProfileComments( $_GET[ 'uid' ] );
    require 'views/profile_comments.php';
    $bookCopies = getBcopiesByUid ( $_GET[ 'uid' ] );
    require 'views/bookcp_list.php';
    require 'views/footer.php';
?>
