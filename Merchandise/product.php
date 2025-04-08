<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['product_id'] = $id;
}

$result = $conn->query("SELECT * FROM products WHERE id='$id'");

$product = $result->fetch_assoc();

$_SESSION['single_product_price'] = $product['Price'];
$_SESSION['single_product_name'] = $product['Name'];
$_SESSION['single_product_category'] = $product['Category'];
$_SESSION['single_product_image'] = $product['image'];


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['Name']; ?></title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            padding: 15px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        #logo {
            height: 50px;
        }
        nav a {
            color: crimson;
            font-size: 18px;
            text-decoration: none;
            margin: 0 15px;
            transition: all 0.3s;
        }
        nav a:hover {
            color: white;
            background: crimson;
            padding: 5px 10px;
            border-radius: 8px;
        }
        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 50px;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            margin: 40px auto;
            max-width: 900px;
        }
        .product-img img {
            width: 100%;
            max-width: 350px;
            border-radius: 12px;
        }
        .product-details {
            padding: 20px;
            max-width: 400px;
        }
        .product-details h1 {
            color: crimson;
        }
        .product-details .price {
            font-size: 24px;
            color: #d32f2f;
            font-weight: bold;
        }
        button {
            background: crimson;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            margin: 10px 0;
            transition: all 0.3s;
        }
        button:hover {
            background: darkred;
        }
        footer {
            background: lavenderblush;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <img id="logo" src="images/logo.png" alt="Logo">
        <nav>
            <a href="cart2.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
            <a href="about_us.php"><i class="fa-solid fa-address-card"></i> About Us</a>
            <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>
        </nav>
    </header>

    <div class="product-container">
        <div class="product-img">
            
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['Name']; ?>">
        </div>
        <div class="product-details">
            <h1><?php echo $product['Name']; ?></h1>
            <p class="price">₹<?php echo $product['Price']; ?></p>
            <p><?php echo $product['Description_1']; ?></p>
            <button onclick="window.location.href='payscript.php'">Buy Now</button>
            <button onclick="window.location.href='cart.php'">Add to Cart</button>
        </div>
    </div>

    <footer>
        <p>
            <i class="fa-brands fa-instagram"></i> MotionMantra &nbsp;&nbsp;
            <i class="fa-solid fa-phone"></i> 9892874480 &nbsp;&nbsp;
            <i class="fa-brands fa-twitter"></i> MotionMantra
        </p>
        <p>All Copyrights Reserved <i class="fa-regular fa-copyright"></i></p>
    </footer>
</body>
</html>
