<?php
    require 'models/show_book_functions.php';
    require 'models/connect.php';
    require 'models/show_bookcp_functions.php';
    require 'models/date.php';
    require 'models/redirect.php';
    $title = 'Διαθέσιμα βιβλία';
    $books = getAllBooks();
    require 'views/header.php';
    require 'views/books_results.php';
    require 'views/footer.php';
?>
