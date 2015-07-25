<?php
    // TODO under construction still testing ***check if query is set or is blank
    //returns book ids or false when fails
    function bookSearch( $userQuery ) {
        $userQuery.="%";
        global $db;
        $sqlQuery = "SELECT bid, title, description, coverimage FROM books WHERE title LIKE ? ORDER by `title` ASC";
        $stmt = mysqli_prepare( $db, $sqlQuery );
        mysqli_stmt_bind_param( $stmt ,'s', $userQuery);
        mysqli_execute( $stmt );
        mysqli_stmt_bind_result( $stmt, $bid, $title, $des, $img);
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $books[] = [ 'title' => $title, 'bid' => $bid, 'description' => $des, 'img' => $img ];
        }
        if ( empty( $books ) ) {
            return false;
        }
        else {
            return $books ;
        }
    };
?>
