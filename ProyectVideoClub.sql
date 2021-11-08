-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2021 a las 19:18:43
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ProyectVideoClub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Bill`
--

CREATE TABLE `Bill` (
  `idBill` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Bill`
--

INSERT INTO `Bill` (`idBill`, `idUser`, `total`) VALUES
(1, 3, '2'),
(2, 3, '4'),
(3, 3, '1'),
(4, 3, '2'),
(5, 3, '1'),
(6, 3, '1'),
(7, 3, '1'),
(8, 3, '1'),
(9, 3, '1'),
(10, 3, '1'),
(11, 3, '1'),
(12, 3, '11'),
(13, 3, '11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Category`
--

CREATE TABLE `Category` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LineSale`
--

CREATE TABLE `LineSale` (
  `idLineSale` int(11) NOT NULL,
  `idBill` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `linePrice` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `LineSale`
--

INSERT INTO `LineSale` (`idLineSale`, `idBill`, `idProduct`, `quantity`, `linePrice`) VALUES
(1, 1, 11, 1, '2'),
(1, 2, 11, 1, '2'),
(1, 3, 11, 1, '1'),
(1, 4, 11, 1, '1'),
(1, 5, 11, 1, '1'),
(1, 6, 11, 1, '1'),
(1, 7, 11, 1, '1'),
(1, 8, 11, 1, '1'),
(1, 11, 11, 1, '1'),
(1, 12, 11, 1, '11'),
(1, 13, 11, 1, '11'),
(2, 2, 12, 1, '2'),
(2, 4, 12, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surnames` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `User`
--

INSERT INTO `User` (`idUser`, `username`, `pass`, `name`, `surnames`, `email`) VALUES
(2, 'cairex', 'd', 'd', 'd', 'd'),
(3, 'ADCairex', '123', 'Angel', 'Martinez', 'Calle');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Bill`
--
ALTER TABLE `Bill`
  ADD PRIMARY KEY (`idBill`),
  ADD KEY `Bill_fk0` (`idUser`);

--
-- Indices de la tabla `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indices de la tabla `LineSale`
--
ALTER TABLE `LineSale`
  ADD PRIMARY KEY (`idLineSale`,`idBill`) USING BTREE,
  ADD KEY `LineSale_fk0` (`idBill`),
  ADD KEY `LineSale_fk1` (`idProduct`);

--
-- Indices de la tabla `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Bill`
--
ALTER TABLE `Bill`
  MODIFY `idBill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `Category`
--
ALTER TABLE `Category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Bill`
--
ALTER TABLE `Bill`
  ADD CONSTRAINT `Bill_fk0` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`);

--
-- Filtros para la tabla `LineSale`
--
ALTER TABLE `LineSale`
  ADD CONSTRAINT `LineSale_fk0` FOREIGN KEY (`idBill`) REFERENCES `Bill` (`idBill`),
  ADD CONSTRAINT `LineSale_fk1` FOREIGN KEY (`idProduct`) REFERENCES `Product` (`idProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
