<div class="panel panel-default">
    <h2 class="panel-heading">Επεξεργασία προφίλ:</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <form id="Form1" action="edit_profile.php" method="post" enctype="multipart/form-data">
                    <label for="newemail">E-mail</label>
                    <input type="text" name="newemail" placeholder="e-mail"/>
                    <label for="newimg">Νέα εικόνα</label>
                    <input type="file" name="newimg" />
                    <input type="submit" value="Αλλαγή"/>
                </form>
            </li>
            <li class="list-group-item">
                <span id="res1"></span>
            </li>
        </ul>
</div>
<script type="text/javascript" src="js/jQuery.min.js"></script>
<script type="text/javascript" src="js/edit_profile.js"></script>

