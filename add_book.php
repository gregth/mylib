<?php
    require 'models/book_add_functions.php';
    require 'models/image_upload.php';
    if ( !empty( $_POST ) ) {
        //In this case adds the book
        $errors = bookDataErrors( $_POST );
        require 'views/header.php';
        if ( !$errors ) {
            //TODO add book to database
            /*var_dump($_FILES);
            $path = '/var/www/html/uploads/';
            $image = imageUploader($_FILES, $path);
            echo "<img src=\"http://localhost/uploads/$image\">";*/ 
            // uncomment to test
        }
        else {
            require 'views/form_errors.php';
            require 'views/add_book_form.php';
        }
        require 'views/footer.php';
    }
    else {
        require 'views/header.php';
        require 'views/add_book_form.php';
        require 'views/footer.php';
    }
?>
