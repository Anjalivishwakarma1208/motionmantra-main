<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['gmail'];
$password = $_POST['pass'];

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$_SESSION['user_id']=$email;

$sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) 
{
    header("Location: home.php?email=$email"); 
    exit();
} 
else 
{
    echo "<script>window.location.href = 'login.php';alert('Invalid Email or Password');</script>";
}

$conn->close();
?>
