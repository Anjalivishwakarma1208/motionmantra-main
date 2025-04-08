<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Secure query using prepared statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password (Update this if using password_hash)
        if ($password == $user['Password']) { 
            $_SESSION['email'] = $user['Email']; // Store email in session
            $_SESSION['name'] = $user['First_Name'] . " " . $user['Last_Name'];
            header("Location: profile.php");
            exit();
        } else {
            echo "<p style='color: red;'>Invalid password!</p>";
        }
    } else {
        echo "<p style='color: red;'>User not found!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="logo.png">
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>
    <style>
        body { font-family: 'Roboto', sans-serif; background-color: #f2f2f2; margin: 0; padding: 0; }
         .input-field { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 8px; font-size: 16px; }
        .login-btn { background: crimson; color: white; padding: 12px 20px; width: 95%; border: none; border-radius: 8px; font-size: 18px; cursor: pointer; }
        .login-btn:hover { background: darkred; }
        .link-btn { display: block; margin-top: 15px; color: crimson; text-decoration: none; font-weight: bold; }
        .error { color: red; font-size: 14px; margin-top: 10px; }
        .continue-btn {
    background: #ddd;
    color: black;
    padding: 10px 15px;
    width: 95%;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 15px;
    transition: background 0.3s;
}

.continue-btn:hover {
    background: #bbb;
}
.login-container { display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { width: 400px; background: white; padding: 30px; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); }
        .login-box h2 { color: crimson; font-size: 28px; margin-bottom: 20px; font-weight: bold; }
       

    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST" action="">
                <input type="email" class="input-field" name="email" placeholder="Enter your email" required>
                <input type="password" class="input-field" name="password" placeholder="Enter your password" required>
                <button type="submit" class="login-btn">Login</button>
              
            </form>
            
            <button onclick="window.location.href='home.php';" class="continue-btn">Continue Without Login</button>

            <a href="registration.php" class="link-btn">Create Account</a>
        </div>
    </div>
</body>
</html>

