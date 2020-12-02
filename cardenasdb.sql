-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 22:09:01
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cardenasdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `belt`
--

CREATE TABLE `belt` (
  `belt_id` int(11) NOT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `belt`
--

INSERT INTO `belt` (`belt_id`, `color`) VALUES
(1, 'Blanca'),
(2, 'Amarilla'),
(3, 'Naranja'),
(4, 'Verde'),
(5, 'Azul'),
(6, 'Morada'),
(7, 'Café'),
(8, 'Roja'),
(9, 'Roja Avanzada'),
(10, 'Negra'),
(11, 'Negra Primer Dragón'),
(12, 'Negra Segundo Dragón'),
(13, 'Negra Tercer Dragón'),
(14, 'Negra Cuarto Dragón'),
(15, 'Negra Quinto Dragón'),
(16, 'Negra Sexto Dragón'),
(17, 'Negra Séptimo Dragón'),
(18, 'Negra Octavo Dragón'),
(19, 'Negra Noveno Dragón'),
(20, 'Negra Décimo Dragón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fight`
--

CREATE TABLE `fight` (
  `fight_id` int(11) NOT NULL,
  `tournament_id2` int(11) DEFAULT NULL,
  `pupil_id2` int(11) DEFAULT NULL,
  `pupil_id3` int(11) DEFAULT NULL,
  `winner` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fighter`
--

CREATE TABLE `fighter` (
  `tournament_id1` int(11) DEFAULT NULL,
  `pupil_id1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gym`
--

CREATE TABLE `gym` (
  `gym_code` int(11) NOT NULL,
  `gym_name` varchar(25) DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gym`
--

INSERT INTO `gym` (`gym_code`, `gym_name`, `adress`) VALUES
(1, 'Desconocido', 'Sin Locación'),
(2, 'Corps Gimnasio', 'Popolna 81, Pedregal de San Nicolás, Tlalpan, 14100, Ciudad de México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `reg_code` varchar(10) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone_num` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `belt_id1` int(11) DEFAULT NULL,
  `gym_code1` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`reg_code`, `first_name`, `last_name`, `birthdate`, `phone_num`, `email`, `belt_id1`, `gym_code1`) VALUES
('FVG-230198', 'Fernando', 'Vega', '1998-01-23', '5523966184', 'fervega.ipn@gmail.com', 10, 1),
('JCM-040819', 'Juan Carlos', 'Noguez Hernández', '1980-08-14', '5540493682', 'JuanCN@gmail.com', 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logininfo`
--

CREATE TABLE `logininfo` (
  `user_code` varchar(10) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `status_user` bit(1) DEFAULT NULL,
  `type_user` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logininfo`
--

INSERT INTO `logininfo` (`user_code`, `pass`, `status_user`, `type_user`) VALUES
('JCM-040819', 'passprof', b'1', b'0'),
('JIC-678302', 'admin', b'1', b'1'),
('FVG-230198', 'ruFv8PZIEL201VX', b'1', b'0'),
('IRZ-670198', 'NTysdMCU8ITgS3', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manager`
--

CREATE TABLE `manager` (
  `reg_code` varchar(10) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone_num` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `belt_id3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `manager`
--

INSERT INTO `manager` (`reg_code`, `first_name`, `last_name`, `birthdate`, `phone_num`, `email`, `occupation`, `belt_id3`) VALUES
('IRZ-670198', 'Irsa', 'Zamora', '1998-10-21', '5612184221', 'nandosroom@outlook.com', NULL, 10),
('JIC-678302', 'Juan Ivan', 'Cárdenas G.', '1988-07-23', '5566778899', 'example2@gmail.com', 'Director Técnico', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pupil`
--

CREATE TABLE `pupil` (
  `pupil_id` int(11) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone_num` varchar(10) DEFAULT NULL,
  `emergency_phone` varchar(10) DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `blood_type` varchar(15) DEFAULT NULL,
  `picture` blob DEFAULT NULL,
  `status_p` bit(1) DEFAULT b'0',
  `belt_id2` int(11) DEFAULT NULL,
  `gym_code2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tournament`
--

CREATE TABLE `tournament` (
  `tournament_id` int(11) NOT NULL,
  `name_t` varchar(25) DEFAULT NULL,
  `type_t` varchar(15) DEFAULT NULL,
  `location_t` text DEFAULT NULL,
  `date_t` date DEFAULT NULL,
  `time_t` time DEFAULT NULL,
  `picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `belt`
--
ALTER TABLE `belt`
  ADD PRIMARY KEY (`belt_id`);

--
-- Indices de la tabla `fight`
--
ALTER TABLE `fight`
  ADD PRIMARY KEY (`fight_id`),
  ADD KEY `fk_t2` (`tournament_id2`),
  ADD KEY `fk_p2` (`pupil_id2`),
  ADD KEY `fk_p3` (`pupil_id3`);

--
-- Indices de la tabla `fighter`
--
ALTER TABLE `fighter`
  ADD KEY `fk_t1` (`tournament_id1`),
  ADD KEY `fk_p1` (`pupil_id1`);

--
-- Indices de la tabla `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`gym_code`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`reg_code`),
  ADD KEY `fk_b1` (`belt_id1`),
  ADD KEY `fk_gc1` (`gym_code1`);

--
-- Indices de la tabla `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`reg_code`),
  ADD KEY `fk_b3` (`belt_id3`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indices de la tabla `pupil`
--
ALTER TABLE `pupil`
  ADD PRIMARY KEY (`pupil_id`),
  ADD KEY `fk_b2` (`belt_id2`),
  ADD KEY `fk_gc2` (`gym_code2`);

--
-- Indices de la tabla `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`tournament_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `belt`
--
ALTER TABLE `belt`
  MODIFY `belt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `fight`
--
ALTER TABLE `fight`
  MODIFY `fight_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gym`
--
ALTER TABLE `gym`
  MODIFY `gym_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pupil`
--
ALTER TABLE `pupil`
  MODIFY `pupil_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tournament`
--
ALTER TABLE `tournament`
  MODIFY `tournament_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fight`
--
ALTER TABLE `fight`
  ADD CONSTRAINT `fk_p2` FOREIGN KEY (`pupil_id2`) REFERENCES `pupil` (`pupil_id`),
  ADD CONSTRAINT `fk_p3` FOREIGN KEY (`pupil_id3`) REFERENCES `pupil` (`pupil_id`),
  ADD CONSTRAINT `fk_t2` FOREIGN KEY (`tournament_id2`) REFERENCES `tournament` (`tournament_id`);

--
-- Filtros para la tabla `fighter`
--
ALTER TABLE `fighter`
  ADD CONSTRAINT `fk_p1` FOREIGN KEY (`pupil_id1`) REFERENCES `pupil` (`pupil_id`),
  ADD CONSTRAINT `fk_t1` FOREIGN KEY (`tournament_id1`) REFERENCES `tournament` (`tournament_id`);

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk_b1` FOREIGN KEY (`belt_id1`) REFERENCES `belt` (`belt_id`),
  ADD CONSTRAINT `fk_gc1` FOREIGN KEY (`gym_code1`) REFERENCES `gym` (`gym_code`);

--
-- Filtros para la tabla `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `fk_b3` FOREIGN KEY (`belt_id3`) REFERENCES `belt` (`belt_id`);

--
-- Filtros para la tabla `pupil`
--
ALTER TABLE `pupil`
  ADD CONSTRAINT `fk_b2` FOREIGN KEY (`belt_id2`) REFERENCES `belt` (`belt_id`),
  ADD CONSTRAINT `fk_gc2` FOREIGN KEY (`gym_code2`) REFERENCES `gym` (`gym_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
