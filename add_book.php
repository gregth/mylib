<?php
    require 'models/connect.php';
    require 'models/book_add_functions.php';
    require 'models/genres_functions.php';
    require 'models/redirect_functions.php';
    if ( !isset( $_SESSION[ 'userid' ] )  ){
        redirect( 'login.php', [ 'ref' => 'add_book' ] );
    }
    if ( !empty( $_POST ) ) {
        //In this case adds the book
        $errors = bookDataErrors( $_POST );
        require 'views/header.php';
        if ( !$errors ) {
            $bid = addBook( $_POST, $_FILES );
            redirect( 'book.php', [ 'bid' => $bid ], [] );
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
        if ( $authors != $_GET[ 'authors' ] ) {
            redirect( 'add_book.php', [ 'authors' => 1 ], [], 'force' );
        }
        $title = 'Προσθήκη Βιβλίου';
        require 'views/header.php';
        require 'views/add_book_form.php';
        require 'views/footer.php';
    }
?>
