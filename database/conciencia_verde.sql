-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2025 a las 21:36:40
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
-- Base de datos: `conciencia_verde`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `numero`, `cedula`, `nombre`, `apellido`, `correo`, `celular`, `genero`, `created_at`, `updated_at`) VALUES
(1, 1, '0302522685', 'Johanna', 'Merchan', 'merchanjohanna.16@gmail.com', '0967284372', 'femenino', '2025-07-15 07:15:31', '2025-07-15 07:15:31'),
(2, 2, '020351689', 'Jenny', 'Jimenez', 'jnjimenez@gmail.com', '0962244552', 'femenino', '2025-07-18 01:06:38', '2025-07-18 01:06:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_evento` date NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `auspiciante1` varchar(100) DEFAULT NULL,
  `auspiciante2` varchar(100) DEFAULT NULL,
  `auspiciante3` varchar(100) DEFAULT NULL,
  `auspiciante4` varchar(100) DEFAULT NULL,
  `auspiciante5` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `numero`, `nombre`, `fecha_evento`, `duracion`, `auspiciante1`, `auspiciante2`, `auspiciante3`, `auspiciante4`, `auspiciante5`, `created_at`, `updated_at`) VALUES
(1, 1, 'Reciclaje', '2025-06-30', '30 dias', '1', '2', '3', '4', '5', '2025-07-15 07:14:11', '2025-07-15 07:14:11'),
(2, 2, 'Siembra', '2025-07-26', '3 DIAS', '3', '4', '5', '6', '7', '2025-07-19 17:56:17', '2025-07-19 17:56:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_07_15_055550_create_roles_table', 1),
(2, '2025_07_15_055712_create_tipo_usuarios_table', 1),
(3, '2025_07_15_055728_create_usuarios_table', 1),
(4, '2025_07_15_055738_create_tipo_eventos_table', 1),
(5, '2025_07_15_055752_create_estudiantes_table', 1),
(6, '2025_07_15_055801_create_eventos_table', 1),
(7, '2025_07_15_055811_create_seccion_table', 1),
(8, '2025_07_15_055825_create_sessions_table', 1),
(9, '2025_07_15_055836_create_registros_table', 1),
(10, '2025_07_16_150649_create_seccion_table', 2),
(11, '2025_07_16_151918_create_seccion_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_evento` int(11) NOT NULL,
  `codigo_estudiante` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `ciclo` varchar(50) NOT NULL,
  `jornada_evento` varchar(50) NOT NULL,
  `area_asignada` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `numero`, `codigo_usuario`, `codigo_evento`, `codigo_estudiante`, `fecha_registro`, `carrera`, `ciclo`, `jornada_evento`, `area_asignada`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, 1, '2025-07-20', 'web', '5', 'nocturna', 'patio central', '2025-07-19 17:47:16', '2025-07-19 17:47:16'),
(5, 1, 1, 2, 2, '2025-07-23', 'WEB', '5', 'NOCTURNA', 'PATIO PRINCIPAL', '2025-07-19 17:57:04', '2025-07-19 17:57:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `numero`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Coordinador', '2025-07-15 06:33:01', '2025-07-15 06:33:01'),
(2, 2, 'Seccion', NULL, NULL),
(3, 3, 'Administrador', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id`, `usuario`, `password`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'ConCienciaVerde', '$2y$12$LuqZqeDHOZw0bJn8rCsXVOEwgDtZ0RuplB2rNsYEi8o3JaZK1UEVq', 1, NULL, '2025-07-17 04:27:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ImR2ODAbbCkcoeMu248YEGlbeiyeaL2KZl3j9agj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidHREem9nVGpyZlN0aFhiSWF3cU1WakdEeXc5bzBqRlY2d0U4ZjdJRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9jb25jaWVuY2lhX3ZlcmRlaXN0bHQudGVzdC9zZWNjaW9uZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEwOiJzZWNjaW9uX2lkIjtpOjE7fQ==', 1752687507);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_eventos`
--

CREATE TABLE `tipo_eventos` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_eventos`
--

INSERT INTO `tipo_eventos` (`id`, `numero`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'reciclaje', '2025-07-15 07:14:29', '2025-07-15 07:14:29'),
(2, 2, 'Siembras', '2025-07-17 04:34:48', '2025-07-17 04:34:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id`, `numero`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrador', '2025-07-15 07:03:44', '2025-07-15 07:03:44'),
(2, 2, 'Coordinador', '2025-07-17 04:31:48', '2025-07-17 04:31:48'),
(3, 3, 'Estudiante', '2025-07-17 04:32:15', '2025-07-17 04:32:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `genero` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `numero`, `cedula`, `nombre`, `apellido`, `correo`, `celular`, `genero`, `role_id`, `tipo_usuario_id`, `created_at`, `updated_at`) VALUES
(1, 1, '0302522685', 'Cecilia ', 'Naula', 'cecinaula.23@gmail.com', '0962455225', 'Femenino', 1, 1, '2025-07-15 07:13:18', '2025-07-15 07:13:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_estudiante` (`codigo_estudiante`),
  ADD KEY `codigo_evento` (`codigo_evento`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `last_activity` (`last_activity`);

--
-- Indices de la tabla `tipo_eventos`
--
ALTER TABLE `tipo_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `tipo_usuario_id` (`tipo_usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_eventos`
--
ALTER TABLE `tipo_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`codigo_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`codigo_evento`) REFERENCES `tipo_eventos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_ibfk_3` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
