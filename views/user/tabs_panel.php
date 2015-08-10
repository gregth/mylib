<div class="panel panel-default profile-sidebar">
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
        <?php if ( $_SESSION[ 'userid' ] != $_GET[ 'uid' ] ) { ?>
            <a type="button" class="btn btn-danger btn-sm" href="messages.php?discussant=<?php echo $_GET[ 'uid' ]; ?>">Επικοινωνία</a>
        <?php } ?>
    </div>
    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav">
            <li class="active">
                <a href="#info" target="_blank" data-toggle="tab">
                <i class="glyphicon glyphicon-home"></i>
                Γενικά στοιχεία</a>
            </li>
            <li>
                <a href="#bcopies" target="_blank" data-toggle="tab">
                    <i class="glyphicon glyphicon-book"></i>
                    Βιβλία
                </a>
            </li>
            <li>
                <a href="#comments" target="_blank" data-toggle="tab">
                    <i class="glyphicon glyphicon-comment"></i>
                    Σχόλια
                </a>
            </li><?php
            if ( $_GET[ 'uid' ] == $_SESSION [ 'userid' ] ) {
                ?><li>
                    <a href="#edit" target="_blank" data-toggle="tab"  >
                    <i class="glyphicon glyphicon-user"></i>
                    Επεξεργασία Προφίλ</a>
                </li><?php
            }
        ?></ul>
    </div>
</div>`
