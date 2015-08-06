<div id="top-bar" >
    <div class="wrapper container" >
        <ul class="inline left" >
            <li id="home" ><a href="index.php" >Αρχική</a></li>
            <li id="books" ><a href="book.php" >Βιβλία</a></li>
        </ul>
        <div class="searchBox">
            <form action = "book_search.php" method="post" enctype="multipart/form-data">
                <input type ="text" name = "userQuery"  placeholder = "Αναζήτηση">
            </form>
        </div>
        <ul class="inline right" ><?php
            if ( isset( $_SESSION[ 'userid' ] ) ) {
                ?><li ><a href="activity.php">Δραστηριότητα</a></li>
                <li class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php
                        echo $_SESSION[ 'username' ];
                        ?><span class="caret"></span>
                    </button>
                    <ul class="group-list dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li class="group-list-item">
                            <a href="profiler.php?uid=<?php
                             echo $_SESSION[ 'userid'  ];
                             ?>">Προφίλ</a>
                        </li>
                        <li class="group-list-item"><a href="logout.php">Αποσύνδεση</a></li>
                     </ul>
                </li><?php
            }
            else {
                ?><li id="login"><a href="login.php">Σύνδεση / Εγγραφή</a></li><?php
            }
        ?></ul>
    </div>
</div>
<?php require "views/edit_profile_modal.php";?>
