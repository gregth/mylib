<?php
    require 'models/connect.php';
    require 'views/header.php';
    require 'models/add_book_cp_functions.php';
    if ( isset( $_GET[ 'bid' ] ) ) {
        //Show add copy form and append the book details
        require 'models/show_book_functions.php';
        require 'views/book_copy_form.php';
        $book = getBookDetails( $_GET[ 'bid' ] );
        if ( !$book ) {
            header( 'Location: 404.php' );
            die();
        }
        require 'views/book.php';
    }
    else {
        header( 'Location: add_book_search.php' );
    }
?>
