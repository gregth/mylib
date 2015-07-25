<h1>Διαθέσιμα Βιβλία<h1>
<ul id="books">
<?php
    foreach ( $books as $id => $book ) {
?>
    <li>
        <h2><?php echo $book[ 'title' ]; ?></h2>
        <img src="<?php echo $book[ 'img' ]; ?>" />
        <p class="description" ><?php echo $book[ 'description' ]; ?></p>
<?php
        if ( isset( $addBookMode ) ) {
?>
        <a href="add_book_cp.php?bid=<?php echo $book[ 'bid' ] ?>">Δήλωση για ανταλλαγή</a>
<?php
        }
        else {
?>
        <a href="book.php?bid=<?php echo $id ?>">Διαβάστε περισσότερα</a>
    </li>
<?php
        }
    }
?>
</li>
