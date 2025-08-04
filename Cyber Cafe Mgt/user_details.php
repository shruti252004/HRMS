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
        .main-content form {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
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
            position: relative; /* Position relative for absolute positioning of the logout button */
        }
        .logout-button {
            position: absolute; /* Position it absolutely */
            top: 20px; /* Distance from the top */
            right: 20px; /* Distance from the right */
            background-color: #ff4747; /* Red background for logout button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .logout-button:hover {
            background-color: #ff2b2b; /* Darker red on hover */
        }
        form {
            display: flex;
            flex-direction: column;
            max-width: 1000px;
            margin: auto;
        }
        form label {
            margin: 20px 0 5px;
        }
        form input, form select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        h1, h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
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
            &copy; 2024 CCMS. All rights reserved
        </div>
    </div>

    <div class="main-content">
        <h1>User Details</h1><button class="logout-button" onclick="window.location.href='login.php';">Logout</button>

        <form action="" method="post">
            <label for="user_name">User Name:</label>
            <input type="text" id="user_name" name="user_name" required>

            <label for="user_address">User Address:</label>
            <input type="text" id="user_address" name="user_address" required>

            <label for="mobile_number">Mobile Number:</label>
            <input type="text" id="mobile_number" name="mobile_number" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="computer_name">Computer Name:</label>
            <select id="computer_name" name="computer_name">
                <option value="Acer (Cabin101)">Acer (Cabin101)</option>
                <option value="Dell (Cabin102)">Dell (Cabin102)</option>
                <option value="HP (Cabin103)">HP (Cabin103)</option>
                <option value="Asus (Cabin104)">Asus (Cabin104)</option>
                <option value="Acer (Cabin105)">Acer (Cabin105)</option>
                <option value="Asus gaming laptop (Cabin106)">Asus gaming laptop (Cabin106)</option>
                <option value="Dell (Cabin107)">Dell (Cabin107)</option>
                <option value="HP (Cabin108)">HP (Cabin108)</option>
                <option value="Acer Nitro (Cabin109)">Acer Nitro (Cabin109)</option>
                <option value="Dell (Cabin110)">Dell (Cabin 110)</option>
            </select>

            <label for="intime">In Time:</label>
            <input type="datetime-local" id="intime" name="intime" required>

            <button type="submit">Submit</button>
        </form>

        <?php
        // Database connection details (consider using a separate file)
        $servername = "localhost";
        $username = "root";
        $password = "";  // Add your database password if needed
        $dbname = "ccm";

        // Connect to database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if form data is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data and sanitize input
            $EntryID = htmlspecialchars(trim($_POST['EntryID']));
            $user_name = htmlspecialchars(trim($_POST['user_name']));
            $intime = htmlspecialchars(trim($_POST['intime']));
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $computer_name = htmlspecialchars(trim($_POST['computer_name']));

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Invalid email format!'); window.history.back();</script>";
                exit;
            }

            // Generate a unique EntryID
            $EntryID = uniqid();

            // Prepare SQL and bind parameters
            $stmt = $conn->prepare("INSERT INTO newusers (username, intime, EntryID, email, computer_name) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $user_name, $intime, $EntryID, $email, $computer_name);

            // Execute the query
            if ($stmt->execute()) {
                echo "<script>
                    alert('User details have been added successfully!');
                    window.location.href = 'newusers.php'; // Redirect to the same page to see updated users
                </script>";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
