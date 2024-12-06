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
    <title>Employee Edition</title>

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

            <!-- ending of the container -->
            <div class="col-sm-6 mt-5 mx-3 jumbotron">
                <h3 class="text-center">Updat Technition</h3>
                <?php
                if (isset($_REQUEST['edit'])) {
                    $sql = "SELECT * FROM technition_tb WHERE empid = {$_REQUEST['id']}";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                }
                if (isset($_REQUEST['update'])) {
                    if (($_REQUEST['empname'] == "") || ($_REQUEST['empemail'] == "")|| ($_REQUEST['empcity'] == "")|| ($_REQUEST['empphone'] == "")) {
                        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill the Above field </div>';
                    } else {
                        $eid = $_REQUEST['empid'];
                        $ename = $_REQUEST['empname'];
                        $eemail = $_REQUEST['empemail'];
                        $ecity = $_REQUEST['empcity'];
                        $ephone = $_REQUEST['empphone'];

                        $sql = "UPDATE technition_tb SET empname ='$ename',empemail='$eemail',empcity='$ecity', empphone='$ephone' WHERE empid = '$eid'";
                        if ($conn->query($sql) == TRUE) {
                            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">UPDATE SUCCESSFULLY </div>';
                        } else {
                            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Can not be updated </div>';
                        }
                    }
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="empid">Requester ID</label>
                        <input type="text" class="form-control" name="empid" id="empid" Value="<?php if (isset($row['empid'])) {
                                                                                                echo $row['empid'];
                                                                                            } ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="empname">Name</label>
                        <input type="text" class="form-control" name="empname" id="empname" Value="<?php if (isset($row['empname'])) {
                                                                                                    echo $row['empname'];
                                                                                                } ?>">
                    </div>

                    <div class="form-group">
                        <label for="empemail">Email</label>
                        <input type="empemail" class="form-control" name="empemail" id="empemail" Value="<?php if (isset($row['empemail'])) {
                                                                                                    echo $row['empemail'];
                                                                                                } ?>">
                    </div>
                    <div class="form-group">
                        <label for="empcity">City</label>
                        <input type="empcity" class="form-control" name="empcity" id="empcity" Value="<?php if (isset($row['empcity'])) {
                                                                                                    echo $row['empcity'];
                                                                                                } ?>">
                    </div>
                    <div class="form-group">
                        <label for="empphone">Phone</label>
                        <input type="empphone" class="form-control" name="empphone" id="empphone" Value="<?php if (isset($row['empphone'])) {
                                                                                                    echo $row['empphone'];
                                                                                                } ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn  btn-danger" name="update">UPDATE</button>
                        <a href="technition.php" class="btn btn-dark">Close</a>
                    </div>

                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                </form>


            </div>
            
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