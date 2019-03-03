package com.passwordmanager.db;

import com.passwordmanager.dao.User;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


public class Add {
	protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        
        String url = request.getParameter("url");
        String password = request.getParameter("password");
        String username = request.getParameter("username");
        
        try {
        	 User user = new User();
             Connection con=DriverManager.getConnection
                            ("jdbc:mysql://locahost:3306/content","root","");
             int ni = user.getUserViaUserName(username).getId();
             PreparedStatement ps =con.prepareStatement //change this tomorrow please 0_0... insert into info (..,..,..) values ()
                                 ("insert into info (website_name, password, uid) values ('"+url+"','"+password+"','"+ni+"')");
             ps.executeQuery();
             con.close();
        }catch(SQLException e) {
        	e.printStackTrace();
        }
	}
}
