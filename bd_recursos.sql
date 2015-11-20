-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2015 a las 11:38:51
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_recursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE IF NOT EXISTS `recursos` (
`id_recurs` int(11) NOT NULL,
  `nom_recurs` varchar(30) DEFAULT NULL,
  `tipo_recurs` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recurs`, `nom_recurs`, `tipo_recurs`) VALUES
(1, 'Aula de Teoria 1', 1),
(2, 'Aula de Teoria 2', 1),
(3, 'Aula de Teoria 3', 1),
(4, 'Aula de Teoria 4', 1),
(5, 'Aula Informàtica 1', 2),
(6, 'Aula Informàtica 2', 2),
(7, 'Despatxos Entrevistes 1', 3),
(8, 'Despatxos Entrevistes 2', 3),
(9, 'Sala de Reunions', 4),
(10, 'Projector Portàtil', 5),
(11, 'Carro Portàtils', 6),
(12, 'Portàtil 1', 7),
(13, 'Portàtil 2', 7),
(14, 'Portàtil 3', 7),
(15, 'Mòbil 1', 8),
(16, 'Mòbil 2', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
`id_reserva` int(11) NOT NULL,
  `recurs_reservat` int(11) DEFAULT NULL,
  `usuari_reserva` int(11) DEFAULT NULL,
  `dia` varchar(40) NOT NULL,
  `franja_horaria` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recursos`
--

CREATE TABLE IF NOT EXISTS `tipo_recursos` (
`id_tipo_recurs` int(11) NOT NULL,
  `tipo_recurs` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_recursos`
--

INSERT INTO `tipo_recursos` (`id_tipo_recurs`, `tipo_recurs`) VALUES
(1, 'Aula de Teoria'),
(2, 'Aula de Informàtica'),
(3, 'Despatxos Entrevistes'),
(4, 'Sala de Reunions'),
(5, 'Projector Portàtil'),
(6, 'Carro de Portàtils'),
(7, 'Portàtil'),
(8, 'Mòbil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `nom_usuari` varchar(20) DEFAULT NULL,
  `nickname_usuari` varchar(20) DEFAULT NULL,
  `correo_usuari` varchar(40) DEFAULT NULL,
  `password_usuari` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nom_usuari`, `nickname_usuari`, `correo_usuari`, `password_usuari`, `tipo_usuario`) VALUES
(3, 'Fernando Manzano', 'fmanzano', 'nandimanzano@fje.edu', 'qaz123qaz', 'root'),
(10, 'Sergio Jimenez', 'sjimenez', 'sergiojimenez@fje.edu', 'qaz123qaz', 'normal'),
(11, 'Miguel Delgado', 'mdelgado', 'migueldelgado@fje.edu', 'qaz123qaz', 'normal'),
(12, 'Pedro Blanco', 'pblanco', 'pedroblanco@fje.edu', 'qaz123qaz', 'admin'),
(13, 'David Marin', 'dmarin', 'davidmarin@fje.edu', 'qaz123qaz', 'admin'),
(14, 'Ignasi Romero', 'iromero', 'ignasiromero@fje.edu', 'qaz123qaz', 'normal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
 ADD PRIMARY KEY (`id_recurs`), ADD KEY `FK_recursos` (`tipo_recurs`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
 ADD PRIMARY KEY (`id_reserva`), ADD KEY `FK_reservas` (`recurs_reservat`), ADD KEY `FK_reservaUser` (`usuari_reserva`);

--
-- Indices de la tabla `tipo_recursos`
--
ALTER TABLE `tipo_recursos`
 ADD PRIMARY KEY (`id_tipo_recurs`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
MODIFY `id_recurs` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `tipo_recursos`
--
ALTER TABLE `tipo_recursos`
MODIFY `id_tipo_recurs` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
ADD CONSTRAINT `FK_recursos` FOREIGN KEY (`tipo_recurs`) REFERENCES `tipo_recursos` (`id_tipo_recurs`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
ADD CONSTRAINT `FK_reservaUser` FOREIGN KEY (`usuari_reserva`) REFERENCES `usuario` (`id_usuario`),
ADD CONSTRAINT `FK_reservas` FOREIGN KEY (`recurs_reservat`) REFERENCES `recursos` (`id_recurs`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
