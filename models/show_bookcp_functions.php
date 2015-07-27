<?php
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
