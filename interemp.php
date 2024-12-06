<?php 
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $email=$_SESSION['aemail'];

}
else {
    echo '<script>location.href="adminlogin.php"</script>';
}
if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['ename']=="")|| ($_REQUEST['eemail']=="") ||($_REQUEST['ecity'] == "") || ($_REQUEST['ephone'] == "")) {
        $msg= '<div class="alert alert-warning" role="alert">Fill All The Above Field</div>';
    }
else {
    $ename=$_REQUEST['ename'];
    $eemail=$_REQUEST['eemail'];
    $ecity = $_REQUEST['ecity'];
    $ephone = $_REQUEST['ephone'];

    $sql ="INSERT INTO technition_tb (empname,empemail,empcity,empphone) VALUES ('$ename' ,'$eemail','$ecity','$ephone')";
    if ($conn->query($sql)==TRUE) {
        $msg= '<div class="alert alert-success" role="alert">Added Successfully</div>';    
    }
    else{
        $msg= '<div class="alert alert-warning" role="alert">Unable to Add</div>';
        
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>

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
        <div class="sidebar-sticky jumbotron">
        <ul class="nav flex-column ">
        <li class="nav-item"><a class="nav-link " href="dashboard.php"><i class="fas fa-tachometer-alt "></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="workorder.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
        <li class="nav-item"><a class="nav-link" href="requests.php"><i class="fas fa-align-center"></i>Requests</a></li>
        <li class="nav-item"><a class="nav-link" href="assets.php"><i class="fas fa-database"></i>Assets</a></li>
        <li class="nav-item"><a class="nav-link active" href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a></li>
        <li class="nav-item"><a class="nav-link" href="requester.php"><i class="fas fa-users"></i>Requester</a></li>
        <li class="nav-item"><a class="nav-link" href="sell.php"><i class="fas fa-table"></i>Sell Report</a></li>
        <li class="nav-item"><a class="nav-link" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>
        <li class="nav-item"><a class="nav-link" href="passchange.php"><i class="fas fa-key"></i>Change Password</a></li>
        <li class="nav-item"><a class="nav-link" href="outlog.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            </ul>
        </div>
    </nav>
  <!-- ending sidebar know -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center ">Add Technician</h3>
    <form action="" method="POST">
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"  id="ename" name="ename">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control"  id="eemail" name="eemail">
</div>
<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control"  id="ecity" name="ecity">
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control"  id="ephone" name="ephone">
</div>

<div class="text-center">
    <button type="submit" class="btn btn-danger" id="submit" name="submit">Submit</button>
    <a href="technician.php" class="btn btn-secondary">Close</a>
</div>
<?php
if (isset($msg)) {
   echo $msg;
}
?>
    </form>

</div>


</div>
</div>
<!-- ending of the container -->




<!-- javascript is started know -->
<script>
   function isInputNumber(evt) {
    var ch=String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
   }
   </script>

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>
</html>