<?php
    require 'models/connect.php';
    require 'views/header.php';
?>
    <a href="profiler.php?uid=<?php echo $_SESSION[ 'userid' ]; ?>" >
        My Profile
    </a>
    <a href="logout.php" >Αποσύνδεση</a>
<?php
    require 'views/footer.php';
?>
