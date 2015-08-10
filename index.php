<?php
    $title = 'Αρχική Σελίδα';
    require 'models/connect.php';
    require 'views/header.php';
    require 'views/index_logged_out.php';
    require 'models/show_bookcp_functions.php';
    require 'views/home/banner.php';
    $books = getLatestBooks( 4 );
    require 'views/new_books.php';
    require 'views/footer.php';
?>
