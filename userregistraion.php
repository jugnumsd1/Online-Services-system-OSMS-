<?php
include('dbconnection.php');
if (isset($_REQUEST['signup'])) {
    if (($_REQUEST['rname'] == "") || ($_REQUEST['remail'] == "") || ($_REQUEST['rpassword'] == "")) {
        $msg = '<div class="alert alert-warning mt-2" roll="alert">All Fields Are Requaired</div>';
    } else {
        $sql = "SELECT email FROM requesterlogin_tb WHERE email='" .$_REQUEST['remail']. "'";
        $result = $conn->query($sql);
        if ($result->num_rows == TRUE) {
            $msg = '<div class="alert alert-warning mt-2" role="alert">Email Allready Register</div>';
        } else {
            $rname = $_REQUEST['rname'];
            $remail = $_REQUEST['remail'];
            $rpassword = $_REQUEST['rpassword'];
            $sql = "INSERT INTO requesterlogin_tb (name,email,password) VALUES('$rname','$remail','$rpassword')";
            if ($conn->query($sql) == TRUE) {
                $msg = '<div class="alert alert-success mt-2" roll="alert">Your Account has been Created</div>';
            } else {
                $msg = '<div class="alert alert-warning mt-2" roll="alert">Account Can Not be Created</div>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>OnlineSMS PROJECT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container  pt-5" id="registration">
    <h1 class="text-center">Registration Form</h1>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3 ">
            <form action="" method="POST" class="shadow-lg p-4">
                <div class="form-group">
                    <i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="rname">
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">email</label>
                    <input type="text" class="form-control" placeholder="Email" name="remail">
                    <small class="form-text">We can't share you email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i> <label for="pass" class="font-weight-bold pl-2">Password</label>
                    <input type="text" class="form-control" placeholder="Password" name="rpassword">
                </div>
                <button type="submit" class="btn btn-danger mt-5 btn-block shadowsm font-weight-bold" name="signup">Sign Up</button>
                <em>Note:- By clicking sign UP , You Agree To Our terms ,Data Policy And Cookies Policy
                </em>

                <?php
                if (isset($msg)) {
                    echo $msg;
                }

                ?>

            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
</body>
</html>
