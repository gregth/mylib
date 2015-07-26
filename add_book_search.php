<?php
    require 'models/connect.php';
    require 'models/do_book_search.php';
    $title = 'Δήλωση βιβλίου προς ανταλλαγή';
    require 'views/header.php';
    require 'views/add_book_cp_search.php';
    //User has given input string for search
    if ( !empty( $_GET[ 'search' ] ) ) {
        $books = bookSearch( $_GET[ 'search' ] );
        require 'views/add_book_prompt.php';
        if ( $books ) {
            $addBookMode = true;
            require 'views/books_results.php';
        }
    }
    require 'views/footer.php';
?>

