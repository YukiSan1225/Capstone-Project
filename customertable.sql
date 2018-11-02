
CREATE TABLE cuslogin (
LName varchar(30) NOT NULL,
 FName varchar(30) NOT NULL,
 Email_Address varchar(50) NOT NULL,
 Phone char(10) NOT NULL,
 Password varchar (30) NOT NULL,
 primary key (Email_Address)
 );

INSERT INTO CUSLOGIN (Lname, FName, Email_Address, Phone, Password) VALUES ("Burks","Damien","dburksgtr@gmail.com","8320901324","IHateYou");
INSERT INTO CUSLOGIN (Lname, FName, Email_Address, Phone, Password) VALUES ("Johnson","Maria","mariadb@gmail.com","7810392456","ILoveYou");

CREATE TABLE cushome (
website_name varchar(50) NOT NULL,
    email_address varchar(30) NOT NULL,
    password varchar(30) NOT NULL,
    CONSTRAINT `fk_cuslogin_email`
        FOREIGN KEY (email_address) REFERENCES cuslogin (Email_Address)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
);