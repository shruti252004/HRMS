<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
</head>
<body>
  <h1> Department </h1>
  <table>
    <tr>
      <th>Employee ID</th>
      <th>Employee Name</th>
      <th>Department</th>
    </tr>
    
    <?php
      // Connect to database and retrieve data 
      $conn = mysqli_connect('localhost','root','','db');
      $sql = "SELECT * FROM department";
      $result = mysqli_query($conn, $sql);

      // Loop through results and display data in table rows
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['emp_id'] . "</td>";
        echo "<td>" . $row['emp_name'] . "</td>";
        echo "<td>" . $row['department'] . "</td>";
        echo "</tr>";
      }

      mysqli_close($conn);
    ?>
  </table>
</body>
</html>
