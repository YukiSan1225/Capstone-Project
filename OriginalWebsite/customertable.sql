
CREATE TABLE customer (
cusid int(10) not null AUTO_INCREMENT,
 LName varchar(30) NOT NULL,
 FName varchar(30) NOT NULL,
 Email_Address varchar(50) NOT NULL,
 Phone char(10) NOT NULL,
 Password varchar (255) NOT NULL,
 primary key (cusid)
 );

INSERT INTO customer (Lname, FName, Email_Address, Phone, Password) VALUES ("Burks","Damien","dburksgtr@gmail.com","8320901324","IHateYou");
INSERT INTO customer (Lname, FName, Email_Address, Phone, Password) VALUES ("Johnson","Maria","mariadb@gmail.com","7810392456","ILoveYou");

CREATE TABLE cushome (
website_name varchar(50) NOT NULL,
    tnum int not null,
    cusid int(10) NOT NULL,
    password varchar(30) NOT NULL,
    primary key(tnum),
    CONSTRAINT `fk_cusid`
        FOREIGN KEY (cusid) REFERENCES customer (cusid)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
);
insert into cushome (website_name,cusid,password) values ("www.facebook.com",1,"niwpoherowha;rbne;bauogfe");
insert into cushome (website_name,cusid,password) values ("web.groupme.com",1,"lailfdnabfueowbagerw");
insert into cushome (website_name,cusid,password) values ("www.capitalone.com",1,"lanfodnwofnewfdsafdwa");
