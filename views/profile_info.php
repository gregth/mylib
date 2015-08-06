<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Στοιχεία χρήστη</h2>
        <p>Μερικές πληροφορίες για το χρήστη</p>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="glyphicon glyphicon-font"></span>
            Ονοματεπώνυμο : <?php
            echo $data[ 'firstname' ] . ' '. $data[ 'lastname' ];
        ?></li>
        <li class="list-group-item">
            <span class="glyphicon glyphicon-user"></span>
            Όνομα Χρήστη : <?php
            echo $data[ 'username' ];
        ?></li>
        <li class="list-group-item">
            <span class="glyphicon glyphicon-envelope"></span>
             E-mail : <?php
            echo $data[ 'email' ];
        ?></li>
        <li class="list-group-item">
            <span class="glyphicon glyphicon-time"></span>
            Ημερομηνία εγγραφής : <?php
            echo formatDate( $data[ 'registerTime' ] );
        ?></li>
    </ul>
</div>
