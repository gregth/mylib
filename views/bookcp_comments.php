<div class="group" id=comment-form >
    <div class="container" >
        <h2>Aφήστε το σχόλιο σας:</h2>
        <form action = "<?php echo createUrl( 'addcomment.php', [], [ 'bcid', 'uid' ] ); ?>" method = "post">
            <input type = "text" name = "comment" placeholder = "Πληκτρολογήστε εδώ το σχόλιό σας"/>
            <input type = "submit" value = "Προσθήκη σχολίου">
        </form>
    </div>
</div>
<div class="group" id=comment-form >
    <div class="container" >
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
                    <li>
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
</div>

