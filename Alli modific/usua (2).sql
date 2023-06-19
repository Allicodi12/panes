-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 14-06-2023 a las 07:04:07
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `respaldo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usua`
--

CREATE TABLE `usua` (
  `id` int(255) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usua`
--

INSERT INTO `usua` (`id`, `nombre_usuario`, `contrasena`) VALUES
(2, 'A', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Causa', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, 'Caleb', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(5, 'Ana', 'cfcd208495d565ef66e7dff9f98764da'),
(6, 'Diana', '$2y$10$iZqQuf3Y6tKuD6WRy7XiducYwyalXgWDKzcDKhOLsFg8NKiLvzXM.'),
(10, 'Dianita', '202cb962ac59075b964b07152d234b70'),
(12, 'Alli', 'c4ca4238a0b923820dcc509a6f75849b'),
(14, 'Nuevo', 'c20ad4d76fe97759aa27a0c99bff6710'),
(1232, '12', 'c20ad4d76fe97759aa27a0c99bff6710'),
(12343, 'fff', '633de4b0c14ca52ea2432a3c8a5c4c31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usua`
--
ALTER TABLE `usua`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
