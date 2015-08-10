<div class="panel panel-default">
    <h2 class="panel-heading" >Πληροφορίες για το αντίτυπο</h2>
    <div class="panel-body">
        <div class="card">
            <img src = "<?php echo $bcopy[ 'image' ]; ?>" />
            <h3>Εικόνα αντιτύπου<h3>
        </div>
        <div class="details">
            <div>
                <h3>Κάτοχος</h3><a href="profiler.php?uid=<?php echo $bcopy[ 'owner' ][ 'uid' ]; ?>"><?php echo $bcopy[ 'owner' ][ 'username' ]; ?></a>
            </div>
            <div>
                <h3>Περιγραφή</h3><p><?php echo $bcopy[ 'description' ];?></p>
            </div>
        </div>
        <a href="<?php echo createUrl( 'request.php', [], [ 'bcid' ] ); ?>" class="full-width btn btn-primary">Το θέλω!</a>
    </div>
</div>
