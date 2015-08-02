<div class="group" >
    <div class="container">
        <h1>Αντύτυπο βιβλίου "<?php echo $bcopy[ 'title' ]; ?>"</h1>
        <ul>
            <li>Το αντίτυπο αυτό διατίθεται απο το χρήστη <a href="profiler.php?uid=<?php echo $bcopy[ 'uid' ]; ?>" ><?php echo $bcopy[ 'username' ]; ?></a></li>
            <li>
                <span>Εικόνα αντιτύπου:</span><img src = "<?php echo $bcopy[ 'image' ]; ?>"/>
            </li>
            <li>Σχόλια χρήστη που το διαθέτεi:<?php echo $bcopy[ 'description' ];?></li>
        </ul>
        <?php
            $bcopy[ 'state' ] = 1;
        ?>
        <form method="POST" action="<?php echo createUrl( 'transactions.php', [ 'state' => $bcopy[ 'state' ] ], [ 'bcid' ] ); ?>"  ><?php
            switch ( $bcopy[ 'state' ] ) {
                case 1:
            ?><input type="submit" value="Αγορά" /><?php
            } ?>
        </form>
    </div>
</div>
