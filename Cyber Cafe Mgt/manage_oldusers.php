<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Old Users</title>
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
        h1, h2 {
            color: white;
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

        .footer {
            text-align: center;
            margin-top: auto;
            font-size: 14px;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
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
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #f44336; /* Red background */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            z-index: 10; /* Ensure it's above other content */
        }

        .logout-button:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }

        .main-content {
            position: relative; /* Ensure this is the positioning context for absolute elements */
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
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
            <li><a href="manage_oldusers.php">Manage Old Users</a></li>
            <li><a href="all_users.php">All Users</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="reports.php">Reports</a></li>
        </ul>
        <div class="footer">
            © 2024 CCMS. All rights reserved
        </div>
    </div>
    <div class="main-content">
        <button class="logout-button" onclick="window.location.href='login.php';">Logout</button>
        <h1>Manage Old Users</h1>
        <h2>Users List</h2>
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>EntryID</th>
                <th>Username</th>
                <th>Intime</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root"; // Replace with your database username
            $password = ""; // Replace with your database password
            $dbname = "ccm";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: Please try again later.");
            }

            // Fetch users
            $sql = "SELECT ID, EntryID, username, intime FROM users LIMIT 4";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row_count = 0;
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $row_count++;
                    $link = "userdetail" . $row_count . ".php";
                    echo "<tr>
                            <td>" . htmlspecialchars($row['ID']) . "</td>
                            <td>" . htmlspecialchars($row['EntryID']) . "</td>
                            <td>" . htmlspecialchars($row['username']) . "</td>
                            <td>" . htmlspecialchars($row['intime']) . "</td>
                            <td><a href='{$link}'><button>View</button></a></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='no-users'>No users found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
        </table>
    </div>
</body>
</html>
