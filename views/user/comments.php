<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Σχόλια</h2>
        <p>Εδώ μπορείς να διαβάσεις αξιλογήσεις και σχόλια για το χρήστη.</p>
    </div>
    <ul class="list-group"><?php
        if ( empty($comments ) ) {
             ?><li class="comment">Δεν υπάρχει κανένα σχόλιο μέχρι στιγμής</li><?php
        }
        else {
            foreach ( $comments as $comment ) {
                ?><li class="list-group-item">
                    <p id="comment-body"><?php
                    echo $comment[ 'comment' ];
                    ?><div id="author-details" >
                        </p><span>γράφτηκε από</span>
                        <a href="profiler.php?uid=<?php
                        echo $comment[ 'author' ][ 'uid' ];
                        ?>" id="author"><?php
                        echo $comment[ 'author' ][ 'username' ];
                        ?></a>
                        <span> στις <span><?php
                        echo formatDate( $comment[ 'time' ] );
                    ?></div>
                </li><?php
            }
         }
    ?></ul>
    <div class="panel-body">
        <form action = "<?php
            echo createUrl( 'add_comment.php', [], [ 'bcid', 'uid' ] );
            ?>" method = "post">
            <textarea name = "comment" placeholder="Γράψε τώρα το σχόλιό σου..."></textarea>
            <input type = "submit" value = "Προσθήκη" class="btn btn-primary" >
        </form>
    </div>
</div>
