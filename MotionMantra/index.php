<?php
  include('./dbConnection.php');
  include('./mainInclude/header.php'); 
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotionMantra</title>

    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="css/homestyle.css">
</head>

<body>

    <!-- Video Background -->
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="video/banvid.mp4" />
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1>Welcome to MotionMantra</h1>
        <?php    
            if(!isset($_SESSION['is_login'])){
                echo '<a class="btn" href="#" data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
            } else {
                echo '<a class="btn" href="student/studentProfile.php">My Profile</a>';
            }
        ?> 
    </div>

    <!-- Courses Section -->
    <div class="courses-section">
        <h1>Learn A Variety of Dance Styles</h1>
        <div class="courses-grid">
            <?php
            $sql = "SELECT * FROM course LIMIT 8";
            $result = $conn->query($sql);
            if($result->num_rows > 0){ 
                while($row = $result->fetch_assoc()){
                    echo '
                    <a href="coursedetails.php?course_id='.$row['course_id'].'" class="course-card">
                        <img src="'.str_replace('..', '.', $row['course_img']).'" alt="'.$row['course_name'].'">
                        <div class="course-title">'.$row['course_name'].'</div>
                    </a>';
                }
            }
            ?>
        </div>
    </div>

    <!-- Start Studio Section -->
    <div class="studio-section">
        <div class="studio-text">
            <h1>The Studio That Moves With You</h1>
            <p>Take MotionMantra classes anytime, anywhere—on your phone, tablet, laptop, or TV. Learn from world-class instructors at your convenience.</p>
            <a class="studio-btn" href="courses.php">Start Dancing Now</a>
        </div>
        <div class="studio-image">
            <img src="image/studio.png" alt="Dance Studio">
        </div>
    </div>
    <!-- End Studio Section -->

    <!-- Merchandise Section -->
<div class="merchandise-section">
    <div class="merch-text">
        <h1>Get Your Dance Gear</h1>
        <p>Shop exclusive MotionMantra merchandise and show off your dance spirit in style.</p>
        <a class="merch-btn" href="http://localhost/merchandise/">Shop Now</a>
    </div>
    <div class="merch-image">
        <img src="image/merch.jpg" alt="Dance Merchandise">
    </div>
</div>

<section class="onground-section">
    <div class="onground-content">
        <h1>DANCE ONGROUND</h1>
        <p>📍 801, Rainart Tower, Thane, India</p>
        <p class="texton">Experience the magic of dance in its purest form. No screens, no limits—just you, the music, and the floor. Step in, feel the energy, and dance like never before!</p>
        <a href="contact.php">Contact Us</a>
    </div>
    <div class="onground-image">
        <img src="image/onground.jpg" alt="Dance Studio">
    </div>
</section>

<!-- Start Students Testimonial -->
<div class="container-fluid mt-5" style="background-color: #4B7289" id="Feedback">
        <h1 class="text-center testyheading p-4"> Student's Feedback </h1>
        <div class="row">
          <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
            <?php 
              $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                  $s_img = $row['stu_img'];
                  $n_img = str_replace('../','',$s_img)
            ?>
              <div class="testimonial">
                <p class="description">
                <?php echo $row['f_content'];?>  
                </p>
                <div class="pic">
                  <img src="<?php echo $n_img; ?>" alt=""/>
                </div>
                <div class="testimonial-prof">
                  <h4><?php echo $row['stu_name']; ?></h4>
                  <small><?php echo $row['stu_occ']; ?></small>
                </div>
              </div>
              <?php }} ?>
            </div>
          </div>
        </div>
    </div>  <!-- End Students Testimonial -->
    
    
    
    <?php include('./mainInclude/footer.php'); ?>
</body>
</html>
