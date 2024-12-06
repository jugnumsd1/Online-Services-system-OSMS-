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

<nav class="navbar navbar-expand-sm navbar-dark  bg-danger pl-5 fixed-top">
  <a href="index.php" class="navbar-brand">ONLINE.SMS</a>
 
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="mymenu">
<ul class="navbar-nav pl-5 custom-nav">
   <li class="nav-item"><a href="index.php" class="nav-link">HOME</a></li>
   <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
   <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
   <li class="nav-item"><a href="#contact" class="nav-link">Contect</a></li>
   <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>

</ul>
</div>
</nav>

<!-- navgiation is ending know -->

<header class="jumbotron jumbotron-fluid back-img" style="background-image:url(images/work-hand-person-woman-photography-house-597224-pxhere.com.jpg); ;">
 <div class=" myclass mainHeading">
    <h2 class="text-danger font-weight-bold">WELCOME TO OSMS</h2>
    <p class="font-italic">Costmer's Happiness is our Aim</p>
    <a href="login.php" class="btn btn-success mr-3">Login</a>
    <a href="userregistraion.php" class="btn btn-danger  mr-3">Sign Up</a>
 </div>
</header>

<div class="container">
    <div class="jumbotron">
        <h3 class="text-center">OSMS SERVICES</h3>
<p>OSMS (Online Service Management System) services offer a comprehensive solution for businesses seeking to optimize their service delivery and customer engagement. By centralizing key functions such as ticket management, scheduling, and customer support, OSMS enhances operational efficiency and ensures seamless communication between service providers and clients. These systems often include features like real-time tracking, automated notifications, and performance analytics, enabling organizations to respond promptly to customer needs and monitor service quality. Ultimately, OSMS services empower businesses to improve their service processes, boost customer satisfaction, and make data-driven decisions that support growth and innovation.</p>
    </div>
</div>

<!-- ending of osms management -->

<div class="container text-center border-bottom" id="services">
    <h3>OUR SERVICES</h3>
    <div class="row mt-4">
    <div class="col-sm-4 mb-4">
<a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
<h4 class="mt-4">Electronic Appliences</h4>
    </div>
    <div class="col-sm-4 mb-4">
<a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
<h4 class="mt-4">Preventive Maintenance</h4>
    </div>
    <div class="col-sm-4 mb-4">
<a href="#"><i class="fas fa-cogs fa-8x text-success"></i></a>
<h4 class="mt-4">Fault Repair</h4>
    </div>
    </div>
</div>

<!-- Ending of our Services -->

<!-- start form section -->
     <?php

include('userregistraion.php');

     ?>
     
     <!-- know the contect form is ending know -->


<!-- start happy Costmer -->
<div class="jumbotron bg-danger">
    <div class="container">
        <h2 class="text-center text-white">Happy Costomers</h2>
        <div class="row mt-5">
            <div class="col-lg-3 col-sm-6">
                <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                    <img  src="images/avater.webp" class="img-fluid" style="border-radius:150px; height:150px;width:150px">
                <h4 class="card-title">UMAR</h4>
                <p class="card-text">His positive experience with the service management system showcases how OSMS enhances communication </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                    <img  src="images/avater1.jpg" class="img-fluid" style="border-radius:150px; height:150px;width:150px">
                <h4 class="card-title">AYESHA</h4>
                <p class="card-text">His positive experience with the service management system showcases how OSMS enhances communication </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                    <img  src="images/avater2.jpg" class="img-fluid" style="border-radius:150px; height:150px;width:150px">
                <h4 class="card-title">LAILA</h4>
                <p class="card-text">His positive experience with the service management system showcases how OSMS enhances communication </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                    <img  src="images/avater3.webp" class="img-fluid" style="border-radius:150px; height:150px;width:150px">
                <h4 class="card-title">OWAIS</h4>
                <p class="card-text">His positive experience with the service management system showcases how OSMS enhances communication </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of the happy Costmer -->

<!-- start contact us -->
<?php
     include('contect.php');
 ?>

<!-- footer is started know -->
 <footer class="container-fluid bg-dark mt-5 text-white">
    <div class="contianer">
        <div class="row py-3">
            <div class="col-md-6">
            <span>Follow us :</span>
            <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
            <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div>

        <div class="col-md-6">
            <small>Designed by jugnuwebDevelper &copy; 22024</small>
        <small class="ml-2"><a href="./Admin/adminlogin.php"> Admin Login</a>
        </small>
        </div>
        </div>
    </div>
 </footer>

<!-- java scrip is started know -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
</body>
</html>

  

















</body>
</html>