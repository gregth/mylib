<div class="row">
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Στοιχεία σύνδεσης</h2>
                <p>Συμπληρώστε τα στοιχεία σας για να συνδεθείτε</p>
            </div>
            <div class="panel-body">
                <form method="POST" action="<?php echo createUrl( 'login.php', [], ['red', 'bid', 'authors', 'uid', 'bcid' ] ); ?>">
                    <label for="email">E-mail</label>
                    <input id="email" type="text" name="email" placeholder="e-mail" />
                    <label for="password">Κωδικός</label>
                    <input type="password" name="password" placeholder="Κωδικός" />
                    <input type="submit" value="Σύνδεση" />
                </form>
                <ul class="login-alternatives">
                    <li>Ξεχάσατε τον κωδικό σας</li>
                    <li><a href="register.php">Εγγραφή</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
