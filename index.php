<?php
// index.php - Sign In page for Travel Management System
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Management System</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Background video styling */
        .bg-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* Login Box */
        .login-container {
            background: rgba(0, 0, 0, 0.55);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.4);
            width: 320px;
            text-align: center;
            z-index: 1;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: white;
        }
        .login-container input {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background: #3498db;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-container button:hover {
            background: #2980b9;
        }
        .signup-link {
            margin-top: 15px;
            color: #fff;
        }
        .signup-link a {
            color: #f1c40f;
            text-decoration: none;
            font-weight: bold;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Admin button - now same style as login box (black transparent) */
        .admin-btn {
            position: absolute;
            top: 30px;   /* not in the exact corner */
            right: 40px; /* some breathing space */
            padding: 10px 20px;
            background: rgba(0, 0, 0, 0.55); /* same black transparent */
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0px 3px 6px rgba(0,0,0,0.3);
            transition: 0.3s;
        }
        .admin-btn:hover {
            background: rgba(0, 0, 0, 0.7);
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<!-- Background Video -->
<video autoplay muted loop class="bg-video">
    <source src="background.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<!-- Admin Button -->
<a href="admin.php">
    <button class="admin-btn">Admin</button>
</a>

<!-- Login Container -->
<div class="login-container">
    <h2>♨️Travel Login♨️</h2>
    <form action="SignIn.php" method="post">
        <input type="text" name="username" placeholder="Enter Username" required><br>
        <input type="password" name="password" placeholder="Enter Password" required><br>
        <button type="submit">Sign In</button>
    </form>
    
    <div class="signup-link">
        Don’t have an account? <a href="SignUp.php">Sign up here</a>
    </div>
</div>

</body>
</html>
