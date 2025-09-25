-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2025 a las 20:17:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project_laravel_tsi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `Rut_Usuario` varchar(10) NOT NULL,
  `Id_Producto` char(2) NOT NULL,
  `Cantidad_Item` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`Rut_Usuario`, `Id_Producto`, `Cantidad_Item`, `created_at`, `updated_at`) VALUES
('999999999', '01', 1, '2025-09-25 19:47:23', '2025-09-25 19:47:23'),
('999999999', '02', 2, '2025-09-25 19:46:55', '2025-09-25 19:56:18'),
('999999999', '03', 1, '2025-09-25 20:12:21', '2025-09-25 20:12:21'),
('999999999', '04', 1, '2025-09-25 20:12:37', '2025-09-25 20:12:37'),
('999999999', '05', 1, '2025-09-25 20:12:26', '2025-09-25 20:12:26'),
('999999999', '06', 1, '2025-09-25 20:12:30', '2025-09-25 20:12:30'),
('999999999', '07', 1, '2025-09-25 20:52:16', '2025-09-25 20:52:16'),
('999999999', '10', 2, '2025-09-25 20:51:40', '2025-09-25 20:52:06'),
('999999999', '11', 1, '2025-09-25 20:51:56', '2025-09-25 20:51:56'),
('999999999', '13', 1, '2025-09-25 21:11:07', '2025-09-25 21:11:07'),
('999999999', '14', 1, '2025-09-25 21:10:58', '2025-09-25 21:10:58'),
('999999999', '17', 1, '2025-09-25 21:11:17', '2025-09-25 21:11:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Id_Categoria` char(2) NOT NULL,
  `Nombre_Categoria` varchar(30) NOT NULL,
  `Estado_Categoria` char(1) NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Id_Categoria`, `Nombre_Categoria`, `Estado_Categoria`, `created_at`, `updated_at`) VALUES
('01', 'Ropa', 'A', NULL, NULL),
('02', 'Amigurumis', 'A', NULL, NULL),
('03', 'Fiesta', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_21_231916_create__usuario_table', 1),
(5, '2025_09_24_215959_create_categorias_table', 1),
(6, '2025_09_24_222145_create_productos_table', 1),
(7, '2025_09_24_224628_create_carritos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_Producto` char(2) NOT NULL,
  `Nombre_Producto` varchar(30) NOT NULL,
  `Precio_Producto` double NOT NULL,
  `Id_Categoria` char(2) NOT NULL,
  `Descripcion_Producto` varchar(60) DEFAULT NULL,
  `Estado_Producto` char(1) NOT NULL DEFAULT 'A',
  `Stock_Real` int(11) NOT NULL DEFAULT 0,
  `Stock_Minimo` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_Producto`, `Nombre_Producto`, `Precio_Producto`, `Id_Categoria`, `Descripcion_Producto`, `Estado_Producto`, `Stock_Real`, `Stock_Minimo`, `created_at`, `updated_at`) VALUES
('01', 'Amigurumi del reino Fungi', 13990, '02', 'Amigurumi del reino Fungi tejido a mano', 'A', 10, 2, NULL, NULL),
('02', 'Amigurumi de Flippy', 12990, '02', 'Amigurumi inspirados en la mascota de golosinas \"Flippy\"', 'A', 20, 2, NULL, NULL),
('03', 'Amigurumi de Baby Groot', 12990, '02', 'Amigurumi de Guardianes de la Galaxia.', 'A', 20, 2, NULL, NULL),
('04', 'Amigurumi de Fiu', 12990, '02', 'Amigurumi Juegos Panamericanos 2023', 'A', 20, 2, NULL, NULL),
('05', 'Amigurumi de Capuccino Asesino', 12990, '02', 'Amigurumi de los personajes IA de brainrot Italiano.', 'A', 20, 2, NULL, NULL),
('06', 'Amigurumi de Tralalero Tralala', 12990, '02', 'Amigurumi de los personajes IA de brainrot Italiano.', 'A', 20, 2, NULL, NULL),
('07', 'Sueter de Lana tonalidades', 19900, '01', 'Sueter tejido a mano, ideal para el invierno.', 'A', 20, 1, NULL, NULL),
('08', 'Sueter de Lana cian rojo', 19900, '01', 'Sueter tejido a mano, ideal para el invierno.', 'A', 20, 1, NULL, NULL),
('09', 'Sueter de Lana tonalidades roj', 19900, '01', 'Sueter tejido a mano, ideal para el invierno.', 'A', 20, 2, NULL, NULL),
('10', 'Gorro de Lana', 9900, '01', 'Gorro tejido a mano, ideal para el invierno.', 'A', 20, 2, NULL, NULL),
('11', 'Llaveros de Lana', 4990, '01', 'Llaveros tejidos a mano, perfectos para regalar.', 'A', 20, 2, NULL, NULL),
('12', 'Mantel de Lana', 13990, '01', 'Mantel tejido a mano, ideal para decorar tu hogar.', 'A', 20, 2, NULL, NULL),
('13', 'Fiestas de Cumpleaños', 23990, '03', 'Regalo sorpresa y fiesta de cumpleaños.', 'A', 20, 2, NULL, NULL),
('14', 'Fiestas Sorpresa para jóvenes', 12990, '03', 'especializada para amantes de videojuegos.', 'A', 20, 2, NULL, NULL),
('15', 'Fiestas de deportes', 12990, '03', 'Temática de deportes y del peluche Capibara.', 'A', 20, 2, NULL, NULL),
('16', 'Regalo sorpresa de animalitos', 12990, '03', 'Temática de animales exóticos.', 'A', 20, 2, NULL, NULL),
('17', 'Temática de dinosaurios', 12990, '03', 'Fiestas con temática de dinosaurios y regalos sorpresa.', 'A', 20, 2, NULL, NULL),
('18', 'Temática de unicornios', 12990, '03', 'Temática de unicornios y regalos sorpresa.', 'A', 20, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9aZN0J4N5UFfH31tys3qekSSiIJsg5TTIaaWeN64', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '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', 1758823999),
('Ci8cGQSKtDMWgx0KkGeT0wyLe1cF3f2XRbGnJLqh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEpsazJoUDVBV0Zaa2V1VGROUmRHeTNpQWF4VEJORDZKNGlkVGJHVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758815545);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_usuarios`
--

CREATE TABLE `_usuarios` (
  `Rut_Usuario` varchar(10) NOT NULL,
  `Nombre_Usuario` varchar(30) NOT NULL,
  `Apellido_Usuario` varchar(30) NOT NULL,
  `Dirección_Usuario` varchar(30) NOT NULL,
  `Correo_Usuario` varchar(30) NOT NULL,
  `Teléfono_Usuario` varchar(12) NOT NULL,
  `Pass_Usuario` varchar(255) NOT NULL,
  `Tipo_Usuario` char(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `_usuarios`
--

INSERT INTO `_usuarios` (`Rut_Usuario`, `Nombre_Usuario`, `Apellido_Usuario`, `Dirección_Usuario`, `Correo_Usuario`, `Teléfono_Usuario`, `Pass_Usuario`, `Tipo_Usuario`, `created_at`, `updated_at`) VALUES
('999999999', 'bryan', 'alvarado', 'Quilpue123', 'ejemplo@gmail.com', '+56977777777', '$2y$12$Z2vtDal/EkURx4kwxbmm4elDmYjKPrj10EjaORqGG7Zl2q2XTFEaC', 'U', '2025-09-25 04:33:19', '2025-09-25 04:33:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`Rut_Usuario`,`Id_Producto`),
  ADD KEY `carritos_id_producto_foreign` (`Id_Producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `productos_id_categoria_foreign` (`Id_Categoria`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `_usuarios`
--
ALTER TABLE `_usuarios`
  ADD PRIMARY KEY (`Rut_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_id_producto_foreign` FOREIGN KEY (`Id_Producto`) REFERENCES `productos` (`Id_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carritos_rut_usuario_foreign` FOREIGN KEY (`Rut_Usuario`) REFERENCES `_usuarios` (`Rut_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_id_categoria_foreign` FOREIGN KEY (`Id_Categoria`) REFERENCES `categorias` (`Id_Categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
