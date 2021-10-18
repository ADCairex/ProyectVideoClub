-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2021 a las 01:14:09
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BuyUserProduct`
--

CREATE TABLE `BuyUserProduct` (
  `idBuyUserProduct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Product`
--

CREATE TABLE `Product` (
  `idProduct` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idAuthor` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `routProduct` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ProductCategories`
--

CREATE TABLE `ProductCategories` (
  `idProductCategories` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `User`
--

INSERT INTO `User` (`idUser`, `username`, `pass`, `name`, `surnames`, `addr`) VALUES
(2, 'cairex', 'd', 'd', 'd', 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ViewUserProduct`
--

CREATE TABLE `ViewUserProduct` (
  `idViewUserProduct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `numViews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indices de la tabla `BuyUserProduct`
--
ALTER TABLE `BuyUserProduct`
  ADD PRIMARY KEY (`idBuyUserProduct`),
  ADD KEY `BuyUserProduct_fk0` (`idUser`),
  ADD KEY `BuyUserProduct_fk1` (`idProduct`);

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
-- Indices de la tabla `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`idProduct`);

--
-- Indices de la tabla `ProductCategories`
--
ALTER TABLE `ProductCategories`
  ADD PRIMARY KEY (`idProductCategories`) USING BTREE,
  ADD KEY `ProductCategories_fk0` (`idCategory`),
  ADD KEY `ProductCategories_fk1` (`idProduct`);

--
-- Indices de la tabla `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `ViewUserProduct`
--
ALTER TABLE `ViewUserProduct`
  ADD PRIMARY KEY (`idViewUserProduct`),
  ADD KEY `ViewUserProduct_fk0` (`idUser`),
  ADD KEY `ViewUserProduct_fk1` (`idProduct`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Bill`
--
ALTER TABLE `Bill`
  MODIFY `idBill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `BuyUserProduct`
--
ALTER TABLE `BuyUserProduct`
  MODIFY `idBuyUserProduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Category`
--
ALTER TABLE `Category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Product`
--
ALTER TABLE `Product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ViewUserProduct`
--
ALTER TABLE `ViewUserProduct`
  MODIFY `idViewUserProduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Bill`
--
ALTER TABLE `Bill`
  ADD CONSTRAINT `Bill_fk0` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`);

--
-- Filtros para la tabla `BuyUserProduct`
--
ALTER TABLE `BuyUserProduct`
  ADD CONSTRAINT `BuyUserProduct_fk0` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`),
  ADD CONSTRAINT `BuyUserProduct_fk1` FOREIGN KEY (`idProduct`) REFERENCES `Product` (`idProduct`);

--
-- Filtros para la tabla `LineSale`
--
ALTER TABLE `LineSale`
  ADD CONSTRAINT `LineSale_fk0` FOREIGN KEY (`idBill`) REFERENCES `Bill` (`idBill`),
  ADD CONSTRAINT `LineSale_fk1` FOREIGN KEY (`idProduct`) REFERENCES `Product` (`idProduct`);

--
-- Filtros para la tabla `ProductCategories`
--
ALTER TABLE `ProductCategories`
  ADD CONSTRAINT `ProductCategories_fk0` FOREIGN KEY (`idCategory`) REFERENCES `Category` (`idCategory`),
  ADD CONSTRAINT `ProductCategories_fk1` FOREIGN KEY (`idProduct`) REFERENCES `Product` (`idProduct`);

--
-- Filtros para la tabla `ViewUserProduct`
--
ALTER TABLE `ViewUserProduct`
  ADD CONSTRAINT `ViewUserProduct_fk0` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`),
  ADD CONSTRAINT `ViewUserProduct_fk1` FOREIGN KEY (`idProduct`) REFERENCES `Product` (`idProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
