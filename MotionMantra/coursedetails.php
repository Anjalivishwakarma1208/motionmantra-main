<?php 
include('./dbConnection.php');
include('./mainInclude/header.php');

if (!isset($_GET['course_id'])) {
    die("<div class='alert alert-danger text-center'>Error: Course ID is missing.</div>");
}

$course_id = intval($_GET['course_id']); // Ensuring integer value for security
$_SESSION['course_id'] = $course_id;

// Fetch course details
$sql = "SELECT * FROM course WHERE course_id = '$course_id'";
$result = $conn->query($sql);

if (!$result) {
    die("<div class='alert alert-danger text-center'>SQL Error: " . $conn->error . "</div>");
}

?>
<!-- Course Banner -->
<div class="container-fluid banner-container">
    <div class="row">
        <img src="./image/coursebanner.webp" alt="Course Banner" class="banner-img">
    </div> 
</div>

<!-- Course Details -->
<div class="container mt-5">
    <?php
    if ($result->num_rows > 0) { 
        while ($row = $result->fetch_assoc()) {
            echo ' 
            <div class="row">
                <div class="col-md-4">
                    <img src="'.htmlspecialchars(str_replace('..', '.', $row['course_img'])).'" class="course-img">
                </div>
                <div class="col-md-8">
                    <div class="course-card">
                        <h2>'.htmlspecialchars($row['course_name']).'</h2>
                        <p class="desc-text"><strong>Description:</strong> '.htmlspecialchars($row['course_desc']).'</p>
                        <p class="duration-text"><strong>Duration:</strong> '.htmlspecialchars($row['course_duration']).'</p>
                        <form action="checkout.php" method="post">
                            <p class="price-text">
                                Price: <small><del>&#8377; '.htmlspecialchars($row['course_original_price']).'</del></small> 
                                <span class="price">&#8377; '.htmlspecialchars($row['course_price']).'</span>
                            </p>
                            <input type="hidden" name="course_id" value="'. htmlspecialchars($row["course_id"]) .'"> 
                            <input type="hidden" name="amount" value="'. htmlspecialchars($row["course_price"]) .'"> 
                            <button type="submit" class="btn btn-primary buy-btn" name="buy">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Error: Course not found.</div>";
    }
    ?>   
</div>

<!-- Course Lessons -->
<div class="container mt-5">
    <h3 class="text-center mb-3">Course Lessons</h3>
    <div class="row">
        <?php 
        $lesson_sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
        $lesson_result = $conn->query($lesson_sql);

        if ($lesson_result->num_rows > 0) {
            echo '
            <table class="table table-bordered lesson-table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Lesson No.</th>
                        <th scope="col">Lesson Name</th>
                    </tr>
                </thead>
                <tbody>';
            
            $num = 0;
            while ($row = $lesson_result->fetch_assoc()) {
                $num++;
                echo '<tr>
                    <th scope="row">'.$num.'</th>
                    <td>'.htmlspecialchars($row["lesson_name"]).'</td>
                </tr>';
            }

            echo '</tbody>
            </table>';
        } else {
            echo "<div class='alert alert-warning text-center'>No lessons available for this course.</div>";
        }
        ?>         
    </div>
</div>

<?php include('./mainInclude/footer.php'); ?>

<style>
/* 🌟 General Styling */
.container { max-width: 1100px; }

/* 🌟 Banner */
.banner-container { margin-top: 70px; }
.banner-img { height: 500px; width: 100%; object-fit: cover; display: block; }

/* 🌟 Course Section */
.course-img {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.course-card {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: 0.3s ease-in-out;
}
h2 { color: #007bff; font-weight: bold; }
.desc-text, .duration-text { font-size: 16px; margin-bottom: 10px; }
.price-text { font-size: 18px; font-weight: bold; margin-top: 10px; }
.price { font-size: 22px; color: #28a745; }
.buy-btn {
    background: #007bff;
    color: white;
    font-size: 18px;
    padding: 12px;
    border-radius: 5px;
    transition: background 0.3s ease-in-out;
}
.buy-btn:hover { background: #0056b3; }

/* 🌟 Lesson Table */
.lesson-table th, .lesson-table td { padding: 10px; text-align: center; }
.lesson-table tbody tr:hover { background: #f1f1f1; }
</style>
