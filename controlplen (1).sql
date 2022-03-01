-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2022 a las 00:59:09
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlplen`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fncRandom` () RETURNS CHAR(8) CHARSET utf8mb4 BEGIN

DECLARE seed FLOAT;
DECLARE caracter CHAR(1);
DECLARE i INT DEFAULT 0;
DECLARE cadena CHAR(8) DEFAULT '';

WHILE i<8 DO
	SELECT RAND() INTO seed;
	IF seed<0.33333333 THEN SET caracter = CHAR(FLOOR(seed*27)+48);
    ELSEIF seed<0.66666666 THEN SET seed = seed-0.33333333;
    SET caracter = CHAR(FLOOR(seed*75)+65);
	ELSE SET seed = seed-0.66666666;
	SET caracter = CHAR(FLOOR(seed*75)+97);
	END IF;
	SET cadena = CONCAT(cadena, caracter);
    SET i=i+1;
    END WHILE;

RETURN cadena;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `bitacoraId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `bitacoraTarea` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `bitacoraHabito` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `bitacoraDescripcion` varchar(255) DEFAULT NULL,
  `bitacoraFechaEjecucion` int(5) UNSIGNED ZEROFILL NOT NULL,
  `bitacoraEstado` enum('Completado','No completado') DEFAULT NULL,
  `bitacoraFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `calendarId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `day` int(11) NOT NULL,
  `dayName` varchar(9) NOT NULL,
  `month` int(11) NOT NULL,
  `monthName` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `holiday` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`calendarId`, `day`, `dayName`, `month`, `monthName`, `year`, `holiday`) VALUES
(00001, 1, 'sábado', 1, 'enero', 2022, 'año nuevo'),
(00002, 2, 'domingo', 1, 'enero', 2022, NULL),
(00003, 3, 'lunes', 1, 'enero', 2022, NULL),
(00004, 4, 'martes', 1, 'enero', 2022, NULL),
(00005, 5, 'miércoles', 1, 'enero', 2022, NULL),
(00006, 6, 'jueves', 1, 'enero', 2022, NULL),
(00007, 7, 'viernes', 1, 'enero', 2022, NULL),
(00008, 8, 'sábado', 1, 'enero', 2022, NULL),
(00009, 9, 'domingo', 1, 'enero', 2022, NULL),
(00010, 10, 'lunes', 1, 'enero', 2022, NULL),
(00011, 11, 'martes', 1, 'enero', 2022, NULL),
(00012, 12, 'miércoles', 1, 'enero', 2022, NULL),
(00013, 13, 'jueves', 1, 'enero', 2022, NULL),
(00014, 14, 'viernes', 1, 'enero', 2022, NULL),
(00015, 15, 'sábado', 1, 'enero', 2022, NULL),
(00016, 16, 'domingo', 1, 'enero', 2022, NULL),
(00017, 17, 'lunes', 1, 'enero', 2022, NULL),
(00018, 18, 'martes', 1, 'enero', 2022, NULL),
(00019, 19, 'miércoles', 1, 'enero', 2022, NULL),
(00020, 20, 'jueves', 1, 'enero', 2022, NULL),
(00021, 21, 'viernes', 1, 'enero', 2022, NULL),
(00022, 22, 'sábado', 1, 'enero', 2022, NULL),
(00023, 23, 'domingo', 1, 'enero', 2022, NULL),
(00024, 24, 'lunes', 1, 'enero', 2022, NULL),
(00025, 25, 'martes', 1, 'enero', 2022, NULL),
(00026, 26, 'miércoles', 1, 'enero', 2022, NULL),
(00027, 27, 'jueves', 1, 'enero', 2022, NULL),
(00028, 28, 'viernes', 1, 'enero', 2022, NULL),
(00029, 29, 'sábado', 1, 'enero', 2022, NULL),
(00030, 30, 'domingo', 1, 'enero', 2022, NULL),
(00031, 31, 'lunes', 1, 'enero', 2022, NULL),
(00032, 1, 'martes', 2, 'febrero', 2022, NULL),
(00033, 2, 'miércoles', 2, 'febrero', 2022, NULL),
(00034, 3, 'jueves', 2, 'febrero', 2022, NULL),
(00035, 4, 'viernes', 2, 'febrero', 2022, NULL),
(00036, 5, 'sábado', 2, 'febrero', 2022, NULL),
(00037, 6, 'domingo', 2, 'febrero', 2022, NULL),
(00038, 7, 'lunes', 2, 'febrero', 2022, 'Cumpleaños de Ana Julia'),
(00039, 8, 'martes', 2, 'febrero', 2022, NULL),
(00040, 9, 'miércoles', 2, 'febrero', 2022, NULL),
(00041, 10, 'jueves', 2, 'febrero', 2022, NULL),
(00042, 11, 'viernes', 2, 'febrero', 2022, NULL),
(00043, 12, 'sábado', 2, 'febrero', 2022, NULL),
(00044, 13, 'domingo', 2, 'febrero', 2022, NULL),
(00045, 14, 'lunes', 2, 'febrero', 2022, 'Día de San Valentín'),
(00046, 15, 'martes', 2, 'febrero', 2022, NULL),
(00047, 16, 'miércoles', 2, 'febrero', 2022, NULL),
(00048, 17, 'jueves', 2, 'febrero', 2022, NULL),
(00049, 18, 'viernes', 2, 'febrero', 2022, NULL),
(00050, 19, 'sábado', 2, 'febrero', 2022, NULL),
(00051, 20, 'domingo', 2, 'febrero', 2022, NULL),
(00052, 21, 'lunes', 2, 'febrero', 2022, NULL),
(00053, 22, 'martes', 2, 'febrero', 2022, NULL),
(00054, 23, 'miércoles', 2, 'febrero', 2022, NULL),
(00055, 24, 'jueves', 2, 'febrero', 2022, NULL),
(00056, 25, 'viernes', 2, 'febrero', 2022, NULL),
(00057, 26, 'sábado', 2, 'febrero', 2022, NULL),
(00058, 27, 'domingo', 2, 'febrero', 2022, NULL),
(00059, 28, 'lunes', 2, 'febrero', 2022, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitos`
--

