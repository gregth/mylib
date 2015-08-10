<div class="panel panel-default">
    <div class="panel-heading">
        <h1>Καταχώρηση αντιτύπου</h1>
        <p>Πείτε μας μερικά λόγια για το αντίτυπο που έχετε.</p>
    </div>
    <form class="panel-body" action = "<?php
    echo createUrl( 'add_book_cp.php', [], [ 'bid' ] );
    ?>" method = "POST" enctype="multipart/form-data">
        <textarea type = "text" name = "description"
            placeholder="Περιγράψτε την κατάσταση στην οποια βρίσκεται το αντίτυπο σας, τη γλώσσα και οτιδήποτε άλλο θεωρείτε σκόπιμο να αναφέρετε."></textarea>
        <label for="bcopyimage">Φωτογραφία του αντιτύπου</label>
        <input type = "file" name = "bcopyimage" id ="bcopyimg" /><br/>
        <input type = "submit" value = "Καταχώρηση αντιτύπου" class="btn btn-primary full-width" />
    </form>
</div>
