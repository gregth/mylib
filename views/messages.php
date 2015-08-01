<div>
Μηνύματα:
    <ul>
        <?php
                 if ( empty($messages ) ) {
        ?>
        <li>Δεν υπάρχει κανένα σχόλιο μέχρι στιγμής</li>
        <?php
                }
                else {
                    foreach ( $messages as $value ) {
        ?>
        <li>
            <p><?php echo $value[ 'message' ]; ?></p>
            <span>γράφτηκε από</span>
            <span><?php echo $value[ 'senter' ]; ?></span>
            <span><?php if( $value[ 'seen' ] ) echo 'seen';?></span>
        </li>
        <?php
                    }
                }
        ?>
    </ul>
<form action="messages.php?addmsg=1&discussant=<?php echo $_GET[ 'discussant' ];?>" method="post" >
    <input type = "text" name = "message" placeholder = "Πληκτρολογήστε εδώ το μήνυμα σας"/>
    <input type = "submit" value = "Αποστολή">
</form>

</div>
