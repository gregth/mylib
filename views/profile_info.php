<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Στοιχεία χρήστη</h2>
        <p>Μερικές πληροφορίες για το χρήστη</p>
    </div>
    <ul class="list-group">
        <li class="list-group-item">Ονοματεπώνυμο : <?php
            echo $data[ 'firstname' ] . ' '. $data[ 'lastname' ];
        ?></li>
        <li class="list-group-item">Όνομα Χρήστη : <?php
            echo $data[ 'username' ];
        ?></li>
        <li class="list-group-item">E-mail : <?php
            echo $data[ 'email' ];
        ?></li>
    </ul>
</div>
