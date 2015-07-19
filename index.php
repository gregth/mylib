<?php
   session_start();
  include_once "models/connect.php";
  echo "Hello ";
  ?>
  <a href="profiler.php?uid=<?php echo $_SESSION['userid'];?>
  ">
    My Profile
  </a>
   <a href="logout.php" > Αποσύνδεση </a>

