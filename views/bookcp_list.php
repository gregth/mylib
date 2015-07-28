<div>
    <h2>Βιβλία προς ανταλλαγή</h2>
    <ul>
        <?php
            if ( !$bookCopies ) {
                echo 'No books found';
            }
            else {
                foreach ($bookCopies as $bookCopy ) {
        ?>
        <li><a href="<?php echo 'bookcp.php?bcid=' . $bookCopy[ 'bcid' ];?>"><?php  echo $bookCopy[ 'title' ];?></a></li>
        <?php
                }
            }
        ?>
    </ul>
</div>
