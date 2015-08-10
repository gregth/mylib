<?php
    require 'models/show_book_functions.php';
    require 'models/connect.php';
    require 'models/show_bookcp_functions.php';
    require 'models/date.php';
    require 'models/redirect.php';
    require 'models/do_book_search.php';
    $title = 'Διαθέσιμα βιβλία';
    if ( empty( $_GET[ 'search' ] ) ) {
        $books = getAllBooks();
    }
    else {
        $books = bookSearch( $_GET[ 'search' ] );
    }
    require 'views/header.php';
    require 'views/books/books.php';
    require 'views/footer.php';
?>
