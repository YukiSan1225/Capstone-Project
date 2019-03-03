package com.passwordmanager.dao;

import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Connection;

public class User {
	private String username;
	private String password;
	private int id;
	
	public User() {
	}
	
	public User(String username, String password, int id) {
		this.setUsername(username);
		this.setPassword(password);
		this.setId(id);
	}
	
	public User getUserViaId(int id) {
		try {
			Connection connection = DriverManager.getConnection
			        ("jdbc:mysql://localhost:3306/contact","root","");
			Statement stmt = connection.createStatement();
			ResultSet rs = stmt.executeQuery("select * from users where id="+id);
			
			if(rs.next()) {
				User user = new User();
				
				user.setId(rs.getInt("id"));
				user.setUsername(rs.getString("username"));
				user.setPassword(rs.getString("password"));
				
				return user;
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}
	
	public User getUserViaUserName(String username){
		try {
			Connection connection = DriverManager.getConnection
			        ("jdbc:mysql://localhost:3306/contact","root","");
			Statement stmt = connection.createStatement();
			ResultSet rs = stmt.executeQuery("select * from users where username='"+username+"'");
			
			if(rs.next()) {
				User user = new User();
				
				user.setId(rs.getInt("id"));
				user.setPassword(rs.getString("password"));
				
				return user;
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}
	
	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}
}
