<?php
    require 'models/connect.php';
    require 'models/add_book_cp_functions.php';
    require 'models/redirect_functions.php';

    //Check if user has logged in. If not redirect him to login page
    if ( !isset( $_SESSION[ 'userid' ] ) ) {
        redirect( 'login.php', [ 'ref' => 'add_book_cp' ], [ 'bid' ], 'force' );
    }

    //Check if is set he bid of the book, whose copy is beeing added. If not redirect him to search and sleect page
    if ( isset( $_GET[ 'bid' ] ) ) {
        //if description and image are set add the book copy to the database and redirect to user profile so he can see the list of his book copies (to be added)
        if ( isset ( $_POST[ 'description' ] ) && !empty( $_FILES['userImage'] ) ) {
            addBookCp($_GET, $_POST );
            header("Location: profiler.php?uid=".$_SESSION[ 'userid' ] );
            die();
        }
        //Show add copy form and append the book details
        require 'models/show_book_functions.php';
        $book = getBookDetails( $_GET[ 'bid' ] );
        if ( !$book ) {
            header( 'Location: 404.php' );
            die();
        }
        $title = 'Δήλωση αντιτύπου για "' .$book[ 'title' ] . '"';
        require 'views/header.php';
        require 'views/book_copy_form.php';
        require 'views/book.php';
        require 'views/footer.php';
    }
    else {
        header( 'Location: add_book_search.php' );
    }
?>
