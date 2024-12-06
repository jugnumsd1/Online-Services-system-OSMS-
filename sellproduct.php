<?php
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $email = $_SESSION['aemail'];
}
else {
    echo '<script>location.href="adminlogin.php"</script>';
}
if (isset($_REQUEST['psubmit'])) {
    if (($_REQUEST['cname'] == "") || ($_REQUEST['cadd'] == "")|| ($_REQUEST['pname'] == "")|| ($_REQUEST['pquantity'] == "")|| ($_REQUEST['psellingcost'] == "")|| ($_REQUEST['totalcost'] == "")|| ($_REQUEST['selldate'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill the Above field </div>';
    } else {
        $pid = $_REQUEST['pid'];
        $pava = $_REQUEST['pava'] - $_REQUEST['pquantity'];
        $custname = $_REQUEST['cname'];
        $custadd = $_REQUEST['cadd'];
        $cpname = $_REQUEST['pname'];
        $cpquantity = $_REQUEST['pquantity'];
        $cpeach= $_REQUEST['psellingcost'];
        $cptotal= $_REQUEST['totalcost'];
        $cpdate= $_REQUEST['selldate'];
$sql="INSERT INTO customer_tb (custname,custadd,cpname,cpquantity,cpeach,cptotal,cpdate) VALUES ('$custname','$custadd','$cpname','$cpquantity','$cpeach','$cptotal','$cpdate')";

if (($conn->query($sql)==TRUE)) {
    $genid = mysqli_insert_id($conn);
    $_SESSION['myid']=$genid;
    echo "<script> location.href='productsellsuccess.php';</script>";
}

$sqlup ="UPDATE assets_tb SET  pava ='$pava' WHERE pid = '$pid'";
$conn->query($sqlup);
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Product Checking</title>

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
        <li class="nav-item"><a class="nav-link " href="dashboard.php"><i class="fas fa-tachometer-alt "></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="workorder.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
        <li class="nav-item"><a class="nav-link" href="requests.php"><i class="fas fa-align-center"></i>Requests</a></li>
        <li class="nav-item"><a class="nav-link active" href="assets.php"><i class="fas fa-database"></i>Assets</a></li>
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

  <div class="col-sm-6 mt-5 mx-5 jumbotron">
<h3 class="text-center">Customer Bill</h3>
<?php
if (isset($_REQUEST['sell'])) {
   $sql="SELECT * FROM assets_tb WHERE pid={$_REQUEST['id']}";
   $result =$conn->query($sql);
   $row = $result->fetch_assoc();
}

?>
<form action="" method="POST">
<div class="form-group">
<label for="pid">Product ID</label>
<input type="text" class="form-control" id="pid" name="pid" value="<?php if (isset($row['pid'])) {
 echo $row['pid'];}?>" readonly>
</div>

<div class="form-group">
<label for="cname">Customer Name</label>
<input type="text" class="form-control" id="cname" name="cname">
</div>

<div class="form-group">
<label for="cadd">Customer Address</label>
<input type="text" class="form-control" id="cadd" name="cadd">
</div>

    <div class="form-group">
<label for="pname">Product Name</label>
<input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) {
 echo $row['pname'];}?>">
</div>


<div class="form-group">
<label for="pava">Available</label>
<input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if (isset($row['pava'])) {
 echo $row['pava'];}?>" readonly>
</div>



<div class="form-group">
<label for="quantity">Quantity</label>
<input type="text" class="form-control" id="pquantity" name="pquantity" onkeypress="isInputNumber(event)">
</div>


<div class="form-group">
<label for="psellingcost">Price Each Product</label>
<input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)" value="<?php if (isset($row['psellingcost'])) {
 echo $row['psellingcost'];}?>">
</div>

<div class="form-group">
<label for="quantity">Total Price</label>
<input type="text" class="form-control" id="totalcost" name="totalcost" onkeypress="isInputNumber(event)">
</div>

<div class="form-group">
<label for="quantity">Date</label>
<input type="date" class="form-control" id="inputdate" name="selldate" onkeypress="isInputNumber(event)">
</div>
<div class="text-center">
<button type="submit" class="btn btn-danger" name="psubmit" >Submit</button>
<a href="assets.php" type="submit" class="btn btn-dark" name="pclose"> Close</a>
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