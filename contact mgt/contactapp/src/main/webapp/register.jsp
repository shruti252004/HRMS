<%@ page import="java.sql.*" %>
<%@ page contentType="text/html; charset=UTF-8" language="java" %>
<%
    String email = request.getParameter("email");
    String password = request.getParameter("password");

    if ("POST".equalsIgnoreCase(request.getMethod()) && email != null && password != null) {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/cmsdb", "root", "root");

            // Check if email already exists
            PreparedStatement check = con.prepareStatement("SELECT * FROM users WHERE email = ?");
            check.setString(1, email);
            ResultSet rs = check.executeQuery();

            if (rs.next()) {
%>
                <script>alert("Email is already registered.");</script>
<%
            } else {
                String sql = "INSERT INTO users(email, password) VALUES (?, ?)";
                PreparedStatement pst = con.prepareStatement(sql);
                pst.setString(1, email);
                pst.setString(2, password);

                int i = pst.executeUpdate();
                if (i > 0) {
%>
                    <script>alert("Registration successful! Please login."); window.location = 'index.jsp';</script>
<%
                } else {
%>
                    <script>alert("Registration failed!");</script>
<%
                }
                pst.close();
            }

            rs.close();
            check.close();
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
  <title>Register</title>
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
      text-shadow: 1px 1px 2px white;
    }
    .box {
      width: 400px;
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
      background: #28a745;
      color: white;
      border: none;
      font-weight: bold;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background: #218838;
    }
    a {
      text-decoration: none;
      color: #3366cc;
    }
  </style>
</head>
<body>

  <h1>Create Your Account</h1>

  <div class="box">
    <form method="post">
      <h2>Register</h2>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
      <p style="text-align:center">Already have an account? <a href="index.jsp">Login</a></p>
    </form>
  </div>

</body>
</html>
