<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit your profile</h4>
      </div>
      <div class="modal-body">
        Ανεβάστε μια νέα εικόνα:
        <form id="Form1" action="edit_profile.php" method="post" enctype="multipart/form-data">
            <input type="file" name="newimg" />
            <input type="submit" value="Αλλαγή">
        </form>
        <span id="res1"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jQuery.min.js"></script>
<script type="text/javascript" src="js/edit_profile.js"></script>

