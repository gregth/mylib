<form method="POST" action="<?php echo createUrl( 'login.php', [], ['ref', 'bid', 'authors', 'uid' ] ); ?>" >
    <input type="text" name="email" placeholder="e-mail" />
    <input type="password" name="password" placeholder="Κωδικός" />
    <input type="submit" value="Σύνδεση" />
</form>
<ul class="login-alternatives" >
    <li>Ξεχάσατε τον κωδικό σας</li>
    <li><a href="register.php">Εγγραφή</a></li>
</ul>
