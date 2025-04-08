<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $email = $_SESSION["user_id"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - MotionMantra</title>
    <link rel="icon" type="image/png" href="logo.png">
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            height: 8%;
            width: 100%;
            background: #fff;
            padding: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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

        /* About Us Section */
        .about-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            text-align: center;
            color: #d32f2f;
            margin-bottom: 20px;
            font-weight: bold;
        }

        p {
            font-size: 18px;
            line-height: 1.8;
            text-align: justify;
            color: #555;
            padding: 0 20px;
            margin-bottom: 20px;
        }

        footer {
            background: lavenderblush;
            padding: 40px;
            text-align: center;
            margin-top: 60px;
        }

        footer .social-links {
            margin-bottom: 20px;
        }

        footer .social-links a {
            color: crimson;
            font-size: 20px;
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s;
        }

        footer .social-links a:hover {
            color: white;
            background: crimson;
            padding: 8px 15px;
            border-radius: 50%;
        }

        footer p {
            font-size: 16px;
            color: crimson;
        }

        footer a {
            text-decoration: none;
            color: crimson;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }

        #copyright {
            font-size: 14px;
            color: crimson;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<header>
    <img id="logo" src="images/logo.png" alt="MotionMantra Logo">
    <form action="search.php">
        <input type="search" name="category_search" placeholder="Search for your Favourite Products!">
        <input type="submit" value="Search">
    </form>
    <nav>
        <a href="about us.php"><i class="fa-solid fa-address-card"></i> About Us</a>
        <a href="home.php"><i class="fa-solid fa-home"></i> Home</a>
        <a href="archives.php"><i class="fa-solid fa-medal"></i> Archives</a>
    </nav>
</header>

<div class="about-container">
    <h1>About MotionMantra</h1>

    <p>
        At MotionMantra, we believe in the power of fashion and style. With our carefully curated collection of streetwear, we cater to the modern individual who values quality, comfort, and trend-setting designs.
        <br><br>
        In today’s world, fashion is a form of self-expression. MotionMantra is here to help you express your individuality through premium streetwear that offers both comfort and a unique look.
        <br><br>
        We understand that finding the perfect outfit can be overwhelming, especially with so many options available. Our platform aims to make it easy for you to browse and discover pieces that match your unique style, offering a seamless shopping experience from start to finish.
        <br><br>
        Whether you’re looking for bold statement pieces, everyday casuals, or something in between, MotionMantra has you covered. We are passionate about delivering high-quality products from top brands at competitive prices, ensuring that our customers feel stylish and confident in every outfit they choose.
        <br><br>
        Our mission is simple: to bring fashion-forward streetwear to every individual who values quality and comfort. We also believe in making fashion accessible to everyone. So, explore our range and find your new favorite piece today.
        <br><br>
        We are constantly evolving, and we are working towards making the shopping experience even more convenient with an upcoming mobile app, bringing MotionMantra closer to you.
    </p>
</div>

<footer>
    <div class="social-links">
        <a href="https://www.instagram.com/MotionMantra"><i class="fa-brands fa-instagram"></i></a>
        <a href="tel:+919892874480"><i class="fa-solid fa-phone"></i></a>
        <a href="https://twitter.com/MotionMantra"><i class="fa-brands fa-twitter"></i></a>
    </div>
    <p>
        <a href="home.php">Home</a> | <a href="#about-us">About Us</a> | <a href="archives.php">Archives</a>
    </p>
    <p id="copyright">All Copyrights Reserved <i class="fa-regular fa-copyright"></i> MotionMantra</p>
</footer>

<?php
echo $email;
?>

</body>
</html>
