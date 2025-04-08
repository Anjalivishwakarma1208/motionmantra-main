<?php 
include('./dbConnection.php');
session_start();

if (!isset($_SESSION['stuLogEmail'])) {
    echo "<script> location.href='loginorsignup.php'; </script>";
    exit();
}

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

$stuEmail = $_SESSION['stuLogEmail'];
$course_id = $_POST['course_id'] ?? '';
$amount = $_SESSION['amount'] = $_POST['amount'] ?? 0;


if (!$course_id || !$amount) {
    die("<div class='alert alert-danger text-center'>Error: Missing Course ID or Amount.</div>");
}

// Generate Unique Order ID
$order_id = 'ORDS' . rand(10000, 99999999);
$order_date = date("Y-m-d H:i:s");

// ✅ Check if Student Already Purchased the Course
$check_sql = "SELECT * FROM courseorder WHERE stu_email = ? AND course_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("si", $stuEmail, $course_id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    die("<div class='alert alert-warning text-center'>You have already purchased this course.</div>");
}
    echo "<div class='alert alert-success text-center'>Kindly Wait! We are Redirecting...</div>";
    echo "<script>setTimeout(() => { location.href='payscript2.php'; }, 2000);</script>";

?>
