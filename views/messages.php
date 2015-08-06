<div class="group" >
    <h1>Συνομιλία</h1>
    <p>Χρησιμοποιήστε τη συνομιλία για να ρυθμίσετε τον τρόπο αποστολής</p>
    <ul>
        <?php
                 if ( empty($messages ) ) {
        ?>
        <li>Δεν υπάρχει κανένα μήνυμα μέχρι στιγμής</li>
        <?php
                }
                else {
                    foreach ( $messages as $message ) {
        ?>
        <li>
            <p><?php echo $message[ 'message' ]; ?></p>
            <span>γράφτηκε από</span>
            <span><?php echo $message[ 'senter' ]; ?></span>
            <span><?php if( $message[ 'seen' ] ) echo 'seen';?></span>
        </li>
        <?php
                    }
                }
        ?>
    </ul>
    <form action="messages.php?addmsg=1&discussant=<?php echo $_GET[ 'discussant' ];?>" method="post" >
        <textarea name = "message" placeholder="Πληκτρολογήστε εδώ το μήνυμα σας"></textarea>
        <input type = "submit" value = "Αποστολή">
    </form>
</div>
