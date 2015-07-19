<?php
    require 'models/book_add_functions.php';
    if ( !empty( $_POST ) ) {
        //In this case adds the book
        $errors = bookDataErrors( $_POST );
        require 'views/header.php';
        if ( !$errors ) {
            //TODO add book to database
            echo 'Book to be added';
        }
        else {
            require 'views/form_errors.php';
            require 'views/add_book_form.php';
        }
        require 'views/footer.php';
    }
    else {
        require 'views/header.php';
        require 'views/add_book_form.php';
        require 'views/footer.php';
    }
?>
