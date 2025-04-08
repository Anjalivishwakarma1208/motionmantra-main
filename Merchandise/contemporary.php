<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT * FROM products WHERE category='contemporary'");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contemporary</title>
    <link rel="icon" type="image/png" href="logo.png">
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }
        
        header {
            height: 8%;
            width: 100%;
            background: #fff;
            padding: 14px;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #logo {
            height: 60px;
            margin-left: 20px;
            border-radius: 20%;
        }

        form {
            flex-grow: 1;
            display: flex;
            justify-content: center;
        }

        input[type=search] {
            width: 40%;
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
        }

        input[type=submit] {
            background: crimson;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            margin-left: 10px;
        }

        input[type=submit]:hover {
            background: darkred;
        }

        nav {
            margin-right: 20px;
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
            font-size: 43px;
            text-align: center;
            color: #d32f2f;
            font-weight: bold;
            margin-top: 50px;
        }

        hr {
            border: none;
            height: 2.5px;
            background-color: #d32f2f;
            width: 50%;
            margin: auto;
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
            background: #fff;
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

        .product-info a {
            text-decoration: none;
            color: crimson;
            font-weight: bold;
            transition: all 0.3s;
        }

        .product-info a:hover {
            text-decoration: underline;
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
        <img id="logo" src="images/logo.png" alt="Logo">
        <form action="search.php">
            <input type="search" name="category_search" placeholder="Search for your Favourite Products!">
            <input type="submit" value="Search">
        </form>
        <nav>
            <a href="#about-us"><i class="fa-solid fa-address-card"></i> About Us</a>
            <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>
            <a href="#archives"><i class="fa-solid fa-medal"></i> Archives</a>
        </nav>
    </header>

    <p id="RP">List Of Products</p>
    <hr>

    <div class="product-container">
        <?php
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
