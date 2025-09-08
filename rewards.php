<?php
require_once("DBConnect.php");

// Get user ID from session or query string
$user_id = $_GET['user_id'] ?? 1;

// Fetch user's points from reward_point table
$sql = "SELECT Points FROM reward_point WHERE user_id = " . intval($user_id);
$result = $conn->query($sql);

$points = 0;

if ($result && $row = $result->fetch_assoc()) {
    $points = $row['Points'];
}

// Calculate dynamic rank/level based on points
if ($points >= 200) {
    $dynamicRank = "Platinum";
} elseif ($points >= 100) {
    $dynamicRank = "Gold";
} elseif ($points >= 50) {
    $dynamicRank = "Silver";
} else {
    $dynamicRank = "Bronze";
}

// Calculate ranking dynamically among all users
$sql_rank = "SELECT user_id, Points FROM reward_point ORDER BY Points DESC";
$res_rank = $conn->query($sql_rank);

$rank = "N/A";
if ($res_rank) {
    $rank_counter = 1;
    foreach ($res_rank as $r) {
        if ($r['user_id'] == $user_id) {
            $rank = $rank_counter;
            break;
        }
        $rank_counter++;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rewards Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('rewardbg.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .container {
            background: linear-gradient(to bottom, rgba(255, 228, 225, 0.6), rgba(255, 255, 255, 0.9));
            padding: 40px;
            margin: 60px auto;
            border-radius: 20px;
            width: 60%;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }
        h1 { color: #d6336c; margin-bottom: 25px; }
        h2 { color: #1a73e8; margin-bottom: 20px; }
        table {
            width: 70%;
            margin: 0 auto;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: rgba(26, 115, 232, 0.9);
            color: white;
            font-weight: 600;
        }
        tr:nth-child(even) { background-color: rgba(240, 240, 240, 0.7); }
        tr:nth-child(odd) { background-color: rgba(255, 255, 255, 0.6); }
    </style>
</head>
<body>
    <center>
        <div class="container">
            <h1>🏆 Rewards Dashboard</h1>
            <h2>User ID: <?php echo $user_id; ?></h2>
            <table>
                <tr>
                    <th>Total Points</th>
                    <th>Ranking</th>
                    <th>Rank</th>
                </tr>
                <tr>
                    <td><?php echo $points; ?></td>
                    <td><?php echo $rank; ?></td>
                    <td><?php echo $dynamicRank; ?></td>
                </tr>
            </table>
        </div>
    </center>
</body>
</html>
