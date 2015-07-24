<h1>Διαθέσιμα Βιβλία<h1>
<ul id="books">
<?php
    foreach ( $books as $id => $book ) {
?>
    <li>
        <h2><?php echo $book[ 'title' ]; ?></h2>
        <img src="<?php echo $book[ 'image' ]; ?>" />
        <p class="description" ><?php echo $book[ 'description' ]; ?></p>
        <a href="book.php?id=<?php echo $id ?>">Διαβάστε περισσότερα</a>
    </li>
<?php
    }
?>
</li>
