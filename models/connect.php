<?php
    global $db;
    $db = mysqli_connect(
        'localhost',
        'user',
        '123456',
        'mylib'
    );

    if ( mysqli_connect_errno() ) {
        echo "Failed to connect with the database.";
    }

    mysqli_query( $db, "SET NAMES 'utf8'");
    mysqli_query( $db, "SET CHARACTER SET 'utf8'");
    session_start();

?>
