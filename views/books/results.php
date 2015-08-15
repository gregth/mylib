<?php
    if ( empty( $books ) ) {
        echo 'Το βιβλίο που αναζητήσατε δεν βρέθηκε';
    }
    else {
        foreach ( $books as $id => $book ) {
            ?><div id="books" class="panel panel-default">
                <h2 class="panel-heading"><?php echo $book[ 'title' ]; ?></h2>
                <div class="row">
                    <div class=" col-md-4">
                        <div class="image-wrapper">
                            <img src="<?php echo $book[ 'img' ]; ?>" />
                        </div>
                    </div>
                    <div class="details col-md-8">
                        <p class="description"><?php echo $book[ 'description' ]; ?></p>
                        <a  class="btn btn-default" href="book.php?bid=<?php echo $id ?>">Δείτε περισσότερα</a>
                    </div>
                </div>
            </div><?php
        }
    }
?>
