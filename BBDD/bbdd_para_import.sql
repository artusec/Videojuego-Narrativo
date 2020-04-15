CREATE TABLE Users(
	id int AUTO_INCREMENT,
	username varchar(15) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(255) NOT NULL,

	PRIMARY KEY (id, username)
);

CREATE TABLE Games(
	id int AUTO_INCREMENT,
	user int NOT NULL,
	date_start TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

	PRIMARY KEY (id),
	FOREIGN KEY (user) REFERENCES Users(id)
);

CREATE TABLE Objects(
	name varchar(50),
	description varchar(50),
	type int,

	PRIMARY KEY (name)
);

CREATE TABLE State_Game(
	id_game int,
	id_user int,
	object varchar(50),
	type int,
	state_object int,

	PRIMARY KEY (id_game, id_user, object),
	FOREIGN KEY (id_user) REFERENCES Users(id)
);

CREATE TABLE Statistics(
	id int AUTO_INCREMENT,
	id_user int,
	id_game int,
	timed float,
	date_start TIMESTAMP,

	PRIMARY KEY (id, id_user, id_game),
	FOREIGN KEY (id_user) REFERENCES Users(id),
	FOREIGN KEY (id_game) REFERENCES Games(id)
);