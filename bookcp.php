<?php
//shows the bookcp page of the book copy specified by the ?bcid
    include 'models/show_book_functions.php';
    include 'models/show_bookcp_functions.php';
    include 'models/comment_functions.php';
    include 'models/connect.php';
    require 'models/redirect.php';
    require 'models/date.php';
    //if get bcid not set redirects to index
    if ( isset( $_GET[ 'bcid' ] ) ) {
        //if bcid does not exist redirects to 404 page
        if ( $bcopy = getBcopyDetails( $_GET[ 'bcid' ] ) ) {
            $title = $bcopy[ 'title' ];
            require 'views/header.php';
            require 'views/bookcp.php';
            $comments = getBcopyComments( $_GET[ 'bcid' ] );
            $page = 'bookcp';
            require 'views/comments.php';
            $book = getBookDetails ( $bcopy[ 'bid' ] );
            $showHeading = false;
            require 'views/book.php';
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

