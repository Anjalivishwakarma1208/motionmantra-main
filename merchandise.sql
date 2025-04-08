-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 09:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merchandise`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Price` varchar(10) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `User_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id`, `Name`, `Category`, `Price`, `Image`, `User_email`) VALUES
(40, 'Yellow & Green Bharatanatyam Costume ', 'bharatnatyam', '6500', 'images/bharatnatyam6.webp', 'anjali1208vishwakarma@gmail.com'),
(41, 'Red Contemporary Frock', 'contemporary', '5200', 'images/contemporary2.jpg', 'anjali1208vishwakarma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `pstatus` varchar(25) NOT NULL,
  `ostatus` varchar(25) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `Image`, `Amount`, `pstatus`, `ostatus`, `user_email`) VALUES
(124, 'images/bharatnatyam3.webp', '6800', 'Successful', 'Placed', 'anjali1208vishwakarma@gmail.com'),
(142, 'images/jazz2.jpg', '5500', 'Successful', 'Placed', 'anjali1208vishwakarma@gmail.com'),
(143, 'images/streetwear4.webp', '6200', 'Successful', 'Placed', 'anjali1208vishwakarma@gmail.com'),
(144, 'images/contemporary2.jpg', '5200', 'Successful', 'Placed', 'anjali1208vishwakarma@gmail.com'),
(145, 'images/contemporary1.jpg', '4800', 'Successful', 'Placed', 'abcd@gmail.com'),
(146, 'images/bharatnatyam2.webp', '7200', 'Successful', 'Placed', 'abcd@gmail.com'),
(147, 'images/bharatnatyam6.webp', '6500', 'Successful', 'Placed', 'abcd@gmail.com'),
(148, 'images/contemporary3.jpg', '3800', 'Successful', 'Placed', 'abcd@gmail.com'),
(149, 'images/streetwear2.webp', '1999', 'Successful', 'Placed', 'abcd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `Product_code` varchar(1000) NOT NULL,
  `Refund_status` varchar(255) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`Id`, `Name`, `Category`, `Price`, `Image`, `Order_id`, `User_email`, `Product_code`, `Refund_status`) VALUES
(70, 'Midnight Glam Jazz Costume', 'jazz', '4800', 'images/jazz1.jpg', 113, 'anjali1208vishwakarma@gmail.com', '113_1', 'Under Process'),
(71, 'Urban Cool', 'streetwear', '5500', 'images/streetwear3.webp', 114, 'anjali1208vishwakarma@gmail.com', '114_1', '-'),
(94, 'Neon Vibes Jazz Costume ', 'jazz', '4200', 'images/jazz3.jpg', 141, 'anjali1208vishwakarma@gmail.com', '141_1', 'Under Process'),
(95, 'Broadway Star Jazz Costume', 'jazz', '5500', 'images/jazz2.jpg', 142, 'anjali1208vishwakarma@gmail.com', '142_1', 'Under Process'),
(96, 'Vintage Grunge', 'streetwear', '6200', 'images/streetwear4.webp', 143, 'anjali1208vishwakarma@gmail.com', '143_1', 'Under Process'),
(97, 'Red Contemporary Frock', 'contemporary', '5200', 'images/contemporary2.jpg', 144, 'anjali1208vishwakarma@gmail.com', '144_1', 'Under Process'),
(98, 'Blue Contemporary Frock', 'contemporary', '4800', 'images/contemporary1.jpg', 145, 'abcd@gmail.com', '145_1', 'Under Process'),
(99, 'Gold & Black Bharatanatyam Costume ', 'bharatnatyam', '7200', 'images/bharatnatyam2.webp', 146, 'abcd@gmail.com', '146_1', 'Under Process'),
(100, 'Yellow & Green Bharatanatyam Costume ', 'bharatnatyam', '6500', 'images/bharatnatyam6.webp', 147, 'abcd@gmail.com', '147_1', '-'),
(101, 'White Contemporary Pants for Men', 'contemporary', '3800', 'images/contemporary3.jpg', 148, 'abcd@gmail.com', '148_1', '-'),
(102, 'New trendy printed streetwear', 'streetwear', '1999', 'images/streetwear2.webp', 149, 'abcd@gmail.com', '149_1', '-');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category` varchar(25) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `image` varchar(75) NOT NULL,
  `Description_1` varchar(1200) DEFAULT NULL,
  `Description_2` varchar(1200) DEFAULT NULL,
  `Description_3` varchar(1200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Name`, `Category`, `Price`, `image`, `Description_1`, `Description_2`, `Description_3`) VALUES
