-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 05:22 PM
-- Server version: 8.0.22
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwash`
--
CREATE DATABASE IF NOT EXISTS `carwash` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `carwash`;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `reg_number` varchar(200) NOT NULL,
  `model` varchar(100) NOT NULL,
  `make` varchar(100) NOT NULL,
  `year_manufactured` int NOT NULL,
  `colour` char(25) NOT NULL,
  `odometer` decimal(10,2) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `reg_number`, `model`, `make`, `year_manufactured`, `colour`, `odometer`, `user_id`) VALUES
(1, '123tfsf12345', 'Yaris', 'Toyota', 2016, 'Red', '1200.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_service`
--

CREATE TABLE `car_service` (
  `car_id` int NOT NULL,
  `service_id` int NOT NULL,
  `service_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_service`
--

INSERT INTO `car_service` (`car_id`, `service_id`, `service_date`) VALUES
(1, 1, '2021-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `message_tb`
--

CREATE TABLE `message_tb` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_tb`
--

INSERT INTO `message_tb` (`id`, `name`, `email`, `phone`, `message`) VALUES
(4, 'Aman Kumar Thakur', 'amanthakuronly4u@gmail.com.', '8360822574.', 'testing form.\r\ntesting form.\r\ntesting form.');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` text NOT NULL,
  `sedan_price` decimal(10,2) NOT NULL,
  `suv_price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `extra_service` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `extra_service_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `img`, `sedan_price`, `suv_price`, `description`, `extra_service`, `extra_service_cost`) VALUES
(1, 'Platinum Service', 'platinum.jpg', '99.00', '109.00', 'Treat your car with a Platinum Service.\r\nInterior Vacuum,Interior & Exterior Glass, Interior Vinyl and Leather Cleaned, Spot Clean, Air Sanitiser, Clay Bar Treatment or Slipstream 60 Paint Treatment, Exterior Hand Wash and final Hand Polish with premium polish.', NULL, NULL),
(2, 'Premium Service', 'premium.jpg', '69.00', '79.00', 'Treat your car with a Premium Service\r\nYour Premium Service includes: Hand Wash, Wax & Chamols Dry Vacuum & Interior Window Clean, Interior Detailed, Hand & Wax Polish.', 'Clay Bar - Just add $15', '15.00'),
(3, 'Interior and Exterior', 'int.jpg', '45.00', '55.00', 'Your Interior and Exterior includes: Hand Wash, Wax & Chamols Dry Vacuum, Interior Dusted & Interior Windows.', 'Interior Detailing - Just add $15', '15.00'),
(4, 'Exterior Only', 'polish.jpg', '69.00', '79.00', 'Your Exterior Service includes: Hand Wash & Wax & Chamols Dry, Tyres Glossed.', 'Protective Wax - Just add $10', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `img` text NOT NULL,
  `user_type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `img`, `user_type`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '12345', '1620401640-index.jpg', 'standard'),
(3, 'Admin', 'admin@gmail.com', '12345', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `car_service`
--
ALTER TABLE `car_service`
  ADD KEY `car_id` (`car_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `message_tb`
--
ALTER TABLE `message_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_tb`
--
ALTER TABLE `message_tb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `car_service`
--
ALTER TABLE `car_service`
  ADD CONSTRAINT `car_service_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `car_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
