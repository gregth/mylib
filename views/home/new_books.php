<div class="group panel panel-default" >
    <h2 class="panel-heading">Νέα βιβλία σε περιμένουν να τα διαβάσεις!</h2>
        <div class="row">
        <ul id="latest-books" ><?php
            foreach ( $books as $book ) {
                ?><li class="col-md-3 col-sm-6 book-thumbnail">
                    <div class="image-wrapper">
                        <a href="book.php?bid=<?php
                        echo $book[ 'bid' ];
                        ?>"><img src="<?php
                        echo $book[ 'image' ]
                        ?>" /></a>
                    </div>
                    <h3><?php
                    echo $book [ 'title' ] ?></h3>
                </li><?php
            }
        ?></ul>
    </div>
</div>
