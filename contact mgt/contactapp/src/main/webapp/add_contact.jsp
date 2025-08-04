<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Contact</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background-color: #f8b500;
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #fff3cd;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #d48806;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-top: 5px;
        }

        button {
            background-color: #f8b500;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            margin-top: 25px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #d79500;
        }

        .nav-link {
            text-align: center;
            margin-top: 20px;
        }

        .nav-link a {
            color: #f8b500;
            text-decoration: none;
            font-weight: bold;
        }

        .nav-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div><strong>Contact Management System</strong></div>
    <div>
        <a href="view_contacts.jsp">View Contacts</a>
        <a href="index.jsp">Logout</a>
    </div>
</div>

<div class="container">
    <h2>Add New Contact</h2>

    <form action="save_contact.jsp" method="post">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" required>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" required>

        <label for="address">Address</label>
        <input type="text" name="address" id="address">

        <label for="email">Email ID</label>
        <input type="email" name="email" id="email" required>

        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone" required>

        <button type="submit">Save Contact</button>
    </form>

    <div class="nav-link">
        <a href="view_contacts.jsp">⬅ Back to Contact List</a>
    </div>
</div>

</body>
</html>

