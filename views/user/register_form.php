<h1>Εγγραφή νέου χρήστη</h1>
<div class="row">
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Στοιχεία λογαριαμού</h2>
                <p>Συμππληρώστε τα στοιχεία του λογρασιασμού σας</h2>
            </div>
            <div class="panel-body">
                <form id="regForm" method="POST" action="register.php" accept-charset="utf-8" enctype="multipart/form-data" >
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" placeholder="Username" />
                        <span id="errors1"></span>
                    <label for="name">Όνομα</label>
                    <input  id="name" type="text" name="first_name" placeholder="Όνομα" />
                        <span id="errors2"></span>
                    <label for="surname">Επώνυμο</label>
                    <input id="surname" type="text" name="last_name" placeholder="Επώνυμο" />
                        <span id="errors3"></span>
                    <label for="email">E-mail</label>
                    <input id="email" type="text" name="email" placeholder="e-mail" />
                        <span id="errors4"></span>
                    <label for="password">Κωδικός</label>
                    <input id="password" type="password" name="password" placeholder="Κωδικός" />
                        <span id="errors5"></span>
                    <label for="img">Εικόνα προφίλ</label>
                    <input id="img"type="file" name="profileimg" placeholder="Εικόνα προφίλ" />
                        <span id="errors6"></span>
                    <input type="submit" value="Εγγραφή" />
                </form>
        </div>
    </div>
</div>
<script src="js/registerValidator.js" type="text/javascript"></script>
