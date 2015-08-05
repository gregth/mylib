<?php
    require 'models/show_book_functions.php';
    require 'models/connect.php';
    require 'models/show_bookcp_functions.php';
    require 'models/date.php';
    require 'models/redirect.php';
    if ( isset( $_GET[ 'bid' ] ) ) {
        if ( $book = getBookDetails( $_GET[ 'bid' ] ) ) {
            $title = $book[ 'title' ];
            require 'views/header.php';
            require 'views/book.php';
            $bookCopies = getBcopies( $_GET[ 'bid' ] );
            require 'views/bookcp_list.php';
            require 'views/footer.php';
        }
        else {
            header( 'Location: 404.php' );
        }
    }
    else {
        $title = 'Διαθέσιμα βιβλία';
        $books = getAllBooks();
        require 'views/header.php';
        require 'views/books_results.php';
        require 'views/footer.php';
    }
?>
