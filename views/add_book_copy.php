<h1><?php
    echo $book[ 'title' ];
?></h1>
<div class="row">
    <div class="col-md-5"><?php
        require 'views/book_copy_form.php';
    ?></div>
    <div class="col-md-7"><?php
        require 'views/book.php';
    ?></div>
</div>
