<?php
session_start();


// Use correct keys
if (!isset($_SESSION['single_product_name'], $_SESSION['single_product_price'], $_SESSION['single_product_category'], $_SESSION['single_product_image'], $_SESSION['email'])) {
    die("The Data was Not Retrieved. Please make sure all session variables are set.");
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_SESSION['single_product_name'];
$price = $_SESSION['single_product_price'];
$category = $_SESSION['single_product_category'];
$image = $_SESSION['single_product_image'];
$user_mail = $_SESSION['email'];


$stmt = $conn->prepare("INSERT INTO cart (Name, Category, Price, Image, User_email) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdss", $name, $category, $price, $image, $user_mail);

if ($stmt->execute()) {
    echo "<script>alert('Product Added To Cart Successfully!!');</script>";
    header("Location: cart2.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
