<?php
    require 'models/connect.php';
    require 'models/do_book_search.php';
    $title = 'Δήλωση βιβλίου προς ανταλλαγή';

    //User has given input string for search
    $books = false;
    if ( !empty( $_GET[ 'search' ] ) ) {
        $books = bookSearch( $_GET[ 'search' ] );
    }
    require 'views/header.php';
    require 'views/add_book_cp_search.php';
    require 'views/footer.php';
?>

