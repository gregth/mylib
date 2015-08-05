<?php
    require 'models/connect.php';
    require 'models/user_functions.php';
    require 'models/comment_functions.php';
    require 'models/redirect.php';
    require 'models/show_bookcp_functions.php';
    require 'models/message_functions.php';
    require 'models/date.php';
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
    // notifaction for ne msg
    if( $_GET[ 'uid' ] == $_SESSION[ 'userid' ] ) {
        $newmsg = getNewMessages ( $_SESSION[ 'userid' ] );
        if ($newmsg) {
            require 'views/new_messages.php';
        }
    }
    $comments = getProfileComments( $_GET[ 'uid' ] );
    $page = 'profile';
    require 'views/comments.php';
    $bookCopies = getUserBcopies ( $_GET[ 'uid' ] );
    require 'views/bookcp_list.php';
    require 'views/footer.php';
?>
