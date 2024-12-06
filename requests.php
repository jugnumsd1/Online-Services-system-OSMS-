<?php
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $email = $_SESSION['aemail'];
} else {
    echo '<script>location.href="adminlogin.php"</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>

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
                    <ul class="nav flex-column jumbotron">
                        <li class="nav-item"><a class="nav-link " href="dashboard.php"><i class="fas fa-tachometer-alt "></i>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="workorder.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
                        <li class="nav-item"><a class="nav-link active" href="requests.php"><i class="fas fa-align-center"></i>Requests</a></li>
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
            <div class="col-sm-4 mb-5">
                <?php

                $sql = "SELECT req_id , info , decp,date FROM requestsubmit_tb";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card mt-5 mx-5">';
                        echo '<div class="card-header">';
                        echo 'Requester id :' . $row['req_id'];
                        echo '</div>';

                        echo  '<div class="card-body">';
                        echo  '<h5 class="card-title"> Requst info :' . $row['info'];
                        echo  '</h5>';
                        echo '<p class="card-text">' . $row['decp'];
                        echo '</p>';
                        echo '<p class="card-text">' . $row['date'];
                        echo '</p>';
                        echo '<div class="float-right">';
                        echo '<form action="" method="POST">';
                        echo '<input type="hidden" name="id" value='.$row["req_id"]. '>';
                        echo '<input type="submit" value="View" class="btn btn-danger mr-3" name="view" >';
                        echo '<input type="submit" value="Close" class="btn btn-secondary" name="close" >';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }


                ?>
            </div>
 <?php
 if (isset($_REQUEST['view'])) {
    $sql= "SELECT * FROM requestsubmit_tb WHERE req_id={$_REQUEST['id']}";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
 }
 if (isset($_REQUEST['close'])==TRUE) {
    $sql ="DELETE FROM requestsubmit_tb WHERE req_id ={$_REQUEST['id']}";
    if ($conn->query($sql)) {
    
    
    echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
 }
 else{
    $msg = '<div class="alert alert-warning mt-2" role="alert">Deleted Failled</div>';
 }
}
if(isset($_REQUEST['assign'])){
 if (($_REQUEST['req_id']=="")||($_REQUEST['info']=="")||($_REQUEST['decp']=="")||($_REQUEST['name']=="")||($_REQUEST['city']=="")||($_REQUEST['state']=="")||($_REQUEST['add1']=="")||($_REQUEST['add2']=="")||($_REQUEST['zip']=="")||($_REQUEST['email']=="")||($_REQUEST['phone']=="")||($_REQUEST['tech']=="")||($_REQUEST['date']=="") ){
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Filds Are Requaired</div>';
 } 
 else{
   $rid =$_REQUEST['req_id'];
   $rinfo =$_REQUEST['info'];
   $rdecp =$_REQUEST['decp'];
   $rname =$_REQUEST['name'];
   $radd1 =$_REQUEST['add1'];
   $radd2 =$_REQUEST['add2'];
   $rcity =$_REQUEST['city'];
   $rzip =$_REQUEST['zip'];
   $rstate =$_REQUEST['state'];
   $remail =$_REQUEST['email'];
   $rphone =$_REQUEST['phone'];
   $rtech =$_REQUEST['tech'];
   $rdate =$_REQUEST['date'];
   $sql= "INSERT INTO assignwork_tb (req_id,info,decp,name,add1,add2,city,zip,state,email,phone,tech,date) VALUES ('$rid','$rinfo','$rdecp','$rname','$radd1','$radd2','$rcity','$rzip','$rstate','$remail','$rphone','$rtech','$rdate')";
if ($conn->query($sql)==TRUE) {
    $msg = '<div class="alert alert-success mt-2 ml-5">Assign Successfull</div>';
} 
else{
    $msg = '<div class="alert alert-danger mt-2 ml-5">Can not Assign</div>';

}

}

}

 ?>
            <div class="col-sm-5 mt-5 jumbotron">
                <form action="" method="POST" class="">
                  
                    <h5 class="text-center">Assigning Work Order Request</h5>
                    <div class="form-group">
                        <label for="req_id">RequestID</label>
                    
                        <input type="text" name="req_id" class="form-control" readonly value="<?php if (isset($row['req_id'])) {
                            echo $row['req_id'];
                        } ?>">
                    </div>
                    <div class="form-group">
                        <label for="info">Request info</label>
                        <input type="text" name="info" class="form-control" value="<?php if (isset($row['info'])) {
                            echo $row['info'];
                        } ?>">
                    </div>

                    <div class="form-group">
                        <label for="decp">Description</label>
                        <input type="text" name="decp" class="form-control" value="<?php if (isset($row['decp'])) {
                            echo $row['decp'];
                        } ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php if (isset($row['name'])) {
                            echo $row['name'];
                        } ?>" >
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="address1">Address line1</label>
                            <input type="text" name="add1" id="address1" class="form-control" value="<?php if (isset($row['add1'])) {
                            echo $row['add1'];
                        } ?>" >
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="address2">Address line2</label>
                            <input type="text" name="add2" id="address2" class="form-control" value="<?php if (isset($row['add2'])) {
                            echo $row['add2'];
                        } ?>">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="col-md-5  form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control" value="<?php if (isset($row['city'])) {
                            echo $row['city'];
                        } ?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control" value="<?php if (isset($row['state'])) {
                            echo $row['state'];
                        } ?>">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="zip">Zip Code</label>
                            <input type="text" name="zip" id="zip" class="form-control" value="<?php if (isset($row['zip'])) {
                            echo $row['zip'];
                        } ?>" onkeypress="isInputNumber(event)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php if (isset($row['email'])) {
                            echo $row['email'];
                        } ?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="phone">Phone</label>
                            <input type="integer" name="phone" id="phone" class="form-control" value="<?php if (isset($row['phone'])) {
                            echo $row['phone'];
                        } ?>" onkeypress="isInputNumber(event)">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="technition">Assiggn to Technitionn</label>
                            <input type="text" name="tech" id="tech" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control"  onkeypress="isInputNumber(event)">
                            </div>
                        </div>
                        <div class="float-right mt-5">
                            <button type="submit" class="btn btn-success mt-5" name="assign">Assign</button>
                            <button type="reset" class="btn btn-secondary mt-5 " name="reset" >Reset</button>
                        </div>
                </form>
                <?php 
                    if (isset($msg)) {
                       echo $msg;
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