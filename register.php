<?php
  require 'debug.php';
  require 'models/validation_functions.php';
  require 'views/header.php';
  if ( !empty( $_POST ) ) 
  {
    //inludes
    include 'database_connect.php';
    include 'db_functions.php';
    include 'validation_functions.php';
    $res = get_data_errors($_POST) //get data errors returns a table with all errors
    if (empty($res)) // if there are no errors continue with the reg
    {
            //insert user info to database
        $success = register_user($_POST)
        if ($success)
        {
            $_SESSION[ 'username' ] = $username;
            $_SESSION[ 'userid' ] = mysql_insert_id();
            header("location : $absPath.index.php ")
            die();
        }
        else 
        {
                $errors = 'internal database error try again' // if sql fails we get this error
        }
    }
    else
    {
            foreach($res as $value)
        {
            $errors.=$value; // $errors has  all the found errors
        }
    }
  }
  else {
      require 'form_errors.php';
      require 'models/registration.php';
    }
  }
  else {
    require 'views/register_form.php';
  }
  require 'views/footer.php';

?>
