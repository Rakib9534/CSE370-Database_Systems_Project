<?php
// --- Database connection ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$message = "";

// --- Create Group ---
if (isset($_POST['create_group'])) {
    $group_size = $_POST['group_size'];
    $estimated_cost = $_POST['estimated_cost'];
    $user_id = $_POST['user_id'];

    $sql = "INSERT INTO `group` (Group_size, Estimated_cost, user_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $group_size, $estimated_cost, $user_id);

    if ($stmt->execute()) {
        $message = "✅ Group created successfully";
    } else {
        $message = "❌ Error: " . $stmt->error;
    }
}

// --- Join Group ---
if (isset($_POST['join_group'])) {
    $group_id = $_POST['group_id'];
    $user_id = $_POST['user_id'];

    // Escape values to prevent SQL issues (basic)
    $group_id = intval($group_id);
    $user_id = intval($user_id);

    // Check if user is already in the group
    $check_sql = "SELECT * FROM `group` WHERE group_id = $group_id AND user_id = $user_id";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $message = "⚠ You are already in this group!";
    } else {
        // Success message
        $message = "✅ Joined group successfully!";
        // Optionally, you can update the group to assign this user
        // $update_sql = "UPDATE `group` SET user_id = $user_id WHERE group_id = $group_id";
        // mysqli_query($conn, $update_sql);
    }
}

// --- Leave Group ---
if (isset($_POST['leave_group'])) {
    $group_id = $_POST['group_id'];
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM group_members WHERE group_id=? AND user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $group_id, $user_id);

    if ($stmt->execute()) {
        $message = "🚪 You left group $group_id successfully!";
    } else {
        $message = "❌ Error leaving group.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Group Management</title>
<style>
body, html {
    margin:0; padding:0; font-family:Arial,sans-serif; background:#111; color:white;
    height:100%; overflow-x:hidden;
}
.bg-video {
    position: fixed; top:0; left:0; min-width:100%; min-height:100%; object-fit:cover; z-index:-1;
}
h1 { text-align:center; margin-top:20px; }
.form-row {
    display:flex; gap:30px; justify-content:center; margin-top:40px; flex-wrap:wrap;
}
.box {
    background: rgba(0,0,0,0.2); /* transparent background */
    padding:25px;
    border-radius:10px;
    width:320px;
    text-align:center;
    box-shadow:0 4px 8px rgba(0,0,0,0.4);
    backdrop-filter: blur(5px); /* optional: blur effect for better visibility */
}
.box h2 { margin-bottom:15px; color:white; }
.box input { width:90%; padding:10px; margin:8px 0; border:1px solid #ccc; border-radius:5px; }
.box button { width:100%; padding:10px; background:#3498db; border:none; border-radius:5px; color:white; font-size:16px; cursor:pointer; margin-top:10px; }
.box button:hover { background:#2980b9; }

#showGroupsBtn {
    display:block;
    margin:50px auto; /* centers horizontally */
    padding:15px 30px;
    background:#27ae60;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-size:18px;
    font-weight:bold;
    box-shadow:0 3px 6px rgba(0,0,0,0.3);
    text-align:center;
    width:250px;
}
#showGroupsBtn:hover { background:#1e8449; }

.message { text-align:center; margin-top:20px; font-weight:bold; color:yellow; }
</style>
</head>
<body>

<video autoplay muted loop class="bg-video">
    <source src="background.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<h1>Group Management</h1>

<?php if(!empty($message)) echo "<div class='message'>$message</div>"; ?>

<div class="form-row">
    <form method="post" class="box">
        <h2>Create Group</h2>
        <input type="number" name="group_size" placeholder="Group Size" required><br>
        <input type="number" name="estimated_cost" placeholder="Estimated Cost" required><br>
        <input type="number" name="user_id" placeholder="Your User ID" required><br>
        <button type="submit" name="create_group">Create</button>
    </form>

    <form method="post" class="box">
        <h2>Join Group</h2>
        <input type="number" name="group_id" placeholder="Group ID" required><br>
        <input type="number" name="user_id" placeholder="Your User ID" required><br>
        <button type="submit" name="join_group">Join</button>
    </form>
</div>

<!-- Centered Show Groups Button -->
<a href="group.php" id="showGroupsBtn">Show All Groups</a>

</body>
</html>
