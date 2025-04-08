<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure user is logged in
if (!isset($_SESSION['email'])) {
    die("Unauthorized access. Please log in first.");
}

$user_mail = $_SESSION['email'];

// Fetch user's orders
$sql = "SELECT * FROM orders WHERE User_email = ? ORDER BY Id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_mail);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders - MotionMantra</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        #logo {
            height: 60px;
            margin-left: 20px;
            border-radius: 20%;
        }
        nav a {
            color: crimson;
            font-size: 18px;
            text-decoration: none;
            margin: 0 10px;
            transition: all 0.3s;
        }
        nav a:hover {
            color: white;
            background: crimson;
            padding: 5px 10px;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: crimson;
            font-weight: bold;
            margin-top: 30px;
        }
        .orders-table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .orders-table th, .orders-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .orders-table th {
            background: crimson;
            color: white;
            font-size: 16px;
        }
        .orders-table img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        .track-btn {
            padding: 8px 15px;
            background-color: crimson;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }
        .track-btn:hover {
            background-color: darkred;
            transform: scale(1.05);
        }
        footer {
            background: lavenderblush;
            padding: 30px;
            text-align: center;
            margin-top: 40px;
        }
        #copyright {
            font-size: 18px;
            color: crimson;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <header>
        <img id="logo" src="images/logo.png" alt="MotionMantra Logo">
        <nav>
            <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>
            <a href="about_us.php"><i class="fa-solid fa-address-card"></i> About Us</a>
            <a href="archives.php"><i class="fa-solid fa-medal"></i> Archives</a>
        </nav>
    </header>

    <h1>Your Orders</h1>
    <hr style="border: none; height: 2px; background-color: crimson; width: 50%; margin: auto;">

    <table class="orders-table">
        <tr>
            <th>Image</th>
            <th>Order Amount</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; 
                // echo "<td><img src='images/" . htmlspecialchars($row['Image']) . "' alt='Product Image'></td>";
                echo "<td><img src='".$row['Image']."' alt='Image'></td>";

                echo "<td>Rs. " . htmlspecialchars($row['Amount']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pstatus']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ostatus']) . "</td>";
                echo "<td><a href='order_details.php?oid=" . $row['Id'] . "' class='track-btn'>Show Details</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'><h2>You Have Not Ordered Anything Yet.</h2></td></tr>";
        }
        ?>
    </table>

    <footer>
        <p>
            <i class="fa-brands fa-instagram"></i> MotionMantra &nbsp;&nbsp;
            <i class="fa-solid fa-phone"></i> 9892874480 &nbsp;&nbsp;
            <i class="fa-brands fa-twitter"></i> MotionMantra
        </p>
        <p id="copyright">All Copyrights Reserved <i class="fa-regular fa-copyright"></i></p>
    </footer>

</body>
</html>
