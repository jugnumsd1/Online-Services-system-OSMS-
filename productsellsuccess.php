<?php
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $email = $_SESSION['aemail'];
} else {
    echo '<script>location.href="adminlogin.php"</script>';
}

               

?>

</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Selling Confermation</title>

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
                        <li class="nav-item"><a class="nav-link" href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a></li>
                        <li class="nav-item"><a class="nav-link" href="requester.php"><i class="fas fa-users"></i>Requester</a></li>
                        <li class="nav-item"><a class="nav-link" href="sell.php"><i class="fas fa-table"></i>Sell Report</a></li>
                        <li class="nav-item"><a class="nav-link active" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>
                        <li class="nav-item"><a class="nav-link" href="passchange.php"><i class="fas fa-key"></i>Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="outlog.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                    </ul>
                </div>
            </nav>
            <?php
    $sql = "SELECT * FROM customer_tb WHERE custid ={$_SESSION['myid']}";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<div class='ml-5 mt-5'>
                <h3 class='text-center'>Customer Bill</h3> 
                <table class='table'>
                <tbody>
                <tr>
                <th>Customer ID</th>
                <td>" . $row['custid'] . "</td>
                </tr>
                <tr>
                <th>Customer Name</th>
                <td>" . $row['custname'] . "</td>
                </tr>

                <tr>
               <th>Address</th>
               <td>" . $row['custadd'] . "</td>
                </tr>

                <tr>
                <th>Product</th>
                <td>" . $row['cpname'] . "</td>
                </tr>
                <tr>
                <th>Quantity</th>
                <td>" . $row['cpquantity'] . "</td>
                </tr>
                <tr>
                <th>Price Each</th>
                <td>" . $row['cpeach'] . "</td>
                </tr>

               <th>Total Cost</th>
               <td>" . $row['cptotal'] . "</td>
               </tr>
               <tr>
               <th>Date</th>
               <td>" . $row['cpdate'] . "</td>
               </tr>
               <tr>
               <td>
               <form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
               <td><a href='assets.php' class='btn btn-secondary d-print-none'>Close</a></td>
               </tr> </tbody>
                </table>
               </div>";
              } else {
              echo "failed";
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