-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-07-2011 a las 11:18:23
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `granada`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` char(36) NOT NULL,
  `id_place` char(36) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `id_place`, `nombre`) VALUES
('4dce543d-69f4-4b0d-91f0-0e0c67e9b120', '4dce542d-f5b8-4b99-bbe4-0e0c67e9b120', 'Urgencias'),
('4dce5445-5ff4-45a0-9b57-0e0c67e9b120', '4dce542d-f5b8-4b99-bbe4-0e0c67e9b120', 'Pediatria'),
('4dce544f-cc7c-4111-b52e-0e0c67e9b120', '4dce542d-f5b8-4b99-bbe4-0e0c67e9b120', 'Consultas'),
('4dce545a-aff4-4d47-8eac-0e0c67e9b120', '4dce5426-a5c4-4526-b8e0-0e0c67e9b120', 'Urgencias'),
('4dce5461-a05c-472d-a78e-0e0c67e9b120', '4dce5426-a5c4-4526-b8e0-0e0c67e9b120', 'Consultas'),
('4dce546b-997c-45c9-aa6e-0e0c67e9b120', '4dce5434-dd30-49c7-b253-0e0c67e9b120', 'Consultas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
  `id` char(36) NOT NULL,
  `id_matricula` char(36) NOT NULL,
  `id_practica` char(36) NOT NULL,
  `id_user` char(36) NOT NULL,
  `fecha` date NOT NULL,
  `id_tutor` char(36) NOT NULL,
  `lugar` varchar(255) NOT NULL,
  `conocimientos` text,
  `nota` varchar(255) NOT NULL,
  `observaciones_tutor` text,
  `observaciones_alumno` text,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `revisada` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `id_matricula`, `id_practica`, `id_user`, `fecha`, `id_tutor`, `lugar`, `conocimientos`, `nota`, `observaciones_tutor`, `observaciones_alumno`, `created`, `modified`, `revisada`) VALUES
('4dce62bf-d1c8-4db6-9499-0e0c67e9b120', '4dce6258-1ec4-4148-a365-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', '4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', '2011-05-14', '4dce5adf-2270-4587-bc8e-0e0c67e9b120', 'Virgen del Mar (Pediatria)', 'a:3:{i:0;s:11:"Habilidad 1";i:1;s:11:"Habilidad 3";i:2;s:11:"Habilidad 2";}', '10', 'Todo bien', 'Ninguna', '2011-05-14', '2011-05-14', 1),
('4dce62df-adec-4e4f-bf6b-0e0c67e9b120', '4dce6258-1ec4-4148-a365-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', '4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', '2011-05-23', '4dce5adf-2270-4587-bc8e-0e0c67e9b120', 'Virgen del Mar (Consultas)', 'a:3:{i:0;s:1:"0";i:1;s:11:"Habilidad 3";i:2;s:11:"Habilidad 2";}', '5', 'No ha salido tan bien...', 'Todo ha salido bien', '2011-05-14', '2011-05-14', 1),
('4dd77796-7524-4fd0-9df3-012067e9b120', '4dd776ce-bd00-425f-bb68-012067e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', '4dd774cd-9f94-4d59-b246-012067e9b120', '2011-05-21', '4dce5aca-883c-42a4-8192-0e0c67e9b120', 'Torrecardenas (Urgencias)', 'a:2:{i:0;s:11:"Habilidad 1";i:1;s:1:"0";}', '7', 'Todo correcto', 'No tengo dudas', '2011-05-21', '2011-05-21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conocimientos`
--

