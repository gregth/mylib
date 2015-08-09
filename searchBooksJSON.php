<?php
    header("Content-Type: application/json; charset=utf-8", true);

    require 'models/connect.php';
    require 'models/do_book_search.php';
    //User has given input string for search
    $books = false;
    $results = [];
    if ( !empty( $_GET[ 'query' ] ) ) {
        $books = bookSearch( $_GET[ 'query' ] );
    }
    $results[ 'empty' ] = empty( $books );
    $results[ 'books' ] = $books;
    echo json_encode( $results );
?>
