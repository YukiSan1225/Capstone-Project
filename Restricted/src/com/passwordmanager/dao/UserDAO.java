package com.passwordmanager.dao;

import java.util.List;

public interface UserDAO {
	User getUser();
	List<User> getAllUsers();
	boolean insertUser();
	boolean updateUser();
	boolean deleteUser();
}
