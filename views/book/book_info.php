<div id="book" class="group panel panel-default">
    <h2 class="panel-heading">Στοιχεία βιβλίου</h2>
    <div class="inner-group panel-body">
        <div class="row">
            <div class="card col-md-4">
                <img src="<?php echo $book[ 'image' ]; ?>" />
            </div>
            <div class="details col-md-8">
                <h3>Περίληψη Βιβλίου</h3>
                <p ><?php echo $book[ 'description' ]; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" >
                <h3>Συγγραφείς</h3>
                <ul class="list-group genres"><?php
                    foreach ( $book[ 'authors' ] as $author => $bool ) {
                        ?><li class="list-group-item"><?php echo $author; ?></li><?php
                    }
                ?></ul>
            </div>
            <div class="col-md-6" >
                <h3>Κατηγορίες</h3>
                <ul class="list-group genres"><?php
                    foreach ( $book[ 'genres' ] as $genre => $bool ) {
                        ?><li class="list-group-item"><?php echo $genre; ?></li><?php
                    }
                ?></ul>
            </div>
        </div>
    </div>
</div>
