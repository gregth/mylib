<?php
    require 'debug.php';
    require 'models/validation_functions.php';
    require 'views/header.php';
    if ( !empty( $_POST ) )
    {
        include 'connect.php';
        include 'db_functions.php';
        include 'validation_functions.php';

        //get data errors returns a table with all errors
        $errors = get_data_errors($_POST)
        // if there are no errors continue with the reg
        if (empty($errors))
        {
            //insert user info to database
            $success = register_user($_POST)
            if ($success)
            {
                $_SESSION[ 'username' ] = $username;
                $_SESSION[ 'userid' ] = mysql_insert_id();
                header("location : index.php ")
                die();
            }
            else
            {
                $errors = 'internal database error try again' // if sql fails we get this error
            }
        }
        else
        {
            //Include view that parses errors and form view
            require 'views/form_errors.php';
            require 'views/registration.php';
        }
    }
    else {
            require 'views/register_form.php';
    }
    require 'views/footer.php';
?>
