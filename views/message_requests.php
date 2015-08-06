<div class="group panel panel-default">
    <h2 class="panel-heading">Τα βιβλία που σας ζήτησε</h2>
    <ul class="list-group"><?php
        if ( empty( $requests[ 'to' ] ) ) {
            ?><li class="list-group-item">Δε σας έχει ζητήσει κάποιο βιβλίο ακόμη</li><?php
        }
        foreach ( $requests[ 'to' ] as $request ) {
            ?><li class="list-group-item">Ο χρήστης <a href="profiler.php?uid=<?php
            echo $request[ 'uid' ];
            ?>"><?php
            echo $request[ 'username' ];
            ?></a> ζήτησε από εσάς το βιβλίο <a href="bookcp.php?bcid=<?php
            echo $request[ 'bcid' ];
            ?>"><?php
            echo $request[ 'title' ];
            ?></a></li><?php
        }
    ?></ul>
</div>
<div class="group panel panel-default">
    <h2 class="panel-heading">Τα βιβλία που ζητήσατε</h2>
    <ul class="list-group"><?php
        if ( empty( $requests[ 'from' ] ) ) {
            ?><li class="list-group-item">Δεν έχετε ζητήσει από το χρήστη κάποιο βιβλίο</li><?php
        }
        foreach ( $requests[ 'from' ] as $request ) {
            ?><li class="list-group-item">Ζητήσατε από το χρήστη <a href="profiler.php?uid=<?php
            echo $request[ 'uid' ];
            ?>"><?php
            echo $request[ 'username' ];
            ?></a> το βιβλίο <a href="bookcp.php?bcid=<?php
            echo $request[ 'bcid' ];
            ?>"><?php
            echo $request[ 'title' ];
            ?></li><?php
        }
    ?></ul>
</div>
