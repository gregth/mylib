<div class="group panel panel-default" >
    <h2 class="panel-heading">Τα βιβλία που ζητήσατε</h2>
    <ul class="list-group">
    <?php
    if ( empty( $requests[ 'from' ] ) ) {
    ?><li class="list-group-item" >Δεν έχετε ζητήσει κάποιο βιβλίο ακόμη</li><?php
    }
    foreach ( $requests[ 'from' ] as $request ) {
        ?><li class="list-group-item">Ζητήσατε από το χρήστη <a href="profiler.php?uid=<?php
        echo $request[ 'owner' ][ 'uid' ];
        ?>" ><?php
        echo $request[ 'owner' ][ 'username' ];
        ?></a> το βιβλίο <a href="bookcp.php?bcid=<?php
        echo $request[ 'bcid' ];
        ?>" ><?php echo $request[ 'title' ];
        ?></a>.
        </li><?php
    }
    ?></ul>
</div>
