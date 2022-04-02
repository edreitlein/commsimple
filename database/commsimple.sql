-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2022 at 01:24 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commsimple`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `listingID` int(11) NOT NULL COMMENT 'listing id autoincrements',
  `user_id` int(11) NOT NULL COMMENT 'the userID of the user who uploaded the listing',
  `timeListed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'when the listing was uploaded',
  `addressStreet` text NOT NULL COMMENT 'address',
  `addressCity` text NOT NULL COMMENT 'city',
  `addressState` text NOT NULL COMMENT 'state, stored in two character format ie NJ, NY, WI, MI',
  `addressZipcode` text NOT NULL COMMENT 'zipcode',
  `saleType` text NOT NULL COMMENT 'sale, auction, rent/lease',
  `description` longtext NOT NULL COMMENT 'any other description, bathroom, parking, main road prox, ect.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listingID`, `user_id`, `timeListed`, `addressStreet`, `addressCity`, `addressState`, `addressZipcode`, `saleType`, `description`) VALUES
(2, 1, '2022-04-01 23:42:28', 'trew', 'trew', 'AZ', 'trew', 'Auction', 'trew'),
(3, 1, '2022-04-01 23:48:23', '4', '13', 'AK', '4321', 'Lease', '4321234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'user id should be auto incrementing',
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` varchar(320) NOT NULL COMMENT '320 length because that is apparently the longest possible email address length',
  `password` text NOT NULL COMMENT 'should be hashed later'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'eric', 'dreitlein', 'edreitlein@drew.edu', '1234'),
(2, 'user1', 'user1l', 'user1@gmail.com', '1234'),
(3, 'user2', 'user2l', 'user2@user2.com', '1234'),
(4, '1', '1', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`listingID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `listingID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'listing id autoincrements', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id should be auto incrementing', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
