<?php
    require 'models/book_add_functions.php';
    if ( !empty( $_POST ) ) {
        //In this case adds the book
        echo 'Book to be added';
    }
    else {
        require 'views/header.php';
        require 'views/add_book_form.php';
        require 'views/footer.php';
    }
?>
