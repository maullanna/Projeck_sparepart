<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
$query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
  $Aa = $row['TYPE'];

  if ($Aa == 'User') {
?>
    <script type="text/javascript">
      //then it will be redirected
      alert("Restricted Page! You will be redirected to POS");
      window.location = "pos.php";
    </script>
<?php
  }
}
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Transaction</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr class="text-center">
            <th width="19%">Transaction Number</th>
            <th>Customer</th>
            <th width="13%">No. of Items</th>
            <th width="11%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = 'SELECT *, FIRST_NAME, LAST_NAME
                    FROM transaction T
                    JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
                    ORDER BY TRANS_D_ID ASC';
          $result = mysqli_query($db, $query) or die(mysqli_error($db));

          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="text-center">';
            echo '<td>' . htmlspecialchars($row['TRANS_D_ID']) . '</td>';
            echo '<td>' . htmlspecialchars($row['FIRST_NAME']) . ' ' . htmlspecialchars($row['LAST_NAME']) . '</td>';
            echo '<td>' . htmlspecialchars($row['NUMOFITEMS']) . '</td>';
            echo '<td>
                    <div class="btn-group" role="group" aria-label="Actions">
                      <a type="button" class="btn btn-sm btn-primary" href="trans_view.php?action=edit&id=' . $row['TRANS_ID'] . '">
                        <i class="fas fa-eye"></i> View
                      </a>
                    </div>
                  </td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?php
include '../includes/footer.php';
?>