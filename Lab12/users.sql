-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 05:16 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it2600`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `Last_Name`, `user_id`, `email`, `password`) VALUES
(3, 'Meenakshisundaram', 'jey1983', 'jeyanthi1983@gmail.com', '', 'Hariharan@26'),
(5, 'hari', 'parthiv', 'hari_parthiv', 'jey.hariharan@gmail.com', 'Hariharan@26'),
(6, 'jeyanthi', 'meenakshi', 'jeya_2021', 'jeyanthiranjit@gmail.com', 'Hariharan@26'),
(7, 'Hari', 'Parthiv', 'hari_parthiv', 'hariharan@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'new', 'member', 'new_member', 'jeyanthitric@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 'newLogin', 'member', 'new_member2', 'jeyanthitric@gmail.com', '3b9d6b208973e93e4f93dde6738b098e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
