<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" type="image/png" href="logo.png">
    <script src="https://kit.fontawesome.com/03a0bde467.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 10px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .register-box {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .register-box h1 {
            color: crimson;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .input-field {
            width: 100%;
            padding: 5px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .input-field:focus {
            outline: none;
            border-color: crimson;
        }

        .register-btn {
            background: crimson;
            color: white;
            padding: 12px 20px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .register-btn:hover {
            background: darkred;
        }

        .link-btn {
            margin-top: 15px;
            display: block;
            color: crimson;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }

        .link-btn:hover {
            text-decoration: underline;
        }
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function validateForm() {
            let email = document.forms["regi"]["gmail"].value;
            let password = document.forms["regi"]["pass"].value;
            let confirmPass = document.forms["regi"]["confpass"].value;
            let phone = document.forms["regi"]["contact"].value;

            let phoneRegex = /^[6-9]\d{9}$/; // 10-digit number starting with 6-9
            let passwordMinLength = 6;

            if (!email.includes("@")) {
                alert("Please enter a valid email address.");
                return false;
            }
            if (password.length < passwordMinLength) {
                alert("Password must be at least 6 characters long.");
                return false;
            }
            if (password !== confirmPass) {
                alert("Passwords do not match.");
                return false;
            }
            if (!phoneRegex.test(phone)) {
                alert("Please enter a valid 10-digit phone number starting with 6-9.");
                return false;
            }

            return true;
        }

        document.forms["regi"].onsubmit = validateForm; // Attach the function to the form submit event
    });
</script>

</head>
<body>
    <div class="container">
        <div class="register-box">
            <h1>Register</h1>
            <form name="regi" method="post" action="add_account.php" onsubmit="return validateForm()">
                <input type="text" class="input-field" name="fname" placeholder="First Name" required>
                <input type="text" class="input-field" name="lname" placeholder="Last Name" required>
                <input type="email" class="input-field" name="gmail" placeholder="Email" required>
                <input type="password" class="input-field" name="pass" placeholder="Password" required>
                <input type="password" class="input-field" name="confpass" placeholder="Confirm Password" required>
                <input type="number" class="input-field" name="contact" placeholder="Phone Number" required>
                <input type="text" class="input-field" name="add1" placeholder="Address Line 1" required>
                <input type="text" class="input-field" name="add2" placeholder="Address Line 2" required>
                <input type="text" class="input-field" name="add3" placeholder="Address Line 3">
                <input type="number" class="input-field" name="pincode" placeholder="Pincode" required>
                <input type="submit" class="register-btn" value="Register">
            </form>
            <a href="login.php" class="link-btn">Already have an account? Log in</a>
        </div>
    </div>
</body>
</html>
