<?php
    require 'models/connect.php';
    require 'views/header.php';
    if ( !empty( $_POST ) ){

    }
    else {
        if ( isset( $_GET[ 'bid' ] ) ) {
            require 'models/show_book_functions.php';
            require 'views/book_copy_form.php';
            $book = getBookDetails( $_GET[ 'bid' ] );
            require 'views/book.php';
        }
    }
?>
