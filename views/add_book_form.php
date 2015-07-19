<div>Συμπληρώστε τα επίσημα στοιχεία του αρχικού βιβλίου</div>
<form action="add_book.php" method="post" enctype="multipart/form-data" >
    <input type="text" name="title" id="title" placeholder="Τίτλος Βιβλίου" />
    <input type="text" name="description" id="description" placeholder="Περίληψη Βιβλίου" />
    <input type="file" name="cover_img" id="cover_img" placeholder="Εικόνα Εξωφύλλου" />
    <?php
        $num = getAuthorsNum( $_GET );
        for ( $i = 0; $i < $num; $i++ ) {
    ?>
            <input type="text" name="author<?php echo $i ?>" placeholder="Συγγραφέας" />
    <?php
        }
    ?>
    <input type="hidden" value="<?php echo $num ?>" name="authors_num" />
    <?php
        $num = getGenresNum( $_GET );
        for ( $i = 0; $i < $num; $i++ ) {
    ?>
            <input type="text" name="genre<?php echo $i ?>" placeholder="Είδος Βιβλίου" />
    <?php
        }
    ?>
    <input type="text" name="title" id="ISBN" placeholder="ISBN" />
    <input type="submit" value="Καταχώρυση Βιβλίου" />
    <input type="hidden" value="<?php echo $num ?>" name="genres_num" />
</form>
