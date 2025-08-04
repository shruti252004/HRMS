<%@ page import="java.sql.*" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    String idParam = request.getParameter("id");
    int id = 0;
    String firstName = "", lastName = "", address = "", email = "", phone = "";

    try {
        if (idParam == null || idParam.trim().isEmpty()) {
            out.println("<p style='color:red; text-align:center;'>No contact ID provided!</p>");
            return;
        }

        id = Integer.parseInt(idParam);

        Class.forName("com.mysql.cj.jdbc.Driver");
        Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/cmsdb", "root", "root");

        String sql = "SELECT * FROM contact_list WHERE id = ?";
        PreparedStatement stmt = conn.prepareStatement(sql);
        stmt.setInt(1, id);
        ResultSet rs = stmt.executeQuery();

        if (rs.next()) {
            firstName = rs.getString("first_name");
            lastName = rs.getString("last_name");
            address = rs.getString("address");
            email = rs.getString("email");
            phone = rs.getString("phone");
        } else {
            out.println("<p style='color:red; text-align:center;'>Contact not found!</p>");
            return;
        }

        rs.close();
        stmt.close();
        conn.close();

    } catch (Exception e) {
        out.println("<p style='color:red; text-align:center;'>Error loading contact: " + e.getMessage() + "</p>");
        return;
    }
%>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Contact</title>
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

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        form {
            width: 400px;
            margin: 30px auto;
            background-color: #fff3cd;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #f8b500;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #d79500;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #007bff;
            text-decoration: none;
        }

        .back-link a:hover {
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

    <h2>Edit Contact</h2>

    <form action="edit_contact.jsp" method="post">
        <input type="hidden" name="id" value="<%= id %>">

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" value="<%= firstName %>" required>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" value="<%= lastName %>" required>

        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="<%= address %>" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<%= email %>" required>

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="<%= phone %>" required>

        <input type="submit" value="Update Contact">
    </form>

    <div class="back-link">
        <a href="view_contacts.jsp">⬅ Back to Contact List</a>
    </div>

</body>
</html>
