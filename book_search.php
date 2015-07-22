<?php
    require 'models/do_book_search.php';
    //if client is not logged in redirect to login.php
    if ( empty( $_SESSION ) ) {
        header( 'Location: login.php');
        die();
    }
    $searchResults = bookSearch( $_POST[ 'userQuery' ] );
    require 'views/header.php';
    require 'views/search_results.php';
    require 'views/footer.php';
?>
