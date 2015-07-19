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

    function validateTitle( $sting ) {
        return !empty( $string );
    }

    function validateAuthor( $string ) {
        return str_word_count( $string ) >= 2;
    }

    //Returns true if book data are valid, otherwide a map with error messages
    function bookDataErros( $data ) {
        $errors = [];
        $isbn = $data[ 'isbn' ];
        $title = $data[ 'title' ];
        $description = $data[ 'description' ];
        if ( !validateISBN( $isbn ) ) {
            $errors[] = "Το ISBN αποτελείται από 13 ψηφία χωρίς παύλες.";
        }
        if ( !validateDescription( $description ) ) {
            $errors = "Η επίσημη περίληψη ενός βιβλίου αποτελείται τουλάχιστον από 10 λέξεις.";
        }
        if ( !validateTitle( $title ) ) {
            $errors = "Ο τίτλος ενός βιβλίου δεν επιτρέπεται να είναι κενός";
        }


    }

    function addBook( $data ) {
        global $db;
        $title = $_POST[ 'title' ];
        $description = $_POST[ 'description' ];
    }
?>
