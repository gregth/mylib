<?php
//shows the bookcp page of the book copy specified by the ?bcid
    include 'models/book/show.php';
    include 'models/book_copy/show.php';
    include 'models/book_copy/comments.php';
    include 'models/connect.php';
    require 'models/redirect.php';
    require 'models/date.php';

    //if get bcid not set redirects to index
    if ( isset( $_GET[ 'bcid' ] ) ) {
        //if bcid does not exist redirects to 404 page
        if ( $bcopy = getBcopyDetails( $_GET[ 'bcid' ] ) ) {
            $title = $bcopy[ 'title' ];
            $book = getBookDetails ( $bcopy[ 'bid' ] );
            $comments = getBcopyComments( $_GET[ 'bcid' ] );
            $showHeading = false;
            require 'views/header.php';
            require 'views/book_cp/book_cp.php';
            require 'views/footer.php';
        }
        else {
            standardRedirect( 'Location: 404.php' );
        }
    }
    else {
         standardRedirect( 'Location: index.php' );
    }
?>

