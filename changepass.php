<?php
include('../dbconnection.php');
session_start();

if (($_SESSION['is_login'])) {
   $email=$_SESSION['email'];

}
else {
    echo '<script>location.href="login.php"</script>';

}
if(isset($_REQUEST['update'])){
    if ($_REQUEST['password']=="") {
        $msg = '<div class="alert alert-warning mt-2" roll="alert">All Fields Are Requaired</div>';
    }
    else{
$pass=$_REQUEST['password'];
$sql="UPDATE requesterlogin_tb SET password='$pass' WHERE email='$email'";
$result=$conn->query($sql);
if ($result==TRUE) {
    $msg = '<div class="alert alert-success mt-2" roll="alert">Password Update Successfully</div>';

}
else{
    $msg = '<div class="alert alert-warning mt-2" roll="alert">Unable to Update Successfully</div>';

}
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

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
        <div class="sidebar-sticky ">
        <ul class="nav flex-column ">
        <li class="nav-item"><a class="nav-link" href="../userprofile.php"><i class="fas fa-user "></i>Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="../Requester/submit.php"><i class="fab fa-accessible-icon"></i>Submit Request</a></li>
        <li class="nav-item"><a class="nav-link" href="../Requester/servicestatus.php"><i class="fas fa-align-center"></i>Service Status</a></li>
        <li class="nav-item"><a class="nav-link active" href="../Requester/changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
        <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            </ul>
        </div>
    </nav>
  <!-- ending sidebar know -->

  <div class="col-sm-6 mt-5">
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
      <label for="email">Email</label><input class="form-control" type="email" name="email" id="email" value="<?php echo $email?>">
      </div>
      <div class="form-group">
      <label for="password">Password</label><input class="form-control" type="text" name="password">
      </div>
      <button type="submit" class="btn btn-danger" name="update">Update</button>
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
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>
</html>