<h1>Αποτελέσματα Αναζήτησης</h1>
<ul class = "searhResults">
<?php
    if( $searchResults ) {
        foreach ( $searchResults as $book ) {
?>
            <li>
                <a href="book.php?id=<?php echo $book[ 'bid' ] ?>">
                    <h2><?php echo $book[ 'title' ]; ?></h2>
                </a>
            </li>
<?php
        }
    }
    else {
        echo '<li class = "noResult">No books found</li>';
    }
?>
</ul>
