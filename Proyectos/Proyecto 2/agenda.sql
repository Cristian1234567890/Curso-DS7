-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2022 a las 17:58:47
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_entrada` (IN `act_id` VARCHAR(5))   BEGIN
	SET @s=CONCAT("DELETE FROM calendar WHERE id=",act_id);
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crear_entrada` (IN `fecha` VARCHAR(50), IN `hora_inicio` VARCHAR(50), IN `hora_fin` VARCHAR(50), IN `titulo` VARCHAR(100), IN `ubi` VARCHAR(50), IN `t_act` VARCHAR(50), IN `correo` VARCHAR(50), IN `comentario` VARCHAR(255))   BEGIN
	SET @s= CONCAT("INSERT INTO calendar(fecha,hora_inicio,hora_fin,titulo,ubicacion,tipo_actividad,correo,comentarios) VALUES ('",fecha,"','",hora_inicio,"','",hora_fin,"','",titulo,"','",ubi,"','",t_act,"', '",correo,"','",comentario,"')");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_agenda` ()   BEGIN
	SELECT id, titulo,fecha, hora_inicio,ubicacion,hora_fin,tipo_actividad,comentarios FROM calendar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_del_dia` ()   BEGIN
	SET @s= CONCAT("SELECT id,titulo, fecha, hora_inicio,hora_fin from calendar where fecha=CURRENT_DATE()");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_usuario` (IN `u_con` VARCHAR(255), IN `u_param` VARCHAR(50))   BEGIN
	SET @s= CONCAT("SELECT id,titulo,fecha,hora_inicio,ubicacion,hora_fin,tipo_actividad,comentarios,correo FROM calendar where ",u_param," LIKE CONCAT ('%",u_con,"%')");
	PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modif_entrada` (IN `act_id` VARCHAR(5), IN `fecha` VARCHAR(50), IN `hora_inicio` VARCHAR(50), IN `hora_fin` VARCHAR(50), IN `titulo` VARCHAR(100), IN `ubi` VARCHAR(50), IN `t_act` VARCHAR(50), IN `correo` VARCHAR(50), IN `comentario` VARCHAR(255))   BEGIN
	SET @s= CONCAT("UPDATE calendar SET fecha='",fecha,"', hora_inicio='",hora_inicio,"', hora_fin='",hora_fin,"', titulo='",titulo,"',   ubicacion='",ubi,"', tipo_actividad='",t_act,"', correo='",correo,"', comentarios='",comentario,"' WHERE id=",act_id);
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validar_usuario` (IN `param_user` VARCHAR(255), IN `param_pass` VARCHAR(255))   BEGIN
	SET @s= CONCAT("SELECT count(*) FROM usuarios WHERE usuario= '",param_user,"' AND clave='",param_pass,"'");
	
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL DEFAULT '08:00:00',
  `ubicacion` varchar(50) NOT NULL DEFAULT 'Reunión Virtual',
  `hora_fin` time NOT NULL DEFAULT '00:00:00',
  `tipo_actividad` enum('Reunión','Visita','Inspección','Capacitación','Otro') NOT NULL DEFAULT 'Reunión',
  `comentarios` varchar(200) DEFAULT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendar`
--

INSERT INTO `calendar` (`id`, `titulo`, `fecha`, `hora_inicio`, `ubicacion`, `hora_fin`, `tipo_actividad`, `comentarios`, `correo`) VALUES
(1, 'Programación de Prueba', '2022-10-15', '09:15:00', 'Reunión Virtual', '09:45:00', 'Reunión', 'Esta reunión sera para discutir de las pruebas', 'carlos.fontal@utp.ac.pa'),
(2, 'Junta de discusión', '2022-10-18', '10:15:00', 'Reunión Virtual', '10:45:00', 'Reunión', 'Esta reunión sera para discutir de las pruebas', 'cristian.castillo@utp.ac.pa'),
(3, 'Revisión de equipos de Proyecto', '2022-10-10', '08:15:00', 'Visita de Campo', '09:45:00', 'Visita', 'En esta reunion, se realizara inspección de los equipos en ubicacion xyz. Modificado', 'cristian.castillo@utp.ac.pa'),
(4, 'Evaluación de riesgos', '2022-10-18', '11:15:00', 'Reunión Virtual', '12:45:00', 'Reunión', 'Esta reunión el alcance de los riesgos.', 'carlos.fontal@utp.ac.pa'),
(5, 'Junta de capacitación en Programación SQL', '2022-10-14', '09:15:00', 'Reunión Virtual', '00:00:00', 'Reunión', 'En esta sesión, se llevara a cabo la capacitación para programación avanzada en SQL. Modificado.', 'cristian.castillo@utp.ac.pa'),
(6, 'Reunión de Comisión', '2022-11-18', '10:15:00', 'Sala de Juntas', '10:30:00', 'Reunión', 'En esta reunión, evaluaremos el presupuesto.', 'carlos.fontal@utp.ac.pa'),
(7, 'Reunión de Pruebas', '2022-10-21', '11:40:00', 'Sala de Simulador', '12:30:00', 'Capacitación', 'Se realizan pruebas en simulador.', 'carlos.fontal@utp.ac.pa'),
(8, 'Inspección de Equipos', '2022-10-15', '08:15:00', 'Centro de Servidores', '12:00:00', 'Visita', 'Se estaran revisando todos los servidores y los equipos de red.Modificado', 'carlos.fontal@utp.ac.pa'),
(9, 'Reunion desde PHP', '2022-10-25', '12:15:00', 'Reunión Virtual', '13:50:00', 'Reunión', 'Se realiza prueba de codigo PHP.', 'cristian.castillo@utp.ac.pa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `clave` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(1, 'testuser', 'admin'),
(2, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
