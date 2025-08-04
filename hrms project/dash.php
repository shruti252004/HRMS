<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <style>
        /* Add some basic styling */
        #sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: blue;
            color: #fff;
            padding: 10px;
        }

        #sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        #sidebar ul li {
            margin-bottom: 10px;
        }

        #sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Optional CSS styling for the canvas element */
        #employeeChart {
            max-width: 100%; /* Limit the maximum width */
            height: auto; /* Maintain aspect ratio */
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #middle-section {
            margin-left: 220px; /* Adjusted to accommodate sidebar width */
            padding: 20px;
        }

        #pie-chart-container {
            width: 200px;
            margin: 20px auto; /* Center the chart horizontally */
            background-color: white;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <h2>Admin Dashboard</h2>

        <ul>
            <li><a href="employee.php">Employee</a></li>
            <li><a href="department.php">Department</a></li>
            <li><a href="leave.php">Leave</a></li>
            <li><a href="salary.php">Salary</a></li>
            <li><a href="position.php">Position</a></li>
            <li><a href="report.php">Report</a></li>
            <li><a href="attendance.php">Attendance</a></li>
        </ul>
    </div>
    
    <div id="navbar">
        <a>Logout</a>
        <a>About</a>
    </div>

    <div id="middle-section">
        <!-- Add the pie chart in the middle section -->
        <div id="pie-chart-container">
            <canvas id="employeeChart"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        <script>
            // Your pie chart code goes here
            // Make sure to include the necessary libraries (e.g., Chart.js)
            // Define data directly 
            const femaleCount = 8;
            const maleCount = 2;

            const ctx = document.getElementById('employeeChart').getContext('2d');
            const employeeChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        label: 'Employee Count',
                        data: [maleCount, femaleCount],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)', // Light blue for male
                            'rgba(255, 99, 132, 0.2)' // Light pink for female
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)', // Blue for male
                            'rgba(255, 99, 132, 1)' // Red for female
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true, // Make the chart responsive
                    maintainAspectRatio: false // Allow the chart to adjust its aspect ratio
                }

            });
        </script>
    </div>

    <style>
        /* Add some basic styling */
        #footer {
            width: 100%;
            position: fixed;
            left: 0;
            bottom: 0;
            background-color: blue;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>

    <!-- Your sidebar and other content here... -->

    <div id="footer">
        <p>© 2024 Hrms Pvt Ltd. All rights reserved.</p>
    </div>

    <style>
        /* Add some basic styling */
        #navbar {
            background-color: blue;
            overflow: hidden;
        }

        #navbar a {
            float: right;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        #navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
    </head>

</html>