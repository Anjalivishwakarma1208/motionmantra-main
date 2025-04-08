<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT * FROM products WHERE category='jazz'");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotionMantra Archives</title>
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

        h1 {
            font-size: 40px;
            text-align: center;
            color: #d32f2f;
            font-weight: bold;
            margin-top: 50px;
        }

        .archive-table {
            width: 80%;
            margin: 50px auto;
            border: 7px outset black;
            border-radius: 8px;
            padding: 10px;
            background-color: white;
        }

        .archive-table th,
        .archive-table td {
            padding: 15px;
            text-align: center;
            font-size: 18px;
            color: crimson;
        }

        .archive-table th {
            background-color: #f8f8f8;
        }

        footer {
            background-color: lavenderblush;
            padding: 30px;
            text-align: center;
            margin-top: 40px;
        }

        footer p {
            font-size: 18px;
            color: crimson;
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
            <a href="cart2.php"><i class="fa-solid fa-shopping-cart"></i> Cart</a>
            <a href="about us.php"><i class="fa-solid fa-address-card"></i> About Us</a>
            <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>
            <!-- <a href="archives.php"><i class="fa-solid fa-medal"></i> Archives</a> -->
        </nav>
    </header>

    <h1>Our Journey Through the Years</h1>

    <table class="archive-table">
        <thead>
            <tr>
                <th>Year</th>
                <th>Milestone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2010</td>
                <td>MotionMantra was established with the aim to revolutionize online shopping with high-quality products.</td>
            </tr>
            <tr>
                <td>2013</td>
                <td>We reached over 10,000 active customers, creating a growing community of happy shoppers.</td>
            </tr>
            <tr>
                <td>2015</td>
                <td>Surpassed 5,000 daily orders! Our commitment to quality service earned us the trust of more and more customers.</td>
            </tr>
            <tr>
                <td>2016</td>
                <td>MotionMantra was recognized as one of the top 25 most trusted online shopping destinations in India.</td>
            </tr>
            <tr>
                <td>2018</td>
                <td>Our active customer base crossed the 25,000 mark! The brand continued to grow rapidly.</td>
            </tr>
            <tr>
                <td>2019</td>
                <td>We saw over 15,000 daily orders, a huge milestone for our e-commerce platform.</td>
            </tr>
            <tr>
                <td>2021</td>
                <td>MotionMantra was ranked among the top 10 most trusted online shopping websites in India. A huge honor!</td>
            </tr>
            <tr>
                <td>2023</td>
                <td>Our customer base touched a new high of 40,000 active customers. The future looks brighter than ever!</td>
            </tr>
        </tbody>
    </table>

    <footer>
        <p>
            <i class="fa-brands fa-instagram"></i>  MotionMantra &nbsp;&nbsp;
            <i class="fa-solid fa-phone"></i> 9892874480 &nbsp;&nbsp;
            <i class="fa-brands fa-twitter"></i> MotionMantra
        </p>
        <p id="copyright">All Copyrights Reserved <i class="fa-regular fa-copyright"></i></p>
    </footer>
</body>
</html>
