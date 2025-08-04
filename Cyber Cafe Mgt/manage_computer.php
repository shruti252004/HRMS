<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = ""; // Ensure this is set correctly
$dbname = "ccm";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission for adding a computer
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $computer_name = $_POST["computer_name"];
    $computer_location = $_POST["computer_location"];
    $ip_address = $_POST["IPaddr"];

    $stmt = $con->prepare("INSERT INTO computers (computer_name, computer_location, ip_address) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $computer_name, $computer_location, $ip_address);

    if ($stmt->execute()) {
        echo "<script>alert('Computer details have been added successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Handle delete action
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Prepare delete statement
    $stmt = $con->prepare("DELETE FROM computers WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Computer details have been deleted successfully!'); window.location.href='manage_computers.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch computers from the database
$sql = "SELECT * FROM computers";
$result = $con->query($sql);

if (isset($_GET['logout'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Change 'login.php' to your actual login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Computers</title>
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
            color: white;
        }

        .user-avatar a {
            text-decoration: none;
            color: white;
            background-color: #f44336;
            padding: 10px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(200px);
            border-radius: 10px;
            overflow: hidden;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        table th {
            background: rgba(255, 255, 255, 0.2);
        }

        table tr:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        h2 {
            color: white;
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
        <div class="header">
            <h1>Manage Computers</h1>
            <div class="user-avatar">
                <a href="?logout">Logout</a>
            </div>
        </div>
        <h2>Computer List</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Computer Name</th>
                <th>Computer Location</th>
                <th>IP Address</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                          <td>" . $row["ID"]. "</td>
                          <td>" . $row["computer_name"]. "</td>
                          <td>" . $row["computer_location"]. "</td>
                          <td>" . $row["IPaddr"]. "</td>
                          <td><a href='manage_computer.php?delete=" . $row["ID"] . "' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No computers found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$con->close();
?>
