<?php
require_once("DBConnect.php");

// Correct SQL query
$sql = "SELECT user_id, group_id, Group_size, Estimated_cost FROM `group`";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All Groups</title>
<style>
body, html {
    margin:0;
    padding:0;
    font-family:Arial,sans-serif;
    min-height:100vh;
    background:transparent;
    color:white;
}
.bg-video {
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:-1;
}

h1 {
    text-align:center;
    margin-top:20px;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.7);
}

.table-container {
    width: 90%;
    margin: 40px auto;
    overflow-x: auto;
    background: rgba(0,0,0,0.25);
    backdrop-filter: blur(5px);
    border-radius: 10px;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
    color: white;
}

th, td {
    padding: 12px;
    border: 1px solid rgba(255,255,255,0.3);
}

th {
    background: rgba(52,152,219,0.7);
}

tr:nth-child(even) {
    background: rgba(255,255,255,0.05);
}

.back-btn {
    display:block;
    margin:30px auto;
    padding:12px 25px;
    background:#3498db;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
    text-align:center;
    width:200px;
    transition: background 0.3s ease;
}
.back-btn:hover { background:#2980b9; }
</style>
</head>
<body>

<video autoplay muted loop class="bg-video">
    <source src="background.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<h1>All Groups</h1>

<div class="table-container">
<?php
if ($result && mysqli_num_rows($result) > 0) {
    echo "<table>
            <tr>
                <th>Group ID</th>
                <th>Size</th>
                <th>Estimated Cost</th>
                <th>User ID</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['group_id']."</td>
                <td>".$row['Group_size']."</td>
                <td>".$row['Estimated_cost']."</td>
                <td>".$row['user_id']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center; color:yellow;'>No groups found!</p>";
}
?>
</div>

<a href="create_group.php" class="back-btn">Back to Group Management</a>

</body>
</html>
