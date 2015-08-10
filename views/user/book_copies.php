<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Βιβλία του χρήστη προς ανταλλαγή</h2>
        <p>Τα βιβλία που ο χρήστης διαθέτει για αναταλλαγή</p>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Φωτογραφία αντιτύπου</td>
                <td>Τίτλος</td>
                <td>Ημερομηνία Καταχώρυσης</td>
                <td>Πληροφορίες</td>
            </tr>
        </thead>
        <tbody><?php
            if ( !$bookCopies ) {
                ?><tr>
                    <td colspan="5">Κανένα αντίτυπο διαθέσιμο για ανταλλαγή</td>
                </tr><?php
            }
            else {
                foreach ($bookCopies as $bookCopy ) {
                    ?><tr>
                        <td><img id="bcopy-thumbnail" src="<?php echo $bookCopy[ 'image' ]; ?> "
                        data-toggle="popover" data-trigger="hover" title="Περιγραφή Χρήστη" data-poload="popover.php" data-content="<?php echo $bookCopy['description'];?>"/></td>
                        <td><a href="<?php echo 'bookcp.php?bcid=' . $bookCopy[ 'bcid' ];?>"><?php  echo $bookCopy[ 'title' ];?></a></td>
                        <td><?php echo formatDate( $bookCopy[ 'timeCreated' ] ); ?></td>
                        <td><?php
                        if( $bookCopy[ 'given' ] ) {
                            ?>Δόθηκε στον/στην <a href="profiler.php?uid=<?php
                            echo $bookCopy[ 'receiver' ][ 'uid' ];
                            ?>"><?php
                            echo $bookCopy[ 'receiver' ][ 'username' ]; ?></a>.<?php
                        }
                        else {
                            ?><a href="request.php?bcid=<?php echo $bookCopy[ 'bcid' ]; ?>">Το θέλω!</a><?php
                        }
                        ?></td>
                    </tr><?php
                }
            }
        ?></tbody>
    </table>
</div>
<script src="js/popover.js"></script>
