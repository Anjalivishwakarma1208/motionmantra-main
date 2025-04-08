<?php
session_start();
include('./dbConnection.php');

$apikey = "rzp_test_yjcGQVYbA8qInJ";
// session_start();
if (!isset($_SESSION['amount']) || !is_numeric($_SESSION['amount']) || $_SESSION['amount'] <= 0) {
    die("Error: Invalid Amount. Please go back and try again.");
}
$amount = (int) $_SESSION['amount'] * 100; // Convert to integer paise
$amountInRupees = $amount / 100;


$send_to_email = isset($_SESSION['stuLogEmail']) ? $_SESSION['stuLogEmail'] : "";
$course_id = isset($_POST['course_id']) ? $_POST['course_id'] : (isset($_SESSION['course_id']) ? $_SESSION['course_id'] : null);
$order_id = 'ORDS' . rand(10000, 99999999);
$order_date = date("Y-m-d H:i:s");

// ✅ Fixed SQL Query
$sql = "INSERT INTO courseorder (order_id, stu_email, course_id, status, respmsg, amount, order_date) 
        VALUES (?, ?, ?, 'successful', 'Transaction Successful', ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssids", $order_id, $send_to_email, $course_id, $amountInRupees, $order_date);
$stmt->execute();

require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendMail($send_to)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->isHTML(true); // ✅ FIXED

    $mail->Username = "anjali1208vishwakarma@gmail.com";
    $mail->Password = "cbbm zswn jdso ewuv";

    $mail->setFrom("anjali1208vishwakarma@gmail.com", "Anjali");
    $mail->addAddress($send_to);

    $otp = random_int(100000, 999999);
    $mail->Subject = "Payment OTP";
    $mail->Body = "
    <html>
        <p>Your OTP for payment is:</p> 
        <h3>$otp</h3>
        <p>This OTP is valid for 5 minutes. Please do not share it.</p>
        <p>Thank You!</p>
    </html>";

    $mail->send();
}

sendMail($send_to_email);
?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    setTimeout(() => $('.razorpay-payment-button').click(), 5000);
</script>
<form action="mail.php" method="post">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apikey; ?>"
    data-amount="<?php echo $amount; ?>"
    data-currency="INR"
    data-id="1001"
    data-buttontext="Pay With Razorpay"
    data-name="MotionMantra"
    data-description="MotionMantra's Online Training Course"
    data-image="images/logo.png"
    data-prefill.name="Anjali Vishwakarma"
    data-prefill.email="your-email@gmail.com"
    data-prefill.contact="9892874480"
    data-theme.color="#FE5BAC">
</script>
</form>

<style>
    .razorpay-payment-button {display:none;}
    .loader {
        border:12px solid #fe5bac;
        border-top:12px solid white;
        border-radius:50%;
        width:100px;
        height:100px;
        animation:spin 1.5s linear infinite;
        margin: 18% auto;
    }
    @keyframes spin { 0%{transform:rotate(0deg);}100%{transform:rotate(360deg);} }
</style>

<div class="loader" id="load"></div>
<h1>Loading....</h1>
