<div class="group" >
    <div class="container" >
        <h1>Τα βιβλία που σας ζήτησαν</h1>
        <?php
        if ( empty( $requests ) ) {
        ?></li>Κανένας χρήστης δε σας έχει ζητήσει κάποιο βιβλίο ακόμη</li><?php
        }
        foreach ( $requests as $request ) {
            ?><li>Ο χρήστης <a href="profile.php?uid=<?php
            echo $request[ 'uid' ];
            ?>" ><?php
            echo $request[ 'username' ];
            ?></a> ζήτησε από εσάς το βιβλίο <a href="bookcp.php?bcid=<?php
            echo $request[ 'bcid' ];
            ?>" ><?php
            echo $request[ 'title' ];
            ?></a><a class="btn btn-default" role="button" href="messages.php?discussant=<?php
            echo $request[ 'uid' ];
            ?>" >Επικοινωνία & Αποστολή Βιβλίου</a>
            </li><?php
        }
        ?></ul>
    </div>
</div>
