-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 09:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `towndb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `town` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `town`, `barangay`, `contact_number`) VALUES
(1, 'Cabiao', 'Bagong Buhay/ Lote', ''),
(2, 'Cabiao', 'Bagong Sikat', ''),
(3, 'Cabiao', 'Bagong Silang', ''),
(4, 'Cabiao', 'Conception/Asyenda', ''),
(5, 'Cabiao', 'Entablado', ''),
(6, 'Cabiao', 'Maligaya', ''),
(7, 'Cabiao', 'Natividad North', ''),
(8, 'Cabiao', 'Natividad South', ''),
(9, 'Cabiao', 'Palasinan', ''),
(10, 'Cabiao', 'San Antonio/Pantalan', ''),
(11, 'Cabiao', 'San Fernando Norte', ''),
(12, 'Cabiao', 'San Fernando Sur', ''),
(13, 'Cabiao', 'San Gregorio', ''),
(14, 'Cabiao', 'San Juan North', ''),
(15, 'Cabiao', 'San Juan South', ''),
(16, 'Cabiao', 'San Roque', ''),
(17, 'Cabiao', 'San Vicente', ''),
(18, 'Cabiao', 'Santa Rita', ''),
(19, 'Cabiao', 'Sinipit', ''),
(20, 'Cabiao', 'Polilio', ''),
(21, 'Cabiao', 'San Carlos', ''),
(22, 'Cabiao', 'Santa Isable', ''),
(23, 'Cabiao', 'Santa Ines', ''),
(24, 'Gapan A', 'Balante', ''),
(25, 'Gapan A', 'Bungo', ''),
(26, 'Gapan A', 'Kapalangan', ''),
(27, 'Gapan A', 'Mabuga', ''),
(28, 'Gapan A', 'Maburak', ''),
(29, 'Gapan A', 'Macabaklay', ''),
(30, 'Gapan A', 'Mahipon', ''),
(31, 'Gapan A', 'Mangino', ''),
(32, 'Gapan A', 'Pambuan', ''),
(33, 'Gapan A', 'Puting Tubig', ''),
(34, 'Gapan A', 'San Lorenzo', ''),
(35, 'Gapan A', 'San Vicente', ''),
(36, 'Gapan A', 'Santa Cruz', ''),
(37, 'Gapan B', 'Bayanihan', ''),
(38, 'Gapan B', 'Bulak', ''),
(39, 'Gapan B', 'Malimba', ''),
(40, 'Gapan B', 'Marelo', ''),
(41, 'Gapan B', 'Parcutela', ''),
(42, 'Gapan B', 'San Nicolas', ''),
(43, 'Gapan B', 'San Roque', ''),
(44, 'Gapan B', 'Santo Cristo Norte', ''),
(45, 'Gapan B', 'Santo Cristo Sur', ''),
(46, 'Gapan B', 'Santo Niño', ''),
(47, 'Gapan B', 'Tagulod', ''),
(48, 'Jaen', 'Calabasa', ''),
(49, 'Jaen', 'Campugo', ''),
(50, 'Jaen', 'Dampulan', ''),
(51, 'Jaen', 'Hilera', ''),
(52, 'Jaen', 'Imbunia', ''),
(53, 'Jaen', 'Lambakin', ''),
(54, 'Jaen', 'Langla', ''),
(55, 'Jaen', 'Marawa', ''),
(56, 'Jaen', 'Niyugan', ''),
(57, 'Jaen', 'Ocampo Rivera', ''),
(58, 'Jaen', 'Pakul', ''),
(59, 'Jaen', 'Pamacpacan/Sanggalang', ''),
(60, 'Jaen', 'Pinanggaan', ''),
(61, 'Jaen', 'Pitik-Ulanin', ''),
(62, 'Jaen', 'Poblacion', ''),
(63, 'Jaen', 'Putlod', ''),
(64, 'Jaen', 'San Josef Nabao', ''),
(65, 'Jaen', 'San Jose/Malaiba', ''),
(66, 'Jaen', 'San Pablo', ''),
(67, 'Jaen', 'San Roque', ''),
(68, 'Jaen', 'San Vicente', ''),
(69, 'Jaen', 'Santa Rita', ''),
(70, 'Jaen', 'Santo Tomas North', ''),
(71, 'Jaen', 'Santo Tomas South/Lumanas', ''),
(72, 'Jaen', 'Sapang', ''),
(73, 'San Antonio', 'Batitang', ''),
(74, 'San Antonio', 'Buliran', ''),
(75, 'San Antonio', 'Cama Juan', ''),
(76, 'San Antonio', 'Julo', ''),
(77, 'San Antonio', 'Lawang Kupang', ''),
(78, 'San Antonio', 'Luyos', ''),
(79, 'San Antonio', 'Maugat', ''),
(80, 'San Antonio', 'Panabingan', ''),
(81, 'San Antonio', 'Papaya', ''),
(82, 'San Antonio', 'Poblacion', ''),
(83, 'San Antonio', 'San Francisco', ''),
(84, 'San Antonio', 'San Mariano', ''),
(85, 'San Antonio', 'Santa Barbara', ''),
(86, 'San Antonio', 'Santa Cruz', ''),
(87, 'San Antonio', 'Santo Cristo', ''),
(88, 'San Antonio', 'Tikiw', ''),
(89, 'San Isidro', 'Alua', ''),
(90, 'San Isidro', 'Calaba', ''),
(91, 'San Isidro', 'Malapit', ''),
(92, 'San Isidro', 'Mangga', ''),
(93, 'San Isidro', 'Poblacion', ''),
(94, 'San Isidro', 'Pulo', ''),
(95, 'San Isidro', 'San Roque', ''),
(96, 'San Isidro', 'Santo Cristo', ''),
(97, 'San Isidro', 'Tabon', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
