
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Cafe Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f06, #4a90e2); /*bright pink, soft blue*/
            background-attachment: fixed;
            color: #333; /*grey*/
        }
        header {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        nav {
            display: flex; 
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        nav a {
            color: #fff; /*white*/
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .container {
            padding: 20px;
        }
        .row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .section {
            flex: 1;
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .section:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        .section img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        footer {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }
        .resized-image {
            width: 100%;
            height: auto;
        }
        .larger-image {
            width: 100%;
            height: auto;
        }
        .admin-image {
            width: 100%; 
            height: auto; 
        }
    </style>
</head>
<body>
    <header>
        <h1>Cyber Cafe Management System</h1>
    </header>
    <nav>
        <a href="#home">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="#users">Users</a>
        <a href="#admin">Admin</a>
        <a href="#reports">Reports</a>
        <a href="#cabins">Cabins</a>
    </nav>
    <div class="container">
        <p>The Cyber Cafe Management System is a comprehensive software solution designed to efficiently manage the operations of a cyber cafe. It streamlines activities such as user registration, session management, billing, and resource allocation, providing a seamless experience for both customers and administrators.</p>
        <div class="row">
            <div id="users" class="section">
                <h2>Users</h2>
                <p>Manage user registrations, login details, and internet usage.</p>
                <img src="https://cdn.dribbble.com/users/253856/screenshots/1938508/users-pics.png" alt="Users">
            </div>
            <div id="admin" class="section">
                <h2>Admin</h2>
                <p>Admin dashboard for managing the cyber cafe operations.</p>
                <img src="https://avatars.githubusercontent.com/u/44211029?v=4" alt="Admin" class="admin-image">
            </div>
        </div>
        <div class="row">
            <div id="reports" class="section">
                <h2>Reports</h2>
                <p>Generate and view reports on user activity and cafe usage.</p>
                <img src="https://dfpi.ca.gov/wp-content/uploads/sites/337/2019/03/report.png" alt="Reports" class="resized-image">
            </div>
            <div id="cabins" class="section">
                <h2>Cabins</h2>
                <p>Manage cabin allocations and availability.</p>
                <img src="https://th.bing.com/th/id/OIP.-lY3H-C0wcCdq3o5aSDQGwHaE-?w=510&h=343&rs=1&pid=ImgDetMain" alt="Cabins" class="larger-image">
            </div>
        </div>
    </div>
    <footer>
        <p>© 2024 Cyber Cafe Management System</p>
    </footer>
</body>
</html>
