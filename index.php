<?php
    require 'models/connect.php';
    require 'views/header.php';
?>
    <a href="profiler.php?uid=<?php echo $_SESSION[ 'userid' ]; ?>" >
        My Profile
    </a>
    <a href="logout.php" >Αποσύνδεση</a>
    <div class="searchBox">
        <form action = "book_search.php" method="post" enctype="multipart/form-data">
            <input type ="text" name = "userQuery"  placeholder = "Αναζήτηση">
        </form>
    </div>
<?php
    require 'views/footer.php';
?>
