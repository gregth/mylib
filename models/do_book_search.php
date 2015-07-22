<?php
    require 'connect.php';
    // TODO under construction still testing
    //returns book ids or false when fails
    function bookSearch( $userQuery ) {
        $userQuery.="%";
        global $db;
        $sqlQuery = "SELECT `bid` FROM books WHERE title LIKE ? ORDER by `title` ASC";
        $stmt = mysqli_prepare( $db, $sqlQuery );
        mysqli_stmt_bind_param( $stmt ,'s', $userQuery);
        mysqli_execute( $stmt );
        mysqli_stmt_bind_result( $stmt, $bid);
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $bids[] = $bid;
        }
        if ( empty( $bids ) ) {
            return false;
        }
        else {
        return $bids ;
        }
    };
?>
