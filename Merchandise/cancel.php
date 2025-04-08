<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

$oid = $_SESSION['order_id'] ?? '';

$sql = "UPDATE order_items SET Refund_status='Under Process' WHERE Id='$oid'";
$result = $conn->query($sql);

require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$send_to_email = $_SESSION['email'] ?? "";

function sendMail($send_to)
{
    $pcode = $_SESSION['product_code'] ?? '';
    $price = $_SESSION['price'] ?? '';

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;

    $mail->Username = "anjali1208vishwakarma@gmail.com";
    $mail->Password = "cbbm zswn jdso ewuv"; 

    $mail->setFrom("support@motionmantra.com", "MotionMantra Support");
    $mail->addAddress($send_to);

    $mail->Subject = "Refund Request Received - MotionMantra";
    $mail->Body = "
    Dear Valued Customer,

    We have successfully received your refund request for the service booked with us.

    - **Service Code:** $pcode
    - **Refund Amount:** ₹$price

    If your payment was made via UPI or bank transfer, the amount will be credited within 7 working days.

    Thank you for choosing MotionMantra.

    Regards,  
    MotionMantra Team  
    ";

    $mail->send();
}

sendMail($send_to_email);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Refund Request | MotionMantra</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }
    body {
        background: linear-gradient(to right, #FF416C, #FF4B2B);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
        color: white;
    }
    .container {
        background: rgba(255, 255, 255, 0.2);
        padding: 30px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        width: 90%;
        animation: fadeIn 1s ease-in-out;
    }
    .icon {
        font-size: 80px;
        color: #4CAF50;
        margin-bottom: 15px;
        animation: bounce 1s infinite alternate;
    }
    .message {
        font-size: 22px;
        margin-bottom: 20px;
    }
    .button {
        background: #fff;
        color: #FF416C;
        font-size: 18px;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: bold;
        margin-top: 20px;
    }
    .button:hover {
        background: #FF4B2B;
        color: white;
        transform: scale(1.05);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounce {
        from {
            transform: translateY(0);
        }
        to {
            transform: translateY(-10px);
        }
    }
</style>
</head>
<body>

<div class="container">
    <div class="icon">&#10004;</div>
    <h1>Thank You for Shopping with MotionMantra!</h1>
    <p class="message">
        Your refund request has been received.<br>
        A confirmation email has been sent to your inbox.
    </p>
    <button class="button" onclick="window.location.href='orders.php'">Go to Orders</button>
</div>

</body>
</html>
