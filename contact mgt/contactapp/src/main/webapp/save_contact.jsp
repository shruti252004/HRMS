<%@ page import="java.sql.*, java.util.*" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    String firstName = request.getParameter("firstName");
    String lastName = request.getParameter("lastName");
    String address = request.getParameter("address");
    String email = request.getParameter("email");
    String phone = request.getParameter("phone");

    Connection conn = null;
    PreparedStatement stmt = null;

    try {
        Class.forName("com.mysql.cj.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/cmsdb", "root", "root");

        // Step 1: Insert the new contact
        String sql = "INSERT INTO contact_list (first_name, last_name, address, email, phone) VALUES (?, ?, ?, ?, ?)";
        stmt = conn.prepareStatement(sql);
        stmt.setString(1, firstName);
        stmt.setString(2, lastName);
        stmt.setString(3, address);
        stmt.setString(4, email);
        stmt.setString(5, phone);
        stmt.executeUpdate();
        stmt.close();

        // Step 2: Resequence IDs to keep them continuous
        Statement resequenceStmt = conn.createStatement();

        resequenceStmt.executeUpdate("ALTER TABLE contact_list ADD COLUMN temp_id INT");
        resequenceStmt.executeUpdate("SET @count = 0");
        resequenceStmt.executeUpdate("UPDATE contact_list SET temp_id = (@count := @count + 1)");
        resequenceStmt.executeUpdate("ALTER TABLE contact_list DROP COLUMN id");
        resequenceStmt.executeUpdate("ALTER TABLE contact_list CHANGE temp_id id INT");
        resequenceStmt.executeUpdate("ALTER TABLE contact_list MODIFY id INT NOT NULL AUTO_INCREMENT PRIMARY KEY");

        resequenceStmt.close();

        // Step 3: Redirect to contact list
        response.sendRedirect("view_contacts.jsp");

    } catch (Exception e) {
        out.println("Error: " + e.getMessage());
    } finally {
        try { if (stmt != null) stmt.close(); } catch (Exception e) {}
        try { if (conn != null) conn.close(); } catch (Exception e) {}
    }
%>
