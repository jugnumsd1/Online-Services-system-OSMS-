<?php
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email=$_SESSION['aemail'];
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
    <title>View Assign work</title>

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
    <nav class="col-sm-2 bg-light sidebar py-5 d-print-none"> 
        <div class="sidebar-sticky ">
        <ul class="nav flex-column ">
        <li class="nav-item"><a class="nav-link " href="dashboard.php"><i class="fas fa-tachometer-alt "></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link active" href="workorder.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
        <li class="nav-item"><a class="nav-link" href="requests.php"><i class="fas fa-align-center"></i>Requests</a></li>
        <li class="nav-item"><a class="nav-link" href="assets.php"><i class="fas fa-database"></i>Assets</a></li>
        <li class="nav-item"><a class="nav-link" href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a></li>
        <li class="nav-item"><a class="nav-link" href="requester.php"><i class="fas fa-users"></i>Requester</a></li>
        <li class="nav-item"><a class="nav-link" href="sell.php"><i class="fas fa-table"></i>Sell Report</a></li>
        <li class="nav-item"><a class="nav-link" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>
        <li class="nav-item"><a class="nav-link" href="passchange.php"><i class="fas fa-key"></i>Change Password</a></li>
        <li class="nav-item"><a class="nav-link" href="outlog.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            </ul>
        </div>
    </nav>
  <!-- ending sidebar know -->

<!-- ending of the container -->

<div class="col-sm-6 mt-5 mx-3">
<h3 class="text-center">ASSIGN WORK DETAIL</h3>
<?php
if (isset($_REQUEST['view'])) {
    $sql="SELECT * FROM assignwork_tb WHERE req_id = {$_REQUEST['id']}";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    ?>
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
        <form action="" class="mb-3 d-print-none d-inline" >
          <input type="submit" name="print" class="btn btn-danger" value="Print" onClick="window.print();">
        </form>
        <form action="workorder.php" class="mb-3 d-print-none d-inline">
          <input type="submit" name="close" value="Close" class="btn btn-dark ">
        </form>
    </div>

    <?php }
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