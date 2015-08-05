<?php

    //Return an array of the bcopies for a certain $bid, false on failure
    function getBcopies( $bid ) {
        global $db ;
        $sql_query = 'SELECT
                bcopies.bcid,
                bcopies.uid,
                owners.username,
                books.bid,
                books.title,
                UNIX_TIMESTAMP( bcopies.timecreated ),
                bcopies.description,
                bcopies.image,
                bcopies.given,
                bcopies.receiverid,
                receivers.username,
                UNIX_TIMESTAMP( bcopies.timegiven ),
                bcopies.confirmed,
                UNIX_TIMESTAMP( bcopies.timeconfirmed )
            FROM
                bcopies CROSS
                JOIN books ON books.bid = bcopies.bid CROSS
                JOIN users owners ON owners.uid = bcopies.uid LEFT
                JOIN users receivers ON receivers.uid = bcopies.uid
            WHERE bcopies.bid = ?
            ORDER BY timecreated DESC
            ';
        $stmt = mysqli_prepare( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt, 'i', $bid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result($stmt, $bcid, $ownerId, $ownerUsername, $bid, $title, $timeCreated,
            $description, $image, $given, $receiverId, $receiverUsername, $timeGiven, $confirmed, $timeConfirmed );
        while( mysqli_stmt_fetch( $stmt ) ) {
            $book = [];
            $book[ 'bcid' ] = $bcid;
            $book[ 'owner' ][ 'uid' ] = $ownerId;
            $book[ 'owner' ][ 'username' ] = $ownerUsername;
            $book[ 'bid' ] = $bid;
            $book[ 'title' ] = $title;
            $book[ 'timeCreated' ] = $timeCreated;
            $book[ 'description' ] = $description;
            $book[ 'image' ] = $image;
            $book[ 'given' ] = $given;
            if ( $given ) {
                $book[ 'receiver' ][ 'uid' ] = $receiverId;
                $book[ 'receiver' ][ 'username' ] = $receiverUsername;
                $book[ 'confirmed' ] = $confirmed;
                if ( $confirmed )
                    $book[ 'timeConfirmed' ] = $timeConfirmed;
            }
            $books[] = $book;
        }
        if (!isset( $books ) ) {
            return false ;
        }
        return $books ;
    }

//return an array with Bcopies that belong to the user specified from uid , on failure returns false
    function getUserBcopies( $uid ) {
        global $db ;
        $sql_query = 'SELECT
                bcopies.bcid,
                bcopies.uid,
                owners.username,
                books.bid,
                books.title,
                UNIX_TIMESTAMP( bcopies.timecreated ),
                bcopies.description,
                bcopies.image,
                bcopies.given,
                bcopies.receiverid,
                receivers.username,
                UNIX_TIMESTAMP( bcopies.timegiven ),
                bcopies.confirmed,
                UNIX_TIMESTAMP( bcopies.timeconfirmed )
            FROM
                bcopies CROSS
                JOIN books ON books.bid = bcopies.bid CROSS
                JOIN users owners ON owners.uid = bcopies.uid LEFT
                JOIN users receivers ON receivers.uid = bcopies.uid
            WHERE bcopies.uid = ?
            ORDER BY timecreated DESC
            ';
        $stmt = mysqli_prepare( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt, 'i', $uid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result($stmt, $bcid, $ownerId, $ownerUsername, $bid, $title, $timeCreated,
            $description, $image, $given, $receiverId, $receiverUsername, $timeGiven, $confirmed, $timeConfirmed );
        while( mysqli_stmt_fetch( $stmt ) ) {
            $book = [];
            $book[ 'bcid' ] = $bcid;
            $book[ 'owner' ][ 'uid' ] = $ownerId;
            $book[ 'owner' ][ 'username' ] = $ownerUsername;
            $book[ 'bid' ] = $bid;
            $book[ 'title' ] = $title;
            $book[ 'timeCreated' ] = $timeCreated;
            $book[ 'description' ] = $description;
            $book[ 'image' ] = $image;
            $book[ 'given' ] = $given;
            if ( $given ) {
                $book[ 'receiver' ][ 'uid' ] = $receiverId;
                $book[ 'receiver' ][ 'username' ] = $receiverUsername;
                $book[ 'confirmed' ] = $confirmed;
                if ( $confirmed )
                    $book[ 'timeConfirmed' ] = $timeConfirmed;
            }
            $books[] = $book;
        }
        if ( !isset( $books ) ) {
            return false ;
        }
        return $books ;
    }


    function getLatestBooks( $number ) {
        global $db;
        $sql_query = 'SELECT
                books.bid,
                books.title,
                books.coverimage
            FROM bcopies CROSS
                JOIN books ON books.bid = bcopies.bid
            GROUP BY books.bid
            ORDER BY bcopies.timecreated DESC
            LIMIT ?
            ';
        $stmt = mysqli_prepare( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt, 'i', $number );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $bid, $title, $image );
        $books = [];
        while( mysqli_stmt_fetch( $stmt ) ) {
            $book[ 'bid' ] = $bid;
            $book[ 'image' ] = $image ;
            $book[ 'title' ] = $title ;
            $books[] = $book;
         }
         return $books;
    }

 //Returns false if bookcp not found, otherwise an array with bookcp details
    function getBcopyDetails( $bcid ) {
        global $db;
        $sql_query = 'SELECT
                bcopies.bcid,
                bcopies.uid,
                owners.username,
                books.bid,
                books.title,
                UNIX_TIMESTAMP( bcopies.timecreated ),
                bcopies.description,
                bcopies.image,
                bcopies.given,
                bcopies.receiverid,
                receivers.username,
                UNIX_TIMESTAMP( bcopies.timegiven ),
                bcopies.confirmed,
                UNIX_TIMESTAMP( bcopies.timeconfirmed )
            FROM
                bcopies CROSS
                JOIN books ON books.bid = bcopies.bid CROSS
                JOIN users owners ON owners.uid = bcopies.uid LEFT
                JOIN users receivers ON receivers.uid = bcopies.uid
            WHERE bcopies.bcid = ?
            ';
        $stmt = mysqli_prepare( $db, $sql_query );
        mysqli_stmt_bind_param( $stmt, 'i', $bcid );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result($stmt, $bcid, $ownerId, $ownerUsername, $bid, $title, $timeCreated,
            $description, $image, $given, $receiverId, $receiverUsername, $timeGiven, $confirmed, $timeConfirmed );
        while( mysqli_stmt_fetch( $stmt ) ) {
            $book = [];
            $book[ 'bcid' ] = $bcid;
            $book[ 'owner' ][ 'uid' ] = $ownerId;
            $book[ 'owner' ][ 'username' ] = $ownerUsername;
            $book[ 'bid' ] = $bid;
            $book[ 'title' ] = $title;
            $book[ 'timeCreated' ] = $timeCreated;
            $book[ 'description' ] = $description;
            $book[ 'image' ] = $image;
            $book[ 'given' ] = $given;
            if ( $given ) {
                $book[ 'receiver' ][ 'uid' ] = $receiverId;
                $book[ 'receiver' ][ 'username' ] = $receiverUsername;
                $book[ 'confirmed' ] = $confirmed;
                if ( $confirmed )
                    $book[ 'timeConfirmed' ] = $timeConfirmed;
            }
        }
        if ( isset( $book ) ) {
            return $book;
        }
        return false;
    }


?>
