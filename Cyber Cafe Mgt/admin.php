<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://us.123rf.com/450wm/ohishi/ohishi1801/ohishi180100002/93767870-games-computer-online-in-internet-cafe.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .details-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="details-container">
        <h2>Admin Details</h2>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'ccm';
        
        $conn = mysqli_connect($host, $username, $password, $dbname);
        
        if (!$conn) {
            die('Could not connect: ' . mysqli_connect_error());
        }
        

        $query = "SELECT * FROM admin";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Registration Date</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['user_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" .$row["registration_date"] ."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No admin details found.";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>

