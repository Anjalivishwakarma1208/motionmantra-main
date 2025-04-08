<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if search input exists
$search = "";
if (isset($_POST['search'])) {
    $search = trim($_POST['search']);
}

// Secure search query using prepared statements
$sql = "SELECT * FROM products WHERE Name LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $search . "%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="icon" type="image/png" href="logo.png">
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
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
            border-radius: 20%;
        }

        form {
            display: flex;
            gap: 10px;
        }

        input[type="search"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        input[type="submit"] {
            background: crimson;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background: darkred;
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

        #RP {
            font-size: 30px;
            text-align: center;
            color: crimson;
            font-weight: bold;
            margin-top: 30px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 40px;
        }

        .product-box {
            width: 300px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            text-align: center;
        }

        .product-box:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transform: scale(1.03);
        }

        .product-box img {
            width: 100%;
            height: 250px;
            object-fit: contain;
            padding: 10px;
            transition: transform 0.3s;
        }

        .product-box img:hover {
            transform: scale(1.05);
        }

        .product-info {
            padding: 15px;
            font-size: 18px;
            color: crimson;
        }

        .product-info .price {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 8px;
        }

        footer {
            background: lavenderblush;
            padding: 20px;
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
        <img id="logo" src="images/logo.png" alt="Logo">
        <form action="search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Products..." required>
            <input type="submit" value="Search">
        </form>
        <nav>
            <a href="cart2.php"><i class="fa-solid fa-shopping-cart"></i> Cart</a>
            <a href="about us.php"><i class="fa-solid fa-address-card"></i> About Us</a>
            <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>
            <a href="archives.php"><i class="fa-solid fa-medal"></i> Archives</a>
        </nav>
    </header>

    <p id="RP">Search Results</p>

    <div class="product-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-box'>";
                echo "<a href='product.php?id=" . $row['Id'] . "'>";
                echo "<img src='" . $row['image'] . "' alt='" . $row['Name'] . "'>";
                echo "<div class='product-info'>";
                echo "<div class='price'>₹" . $row['Price'] . "</div>";
                echo "<a href='product.php?id=" . $row['Id'] . "'>" . $row['Name'] . "</a>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "<p style='text-align:center; font-size:20px; color:#777;'>No products found.</p>";
        }
        ?>
    </div>

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
