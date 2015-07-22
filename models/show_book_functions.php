<?php
    include 'connect.php';
    //Return the authors of book. Warning: $bid MUST BE VALID!
    function getBookAuthors( $bid ) {
        global $db;
        $stmt = mysqli_prepare(
            $db,
            'SELECT
                name
            FROM
                bookauthors
            WHERE
                bid = ?
            '
        );
        mysqli_stmt_bind_param( $stmt, 'i', $bid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        $author;
        mysqli_stmt_bind_result( $stmt, $author );
        $books = [];
        while( mysqli_stmt_fetch( $stmt ) ) {
            $books[] = $book;
        }
        return $books;
    }


    //Returns false if book not found, otherwise book details
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
        $title; $description; $author; $genre ;
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
    include '../views/header.php';
    $book = getBookDetails( 41 );
        echo '<pre>';
        var_dump( $book );
        echo '</pre>'
?>
