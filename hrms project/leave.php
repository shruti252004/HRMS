 <!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
</head>
<body>
  <h1>Leave</h1>
  <table>
    <tr>
      <th>Employee ID</th>
      <th>Employee Name</th>
      <th>Leave Status</th>
      <th>Number of Leaves</th>
    </tr>
    <?php
      // Connect to database
      $conn = mysqli_connect('localhost', 'root', '', 'db');

      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // Retrieve data 
      $sql = "SELECT * FROM leave";
   

      // Display data
      while ($row = mysqli_fetch_assoc) {
          echo "<tr>";
          echo "<td>" . $row['emp_id'] . "</td>";
          echo "<td>" . $row['emp_name'] . "</td>";
          echo "<td>" . $row['leave_status'] . "</td>";
          echo "<td>" . $row['no_of_leaves'] . "</td>";
          echo "</tr>";
      }

      // Close connection
      mysqli_close($conn);
    ?>
  </table>
</body>
</html>