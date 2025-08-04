<%@ page import="java.sql.*" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Search Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #fceabb, #f8b500);
            color: #333;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #f8b500;
            margin-bottom: 25px;
        }

        form input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        form button {
            background-color: #f8b500;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #e09e00;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f8b500;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Search Contact</h2>
    <form method="get">
        <input type="text" name="query" placeholder="Enter name, email or phone" required>
        <button type="submit">Search</button>
    </form>

    <%
        String query = request.getParameter("query");
        if (query != null && !query.trim().isEmpty()) {
            try {
                Class.forName("com.mysql.cj.jdbc.Driver");
                Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/cmsdb", "root", "root");
                String sql = "SELECT * FROM contact_list WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ? OR phone LIKE ?";
                PreparedStatement stmt = conn.prepareStatement(sql);
                String keyword = "%" + query + "%";
                for (int i = 1; i <= 4; i++) stmt.setString(i, keyword);

                ResultSet rs = stmt.executeQuery();
                boolean found = false;
    %>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <%
            while (rs.next()) {
                found = true;
        %>
        <tr>
            <td><%= rs.getInt("id") %></td>
            <td><%= rs.getString("first_name") %></td>
            <td><%= rs.getString("last_name") %></td>
            <td><%= rs.getString("email") %></td>
            <td><%= rs.getString("phone") %></td>
        </tr>
        <% } %>
    </table>
    <%
                if (!found) {
                    out.println("<p style='color:red;'>No contact found.</p>");
                }
                rs.close();
                stmt.close();
                conn.close();
            } catch (Exception e) {
                out.println("<p style='color:red;'>Error: " + e.getMessage() + "</p>");
            }
        }
    %>
</div>

</body>
</html>