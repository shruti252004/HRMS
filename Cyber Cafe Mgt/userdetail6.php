<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://us.123rf.com/450wm/ohishi/ohishi1801/ohishi180100002/93767870-games-computer-online-in-internet-cafe.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #fff;
            padding: 20px;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar .footer {
            text-align: center;
            font-size: 14px;
            padding: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .content {
            margin-left: 270px;
            padding: 20px;
            width: calc(100% - 270px);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .glass {
            background: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 20px;
            color: #000;
            width: 80%;
            max-width: 800px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>CCMS ADMIN</h2>
        <ul> <li><a href="admin.php">Admin</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add_computer.php">Add Computer</a></li>
            <li><a href="manage_computer.php">Manage Computer</a></li>
            <li><a href="user_details.php">Users</a></li>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="manage_oldusers.php">Manage Old Users</a></li>
            <li><a href="all_users.php">All Users</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="reports.php">Reports</a></li>
        </ul>
        <div class="footer">
            © 2024 CCMS. All rights reserved 
        </div>
    </div>
    <div class="content">
        <div class="glass">
            <h1>User Details</h1>
            <?php
            // Database connection details
            $servername = "localhost"; // Change this to your server name
            $username = "root"; // Change this to your database username
            $password = ""; // Change this to your database password
            $dbname = "ccm"; // Change this to your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // The username of the user you want to fetch
            $specific_username = 'Vilas Mali'; // Change this to the actual username

            // Prepare and bind
            $stmt = $conn->prepare("SELECT ID, EntryID, username, useraddr, mobile_number, email, computer_name, IDproof, intime, out_time, fees, remark, status, updation_date FROM users WHERE username = ?");
            $stmt->bind_param("s", $specific_username);

            // Execute the statement
            $stmt->execute();

            // Bind result variables
            $stmt->bind_result($ID, $EntryID, $username, $useraddr, $mobile_number, $email, $computer_name, $IDproof, $intime, $out_time, $fees, $remark, $status, $updation_date);

            // Fetch the details
            if ($stmt->fetch()) {
                echo "<table>";
                echo "<tr><th>ID</th><td>$ID</td></tr>";
                echo "<tr><th>EntryID</th><td>$EntryID</td></tr>";
                echo "<tr><th>Username</th><td>$username</td></tr>";
                echo "<tr><th>Address</th><td>$useraddr</td></tr>";
                echo "<tr><th>Mobile Number</th><td>$mobile_number</td></tr>";
                echo "<tr><th>Email</th><td>$email</td></tr>";
                echo "<tr><th>Computer Name</th><td>$computer_name</td></tr>";
                echo "<tr><th>ID Proof</th><td>$IDproof</td></tr>";
                echo "<tr><th>In Time</th><td>$intime</td></tr>";
                echo "<tr><th>Out Time</th><td>$out_time</td></tr>";
                echo "<tr><th>Fees</th><td>$fees</td></tr>";
                echo "<tr><th>Remark</th><td>$remark</td></tr>";
                echo "<tr><th>Status</th><td>$status</td></tr>";
                echo "<tr><th>Updation Date</th><td>$updation_date</td></tr>";
                echo "</table>";
            } else {
                echo "No user found with the username: " . $specific_username;
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
