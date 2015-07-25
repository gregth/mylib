<div id="top-bar" >
    <div class="wrapper" >
        <ul>
            <li id="home" >Αρχική</li>
            <?php
                if ( isset( $_SESSION[ 'userid' ] ) ) {
            ?>
            <li id="user" ><?php echo $_SESSION[ 'username' ] ?></li>
            <?php
                }
            ?>
        </ul>
    </div>
</div>
