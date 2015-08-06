<?php
    if ( $showTitle ) {
?>
<h1 ><?php echo $book[ 'title' ]; ?></h1>
<?php
    }
?>
<div class="group panel panel-default" id="book-full">
    <h2 class="panel-heading">Στοιχεία βιβλίου</h2>
    <div class="inner-group panel-body">
        <div class="card">
            <img src="<?php echo $book[ 'image' ]; ?>" />
        </div>
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
