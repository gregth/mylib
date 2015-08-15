<?php
    if ( empty( $_GET[ 'search' ]  ) ) {
        ?><div class="panel panel-default prompt" class="list-group-item">
            <div class="panel-body">
                Κάντε αναζήτηση για να δείτε αποτελέσματα.
            </div>
        </div><?php
    }
    else if ( !$books ) {
        ?><div class="panel panel-default prompt" class="list-group-item">
            <div class="panel-body">
                Κανένα βιβλίο με αυτούς τους όρους αναζήτησης.<br/>Δοκιμάστε άλλη αναζήτηση ή προσθέστε εσείς το βιβλίο.<br/>
                <a href="add_book.php?red=add_book_cp">Προσθήκη στοιχείων νέου βιβλίου</a>
            </div>
        </div><?php
    }
    else {
        ?><div class="panel panel-default prompt" class="list-group-item">
            <div class="panel-body">
                Aν κανένα βιβλίο δεν αντιστοιχεί σε αυτό που ψάχνετε, προσθέστε εσείς τα στοιχεία του.<br/>
                <a href="add_book.php?red=add_book_cp">Προσθήκη στοιχείων νέου βιβλίου</a>
            </div>
        </div>
        <div class="add-book-list"><?php
            foreach ( $books as $id => $book ) {
                ?><div class="panel panel-default">
                    <h2 class="panel-heading"><?php echo $book[ 'title' ]; ?></h2>
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-md-4">
                                <div class="image-wrapper">
                                    <img src="<?php echo $book[ 'img' ]; ?>" />
                                </div>
                            </div>
                            <div class="details col-md-8">
                                <p class="description"><?php echo $book[ 'description' ]; ?></p>
                                <a  class="btn btn-danger" href="book.php?bid=<?php echo $id ?>">Επιλογή</a>
                            </div>
                        </div>
                    </div>
                </div><?php
            }
        ?></div><?php
    }
?>
