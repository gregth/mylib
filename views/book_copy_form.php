<form action = "add_book_cp.php<?php if ( isset( $_GET[ 'bid' ] ) ) echo '?bid=' . $_GET[ 'bid' ] ?>" method = "POST" >
    Description :
    <input type = "text" name = "description" placeholder = "Add a description ..."/>
    Image :
    <input type = "file" name = "userImage" placeholder = "Upload your image"/>
    <input type = "submit" value = "Add"/>
</form>
