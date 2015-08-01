<div class="group" >
    <div class="container" >
        <div class="profle">
            <img src="<?php echo $data[ 'img' ]; ?>" />
            <ul class="details">
            <li>Όνομα προφίλ χρήστη : <?php echo $data[ 'username' ];?></li>
            <li>Όνοματεπώνυμο χρήστη : <?php echo $data[ 'firstname' ]." ". $data[ 'lastname' ];?> </li>
            <li>Διέυθυνση ηλεκτρονικού ταχυδρομείου : <?php echo $data[ 'email' ] ?></li>
            <?php
                if ( $_GET[ 'uid' ] != $_SESSION [ 'userid' ] ) {
                    echo '<li>';
                    echo '<a href="messages.php?discussant='.$_GET[ 'uid' ].'">Προσωπικό μήνυμα </a>';
                    echo '</li>';
                }
                if ( $_GET[ 'uid' ] == $_SESSION [ 'userid' ] ) {
                    echo '<li>';
                    echo '<a href="editprofile.php">Επεξεργασία Προφίλ</a>';
                    echo '</li>';
                }
            ?>
            </ul>
        <div>
    </div>
</div>

