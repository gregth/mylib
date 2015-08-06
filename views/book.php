<div class"group" id="book-full">
    <h1><?php echo $book[ 'title' ]; ?></h1>
    <div class="inner-group">
        <h2>Στοιχεία βιβλίου</h2>
        <img  class="card" src="<?php echo $book[ 'image' ]; ?>" />
        <div class="details">
        <h3>Περίληψη Βιβλίου</h3>
        <p ><?php echo $book[ 'description' ]; ?></p>
        <h3>Συγγραφείς</h3>
        <ul id="authors">
        <?php
            foreach ( $book[ 'authors' ] as $author => $bool ) {
        ?>
                <li><?php echo $author; ?></li>
        <?php
            }
        ?>
        </ul>
        <h3>Κατηγορίες</h3>
        <ul id="genres">
        <?php
            foreach ( $book[ 'genres' ] as $genre => $bool ) {
        ?>
                <li><?php echo $genre; ?></li>
        <?php
            }
        ?>
        </ul>
    </div>
    </div>
</div>
