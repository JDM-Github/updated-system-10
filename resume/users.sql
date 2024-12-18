-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
USE lecheria_db;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE if exists `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthDate` DATE DEFAULT NULL,
  `address` varchar(255) DEFAULT "",
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `firstName`, `lastName`, `email`, `password`, `createdAt`) VALUES
(1, 'user123', 'Hehe', 'Huhu', 'hehehuhu@hehehuhu.com', '$2y$10$OUeeycrYVMjSrx5UoE6DnuAptWo7ZQebQlquvqmxAEEW/AfjuJYQi', '2024-11-07 07:21:41'),
(2, 'konsi', 'konsi', 'olivarez', 'konsi@gmail.com', '$2y$10$PvU/dlV1jA2I4XRuCcPeh.d1bkLGS0BeKMVHHzBBv9ZhuuBKP.sZW', '2024-11-07 09:18:34'),
(3, 'juandelacruz', 'Juan', 'Dela Cruz', 'juandelacruz@gmail.com', '$2y$10$yZQN5vn3l2XX1.CR4xObJ.xUACXD0v4hdG12Do4Q5n1HdotxirQby', '2024-11-07 09:38:50'),
(4, 'carl.stephen', 'Carl Stephen', 'Vergara', 'carl.vergara@gmail.com', '$2y$10$hb/IHDifH.H.7JUwvj4BOOEAxt8J78wT8n8z6vH8XSN3oU6c.oPq.', '2024-11-11 13:38:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
