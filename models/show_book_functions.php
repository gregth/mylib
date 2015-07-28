<?php
    //Returns an array with all books, containing their title, image, descriptiom
    function getAllBooks( ) {
        global $db;
        $stmt = mysqli_prepare(
            $db,
            'SELECT
                books.bid,
                books.title,
                books.description,
                bookauthors.name,
                genres.name,
                books.coverimage
            FROM
                books CROSS
                JOIN bookgenres ON bookgenres.bid = books.bid CROSS
                JOIN genres ON genres.id = bookgenres.genreid CROSS
                JOIN bookauthors ON bookauthors.bid = books.bid CROSS
                JOIN bcopies ON bcopies.bid = books.bid
            WHERE
                bcopies.sold = 0
            ORDER BY
                books.title ASC
            '
        );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt,$id, $title, $description, $author, $genre, $image );
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $book[ 'title' ] = $title;
            $book[ 'img' ] = $image;
            $book[ 'description' ] = $description;
            $book[ 'authors' ][ $author ] = true;
            $book[ 'genres' ][ $genre ] = true;
            $books[ $id ] = $book;
            static $i = 0;
            $i++;
        }
        return $books;
    }

    //Returns false if book not found, otherwise an array with book details
    function getBookDetails( $bid ) {
        global $db;
        $stmt = mysqli_prepare(
            $db,
            'SELECT
                books.title,
                books.description,
                bookauthors.name,
                genres.name,
                books.coverimage
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
        mysqli_stmt_bind_result( $stmt, $title, $description, $author, $genre, $image );
        $results = false;
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $results = true;
            $book[ 'title' ] = $title;
            $book[ 'description' ] = $description;
            $book[ 'authors' ][ $author ] = true;
            $book[ 'genres' ][ $genre ] = true;
            $book[ 'image' ] = $image;
            $book[ 'bid' ] = $bid;
        }
        if ( !$results )
            return false;
        return $book;
    }

?>
