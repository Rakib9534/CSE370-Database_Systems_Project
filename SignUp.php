
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Management System - Sign Up</title>
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
        .login-container input, .login-container textarea {
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
        .admin-btn {
            position: absolute;
            top: 30px;
            right: 40px;
            padding: 10px 20px;
            background: rgba(0, 0, 0, 0.55);
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

<!-- Background video -->
<video autoplay muted loop class="bg-video">
    <source src="background.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<div class="login-container">
    <h2>Create Account</h2>
    <form method="POST">
        <input type="text" name="user_id" placeholder="User ID" required>
        <input type="text" name="user_name" placeholder="Name" required>
        <input type="email" name="user_email" placeholder="Email" required>
        <input type="text" name="user_phone" placeholder="Phone" required>
        <input type="password" name="user_password" placeholder="Password" required>
        <textarea name="user_address" placeholder="Address" required></textarea>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
<?php
require_once("DBConnect.php");

if (
    isset($_POST['user_id']) &&
    isset($_POST['user_name']) &&
    isset($_POST['user_email']) &&
    isset($_POST['user_phone']) &&
    isset($_POST['user_password']) &&
    isset($_POST['user_address'])
) {
    $user_id       = $_POST['user_id'];
    $user_name     = $_POST['user_name'];
    $user_email    = $_POST['user_email'];
    $user_phone    = $_POST['user_phone'];
    $user_password = $_POST['user_password'];
    $user_address  = $_POST['user_address'];

   $sql = "INSERT INTO user (User_ID, Name, Email, Phone, Password, Address) 
        VALUES ('$user_id', '$user_name', '$user_email', '$user_phone', '$user_password', '$user_address')";


    $result = mysqli_query($conn, $sql);

	if ($result) {
		header("Location: index.php"); // Redirect
} 	else {
		echo "Insert failed: " . mysqli_error($conn);
}
}
?>