-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 09:56 PM
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
-- Database: `motionmantradb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Anjali Vishwakarma', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'admin', 'anjali1208vishwakarma@gmail.com', 'Inquiry', 'IN', '2025-02-24 17:28:38'),
(2, 'dsa', 'abc@gmail.com', 'Inquiry', 'qwertyuiop', '2025-02-24 17:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_desc` text NOT NULL,
  `course_author` varchar(255) NOT NULL,
  `course_img` text NOT NULL,
  `course_duration` text NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_original_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES
(9, 'Open Style', 'Open style dance is a versatile and expressive dance style that blends elements from various dance genres, such as hip-hop, jazz, contemporary, ballet, and even street styles. It emphasizes individuality, creativity, and musicality rather than adhering to strict technical rules.', 'Anjali Vishwakarma', '../image/courseimg/openstyle.jpg', '3 Months', 700, 1600),
(10, 'Hip Hop ', 'Open Style Hip-Hop is a freestyle and choreography-based dance approach that blends various elements of hip-hop dance with influences from other styles like jazz, contemporary, popping, locking, and even commercial dance. Unlike traditional hip-hop styles that focus on specific techniques (e.g., breaking, popping, or krumping), open-style hip-hop allows dancers to explore movement more freely, emphasizing musicality, individuality, and creativity.', 'Anjali Vishwakarma', '../image/courseimg/hiphop.jpeg', '4 Months', 800, 1800),
(11, 'Contemporary', 'Open Style Contemporary is a fluid and expressive dance form that blends contemporary dance techniques with elements from various styles such as hip-hop, jazz, ballet, and even street dance. Unlike traditional contemporary dance, which often follows specific technical foundations (like those of Graham or Limon techniques), open style contemporary encourages individuality, musicality, and creative interpretation.', 'Anjali Vishwakarma', '../image/courseimg/contemporary.jpg', '6 Months', 900, 1900),
(12, 'Ballet', 'Ballet is a highly technical and graceful dance form that emphasizes precision, strength, and fluid movement. It features structured techniques, such as pointed feet, turnout, and controlled jumps, often performed with elegance and poise. Ballet can be classical, neoclassical, or contemporary, each with distinct styles and influences. Known for its storytelling and expressive quality, ballet is foundational for many other dance styles.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Anjali Vishwakarma', '../image/courseimg/ballet.jpg', '2 Months', 100, 1000),
(13, 'House', 'House dance is an energetic and fluid street dance style that originated in the clubs of Chicago and New York in the 1980s. It is characterized by fast footwork, smooth grooves, and intricate floorwork, emphasizing freedom, musicality, and improvisation. ', 'Anjali Vishwakarma', '../image/courseimg/house.jpg', '4 Month', 800, 1600),
(19, 'Breaking ', 'Breakdancing or breaking, also called b-boying (when performed by men) or b-girling (women), is a style of street dance originated by African Americans', 'Anjali Vishwakarma', '../image/courseimg/breaking.jpg', '3', 700, 1600);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `respmsg` text NOT NULL,
  `amount` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(58, 'ORDS34604936', 'ananya@gmail.com', 19, 'successful', 'Transaction Successful', 700, '2025-03-02'),
