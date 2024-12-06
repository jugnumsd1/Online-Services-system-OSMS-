<?php
 include('../dbconnection.php');
session_start();
if($_SESSION['is_login']){

    $email=$_SESSION['email'];
    }
    else{
        echo '<script>location.href="login.php"</script>';
    }

    $sql="SELECT * FROM requestsubmit_tb WHERE req_id= {$_SESSION['myid']}";
    $result=$conn->query($sql);
    if($result->num_rows==1){
        $row=$result->fetch_assoc();

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBMIT SUCCESSFULLY</title>

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
            <nav class="col-sm-2 bg-light sidebar py-5  d-print-none">
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
    <!-- ending of the container -->
<?php
echo "<div class='col-ml-5 mt-5'>
<table class='table mx-5'>
<tbody>
<tr>
<th>Requester ID</th>
<td>".$row  ['req_id']."</td>
</tr>
<tr>
<th>Name</th>
<td> ".$row  ['name']."</td>
</tr>
<tr>
<th>Email Id</th>
<td>".$row['email']."</td>
</tr>
<tr>
<th>Requester Info</th>
<td>".$row['info']."</td>
</tr>
<tr>
<th>Description</th>
<td>".$row['decp']."</td>
</tr>
<tr>
<td>
<form  class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onclick='window.print()'></form></td>
</tr>
</tbody>
</table>
</div>";
    }
    else {
        echo "failled";
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