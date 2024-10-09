-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2024 at 05:04 AM
-- Server version: 8.0.37-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `ID` int NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`ID`, `user`, `password`, `name`, `email`) VALUES
(1, 'admin', '$2y$10$0njwCllPr5uATLq.9brtqO/GBuFKEUtRTlAP0NwLYOD7X.I3IIdB6', 'Harish', 'me@gmail.com'),
(2, 'admin1', '$2y$10$oFTftujratND3znaxvsave/4N1iw5dvafeBGUr1aQpbvEaWET5Jya', 'Kanna', 'k@mail.com'),
(3, 'admin2', '$2y$10$Cisq.c0.2thkXvhMS5BPM.Mbn5SmWlvAazWM/ITTvHbHbpxEYMh3a', 'Arjun', 'arjun@gmail.com'),
(4, 'admin3', '$2y$10$ppZNrEtKJIC6py27S4nyeue/SU7Db1xZGICr8gczIjvnmhmoObwLq', 'caviin', 'c@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
