<?php
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $email = $_SESSION['aemail'];
}
else {
    echo '<script>location.href="adminlogin.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserProfile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- top navbar -->
<nav class="navbar navbar-dark fixed-top bg-danger p-0 text-white" style="font-size: bold;"><a class="navbar-brand col-md-2 mr-0" href="userprofile.php">OSMS</a></nav>
 <!-- start container -->
<div class="container-fluid" style="margin-top: 40px;">
<div class="row"> 
<!-- sidebar is started know -->
    <nav class="col-sm-2 bg-light sidebar py-5"> 
        <div class="sidebar-sticky d-print-none">
        <ul class="nav flex-column ">
        <li class="nav-item"><a class="nav-link " href="dashboard.php"><i class="fas fa-tachometer-alt "></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="workorder.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
        <li class="nav-item"><a class="nav-link" href="requests.php"><i class="fas fa-align-center"></i>Requests</a></li>
        <li class="nav-item"><a class="nav-link" href="assets.php"><i class="fas fa-database"></i>Assets</a></li>
        <li class="nav-item"><a class="nav-link" href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a></li>
        <li class="nav-item"><a class="nav-link" href="requester.php"><i class="fas fa-users"></i>Requester</a></li>
        <li class="nav-item"><a class="nav-link active" href="sell.php"><i class="fas fa-table"></i>Sell Report</a></li>
        <li class="nav-item"><a class="nav-link" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>
        <li class="nav-item"><a class="nav-link" href="passchange.php"><i class="fas fa-key"></i>Change Password</a></li>
        <li class="nav-item"><a class="nav-link" href="outlog.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            </ul>
        </div>
    </nav>
  <!-- ending sidebar know -->

<!-- ending of the container -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
<form action="" class="d-print-none " method="POST">
    <div class="form-row">
    <div class="form-group col-md-2">
   <input type="date" class="form-control " id="startdate" name="startdate">
    </div><span>To</span>
    <div class="form-group col-md-2">
   <input type="date" class="form-control " id="enddate" name="enddate">
    </div>
    <div class="form-group">
<input type="submit" name="searchsubmit" value="Search" class="btn btn-secondary">

    </div>
    </div>
</form>
<?php
if (isset($_REQUEST['searchsubmit'])) {
   $startdate = $_REQUEST['startdate'];
   $enddate = $_REQUEST['enddate'];
   $sql ="SELECT * FROM customer_tb WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
   $result=$conn->query($sql);
if ($result->num_rows>0) {
    echo '<p class="bg-dark text-white p-2 mt-4">DETAIL</p>';
    echo  '<table class="table">';
  echo '<thead>';
  echo  ' <tr>';
  echo  ' <th scope="col">Customer ID</th>';
  echo  ' <th scope="col">Customer Name</th>';
  echo  ' <th scope="col">Address</th>';
  echo  ' <th scope="col">Product Name</th>';
  echo  ' <th scope="col">Quantity</th>';
  echo  ' <th scope="col">Price Each</th>';
  echo  ' <th scope="col">Total</th>';
  echo  ' <th scope="col">Date</th>';

  echo '</tr>';
  echo '</thead>';
echo '<tbody>';
  while ($row=$result->fetch_assoc()){
  echo '<tr>';
  echo '<td>'.$row['custid'].'</td>';
  echo '<td>'.$row['custname'].'</td>';
  echo '<td>'.$row['custadd'].'</td>';
  echo '<td>'.$row['cpname'].'</td>';
  echo '<td>'.$row['cpquantity'].'</td>';
  echo '<td>'.$row['cpeach'].'</td>';
  echo '<td>'.$row['cptotal'].'</td>';
  echo '<td>'.$row['cpdate'].'</td>';

  }
  echo '<tr>';
  echo '<td >';
  echo  '<input type="submit" class="btn btn-danger d-print-none" value="Print" onClick ="window.print()">';
  echo '</td>';
  echo '</tr>';
echo '</tbody>';
   echo '</table>';
}
else {
    echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">No Record Yet </div>';
}
}




?>

</div>

<!-- javascript is started know -->
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>
</html>