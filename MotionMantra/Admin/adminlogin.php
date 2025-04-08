<?php
session_start();
include('../dbConnection.php');

if (isset($_POST['adminLogin'])) {
    $admin_email = $_POST['adminLogEmail'];
    $admin_pass = $_POST['adminLogPass'];

    $sql = "SELECT * FROM admin WHERE admin_email = ? AND admin_pass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $admin_email, $admin_pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['is_admin_login'] = true;
        $_SESSION['adminLogEmail'] = $admin_email;
        header("Location: adminDashboard.php");
        exit();
    } else {
        $error = "Invalid Admin Credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Login</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="POST">
                    <div class="mb-3">
                        <label for="adminLogEmail" class="form-label">Admin Email</label>
                        <input type="email" class="form-control" name="adminLogEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="adminLogPass" class="form-label">Password</label>
                        <input type="password" class="form-control" name="adminLogPass" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="adminLogin">Login</button>
                </form>
                <?php if (isset($error)) { echo "<p class='text-danger mt-2'>$error</p>"; } ?>
            </div>
        </div>
    </div>
</body>
</html>
