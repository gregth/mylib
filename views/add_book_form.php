<?php
    $genres = getGenres();
    $authorsNum = getAuthorsNum( $_GET );
?>
<div class="group">
    <div class="container">
        <div>Συμπληρώστε τα επίσημα στοιχεία του αρχικού βιβλίου</div>
        <form action="<?php echo createUrl( 'add_book.php', [], [ 'red', 'authors' ] ) ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="title" id="title" class="form-control input-lg" placeholder="Τίτλος Βιβλίου" />
            <textarea name="description" id="description" class="form-control">Περίληψη Βιβλίου</textarea>
              <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">


            <input type="file" name="cover_img" id="cover_img" placeholder="Εικόνα Εξωφύλλου" />
            <?php
                for ( $i = 0; $i < $authorsNum; $i++ ) {
            ?>
                    <input type="text" name="authors[]" placeholder="Συγγραφέας" />
            <?php
                }
            ?>
            <select multiple="multiple" name="genres[]"id="add-book">
            <?php
                foreach ( $genres as $id => $genre ) {
            ?>
              <option value="<?php echo $id; ?>"><?php echo $genre; ?></option>
            <?php
                }
            ?>
            </select>
            <input type="submit" value="Καταχώριση Βιβλίου" />

        </form>
    </div>
</div>
