<?php
  require 'debug.php';
  require 'models/validation_functions.php';
  require 'views/header.php';
  if ( !empty( $_POST ) ) {
    $errors = get_data_errors( $_POST );
    if ( empty( $errors ) ) {
      //Proceed with the registration
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