(0, 'All-White Luxe ', 'streetwear', '2599', 'images/streetwear1.webp', 'Includes : \r\nWhite Boxy crop top\r\nWhite Techwear Joggers\r\nWhite Oversized Jacket\r\nHigh-Top Sneakers\r\nBlack Cap ', NULL, NULL),
(1, 'New trendy printed streetwear', 'streetwear', '1999', 'images/streetwear2.webp', 'Includes : \r\nOversized White Hoodie: Soft cotton fleece with a relaxed fit and dropped shoulders.\r\nBlue Cargo Pants: Multiple pockets, tapered fit, and adjustable drawstrings', NULL, NULL),
(2, 'Urban Cool', 'streetwear', '5500', 'images/streetwear3.webp', 'A relaxed oversized fit hoodie with bold graphic prints, paired with loose black cargo pants and classic white sneakers. The blue cap adds a sporty edge, making it a perfect everyday urban fit.', NULL, NULL),
(4, 'Vintage Grunge', 'streetwear', '6200', 'images/streetwear4.webp', 'A cropped graphic sweatshirt with earthy tones matched with brown baggy sweatpants. The white sneakers balance the look, making it a cozy yet edgy streetwear vibe.', NULL, NULL),
(5, ' Monochrome Chic Streetwear', 'streetwear', '7000', 'images/streetwear5.webp', ' A white oversized hoodie dress styled with knee-high white lace-up boots, creating a trendy, high-fashion streetwear aesthetic. Perfect for a bold and confident statement.', NULL, NULL),
(6, 'Utility Explorer wear', 'streetwear', '8800', 'images/streetwear6.jpg', 'A khaki utility-style co-ord set, featuring a relaxed-fit jacket and cargo pants. Paired with chunky sneakers, this outfit is inspired by military and workwear aesthetics with a modern streetwear twist.', NULL, NULL),
(7, 'Minimalist Oversized', 'streetwear', '6800', 'images/streetwear7.jpg', 'A monochrome oversized T-shirt and relaxed-fit joggers, keeping it simple yet fashionable. Styled with chunky black-and-white sneakers, this look is all about comfort and effortless cool.', NULL, NULL),
(8, 'Retro Varsity', 'streetwear', '7500', 'images/streetwear8.jpg', ' A bold red varsity jersey with oversized white shorts, red sneakers, and a white cap. This throwback sporty streetwear style gives off 90s hip-hop vibes with a modern edge.\r\n\r\n', NULL, NULL),
(9, 'Blue Contemporary Frock', 'contemporary', '4800', 'images/contemporary1.jpg', 'his elegant yet modern blue frock features a flowy silhouette with contemporary cuts. Designed with minimalist detailing and a chic finish, it offers a perfect blend of comfort and sophistication. Ideal for casual outings, brunch dates, or semi-formal events, this frock is a must-have for a stylish wardrobe. Pair it with white sneakers for a streetwear look or heels for a classy touch.', NULL, NULL),
(10, 'Red Contemporary Frock', 'contemporary', '5200', 'images/contemporary2.jpg', 'Make a bold statement with this stunning red contemporary frock. Crafted from premium breathable fabric, it features a modern silhouette with a flattering fit. The minimalist yet stylish design makes it perfect for casual outings, evening parties, or special occasions. Pair it with heels for an elegant touch or sneakers for a chic streetwear vibe.', NULL, NULL),
(11, 'White Contemporary Pants for Men', 'contemporary', '3800', 'images/contemporary3.jpg', 'Upgrade your wardrobe with these sleek white contemporary pants, designed for the modern man who values both style and comfort. Made from premium cotton blend fabric, these pants offer a relaxed yet tailored fit, making them perfect for both casual and semi-formal occasions. The minimalist design ensures versatility—pair them with a graphic tee for a streetwear vibe or a crisp shirt for a polished look.', NULL, NULL),
(12, 'Green & Blue Bharatanatyam Costume', 'bharatnatyam', '6500', 'images/bharatnatyam1.webp', 'A stunning green and blue silk Bharatanatyam outfit, designed with golden zari work and pleated detailing for graceful movements. Perfect for classical dance performances and cultural events.', NULL, NULL),
(13, 'Gold & Black Bharatanatyam Costume ', 'bharatnatyam', '7200', 'images/bharatnatyam2.webp', 'An elegant gold and black Bharatanatyam attire featuring a rich silk blend fabric with intricate gold patterns. Designed to enhance the dancer’s form while ensuring comfort during performances.', NULL, NULL),
(14, 'Orange & Maroon Bharatanatyam Costume ', 'bharatnatyam', '6800', 'images/bharatnatyam3.webp', 'A vibrant orange and maroon Bharatanatyam costume, crafted with traditional pleats and shimmering gold borders for a regal stage presence. Ideal for competitions and temple performances.', NULL, NULL),
(15, 'Red & Black Bharatanatyam Costume ', 'bharatnatyam', '7000', 'images/bharatnatyam4.webp', 'A striking red and black Bharatanatyam outfit, adorned with golden accents and a broad temple border design. The high-quality fabric ensures comfort and durability for extended performances.', NULL, NULL),
(16, 'Blue & Silver Bharatanatyam Costume ', 'bharatnatyam', '6900', 'images/bharatnatyam5.webp', 'A graceful blue and silver Bharatanatyam ensemble, designed with silver zari work and wide pleats that create a beautiful flow during dance movements. A perfect choice for traditional showcases.', NULL, NULL),
(17, 'Yellow & Green Bharatanatyam Costume ', 'bharatnatyam', '6500', 'images/bharatnatyam6.webp', 'A bright yellow and green Bharatanatyam costume, featuring traditional silk fabric with golden detailing. A lightweight and flexible design, allowing dancers to perform with ease and elegance.', NULL, NULL),
(18, 'Midnight Glam Jazz Costume', 'jazz', '4800', 'images/jazz1.jpg', 'A chic black and purple sequined jazz dress with a one-shoulder sheer sleeve, adding a touch of elegance and drama. Perfect for stage performances and dance competitions.', NULL, NULL),
(19, 'Broadway Star Jazz Costume', 'jazz', '5500', 'images/jazz2.jpg', ' A classic black-and-white jazz costume, featuring a vest-style bodice with sequin details, striped pants, and a matching hat for a true Broadway-inspired look. Ideal for theatrical jazz performances.', NULL, NULL),
(20, 'Neon Vibes Jazz Costume ', 'jazz', '4200', 'images/jazz3.jpg', 'A vibrant neon green and black jazz dress, featuring a halter neckline, shiny pleated skirt, and cross-belt detailing. A bold and energetic outfit for high-energy routines.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Phone_No` bigint(10) UNSIGNED NOT NULL,
  `Address_Line_1` varchar(50) DEFAULT NULL,
  `Address_Line_2` varchar(50) DEFAULT NULL,
  `Address_Line_3` varchar(50) DEFAULT NULL,
  `Pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`First_Name`, `Last_Name`, `Email`, `Password`, `Phone_No`, `Address_Line_1`, `Address_Line_2`, `Address_Line_3`, `Pincode`) VALUES
('krishna', 'Vishwakarma', 'abc@gmail.com', '852741', 7894651230, '801', 'Rainart', 'Thane', 400606),
('muskan', 'Anjali', 'abcd@gmail.com', '123456', 9876543, 'io', 'jh', 'uh', 400606),
('Anjali', 'Vishwakarma', 'anjali1208vishwakarma@gmail.com', '8655112997', 1234567890, '801', 'Rainart', 'Thane', 400606),
('govind', 'radha', 'gjc.anjali.vishwakarma@gnkhalsa.edu.in', '8655112997', 9876543210, '801', 'Rainart', 'Thane', 400606);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
