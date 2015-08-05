<div class="group" >
    <div class="container" >
        <h2>Τα βιβλία που σας ζήτησε</h2>
        <?php
        if ( empty( $requests[ 'to' ] ) ) {
        ?></li>Ο χρήστης δε σας έχει ζητήσει κάποιο βιβλίο ακόμη</li><?php
        }
        foreach ( $requests[ 'to' ] as $request ) {
            ?><li>Ο χρήστης <a href="profiler.php?uid=<?php
            echo $request[ 'uid' ];
            ?>" ><?php
            echo $request[ 'username' ];
            ?></a> ζήτησε από εσάς το βιβλίο <a href="bookcp.php?bcid=<?php
            echo $request[ 'bcid' ];
            ?>" ><?php
            echo $request[ 'title' ];
            ?></a></li><?php
        }
        ?></ul>
        <h2>Τα βιβλία που σας ζήτησε</h2>
        <?php
        if ( empty( $requests[ 'from' ] ) ) {
        ?></li>Δεν έχετε ζητήσει από το χρήστη κάποιο βιβλίο</li><?php
        }
        foreach ( $requests[ 'from' ] as $request ) {
            ?><li>Ζητήσατε από το χρήστη <a href="profiler.php?uid=<?php
            echo $request[ 'uid' ];
            ?>" ><?php
            echo $request[ 'username' ];
            ?></a> το βιβλίο <a href="bookcp.php?bcid=<?php
            echo $request[ 'bcid' ];
            ?>" ><?php
            echo $request[ 'title' ];
            ?></li><?php
        }
        ?></ul>
    </div>
</div>
