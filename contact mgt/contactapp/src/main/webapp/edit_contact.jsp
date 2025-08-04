<%@ page import="java.sql.*" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    request.setCharacterEncoding("UTF-8");

    // Get parameters from the form
    String idStr = request.getParameter("id");
    String firstName = request.getParameter("firstName");
    String lastName = request.getParameter("lastName");
    String address = request.getParameter("address");
    String email = request.getParameter("email");
    String phone = request.getParameter("phone");

    // Validation check
    if (idStr == null || idStr.isEmpty()) {
        out.println("<h3 style='color:red;'>Error: Contact ID is missing.</h3>");
        return;
    }

    int id = Integer.parseInt(idStr);
    Connection conn = null;
    PreparedStatement stmt = null;

    try {
        // Connect to MySQL
        Class.forName("com.mysql.cj.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/cmsdb", "root", "root");

        // Update query
        String sql = "UPDATE contact_list SET first_name = ?, last_name = ?, address = ?, email = ?, phone = ? WHERE id = ?";
        stmt = conn.prepareStatement(sql);
        stmt.setString(1, firstName);
        stmt.setString(2, lastName);
        stmt.setString(3, address);
        stmt.setString(4, email);
        stmt.setString(5, phone);
        stmt.setInt(6, id);

        int rows = stmt.executeUpdate();

        if (rows > 0) {
            // ✅ Redirect to view contacts page
            response.sendRedirect("view_contacts.jsp");
        } else {
            out.println("<h3 style='color:red;'>Update failed. Contact not found with ID: " + id + "</h3>");
        }

    } catch (Exception e) {
        out.println("<h3 style='color:red;'>Error updating contact: " + e.getMessage() + "</h3>");
    } finally {
        try { if (stmt != null) stmt.close(); } catch (Exception e) {}
        try { if (conn != null) conn.close(); } catch (Exception e) {}
    }
%>
