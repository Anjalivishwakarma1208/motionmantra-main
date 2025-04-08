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
$email=$_SESSION['USERMAIL'];
echo $email;
$fname=$_POST['fname'];
echo $fname;
$lname=$_POST['lname'];
echo $lname;
$gmail=$_POST['gmail'];
echo $gmail;
$contact=$_POST['contact'];
echo $contact;
$add1=$_POST['add1'];
echo $add1;
$add2=$_POST['add2'];
echo $add2;
$add3=$_POST['add3'];
echo $add3;
$pincode=$_POST['pincode'];
echo $pincode;

$sql="UPDATE users SET First_Name='$fname',Last_Name='$lname',Email='$gmail',Phone_No='$contact',Address_Line_1='$add1',Address_Line_2='$add2',Address_Line_3='$add3',Pincode='$pincode' WHERE Email='$email'";
$result = $conn->query($sql);
header("Location:login.php");
?>