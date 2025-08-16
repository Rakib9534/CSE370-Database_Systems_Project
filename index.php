<?php
// index.php - Sign In page for Travel Management System
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🎀Travel Management System🎀</title>
    <style>
        body {
		font-family: Arial, sans-serif;
		background: url("op.jpg") no-repeat center center fixed;
		background-size: cover;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		margin: 0;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
            width: 320px;
            text-align: center;
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
    </style>
</head>
<body>

<div class="login-container">
    <h2>♨️Travel Login♨️</h2>
    <form action="SignIn.php" method="post">
        <input type="text" name="username" placeholder="Enter Username" required><br>
        <input type="password" name="password" placeholder="Enter Password" required><br>
        <button type="submit">Sign In</button>
    </form>
</div>

</body>
</html>
