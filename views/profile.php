<div class="profle">
    <ul class="details">
    <li>Όνομα προφίλ χρήστη : <?php echo $data[ 0 ];?></li>
    <li>Όνοματεπώνυμο χρήστη : <?php echo $data[ 1 ]." ". $data[ 2 ];?> </li>
    <li>Διέυθυνση ηλεκτρονικού ταχυδρομείου : <?php echo $data[ 3 ] ?></li>
    <?php
        if ( $_GET[ 'uid' ] == $_SESSION [ 'userid' ] ) {
            echo '<li>';
            echo '<a href="editprofile.php">Επεξεργασία Προφίλ</a>';
            echo '</li>';
        }
    ?>
    </ul>
<div>

