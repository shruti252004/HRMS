<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CCMS Admin</title>
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

    /* Combined styles for the logout button */
    .logout-btn {
      position: fixed;
      top: 10px;
      right: 20px;
      padding: 10px 20px;
      background-color: #ff6666;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      z-index: 1000; /* Ensure it stays on top */
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
      top: 0; /* Start the sidebar from the top */
      left: 0;
      margin-top: 0;
      padding-top: 60px; /* Push content down to make space for the header */
      box-sizing: border-box;
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
      margin-left: 250px; /* Adjust for sidebar width */
      margin-top: 60px; /* Adjust for fixed button */
      box-sizing: border-box;
    }

    form {
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      display: flex;
      flex-direction: column;
    }

    form label {
      margin: 10px 0 5px;
    }

    form input {
      padding: 10px;
      margin-bottom: 10px;
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
    h1{
      color:white
    }

    #message {
      display: none;
      color: green;
      margin-top: 20px;
    }
  </style>
</head>
<body>
 <button class="logout-btn" onclick="window.location.href='login.php';">Logout</button>
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
      &copy; 2024 CCMS. All rights reserved
    </div>
  </div>

  <!-- Main Content Section -->
  <div class="main-content">
    <h1>Computer Details</h1>
    <form action="add_computer.php" method="POST">
      <label for="computer_name">Computer Name:</label>
      <input type="text" id="computer_name" name="computer_name" required>

      <label for="computer_location">Computer Location:</label>
      <input type="text" id="computer_location" name="computer_location" required>

      <label for="IPaddr">IP Address:</label>
      <input type="text" id="IPaddr" name="IPaddr" required>

      <button type="submit">Submit</button>
    </form>

    <div id="message" style="display:none; color: green; margin-top: 20px;">
      Computer details have been added successfully!
    </div>
  </div>

  <!-- PHP script for handling form submission -->
  <?php
  // Database connection details
  $servername = "localhost";
  $username = "root";
  $password = "";  // Ensure correct password or leave empty for no password
  $dbname = "ccm";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Check if form data is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data
      $computer_name = $_POST['computer_name'];
      $computer_location = $_POST['computer_location'];
      $IPaddr = $_POST['IPaddr'];

      // Insert data into database
      $sql = "INSERT INTO computers (computer_name, computer_location, IPaddr)
              VALUES ('$computer_name', '$computer_location', '$IPaddr')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>
                alert('Computer details have been added successfully!');
                window.location.href = 'manage_computer.php';
                </script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  // Close connection
  $conn->close();
  ?>
</body>
</html>
