<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
}
$_SESSION['order_id']=$_GET['id'];
?>


<html>
    <head><title>Product Detailes</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <style>
    body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background: #fff;
            padding: 14px;
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
        text-align: center;
        padding: 20px;
        background: white;
        width: 50%;
        margin: 20px auto;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .product-image {
        height: 300px;
        width: 300px;
        border-radius: 10px;
        border: 2px solid #343a40;
    }
    .product-name {
        font-size: 24px;
        font-weight: bold;
        color: #dc3545;
    }
    .separator {
        border: none;
        height: 2.5px;
        background: crimson;
        margin: 10px auto;
        width: 80%;
    }
    .product-details {
        font-size: 18px;
        color: #343a40;
    }
    .return-container {
        text-align: center;
        margin-top: 20px;
        padding: 20px;
    }
    .return-form {
        display: inline-block;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .reason-input {
        width: 80%;
        padding: 10px;
        border: 2px solid #dc3545;
        border-radius: 5px;
        font-size: 16px;
    }
    .submit-btn {
        padding: 10px 20px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        font-size: 16px;
    }
    .submit-btn:hover {
        background: #a71d2a;
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

    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <header>
            <span>
            <img id="logo" src="images/logo.png">
            </span>
            <nav>
                <a href="about us.php"><i class="fa-solid fa-address-card"></i> About Us</a>&nbsp&nbsp&nbsp&nbsp
                <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>&nbsp&nbsp&nbsp&nbsp
                <a href="archives.php"><i class="fa-solid fa-medal"></i> Archives </a>
            </nav>
        </header><br><br><br>
        <?php
$id = $_GET['id'];
$result2 = $conn->query("SELECT * FROM order_items WHERE Id='$id'");

while ($product = $result2->fetch_assoc()) {
    echo "<div class='product-container'>";
    echo "<img src='" . $product['Image'] . "' class='product-image'>";
    echo "<p class='product-name'>" . $product['Name'] . "</p>";
    echo "<h1>Order Details</h1>";
    echo "<hr class='separator'>";
    echo "<p class='product-details'> <strong>Product Code:</strong> " . $product['Product_code'] . "</p>";
    $_SESSION['product_code'] = $product['Product_code'];
    echo "<p class='product-details'><strong>Price:</strong> $" . $product['Price'] . "</p>";
    $_SESSION['price'] = $product['Price'];
    echo "</div>";
}
$conn->close();
?>

<div class="return-container">
    <form class="return-form" action="cancel.php">
        <h2>Want to Cancel/Return Product?</h2>
        <h3>Write the reason below:</h3>
        <input type="text" name="return" placeholder="Enter your reason" class="reason-input">
        <br><br>
        <input type="submit" value="Submit" class="submit-btn">
    </form>
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
