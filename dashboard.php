<?php
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email=$_SESSION['aemail'];
}
else {
    echo '<script>location.href="adminlogin.php"</script>';
}
$sql ="SELECT max(req_id) FROM requestsubmit_tb ";
$result=$conn->query($sql);
$row  = mysqli_fetch_row($result);
$submit=$row[0];

$sql ="SELECT max(reqno) FROM assignwork_tb ";
$result=$conn->query($sql);
$row  = mysqli_fetch_row($result);
$submitassign=$row[0];

$sql ="SELECT * FROM technition_tb ";
$result=$conn->query($sql);
$submittech=$result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
                        <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt "></i>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="workorder.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
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
            <!-- ending firt colum means sidebar know -->
            <div class="col-sm-9 col-md-10">
                <div class="row text-center mx-5">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Request Received </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $submit;?></h4>
                                <a class="btn text-white" href="requests.php">View</a>
                            </div>
                        </div>
                    </div> <!--end of second column -->

                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Assigned Work</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $submitassign;?></h4>
                                <a class="btn text-white" href="workorder.php">View</a>
                            </div>
                        </div>
                    </div> <!--end of third column -->


                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                            <div class="card-header">No of Technician</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $submittech;?></h4>
                                <a class="btn text-white" href="technician.php">View</a>
                            </div>
                        </div>
                    </div> <!--end of fourth column -->
                </div> <!--  end the row -->

                <div class="mt-t mb-5 text-center">
                    <p class="bg-dark text-white p-2">List Of Requester</p>

                    <?php
                    $sql = "SELECT * FROM requesterlogin_tb";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo '<table class="table">
                       <thead>
                       <tr>
                       <th scope="col">Requester ID</th>
                       <th scope="col">Requester Name</th>
                       <th scope="col">Requester email</th>                       
                       </tr>
                       </thead>
                      
                       <tbody>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["id"] . '</td>';
                            echo '<td>' . $row["name"] . '</td>';
                            echo '<td>' . $row["email"] . '</td>';
                            echo  '</tr>';
                        }
                        echo '</tbody>
                         </table>';
                    }
                    else {
                        echo "0 Result";
                    }
                    ?>
                </div>
            </div>
        </div><!-- ending of the row -->
    </div><!-- ending of the container -->






    <!-- javascript is started know -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>