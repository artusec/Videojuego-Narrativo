---------------------------------------------------------------------
-- BBDD: Videojuego_Narrativo
---------------------------------------------------------------------

DROP TABLE IF EXISTS Messages;
DROP TABLE IF EXISTS State_Game;
DROP TABLE IF EXISTS Objects;
DROP TABLE IF EXISTS Games;
DROP TABLE IF EXISTS Users;

-- Users de todo el juego, asumo que para jugar hay que registrarse
-- y que además es necesario conectarse al servidor para poder jugar.
-- El user con id 1 y todo NULL es especial, es el user comodin
-- por así decirlo.
-- La contraseña se guardará hasheada. Segun el manual de php recomiendan
-- 255 caracteres
CREATE TABLE Users(
	id int AUTO_INCREMENT,
	username varchar(15) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(255) NOT NULL,

	PRIMARY KEY (id, username)
);

INSERT INTO Users(username, email, password)
VALUES ("NULL", "NULL@NULL.NULL", "NULL");


-- Games que se crean. Aquí es donde se usa el user comodín porque
-- si juegas individual el user 2 no puede referenciarse a "nada" ya
-- que es una clave foránea así que esto es lo que se me ha ocurrido. Por
-- defecto el user2 es 1 a no ser que se especifique algo.
CREATE TABLE Games(
	id int AUTO_INCREMENT,
	user1 int NOT NULL,
	user2 int DEFAULT 1,
	room int NOT NULL,

	PRIMARY KEY (id),
	FOREIGN KEY (user1) REFERENCES Users(id),
	FOREIGN KEY (user2) REFERENCES Users(id)
);


-- Tabla con los Objects de las rooms. Información básica.
CREATE TABLE Objects(
	id int AUTO_INCREMENT,
	name varchar(20),
	description text,
	room int,

	PRIMARY KEY (id)
);


-- Tabla donde se almacena la información de las partidas. Como hay
-- que almacenar el estado de cada objeto de la room he pensado en una
-- codificación del estilo 1=No cogido (es decir sigue oculto en la room),
-- 2=En las manos del jugador (es decir lo ha encontrado y cogido pero
-- no ha hecho nada con el aun, sigue en su inventario), 3=Usado/consumido
-- (esto seria si ya lo has usado para desbloquear algo y entraria también)
-- si se lo has pasado a tu compañero de la otra room. No esta ni en tu room
-- ni en tu inventario).
-- Se almacenaría una fila por cada partida-user-objeto. Creo que es la
-- mejor forma porque no podemos saber de antemano cuántos Objects habrá.
CREATE TABLE State_Game(
	id_game int,
	id_user int,
	id_object int,
	state_object int,

	PRIMARY KEY (id_game, id_user),
	FOREIGN KEY (id_user) REFERENCES Users(id),
	FOREIGN KEY (id_object) REFERENCES Objects(id)
);


-- Tabla con los Mensajes, muy simple emisor, receptor y texto.
CREATE TABLE Messages(
	id int AUTO_INCREMENT,
	id_sender int,
	id_receiver int,
	message text,

	PRIMARY KEY (id),
	FOREIGN KEY (id_sender) REFERENCES Users(id),
	FOREIGN KEY (id_receiver) REFERENCES Users(id)
);

-- Tabla con las estadísticas del usuario. Se pueden guardar los tiempos de
-- la misma sala muchas veces, de esta forma se puede sacar alguna media o
-- algo así. A través del id_game accedemos a la room y tambíen si hace
-- falta al state_game,
CREATE TABLE Statistics(
	id int AUTO_INCREMENT,
	id_user int,
	id_game int,
	timed int

	PRIMARY KEY (id),
	FOREIGN KEY (id_user) REFERENCES Users(id),
	FOREIGN KEY (id_game) REFERENCES Games(id)
);