(59, 'ORDS4683008', 'ananya@gmail.com', 12, 'successful', 'Transaction Successful', 100, '2025-03-02'),
(60, 'ORDS69103100', 'muskan@gmail.com', 10, 'successful', 'Transaction Successful', 800, '2025-03-04'),
(61, 'ORDS78014674', 'muskan@gmail.com', 9, 'successful', 'Transaction Successful', 700, '2025-03-04'),
(62, 'ORDS61885415', 'anjali1208vishwakarma@gmail.com', 9, 'successful', 'Transaction Successful', 700, '2025-03-04'),
(63, 'ORDS69760775', 'anjali1208vishwakarma@gmail.com', 10, 'successful', 'Transaction Successful', 800, '2025-03-04'),
(64, 'ORDS42027645', 'amrit@gmail.com', 10, 'successful', 'Transaction Successful', 800, '2025-03-05'),
(65, 'ORDS48296283', 'sawanttanisha18@gmail.com', 9, 'successful', 'Transaction Successful', 700, '2025-03-05'),
(66, 'ORDS9273862', 'thesampadag@gmail.com', 9, 'successful', 'Transaction Successful', 700, '2025-03-06'),
(67, 'ORDS943923', 'anjali1208vishwakarma@gmail.com', 19, 'successful', 'Transaction Successful', 700, '2025-03-08'),
(68, 'ORDS81961981', 'komal@gmail.com', 9, 'successful', 'Transaction Successful', 700, '2025-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(15, 'MotionMantra is the best ', 173),
(16, 'MotionMantra provides valuable information about dance styles, classes, and schedules. Adding testimonials or success stories could help build trust and credibility.', 173),
(17, 'MotionMantra Dance Studio is a vibrant and energetic space that fosters a love for dance. The studio provides a welcoming atmosphere for dancers of all levels, from beginners to advanced performers.', 171),
(18, 'MotionMantra is a fantastic dance studio with expert training, a lively atmosphere, and a commitment to fostering talent. With a few additional offerings, it can further enhance its impact in the dance community. Keep up the amazing work!', 172),
(19, 'MotionMantra Dance Studio stands out as a dynamic and inspiring space for dancers of all skill levels. It seamlessly blends technical training with creativity, providing an environment that nurtures both beginners and advanced dancers. ', 174);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_desc` text NOT NULL,
  `lesson_link` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(51, 'Basic Shuffle Tutorial', 'Shuffle is a very important aspect of OpenStyle Choreography.', '../lessonvid/openstyle1.mp4', 9, 'Open Style'),
(52, 'How to do OpenStyle Dance (Hip Hop Dance Moves Tutorial) ', 'OpenStyle Dance has a blend of HipHop Moves and Hence here is your tutorial for hiphop openstyle moves', '../lessonvid/openstyle2.mp4', 9, 'Open Style'),
(53, 'HipHop Criss Cross Tutorial', 'Hip hop dance moves tutorial for how to do the criss cross. (Fortinite Dance Step)', '../lessonvid/hiphop1.mp4', 10, 'Hip Hop '),
(55, '6 min Beginner WarmUp ', 'Beginner Warmup for hiphop dance', '../lessonvid/hiphop2.mp4', 10, 'Hip Hop '),
(56, 'Full HipHop Choreography', 'Basic Hiphop Choreography for beginners', '../lessonvid/hiphop3.mp4', 10, 'Hip Hop '),
(57, 'Beginner Contemporary Dance | Routine Tutorial', 'Learn a fun beginner contemporary-lyrical dance, step-by-step!', '../lessonvid/contemporary1.mp4', 11, 'Contemporary'),
(58, 'Basic Dance Routine for Beginners', 'Basic Dance Routine for Beginners Contemporary Dance Style', '../lessonvid/contemporary2.mp4', 11, 'Contemporary'),
(59, 'Tere Bin | Dance Choreography Tutorial', 'Tere Bin Choreography in contemporary', '../lessonvid/contemporary3.mp4', 11, 'Contemporary');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_pass` varchar(255) NOT NULL,
  `stu_occ` varchar(255) NOT NULL,
  `stu_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(171, 'Krishna Yadav', 'krishna@gmail.com', '123456', 'Dancer', '../image/stu/student2.jpg'),
(172, 'Ananya Sharma', 'ananya@gmail.com', '123456', 'Student', '../image/stu/student4.jpg'),
(173, '    Amrit Sawant', 'amrit@gmail.com', '123456', '    Trainer', '../image/stu/student1.jpg'),
(174, 'Muskan Jaiswal', 'muskan@gmail.com', '123456', 'Learner', '../image/stu/student3.jpg'),
(185, ' Anjali', 'anjali1208vishwakarma@gmail.com', '123456', ' ', '../image/stu/student1.jpg'),
(186, 'Tanisha', 'sawanttanisha18@gmail.com', '123456', '', ''),
(187, 'Sampada', 'thesampadag@gmail.com', '123456', '', ''),
(188, ' Komal', 'komal@gmail.com', '123456', ' ', '../image/stu/student2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
