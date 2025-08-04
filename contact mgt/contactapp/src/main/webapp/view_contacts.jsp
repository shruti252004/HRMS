<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.sql.*, java.util.*" %>
<%@ page import="contactapp.Contact" %>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Contacts</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333;
        }

        /* Simple Navbar */
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
            margin: 30px 0 20px;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f8b500;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action-links a {
            margin-right: 10px;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .btn-back {
            text-align: center;
            margin: 30px 0;
        }

        .btn-back a {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #f8b500;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-back a:hover {
            background-color: #d79500;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div><strong>Contact Management System</strong></div>
        <div>
            <a href="index.jsp">Logout</a>
        </div>
    </div>

    <h2>Contact List</h2>

<%
    List<Contact> contacts = new ArrayList<>();

    try {
        Class.forName("com.mysql.cj.jdbc.Driver");
        Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/cmsdb", "root", "root");

        String sql = "SELECT * FROM contact_list";
        PreparedStatement stmt = conn.prepareStatement(sql);
        ResultSet rs = stmt.executeQuery();

        while (rs.next()) {
            Contact c = new Contact();
            c.setId(rs.getInt("id"));
            c.setFirstName(rs.getString("first_name"));
            c.setLastName(rs.getString("last_name"));
            c.setAddress(rs.getString("address"));
            c.setEmail(rs.getString("email"));
            c.setPhone(rs.getString("phone"));
            contacts.add(c);
        }

        rs.close();
        stmt.close();
        conn.close();

    } catch (Exception e) {
        out.println("<p style='color:red; text-align:center;'>Error: " + e.getMessage() + "</p>");
    }
%>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>

    <%
        if (!contacts.isEmpty()) {
            for (Contact c : contacts) {
    %>
    <tr>
        <td><%= c.getId() %></td>
        <td><%= c.getFirstName() %></td>
        <td><%= c.getLastName() %></td>
        <td><%= c.getAddress() %></td>
        <td><%= c.getEmail() %></td>
        <td><%= c.getPhone() %></td>
        <td class="action-links">
            <a href="update_contact.jsp?id=<%= c.getId() %>">Edit</a>
            <a href="delete_contact.jsp?id=<%= c.getId() %>" 
               onclick="return confirm('Are you sure you want to delete this contact?');">Delete</a>
        </td>
    </tr>
    <%
            }
        } else {
    %>
    <tr><td colspan="7" style="text-align:center;">No contacts available.</td></tr>
    <%
        }
    %>
</table>

<div class="btn-back">
    <a href="add_contact.jsp">➕ Add Contact</a>
</div>

</body>
</html>


