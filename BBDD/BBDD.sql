---------------------------------------------------------------------
-- BBDD: Videojuego_Narrativo
---------------------------------------------------------------------

DROP TABLE IF EXISTS Mensajes;
DROP TABLE IF EXISTS Estado_Partida;
DROP TABLE IF EXISTS Objetos;
DROP TABLE IF EXISTS Partidas;
DROP TABLE IF EXISTS Usuarios;

-- Usuarios de todo el juego, asumo que para jugar hay que registrarse
-- y que además es necesario conectarse al servidor para poder jugar.
-- El usuario con id 1 y todo NULL es especial, es el usuario comodin
-- por así decirlo.
-- Invidente es un booleano por si se pudiera poner el juego en el modo
-- narrador directamente o algo así. Aunque es posible que a las personas
-- ciegas no les guste rellenar el formulario de registro diciendo
-- que son ciegos.
-- La contraseña se guardará hasheada y depende del algoritmo serán siempre
-- o 32 bits o 64 bits.
CREATE TABLE Usuarios(
	id int AUTO_INCREMENT,
	username varchar(15) NOT NULL,
	email varchar(50) NOT NULL,
	pass varchar(32) NOT NULL,
	invidente tinyint(1) NOT NULL,

	PRIMARY KEY (id, username)
);

INSERT INTO Usuarios(username, email, pass, invidente)
VALUES ("NULL", "NULL@NULL.NULL", "NULL", 1);


-- Partidas que se crean. Aquí es donde se usa el usuario comodín porque
-- si juegas individual el usuario 2 no puede referenciarse a "nada" ya
-- que es una clave foránea así que esto es lo que se me ha ocurrido. Por
-- defecto el usuario2 es 1 a no ser que se especifique algo.
CREATE TABLE Partidas(
	id int AUTO_INCREMENT,
	usuario1 int NOT NULL,
	usuario2 int DEFAULT 1,
	sala int NOT NULL,

	PRIMARY KEY (id),
	FOREIGN KEY (usuario1) REFERENCES Usuarios(id),
	FOREIGN KEY (usuario2) REFERENCES Usuarios(id)
);


-- Tabla con los objetos de las salas. Información básica.
CREATE TABLE Objetos(
	id int AUTO_INCREMENT,
	nombre varchar(20),
	descripción text,
	sala int,

	PRIMARY KEY (id)
);


-- Tabla donde se almacena la información de las partidas. Como hay
-- que almacenar el estado de cada objeto de la sala he pensado en una
-- codificación del estilo 1=No cogido (es decir sigue oculto en la sala),
-- 2=En las manos del jugador (es decir lo ha encontrado y cogido pero
-- no ha hecho nada con el aun, sigue en su inventario), 3=Usado/consumido
-- (esto seria si ya lo has usado para desbloquear algo y entraria también)
-- si se lo has pasado a tu compañero de la otra sala. No esta ni en tu sala
-- ni en tu inventario).
-- Se almacenaría una fila por cada partida-usuario-objeto. Creo que es la
-- mejor forma porque no podemos saber de antemano cuántos objetos habrá.
CREATE TABLE Estado_Partida(
	id_partida int,
	id_usuario int,
	id_objeto int,
	estado_objeto int,

	PRIMARY KEY (id_partida, id_usuario),
	FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
	FOREIGN KEY (id_objeto) REFERENCES Objetos(id)
);


-- Tabla con los mensajes, muy simple emisor, receptor y texto.
CREATE TABLE Mensajes(
	id int AUTO_INCREMENT,
	id_emisor int,
	id_receptor int,
	texto text,

	PRIMARY KEY (id),
	FOREIGN KEY (id_emisor) REFERENCES Usuarios(id),
	FOREIGN KEY (id_receptor) REFERENCES Usuarios(id)
);