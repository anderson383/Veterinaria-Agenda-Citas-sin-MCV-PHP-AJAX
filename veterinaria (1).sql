-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2019 a las 02:06:34
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idEspecia` int(11) NOT NULL,
  `nombreEspecie` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`idEspecia`, `nombreEspecie`) VALUES
(1, 'canino'),
(2, 'felino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idMascota` int(11) NOT NULL,
  `nombreMascota` varchar(60) NOT NULL,
  `colorMascota` varchar(60) NOT NULL,
  `razaMascota` varchar(60) NOT NULL,
  `idEspecie` int(11) NOT NULL,
  `fechaAgenda` date NOT NULL,
  `idPropietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idMascota`, `nombreMascota`, `colorMascota`, `razaMascota`, `idEspecie`, `fechaAgenda`, `idPropietario`) VALUES
(9, 'Tony', 'Blanco con negro', 'Frespuder', 1, '2019-10-23', 25),
(10, 'Lucas', 'Gris', 'Snauser', 1, '2019-10-24', 40),
(11, 'Negra', 'Negra', 'Chiguagua', 1, '2019-10-25', 43),
(13, 'Esskeetit', 'Blanco', 'Labrador GUCCI', 1, '2019-10-24', 44),
(14, 'Tony', 'Gris con blanco', 'Programador', 1, '2019-10-24', 45),
(15, 'Hola mundo', 'Negro', 'skere', 2, '2019-10-26', 45),
(17, 'donal', 'red', 'siveriano', 1, '2019-10-31', 49),
(18, 'Skere', 'negro', 'chau', 1, '2019-11-10', 45),
(19, 'hola mundo', 'KKK', 'SKERE', 1, '2019-11-17', 45),
(20, 'Gordo', 'Negro', 'Golden', 1, '2019-11-09', 45),
(21, 'Body', 'Blanco', 'Criollo', 1, '2019-11-23', 50),
(22, 'Tony', 'Blanco', 'Frespuder', 1, '2019-11-24', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `cedulaPersona` int(30) NOT NULL,
  `nombrePersona` varchar(60) NOT NULL,
  `passwordPersona` varchar(60) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `cedulaPersona`, `nombrePersona`, `passwordPersona`, `idUsuario`) VALUES
(8, 1004148622, 'Anderson', '$2y$12$m158V09rB9FwK7VGPkRh4OZII3H5jOkB.ReVrhDGRmLvHTU0vTKjW', 1),
(12, 123456789, 'Anderson Vargas ADMIN', '$2y$12$LJDb1x.2YOmqTqD0rEu1/eZQ691iuWUvG9ENeJ4gWlHyvkJjZAJzm', 1),
(14, 753159, 'Camila', '$2y$12$.CGKE1TbyE5Pv2PeYRQmXu0CYUcXZBweP3/OnF4q.KGbrFls/Vdna', 2),
(16, 147852, 'Camila2', '$2y$12$mOLRdp8g7291lzKNLJ2zBeI86uD638gX1WrxD/G1So7li1wNTV/76', 2),
(17, 321, 'asdadsasd', '$2y$12$9DvQhZDOBJ8ZKxhFZzprD.Twa/6y60OlIYD/5Eo3YlHq4YZWPZAMG', 2),
(22, 2342423, 'asdasd', '$2y$12$OfzOKdc3NJ07/9TTNAlRgu2QRlvjI.qJE6Ez2dXYoCtf3/p4VdmZ2', 2),
(23, 7686833, 'Juan', '$2y$12$YCqYTzBYf4ycxbXUw9qKfOCVOm.z/ELbc2jqcuwfYE5.nP3DisEx.', 2),
(25, 100414862, 'Anderson', '$2y$12$Z9oYK7dgzytdVW4pI8aMa.uNUIL2syhCa3epqSupAI0OqMlAS1p1i', 2),
(31, 2147483647, 'Anderson', '$2y$12$Cp18ZV3EjiK5z/at4CuPTeQnEvmIGvxd3g2sbBcE7ZC6rFLo8IJG6', 2),
(36, 1000, 'anderson', '$2y$12$eoY3dLvKhSlCOurUIJcIYemhx7PIDVK1qG.qHFvjKkTrmzdiNGvmy', 2),
(38, 76868333, 'Anderson Vargas Sepveda', '$2y$12$fSyJVkeKpyRUeQKvBJSfI.dJAL0oxgPOBYy.fy6HJ3LkcZh/tYXim', 2),
(39, 963852, 'Cristian Fabian', '$2y$12$FjgiBWoezq9uUOqUWNkqc.lVMA.bGc5uEIyxI0GBBp5JPGn/gY2Ea', 2),
(40, 1003951154, 'miguel', '$2y$12$WggeJs0lXfY5O1XGb0CgROYmLW1fo.E7hFFTXoDm/L3k7rP3IH436', 2),
(41, 100304959, 'yessica', '$2y$12$OgUzbVdr9DfnHmsgUJlqBuAh42JuQV6x/WaB.bNhTnR5zNz53vgbC', 2),
(42, 1003814945, 'alejandra', '$2y$12$7uxL.huIXSxj2ACmwTY3puNv8QWBIUp4ETuq.Sq9Q8dCEHiB1lWyi', 2),
(43, 1075310420, 'STIVEN', '$2y$12$/CQRQVw0FX.do2.aMXRKvu89O03v0zK5W4MtzXsVx5U6JmnXeRpum', 2),
(44, 54321, 'Anderson Sepulveda CLIENTE', '$2y$12$leptf2hwoKDovE9ng048HeweOR9nPJrlJ0drL2wVZpReiLJdTI6/m', 2),
(45, 741852, 'AndersonDos', '$2y$12$VLn09OMyuvDPOHNeWCqPc.L7DMAMuP1dzKkEj4GhY9svUeQp81FWC', 2),
(47, 76868332, 'Andrea', '$2y$12$Bpsim2om2aOsywS0.YxJmuHFFumZabOBgniAG4g9ZgG2qybctsHsW', 2),
(48, 1234, 'juanitoxd', '$2y$12$NtBc0FDvcB98kUNhnDgWReXOZm.AdUjOLIvpHG5G7Bh5oyt9lcFFK', 2),
(49, 1121928454, 'carlos', '$2y$12$/9jYp8e0yFL.P4SSQCPuAeWkoKw9ECJ3xJTHPhDMG.E2mAc3c2SAK', 2),
(50, 951, 'amilkar21', '$2y$12$RQ2D2EwkaVtjuqw.kMkHeuKsMlRYz/V6Qsd7Wd6KcBjayp5a/kkfu', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idEspecia`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idMascota`),
  ADD KEY `idPropietario` (`idPropietario`),
  ADD KEY `idEspecie` (`idEspecie`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `cedulaPersona` (`cedulaPersona`) USING BTREE,
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idEspecia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`idPropietario`) REFERENCES `persona` (`idPersona`),
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecia`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
