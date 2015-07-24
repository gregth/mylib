<?php

    //Returns false if book not found, otherwise an array with book details
    function getBookDetails( $bid ) {
        global $db;
        $stmt = mysqli_prepare(
            $db,
            'SELECT
                books.title,
                books.description,
                bookauthors.name,
                genres.name
            FROM
                books CROSS
                JOIN bookgenres ON bookgenres.bid = books.bid CROSS
                JOIN genres ON genres.id = bookgenres.genreid CROSS
                JOIN bookauthors ON bookauthors.bid = books.bid
            WHERE
                books.bid = ?
            '
        );
        mysqli_stmt_bind_param( $stmt, 'i', $bid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $title, $description, $author, $genre );
        $results = false;
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $results = true;
            $book[ 'title' ] = $title;
            $book[ 'description' ] = $description;
            $book[ 'authors' ][ $author ] = true;
            $book[ 'genres' ][ $genre ] = true;
        }
        if ( !$results )
            return false;
        return $book;
    }

?>
