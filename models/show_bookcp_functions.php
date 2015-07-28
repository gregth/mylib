<?php

//return an array with Bcopies that belong to the user specified from uid , on failure returns false
    function getBcopiesByUid( $uid ) {
        global $db ;
        $sql_query = "Select bcid FROM users CROSS JOIN bcopies ON users.uid = bcopies.uid WHERE users.uid = ? ORDER BY time DESC";
        $stmt = mysqli_prepare( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt, 'i', $uid );
        mysqli_stmt_execute( $stmt );
        mysqli_store_result( $stmt );
        mysqli_stmt_bind_result($stmt, $bcid);
        while(mysqli_stmt_fetch( $stmt ) ) {
            $bids[] = $bid ;
        }
        if (!isset( $bids ) ) {
            return false ;
        }
        return $bids ;
    }



 //Returns false if bookcp not found, otherwise an array with bookcp details
    function getBookcpDetails( $bcid ) {
        global $db;
        $sql_query = "SELECT `description`, `bid`, `image` FROM `bcopies` WHERE bcid = ?";
        $stmt = mysqli_prepare( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt, 'i', $bcid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $description, $bid, $image );
        if( mysqli_stmt_fetch( $stmt ) ) {
            $bcopy[ 'description' ] = $description ;
            $bcopy[ 'image' ] = $image ;
            $bcopy[ 'bid' ] = $bid ;
            return $bcopy ;
         }
         return false;
    }
    

?>
