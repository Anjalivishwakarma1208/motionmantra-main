<?php
  include('./dbConnection.php');
  include('./mainInclude/header.php'); 
?>  

<!-- Course Banner -->
<div class="container-fluid banner-container">
  <div class="row">
    <img src="./image/coursebanner.webp" alt="Courses" class="banner-img">
  </div> 
</div>

<!-- All Courses Section -->
<div class="container mt-5">
  <h1 class="text-center section-title">Explore Our Courses</h1>
  <div class="row mt-4">
    <?php
      $sql = "SELECT * FROM course";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $course_id = $row['course_id'];
          echo ' 
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="course-card">
              <a href="coursedetails.php?course_id='.$course_id.'" class="course-link">
                <img src="'.str_replace('..', '.', $row['course_img']).'" class="course-img" alt="'.$row['course_name'].'" />
                <div class="course-content">
                  <h5>'.$row['course_name'].'</h5>
                  <p class="desc-text">'.substr($row['course_desc'], 0, 80).'...</p>
                </div>
                <div class="course-footer">
                  <p class="price-text">
                    <small><del>&#8377;'.$row['course_original_price'].'</del></small> 
                    <span class="price">&#8377;'.$row['course_price'].'</span>
                  </p>
                  <a class="btn btn-primary enroll-btn" href="coursedetails.php?course_id='.$course_id.'">Enroll Now</a>
                </div>
              </a>
            </div>
          </div>';
        }
      } else {
        echo "<div class='alert alert-warning text-center'>No courses available at the moment.</div>";
      }
    ?>
  </div>
</div>

<?php include('contact.php');?>
<?php include('./mainInclude/footer.php'); ?>

<!-- ✅ Styling -->
<style>
/* 🌟 General Styling */
/* body {
  font-family: 'Ubuntu', sans-serif;
  background-color: #f8f9fa;
} */

/* 🌟 Banner */
.banner-container {
  background: #000;
}
.banner-img {
  height: 500px;
  width: 100%;
  object-fit: cover;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

/* 🌟 Section Titles */
.section-title {
  font-size: 40px;
  font-weight: bold;
  color:rgb(4, 34, 66);
}

/* 🌟 Course Cards */
.course-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  overflow: hidden;
  text-align: center;
}
.course-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

/* 🌟 Course Image */
.course-img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

/* 🌟 Course Content */
.course-content {
  padding: 15px;
}
.course-content h5 {
  font-weight: bold;
  color:rgb(9, 13, 17);
}
.desc-text {
  font-size: 14px;
  color: #555;
}

/* 🌟 Course Footer */
.course-footer {
  background: #f8f9fa;
  padding: 15px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.price-text {
  font-size: 16px;
  font-weight: bold;
}
.price {
  font-size: 18px;
  color:rgb(21, 22, 22);
}
.enroll-btn {
  font-size: 14px;
  padding: 7px 12px;
  border-radius: 5px;
  transition: 0.3s;
}
.enroll-btn:hover {
  background-color:rgb(12, 20, 29);
}

.course-link {
  text-decoration: none !important;
  color: inherit;
  display: block;
}

.contact-section {
    display: block !important;
    visibility: visible !important;
}


/* 🌟 Responsive */
@media (max-width: 768px) {
  .course-card {
    margin-bottom: 20px;
  }
  .course-footer {
    flex-direction: column;
    align-items: center;
  }
  .enroll-btn {
    width: 100%;
    margin-top: 10px;
  }
}
</style>
