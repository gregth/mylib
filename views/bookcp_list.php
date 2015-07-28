<div>
    Βιβλία χρήστη προς ανταλλαγή :
    <ul>
        <?php if ( !$bookCopies ) {
                echo 'No books found';
              }
              else {
                  foreach ($bookCopies as $value) {
        ?>
        <li><a href = "<?php echo 'bookcp.php?bcid='.$value[ 'bcid' ];?>"><?php  echo $value[ 'title' ] ;?></a></li>
        <?php     }
              }       ?>
    </ul>
</div>
