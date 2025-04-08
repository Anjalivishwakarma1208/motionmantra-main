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
$user_mail=$_SESSION['email'];
$order_id = $_GET['oid'];

$sql="SELECT * FROM order_items WHERE Order_id='$order_id'";

$result = $conn->query($sql);
$conn->close();
?>
<html>
    <head><title>Order Details</title>
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
    table {
        width: 80%;
        margin: 40px auto;
        border-collapse: collapse;
        background: white;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    th, td {
        padding: 15px;
        border-bottom: 2px solid #dc3545;
        text-align: center;
    }
    th {
        background: #dc3545;
        color: white;
    }
    .cart_image img {
        height: 100px;
        width: 100px;
        border-radius: 10px;
        border: 2px solid #343a40;
    }
    #track_order {
        padding: 10px 20px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        text-decoration: none;
    }
    #track_order:hover {
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
    <img id="logo" src="images/logo.png">
    <nav>
        <a href="about us.php"><i class="fa-solid fa-address-card"></i> About Us</a>
        <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>
        <a href="archives.php"><i class="fa-solid fa-medal"></i> Archives</a>
    </nav>
</header>
<p id="RP">Your Orders</p>
<table>
    <tr>
        <th>Sr No.</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Refund Status</th>
        <th>Action</th>
    </tr>
    <?php
    $sr_no = 1;
    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>".$sr_no."</td>";
            echo "<td class='cart_image'><img src='".$row['Image']."' alt='Image'></td>";
            echo "<td>".$row['Name']."</td>";
            echo "<td>$".$row['Price']."</td>";
            echo "<td>".$row['Refund_status']."</td>";
            
            if ($row['Refund_status'] == "-")
            {
                echo "<td><a href='order_info.php?id=".$row['Id']."' id='track_order'>Return</a></td>";
            }
            else
            {
                echo "<td>-</td>";
            }
            echo "</tr>";
            $sr_no++;
        }
    }
    else
    {
        echo "<tr><td colspan='6'>You Don't Have Any Items For This Order</td></tr>";
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
