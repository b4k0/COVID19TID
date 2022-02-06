-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 10:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `covid`
--

CREATE TABLE `covid` (
  `user` varchar(45) DEFAULT NULL,
  `diagnosis` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `pois`
--

CREATE TABLE `pois` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `types` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`types`)),
  `coordinates.lat` float DEFAULT NULL,
  `coordinates.lng` float DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `rating_n` int(11) DEFAULT NULL,
  `time_spent` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`time_spent`)),
  `current_popularity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `populartimes`
--

CREATE TABLE `populartimes` (
  `poi` varchar(50) NOT NULL,
  `day` varchar(10) NOT NULL,
  `hour1` int(11) NOT NULL,
  `hour2` int(11) NOT NULL,
  `hour3` int(11) NOT NULL,
  `hour4` int(11) NOT NULL,
  `hour5` int(11) NOT NULL,
  `hour6` int(11) NOT NULL,
  `hour7` int(11) NOT NULL,
  `hour8` int(11) NOT NULL,
  `hour9` int(11) NOT NULL,
  `hour10` int(11) NOT NULL,
  `hour11` int(11) NOT NULL,
  `hour12` int(11) NOT NULL,
  `hour13` int(11) NOT NULL,
  `hour14` int(11) NOT NULL,
  `hour15` int(11) NOT NULL,
  `hour16` int(11) NOT NULL,
  `hour17` int(11) NOT NULL,
  `hour18` int(11) NOT NULL,
  `hour19` int(11) NOT NULL,
  `hour20` int(11) NOT NULL,
  `hour21` int(11) NOT NULL,
  `hour22` int(11) NOT NULL,
  `hour23` int(11) NOT NULL,
  `hour24` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------



--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `user` varchar(45) DEFAULT NULL,
  `poi` varchar(50) DEFAULT NULL,
  `visitTime` datetime DEFAULT NULL,
  `timeSpent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid`
--
ALTER TABLE `covid`
  ADD KEY `user` (`user`);

--
-- Indexes for table `pois`
--
ALTER TABLE `pois`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `populartimes`
--
ALTER TABLE `populartimes`
  ADD KEY `poi` (`poi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD KEY `user` (`user`),
  ADD KEY `poi` (`poi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `covid`
--
ALTER TABLE `covid`
  ADD CONSTRAINT `covid_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`);

--
-- Constraints for table `populartimes`
--
ALTER TABLE `populartimes`
  ADD CONSTRAINT `populartimes_ibfk_1` FOREIGN KEY (`poi`) REFERENCES `pois` (`id`);

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`poi`) REFERENCES `pois` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
