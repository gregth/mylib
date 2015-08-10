<div class="col-md-8">
    <h1>Καταχώρηση Βιβλίου</h1>
    <div class="panel panel-default" >
        <div class="panel-heading" >
            <h2>Στοιχεία Βιβλίου</h2>
            <p>Συμπληρώστε τα επίσημα στοιχεία του αρχικού βιβλίου</p>
        </div>
        <form class="panel-body" action="<?php
        echo createUrl( 'add_book.php', [], [ 'red', 'authors' ] );
        ?>" method="post" enctype="multipart/form-data">
            <label for="title">Τίτλος Βιβλίου</label>
            <input type="text" name="title" id="title" class="form-control input-lg" placeholder="Γράψτε τον επίσημο τίτλο του βιβλίου" />
            <label for="description">Περιγραφή</label>
            <textarea name="description" id="description" class="form-control" placeholder="Πληκτρολογήστε την επίσημη περιγραφή του βιβλίου"></textarea>
            <label for="cover_img">Εικόνα Εξωφύλλου</label>
            <input type="file" name="cover_img" id="cover_img" />
            <label for="authors[]">Συγγραφέας</label><?php
            for ( $i = 0; $i < $authorsNum; $i++ ) {
                ?><input type="text" name="authors[]" placeholder="Συγγραφέας" class="input-lg" /><?php
            }
            ?><label for="genres[]">Κατηγορίες</label>
            <select multiple="multiple" name="genres[]"id="add-book"><?php
                foreach ( $genres as $id => $genre ) {
                    ?><option value="<?php echo $id; ?>"><?php echo $genre; ?></option><?php
                }
            ?></select>
            <input class="btn btn-primary" type="submit" value="Συνέχεια" />
        </form>
    </div>
</div>
