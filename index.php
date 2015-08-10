<?php
    $title = 'Αρχική Σελίδα';
    require 'models/connect.php';
    require 'views/header.php';
    require 'models/show_bookcp_functions.php';

    $books = getLatestBooks( 4 );
    require 'views/home/banner.php';
    require 'views/home/new_books.php';
    require 'views/footer.php';
?>
