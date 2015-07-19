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

        //Important checks
        if ( !is_numeric( $data[ 'genresnum' ] ) && !is_numeric( $data[ 'authorsnum' ] ) ) {
            $messages[] = "Προέκυψε μη προβλέψιμο σφάλμα #A001";
            return $messages;
        }
        if ( $data[ 'genresnum' ] >= 4 || $data[ 'authorsnum' ] >= 4 ) {
            $messages[] = "Απαγορεύεται να υπάρχουν πάνω από 4 συγγραφείς και πάνω από 4 είδη";
            return $messages;
        }


        //Mainly validation checks
        if ( !validateISBN( $isbn ) ) {
            $errors[] = "Το ISBN αποτελείται από 13 ψηφία χωρίς παύλες.";
        }
        if ( !validateDescription( $description ) ) {
            $errors[] = "Η επίσημη περίληψη ενός βιβλίου αποτελείται τουλάχιστον από 10 λέξεις.";
        }
        if ( !validateTitle( $title ) ) {
            $errors[] = "Ο τίτλος ενός βιβλίου δεν επιτρέπεται να είναι κενός";
        }

        //Check if all author fields have content
        $authorsNum = $data[ 'authorsnum' ];
        for ( $i = 0; $i < $authorsNum; $i++ ) {
            if ( !validateAuthor( $data[ 'author' . $i ] ) ) {
                $errors[] = "Συμπληρώστε τα ονόματα όλων των συγγραφέων";
                break;
            }
        }

        //Check if all genres fiels have content
        $genresNum = $data[ 'genresnum' ];
        for ( $i = 0; $i < $genresNum; $i++ ) {
            if ( !validateGenre( $data[ 'genre' . $i ] )  ) {
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
        //TODO Check dor alterations at hidden input fields
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

        $num = $data[ 'authorsnum' ];
        for ( $i = 0; $i < $num; $i++ ) {
            //Insert authors name in authors table
            $authorName = $_POST[ 'author' . $i ];
            $stmt = mysqli_prepare( $db, 'INSERT INTO bookauthors SET bid = ?, name = ?' );
            mysqli_stmt_bind_param( $stmt, 'is', $bid, $authorName );
            mysqli_execute( $stmt );
        }

        $num = $data[ 'genresnum' ];
        for ( $i = 0; $i < $num; $i++ ) {
            //Insert authors name in authors table
            $genreName = $_POST[ 'genre' . $i ];
            $stmt = mysqli_prepare( $db, 'INSERT INTO bookgenres SET bid = ?, genre = ?' );
            mysqli_stmt_bind_param( $stmt, 'is', $bid, $genreName );
            mysqli_execute( $stmt );
        }
    }
?>
