<div class="group" >
    <div class="container" >
        <h2>Βιβλία προς ανταλλαγή</h2>
        <ul>
            <?php
                if ( !$bookCopies ) {
            ?>
                    <li>Κανένα βιβλίο προς ανταλλαγή</li>
            <?php
                }
                else {
            ?>
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                <td>Τίτλος</td>
                                <td>Χρήστης που το διαθέτει</td>
                                <td>Ημερομηνία Καταχώρυσης</td>
                                <td>Εικονα αντιτύπου</td>
                            </tr>
                        </thead>
                        </tbody>
            <?php
                    foreach ($bookCopies as $bookCopy ) {
            ?>
            <tr>
                <td><a href="<?php echo 'bookcp.php?bcid=' . $bookCopy[ 'bcid' ];?>"><?php  echo $bookCopy[ 'title' ];?></a></td>
                <td><a href="profiler.php?uid=<?php echo $bookCopy[ 'uid' ]; ?>"><?php echo $bookCopy[ 'username' ]; ?></a></td>
                <td><?php echo $bookCopy[ 'timecreated' ] ?></td>
                <td><img id="bcopy-thumbnail" src="<?php echo $bookCopy[ 'image' ]; ?>"/></td>
            <tr>
            <?php
                    }
            ?>
                        </tbody>
                    </table>
                    <div><a href="add_book_cp.php?bid=<?php echo $_GET[ 'bid' ]; ?>" >Δήλωσε αντίτυπο του βιβλίου για ανταλλαγή</a></div>
            <?php
                }
            ?>
        </ul>
    </div>
</div>
