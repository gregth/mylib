<h1><?php echo $book[ 'title' ]; ?></h1>
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
