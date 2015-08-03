<?php
    require 'models/connect.php';
    require 'models/add_book_cp_functions.php';
    require 'models/show_book_functions.php';
    require 'models/redirect.php';

    //Check if user has logged in. If not redirect him to login page
    if ( !isset( $_SESSION[ 'userid' ] ) ) {
        standardRedirect( 'login.php', [ 'red' => 'add_book_cp' ], [ 'bid' ] );
    }

    //If no bid specified, redirect to booksearch page
    if ( !isset( $_GET[ 'bid' ] ) ) {
        standardRedirect( 'add_book_search.php' );
    }

    //If therre is no book with the specific bid
    $book = getBookDetails( $_GET[ 'bid' ] );
    if ( !$book ) {
        standardRedirect( '404.php' );
    }
    $title = 'Δήλωση αντιτύπου για "' .$book[ 'title' ] . '"';

    //Check if user is submitting a book copy
    if ( !empty ( $_POST ) ) {
        $res = validateBookCpData( $_POST, $_FILES );
        if ( $res === true ) {
            if ( $bcid = addBookCp( $_GET, $_POST ) )  {
                standardRedirect( 'bookcp.php', [ 'bcid' => $bcid ] );
            }
            else {
                echo 'Προέκυψε σοβαρό σφάλμα κατά την εισαγωγή του βιβλίου. Παρακαλώ προσπαθήστε αργότερα. Error #BCOPY_INSERT_01';
            }
}
        else {
            $errors = $res;
            require 'views/header.php';
            require 'views/form_errors.php';
            require 'views/book_copy_form.php';
            require 'views/book.php';
            require 'views/footer.php';
        }
    }
    else {
        //Show add copy form and append the book details
        require 'views/header.php';
        require 'views/book_copy_form.php';
        require 'views/book.php';
        require 'views/footer.php';
    }
?>
