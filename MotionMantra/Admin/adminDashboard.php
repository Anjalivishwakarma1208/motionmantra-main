<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('./adminInclude/header.php'); 
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
} else {
  echo "<script> location.href='../index.php'; </script>";
}

// Fetch Data
$sql = "SELECT * FROM course";
$totalcourse = $conn->query($sql)->num_rows;

$sql = "SELECT * FROM student";
$totalstu = $conn->query($sql)->num_rows;

$sql = "SELECT * FROM courseorder";
$totalsold = $conn->query($sql)->num_rows;
?>

<!-- Dashboard Content -->
<div class="col-sm-9 mt-5">
  <div class="row mx-5 text-center">
    <!-- Courses Card -->
    <div class="col-md-4 mt-4">
      <div class="card text-white bg-primary shadow-sm">
        <div class="card-header fw-bold">Total Courses</div>
        <div class="card-body">
          <h4 class="card-title"><?php echo $totalcourse; ?></h4>
          <a class="btn btn-light btn-sm" href="courses.php">View</a>
        </div>
      </div>
    </div>

    <!-- Students Card -->
    <div class="col-md-4 mt-4">
      <div class="card text-white bg-success shadow-sm">
        <div class="card-header fw-bold">Total Students</div>
        <div class="card-body">
          <h4 class="card-title"><?php echo $totalstu; ?></h4>
          <a class="btn btn-light btn-sm" href="students.php">View</a>
        </div>
      </div>
    </div>

    <!-- Sales Card -->
    <div class="col-md-4 mt-4">
      <div class="card text-white bg-danger shadow-sm">
        <div class="card-header fw-bold">Courses Sold</div>
        <div class="card-body">
          <h4 class="card-title"><?php echo $totalsold; ?></h4>
          <a class="btn btn-light btn-sm" href="sellreport.php">View</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Orders Table -->
  <div class="mx-5 mt-5">
    <p class="bg-dark text-white p-3 text-center rounded">Course Orders</p>
    <?php
    $sql = "SELECT * FROM courseorder";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      echo '<table class="table table-striped table-hover">';
      echo '<thead class="table-dark">';
      echo '<tr>
              <th>Order ID</th>
              <th>Course ID</th>
              <th>Student Email</th>
              <th>Order Date</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead><tbody>';

      while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row["order_id"].'</td>';
        echo '<td>'.$row["course_id"].'</td>';
        echo '<td>'.$row["stu_email"].'</td>';
        echo '<td>'.$row["order_date"].'</td>';
        echo '<td>$'.$row["amount"].'</td>';
        echo '<td>
                <form method="POST" class="d-inline">
                  <input type="hidden" name="id" value='. $row["co_id"] .'>
                  <button type="submit" class="btn btn-sm btn-danger" name="delete">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </form>
              </td>';
        echo '</tr>';
      }
      echo '</tbody></table>';
    } else {
      echo "<p class='text-center text-muted'>No Orders Found</p>";
    }

    // Delete Course Order
    if(isset($_REQUEST['delete'])){
      $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
      if($conn->query($sql) === TRUE){
        echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "<p class='text-danger text-center'>Unable to Delete Data</p>";
      }
    }
    ?>
  </div>
</div>

</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->

<?php include('./adminInclude/footer.php'); ?>
