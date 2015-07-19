<?php
    global $db;
    $db = mysqli_connect(
        'db16.papaki.gr',
        'ourteam',
        'Aotx6!',
        'mylib',
        '3306'
    );

    if ( mysqli_connect_errno() ) {
        echo "Failed to connect with the database.";
    }

    mysqli_query( $db, "SET NAMES 'utf8'");
    mysqli_query( $db, "SET CHARACTER SET 'utf8'");

?>
