<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motionmantradb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$send_to_email = isset($_SESSION['stuLogEmail']) ? $_SESSION['stuLogEmail'] : "";


function sendMail($send_to)
{
    global $result6,$data;
    $pstatus="Successfull";
    $ostatus="Placed";
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->isHTML(isHtml : TRUE);

    $mail->Username = "anjali1208vishwakarma@gmail.com";
    $mail->Password = "cbbm zswn jdso ewuv";

    $mail->setFrom("anjali1208vishwakarma@gmail.com","Anjali");
    $mail->addAddress($send_to);
    $mail->Subject = "Order Placed Successfully !";
    $mail->Body = "<h2>Order Confirmed!</h2>
    <p>Dear Student,</p>
    <p>Thank you for your order! Your Dance course is now accessible.</p>
    <p><strong>How to access your course:</strong></p>
    <ol>
        <li>Log in to your account: <a href='localhost/motionmantra/index.php'>Click Here</a></li>
        <li>Go to the 'My Courses' section.</li>
        <li>Click on your course to start learning!</li>
    </ol>
    <p>For any issues, contact support at <a href='mailto:support@motionmantra.com'>support@motionmantra.com</a>.</p>
    <p><strong>Happy Learning! 💃🕺</strong></p>
    ";

    
    $mail->Send();
}

sendMail($send_to_email);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Success</title>
<style>
    body {
        background-color: lavenderblush;
        font-family: Trebuchet MS;
        text-align: center;
        padding: 50px;
    }
    .message {
        font-size: 30px;
        color: black;
    }
    .button {
        background-color: white;
        color: black;
        padding: 10px 20px;
        border: 2px solid black;
        cursor: pointer;
        transition: 0.5s;
    }
    .button:hover {
        color: crimson;
        border-radius: 15px;
    }
</style>
</head>
<body>
    <h1>Thank You for Joining MotionMantra!</h1>
    <p class="message">Your Order Has Been Placed.<br> A confirmation email has been sent.</p>
    <button class="button" onclick="window.location.href='Student/myCourse.php'">Go To My Course</button>
</body>
</html>
