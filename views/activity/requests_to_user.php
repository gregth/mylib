<div class="group panel panel-default" >
    <h2 class="panel-heading">Τα βιβλία που σας ζήτησαν</h2>
    <ul class="list-group">
    <?php
    if ( empty( $requests[ 'to' ] ) ) {
    ?><li class="list-group-item">Κανένας χρήστης δε σας έχει ζητήσει κάποιο βιβλίο ακόμη</li><?php
    }
    foreach ( $requests[ 'to' ] as $request ) {
        ?><li class="list-group-item">Ο χρήστης <a href="profile.php?uid=<?php
        echo $request[ 'uid' ];
        ?>" ><?php
        echo $request[ 'username' ];
        ?></a> ζήτησε από εσάς το βιβλίο <a href="bookcp.php?bcid=<?php
        echo $request[ 'bcid' ];
        ?>" ><?php
        echo $request[ 'title' ];
        ?></a><a class="btn btn-primary btn-sm right" role="button" href="messages.php?discussant=<?php
        echo $request[ 'uid' ];
        ?>" >Επικοινωνία & Αποστολή Βιβλίου</a>
        </li><?php
    }
    ?></ul>
</div>
