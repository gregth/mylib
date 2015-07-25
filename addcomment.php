<?php
    require "models/comment_functions.php";
    require "models/db_functions.php";
    //if seesion isn't set redirects to login page
    if (!isset( $_SESSION ) ) {
        header("Location: login.php");
        die();
    }
    //TODO select for book or profile comment
    // if a comment is submited and profile id is valid add comment
    if(!empty($_POST[ 'comment' ] && getUserData($_GET[ 'profileid' ] ) ) ) {
        addProfileComment($_POST[ 'comment' ], $_SESSION[ 'userid' ], $_GET[ 'profileid' ] );
        //redirects back to profile page
        header("Location: profiler.php"."?uid=".$_GET[ 'profileid' ] );
        die();
    }
    header( "Location: index.php" );
    die();
?>
