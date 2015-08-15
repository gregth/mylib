<?php

    function countWords( $string ) {
        $words = explode( ' ', $string );
        return count( $words );
    }

//Return the exact number of authors if defined, otherwise number = 1
    function getAuthorsNum( $data ) {
        if ( isset( $data[ 'authors' ] ) && is_numeric( $data[ 'authors'] ) ){
            $number = $data[ 'authors' ];
            if ( $number > 0 && $number <= 4 )
                return $number;
            if ( $number > 4 )
                return 4;
        }
        return 1;
    }

    //Return the exact number of genres if defined, otherwise number = 1
    function getGenresNum( $data ) {
        if ( isset( $data[ 'genres' ] ) && is_numeric( $data[ 'genres'] ) ){
            $number = $data[ 'genres' ];
            if ( $number > 0 && $number <= 4 )
                return $number;
            if ( $number > 4 )
                return 4;
        }
        return 1;
    }

    //Validates ISBN numbers
    //TODO add more validation checks
    function validateISBN( $string ) {
        return strlen( $string ) == 13;
    }

    function validateDescription( $string ) {
        return countWords( $string ) >= 10;
    }

    function validateTitle( $string ) {
        return !empty( $string );
    }

    function validateAuthor( $string ) {
        return countWords( $string ) >= 2;
    }

    function validateGenre( $data ) {
        return isset( $data[ 'genres' ] );
    }

    //Returns false if book data are valid, otherwide a map with error messages
    //TODO check for cocver image validity
    function bookDataErrors( $data ) {
        $errors = [];
        $title = $data[ 'title' ];
        $description = $data[ 'description' ];

        if ( !isset( $_POST[ 'authors' ] ) ) {
            $messages[] = "Διαπιστώσαμε σφάλμα. Παρακαλούμε συμπληρώστα τα στοιχεία ξανά";
            return $messages;
        }
        //Important checks
        if ( count( $_POST[ 'authors' ] ) > 4 ) {
            $messages[] = "Διαπιστώσαμε σφάλμα. Παρακαλούμε συμπληρώστα τα στοιχεία ξανά";
            return $messages;
        }

        //Mainly validation checks
        if ( !validateTitle( $title ) ) {
            $errors[] = "Ο τίτλος ενός βιβλίου δεν επιτρέπεται να είναι κενός";
        }
        if ( !validateDescription( $description ) ) {
            $errors[] = "Η επίσημη περίληψη ενός βιβλίου αποτελείται τουλάχιστον από 10 λέξεις.";
        }
        if ( !validateGenre( $data ) ) {
            $errors[] = "Επιλέξτε κατηγορία που ανήκει το βιβλίο";
        }

        //TODO add vallidity check for image
        //Check if all author fields have content
        foreach ( $_POST[ 'authors' ] as $author ) {
            if ( !validateAuthor( $author ) ) {
                $errors[] = "Συμπληρώστε τα ονόματα όλων των συγγραφέων";
                break;
            }
        }

        if ( empty( $errors ) ) {
            return false;
        }
        else {
            return $errors;
        }
    }


    function addBook( $data, $files ) {
        global $db;
        require 'image_upload.php';
        //Insert title, description, cover url and isbn it books table
        $title = $data[ 'title' ];
        $description = $data[ 'description' ];
        $path = imageUpload( 'data/cover_images/', 'cover_img' );
        $stmt = mysqli_prepare( $db, 'INSERT INTO books SET title = ?, description = ?, coverimage = ?, uid = ?' );
        mysqli_stmt_bind_param( $stmt, 'sssi',  htmlspecialchars( $title ), htmlspecialchars( $description ), $path, $_SESSION[ 'userid' ] );
        mysqli_execute( $stmt );
        $bid = mysqli_insert_id( $db );

        foreach ( $data[ 'authors' ] as $author ) {
            //Insert authors name in authors table
            $stmt = mysqli_prepare( $db, 'INSERT INTO bookauthors SET bid = ?, name = ?' );
            mysqli_stmt_bind_param( $stmt, 'is', $bid, htmlspecialchars( $author ) );
            mysqli_execute( $stmt );
        }

        foreach( $data[ 'genres' ] as $genreId ) {
            //Insert authors name in authors table
            $stmt = mysqli_prepare( $db, 'INSERT INTO bookgenres SET bid = ?, genreid = ?' );
            mysqli_stmt_bind_param( $stmt, 'ii', $bid, $genreId );
            mysqli_execute( $stmt );
        }
        return $bid;
    }
?>
