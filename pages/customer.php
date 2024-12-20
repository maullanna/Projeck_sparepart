<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?>
<?php

<<<<<<< HEAD
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
}   ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Customer&nbsp;<a href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
  </div>

  <div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
      <thead class="thead-dark">
        <tr class="text-center">
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone Number</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = 'SELECT * FROM customer';
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($row['FIRST_NAME']) . '</td>';
          echo '<td>' . htmlspecialchars($row['LAST_NAME']) . '</td>';
          echo '<td>' . htmlspecialchars($row['PHONE_NUMBER']) . '</td>';
          echo '<td align="center"> 
                  <div class="btn-group" role="group" aria-label="Actions">
                    <a type="button" class="btn btn-sm btn-primary" href="cust_edit.php?action=edit&id=' . $row['CUST_ID'] . '">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    
                    <a type="button" class="btn btn-sm btn-danger ml-3" href="cust_del.php?action=del&id=' . $row['CUST_ID'] . '">
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
=======
                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];          
               if ($Aa=='User'){
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   } }   ?> 
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customer&nbsp;<a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                     
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = 'SELECT * FROM customer';
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. $row['FIRST_NAME'].'</td>';
                      echo '<td>'. $row['LAST_NAME'].'</td>';
                      echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                      echo '<td align="right"> 
                              
                              
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" href="cust_edit.php?action=edit & id='.$row['CUST_ID']. '">
                                   </i> Edit
                                  </a>
								  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" href="cust_del.php?action=del & id='.$row['CUST_ID']. '">
                                   </i> Delete
									</a>
                                
                            
                            </div>
                          </div> </td>';
                      echo '</tr> ';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
>>>>>>> 827665f83d7f30cdd3d50ae7b137d335aa602419
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>

<?php

include '../includes/footer.php';


?>