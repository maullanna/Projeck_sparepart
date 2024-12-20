<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?><?php

  $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
  $result = mysqli_query($db, $query) or die(mysqli_error($db));

  while ($row = mysqli_fetch_assoc($result)) {
    $Aa = $row['TYPE'];

    if ($Aa == 'User') {

  ?> <script type="text/javascript">
  //then it will be redirected
  alert("Restricted Page! You will be redirected to POS");
  window.location = "pos.php";
</script>
<?php   }
  }
?>

<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="cust_transac.php?action=add">
          <div class="form-group">
            <input class="form-control" placeholder="First Name" name="firstname" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Last Name" name="lastname" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Phone Number" name="phonenumber" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<?php
include '../includes/footer.php';
?>