<?php

    //Return the exact number of authors if defined, otherwise number = 1
    function getAuthorsNum( $data ) {
        if ( isset( $data[ 'authors' ] ) && is_numeric( $data[ 'authors'] ) ){
            $number = $data[ 'authors' ];
            if ( $number > 0 )
                return $number;
        }
        return 1;
    }

    //Return the exact number of genres if defined, otherwise number = 1
    function getGenresNum( $data ) {
        if ( isset( $data[ 'genres' ] ) && is_numeric( $data[ 'genres'] ) ){
            $number = $data[ 'genres' ];
            if ( $number > 0 )
                return $number;
        }
        return 1;
    }

    //Validates ISBN numbers
    //TODO add more validation checks
    function validateISBN( $string ) {
        return strlen( $string ) == 13;
    }

    function validateDescription( $string ) {
        return str_word_count( $string ) >= 10;
    }

    function validateTitle( $string ) {
        return !empty( $string );
    }

    function validateAuthor( $string ) {
        return str_word_count( $string ) >= 2;
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
    }


    function addBook( $data ) {
        global $db;
        $title = $_POST[ 'title' ];
        $description = $_POST[ 'description' ];
    }
?>
