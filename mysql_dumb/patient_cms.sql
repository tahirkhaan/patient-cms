-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 04:24 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_medication`
--

CREATE TABLE `patient_medication` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `medication` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_medication`
--

INSERT INTO `patient_medication` (`id`, `user_id`, `medication`) VALUES
(1, 32, 'sfn,ba,nbdnasbd,sabd,bas');

-- --------------------------------------------------------

--
-- Table structure for table `patient_readings`
--

CREATE TABLE `patient_readings` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pulse` float NOT NULL,
  `bp1` float NOT NULL,
  `bp2` float NOT NULL,
  `temp` float NOT NULL,
  `glucose` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_readings`
--

INSERT INTO `patient_readings` (`id`, `user_id`, `timestamp`, `pulse`, `bp1`, `bp2`, `temp`, `glucose`) VALUES
(1, 32, '2017-08-04 12:03:22', 12, 12, 12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` text,
  `usersname` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `usersname`, `password`, `phone`, `email`) VALUES
(32, 'patient', 'tahirkhan', '123456789', '03328986797', 'khan@gmail.com'),
(36, 'doctor', 'tahir', '123456', 'fhf', 'fggfgf'),
(38, 'Doctor', 'abddullah', 'dream12345', 'fhf', 'fggfgf nmjj'),
(46, 'Doctor', 'sardar faiza', 'kdisnsdjn', '013589490', 'aizan@gmail.com'),
(49, 'patient', 'ali', 'dream12345', '0335548795', 'yaahh@hghgh.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_readings`
--
ALTER TABLE `patient_readings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usersname` (`usersname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_readings`
--
ALTER TABLE `patient_readings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
