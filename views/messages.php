<div class="col-md-7" >
    <div class="group panel panel-default" >
        <div class="panel-heading">
            <h1>Συνομιλία</h1>
            <p>Χρησιμοποιήστε τη συνομιλία για να ρυθμίσετε τον τρόπο αποστολής</p>
        </div>
        <ul class="list-group"><?php
            if ( empty($messages ) ) {
                ?><li class="list-group-item">Δεν υπάρχει κανένα μήνυμα μέχρι στιγμής.</li><?php
            }
            else {
                foreach ( $messages as $message ) {
                    ?><li class="list-group-item">
                        <p><?php echo $message[ 'message' ]; ?></p>
                        <span>γράφτηκε από</span>
                        <span><?php
                        echo $message[ 'senter' ];
                        ?></span><span><?php
                        if ( $message[ 'seen' ] )
                            echo 'seen';
                        ?></span>
                    </li><?php
                }
            }
        ?></ul>
        <form action="messages.php?addmsg=1&discussant=<?php echo $_GET[ 'discussant' ];?>" method="post" >
            <textarea name = "message" placeholder="Πληκτρολογήστε εδώ το μήνυμα σας"></textarea>
            <input type = "submit" value = "Αποστολή">
        </form>
    </div>
</div>
<div class="col-md-5"><?php
    require 'views/message_requests.php';
?></div>
