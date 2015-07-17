<?php

  //Returns true if string contains valid characthers, otheerwise false
  function validateNames( $string ) {
    if ( preg_match( "/^[a-zA-ΖΑ-Ωα-ωάόώήύίέΆΌΏΉΎΊΈ]+$/", $string ) ) {
      echo "TRUE";
      return true;
    }
    echo "False";
    return false;
  }

  //Returns true if string contains valid characthers, otheerwise false
  function validateUsernames( $string ) {
    if ( preg_match( "/^[a-zA-Z0-9]+$/", $string ) ) {
      echo "TRUE";
      return true;
    }
    echo "False";
    return false;
  }


  //Returns an empty map if data are valid, otherwise a map with error messages
  function get_errors( $data ) {
    $messages;
  }


?>
