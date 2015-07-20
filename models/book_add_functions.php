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

    function validateGenre( $string ) {
        return strlen( $string ) >= 2;
    }

    //Returns false if book data are valid, otherwide a map with error messages
    //TODO check for cocver image validity
    function bookDataErrors( $data ) {
        $errors = [];
        $isbn = $data[ 'isbn' ];
        $title = $data[ 'title' ];
        $description = $data[ 'description' ];

        if ( !isset( $_POST[ 'authors' ] ) || !isset( $_POST[ 'genres' ] ) ) {
            $messages[] = "Διαπιστώσαμε σφάλμα. Παρακαλούμε συμπληρώστα τα στοιχεία ξανά";
            return $messages;
        }
        //Important checks
        if ( count( $_POST[ 'authors' ] ) > 4 || count( $_POST[ 'genres' ] ) > 4 ) {
            $messages[] = "Διαπιστώσαμε σφάλμα. Παρακαλούμε συμπληρώστα τα στοιχεία ξανά";
            return $messages;
        }


        //Mainly validation checks
        if ( !validateTitle( $title ) ) {
            $errors[] = "Ο τίτλος ενός βιβλίου δεν επιτρέπεται να είναι κενός";
        }
        if ( !validateISBN( $isbn ) ) {
            $errors[] = "Το ISBN αποτελείται από 13 ψηφία χωρίς παύλες.";
        }
        if ( !validateDescription( $description ) ) {
            $errors[] = "Η επίσημη περίληψη ενός βιβλίου αποτελείται τουλάχιστον από 10 λέξεις.";
        }

        //Check if all author fields have content
        foreach ( $_POST[ 'authors' ] as $author ) {
            if ( !validateAuthor( $author ) ) {
                $errors[] = "Συμπληρώστε τα ονόματα όλων των συγγραφέων";
                break;
            }
        }

        //Check if all genres fiels have content
        foreach ( $_POST[ 'genres' ] as $genre ) {
            if ( !validateGenre( $genre ) ) {
                $errors[] = "Συμπληρώστε τα είδη στα οποία ανήκει το βιβλίο";
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


    function addBook( $data ) {
        global $db;

        //Insert title, description, cover url and isbn it books table
        $title = $_POST[ 'title' ];
        $description = $_POST[ 'description' ];
        $isbn = $_POST[ 'isbn' ];
        $path = 'Hey';
        $stmt = mysqli_prepare( $db, 'INSERT INTO books SET title = ?, description = ?, coverimage = ?, isbn = ?' );
        mysqli_stmt_bind_param( $stmt, 'ssss',  $title, $description, $path, $isbn );
        mysqli_execute( $stmt );
        $bid = mysqli_insert_id( $db );

        foreach ( $data[ 'authors' ] as $author ) {
            //Insert authors name in authors table
            $stmt = mysqli_prepare( $db, 'INSERT INTO bookauthors SET bid = ?, name = ?' );
            mysqli_stmt_bind_param( $stmt, 'is', $bid, $author );
            mysqli_execute( $stmt );
        }

        foreach( $data[ 'genres' ] as $genre ) {
            //Insert authors name in authors table
            $stmt = mysqli_prepare( $db, 'INSERT INTO bookgenres SET bid = ?, genre = ?' );
            mysqli_stmt_bind_param( $stmt, 'is', $bid, $genre );
            mysqli_execute( $stmt );
        }
    }
?>
