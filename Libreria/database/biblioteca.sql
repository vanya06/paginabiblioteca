-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2019 a las 18:08:26
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8_general_cimb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(24) COLLATE utf8_general_ci_bin NOT NULL,
  `password` varchar(12) COLLATE utf8_general_ci_bin NOT NULL,
  `firstname` varchar(30) COLLATE utf8_general_ci_bin NOT NULL,
  `middlename` varchar(30) COLLATE utf8_general_ci_bin NOT NULL,
  `lastname` varchar(30) COLLATE utf8_general_ci_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci_bin;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(2, '001', 'Domingo', 'Domingo', '', 'Pineda Villa'),
(3, '002', '002', 'Oliver', '', 'Zamora Martinez'),
(4, '003', '0101', 'Vanya ', 'Dairanny', 'Tenorio Deloya');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(50) COLLATE utf8_general_ci_bin NOT NULL,
  `book_description` varchar(200) COLLATE utf8_general_ci_bin NOT NULL,
  `book_category` varchar(50) COLLATE utf8_general_ci_bin NOT NULL,
  `book_author` varchar(60) COLLATE utf8_general_ci_bin NOT NULL,
  `date_publish` varchar(25) COLLATE utf8_general_ci_bin NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_general_ci COLLATE=utf8_general_ci_bin;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_description`, `book_category`, `book_author`, `date_publish`, `qty`) VALUES
(1, 'Lecciones de derecho penal', 'Oxford University Press es un departamento de la univercidad de oxford', 'Área de Derecho y Ciencias Sociales', 'Luis Jiménez de Asúa', '2019-10-17', 15),
(2, 'dfsf', 'fSFASFAFA', 'srg ', 'gegae', '2001-07-21', 3),
(3, 'Los juegos del hambre', 'en lo que alguna vez fue norte america, la capital de Panem mantiene sus 12 distritos obligandolos a seleccionar un niño y una niña a competir en un evento televisado llamado los juegos del hambre.', 'Juvenil, Ciencia ficcion', 'Susanne Collins', '2008-09-14', 5),
(4, 'Las Mil y una Noches', 'La historia de Ali Baba', 'Fantasia', 'Aladino', '2019-09-10', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrowing`
--

CREATE TABLE `borrowing` (
  `borrow_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `student_no` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) COLLATE utf8_general_ci_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_general_ci COLLATE=utf8_general_ci_bin;

--
-- Volcado de datos para la tabla `borrowing`
--

INSERT INTO `borrowing` (`borrow_id`, `book_id`, `student_no`, `qty`, `date`, `status`) VALUES
(1, 1, 123, 1, '2019-10-18', 'Returned'),
(2, 1, 123, 1, '2019-10-18', 'Returned'),
(3, 1, 123, 1, '2019-10-18', 'Returned'),
(4, 1, 123, 1, '2019-10-19', 'Returned'),
(5, 1, 123, 1, '2019-10-19', 'Returned'),
(6, 1, 123, 1, '2019-10-19', 'Returned'),
(7, 1, 123, 1, '2019-10-19', 'Returned'),
(8, 1, 123, 1, '2019-10-19', 'Returned'),
(9, 1, 123, 1, '2019-10-19', 'Returned'),
(10, 2, 123, 1, '2019-10-19', 'Returned'),
(11, 1, 123, 1, '2019-10-19', 'Returned'),
(12, 1, 123, 1, '2019-11-10', 'Returned'),
(13, 1, 123, 1, '2019-11-10', 'Returned'),
(14, 1, 5354, 1, '2019-11-10', 'Returned');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_no` varchar(8) COLLATE utf8_general_ci_bin NOT NULL,
  `firstname` varchar(30) COLLATE utf8_general_ci_bin NOT NULL,
  `middlename` varchar(30) COLLATE utf8_general_ci_bin NOT NULL,
  `lastname` varchar(30) COLLATE utf8_general_ci_bin NOT NULL,
  `course` varchar(8) COLLATE utf8_general_ci_bin NOT NULL,
  `section` varchar(8) COLLATE utf8_general_ci_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_general_ci COLLATE=utf8_general_ci_bin;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`student_id`, `student_no`, `firstname`, `middlename`, `lastname`, `course`, `section`) VALUES
(3, '123-1', 'Jose', 'Luis', 'Pineda Villa', 'Español', '2019'),
(4, '123-2', 'MA', 'Teresa', 'Villa Huitron', 'Costura', '2019'),
(5, '5354', 'Juan', 'Alberto', 'Molina Tenorio', 'Informát', '5to Seme'),
(6, '7788', 'Luis', '', 'Perez Lopez', 'Computac', '3erSemes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indices de la tabla `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
