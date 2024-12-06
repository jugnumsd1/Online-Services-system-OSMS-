<?php
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $email=$_SESSION['email'];
}
else{
    $msg = '<script>location.href="index.php"</script>';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVICE STATUS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- top navbar -->
<nav class="navbar navbar-dark fixed-top bg-danger p-0 text-white" style="font-size: bold;"><a class="navbar-brand col-md-2 mr-0" href="userprofile.php">OSMS</a></nav>
 <!-- start container -->
<div class="container-fluid" style="margin-top: 40px;" > 
<div class="row"> 
<!-- sidebar is started know -->
    <nav class="col-sm-2 bg-light sidebar py-5 d-print-none"> 
        <div class="sidebar-sticky ">
        <ul class="nav flex-column ">
        <li class="nav-item"><a class="nav-link " href="../userprofile.php"><i class="fas fa-user "></i>Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="../Requester/submit.php"><i class="fab fa-accessible-icon"></i>Submit Request</a></li>
        <li class="nav-item"><a class="nav-link active" href="servicestatus.php"><i class="fas fa-align center"></i>Service Status</a></li>
        <li class="nav-item"><a class="nav-link" href="../Requester/changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
        <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            </ul>
        </div>
    </nav>
  <!-- ending sidebar know -->
  <div class="col-sm-6 mt-5 mx-3">
<form action="" method="POST" class="form-inline">
    <div class="form-group mr-3 d-print-none">
<label for="checkid">Enter ID</label>
<input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
</div>
<button type="submit" class="btn btn-danger d-print-none">Search</button>
</form>
<?php
if (isset($_REQUEST['checkid'])) {
    if ($_REQUEST['checkid']=="") {
        $msg= '<div class="alert alert-warning mt-4">Fill the Above The Field</div>';
    }
    else{
        $sql="SELECT * FROM assignwork_tb WHERE req_id = {$_REQUEST['checkid']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
            if(isset($row['req_id'])==$_REQUEST['checkid']){
    ?>
     <h3 class="text-center mt-5">ASSIGN WORK DETAIL</h3>
    <table class="table table-border">
        <tbody>
            <tr>
                <td>RequestiD</td>
                <td><?php  if (isset($row['req_id'])) {
                    echo $row['req_id'];
                }?></td>
            </tr>
            <tr>
                <td>Requestinfo</td>
                <td><?php  if (isset($row['info'])) {
                    echo $row['info'];
                }?></td>
            </tr>
            <tr>
                <td>Request Description</td>
                <td><?php  if (isset($row['decp'])) {
                    echo $row['decp'];
                }?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php  if (isset($row['name'])) {
                    echo $row['name'];
                }?></td>
            </tr>
            <tr>
                <td>Address1</td>
                <td><?php  if (isset($row['add1'])) {
                    echo $row['add2'];
                }?></td>
            </tr>
            <tr>
                <td>Address2</td>
                <td><?php  if (isset($row['add2'])) {
                    echo $row['add2'];
                }?></td>
            </tr>
            <tr>
                <td>city</td>
                <td><?php  if (isset($row['city'])) {
                    echo $row['city'];
                }?></td>
            </tr>
            <tr>
                <td>Zip Code</td>
                <td><?php  if (isset($row['zip'])) {
                    echo $row['zip'];
                }?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php  if (isset($row['state'])) {
                    echo $row['state'];
                }?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php  if (isset($row['email'])) {
                    echo $row['email'];
                }?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><?php  if (isset($row['phone'])) {
                    echo $row['phone'];
                }?></td>
            </tr>
            <tr>
                <td>Technition</td>
                <td><?php  if (isset($row['tech'])) {
                    echo $row['tech'];
                }?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php  if (isset($row['date'])) {
                    echo $row['date'];
                }?></td>
            </tr>
            <tr>
                <td>Costmer Sign</td>
                <td></td>
            </tr>
            <tr>
                <td>Technition Sign</td>
                <td></td>
            </tr>
           
        </tbody>
    </table>
    <div class="text-center">
        <form action="" class="mb-3 d-print-none" >
          <input type="submit" name="print" class="btn btn-danger" value="Print" onClick="window.print();">
          <input type="submit" name="close" value="Close" class="btn btn-dark ">

        </form>
    </div>
    <?php } 
        else{
            echo '<div class="alert alert-info mt-4">Your Reques is still pending</div>';
        }
    }       
 }
 ?>
 <?php
if (isset($msg)) {
  echo $msg;
} ?>

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