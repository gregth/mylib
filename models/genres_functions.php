<?php
    //Returns an array with the genres stored in genres table
    function getGenres( ) {
        global $db;
        $stmt = mysqli_prepare( $db, 'SELECT id, name FROM genres');
        mysqli_stmt_execute( $stmt );
        mysqli_store_result( $db );
        mysqli_stmt_bind_result( $stmt, $id, $genre );
        while ( mysqli_stmt_fetch( $stmt ) ) {
           $genres[ $id ] = $genre;
        }
        return $genres;
    }


?>
