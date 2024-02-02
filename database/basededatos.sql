-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2022 a las 04:15:43
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdabarrotes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--
drop database if exists bdabarrotes;
create database bdabarrotes;
use bdabarrotes;


CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `descripcion`, `estado`) VALUES
(1, 'Làcteos', 1),
(2, 'Bebidas', 1),
(3, 'Cereales', 1),
(4, 'Galletas', 1),
(5, 'Productos Enlatados', 1),
(6, 'Productos Limpieza.', 1),
(7, 'Higiene Personal', 1),
(8, 'Uso Domestico', 1),
(9, 'Harinas - Pan', 1),
(10, 'Menestras', 1),
(11, 'Snacks y Piqueos', 1),
(19, 'Detergente1', 1),
(20, 'Aceites', 1),
(21, 'Mantequillas', 1),
(22, 'Arroz', 1),
(23, 'Uaju', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `dni`, `nombres`, `apellidos`, `direccion`, `telefono`, `estado`) VALUES
(1, '75714859', 'Maria Juana', 'Sanchez Perez', 'El Bosque 596', '948744125', 1),
(2, '47859632', 'Mauricio Miguel', 'Salvatierra Gomez', 'La encalada', '948562310', 1),
(3, '18095288', 'Luis Lopez', 'Alcantara Ramos', '29 de Agosto 1609', '933274308', 1),
(4, '18592630', 'Carola Roxanna', 'Cepeda Cervantes', 'San Vicente 915', '968440986', 1),
(5, '14895623', 'Joseph Antoni', 'Gomez Rios', 'La Esperanza - 10', '965847201', 1),
(6, '43276927', 'William Giovanni', 'Inga Leon', 'El Bosque- Casuarinas', '959562318', 1),
(7, '41300903', 'Luis Ernesto', 'Quintana Munive', 'Las Quintanas 102', '961845200', 1),
(8, '78592614', 'Maricarmen Julia', 'Gonzales Pinedo', 'El Golf 123', '956231471', 1),
(9, '85121548', 'Jordan Carlos', 'Ramos Paredes', 'Trujillo 567', '916230521', 1),
(10, '71704589', 'Lucia Maria', 'Mendez Lopez', 'Av. Carlos Valderrama 145', '929220015', 1),
(11, '78596310', 'Luis Angel', 'Mendez Romero', 'Los Laureles', '919156320', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `stock` float NOT NULL,
  `precio` float NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `descripcion`, `stock`, `precio`, `idcategoria`, `imagen`, `estado`) VALUES
(1, 'Mermelada', 6, 1, 9, '', 0),
(2, 'Escoba', 2, 7, 8, '', 0),
(3, 'Cereales', 2, 52, 8, '', 0),
(4, 'Cereales', 4, 35, 8, '', 0),
(5, 'Poet', 2, 5, 8, '', 0),
(6, 'Poet', 3, 3, 6, 'poet.jpg', 1),
(7, 'Escoba', 6, 100, 8, '', 0),
(8, 'Mermelada', 8, 4, 8, 'mermelada.jpg', 0),
(9, 'Polo De Mujeres', 5, 70, 9, 'ace.jpg', 0),
(10, 'po', 6, 35, 9, 'ace.jpg', 0),
(11, 'uy', 6, 12, 9, 'ace.jpg', 0),
(12, 'Escoba', 1, 5, 9, 'poet.jpg', 0),
(13, 'Bolivar', 2, 5, 6, 'bolivar.jfif', 1),
(14, 'Aceite Primor', 5, 11, 20, 'aceite.jpg', 1),
(15, 'Papel Higienico Suave', 12, 5, 8, 'ph.jpg', 1),
(16, 'Milo', 6, 10, 2, 'milo.jpg', 0),
(17, 'Milo', 6, 10, 2, 'milo.jpg', 0),
(18, 'Milo', 6, 10, 2, 'milo.jpg', 0),
(19, 'Milo', 6, 10, 5, 'milo.jpg', 1),
(20, 'DorinaL', 15, 8, 21, 'mantequilla.jfif', 1),
(21, 'Arroz Caserita', 5, 158, 22, 'arroz.jpg', 1),
(22, 'Yogurt Gloria', 10, 7, 2, 'gloriay.png', 1),
(23, 'Lejia Clorox', 2, 3, 6, 'lejia.jfif', 1),
(24, 'Azucar Rubias', 2, 145, 8, 'azucar.jpg', 1),
(25, 'Cereales', 3, 5, 4, 'mermelada.jpg', 0),
(26, 'Escoba1', 2, 5, 6, 'lejia.jfif', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `tipo_id` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`tipo_id`, `descripcion`) VALUES
(1, 'FACTURA'),
(2, 'BOLETA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$7pVzLEpfQYfpoReDvtHK7OcTcW11tjXiqOeHeiK76Kjk.VolATMC2', NULL, '2022-08-19 21:08:50', '2022-08-19 21:08:50'),
(2, 'Luz Solano', 'luz.solanoq@outlook.com', NULL, '$2y$10$e4SI7PyqdFyiBJMgTqA2UeYbbC.ZOCWFlrQdyJsWVS3ZlX4lVbuim', NULL, '2022-08-23 04:03:46', '2022-08-23 04:03:46'),
(3, 'Ana Garcia', 'agarcia@gmail.com', NULL, '$2y$10$i9sv8yX73yKz4tBjKQxhi.8SEQlbcdU1.BBaACRH1.147hOjDHec2', NULL, '2022-08-23 05:07:07', '2022-08-23 05:07:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `serie_comprobante` varchar(7) NOT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `total_venta` float NOT NULL,
  `subtotal` float NOT NULL,
  `igv` float NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tipo_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `idproducto` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `tipo_id` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`tipo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
