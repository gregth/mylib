<?php
    require '/var/www/html/projects/mylib/models/debug.php';
    function formPrint( $var ) {
        echo '<pre>';
        var_dump( $var );
        echo '</pre>';
    }
    require 'connect.php';
?>
