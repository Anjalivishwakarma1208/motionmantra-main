<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="icon" type="image/png" href="images/logo.png">
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

        .cart-table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            background: crimson;
            color: white;
            font-size: 16px;
        }

        .cart-table img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        #makePaymentBtn {
            display: block;
            margin: 30px auto;
            width: 200px;
            height: 50px;
            font-size: 18px;
            font-weight: bold;
            background-color: crimson;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.3s;
        }

        #makePaymentBtn:hover {
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
        <img id="logo" src="images/logo.png" alt="Logo">
        <nav>
            <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>
            <a href="about us.php"><i class="fa-solid fa-address-card"></i> About Us</a>
            <a href="archives.php"><i class="fa-solid fa-medal"></i> Archives</a>
        </nav>
    </header>

    <p id="RP">Your Cart</p>
    <hr>

    <table class="cart-table">
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        <?php
            session_start();
            $conn = new mysqli("localhost", "root", "", "merchandise");
            $user_mail = $_SESSION['email'];
            $result = $conn->query("SELECT * FROM cart WHERE User_email='$user_mail'");
            $grandTotal = 0;
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='".$row['Image']."' alt='Image'></td>";
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>Rs. " . $row['Price'] . "</td>";
                    echo "<td>".$row['Category']."</td>";
                    echo "<td><a href='payment_remove.php?productId=".$row['Id']."' style='color: crimson; text-decoration: none;'>Remove</a></td>";
                    echo "</tr>";
                    $grandTotal += (int)$row['Price'];
                }
            } else {
                echo "<tr><td colspan='5'><h2>You Have Not Added Any Product To Cart.</h2></td></tr>";
            }
            $_SESSION['price'] = $grandTotal;
        ?>
    </table>

    <h1 id='grandTotal' align='center'>Total Amount: Rs <?php echo $grandTotal; ?></h1>

    <a href="payscript.php"><button id="makePaymentBtn">Make Payment</button></a>

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
