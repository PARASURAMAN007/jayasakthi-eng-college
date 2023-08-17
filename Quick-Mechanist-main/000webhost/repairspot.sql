-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 05:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repairspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `mech_approved`
--

CREATE TABLE `mech_approved` (
  `order_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `approved_mech_name` char(50) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `vehicle_problem` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `order_status` varchar(30) NOT NULL,
  `approved_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mech_mobile_num` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mech_details`
--

CREATE TABLE `mech_details` (
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `service_type_others` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mob_num` varchar(13) NOT NULL,
  `mech_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mech_details`
--

INSERT INTO `mech_details` (`latitude`, `longitude`, `otp`, `service_type`, `service_type_others`, `name`, `mob_num`, `mech_id`) VALUES
('13.1429', '79.9075', '', 'car_mechanic', '', 'JosephMechanic', '9444009634', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_booking_request`
--

CREATE TABLE `user_booking_request` (
  `name` varchar(50) NOT NULL,
  `user_request_place` varchar(200) DEFAULT NULL,
  `vehicle_type` varchar(20) DEFAULT NULL,
  `vehicle_problem` varchar(200) DEFAULT NULL,
  `request_status` varchar(20) DEFAULT NULL,
  `approved_mech_name` varchar(55) NOT NULL,
  `order_id` int(20) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latitude` varchar(11) NOT NULL,
  `longitude` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_booking_request`
--

INSERT INTO `user_booking_request` (`name`, `user_request_place`, `vehicle_type`, `vehicle_problem`, `request_status`, `approved_mech_name`, `order_id`, `last_updated`, `latitude`, `longitude`) VALUES
('Joseph', 'Darling Showroom Thiruvallur', 'Car i20 CDI', 'Puncher', 'PENDING', 'JosephMechanic', 1044, '2023-04-06 12:06:57', '13.1430891', '79.9084724');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `name` varchar(25) NOT NULL,
  `otp` int(11) NOT NULL,
  `mob_num` varchar(13) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`name`, `otp`, `mob_num`, `user_id`) VALUES
('Joseph', 6428, '9944622435', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mech_approved`
--
ALTER TABLE `mech_approved`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `mech_details`
--
ALTER TABLE `mech_details`
  ADD PRIMARY KEY (`mech_id`);

--
-- Indexes for table `user_booking_request`
--
ALTER TABLE `user_booking_request`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mech_details`
--
ALTER TABLE `mech_details`
  MODIFY `mech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_booking_request`
--
ALTER TABLE `user_booking_request`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1045;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
