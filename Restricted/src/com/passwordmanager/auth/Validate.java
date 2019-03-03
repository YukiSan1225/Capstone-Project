package com.passwordmanager.auth;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.DriverManager;
import java.sql.ResultSet;

public class Validate
 {
     public static boolean checkUser(String email,String pass) 
     {
      boolean st=false;     
      try{
    	 //Creating connection with the database 
    	 DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
         Connection con=DriverManager.getConnection
                        ("jdbc:mysql://localhost:3306/contact","root","");
         PreparedStatement ps =con.prepareStatement
                             ("select * from users where username=? and password=?");
         ps.setString(1, email);
         ps.setString(2, pass);
         ResultSet rs =ps.executeQuery();
         st = rs.next();
        
      }catch(Exception e)
      {
          e.printStackTrace();
      }
      return st;                 
  }   
}