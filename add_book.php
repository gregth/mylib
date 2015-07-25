<?php
    require 'models/connect.php';
    require 'models/book_add_functions.php';
    require 'models/genres_functions.php';
    if ( !isset( $_SESSION[ 'userid' ] )  ){
        header( 'Location: login.php?ref=add_book' );
        die();
    }
    if ( !empty( $_POST ) ) {
        //In this case adds the book
        $errors = bookDataErrors( $_POST );
        require 'views/header.php';
        if ( !$errors ) {
            $bid = addBook( $_POST, $_FILES );
            if ( $_GET[ 'ref' ] == 'cp' ) {
                header( 'Location: add_book_cp.php?bid=' . $bid );
                die();
            }
            header( 'Location: book.php?bid=' . $bid );
            die();

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
            $path = 'add_book.php?authors=' . $authors;
            if ( isset( $_GET[ 'ref' ] ) ) {
                $path .= '&ref=' . $_GET[ 'ref' ];
            }
            header( 'Location:' . $path );
            die();
        }
        require 'views/header.php';
        require 'views/add_book_form.php';
        require 'views/footer.php';
    }
?>
