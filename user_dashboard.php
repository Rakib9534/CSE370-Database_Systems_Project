<?php
require_once("DBConnect.php");

// Fetch users
$sql = "SELECT user_id, name, email, address FROM user";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: rgba(0,0,0,0.6); /* Dark overlay */
            backdrop-filter: blur(8px);   /* 🔹 Blur background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .dashboard-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            width: 400px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .dashboard-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }

        .user-card {
            background: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .user-card h3 {
            margin: 0 0 8px;
            color: #333;
        }

        .user-card p {
            margin: 4px 0;
            color: #555;
        }

        /* 🔹 Back Button */
        .back-btn {
            display: inline-block;
            padding: 8px 16px;
            background: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            position: absolute;
            top: 15px;
            right: 15px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <a href="home.php" class="back-btn">← Back</a>
    <h2>User Dashboard</h2>
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='user-card'>
                    <h3>".$row['name']."</h3>
                    <p><strong>ID:</strong> ".$row['user_id']."</p>
                    <p><strong>Email:</strong> ".$row['email']."</p>
                    <p><strong>Address:</strong> ".$row['address']."</p>
                  </div>";
        }
    } else {
        echo "<p>No users found</p>";
    }
    ?>
</div>

</body>
</html>
