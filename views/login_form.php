<div class="group" >
    <div class="container" >
        <form method="POST" action="<?php echo createUrl( 'login.php', [], ['red', 'bid', 'authors', 'uid', 'bcid' ] ); ?>" >
            <input type="text" name="email" placeholder="e-mail" />
            <input type="password" name="password" placeholder="Κωδικός" />
            <input type="submit" value="Σύνδεση" />
        </form>
        <ul class="login-alternatives" >
            <li>Ξεχάσατε τον κωδικό σας</li>
            <li><a href="register.php">Εγγραφή</a></li>
        </ul>
    </div>
</div>
