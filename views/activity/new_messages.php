<div class="panel panel-default">
    <h2 class="panel-heading">Νέα Μηνύματα</h2>
    <ul class="list-group"><?php
        foreach ( $messages as $message ) {
            ?><li class="list-group-item">Έχετε μήνημα από τον/την <a href="messages.php?discussant=<?php
            echo $message[ 'senterid' ];
            ?>"><?php
            echo $message[ 'username'];
            ?></a></li><?php
        }
    ?></ul>
</div>
