package com.passwordmanager.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

public class Information {
	private String website;
	private String password;
	private int uid;
	private int rowid;
	
	public Information() {
		
	}
	
	public Information(String website, String password, int uid, int rowid) {
		this.website = website;
		this.password = password;
		this.uid = uid;
		this.setRowid(rowid);
	}
	
	public Information getBasicInfo(int uid) {
		try {
			Connection connection = DriverManager.getConnection
			        ("jdbc:mysql://localhost:3306/contact","root","");
			Statement stmt = connection.createStatement();
			ResultSet rs = stmt.executeQuery("select * from info where uid="+uid);
			
			if(rs.next()) {
				Information info = new Information();
				
				info.setWebsite(rs.getString("website_name"));
				info.setPassword(rs.getString("password"));
				
				return info;
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}
	
	public List<Information> getProfileInfo(int uid){
		try {
			List<Information> tempinfo = new ArrayList<Information>();
			Connection connection = DriverManager.getConnection
			        ("jdbc:mysql://localhost:3306/contact","root","");
			Statement stmt = connection.createStatement();
			ResultSet rs = stmt.executeQuery("select * from info where uid="+uid);
			
			while(rs.next()) {
				Information info = new Information();
				info.setWebsite(rs.getString("website_name"));
				info.setPassword(rs.getString("password"));
				tempinfo.add(info);
			}
			
			return tempinfo;
		}catch(SQLException e) {
			e.printStackTrace();
		}
		return null;
	}
	public String getWebsite() {
		return website;
	}
	public void setWebsite(String website) {
		this.website = website;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	public int getUid() {
		return uid;
	}
	public void setUid(int uid) {
		this.uid = uid;
	}
	public int getRowid() {
		return rowid;
	}
	public void setRowid(int rowid) {
		this.rowid = rowid;
	}
}
