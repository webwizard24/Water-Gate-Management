-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2024 at 10:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gate_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gate_management`
--

CREATE TABLE `gate_management` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `width_cm` decimal(5,2) NOT NULL,
  `height_cm` decimal(5,2) NOT NULL,
  `thickness_body_cm` decimal(5,2) NOT NULL,
  `thickness_cover_cm` decimal(5,2) NOT NULL,
  `reinforcement_A1` decimal(5,2) DEFAULT NULL,
  `reinforcement_A2` decimal(5,2) DEFAULT NULL,
  `reinforcement_B1` decimal(5,2) DEFAULT NULL,
  `reinforcement_B2` decimal(5,2) DEFAULT NULL,
  `reinforcement_C1` decimal(5,2) DEFAULT NULL,
  `reinforcement_C2` decimal(5,2) DEFAULT NULL,
  `reinforcement_D1` decimal(5,2) DEFAULT NULL,
  `reinforcement_D2` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gate_management`
--
ALTER TABLE `gate_management`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gate_management`
--
ALTER TABLE `gate_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
