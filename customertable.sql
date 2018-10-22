
CREATE TABLE [IF NOT EXISTS] CUSTOMER (
customerID int (8),
 LName varchar(30) [not null],
 FName varchar(30) [not null],
 Email_Address varchar(30) [not null],
 Phone char(10) [not null],
 Password varchar (30) [not null],
 primary key (customerID)
 );

