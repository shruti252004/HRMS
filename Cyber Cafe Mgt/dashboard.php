<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCMS Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
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
            <p>&copy; 2024 CCMS. All rights reserved.</p>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <button class="logout-btn" onclick="window.location.href='login.php';">Logout</button>
        </div>
        
        <div class="dashboard">
            <div class="card">
                <h2>Total Number of Users</h2>
                <p id="totalUsers">5</p>
            </div>
            <div class="card">
                <h2>Total Computers</h2>
                <p id="totalComputers">5</p>
            </div>
            <div class="card">
                <h2>Total New Users (Still in Cafe)</h2>
                <p id="newUsers">1</p>
            </div>
            <div class="card">
                <h2>Old Users (Out from Cafe)</h2>
                <p id="oldUsers">4</p>
            </div>
        </div>
        
        <div class="bar-graph">
            <canvas id="myBarChart"></canvas>
        </div>
    </div>

    <script>
        // Example function to update counts
        function updateCounts(totalUsers, totalComputers, newUsers, oldUsers) {
            document.getElementById('totalUsers').textContent = totalUsers;
            document.getElementById('totalComputers').textContent = totalComputers;
            document.getElementById('newUsers').textContent = newUsers;
            document.getElementById('oldUsers').textContent = oldUsers;
        }

        // Call the function with the new counts
        updateCounts(7, 10, 1, 4); // Replace with actual counts

        // Bar Chart
        const ctx = document.getElementById('myBarChart').getContext('2d');
        const myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Users', 'Total Computers', 'New Users', 'Old Users'],
                datasets: [{
                    label: 'Count',
                    data: [7, 10, 1, 4], // Replace with actual data
                    backgroundColor: [
                        'rgba(110, 142, 251, 0.7)',
                        'rgba(167, 119, 227, 0.7)',
                        'rgba(52, 152, 219, 0.7)',
                        'rgba(231, 76, 60, 0.7)'
                    ],
                    borderColor: [
                        'rgba(110, 142, 251, 1)',
                        'rgba(167, 119, 227, 1)',
                        'rgba(52, 152, 219, 1)',
                        'rgba(231, 76, 60, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false // Hide the legend if not needed
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        color: '#fff',
                        formatter: (value) => {
                            return value; // Display the value as label
                        }
                    }
                }
            },
            plugins: [ChartDataLabels] // Include Data Labels plugin
        });
    </script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
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
        }

        .logout-btn {
            background-color: #e74c3c; /* Red color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; 
            text-decoration: none; /* Remove underline */
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background-color: #c0392b; /* Darker red  */
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .card {
            background: linear-gradient(135deg, #6e8efb, #a777e3); /*pastel blue, lavender*/
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .card h2 {
            margin: 0 0 10px;
            color: #fff;
            font-size: 24px;
        }

        .card p {
            font-size: 28px;
            color: #fff;
            margin: 0;
        }

        .bar-graph {
            margin-top: 60px; /* Increased space above the bar graph */
        }

        canvas {
            width: 100% !important; 
            height: 400px !important; 
        }
    </style>
</body>
</html>
