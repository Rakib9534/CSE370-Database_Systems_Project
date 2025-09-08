<?php
require_once("DBConnect.php"); 

// Handle search input
$search = "";
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM trip 
            WHERE Vname LIKE '%$search%' 
               OR `From` LIKE '%$search%' 
               OR `To` LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM trip";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trip Booking</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('tripbg.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .container {
            background: linear-gradient(to bottom, rgba(255,255,255,0.5), rgba(255,255,255,0.9));
            padding: 30px;
            margin: 20px;
            border-radius: 15px;
            width: 90%;
            box-shadow: 0px 0px 15px gray;
        }

        h1 { color: darkblue; margin-bottom: 15px; }
        input[type="text"] { padding: 8px; width: 250px; }
        input[type="submit"] { padding: 8px 15px; background: darkblue; color: white; border: none; border-radius: 5px; cursor: pointer; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255,255,255,0.8);
            margin-top: 15px;
        }

        table, th, td { border: 1px solid #ccc; }
        th {
            background-color: rgba(217, 230, 242, 0.9);
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }
        td { text-align: center; padding: 10px; }
        select { padding: 5px; }
        input.book-btn { background: green; color: white; padding: 6px 12px; border-radius: 5px; cursor: pointer; }
        input.book-btn:hover { opacity: 0.85; }
    </style>
</head>
<body>
    <center>
        <div class="container">
            <h1>🚌 Trip Booking</h1>

            <!-- Search form -->
            <form method="post" style="margin-bottom:20px;">
                <input type="text" name="search" placeholder="Search by vehicle or destination" value="<?php echo htmlspecialchars($search); ?>">
                <input type="submit" value="Search">
            </form>

            <!-- Trips/vehicles table -->
            <table>
                <tr>
                    <th>Vehicle Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Vehicle Type</th>
                    <th>Price (৳)</th>
                    <th>Book</th>
                </tr>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['Vname']}</td>
                                <td>{$row['From']}</td>
                                <td>{$row['To']}</td>
                                <td>{$row['Vtype']}</td>
                                <td>{$row['Price']}</td>
                                <td>
                                    <form method='post' action='book_trip.php?booking_id={$row['booking_id']}'>
                                        <input type='submit' class='book-btn' value='Book'>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No trips found</td></tr>";
                }
                ?>
            </table>
        </div>
    </center>
</body>
</html>
