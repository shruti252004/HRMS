<%@ page import="java.sql.*" %>
<%@ page contentType="text/html; charset=UTF-8" language="java" %>
<%
    String idParam = request.getParameter("id");
    Connection conn = null;
    PreparedStatement stmt = null;

    if (idParam != null && !idParam.trim().equals("")) {
        try {
            int id = Integer.parseInt(idParam);

            Class.forName("com.mysql.cj.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/cmsdb", "root", "root");

            // 1. Delete the contact
            String sql = "DELETE FROM contact_list WHERE id = ?";
            stmt = conn.prepareStatement(sql);
            stmt.setInt(1, id);
            int rows = stmt.executeUpdate();
            stmt.close();

            // 2. Resequence the IDs if a contact was deleted
            if (rows > 0) {
                Statement resequenceStmt = conn.createStatement();

                // Step 1: Add a temp column
                resequenceStmt.executeUpdate("ALTER TABLE contact_list ADD COLUMN temp_id INT");

                // Step 2: Assign continuous numbers
                resequenceStmt.executeUpdate("SET @count = 0");
                resequenceStmt.executeUpdate("UPDATE contact_list SET temp_id = (@count := @count + 1)");

                // Step 3: Drop old id column
                resequenceStmt.executeUpdate("ALTER TABLE contact_list DROP COLUMN id");

                // Step 4: Rename temp_id to id
                resequenceStmt.executeUpdate("ALTER TABLE contact_list CHANGE temp_id id INT");

                // Step 5: Make id primary key and auto_increment
                resequenceStmt.executeUpdate("ALTER TABLE contact_list MODIFY id INT NOT NULL AUTO_INCREMENT PRIMARY KEY");

                resequenceStmt.close();
            }

            conn.close();
            response.sendRedirect("view_contacts.jsp");

        } catch (Exception e) {
            out.println("<p style='color:red;'>Error: " + e.getMessage() + "</p>");
        } finally {
            try { if (stmt != null) stmt.close(); } catch (Exception e) {}
            try { if (conn != null) conn.close(); } catch (Exception e) {}
        }
    } else {
        out.println("<p style='color:red;'>Invalid ID.</p>");
    }
%>
