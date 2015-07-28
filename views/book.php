<div class"group" >
    <div class="container" >
        <h2><?php echo $book[ 'title' ]; ?></h1>
        <img src="<?php echo $book[ 'image' ]; ?>" />
        <p><?php echo $book[ 'description' ]; ?></p>
        <ul id="authors" >
        <?php
            foreach ( $book[ 'authors' ] as $author => $bool ) {
        ?>
                <li><?php echo $author; ?></li>
        <?php
            }
        ?>
        </ul>
        <ul id="genres" >
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