CREATE TABLE `habitos` (
  `habitoId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `habitoTarea` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `habitoEstado` enum('Pendiente','Activo','Inactivo') DEFAULT 'Pendiente',
  `habitoTipo` enum('Diario','Semanal') NOT NULL,
  `habitoDias` varchar(70) NOT NULL,
  `habitoDescripcion` varchar(255) DEFAULT NULL,
  `habitoFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `logId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `logAccion` varchar(50) DEFAULT NULL,
  `logDescripcion` varchar(255) DEFAULT NULL,
  `logUsuario` int(5) UNSIGNED ZEROFILL NOT NULL,
  `logFecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metas`
--

CREATE TABLE `metas` (
  `metaId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `metaProyecto` int(5) UNSIGNED ZEROFILL NOT NULL,
  `metaDescripcion` varchar(255) NOT NULL,
  `metaEstado` enum('Pendiente','En progreso','Completado') DEFAULT 'Pendiente',
  `metaFechaInicio` date DEFAULT current_timestamp(),
  `metaFechaFin` date DEFAULT NULL,
  `metaEtiquetas` varchar(255) DEFAULT NULL,
  `metaFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metas`
--

INSERT INTO `metas` (`metaId`, `metaProyecto`, `metaDescripcion`, `metaEstado`, `metaFechaInicio`, `metaFechaFin`, `metaEtiquetas`, `metaFecha`) VALUES
(00001, 00001, 'Eliminar la grasa de mi cuerpo', 'Pendiente', '2022-02-22', '2022-05-01', 'cuerpo, grasa', '2022-02-20 15:43:26'),
(00002, 00001, 'Eliminar las ojeras', 'Pendiente', '2022-02-20', '2022-05-01', 'piel', '2022-02-21 03:28:06'),
(00003, 00002, 'Comprar 5 camisetas', 'Pendiente', '2022-02-28', '2022-08-27', 'proyecto', '2022-02-28 16:55:38'),
(00004, 00002, 'Comprar 5 jeans.', 'Pendiente', '2022-02-28', '2022-08-27', 'proyecto', '2022-02-28 16:55:38'),
(00005, 00002, 'Comprar un nuevo reloj', 'Pendiente', '2022-02-28', '2022-08-27', 'proyecto', '2022-02-28 16:55:38'),
(00006, 00002, 'Comprar 1 gorra', 'Pendiente', '2022-02-28', '2022-08-27', 'proyecto', '2022-02-28 16:55:38'),
(00007, 00003, 'test11', 'Pendiente', '2022-03-01', '2022-03-02', 'proyecto', '2022-03-01 23:12:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `proyectoId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `proyectoValor` int(5) UNSIGNED ZEROFILL NOT NULL,
  `proyectoNombre` varchar(100) NOT NULL,
  `proyectoDescripcion` varchar(255) DEFAULT NULL,
  `proyectoEstado` enum('Pendiente','En progreso','Completado') DEFAULT 'Pendiente',
  `proyectoEtiquetas` varchar(255) DEFAULT NULL,
  `proyectoFechaInicio` date DEFAULT NULL,
  `proyectoFechaFin` date DEFAULT NULL,
  `proyectoFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `proyectoLink` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`proyectoId`, `proyectoValor`, `proyectoNombre`, `proyectoDescripcion`, `proyectoEstado`, `proyectoEtiquetas`, `proyectoFechaInicio`, `proyectoFechaFin`, `proyectoFecha`, `proyectoLink`) VALUES
(00001, 00001, 'Cuerpo saludable', 'Tener un cuerpo saludable y muy cuidado.', 'Pendiente', 'salud, ejercicio, fit', '2022-02-21', '2022-12-31', '2022-02-20 15:25:08', NULL),
(00002, 00001, 'Vestirme con estilo', 'Vestirme con la ropa que mejor me hace sentir.', 'Pendiente', 'estilo, autoestima, ropa', '2022-02-28', '2022-08-27', '2022-02-28 17:39:11', NULL),
(00003, 00001, 'Test project', 'Another project', 'Pendiente', 'xd', '2022-03-01', '2022-03-02', '2022-03-01 23:12:39', 'PJa00002');

--
-- Disparadores `proyectos`
--
DELIMITER $$
CREATE TRIGGER `proyectosBF_link` BEFORE INSERT ON `proyectos` FOR EACH ROW BEGIN
DECLARE existe INT;
DECLARE link CHAR(8);
	ciclo1:  LOOP
		SET link = fncRandom();
		SELECT proyectoId FROM proyectos WHERE proyectoLink = link INTO existe;
		IF existe IS NOT NULL THEN ITERATE ciclo1;
		END IF;
		LEAVE ciclo1;
	END LOOP ciclo1;
	SET NEW.proyectoLink = link;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `tareaId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tareaMeta` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tareaDescripcion` varchar(255) NOT NULL,
  `tareaEstado` enum('Pendiente','En progreso','Completado') DEFAULT 'Pendiente',
  `tareaFechaInicio` date DEFAULT NULL,
  `tareaFechaFin` date DEFAULT NULL,
  `tareaHoraInicio` time DEFAULT NULL,
  `tareaHoraFin` time DEFAULT NULL,
  `tareaLugar` varchar(50) DEFAULT NULL,
  `tareaRecordatorio` datetime DEFAULT NULL,
  `tareaTipo` enum('Habito','Una vez') DEFAULT NULL,
  `tareaEtiquetas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`tareaId`, `tareaMeta`, `tareaDescripcion`, `tareaEstado`, `tareaFechaInicio`, `tareaFechaFin`, `tareaHoraInicio`, `tareaHoraFin`, `tareaLugar`, `tareaRecordatorio`, `tareaTipo`, `tareaEtiquetas`) VALUES
(00001, 00001, 'Hacer 30 minuntos de ejercicio 5 días a la semana.', 'Pendiente', '2022-02-22', '2022-05-01', '05:45:00', '06:15:00', 'Planes de Renderos', NULL, 'Habito', 'correr'),
(00002, 00002, 'Comprar un protector solar', 'Pendiente', '2022-02-21', '2022-02-21', NULL, NULL, NULL, NULL, 'Una vez', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `usuarioNombre` varchar(50) DEFAULT NULL,
  `usuarioApellido` varchar(50) DEFAULT NULL,
  `usuarioUnico` varchar(20) NOT NULL,
  `usuarioCorreo` varchar(100) NOT NULL,
  `usuarioClave` varchar(255) NOT NULL,
  `usuarioTipo` varchar(20) DEFAULT NULL,
  `usuarioAvatar` varchar(255) DEFAULT NULL,
  `usuarioEstado` enum('Activo','Inactivo') DEFAULT NULL,
  `usuarioFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarioId`, `usuarioNombre`, `usuarioApellido`, `usuarioUnico`, `usuarioCorreo`, `usuarioClave`, `usuarioTipo`, `usuarioAvatar`, `usuarioEstado`, `usuarioFecha`) VALUES
(00001, 'Luis José', 'Cruz Martínez', 'luismart', 'luisjosecruzmart@gmail.com', '123', 'Administrador', NULL, 'Activo', '2022-02-21 04:34:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores`
--

CREATE TABLE `valores` (
  `valorId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `valorNombre` varchar(15) NOT NULL,
  `valorFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valores`
--

INSERT INTO `valores` (`valorId`, `valorNombre`, `valorFecha`) VALUES
(00001, 'Salud', '2022-02-20 14:38:31'),
(00002, 'Arte', '2022-02-20 14:38:31'),
(00003, 'Felicidad', '2022-02-20 14:38:31'),
(00004, 'Amor y Paz', '2022-02-20 14:38:31'),
(00005, 'Aprendizaje', '2022-02-20 14:38:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`bitacoraId`),
  ADD KEY `fk_bitacora_tarea` (`bitacoraTarea`),
  ADD KEY `fk_bitacora_habito` (`bitacoraHabito`),
  ADD KEY `fk_bitacora_calendario` (`bitacoraFechaEjecucion`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`calendarId`);

--
-- Indices de la tabla `habitos`
--
ALTER TABLE `habitos`
  ADD PRIMARY KEY (`habitoId`),
  ADD KEY `fk_habito_tarea` (`habitoTarea`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logId`),
  ADD KEY `fk_log_usuario` (`logUsuario`);

--
-- Indices de la tabla `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`metaId`),
  ADD KEY `fk_meta_proyecto` (`metaProyecto`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`proyectoId`),
  ADD KEY `fk_proyecto_valor` (`proyectoValor`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`tareaId`),
  ADD KEY `fk_tarea_meta` (`tareaMeta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioId`);

--
-- Indices de la tabla `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`valorId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `bitacoraId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `calendarId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `habitos`
--
ALTER TABLE `habitos`
  MODIFY `habitoId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `logId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metas`
--
ALTER TABLE `metas`
  MODIFY `metaId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `proyectoId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `tareaId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `valores`
--
ALTER TABLE `valores`
  MODIFY `valorId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `fk_bitacora_calendario` FOREIGN KEY (`bitacoraFechaEjecucion`) REFERENCES `calendario` (`calendarId`),
  ADD CONSTRAINT `fk_bitacora_habito` FOREIGN KEY (`bitacoraHabito`) REFERENCES `habitos` (`habitoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bitacora_tarea` FOREIGN KEY (`bitacoraTarea`) REFERENCES `tareas` (`tareaId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `habitos`
--
ALTER TABLE `habitos`
  ADD CONSTRAINT `fk_habito_tarea` FOREIGN KEY (`habitoTarea`) REFERENCES `tareas` (`tareaId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_log_usuario` FOREIGN KEY (`logUsuario`) REFERENCES `usuarios` (`usuarioId`);

--
-- Filtros para la tabla `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `fk_meta_proyecto` FOREIGN KEY (`metaProyecto`) REFERENCES `proyectos` (`proyectoId`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_proyecto_valor` FOREIGN KEY (`proyectoValor`) REFERENCES `valores` (`valorId`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `fk_tarea_meta` FOREIGN KEY (`tareaMeta`) REFERENCES `metas` (`metaId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
