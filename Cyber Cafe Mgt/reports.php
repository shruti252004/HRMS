<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCMS Admin Dashboard</title>
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

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            color: white; /* Changed color for better visibility */
        }

        .logout-button {
            background-color: #e74c3c; /* Red color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Remove underline */
            font-size: 16px; /* Font size */
        }

        .logout-button:hover {
            background-color: #c0392b; /* Darker red on hover */
        }

        .user-avatar {
            display: flex;
            align-items: center;
        }

        .user-avatar img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .dashboard {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
        }

        .card {
            backdrop-filter: blur(10px) saturate(200%);
            -webkit-backdrop-filter: blur(10px) saturate(200%);
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 100px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .card p {
            font-size: 36px;
            color: #333;
        }

        .card h2 {
            margin: 0 0 10px;
            color: #555;
        }

        .date-picker {
            margin: 30px 0;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 50px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        h1 {
            color: white;
        }

        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
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
            &copy; 2024 CCMS. All rights reserved 
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Reports</h1>
            <button class="logout-button" onclick="window.location.href='login.php';">Logout</button>
        </div>
        <div class="dashboard">
            <div class="card">
                <h2>Reports</h2>
                <p>Generate reports between dates</p>
                <!-- Form for selecting date range -->
                <form method="post">
                    <div class="date-picker">
                        <label for="from-date">From Date (dd-mm-yyyy):</label>
                        <input type="date" id="from-date" name="from_date" required>
                    </div>
                    <div class="date-picker">
                        <label for="to-date">To Date (dd-mm-yyyy):</label>
                        <input type="date" id="to-date" name="to_date" required>
                    </div>
                    <button type="submit">Generate Report</button>
                </form>

                <?php
                // Connect to the database
                $servername = "localhost";
                $username = "root";
                $password = ""; // Replace with your DB password
                $dbname = "ccm"; // Your database name

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Only show results if form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $fromDate = $_POST['from_date'];
                    $toDate = $_POST['to_date'];

                    // Validate date range
                    if ($fromDate > $toDate) {
                        echo "<p style='color:red;'>Invalid date range. 'From Date' should be earlier than 'To Date'.</p>";
                    } else {
                        // Query the database for the specified date range
                        $sql = "SELECT * FROM users WHERE intime BETWEEN '$fromDate' AND '$toDate'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<h2>Report from $fromDate to $toDate</h2>";
                            echo "<table>";
                            echo "<tr><th>Username</th><th>EntryID</th><th>Registration Date</th></tr>";

                            // Fetch and display the data
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["username"] . "</td>
                                        <td>" . $row["EntryID"] . "</td>
                                        <td>" . $row["intime"] . "</td>
                                      </tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "<p>No records found for the selected date range.</p>";
                        }
                    }
                }

                // Close the connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
