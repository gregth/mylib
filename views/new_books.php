<div class="group panel panel-default" >
    <h2 class="panel-heading">Νέα βιβλία σε περιμένουν να τα διαβάσεις!</h2>
    <div class="panel-body">
        <ul id="latest-books" ><?php
            foreach ( $books as $book ) {
                ?><li class="thumbnail col-md-3 col-sm-6 book-thumbnail">
                    <a href="book.php?bid=<?php
                    echo $book[ 'bid' ];
                    ?>"><img src="<?php
                    echo $book[ 'image' ]
                    ?>" class="book-tumbnail" /><h3><?php
                    echo $book [ 'title' ] ?></h3>
                    </a>
                </li><?php
            }
        ?></ul>
    </div>
</div>
