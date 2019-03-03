package com.passwordmanager.db;

import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

//Future reference... :)
public class Delete {
	protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        
        String rowid = request.getParameter("rowid");
        
        try {
        	 DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
             Connection con=DriverManager.getConnection
                            ("jdbc:mysql://localhost:3306/contact","root","");
             PreparedStatement ps =con.prepareStatement	//
                                 ("delete from info where rowid="+rowid);
             ps.executeQuery();
             con.close();
        }catch(SQLException e) {
        	e.printStackTrace();
        }
	}
}
