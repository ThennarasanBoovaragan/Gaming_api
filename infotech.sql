-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 10, 2021 at 08:06 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `recinfot_8ballgamedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(11) NOT NULL,
  `rNickname` varchar(15) NOT NULL,
  `rEmail` varchar(32) NOT NULL,
  `rPassword` varchar(32) NOT NULL,
  `rPoint` varchar(33) NOT NULL,
  `updateFreeCredit` varchar(33) NOT NULL,
  `amount` varchar(33) NOT NULL,
  `jwt` varchar(42) NOT NULL,
  `tags` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `rNickname`, `rEmail`, `rPassword`, `rPoint`, `updateFreeCredit`, `amount`, `jwt`, `tags`) VALUES
(1, 'Prithvi', 'test@gmail.com', 'Test@123', '', '', '', '',''),
(2, 'Ramya', 'ramya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '',''),
(6, 'Anu', 'anu@gmail.com', '69c459dd76c6198f72f0c20ddd3c9447', '', '', '', '',''),
(7, 'Reshma', 'test@gmail.com', 'Test@123', '', '', '', '',''),
(8, 'Thennarasan', 'thennarasan@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '', '', '', '',''),
(9, 'Gunal', 'gunal@gmail.com', 'bb8bcc5cab7e8958c86849dcdb1f2081', '', '', '', '',''),
(10, 'Nithin', 'nithin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '', '', '', '',''),
(11, 'Nakul', 'nakul20@gmail.com', '326df57a15ecf5207f93b36a459d898e', '', '', '', '','');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

