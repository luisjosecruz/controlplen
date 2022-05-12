hpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2022 a las 07:15:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
CREATE DEFINER=`root`@`localhost` FUNCTION `fncRandom` () RETURNS CHAR(8) CHARSET utf8mb4  BEGIN

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
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `blogId` int(10) UNSIGNED ZEROFILL NOT NULL,
  `blogDate` date DEFAULT NULL,
  `blogTitle` varchar(255) DEFAULT NULL,
  `blogDescription` text DEFAULT NULL,
  `blogTags` varchar(500) DEFAULT NULL,
  `blogCreatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(00059, 28, 'lunes', 2, 'febrero', 2022, NULL),
(00060, 1, 'martes', 3, 'marzo', 2022, NULL),
(00061, 2, 'miercoles', 3, 'marzo', 2022, NULL),
(00062, 3, 'jueves', 3, 'marzo', 2022, NULL),
(00063, 4, 'viernes', 3, 'marzo', 2022, NULL),
(00064, 5, 'sabado', 3, 'marzo', 2022, NULL),
(00065, 6, 'domingo', 3, 'marzo', 2022, NULL),
(00066, 7, 'lunes', 3, 'marzo', 2022, NULL),
(00067, 8, 'martes', 3, 'marzo', 2022, NULL),
(00068, 9, 'miercoles', 3, 'marzo', 2022, NULL),
(00069, 10, 'jueves', 3, 'marzo', 2022, NULL),
(00070, 11, 'viernes', 3, 'marzo', 2022, NULL),
(00071, 12, 'sabado', 3, 'marzo', 2022, NULL),
(00072, 13, 'domingo', 3, 'marzo', 2022, NULL),
(00073, 14, 'lunes', 3, 'marzo', 2022, NULL),
(00074, 15, 'martes', 3, 'marzo', 2022, NULL),
(00075, 16, 'miercoles', 3, 'marzo', 2022, NULL),
(00076, 17, 'jueves', 3, 'marzo', 2022, NULL),
(00077, 18, 'viernes', 3, 'marzo', 2022, NULL),
(00078, 19, 'sabado', 3, 'marzo', 2022, NULL),
(00079, 20, 'domingo', 3, 'marzo', 2022, NULL),
(00080, 21, 'lunes', 3, 'marzo', 2022, NULL),
(00081, 22, 'martes', 3, 'marzo', 2022, NULL),
(00082, 23, 'miercoles', 3, 'marzo', 2022, NULL),
(00083, 24, 'jueves', 3, 'marzo', 2022, NULL),
(00084, 25, 'viernes', 3, 'marzo', 2022, NULL),
(00085, 26, 'sabado', 3, 'marzo', 2022, NULL),
(00086, 27, 'domingo', 3, 'marzo', 2022, NULL),
(00087, 28, 'lunes', 3, 'marzo', 2022, NULL),
(00088, 29, 'martes', 3, 'marzo', 2022, NULL),
(00089, 30, 'miercoles', 3, 'marzo', 2022, NULL),
(00090, 31, 'jueves', 3, 'marzo', 2022, NULL),
(00091, 1, 'viernes', 4, 'abril', 2022, NULL),
(00092, 2, 'sabado', 4, 'abril', 2022, NULL),
(00093, 3, 'domingo', 4, 'abril', 2022, NULL),
(00094, 4, 'lunes', 4, 'abril', 2022, NULL),
(00095, 5, 'martes', 4, 'abril', 2022, NULL),
(00096, 6, 'miercoles', 4, 'abril', 2022, NULL),
(00097, 7, 'jueves', 4, 'abril', 2022, NULL),
(00098, 8, 'viernes', 4, 'abril', 2022, NULL),
(00099, 9, 'sabado', 4, 'abril', 2022, NULL),
(00100, 10, 'domingo', 4, 'abril', 2022, NULL),
(00101, 11, 'lunes', 4, 'abril', 2022, NULL),
(00102, 12, 'martes', 4, 'abril', 2022, NULL),
(00103, 13, 'miercoles', 4, 'abril', 2022, NULL),
(00104, 14, 'jueves', 4, 'abril', 2022, NULL),
(00105, 15, 'viernes', 4, 'abril', 2022, NULL),
(00106, 16, 'sabado', 4, 'abril', 2022, NULL),
(00107, 17, 'domingo', 4, 'abril', 2022, NULL),
(00108, 18, 'lunes', 4, 'abril', 2022, NULL),
(00109, 19, 'martes', 4, 'abril', 2022, NULL),
(00110, 20, 'miercoles', 4, 'abril', 2022, NULL),
(00111, 21, 'jueves', 4, 'abril', 2022, NULL),
(00112, 22, 'viernes', 4, 'abril', 2022, NULL),
(00113, 23, 'sabado', 4, 'abril', 2022, NULL),
(00114, 24, 'domingo', 4, 'abril', 2022, NULL),
(00115, 25, 'lunes', 4, 'abril', 2022, NULL),
(00116, 26, 'martes', 4, 'abril', 2022, NULL),
(00117, 27, 'miercoles', 4, 'abril', 2022, NULL),
(00118, 28, 'jueves', 4, 'abril', 2022, NULL),
(00119, 29, 'viernes', 4, 'abril', 2022, NULL),
(00120, 30, 'sabado', 4, 'abril', 2022, NULL),
(00121, 1, 'domingo', 5, 'mayo', 2022, NULL),
(00122, 2, 'lunes', 5, 'mayo', 2022, NULL),
(00123, 3, 'martes', 5, 'mayo', 2022, NULL),
(00124, 4, 'miercoles', 5, 'mayo', 2022, NULL),
(00125, 5, 'jueves', 5, 'mayo', 2022, NULL),
(00126, 6, 'viernes', 5, 'mayo', 2022, NULL),
(00127, 7, 'sabado', 5, 'mayo', 2022, NULL),
(00128, 8, 'domingo', 5, 'mayo', 2022, NULL),
(00129, 9, 'lunes', 5, 'mayo', 2022, NULL),
(00130, 10, 'martes', 5, 'mayo', 2022, NULL),
(00131, 11, 'miercoles', 5, 'mayo', 2022, NULL),
(00132, 12, 'jueves', 5, 'mayo', 2022, NULL),
(00133, 13, 'viernes', 5, 'mayo', 2022, NULL),
(00134, 14, 'sabado', 5, 'mayo', 2022, NULL),
(00135, 15, 'domingo', 5, 'mayo', 2022, NULL),
(00136, 16, 'lunes', 5, 'mayo', 2022, NULL),
(00137, 17, 'martes', 5, 'mayo', 2022, NULL),
(00138, 18, 'miercoles', 5, 'mayo', 2022, NULL),
(00139, 19, 'jueves', 5, 'mayo', 2022, NULL),
(00140, 20, 'viernes', 5, 'mayo', 2022, NULL),
(00141, 21, 'sabado', 5, 'mayo', 2022, NULL),
(00142, 22, 'domingo', 5, 'mayo', 2022, NULL),
(00143, 23, 'lunes', 5, 'mayo', 2022, NULL),
(00144, 24, 'martes', 5, 'mayo', 2022, NULL),
(00145, 25, 'miercoles', 5, 'mayo', 2022, NULL),
(00146, 26, 'jueves', 5, 'mayo', 2022, NULL),
(00147, 27, 'viernes', 5, 'mayo', 2022, NULL),
(00148, 28, 'sabado', 5, 'mayo', 2022, NULL),
(00149, 29, 'domingo', 5, 'mayo', 2022, NULL),
(00150, 30, 'lunes', 5, 'mayo', 2022, NULL),
(00151, 31, 'martes', 5, 'mayo', 2022, NULL);

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

--
-- Volcado de datos para la tabla `habitos`
--

INSERT INTO `habitos` (`habitoId`, `habitoTarea`, `habitoEstado`, `habitoTipo`, `habitoDias`, `habitoDescripcion`, `habitoFecha`) VALUES
(00001, 00002, 'Activo', 'Semanal', 'lunes', NULL, '2022-05-02 05:01:56'),
(00002, 00003, 'Activo', 'Semanal', 'martes', NULL, '2022-05-02 05:03:24'),
(00003, 00004, 'Activo', 'Diario', 'martes,miércoles,jueves,viernes,sábado', NULL, '2022-05-12 04:53:04'),
(00004, 00006, 'Activo', 'Semanal', 'martes,jueves,sábado', NULL, '2022-05-12 05:06:10'),
(00005, 00008, 'Activo', 'Diario', 'lunes,martes,miércoles,jueves,viernes,sábado,domingo', NULL, '2022-05-12 05:15:14');

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

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`logId`, `logAccion`, `logDescripcion`, `logUsuario`, `logFecha`) VALUES
(00001, 'userLoggedIn', 'Usuario conectado', 00001, '2022-05-02 04:50:05'),
(00002, 'userLoggedIn', 'Usuario conectado', 00001, '2022-05-07 04:25:15'),
(00003, 'userLoggedIn', 'Usuario conectado', 00001, '2022-05-08 02:58:16');

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
(00001, 00001, 'Hacer una lista de elementos a eliminar', 'Pendiente', '2022-05-02', '2022-05-02', NULL, '2022-05-02 04:54:47'),
(00002, 00001, 'Comer frutas y verduras', 'Pendiente', '2022-05-01', '2022-12-31', NULL, '2022-05-02 04:58:30'),
(00003, 00001, 'Hacer aerobicos todos los días', 'Pendiente', '2022-05-06', '2022-12-31', NULL, '2022-05-07 05:19:03'),
(00004, 00001, 'Hacer ejercicios para definir mi cuerpo', 'Pendiente', '2022-05-12', '2022-12-31', NULL, '2022-05-12 05:03:07'),
(00005, 00002, 'Aumentar mi conocimento leyendo', 'Pendiente', '2022-05-12', '2022-12-31', NULL, '2022-05-12 05:11:52');

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
(00001, 00001, 'Cuerpo saludable', 'Mantener un cuerpo salidable con alimentación equilibrada y ejercicios frecuentes. ', 'En progreso', NULL, '2022-05-01', '2022-12-31', '2022-05-02 04:53:14', '7oMt3miF'),
(00002, 00002, 'Mi filosofía de vida', 'Desarrollar mis ideas, darles sentido y convertirme en un filósofo y filántropo que se conoce muy bien a sí mismo.', 'En progreso', NULL, '2022-05-12', '2022-12-31', '2022-05-12 05:11:17', '1Wxy15u1');

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
(00001, 00001, 'Crear una lista en One Note de comida chatarra a eliminar.', 'Pendiente', '2022-05-05', '2022-05-12', NULL, NULL, NULL, NULL, 'Una vez', NULL),
(00002, 00002, 'Comprar manzanas cada lunes por la mañana', 'Pendiente', '2022-05-02', '2022-12-31', NULL, NULL, NULL, NULL, 'Habito', NULL),
(00003, 00002, 'Comprar guineos cada martes', 'Pendiente', '2022-05-03', '2022-12-31', NULL, NULL, NULL, NULL, 'Habito', NULL),
(00004, 00003, 'Salir a correr los días marcados a las 5:30 am.', 'Pendiente', '2022-05-07', '2022-07-30', NULL, NULL, NULL, NULL, 'Habito', NULL),
(00005, 00004, 'Escribir mi rutina de ejercicios digital y en papel.', 'Pendiente', '2022-05-12', '2022-05-12', NULL, NULL, NULL, NULL, 'Una vez', NULL),
(00006, 00004, 'Ejecutar 3 series de mi rutina de ejercicios 3 días por semana.', 'Pendiente', '2022-05-12', '2022-12-31', NULL, NULL, NULL, NULL, 'Habito', NULL),
(00007, 00005, 'Seleccionar un libro para comenzar a leer.', 'Pendiente', '2022-05-12', '2022-05-12', NULL, NULL, NULL, NULL, 'Una vez', NULL),
(00008, 00005, 'Leer 5 páginas del libro todos los días antes de salir de casa.', 'Pendiente', '2022-05-12', '2022-12-31', NULL, NULL, NULL, NULL, 'Habito', NULL);

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
(00001, 'Luis José', 'Cruz Martínez', 'luismart', 'luisjosecruzmart@gmail.com', '$2y$16$iWKR8Zar0eGKLtAKqih0ze4j/.gml8cdcFfL1OYyCpdxyHvwwPg5q', 'standard', NULL, 'Activo', '2022-05-02 04:49:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores`
--