CREATE TABLE IF NOT EXISTS `conocimientos` (
  `id` char(36) NOT NULL,
  `id_practica` char(36) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `conocimientos`
--

INSERT INTO `conocimientos` (`id`, `id_practica`, `nombre`, `created`, `modified`) VALUES
('4dce58c7-2e9c-434f-a613-0e0c67e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 'Habilidad 1', '2011-05-14', '2011-05-14'),
('4dce58cd-34e0-481b-84c7-0e0c67e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 'Habilidad 2', '2011-05-14', '2011-05-14'),
('4dce58d9-7038-4dbc-83e0-0e0c67e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 'Habilidad 3', '2011-05-14', '2011-05-14'),
('4dce58e7-54bc-4292-970d-0e0c67e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 'Habilidad 1', '2011-05-14', '2011-05-14'),
('4dce58ee-dd14-4ae8-85df-0e0c67e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 'Habilidad 2', '2011-05-14', '2011-05-14'),
('4dce58fc-d32c-4da2-adad-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 'Habilidad 1', '2011-05-14', '2011-05-14'),
('4dce5905-27b0-4074-bed4-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 'Habilidad 3', '2011-05-14', '2011-05-14'),
('4dce590c-b014-4f7e-91cf-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 'Habilidad 2', '2011-05-14', '2011-05-14'),
('4dce5917-4c5c-4299-86e5-0e0c67e9b120', '4dce5395-4dc4-4559-811e-0e0c67e9b120', 'Habilidad 1', '2011-05-14', '2011-05-14'),
('4dce5925-9604-423f-b4c5-0e0c67e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', 'Habilidad 1', '2011-05-14', '2011-05-14'),
('4dce5930-0b00-46b5-b15e-0e0c67e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', 'Habilidad 2', '2011-05-14', '2011-05-14'),
('4dce5938-e6a8-4167-8b46-0e0c67e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', 'Habilidad 3', '2011-05-14', '2011-05-14'),
('4dce594d-1d98-460c-8203-0e0c67e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', 'Habilidad 1', '2011-05-14', '2011-05-14'),
('4dce5954-3d30-47b1-852b-0e0c67e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', 'Habilidad 2', '2011-05-14', '2011-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lps`
--

CREATE TABLE IF NOT EXISTS `lps` (
  `id` char(36) NOT NULL,
  `id_place` char(36) NOT NULL,
  `id_practica` char(36) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `lps`
--

INSERT INTO `lps` (`id`, `id_place`, `id_practica`, `created`) VALUES
('4dce5479-0688-4c76-b8fb-0e0c67e9b120', '4dce5426-a5c4-4526-b8e0-0e0c67e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', '2011-05-14'),
('4dce547e-97a8-4699-9ac6-0e0c67e9b120', '4dce542d-f5b8-4b99-bbe4-0e0c67e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', '2011-05-14'),
('4dce5487-f354-4289-8397-0e0c67e9b120', '4dce5426-a5c4-4526-b8e0-0e0c67e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', '2011-05-14'),
('4dce5490-1800-4581-ad79-0e0c67e9b120', '4dce542d-f5b8-4b99-bbe4-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', '2011-05-14'),
('4dce5495-8c50-4211-a96f-0e0c67e9b120', '4dce5434-dd30-49c7-b253-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', '2011-05-14'),
('4dce549e-f770-4086-9a74-0e0c67e9b120', '4dce5434-dd30-49c7-b253-0e0c67e9b120', '4dce5395-4dc4-4559-811e-0e0c67e9b120', '2011-05-14'),
('4dce578a-decc-4dc4-a55e-0e0c67e9b120', '4dce5434-dd30-49c7-b253-0e0c67e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', '2011-05-14'),
('4dce5795-b844-484f-8c85-0e0c67e9b120', '4dce5434-dd30-49c7-b253-0e0c67e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', '2011-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` char(36) NOT NULL,
  `id_alumno` char(36) NOT NULL,
  `id_practica` char(36) NOT NULL,
  `bloqueado` int(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `id_alumno`, `id_practica`, `bloqueado`, `created`) VALUES
('4dce5e82-278c-4cbe-9202-0e0c67e9b120', '4dce5a46-6100-4a0a-9b2c-0e0c67e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 0, '2011-05-14 12:50:42'),
('4dce5e83-9e74-43f2-a55c-0e0c67e9b120', '4dce5a46-6100-4a0a-9b2c-0e0c67e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 0, '2011-05-14 12:50:43'),
('4dce5e83-f8bc-433b-88f3-0e0c67e9b120', '4dce5a46-6100-4a0a-9b2c-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 0, '2011-05-14 12:50:43'),
('4dce5f7d-b198-4bb2-bcac-0e0c67e9b120', '4dce5a46-6100-4a0a-9b2c-0e0c67e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', 0, '2011-05-14 12:54:53'),
('4dce6258-1644-4ec3-adc0-0e0c67e9b120', '4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', '4dce5395-4dc4-4559-811e-0e0c67e9b120', 0, '2011-05-14 13:07:04'),
('4dce6258-1bfc-4e40-9bb3-0e0c67e9b120', '4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', 0, '2011-05-14 13:07:04'),
('4dce6258-1ec4-4148-a365-0e0c67e9b120', '4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 0, '2011-05-14 13:07:04'),
('4dce6258-374c-4bb9-b834-0e0c67e9b120', '4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 0, '2011-05-14 13:07:04'),
('4dce6258-62dc-498e-a144-0e0c67e9b120', '4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 0, '2011-05-14 13:07:04'),
('4dce6258-f8d0-4b0b-b3ce-0e0c67e9b120', '4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', 0, '2011-05-14 13:07:04'),
('4dd776ce-bd00-425f-bb68-012067e9b120', '4dd774cd-9f94-4d59-b246-012067e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 0, '2011-05-21 10:24:46'),
('4dd776ce-be44-4b95-897d-012067e9b120', '4dd774cd-9f94-4d59-b246-012067e9b120', '0', 0, '2011-05-21 10:24:46'),
('4dd776ce-d224-4b1c-afd7-012067e9b120', '4dd774cd-9f94-4d59-b246-012067e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 0, '2011-05-21 10:24:46'),
('4dd776ce-e6a4-44bb-a80a-012067e9b120', '4dd774cd-9f94-4d59-b246-012067e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 0, '2011-05-21 10:24:46'),
('4dea02f3-1d0c-437f-9a96-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', 0, '2011-06-04 12:03:31'),
('4dea02f3-1e24-43da-8ebe-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 0, '2011-06-04 12:03:31'),
('4dea02f3-46c4-497b-baeb-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 0, '2011-06-04 12:03:31'),
('4dea02f3-4e54-4b5d-992c-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 0, '2011-06-04 12:03:31'),
('4dea02f3-8f30-4092-a81c-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', 0, '2011-06-04 12:03:31'),
('4dea02f3-edb4-47bb-8d15-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce5395-4dc4-4559-811e-0e0c67e9b120', 0, '2011-06-04 12:03:31'),
('4dea0563-0ce0-4290-a1d7-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', 0, '2011-06-04 12:13:55'),
('4dea0563-2d7c-4a1e-8466-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 0, '2011-06-04 12:13:55'),
('4dea0563-3c90-483d-92f9-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 0, '2011-06-04 12:13:55'),
('4dea0563-4c1c-4066-a83e-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '0', 0, '2011-06-04 12:13:55'),
('4dea0563-9540-446c-bb2f-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 0, '2011-06-04 12:13:55'),
('4dea0563-ca24-4677-b3ed-0ab067e9b120', '4dea001b-371c-45dd-a0c0-0ab067e9b120', '0', 0, '2011-06-04 12:13:55'),
('4dea0873-1320-41cc-b413-0ab067e9b120', '4dea07c1-a7b0-43c4-bcae-0ab067e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 0, '2011-06-04 12:26:59'),
('4dea0873-3cc4-48dd-b064-0ab067e9b120', '4dea07c1-a7b0-43c4-bcae-0ab067e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 0, '2011-06-04 12:26:59'),
('4dea0874-1740-4165-b0f9-0ab067e9b120', '4dea07c1-a7b0-43c4-bcae-0ab067e9b120', '0', 0, '2011-06-04 12:27:00'),
('4dea0874-1fa8-46e0-bfd1-0ab067e9b120', '4dea07c1-a7b0-43c4-bcae-0ab067e9b120', '4dce5395-4dc4-4559-811e-0e0c67e9b120', 0, '2011-06-04 12:27:00'),
('4dea0874-6268-4944-a471-0ab067e9b120', '4dea07c1-a7b0-43c4-bcae-0ab067e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', 0, '2011-06-04 12:27:00'),
('4dea0874-e118-4a1f-81dc-0ab067e9b120', '4dea07c1-a7b0-43c4-bcae-0ab067e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 0, '2011-06-04 12:27:00'),
('4dea0b4f-3d38-43d5-b145-0ab067e9b120', '4dea0af3-ee44-46c4-80c3-0ab067e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', 0, '2011-06-04 12:39:11'),
('4dea0b4f-ae78-40d8-94ca-0ab067e9b120', '4dea0af3-ee44-46c4-80c3-0ab067e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', 0, '2011-06-04 12:39:11'),
('4dea0b4f-bdd0-42da-963d-0ab067e9b120', '4dea0af3-ee44-46c4-80c3-0ab067e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 0, '2011-06-04 12:39:11'),
('4dea0b4f-d514-4b70-8b0a-0ab067e9b120', '4dea0af3-ee44-46c4-80c3-0ab067e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', 0, '2011-06-04 12:39:11'),
('4dea0b50-85b4-432d-b3c9-0ab067e9b120', '4dea0af3-ee44-46c4-80c3-0ab067e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', 0, '2011-06-04 12:39:12'),
('4dea0b50-c0d4-442f-9d34-0ab067e9b120', '4dea0af3-ee44-46c4-80c3-0ab067e9b120', '4dce5395-4dc4-4559-811e-0e0c67e9b120', 0, '2011-06-04 12:39:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` char(36) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `places`
--

INSERT INTO `places` (`id`, `hospital`) VALUES
('4dce5426-a5c4-4526-b8e0-0e0c67e9b120', 'Torrecardenas'),
('4dce542d-f5b8-4b99-bbe4-0e0c67e9b120', 'Virgen del Mar'),
('4dce5434-dd30-49c7-b253-0e0c67e9b120', 'Centro Medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicas`
--

CREATE TABLE IF NOT EXISTS `practicas` (
  `id` char(36) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `codigo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `curso` varchar(255) CHARACTER SET latin1 NOT NULL,
  `bloqueado` int(1) NOT NULL DEFAULT '1',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `practicas`
--

INSERT INTO `practicas` (`id`, `nombre`, `codigo`, `curso`, `bloqueado`, `created`, `modified`) VALUES
('4dce5364-82e4-4a48-90b5-0e0c67e9b120', 'Practica1', '1', '4', 0, '2011-05-14', '2011-05-14'),
('4dce5377-1964-421a-9795-0e0c67e9b120', 'Practica 2', '2', '5', 0, '2011-05-14', '2011-05-14'),
('4dce5385-16e8-47d2-a1d9-0e0c67e9b120', 'Practica 3', '3', '5', 0, '2011-05-14', '2011-05-14'),
('4dce5395-4dc4-4559-811e-0e0c67e9b120', 'Practica 4', '4', '6', 1, '2011-05-14', '2011-05-14'),
('4dce53ab-bbec-473e-be55-0e0c67e9b120', 'Practica 6', '6', '6', 1, '2011-05-14', '2011-05-14'),
('4dce53bb-0800-44ae-8c3b-0e0c67e9b120', 'Practica 5', '5', '5', 1, '2011-05-14', '2011-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE IF NOT EXISTS `tutores` (
  `id` char(36) NOT NULL,
  `id_user` char(36) NOT NULL,
  `id_practica` char(36) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`id`, `id_user`, `id_practica`, `created`) VALUES
('4dce5ac0-77c4-408e-9444-0e0c67e9b120', '4dce59a0-de5c-4b0d-95c4-0e0c67e9b120', '4dce5364-82e4-4a48-90b5-0e0c67e9b120', '2011-05-14'),
('4dce5aca-883c-42a4-8192-0e0c67e9b120', '4dce59ce-c8bc-4df4-a42d-0e0c67e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', '2011-05-14'),
('4dce5ad7-dd48-4a82-9640-0e0c67e9b120', '4dce59a0-de5c-4b0d-95c4-0e0c67e9b120', '4dce5377-1964-421a-9795-0e0c67e9b120', '2011-05-14'),
('4dce5adf-2270-4587-bc8e-0e0c67e9b120', '4dce59ce-c8bc-4df4-a42d-0e0c67e9b120', '4dce5385-16e8-47d2-a1d9-0e0c67e9b120', '2011-05-14'),
('4dce5db0-6818-432d-b066-0e0c67e9b120', '4dce59a0-de5c-4b0d-95c4-0e0c67e9b120', '4dce5395-4dc4-4559-811e-0e0c67e9b120', '2011-05-14'),
('4dce5dbd-b8d4-4e1c-a6be-0e0c67e9b120', '4dce59a0-de5c-4b0d-95c4-0e0c67e9b120', '4dce53ab-bbec-473e-be55-0e0c67e9b120', '2011-05-14'),
('4dce5dcc-203c-44be-9c38-0e0c67e9b120', '4dce59a0-de5c-4b0d-95c4-0e0c67e9b120', '4dce53bb-0800-44ae-8c3b-0e0c67e9b120', '2011-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `bloqueado` int(1) NOT NULL DEFAULT '1',
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nombre`, `apellidos`, `dni`, `email`, `telefono`, `status`, `bloqueado`, `info`) VALUES
('4d7ba22e-a430-4b54-b0e8-0d7c67e9b120', 'admin', '9ee47cab0e3461b329a2f5aace4a0df01d719ab5', 'Jose', 'Salvador', '12345678M', '1234456@hotmail.es', '123456789', 10, 0, ''),
('4dce59a0-de5c-4b0d-95c4-0e0c67e9b120', 'tutor1', '9ee47cab0e3461b329a2f5aace4a0df01d719ab5', 'Tutor1', 'Tutor1', '12356', '123456@ugr.es', '123456', 5, 0, NULL),
('4dce59ce-c8bc-4df4-a42d-0e0c67e9b120', 'Tutor2', '9ee47cab0e3461b329a2f5aace4a0df01d719ab5', 'Tutor2', 'Tutor2', '123456', '12345678@ugr.es', '123456', 5, 0, NULL),
('4dce5a46-6100-4a0a-9b2c-0e0c67e9b120', 'alumno1', '9ee47cab0e3461b329a2f5aace4a0df01d719ab5', 'Alumno1', 'Alumno1', '123456', 'alumno1@ugr.es', '123456', 1, 0, NULL),
('4dce5a78-3bcc-48b3-a6c9-0e0c67e9b120', 'alumno2', '9ee47cab0e3461b329a2f5aace4a0df01d719ab5', 'Alumno2', 'Alumno2', '123456', 'alumno2@ugr.es', '123456', 1, 0, NULL);
