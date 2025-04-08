<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the form is submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
    $lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
    $email = isset($_POST['gmail']) ? trim($_POST['gmail']) : '';  
    $pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';
    $contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
    $add1 = isset($_POST['add1']) ? trim($_POST['add1']) : '';
    $add2 = isset($_POST['add2']) ? trim($_POST['add2']) : '';
    $add3 = isset($_POST['add3']) ? trim($_POST['add3']) : '';
    $pincode = isset($_POST['pincode']) ? trim($_POST['pincode']) : '';

    // Check if required fields are missing
    if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($contact) || empty($add1) || empty($add2) || empty($pincode)) {
        die("Error: Missing required fields. Please fill in all fields.");
    }

    
    // Check if email already exists
    $check_sql = "SELECT * FROM users WHERE Email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        die("Error: Email already registered. Please use a different email.");
    }

    // Insert data using prepared statement
    $stmt = $conn->prepare("INSERT INTO users (First_Name, Last_Name, Email, Password, Phone_No, Address_Line_1, Address_Line_2, Address_Line_3, Pincode) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $fname, $lname, $email, $pass, $contact, $add1, $add2, $add3, $pincode);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    die("Invalid request method.");
}

$conn->close();
?>
