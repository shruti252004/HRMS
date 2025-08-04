<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
</head>
<body>
  <h1> Report </h1>
  <table>
    <tr>
      <th>Employee ID</th>
      <th>Employee Name</th>
      <th>Attendance Report</th>
      <th>Performance </th>
      <th>Tasks</th>
    </tr>
    <?php
      // Connect to database and retrieve data 
      $conn = mysqli_connect('localhost','root','','db');
      $sql = "SELECT * FROM report";
      $result = mysqli_query($conn, $sql);

      // Loop through results and display data in table rows
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['emp_id'] . "</td>";
        echo "<td>" . $row['emp_name'] . "</td>";
        echo "<td>" . $row['attnd_report'] . "</td>";
        echo "<td>" . $row['performance'] . "</td>";
        echo "<td>" . $row['tasks'] . "</td>";
        echo "</tr>";
      }

      mysqli_close($conn);
    ?>
  </table>
</body>
</html>