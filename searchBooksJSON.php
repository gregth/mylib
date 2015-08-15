<?php
    header("Content-Type: application/json; charset=utf-8", true);

    require 'models/connect.php';
    require 'models/do_book_search.php';
    require 'models/show_book_functions.php';
    //User has given input string for search
    $books = false;
    $results = [];
    if ( !empty( $_GET[ 'query' ] ) ) {
        $books = bookSearch( $_GET[ 'query' ] );
    }
    else {
        $books = getAllBooks();
    }

    $results[ 'empty' ] = empty( $books );
    $results[ 'books' ] = $books;
    echo json_encode( $results );
?>
