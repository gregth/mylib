<?php
//shows the bookcp page of the book copy specified by the ?bcid
    include 'models/show_book_functions.php';
    include 'models/show_bookcp_functions.php';
    include 'models/comment_functions.php';
    include 'models/connect.php';
    require 'models/redirect.php';
    //if get bcid not set redirects to index
    if ( isset( $_GET[ 'bcid' ] ) ) {
        //if bcid does not exist redirects to 404 page
        if ( $bcopy = getBookcpDetails( $_GET[ 'bcid' ] ) ) {
            require 'views/header.php';
            require 'views/bookcp.php';
            $book = getBookDetails ( $bcopy[ 'bid' ] );
            require 'views/book.php';
            $comments = getBcopyComments( $_GET[ 'bcid' ] );
            require 'views/bookcp_comments.php';
            require 'views/footer.php';
        }
        else {
            header( 'Location: 404.php' );
        }
    }
    else {
         header( 'Location: index.php' );
    }

?>

