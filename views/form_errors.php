<div class="group" >
    <div class="container" >
        <?php
            if ( !empty( $errors ) ) {
        ?>
        <ul class="errors" >
        <?php
                foreach( $errors as $error ) {
        ?>
            <li><?php echo $error ?></li>
        <?php
                }
            }
        ?>
        </ul>
    </div>
</div>
