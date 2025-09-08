<?php
require_once("DBConnect.php"); // connects to DB

$search = $_POST['search'] ?? "";

$sql = "SELECT * FROM accomodation";
if ($search != "") {
    $sql .= " WHERE Location LIKE '%" . $conn->real_escape_string($search) . "%'";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accommodation Booking</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Background video styling */
        #bg-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            object-fit: cover;
        }

        /* Content container */
        .container {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            margin: 20px;
            border-radius: 15px;
            width: 85%;
            box-shadow: 0px 0px 15px gray;
        }

        h1 {
            color: darkblue;
            margin-bottom: 10px;
        }

        h2 {
            color: darkred;
            margin-bottom: 15px;
        }

        input[type="text"] {
            padding: 8px;
            width: 250px;
        }

        input[type="submit"] {
            padding: 8px 15px;
            background: darkblue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th {
            background-color: #d9e6f2;
            font-weight: bold;
            text-align: center;
        }

        td {
            text-align: center;
            padding: 10px;
        }

        a.book-btn {
            background: green;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
        }

        a.book-btn:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>

    <!-- Background video -->
    <video id="bg-video" autoplay muted loop playsinline>
        <source src="Video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <center>
        <div class="container">
            <h1>🏨 Accommodation Booking</h1>

            <!-- Search form -->
            <form method="post" style="margin-bottom:20px;">
                <input type="text" name="search" placeholder="🔍 Search by location" value="<?php echo htmlspecialchars($search); ?>">
                <input type="submit" value="Search">
            </form>

            <!-- Accommodation table -->
            <table>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Cost per Night (৳)</th>
                    <th>Ratings</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Name']}</td>
                                <td>{$row['Location']}</td>
                                <td>{$row['Type']}</td>
                                <td><b>{$row['Cost_per_night']}</b></td>
                                <td>{$row['Ratings']} ⭐</td>
                                <td><a class='book-btn' href='accomodation.php?hotel_id={$row['Accomodation_id']}'>Book</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No accommodations found</td></tr>";
                }
                ?>
            </table>
        </div>
    </center>
</body>
</html>

