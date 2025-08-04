<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            background-image: url('https://us.123rf.com/450wm/ohishi/ohishi1801/ohishi180100002/93767870-games-computer-online-in-internet-cafe.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .main-content h1 {
            color: white;
            margin-top: 0; /* Adjust top margin to move up */
        }

        .main-content h2 {
            margin-top: 10px; /* Adjust top margin to move up */
            color: #333; /* Change color for better visibility */
        }

        .header {
            width: 100%;
            background: transparent; /* Change to transparent */
            padding: 10px 0;
            color: white;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 1000;
            height: 60px;
            box-sizing: border-box;
        }

        .header .logout-btn {
            margin-right: 20px;
            padding: 10px 20px;
            background-color: #ff6666;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
            top: 0;
            margin-top: 0;
            padding-top: 60px; /* Push content down to make space for the header */
            box-sizing: border-box;
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

        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px; /* Adjust for sidebar width */
            margin-top: 60px; /* Adjust for fixed header */
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .no-users {
            text-align: center;
            font-size: 18px;
            padding: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="header">
        <button class="logout-btn" onclick="window.location.href='login.php';">Logout</button>
    </div>

    <div class="sidebar">
        <h2>CCMS ADMIN</h2>
        <ul>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add_computer.php">Add Computer</a></li>
            <li><a href="manage_computer.php">Manage Computer</a></li>
            <li><a href="user_details.php">Users</a></li>
            <li><a href="newusers.php">New Users</a></li>
            <li><a href="manage_oldusers.php"> Manage Old Users</a></li>
            <li><a href="all_users.php"> All Users</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="reports.php">Reports</a></li>
        </ul>
        <div class="footer">
            © 2024 CCMS. All rights reserved
        </div>
    </div>

    <div class="main-content">
        <h1>Manage New Users</h1>
        <h2>Users List</h2>
        <table>
            <thead>
                <tr>
                    <th>EntryID</th>
                    <th>User Name</th>
                    <th>In Time</th>
                    <th>Email</th>
                    <th>Computer Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root"; // Replace with your database username
                $password = ""; // Replace with your database password
                $dbname = "ccm"; // Replace with your database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Validate and escape user inputs
                    $newUsername = $conn->real_escape_string($_POST['username']);
                    $newEmail = $conn->real_escape_string($_POST['email']);
                    $computerName = $conn->real_escape_string($_POST['computer_name']);
                    $entryID = uniqid(); // Generate a unique EntryID
                    $inTime = date('Y-m-d H:i:s'); // Current date and time

                    // Insert user into the database
                    $stmt = $conn->prepare("INSERT INTO newusers (EntryID, username, intime, email, computer_name) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $entryID, $newUsername, $inTime, $newEmail, $computerName);

                    if ($stmt->execute()) {
                        echo "<script>alert('User added successfully!');</script>";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    // Close the prepared statement
                    $stmt->close();
                }

                // Fetch and display users
                $sql = "SELECT EntryID, username, intime, email, computer_name FROM newusers";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . htmlspecialchars($row['EntryID']) . "</td>
                                <td>" . htmlspecialchars($row['username']) . "</td>
                                <td>" . htmlspecialchars($row['intime']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['computer_name']) . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='no-users'>No users found</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='no-users'>Error fetching users: " . $conn->error . "</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
