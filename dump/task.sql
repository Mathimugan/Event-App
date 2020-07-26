-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2020 at 02:24 PM
-- Server version: 5.7.28
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `event_id`, `name`, `email`, `created_date`, `user_id`) VALUES
(1, 22, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25', 0),
(2, 21, 'undefined', 'undefined', '2020-07-25', 0),
(3, 21, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25', 0),
(4, 18, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25', 0),
(5, 21, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25', 0),
(6, 19, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25', 0),
(7, 24, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-26', 0),
(8, 39, 'Demo', 'demo@gmail.com', '2020-07-26', 2),
(9, 40, 'Push', 'pushpa@gmail.com', '2020-07-26', 3),
(10, 38, '', '', '2020-07-26', 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(100) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL,
  `attachment` text,
  `refer_name` text,
  `upload_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_date`, `event_description`, `attachment`, `refer_name`, `upload_datetime`, `event_time`) VALUES
(38, 'New year celebration@  Suntech City', '2020-12-31', 'Zggsgsgs', 'Palani-Dhandayudhapaniswamy11.jpg', '385f1d5003d60d32.86483280.jpg', '2020-07-26 09:42:27', '06:00:00'),
(40, 'Testing', '2020-07-26', 'Testing has been done', 'unnamed.jpg', '405f1d6a39e4bf49.21772582.jpg', '2020-07-26 11:34:17', '19:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `created_date`, `status`, `email_id`) VALUES
(1, 'Admin', '$2y$10$w7AnuOSnMfOz0NzR3CURRuNAhR/w5tMW3aTH665Qfw1klvh2vFtAG', '2020-07-25', 'Active', 'admin@gmail.com'),
(2, 'Demo', '$2y$10$TtT8QAm405xYF6td4X.RBeiOE9lTA8.THRWop0nrNO9.1opEI20mm', '2020-07-26', 'Active', 'demo@gmail.com'),
(3, 'Push', '$2y$10$VD7Pz3/UUSoOlJoUrd7qRuayFYXdn.HyGheqSrpZfL9OYqnjNBvjW', '2020-07-26', 'Active', 'pushpa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(100) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `user_view` tinyint(1) NOT NULL,
  `user_edit` tinyint(1) NOT NULL,
  `user_delete` tinyint(1) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_id`, `group_name`, `user_view`, `user_edit`, `user_delete`, `user_id`) VALUES
(1, 'Admin', 1, 1, 1, 1),
(2, 'User', 0, 0, 0, 2),
(3, 'User', 0, 0, 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
