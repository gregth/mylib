<?php
    include 'debug.php';

    //Returns false if book not found, otherwise an array with book details
    function getBookDetails( $bid ) {
        global $db;
        $stmt = mysqli_prepare(
            $db,
            'SELECT
                books.title,
                books.description,
                bookauthors.name,
                bookgenres.genre
            FROM
                books CROSS
                JOIN bookauthors ON books.bid = bookauthors.bid CROSS
                JOIN bookgenres ON books.bid = bookgenres.bid
            WHERE
                books.bid = ?
            '
        );
        mysqli_stmt_bind_param( $stmt, 'i', $bid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $title, $description, $author, $genre );
        $book = [];
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $book[ 'title' ] = $title;
            $book[ 'description' ] = $description;
            $book[ 'authors' ][ $author ] = true;
            $book[ 'genre' ][ $genre ] = true;
        }
        return $book;
    }
    formPrint( getBookDetails( 41 ) );
?>
