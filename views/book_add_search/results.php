<div class="panel panel-default">
    <h2 class="panel-heading">Αποτελέσματα</h2>
    <ul class="list-group" id="books"><?php
        if ( empty( $_GET[ 'search' ]  ) ) {
            ?><li class="list-group-item">Κάντε αναζήτηση για να δείτε αποτελέσματα</li><?php
        }
        else if ( !$books ) {
            ?><li class="list-group-item">Κανένα βιβλίο με αυτούς τους όρους αναζήτησης.<br/>Δοκιμάστε άλλη αναζήτηση ή προσθέστε εσείς το βιβλίο.<br/>
                <a href="add_book.php?red=add_book_cp">Προσθήκη στοιχείων νέου βιβλίου</a>
            </li><?php
        }
        else {
            ?><li class="list-group-item">Aν κανένα βιβλίο δεν αντιστοιχεί σε αυτό που ψάχνετε, προσθέστε εσείς τα στοιχεία του.<br/>
                <a href="add_book.php?red=add_book_cp">Προσθήκη στοιχείων νέου βιβλίου</a>
            </li><?php
            foreach ( $books as $id => $book ) {
                ?><li class="list-group-item book-preview">
                    <div class="row" >
                    <div class="card col-md-4">
                        <img src="<?php echo $book[ 'img' ]; ?>" />
                    </div>
                    <div class="details col-md-8">
                        <h2><?php echo $book[ 'title' ]; ?></h2>
                        <p class="description"><?php
                        echo $book[ 'description' ];
                        ?></p>
                        <a href="add_book_cp.php?bid=<?php
                        echo $book[ 'bid' ];
                        ?>">Επιλογή</a>
                    </div>
                    </div>
                </li><?php
            }
        }
    ?></ul>
</div>
