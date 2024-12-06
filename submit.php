<?php
include('../dbconnection.php');
session_start();

if($_SESSION['is_login']){

$email=$_SESSION['email'];
}
else{
    echo '<script>location.href="login.php"</script>';
}
if(isset($_REQUEST['submit'])){
if (($_REQUEST['info']=="")|| ($_REQUEST['description']=="")|| ($_REQUEST['name']=="")|| ($_REQUEST['add1']=="")|| ($_REQUEST['add2']=="")|| ($_REQUEST['city']=="")|| ($_REQUEST['state']=="")|| ($_REQUEST['zip']=="")|| ($_REQUEST['email']=="")|| ($_REQUEST['info']=="phone")||($_REQUEST['date']=="")) {
    $msg = '<div class="alert alert-warning mt-2" roll="alert">All Fields Are Requaired</div>';
}
else{

    $rinfo =$_REQUEST['info'];
    $rdesc=$_REQUEST['description'];
    $rname=$_REQUEST['name'];
    $radd1=$_REQUEST['add1'];
    $radd2=$_REQUEST['add2'];
    $rcity=$_REQUEST['city'];
    $rstate=$_REQUEST['state'];
    $rzip=$_REQUEST['zip'];
    $remail=$_REQUEST['email'];
    $rphone=$_REQUEST['phone'];
    $rdate=$_REQUEST['date'];

 $sql="INSERT INTO requestsubmit_tb (info,decp,name,add1,add2,city,state,zip,email,phone,date) 
 VALUES ('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rphone','$rdate')";

 if ( $conn->query($sql)==TRUE) {
    $genid= mysqli_insert_id($conn);
    $msg = '<div class="alert alert-success mt-2" roll="alert">Form Will be Submitted</div>';
  $_SESSION['myid']=$genid;
  echo '<script>location.href="success.php"</script>';
 }
  else{
    $msg = '<div class="alert alert-warning mt-2" roll="alert">Form Can Not Submitted</div>';

  }
 }

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE SUBMITION</title>

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
            <nav class="col-sm-2 bg-light sidebar py-5 ">
                <div class="sidebar-sticky ">
                    <ul class="nav flex-column ">
                        <li class="nav-item"><a class="nav-link" href="../userprofile.php"><i class="fas fa-user "></i>Profile</a></li>
                        <li class="nav-item"><a class="nav-link active" href="../Requester/submit.php"><i class="fab fa-accessible-icon"></i>Submit Request</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Requester/servicestatus.php"><i class="fas fa-align-center"></i>Service Status</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Requester/changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                    </ul>
                </div>
            </nav>
            <!-- ending sidebar know -->

            <!-- start second form column -->
            <div class="col-sm-9 col-md-10 mt-5">
                <form class="mx-5" action="" method="POST">
                    <div class="form-group">
                        <label for="requesterinfo">Requester info</label>
                        <input type="text" name="info" id="requesterinfo" class="form-control" placeholder="Request info">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <label for="name">NAME</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="address1">Address 1</label>
                            <input type="text" name="add1" id="address1" class="form-control" placeholder="Address 1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="address2">Address 2</label>
                            <input type="text" name="add2" id="address2" class="form-control" placeholder="Address 2">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="col-md-6  form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control" placeholder="City">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control" placeholder="State">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="zip">Zip Code</label>
                            <input type="text" name="zip" id="zip" class="form-control" onkeypress="isInputNumber(event)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="phone">Phone</label>
                            <input type="integer" name="phone" id="phone" class="form-control"  onkeypress="isInputNumber(event)">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control" placeholder="date">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                    <button type="reset" class="btn btn-dark" name="reset">Reset</button>

                    <?php
                    if(isset($msg)){
                        echo $msg;
                    } ?>
                </form>

            </div>
            <!-- end of second column -->
        </div>
    </div>
    <!-- ending of the container -->


<!-- javascript for phon and zip field -->
   <script>
   function isInputNumber(evt) {
    var ch=String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
   }
   </script>

    <!-- javascript is started know -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>