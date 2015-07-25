<?php
    require 'models/do_book_search.php';
    //if client is not logged in redirect to login.php
    if ( empty( $_SESSION ) ) {
        header( 'Location: login.php');
        die();
    }
    if (isset($_POST[ 'userQuery' ] ) ) {
        $searchResults = bookSearch( $_POST[ 'userQuery' ] );
        require 'views/header.php';
        require 'views/search_results.php';
        require 'views/footer.php';
    }
    // no post data entered
    else {
        header("Location: index.php");
        die();
    }
?>
