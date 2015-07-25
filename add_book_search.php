<?php
    require 'views/header.php';
    require 'models/connect.php';
    require 'models/do_book_search.php';
    require 'views/add_book_cp_search.php';
    if ( !empty( $_GET[ 'search' ] ) ) {
        $books = bookSearch( $_GET[ 'search' ] );
        require 'views/add_book_prompt.php';
        if ( $books ) {
            $addBookMode = true;
            require 'views/books_results.php';
        }
    }
    require 'views/footer.php';
?>

