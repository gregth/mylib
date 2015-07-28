<?php
    require 'models/connect.php';
    require 'views/header.php';
    require 'views/index_logged_out.php';
    require 'models/show_bookcp_functions.php';

    $books = getLatestBooks( 5 );
    require 'views/new_books.php';
    require 'views/footer.php';
?>