CREATE TABLE `valores` (
  `valorId` int(5) UNSIGNED ZEROFILL NOT NULL,
  `valorNombre` varchar(15) NOT NULL,
  `valorColor` varchar(20) DEFAULT NULL,
  `valorIcono` varchar(50) DEFAULT NULL,
  `valorFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valores`
--

INSERT INTO `valores` (`valorId`, `valorNombre`, `valorColor`, `valorIcono`, `valorFecha`) VALUES
(00001, 'Salud', '#399726', 'fa-cutlery', '2022-03-24 19:36:26'),
(00002, 'Arte', '#bb5db8', 'fa-music', '2022-03-24 19:36:29'),
(00003, 'Felicidad', '#dfcd01', 'fa-heartbeat', '2022-03-24 19:36:31'),
(00004, 'Amor y Paz', '#e13737', 'fa-peace', '2022-03-24 19:36:35'),
(00005, 'Aprendizaje', '#2d7be1', 'fa-balance-scale', '2022-03-24 19:36:38');

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
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogId`);

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
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `blogId` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `calendarId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `habitos`
--
ALTER TABLE `habitos`
  MODIFY `habitoId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `logId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `metas`
--
ALTER TABLE `metas`
  MODIFY `metaId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `proyectoId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `tareaId` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
