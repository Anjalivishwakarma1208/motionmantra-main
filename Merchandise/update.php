<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="icon" type="image/png" href="Goldi Logo 2.png">
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
            padding: 25px;
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
        
        .update-box {
            width: 400px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .update-box h1 {
            color: crimson;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }


        .update-btn {
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

        .update-btn:hover {
            background: darkred;
        }

        .back-btn {
            margin-top: 15px;
            display: block;
            color: crimson;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }

        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="update-box">
            <h1>Update Profile</h1>
            <form name="regi" method="post" action="update_profile.php">
                <input type="text" class="input-field" name="fname" placeholder="New First Name" required>
                <input type="text" class="input-field" name="lname" placeholder="New Last Name" required>
                <input type="email" class="input-field" name="gmail" placeholder="New Email" required>
                <input type="number" class="input-field" name="contact" placeholder="New Phone Number" required>
                <input type="text" class="input-field" name="add1" placeholder="New Address Line 1" required>
                <input type="text" class="input-field" name="add2" placeholder="New Address Line 2" required>
                <input type="text" class="input-field" name="add3" placeholder="New Address Line 3">
                <input type="number" class="input-field" name="pincode" placeholder="New Pincode" required>
                <input type="submit" class="update-btn" value="Save">
            </form>
            <a href="home.php" class="back-btn">Back to Home</a>
        </div>
    </div>
</body>
</html>
