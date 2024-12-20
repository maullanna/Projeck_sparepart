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

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Employee&nbsp;<a href="#" data-toggle="modal" data-target="#employeeModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr class="text-center">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, GENDER, EMAIL, PHONE_NUMBER, j.JOB_TITLE FROM employee e JOIN job j ON e.JOB_ID = j.JOB_ID';
          $result = mysqli_query($db, $query) or die(mysqli_error($db));
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['FIRST_NAME']) . '</td>';
            echo '<td>' . htmlspecialchars($row['LAST_NAME']) . '</td>';
            echo '<td>' . htmlspecialchars($row['GENDER']) . '</td>';
            echo '<td>' . htmlspecialchars($row['EMAIL']) . '</td>';
            echo '<td>' . htmlspecialchars($row['PHONE_NUMBER']) . '</td>';
            echo '<td>' . htmlspecialchars($row['JOB_TITLE']) . '</td>';
            echo '<td class="text-center"> 
                    <div class="btn-group" role="group" aria-label="Actions">
                      <a type="button" class="btn btn-sm btn-primary" href="emp_edit.php?action=edit&id=' . $row['EMPLOYEE_ID'] . '">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <a type="button" class="btn btn-sm btn-danger ml-2" href="emp_del.php?action=del&id=' . $row['EMPLOYEE_ID'] . '">
                        <i class="fas fa-trash"></i> Delete
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