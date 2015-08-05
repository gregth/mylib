<div class="group" id="comment-form">
    <div class="container">
        <h2><?php
                if ( $page == 'profile' ) {
                    ?>Σχόλια για το χρήστη<?php
                }
                else {
                    ?>Σχόλια ή απορίες για το το αντίτυπο
                <?php
                    }
                ?>
            </h2>
         <ul>
                <?php
                     if ( empty($comments ) ) {
                 ?>
                    <li class="comment">Δεν υπάρχει κανένα σχόλιο μέχρι στιγμής</li>
                <?php
                    }
                    else {
                        foreach ( $comments as $value ) {
                ?>
                    <li class="comment">
                        <p id="comment-body"><?php echo $value[ 'comment' ]; ?></p>
                        <span>γράφτηκε από</span>
                        <span id="author"><?php echo $value[ 'author' ]; ?></span>
                        <span> στις <span><?php echo formatDate( $value[ 'time' ] ); ?>
                    </li>
                <?php
                        }
                    }
                ?>
         </ul>
        <form action = "<?php echo createUrl( 'add_comment.php', [], [ 'bcid', 'uid' ] ); ?>" method = "post">
            <textarea name = "comment" placeholder="Γράψε τώρα το σχόλιό σου..."></textarea>
            <input type = "submit" value = "Προσθήκη">
        </form>
    </div>
</div>
