<%@ page import="java.sql.*" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    String email = request.getParameter("username");
    String password = request.getParameter("password");

    if ("POST".equalsIgnoreCase(request.getMethod()) && email != null && password != null) {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/cmsdb", "root", "root");

            String sql = "SELECT * FROM users WHERE email = ? AND password = ?";
            PreparedStatement pst = con.prepareStatement(sql);
            pst.setString(1, email);
            pst.setString(2, password);

            ResultSet rs = pst.executeQuery();

            if (rs.next()) {
                session.setAttribute("user", email);
                response.sendRedirect("view_contacts.jsp"); // ✅ Redirect to contacts page
                return;
            } else {
%>
                <script>alert("Invalid email or password!");</script>
<%
            }

            rs.close();
            pst.close();
            con.close();
        } catch (Exception e) {
            out.println("<p style='color:red'>Database error: " + e.getMessage() + "</p>");
        }
    }
%>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Contact Management System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    h1 {
      color: white;
      margin-bottom: 20px;
      text-shadow: 1px 1px 2px black;
    }
    .box {
      width: 350px;
      padding: 30px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
      text-align: center;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #f8b500;
      color: white;
      border: none;
      font-weight: bold;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background: #d79500;
    }
    a {
      text-decoration: none;
      color: #f8b500;
      font-weight: bold;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- 🔶 Page Heading -->
  <h1>Welcome to Contact Management System</h1>

  <!-- 🔐 Login Form -->
  <div class="box">
    <form method="post">
      <h2>Login</h2>
      <input type="email" name="username" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <p style="margin-top: 15px;">Don't have an account? <a href="register.jsp">Register</a></p>
    </form>
  </div>

</body>
</html>


