CREATE TABLE Users(
	id int AUTO_INCREMENT,
	username varchar(15) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(255) NOT NULL,

	PRIMARY KEY (id, username)
);
INSERT INTO Users(username, email, password)
VALUES ("NULL", "NULL@NULL.NULL", "NULL");
CREATE TABLE Games(
	id int AUTO_INCREMENT,
	user1 int NOT NULL,
	user2 int DEFAULT 1,
	room int NOT NULL,

	PRIMARY KEY (id),
	FOREIGN KEY (user1) REFERENCES Users(id),
	FOREIGN KEY (user2) REFERENCES Users(id)
);
CREATE TABLE Objects(
	id int AUTO_INCREMENT,
	name varchar(20),
	description text,
	room int,

	PRIMARY KEY (id)
);
CREATE TABLE State_Game(
	id_game int,
	id_user int,
	id_object int,
	state_object int,

	PRIMARY KEY (id_game, id_user),
	FOREIGN KEY (id_user) REFERENCES Users(id),
	FOREIGN KEY (id_object) REFERENCES Objects(id)
);
CREATE TABLE Messages(
	id int AUTO_INCREMENT,
	id_sender int,
	id_receiver int,
	message text,

	PRIMARY KEY (id),
	FOREIGN KEY (id_sender) REFERENCES Users(id),
	FOREIGN KEY (id_receiver) REFERENCES Users(id)
);