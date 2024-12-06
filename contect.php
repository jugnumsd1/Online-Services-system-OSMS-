<?php
// The contact Us Form wont work with Local Host but it will work ohi Live Server f(isset($_REQUEST['submit'])) {
// Checking for Empty Fields
if (isset($_REQUEST['submit'])) {

if(($_REQUEST['name'] == "") || ($_REQUEST['subject']=="")||($_REQUEST['email'] == "")|| ($_REQUEST['message']==
"")){
 
// msg displayed if required field missing
$msg = '<div class="alert alert-warning col-sm-6 m1-5 mt-2" role="alert"> Fill All Fileds </div>';

} else {
     $name=$_REQUEST['name']; 
     $email=$_REQUEST['email'];
     $subject =$_REQUEST['subject'];
     $message = $_REQUEST['message'];
$mailTo = "jugnumsd786@gmail.com"; 
$headers = "From: ". $email;
$txt = "You have received an email from ". $name. ".\n\n".$message;
mail($mailTo, $subject, $txt, $headers);
$msg = '<div class="alert alert-success col-sm-6 m1-5 mt-2" role="alert"> Sent
Successfully </div>';
}

}

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// if (isset($_POST['submit'])) {
//     $name=$_POST['name'];
//     $email=$_POST['email'];
//     $message=$_POST['message'];

//     //Import PHPMailer classes into the global namespace
// //These must be at the top of your script, not inside a function


// //Load Composer's autoloader
// require 'New folder/Exception.php';
// require 'New folder/PHPMailer.php';
// require 'New folder/SMTP.php';

// //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//                        //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'jugnumsd786@gmail.com';                     //SMTP username
//     $mail->Password   = 'azlp ilsh yvsl szyy';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('jugnumsd786@gmail.com', 'contact');
//     $mail->addAddress('55624@students.riphah.edu.pk', 'riphah');     //Add a recipient
   

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Test contact';
//     $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> message - $message";
  

//     $mail->send();
//     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Email Sent Successfully</div>';
    
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
// }
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contect</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    

<div class="container" id="contact">
    <h2 class="text-center mb-4">Contect Us</h2>
    <div class="row">
        <div class="col-md-8">
        <form action="" method="POST">
        <input type="text" class="form-control" name="name" placeholder="Name" ><br>
        <input type="text" class="form-control" name="subject" placeholder="Subject" ><br>
        <input type="text" class="form-control" name="email" placeholder="Email" ><br>
        <textarea class="form-control" name="message" placeholder="How can We Help You?" style="height: 150px;"></textarea><br>
         <input type="submit" class="btn btn-primary" name="submit" value="send"><br><br>
        </form>  
        </div>
  
    <div class="col-md-4 text-center">
     <strong>HeadQuarder:</strong>  <br>
     OSMS pbt Ltd, <br>
     Islamabad Pakistan <br>
     I14 campus <br>
     Phone: 03346718774 <br>
     <a href="#" target="_blank">www.osms.com</a><br>
    
    <br><br>
     <strong>HeadQuarder 2:</strong>  <br>
     OSMS pbt Ltd, <br>
     Karachi Pakistan <br>
     Behria campus <br>
     Phone: 0344 9993391<br>
     <a href="#" target="_blank">www.osms.com</a><br>
     </div>
    <?php 
    if(isset($msg)){
    echo $msg;
    }
    
    ?>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>

  </body>
</html>