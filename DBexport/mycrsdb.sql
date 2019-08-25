-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:49399
-- Generation Time: Aug 25, 2019 at 03:49 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycrsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `priceperday` varchar(50) NOT NULL,
  `make` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `color` varchar(50) NOT NULL,
  `miles` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `createDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `priceperday`, `make`, `model`, `year`, `color`, `miles`, `status`, `type`, `createDate`, `endDate`) VALUES
(3, '300', 'BMW', 'M3', 2019, 'green', 3000, 'rented', 'Sports Car', '2019-02-06', '2019-02-09'),
(4, '100', 'Toyota', 'RAV4', 2018, 'red', 1000, 'Available', 'Mini SUV', '2019-08-09', '2020-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `pickupdate` date NOT NULL,
  `returndate` date NOT NULL,
  `destination` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `statusID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `userID`, `carID`, `pickupdate`, `returndate`, `destination`, `total`, `statusID`) VALUES
(6, 2, 3, '2019-08-13', '2019-08-13', 'la', 500, 'cancelled'),
(7, 4, 6, '2019-08-16', '2019-08-30', 'dc', 1000, 'In progess');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`) VALUES
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(200) DEFAULT NULL,
  `account_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fullname`, `pass`, `address`, `phone`, `email`, `profile_photo`, `account_type`) VALUES
(7, 'admin', '0192023a7bbd73250516f069df18b500', '', NULL, 'admin@gmail.com', NULL, 'admin'),
(17, 'test user', '16d7a4fca7442dda3ad93c9a726597e4', '', NULL, 'test@gmail.com', NULL, 'user'),
(18, 'Le', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, 'le@gmail.com', NULL, 'user'),
(19, 'lee', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, 'sip@gmail.com', NULL, 'user'),
(21, 'john smith', '12aea210b4563725861aaf72ac7b6b8a', '1234 1 ave s mn', '952211111', 'john.smith@gmail.com', NULL, 'user'),
(22, 'test user 2', 'cc03e747a6afbbcbf8be7668acfebee5', '1223', 'test', 'test2@gmail.com', NULL, 'clerk'),
(23, 'hassen', 'cc03e747a6afbbcbf8be7668acfebee5', '12345', '123454', 'hassen@gmail.com', NULL, NULL),
(24, 'hassen3', '39d0d586a701e199389d954f2d592720', 'sdaf', 'sadf', 'hassen2@gmail.com', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`fullname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
