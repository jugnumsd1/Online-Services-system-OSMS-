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
    <title>Assets</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- top navbar -->
<nav class="navbar navbar-dark fixed-top bg-danger p-0 text-white" style="font-size: bold;"><a class="navbar-brand col-md-2 mr-0" href="userprofile.php">OSMS</a></nav>
 <!-- start container -->
<div class="container-fluid" style="margin-top: 40px;">
<div class="row jumbotron"> 
<!-- sidebar is started know -->
    <nav class="col-sm-2 bg-light sidebar py-5"> 
        <div class="sidebar-sticky ">
        <ul class="nav flex-column ">
        <li class="nav-item"><a class="nav-link " href="dashboard.php"><i class="fas fa-tachometer-alt "></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="workorder.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
        <li class="nav-item"><a class="nav-link" href="requests.php"><i class="fas fa-align-center"></i>Requests</a></li>
        <li class="nav-item"><a class="nav-link active" href="assets.php"><i class="fas fa-database"></i>Assets</a></li>
        <li class="nav-item"><a class="nav-link" href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a></li>
        <li class="nav-item"><a class="nav-link " href="requester.php"><i class="fas fa-users"></i>Requester</a></li>
        <li class="nav-item"><a class="nav-link" href="sell.php"><i class="fas fa-table"></i>Sell Report</a></li>
        <li class="nav-item"><a class="nav-link" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>
        <li class="nav-item"><a class="nav-link" href="passchange.php"><i class="fas fa-key"></i>Change Password</a></li>
        <li class="nav-item"><a class="nav-link" href="outlog.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            </ul>
        </div>
    </nav>
  <!-- ending sidebar know -->

<!-- ending of the container -->

<div class="col-sm-9 col-md-10 mt-5 text-center">
    <h4 class="bg-dark text-white">List Of Assets</h4>
<?php
$sql="SELECT * FROM assets_tb";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
 echo  '<table class="table">';
  echo '<thead>';
  echo  ' <tr>';
  echo  ' <th scope="col">Requester ID</th>';
  echo  ' <th scope="col">NAME</th>';
  echo  ' <th scope="col">DOP</th>';
  echo  ' <th scope="col">Available</th>';
  echo  ' <th scope="col">Total</th>';
  echo  ' <th scope="col">Original Cost Each</th>';
  echo  ' <th scope="col">Selling Cost Each</th>';
  echo  ' <th scope="col">Action</th>';

  echo '</tr>';
  echo '</thead>';
echo '<tbody>';
  while ($row=$result->fetch_assoc()){
  echo '<tr>';
  echo '<td>'.$row['pid'].'</td>';
  echo '<td>'.$row['pname'].'</td>';
  echo '<td>'.$row['pdop'].'</td>';
  echo '<td>'.$row['pava'].'</td>';
  echo '<td>'.$row['ptotal'].'</td>';
  echo '<td>'.$row['porignalcost'].'</td>';
  echo '<td>'.$row['psellingcost'].'</td>';
  echo '<td>';
  echo '<form action="editproduct.php" method="POST" class="d-inline">';
  echo '<input type="hidden" name="id" id="id" value='.$row['pid'].'><button type ="submit" class="btn btn-info mr-3" name="edit" value="Edit" ><i class="fas fa-pen"></i></button>';
  echo '</form>'; 
  echo '<form action="" method="POST" class="d-inline">';
  echo '<input type="hidden" name="id"  value='.$row['pid'].'><button type ="submit" class="btn btn-danger mr-3" name="delete" value="delete" ><i class="far fa-trash-alt"></i></button>';
  echo '</form>'; 
  echo '<form action="sellproduct.php" method="POST" class="d-inline">';
  echo '<input type="hidden" name="id" id="id" value='.$row['pid'].'><button type ="submit" class="btn btn-success mr-3" name="sell" value="Sell" ><i class="fas fa-handshake"></i></button>';
  echo '</form>'; 
 echo '</td>';
  echo '</tr>';
  }
echo '</tbody>';
   echo '</table>';
}
else {
    echo "0 RESULT";
}
?>
<div class="float-right">
    <a href="addproduct.php" class="btn btn-danger"><i class="fas fa-plus fa-2x" ></i></a>
</div>
</div>

</div>



</div>



<?php
if (isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM assets_tb WHERE pid = {$_REQUEST['id']}";
    if ($conn->query($sql)) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />'; 
    }
    else{
        echo "Unable to deleted";
    }
}
?>
<!-- javascript is started know -->
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>
</html>