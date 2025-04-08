<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM products ORDER BY RAND()");

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = '';
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Modern Look</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Swiper CSS (CDN) -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            color: #333;
            line-height: 1.6;
        }
        a {
            text-decoration: none;
            color: inherit;
        }

        /* Header */
        header {
            background-color: #fff;
            padding: 20px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        header .logo img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        .search-container {
            flex: 1;
            margin: 0 40px;
            position: relative;
        }
        .search-container input[type="search"] {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid #ddd;
            border-radius: 30px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        .search-container input[type="search"]:focus {
            outline: none;
            border-color: #ff4d4d;
        }
        .search-container input[type="submit"] {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-container input[type="submit"]:hover {
            background-color: #e04343;
        }
        nav {
            display: flex;
            gap: 20px;
        }
        nav a {
            font-weight: 500;
            color: #ff4d4d;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #e04343;
        }

        /* Swiper Hero Slider */
        .hero-swiper {
            width: 100%;
            height: 800px; /* Adjust the hero height as needed */
            margin-bottom: 20px; /* Space below the slider */
            position: relative;
        }
        .hero-swiper .swiper-slide {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .hero-swiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Fill the slide area with the image */
        }
        /* Text overlay on each slide */
        .slide-text {
            position: absolute;
            z-index: 2;
            color: #fff;
            text-align: center;
        }
        .slide-text h2 {
            font-size: 3rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .slide-text p {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        /* Swiper Navigation Arrows */
        .swiper-button-next,
        .swiper-button-prev {
            color: #ff4d4d; /* Arrow color */
        }
        /* Swiper Pagination Dots */
        .swiper-pagination-bullet {
            background: #ff4d4d;
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            margin: 40px 0 10px;
            font-size: 2.5rem;
            color: #ff4d4d;
        }
        .section-subtitle {
            text-align: center;
            margin-bottom: 30px;
            color: #666;
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 0 40px;
            margin-bottom: 40px;
        }
        .product-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .product-card img {
            width: 100%;
            height: 200px;
            /* Using object-fit: contain ensures the entire image is visible
               without cropping. If you prefer a filled look, you could switch to 'cover'. */
            object-fit: contain;
        }
        .product-card .info {
            padding: 15px;
            text-align: center;
        }
        .product-card .info span {
            display: block;
            margin: 5px 0;
        }
        .product-card .info .price {
            font-weight: 700;
            color: #ff4d4d;
            font-size: 1.2rem;
        }
        .product-card .info .name {
            font-size: 1rem;
            color: #555;
        }

        /* Footer */
        footer {
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
            margin-top: 40px;
        }
        footer .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            text-align: center;
        }
        footer .footer-grid a {
            color: #ff4d4d;
            font-size: 1.1rem;
            transition: color 0.3s;
        }
        footer .footer-grid a:hover {
            color: #e04343;
        }
        footer .socials {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        footer .socials i {
            font-size: 1.5rem;
            color: #ff4d4d;
            transition: color 0.3s;
        }
        footer .socials i:hover {
            color: #e04343;
        }
        footer p {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #777;
        }

        /* Responsive (Overall) */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
            }
            .search-container {
                margin: 20px 0;
            }
            nav {
                flex-wrap: wrap;
                justify-content: center;
            }
            .hero-swiper {
                height: 400px;
            }
            .slide-text h2 {
                font-size: 2rem;
            }
            .slide-text p {
                font-size: 1rem;
            }
        }
    </style>

    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>

    <script>
        function login_required() {
            alert("Please Log In to Go Ahead.");
            window.location.href = "login.php";
            return false;
        }
        function redirectToLocalServer() {
        window.location.href = "http://localhost/motionmantra/";
    }
    </script>
</head>
<body>
    <!-- HEADER (unchanged) -->
    <header>
        <div class="logo">
            <a href="home.php"><img src="images/logo.png" alt="Logo"></a>
        </div>
        <div class="search-container">
            <form action="search.php" method="post">
                <input type="search" name="search" placeholder="Search for your Favourite Products!">
                <input type="submit" value="Search">
            </form>
        </div>
        <nav>
            <a href="about us.php"><i class="fa-solid fa-address-card"></i> About Us</a>
            <?php echo "<a href='profile.php?email=".$email."'><i class='fa-solid fa-user'></i> Profile</a>";?>
            <a href="archives.php"><i class="fa-solid fa-medal"></i> Archives</a>
            <a href="cart2.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
            <a href="orders.php"><i class="fa-solid fa-shopping-bag"></i> Orders</a>
            <a href="#" onclick="redirectToLocalServer(); return false;">
    <i class="fa-solid fa-film"></i> MotionMantra
</a>
        </nav>
    </header>

    <!-- HERO SWIPER (replaces the single <img id="banner">) -->
    <div class="swiper hero-swiper">
      <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <img src="images/heroes1.webp" alt="Slide 1">
          <div class="slide-text">
          <h2>Dress to Impress</h2>
          <p>Where style meets elegance every day.</p>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide">
          <img src="images/heroes2.webp" alt="Slide 2">
          <div class="slide-text">
          <h2>Step Up Your Game</h2>
          <p>Elevate your style with every graceful move.</p>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="swiper-slide">
          <img src="images/heroes3.webp" alt="Slide 3">
          <div class="slide-text">
          <h2>Step Out in Style</h2>
          <p>Curate your look with our exclusive collections.</p>
          </div>
        </div>
      </div>
      <!-- Swiper Pagination & Navigation (optional) -->
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- Shop By Category Section -->
    <section id="categories">
        <h2 class="section-title" id="SBC">Shop By Category</h2>
        <p class="section-subtitle">Shop from a wide range of products</p>
        <?php
        if(isset($_SESSION['email'])) {
            echo "<div class='product-grid'>";
        } else {
            echo "<div class='product-grid' onclick='return login_required()'>";
        }
        ?>
            <a href="streetwear.php" class="product-card">
                <img src="images/streetstyle.webp" alt="streetwear">
                <div class="info">
                    <span class="name">StreetWear</span>
                </div>
            </a>
            <a href="contemporary.php" class="product-card">
                <img src="images/contemporary.jpg" alt="contemporary">
                <div class="info">
                    <span class="name">Contemporary</span>
                </div>
            </a>
            <a href="bharatnatyam.php" class="product-card">
                <img src="images/bharatnatyam.webp" alt="bharatnatyam">
                <div class="info">
                    <span class="name">Bharatnatyam</span>
                </div>
            </a>
            <a href="jazz.php" class="product-card">
                <img src="images/jazz.jpg" alt="Jazz">
                <div class="info">
                    <span class="name">Jazz</span>
                </div>
            </a>
        </div>
    </section>
    
    <!-- The Top Products Section -->
    <section id="top-products">
        <h2 class="section-title" id="TTP">The Top Products</h2>
        <p class="section-subtitle">Go through all time high products</p>
        <?php
        if(isset($_SESSION['email'])) {
            echo "<div class='product-grid'>";
        } else {
            echo "<div class='product-grid' onclick='return login_required()'>";
        }
        ?>
            <?php
            $num2 = 0;
            while ($row = $result->fetch_assoc()) {
                echo "<a href='product.php?id=".$row['Id']."' class='product-card'>";
                    echo "<img src='".$row['image']."' alt='".$row['Name']."'>";
                    echo "<div class='info'>";
                        echo "<span class='price'>$".$row['Price']."</span>";
                        echo "<span class='name'>".$row['Name']."</span>";
                    echo "</div>";
                echo "</a>";
                $num2++;
                if($num2 == 4) break;
            }
            ?>
        </div>
    </section>
    
    <!-- Recommended Products Section -->
    <section id="recommended-products">
        <h2 class="section-title" id="RP">Recommended Products</h2>
        <p class="section-subtitle">Products just for you!</p>
        <?php
        if(isset($_SESSION['email'])) {
            echo "<div class='product-grid'>";
        } else {
            echo "<div class='product-grid' onclick='return login_required()'>";
        }
        ?>
            <?php
            $num2 = 0;
            while ($row2 = $result->fetch_assoc()) {
                echo "<a href='product.php?id=".$row2['Id']."' class='product-card'>";
                    echo "<img src='".$row2['image']."' alt='".$row2['Name']."'>";
                    echo "<div class='info'>";
                        echo "<span class='price'>$".$row2['Price']."</span>";
                        echo "<span class='name'>".$row2['Name']."</span>";
                    echo "</div>";
                echo "</a>";
                $num2++;
                if($num2 == 8) break;
            }
            ?>
        </div>
    </section>
    
    <!-- Newly Added Products Section -->
    <section id="new-products">
        <h2 class="section-title" id="NAP">Newly Added Products</h2>
        <p class="section-subtitle">Catch all the latest trends!</p>
        <?php
        if(isset($_SESSION['email'])) {
            echo "<div class='product-grid'>";
        } else {
            echo "<div class='product-grid' onclick='return login_required()'>";
        }
        ?>
            <?php
            $num2 = 0;
            while ($row3 = $result->fetch_assoc()) {
                echo "<a href='product.php?id=".$row3['Id']."' class='product-card'>";
                    echo "<img src='".$row3['image']."' alt='".$row3['Name']."'>";
                    echo "<div class='info'>";
                        echo "<span class='price'>$".$row3['Price']."</span>";
                        echo "<span class='name'>".$row3['Name']."</span>";
                    echo "</div>";
                echo "</a>";
                $num2++;
                if($num2 == 12) break;
            }
            ?>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <a href="home.php">Home</a>
            <a href="about us.php">About Us</a>
            <a href="archives.php">Archives</a>
            <a href="#SBC">Categories</a>
            <a href="#TTP">Top Products</a>
            <a href="#RP">Recommended</a>
            <a href="#NAP">New Products</a>
        </div>
        <div class="socials">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-solid fa-phone"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <p>&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
    </footer>

    <!-- Swiper JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Initialization -->
    <script>
      var swiper = new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        /* Additional options:
           effect: 'fade',
           speed: 700,
           slidesPerView: 1,
        */
      });
    </script>
</body>
</html>
