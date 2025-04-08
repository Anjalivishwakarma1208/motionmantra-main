<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize user inputs
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$amount = filter_var($_POST['amount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$image = filter_var($_POST['image'], FILTER_SANITIZE_STRING);
$single_product_category = filter_var($_POST['single_product_category'], FILTER_SANITIZE_STRING);
$single_product_name = filter_var($_POST['single_product_name'], FILTER_SANITIZE_STRING);
$single_product_price = filter_var($_POST['single_product_price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$single_product_image = filter_var($_POST['single_product_image'], FILTER_SANITIZE_STRING);

$_SESSION['email'] = $email;
$pstatus = "Successful";
$ostatus = "Placed";

// Insert order
$stmt = $conn->prepare("INSERT INTO orders (Image, Amount, pstatus, ostatus, user_email) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sdsss", $single_product_image, $single_product_price, $pstatus, $ostatus, $email);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Get cart items
$stmt2 = $conn->prepare("SELECT * FROM cart WHERE User_email = ?");
$stmt2->bind_param("s", $email);
$stmt2->execute();
$result2 = $stmt2->get_result();
$stmt2->close();

$count = 1;

if ($result2->num_rows > 0) {
    while ($order_details = $result2->fetch_assoc()) {
        $name = $order_details['Name'];
        $category = $order_details['Category'];
        $price = $order_details['Price'];
        $image = $order_details['Image'];
        $user_email = $order_details['User_email'];
        $product_code = $order_id . "_" . $count;

        $stmt3 = $conn->prepare("INSERT INTO order_items (Name, Category, Price, Image, Order_id, User_email, Product_code) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt3->bind_param("ssdssss", $name, $category, $price, $image, $order_id, $user_email, $product_code);
        $stmt3->execute();
        $stmt3->close();
        $count++;
    }
} else {
    // Handle "Buy Now" case
    $name = $single_product_name;
    $category = $single_product_category;
    $price = $single_product_price;
    $image = $single_product_image;
    $user_email = $_SESSION['email'];
    $product_code = $order_id . "_" . $count;

    $stmt4 = $conn->prepare("INSERT INTO order_items (Name, Category, Price, Image, Order_id, User_email, Product_code) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt4->bind_param("ssdssss", $name, $category, $price, $image, $order_id, $user_email, $product_code);
    $stmt4->execute();
    $stmt4->close();
}

// Delete items from cart
$stmt5 = $conn->prepare("DELETE FROM cart WHERE User_email = ?");
$stmt5->bind_param("s", $email);
$stmt5->execute();
$stmt5->close();

// Fetch ordered items for email
$stmt6 = $conn->prepare("SELECT * FROM order_items WHERE Order_id = ?");
$stmt6->bind_param("i", $order_id);
$stmt6->execute();
$result6 = $stmt6->get_result();
$stmt6->close();

// Load PHPMailer
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$send_to_email = trim($_SESSION['email'] ?? '');
if (empty($send_to_email) || !filter_var($send_to_email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Invalid or missing email address.");
}

$data = "<table cellspacing='0px' border='1px' style='font-family:Trebuchet MS;padding:4px;width:400px;'>
<tr><th>Name</th><th>Price</th><th>Category</th></tr>";

while ($details = $result6->fetch_assoc()) {
    $data .= "<tr>
        <td align='center'>" . htmlspecialchars($details['Name']) . "</td>
        <td align='center'>" . htmlspecialchars($details['Price']) . "</td>
        <td align='center'>" . htmlspecialchars($details['Category']) . "</td>
        </tr>";
}

$data .= "</table>";

// Send OTP
function sendOTP($send_to) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        
        $mail->Username = "anjali1208vishwakarma@gmail.com";  // Your Gmail address
        $mail->Password = "cbbm zswn jdso ewuv"; 

        $mail->setFrom("anjali1208vishwakarma@gmail.com", "Anjali");
        $mail->addAddress($send_to);

        $otp = random_int(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiry'] = time() + (5 * 60);

        $mail->Subject = "Your MotionMantra Payment OTP";
        $mail->Body = "Your OTP is: <h3>$otp</h3><br>Valid for 5 minutes.";

        $mail->isHTML(true);
        $mail->send();
        // echo "OTP sent successfully!";
    } catch (Exception $e) {
        echo "Email error: " . $mail->ErrorInfo;
    }
}

// Send Order Confirmation
function sendOrderConfirmation($send_to, $data) {
    global $pstatus, $ostatus;

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        
        $mail->Username = "anjali1208vishwakarma@gmail.com"; 
        $mail->Password = "cbbm zswn jdso ewuv";

        $mail->setFrom("anjali1208vishwakarma@gmail.com", "Anjali");
        $mail->addAddress($send_to);

        $mail->Subject = "Order Placed Successfully!";
        $mail->Body = "<html>
        <p style='font-family:Trebuchet MS;'><font size='5px'>Thank You! Your Order is Placed Successfully.</font></p><br>
        <p style='font-family:Trebuchet MS;'><font size='4px'><b>Order Details:</b></font></p><br>" . $data . "<br><br>
        <p><b>Payment Status:</b> " . htmlspecialchars($pstatus) . "</p>
        <p><b>Order Status:</b> " . htmlspecialchars($ostatus) . "</p><br>
        <p>For any queries, contact us at: <b>support@motionmantra.com</b></p><br>
        <p>This is a system-generated email, do not reply.</p><br>
        <p>Thank You!</p>
        </html>";

        $mail->isHTML(true);
        $mail->send();
        // echo "Order confirmation sent!";
    } catch (Exception $e) {
        echo "Email error: " . $mail->ErrorInfo;
    }
}

sendOTP($send_to_email);
sendOrderConfirmation($send_to_email, $data);

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
    <h1>Thank You for Shopping with MotionMantra!</h1>
    <p class="message">Your Order Has Been Placed.<br> A confirmation email has been sent.</p>
    <button class="button" onclick="window.location.href='orders.php'">Go To Orders</button>
</body>
</html>