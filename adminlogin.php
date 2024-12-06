<?php
include('../dbconnection.php');
session_start();
if (!isset($_SESSION['is_adminlogin'])) {
    if (isset($_REQUEST['aemail'])) {
        $aemail = mysqli_real_escape_string($conn, trim($_REQUEST['aemail']));
        $apassword = mysqli_real_escape_string($conn, trim($_REQUEST['apassword']));
        $sql = "SELECT admin_email,admin_password FROM adminlogin_tb WHERE admin_email='" . $aemail . "' AND admin_password='" . $apassword ."' limit 1";
        $result = $conn->query($sql);
        if ($result->num_rows == TRUE) {
            $_SESSION['is_adminlogin'] = TRUE;
            $_SESSION['aemail'] = $aemail;
            echo "<script>location.href='dashboard.php';</script>";
        } else {
            $msg = '<div class="alert alert-warning mt-2" role="alert">Login Failled</div>';
        }
    }
} else {
    echo "<script>location.href='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <style>

    </style>
</head>

<body>
    <div style="width: 50vw;" class="text-center col-md-4 centered-div mx-auto">
        <?php
        if (isset($msg)) {
            echo $msg;
        }

        ?>
    </div>

    <div class=" mb-3 mt-5 text-center" style="font-size: 30px;">

        <i class="fas fa-stethoscope "></i><span>Oline Service Management System</span>
    </div>
    <p class="text-center" style="font-size:20px;"><i class="fas fa-user-secret text-denger"></i>Admin Area (Demo)</p>

    <div class="container login-container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-form">
                    <h2 class="text-center">adminLogin</h2>
                    <form>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="aemail" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="apassword" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>

                        <div class="text-center mt-2">
                            <a class="btn btn-danger" style="font-weight:bold ;" href="index.php">Back To Home</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>