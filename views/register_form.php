<div class="group" >
    <form id="regForm" method="POST" action="register.php" accept-charset="utf-8" enctype="multipart/form-data" >
        <input id="username" type="text" name="username" placeholder="Username" />
            <span id="errors1"></span>
        <input  id="name" type="text" name="first_name" placeholder="Όνομα" />
            <span id="errors2"></span>
        <input id="surname" type="text" name="last_name" placeholder="Επώνυμο" />
            <span id="errors3"></span>
        <input id="email" type="text" name="email" placeholder="e-mail" />
            <span id="errors4"></span>
        <input id="password" type="password" name="password" placeholder="Κωδικός" />
            <span id="errors5"></span>
        <input id="img"type="file" name="profileimg" placeholder="Εικόνα προφίλ" />
            <span id="errors6"></span>
        <input type="submit" value="Εγγραφή" />
    </form>
</div>
<script src="js/registerValidator.js" type="text/javascript"></script>
