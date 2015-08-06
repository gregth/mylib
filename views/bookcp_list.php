<div class="panel panel-default">
    <h2 class="panel-heading">Αντίτυπα προς ανταλλαγή</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Εικονα αντιτύπου</td>
                <td>Τίτλος</td>
                <td>Χρήστης που το διαθέτει</td>
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
            <td><a href="profiler.php?uid=<?php echo $bookCopy[ 'owner' ][ 'uid' ]; ?>"><?php echo $bookCopy[ 'owner' ][ 'username' ]; ?></a></td>
            <td><?php echo formatDate( $bookCopy[ 'timeCreated' ] ); ?></td>
            <td><?php
                if( $bookCopy[ 'given' ] ) {
                    ?>Δόθηκε στον/στην <a href="profiler.php?uid=<?php echo $bookCopy[ 'receiver' ][ 'uid' ]; ?>"><?php echo $bookCopy[ 'receiver' ][ 'username' ]; ?></a>.<?php
                }
                else {
                    ?><a href="request.php?bcid=<?php echo $bookCopy[ 'bcid' ]; ?>">Το θέλω!</a><?php
                }
            ?></td>
        </tr><?php
            }
    }
?></div>
    <tr class="center">
        <td colspan="5" class="center"><a class="btn btn-primary full-width" role="button" href="<?php echo createUrl( 'add_book_cp.php', [], [ 'bid' ] ); ?>">Δήλωσε αντίτυπο του βιβλίου για ανταλλαγή</a></td>
    </tr>
    </tbody>
    </table>
</div>
<script src="js/popover.js"></script>
