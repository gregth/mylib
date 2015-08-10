<ul id="book-copy-tabs" class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="tab" href="#book">Στοιχεία Βιβλίου</a></li>
    <li><a data-toggle="tab" href="#comments">Ερωτήσεις</a></li>
</ul>

<div class="tab-content">
    <div id="book" class="tab-pane fade in active"><?php
        require 'views/book/book_info.php';
    ?></div>
    <div id="comments" class="tab-pane fade"><?php
        require 'views/book_cp/comments.php';
    ?></div>
</div>
