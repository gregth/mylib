<?php
    require 'models/show_book_functions.php';
    require 'models/connect.php';
    require 'models/show_bookcp_functions.php';
    require 'models/date.php';
    require 'models/redirect.php';
    $showHeading = true;
    if ( isset( $_GET[ 'bid' ] ) ) {
        if ( $book = getBookDetails( $_GET[ 'bid' ] ) ) {
            $title = $book[ 'title' ];
            $bookCopies = getBcopies( $_GET[ 'bid' ] );
            require 'views/header.php';
            require 'views/book/book.php';
            require 'views/footer.php';
        }
        else {
            standardRedirect( 'Location: 404.php' );
        }
    }
    else {
        standardRedirect( 'books.php' );
    }
?>
