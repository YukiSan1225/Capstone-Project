package com.passwordmanager.dao;

import java.util.List;

public interface InformationDAO {
	Information getBasicInfo();
	List<Information> getProfileInfo();
	boolean insertInfo();
	boolean updateInfo();
	boolean deleteInfo();
}
