<?php
    include 'models/show_book_functions.php';
    include 'models/connect.php';
    if ( isset( $_GET[ 'bid' ] ) ) {
        if ( $book = getBookDetails( $_GET[ 'bid' ] ) ) {
            require 'views/header.php';
            require 'views/book.php';
            require 'views/footer.php';
        }
        else {
            header( 'Location: 404.php' );
        }
    }
    else {
        $books = getAllBooks();
        require 'views/header.php';
        require 'views/books_results.php';
        require 'views/footer.php';
    }
?>
