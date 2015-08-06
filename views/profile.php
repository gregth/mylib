<!--A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->
<div class="row profile">
    <div class="col-md-3">
        <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
            <img src="<?php echo $data[ 'img' ]; ?>" class="img-responsive" alt="Εικόνα Χρήστη" />
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    <?php echo $data[ 'firstname' ]." ". $data[ 'lastname' ];?>
                </div>
                <div class="profile-usertitle-job">
                    <?php echo $data[ 'username' ];?>
                </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
                <button type="button" class="btn btn-success btn-sm">Follow</button>
                <a type="button" class="btn btn-danger btn-sm" href="messages.php?discussant=<?php $_GET[ 'uid' ]; ?>">Επικοινωνία</a>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
                <ul class="nav">
                    <li class="active">
                        <a href="#">
                        <i class="glyphicon glyphicon-home"></i>
                        Overview </a>
                    </li>
                    <?php
                        if ( $_GET[ 'uid' ] == $_SESSION [ 'userid' ] ) {
                    ?>
                    <li>
                        <a href="editprofile.php?" data-toggle="modal" data-target="#MyModal" >
                        <i class="glyphicon glyphicon-user"></i>
                        Account Settings </a>
                    </li>
                    <?php
                        }
                    ?>
                    <li>
                        <a href="#" target="_blank">
                        <i class="glyphicon glyphicon-ok"></i>
                        Tasks </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="glyphicon glyphicon-flag"></i>
                        Help </a>
                    </li>
                </ul>
            </div>
            <!-- END MENU -->
        </div>
    </div>
    <div class="col-md-9">
        <div class="profile-content">
