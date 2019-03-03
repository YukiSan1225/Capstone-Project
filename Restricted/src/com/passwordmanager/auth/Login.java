package com.passwordmanager.auth;

import com.passwordmanager.dao.Information;
import com.passwordmanager.dao.User;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@SuppressWarnings("serial")
public class Login extends HttpServlet {
	
	private String username;
    @Override
	protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
        
        String user = request.getParameter("username");
        String pass = request.getParameter("password");
        setUsername(user);
        
        if(Validate.checkUser(user, pass) == true)
        {
        	RequestDispatcher rd=request.getRequestDispatcher("/WEB-INF/home.jsp");  
        	HttpSession session=request.getSession();
            //session.setAttribute("username", username);			
			Information info = new Information();
			User usr = new User();
			List<Information> listInfo = new ArrayList<Information>();
			listInfo = info.getProfileInfo(usr.getUserViaUserName(user).getId());
			request.setAttribute("Information", listInfo);
        	rd.forward(request,response); 
        }
        else
        {
           out.println("Wrong. Try Again.");
           RequestDispatcher rs = request.getRequestDispatcher("index.html");
           rs.include(request, response);
        }
    }
    public String getUsername() {
    	return username;
    }
    public void setUsername(String username) {
    	this.username = username;
    }
}