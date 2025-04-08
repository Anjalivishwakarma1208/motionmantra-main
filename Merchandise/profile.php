<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Get user details from session
$email = $_SESSION['email'];
$name = $_SESSION['name'];

// Fetch full user details from database
$stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/png" href="logo.png">
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background: crimson;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: crimson;
            font-size: 26px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }

        strong {
            color: #555;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 10px;
            background: crimson;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            transition: all 0.3s;
        }

        .btn:hover {
            background: darkred;
        }
    </style>
</head>
<body>

<header>
    Profile Page
</header>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['Phone_No']); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($user['Address_Line_1']) . " " . htmlspecialchars($user['Address_Line_2']) . " " . htmlspecialchars($user['Address_Line_3']); ?></p>
    <p><strong>Pincode:</strong> <?php echo htmlspecialchars($user['Pincode']); ?></p>

    <div class="btn-container">
        <a href="home.php" class="btn"><i class="fa-solid fa-home"></i> Home</a>
        <a href="logout.php" class="btn"><i class="fa-solid fa-sign-out"></i> Logout</a>
    </div>
</div>

</body>
</html>
