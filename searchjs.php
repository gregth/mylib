<?php
    header("Content-Type: application/json", true);
    require "models/connect.php";
    require "models/do_book_search.php";
    $books = bookSearch( $_POST[ 'q' ] );
    echo json_encode($books);
    
?>
