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
        <ul class="inline right" >
            <?php
                if ( isset( $_SESSION[ 'userid' ] ) ) {
            ?>
                    <li id="user" ><a href="profiler.php?uid=<?php echo $_SESSION[ 'userid' ] ?>" ><?php echo $_SESSION[ 'username' ] ?></a></li>
                    <li ><a href="activity.php">Δραστηριότητα</a></li>
                    <li><a href="logout.php">Αποσύνδεση</a></li>
            <?php
                }
                else {
            ?>
                    <li id="login"><a href="login.php">Σύνδεση / Εγγραφή</a></li>
            <?php
                }
            ?>
        </ul>
    </div>
</div>
<?php require "views/edit_profile_modal.php";?>
