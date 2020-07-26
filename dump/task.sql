-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 04:05 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `event_id`, `name`, `email`, `created_date`) VALUES
(1, 22, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25'),
(2, 21, 'undefined', 'undefined', '2020-07-25'),
(3, 21, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25'),
(4, 18, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25'),
(5, 21, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25'),
(6, 19, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-25'),
(7, 24, 'MathiMugan', 'mathimugancse2010@gmail.com', '2020-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(100) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL,
  `attachment` text NOT NULL,
  `refer_name` text NOT NULL,
  `upload_datetime` datetime NOT NULL,
  `event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_date`, `event_description`, `attachment`, `refer_name`, `upload_datetime`, `event_time`) VALUES
(28, 'Chinese New Year @ Suntec Citys', '2020-07-08', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'c77cfd8a6d3845e3954e87ac5f68ac67.jpg', '285f1ce89bb2ba65.14481853.jpg', '2020-07-26 10:21:15', '12:20:00'),
(30, 'Year End Celebration', '2020-11-30', 'Tesgdgsgsgsgssg', '2cdc1f968156e8cdf3b62f5ef7e72311.jpg', '305f1d00ca39b2d4.49475956.jpg', '2020-07-26 12:04:26', '18:00:00'),
(31, 'Gsgsgs', '2020-07-26', 'This is new text', 'original.jpg', '315f1d030a0c8c64.90863256.jpg', '2020-07-26 12:14:02', '18:13:00'),
(32, 'Dgsg', '2020-07-28', 'Sfstsfsgsfdgdgdgdgsgsfsfsfsgsgsgsgsgsgs\r\nggsgsgs', '30945067690_0a9a35f210_b.jpg', '325f1d03ebc06ae5.80757461.jpg', '2020-07-26 12:17:47', '18:17:00');

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
(1, 'Admin', '$2y$10$w7AnuOSnMfOz0NzR3CURRuNAhR/w5tMW3aTH665Qfw1klvh2vFtAG', '2020-07-25', 'Active', 'admin@gmail.com');

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
(1, 'Admin', 1, 1, 1, 1);

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
  MODIFY `booking_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
