<div class="group" >
    <h2 class="group-heading" >Νέα βιβλία σε περιμένουν να τα διαβάσεις!<h2>
    <ul id="latest-books" >
        <?php
            foreach ( $books as $book ) {
        ?>
                <li class="book-thumbnail" >
                    <a href="book.php?bid=<?php echo $book[ 'bid' ] ?>" >
                        <img src="<?php echo $book[ 'image' ] ?>" class="book-tumbnail" />
                        <h3><?php echo $book [ 'title' ] ?></h3>
                    </a>
                </li>
        <?php
            }
        ?>
    </ul>
</div>
