<?php
    require 'models/connect.php';
    require 'models/book_add_functions.php';
    if ( !empty( $_POST ) ) {
        //In this case adds the book
        $errors = bookDataErrors( $_POST );
        require 'views/header.php';
        if ( !$errors ) {
            //TODO add book to database
            addBook( $_POST );
            echo 'Book to be added';
        }
        else {
            require 'views/form_errors.php';
            require 'views/add_book_form.php';
        }
        require 'views/footer.php';
    }
    else {

        //Make sure thatuser request at max 4 fields for author and at maxt 4 fields fot genres
        $authors = getAuthorsNum( $_GET );
        $genres = getGenresNum( $_GET ) ;
        if ( $authors != $_GET[ 'authors' ] || $genres != $_GET[ 'genres' ] ) {
            header( 'Location: add_book.php?authors=' . $authors . '&genres=' . $genres );
            exit();
        }
        require 'views/header.php';
        require 'views/add_book_form.php';
        require 'views/footer.php';
    }
?>
