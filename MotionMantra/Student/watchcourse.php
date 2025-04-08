<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Fetch Course Details
    $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
    $result = $conn->query($sql);
    $course = $result->fetch_assoc();

    // Fetch Lessons
    $sqlLessons = "SELECT * FROM lesson WHERE course_id = '$course_id' ORDER BY lesson_id ASC";
    $resultLessons = $conn->query($sqlLessons);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Course - <?php echo $course['course_name']; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="../css/stustyle.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Ubuntu', sans-serif;
            background-color: #121212;
            color: white;
            overflow: hidden;
        }
        .container-fluid {
            height: 100vh;
            display: flex;
            padding:0;
        }
        .sidebar {
            width: 22%;
            background:rgb(233, 233, 233);
            padding: 20px;
            overflow-y: auto;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 15px;
            color:rgb(9, 10, 11);
        }
        .lesson-list {
            list-style: none;
            padding: 0;
        }
        .lesson-list li {
            padding: 12px;
            background:rgb(48, 48, 50);
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            color: #ddd;
            transition: background 0.3s;
        }
        .lesson-list li:hover {
            background: #007bff;
            color: white;
        }
        .jump-section {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #444;
        }
        .jump-section ul {
            list-style: none;
            padding: 0;
        }
        .jump-section ul li {
            padding: 10px;
            background:rgb(48, 48, 50);
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            color: #ddd;
            transition: background 0.3s;
        }
        .jump-section ul li:hover {
            background: #28a745;
            color: white;
        }
        .video-container {
            width: 78%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: black;
        }
        video {
            width: 100%;
            height: 100vh;
            object-fit: cover;
            background: black;
        }
        .my-courses {
            text-align: center;
            margin-bottom: 15px;
        }
        .my-courses a {
            text-decoration: none;
            color: white;
            background: #ff4d4d;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }
        .my-courses a:hover {
            background: #e63946;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="my-courses">
            <a href="./myCourse.php">⬅ My Courses</a>
        </div>
        
        <h4>Lessons</h4>
        <ul class="lesson-list">
            <?php while ($lesson = $resultLessons->fetch_assoc()) { ?>
                <li class="lesson-item" data-url="<?php echo $lesson['lesson_link']; ?>">
                    <?php echo $lesson['lesson_name']; ?>
                </li>
            <?php } ?>
        </ul>

        <!-- Jump to Section -->
        <div class="jump-section">
            <h4>Jump to</h4>
            <ul>
                <li onclick="jumpTo(15)">🔹 Intro (0:15)</li>
                <li onclick="jumpTo(60)">📖 Main (1:00)</li>
                <li onclick="jumpTo(300)">🔚 Summary (5:00)</li>
            </ul>
        </div>
    </div>

    <!-- Video Player -->
    <div class="video-container">
        <video id="custom-video" src="" controls></video>
    </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let video = document.getElementById("custom-video");
        let lessonItems = document.querySelectorAll(".lesson-item");

        lessonItems.forEach(item => {
            item.addEventListener("click", function() {
                let videoUrl = this.getAttribute("data-url");
                video.src = videoUrl;
                video.play();
            });
        });
    });

    function jumpTo(time) {
        document.getElementById("custom-video").currentTime = time;
    }
</script>
</body>
</html>
