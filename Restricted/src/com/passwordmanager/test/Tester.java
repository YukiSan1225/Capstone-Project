package com.passwordmanager.test;

import com.passwordmanager.dao.User;
import com.passwordmanager.dao.Information;
public class Tester {
	public static void main(String[] args) {
		User newUser = new User();
		Information info = new Information();
		System.out.println(info.getProfileInfo(newUser.getUserViaUserName("NOK1D").getId()));
	}
}
