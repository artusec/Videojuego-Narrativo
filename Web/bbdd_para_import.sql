-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2020 a las 19:08:35
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videojuego_narrativo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_played` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objects`
--

CREATE TABLE `objects` (
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `real_name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `objects`
--

INSERT INTO `objects` (`name`, `real_name`, `description`) VALUES
('Carpeta2', 'Carpeta chamuscada', 'Esta carpeta tiene documentos médicos dentro, aunque algunas partes son ilegibles.'),
('Ganzua1', 'Ganzúa', 'Un objeto alargado y curvo en la punta. En buenas manos podría abrir una cerradura endeble.'),
('JuegoSimon3', 'Juego Simón', 'Un juego electrónico Simón. Parece funcionar.'),
('LlaveOxidada1', 'Llave oxidada', 'Una llave cubierta de óxido y de aspecto frágil.'),
('LlavePequeña2', 'Llave pequeña', 'Una llave metálica de pequeño tamaño. Parece abrir algún tipo de mueble.'),
('Peluche3', 'Osito de peluche', 'Este peluche ha pasado días mejores, está manchado de hollín. En la etiqueta pone: De papá, feliz cumpleaños.'),
('Pomo2', 'Pomo', 'Un pomo redondo normal y corriente. Está en perfectas condiciones.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `minijuego` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `times` int(11) NOT NULL,
  `score` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `puntuaciones`
--

INSERT INTO `puntuaciones` (`minijuego`, `times`, `score`) VALUES
('formas', 0, 0),
('ganzua', 0, 0),
('puntos', 0, 0),
('simon', 0, 0),
('voces', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_game`
--

CREATE TABLE `state_game` (
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `object` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `state_object` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `timed` float DEFAULT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_pun`
--

CREATE TABLE `user_pun` (
  `user` int(11) NOT NULL,
  `minijuego` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indices de la tabla `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`minijuego`);

--
-- Indices de la tabla `state_game`
--
ALTER TABLE `state_game`
  ADD PRIMARY KEY (`id_game`,`id_user`,`object`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `object` (`object`);

--
-- Indices de la tabla `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`,`id_user`,`id_game`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indices de la tabla `user_pun`
--
ALTER TABLE `user_pun`
  ADD PRIMARY KEY (`user`,`minijuego`),
  ADD KEY `user_pum_ibfk_2` (`minijuego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `state_game`
--
ALTER TABLE `state_game`
  ADD CONSTRAINT `state_game_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `state_game_ibfk_3` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`);

--
-- Filtros para la tabla `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `user_pun`
--
ALTER TABLE `user_pun`
  ADD CONSTRAINT `user_pum_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_pum_ibfk_2` FOREIGN KEY (`minijuego`) REFERENCES `puntuaciones` (`minijuego`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
