<div class="group" >
    <div class="container">
        <h1>Αντύτυπο βιβλίου "<?php echo $bcopy[ 'title' ]; ?>"</h1>
        <h2>Πληροφορίες για το αντίτυπο</h2>
        <div class="card" >
            <img src = "<?php echo $bcopy[ 'image' ]; ?>"/>
            <h3>Εικόνα αντιτύπου<h3>
        </div>
        <div class="details" >
            <div>
                <h3>Κάτοχος</h3><a href="profiler.php?uid=<?php echo $bcopy[ 'owner' ][ 'uid' ]; ?>" ><?php echo $bcopy[ 'owner' ][ 'username' ]; ?></a>
            </div>
            <div>
                <h3>Περιγραφή</h3><p><?php echo $bcopy[ 'description' ];?></p>
            </div>
        </div>
        <form method="POST" action="<?php echo createUrl( 'request.php', [], [ 'bcid' ] ); ?>"  >
            <input type="submit" value="Το θέλω!" />
        </form>
    </div>
</div>
