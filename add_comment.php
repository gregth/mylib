<?php
    require "models/connect.php";
    require "models/comment_functions.php";
    require "models/user_functions.php";
    require "models/show_book_functions.php";
    require "models/show_bookcp_functions.php";
    //if seesion isn't set redirects to login page
    if (!isset( $_SESSION ) ) {
        header("Location: login.php");
        die();
    }
    if ( isset( $_GET[ 'profileid' ] ) ) {
    // if a comment is submited and profile id is valid add comment
        if(!empty($_POST[ 'comment' ] && getUserData($_GET[ 'profileid' ] ) ) ) {
            $success = addProfileComment($_POST[ 'comment' ], $_SESSION[ 'userid' ], $_GET[ 'profileid' ] );
            //redirects back to profile page
            header("Location: profiler.php"."?uid=".$_GET[ 'profileid' ] );
            die();
        }
    }
    
    if (isset ( $_GET[ 'bcid' ] ) ) {
        if(!empty($_POST[ 'comment' ] && getBcopyDetails($_GET[ 'bcid' ] ) ) ) {
            $success = addBookComment($_POST[ 'comment' ], $_SESSION[ 'userid' ], $_GET[ 'bcid' ] );
            //redirects back to bcopy page
            header("Location: bookcp.php"."?bcid=".$_GET[ 'bcid' ] );
            die();
        }
    }


    header( "Location: index.php" );
    die();
?>
