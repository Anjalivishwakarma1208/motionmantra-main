<?php
session_start(); // Start session at the very beginning

$apikey = "rzp_test_yjcGQVYbA8qInJ";
$amount = isset($_SESSION['price']) ? $_SESSION['price'] * 100 : 0;
$og_amount = $amount/100;
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Retrieve session variables safely
$send_to_email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
$price = isset($_SESSION['price']) ? $_SESSION['price'] : "";
$image = isset($_SESSION['image']) ? $_SESSION['image'] : "";
$single_product_price = isset($_SESSION['single_product_price']) ? $_SESSION['single_product_price'] : "";
$single_product_name = isset($_SESSION['single_product_name']) ? $_SESSION['single_product_name'] : "";
$single_product_category = isset($_SESSION['single_product_category']) ? $_SESSION['single_product_category'] : "";
$single_product_image = isset($_SESSION['single_product_image']) ? $_SESSION['single_product_image'] : "";

// Debugging: Print session data 
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// Check if essential session values exist
if (empty($single_product_price) || empty($send_to_email)) {
    die("Error: Required session data is missing. Please go back and try again.");
}

function sendMail($send_to)
{
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        
        // Use your Gmail & App Password
        $mail->Username = "anjali1208vishwakarma@gmail.com"; 
        $mail->Password = "cbbm zswn jdso ewuv"; // 16-character App Password

        $mail->setFrom("anjali1208vishwakarma@gmail.com", "Anjali");
        $mail->addAddress($send_to);

        $otp = random_int(100000, 999999);
        $mail->Subject = "Your MotionMantra Payment OTP";
        $mail->Body = "
        <html>
            <p>Your OTP for payment is: <h3>$otp</h3></p>
            <p>This OTP is valid for 5 minutes. Please do not share it.</p>
            <p>Thank You!</p>
        </html>";
        $mail->isHTML(true);

        $mail->send();
        echo "OTP sent successfully!";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


// Send OTP email
sendMail($send_to_email);
?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    setTimeout(function() {
        $('.razorpay-payment-button').click();
    }, 5000);
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
        data-description="MotionMantra's Merchandise"
        data-image="images/logo.png"
        data-prefill.name="Anjali Vishwakarma"
        data-prefill.email="your-email@gmail.com"
        data-prefill.contact="9892874480"
        data-theme.color="#FE5BAC">
    </script>

    <?php
        echo "<input type='hidden' name='email' value ='".$send_to_email."'>";
        echo "<input type='hidden' name='amount' value ='".$price."'>";
        echo "<input type='hidden' name='image' value ='".$image."'>";
        echo "<input type='hidden' name='single_product_price' value ='".$single_product_price."'>";
        echo "<input type='hidden' name='single_product_category' value ='".$single_product_category."'>";
        echo "<input type='hidden' name='single_product_name' value ='".$single_product_name."'>";
        echo "<input type='hidden' name='single_product_image' value ='".$single_product_image."'>";
    ?>
</form>

<style>
    .razorpay-payment-button {display: none;}
    .loader {
        border: 12px solid #fe5bac;
        border-top: 12px solid white;
        border-radius: 50%;
        width: 100px;
        height: 100px;
        animation: spin 1.5s linear infinite;
        margin: 18% auto;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="loader"></div>
<h1>Processing your MotionMantra payment...</h1>
