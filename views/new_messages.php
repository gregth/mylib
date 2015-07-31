<div>
    Έχετε νέα μηνύματα απο :
    <ul>
        <?php
            foreach ($newmsg as $value) {
        ?>
            <li>
                <a href="<?php echo 'messages.php?discussant='.$value[ 'senterid' ];?>">
                <?php echo $value[ 'username'];?>
                </a>
            </li>
        <?php
            }
        ?>
    </ul>
    
</div>
