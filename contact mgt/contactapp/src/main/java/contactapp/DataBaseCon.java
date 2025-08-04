package contactapp;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DataBaseCon {
	private static final String PASSWORD = "root";

    private static final String URL = "jdbc:mysql://localhost:3306/cmsdb"; // ✅ change this to your DB name
    private static final String USER = "root";        // ✅ update if needed

    public static Connection getConnection() {
        Connection conn = null;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver"); // correct for MySQL 8+
            conn = DriverManager.getConnection(URL, USER, PASSWORD);
        } catch (ClassNotFoundException e) {
            System.out.println("❌ JDBC Driver not found.");
            e.printStackTrace();
        } catch (SQLException e) {
            System.out.println("❌ SQL Error while connecting to DB:");
            e.printStackTrace();
        }
        return conn;
    }
}
