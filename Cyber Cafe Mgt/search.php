<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        body {
            background-image: url('https://us.123rf.com/450wm/ohishi/ohishi1801/ohishi180100002/93767870-games-computer-online-in-internet-cafe.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            position: relative; /* Add relative positioning to the body */
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

        .sidebar .footer {
            text-align: center;
            font-size: 14px;
            padding: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .search-box {
            width: 1700px;
            padding: 20px;
            font-size: 16px;
            backdrop-filter: blur(10px) saturate(180%);
            -webkit-backdrop-filter: blur(10px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form input[type="text"] {
            padding: 30px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 20px 20px;
            border: none;
            cursor: pointer;
        }

        .user-list {
            margin-top: 10px;
        }

        .user-list ul {
            list-style-type: none;
            padding: 0;
        }

        .user-list ul li {
            margin: 10px 0;
        }

        /* Logout button styles */
        .logout-button {
            position: absolute; /* Position it at the top right */
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #c62828;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>CCMS ADMIN</h2>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">Computer</a></li>
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
            &copy; 2024 CCMS. All rights reserved.
        </div>
    </div>

    <button class="logout-button" onclick="location.href='login.php';">Logout</button>

    <div class="container">
        <div class="search-box">
            <h2>Search Users</h2>
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Search by Username or Entry ID">
                <input type="submit" value="Search">
            </form>

            <div class="user-list">
                <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "root"; // Replace with your database username
                $password = ""; // Replace with your database password
                $dbname = "ccm";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if the 'search' parameter is set in the URL
                if (isset($_GET['search'])) {
                    $searchTerm = $conn->real_escape_string($_GET['search']); // Sanitize the input to prevent SQL Injection

                    // Query to search by username or Entry ID
                    $sql = "SELECT * FROM users WHERE username LIKE '%$searchTerm%' OR EntryID LIKE '%$searchTerm%'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<h2>Search Results</h2>";
                        echo "<ul>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<li>Username: " . $row["username"] . " - Entry ID: " . $row["EntryID"] . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>No users found matching your search.</p>";
                    }
                } else {
                    echo "<p>Please enter a search term.</p>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
