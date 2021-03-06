<?php
    require 'models/connect.php';
    require 'models/book_add.php';
    require 'models/genres_functions.php';
    require 'models/redirect.php';
    if ( !isset( $_SESSION[ 'userid' ] )  ){
        standardRedirect( 'login.php', [ 'ref' => 'add_book' ] );
    }
    if ( !empty( $_POST ) ) {
        //In this case adds the book
        $errors = bookDataErrors( $_POST );
        require 'views/header.php';
        if ( !$errors ) {
            $bid = addBook( $_POST, $_FILES );
            dynamicRedirect( 'add_bookcp.php', [ 'bid' => $bid ] );
        }
        else {
            require 'views/form_errors.php';
            require 'views/book/add_form.php';
        }
        require 'views/footer.php';
    }
    else {

        //Make sure thatuser request at max 4 fields for author and at maxt 4 fields fot genres
        $authors = getAuthorsNum( $_GET );
        if ( $authors != $_GET[ 'authors' ] ) {
            standardRedirect( 'add_book.php', [ 'authors' => 1 ], [ 'red' ] );
        }
        $genres = getGenres();
        $authorsNum = getAuthorsNum( $_GET );
        $title = 'Προσθήκη Βιβλίου';
        require 'views/header.php';
        require 'views/book/add_form.php';
        require 'views/footer.php';
    }
?>
