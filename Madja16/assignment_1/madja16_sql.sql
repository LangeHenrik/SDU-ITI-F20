-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 12:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS madja16;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madja16`
--
CREATE DATABASE IF NOT EXISTS `madja16` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `madja16`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `memmo_id` int(11) NOT NULL,
  `memmo_username` varchar(255) NOT NULL,
  `memmo_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`memmo_id`, `memmo_username`, `memmo_pwd`) VALUES
(1, 'bob', '$2y$10$FMvLbWYyw5DQnMK0dBAO2ust.H74FdHB3FYCLT8qFBjERPFVjGQ7y'),
(2, 'john', '$2y$10$J2.4PtuSpou8UXzagatuvuhxUQmgYITqikZJBmq2pAF01BtpKsnJO'),
(3, 'beki', '$2y$10$/6RWGUdM2To.Xu1Hbq6AI.2iKh6QVYtEiI6Q9Wea9cuBhQfdrKu5.');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `image_id` int(11) NOT NULL,
  `image_description` varchar(255) NOT NULL,
  `image_header` varchar(255) NOT NULL,
  `image_URI` varchar(255) NOT NULL,
  `image_owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`image_id`, `image_description`, `image_header`, `image_URI`, `image_owner`) VALUES
(1, 'this is bobs description', 'this is bobs header', '5e62d50f2d3886.05769437.jpg', 'bob'),
(2, 'this is beki\'s description', 'this is beki\'s header', '5e62d5a363c073.34760007.jpg', 'beki'),
(3, 'another description', 'another header', '5e62d5d68e1494.51314485.png', 'beki'),
(4, 'this is john\'s description', 'this is john\'s header', '5e62d65eadbaf4.17395131.jpg', 'john'),
(5, 'this is john\'s description', 'this is john\'s header', '5e62d67122a883.94348221.jpg', 'john'),
(6, 'just another description', 'just another header', '5e62d83bc4d575.68063134.jpg', 'bob');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`memmo_id`),
  ADD UNIQUE KEY `memmo_username` (`memmo_username`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_user_images_users` (`image_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `memmo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_images`
--
ALTER TABLE `user_images`
  ADD CONSTRAINT `fk_user_images_users` FOREIGN KEY (`image_owner`) REFERENCES `users` (`memmo_username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
