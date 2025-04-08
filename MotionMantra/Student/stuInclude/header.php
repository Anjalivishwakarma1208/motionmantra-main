<?php 
include_once('../dbConnection.php');
if (!isset($_SESSION)) { 
    session_start(); 
} 
if (isset($_SESSION['is_login'])) {
    $stuLogEmail = $_SESSION['stuLogEmail'];
} 

if (isset($stuLogEmail)) {
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo TITLE ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/stustyle.css">
    <style>
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 15px;
            transition: 0.3s;
            font-weight: 500;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #1abc9c;
            color: white;
            border-radius: 5px;
        }
        .sidebar img {
            width: 100px;
            height: 100px;
            display: block;
            margin: 0 auto 15px;
            border-radius: 50%;
            border: 4px solid #ecf0f1;
        }
    </style>
</head>
<body>
    <!-- Sidebar and Content Layout -->
    <div class="container-fluid"">
        <div class="row d-flex">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar py-4">
                <div class="text-center">
                    <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail">
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'profile') {echo 'active';} ?>" href="studentProfile.php">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'mycourse') {echo 'active';} ?>" href="myCourse.php">
                            <i class="fas fa-book"></i> My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'feedback') {echo 'active';} ?>" href="stufeedback.php">
                            <i class="fas fa-comment-dots"></i> Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'studentChangePass') {echo 'active';} ?>" href="studentChangePass.php">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="../index.php">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                    </li>

                </ul>
            </nav>
            
            <!-- Start Main Content -->
            <div class="col-md-10 px-4 py-4">
