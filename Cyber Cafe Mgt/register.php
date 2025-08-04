<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://us.123rf.com/450wm/ohishi/ohishi1801/ohishi180100002/93767870-games-computer-online-in-internet-cafe.jpg');
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            padding: 50px;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            margin: 0 auto;
            margin-top: 100px;
            border-radius: 4px;
        }
        input[type=text], input[type=email], input[type=password], input[type=number] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: rgba(255, 255, 255, 0.9);
        }
        button {
            background-color: rgba(255, 255, 255, 0.7);
            color: #080808;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        button:hover {
            opacity: 1;
        }
    </style>
</head>
<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>

                            <form action="register.php" method="POST">
                                <div>
                                    <label for="name">Admin Name</label>
                                    <input type="text" id="admin_name" name="admin_name" required>
                                </div>
                                <div>
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div>
                                    <label for="mobile_no">Mobile Number</label>
                                    <input type="number" id="mobile_no" name="mobile_no" required>
                                </div>
                                <div>
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" required>
                                </div>
                                <div>
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" id="confirm_password" name="confirm_password" required>
                                </div>
                                <div>
                                    <button type="submit">Register</button>
                                </div>
                                <div>Already have an account? <a href="login.php">Login</a></div>
                            </form>
                            <div>
                            <?php
                            // Start session
                            session_start();

                            // Database connection
                            $servername = "localhost";
                            $username = "root";       // Change this to your MySQL username
                            $password = "";           // Change this to your MySQL password
                            $dbname = "ccm";          // Change this to your database name

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Check if form is submitted
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                // Get user input and sanitize it
                                $adminname = mysqli_real_escape_string($conn, $_POST['admin_name']);
                                $email = mysqli_real_escape_string($conn, $_POST['email']);
                                $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);
                                $password = mysqli_real_escape_string($conn, $_POST['password']);
                                $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

                                // Check if passwords match
                                if ($password !== $confirm_password) {
                                    echo "Passwords do not match!";
                                    exit;
                                }

                                // Check if the email is already registered
                                $check_email = "SELECT * FROM admin WHERE email = '$email'";
                                $result = $conn->query($check_email);

                                if ($result->num_rows > 0) {
                                    echo "Email already exists!";
                                    exit;
                                }

                                // Validate email format
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    echo "Invalid email format!";
                                    exit;
                                }

                                // Validate mobile number (must be exactly 10 digits)
                                if (!preg_match('/^[0-9]{10}$/', $mobile_no)) {
                                    echo "Invalid mobile number!";
                                    exit;
                                }

                                // Hash the password before storing it
                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                                // Insert into database
                                $sql = "INSERT INTO admin (email, admin_name, mobile_no, password) 
                                        VALUES ('$email', '$adminname', '$mobile_no', '$hashed_password')";

                                if ($conn->query($sql) === TRUE) {
                                    echo "Registration successful!";
                                } else {
                                    // Display specific error message for troubleshooting
                                    echo "Error: " . $conn->error;
                                }

                                // Close the connection
                                $conn->close();
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
