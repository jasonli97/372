-- This SQL command creates a table named 'comments' in the database

CREATE TABLE comments (
	cid int(11) not null AUTO_INCREMENT PRIMARY KEY, -- 'cid' column is an auto-incrementing primary key of type int
	uid varchar(128) not null, -- 'uid' column is a non-null varchar of length 128
	date datetime not null, -- 'date' column is a non-null datetime
	message TEXT not null -- 'message' column is a non-null text field
);