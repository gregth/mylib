<div class="group" id=comment-form >
    <h2>Aφήστε το σχόλιο σας για το χρήστη:</h2>
    <form action = "<?php echo createUrl( 'addcomment.php', [], [ 'bcid', 'uid' ] ); ?>" method = "post">
        <input type = "text" name = "comment" placeholder = "Πληκτρολογήστε εδώ το σχόλιό σας"/>
        <input type = "submit" value = "Προσθήκη σχολίου">
    </form>
</div>
<div>
    <h2>Σχόλια</h2>
     <ul>
            <?php
                 if ( empty($comments ) ) {
             ?>
                <li>Δεν υπάρχει κανένα σχόλιο μέχρι στιγμής</li>
            <?php
                }
                else {
                    foreach ( $comments as $value ) {
            ?>
                <li class="comment" >
                    <p id="comment-body"><?php echo $value[ 'comment' ]; ?></p>
                    <span>γράφτηκε από</span>
                    <span id="author"><?php echo $value[ 'author' ]; ?></span>
                </li>
            <?php
                    }
                }
            ?>
     </ul>
</div>

