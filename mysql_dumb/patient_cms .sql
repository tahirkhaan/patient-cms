-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 10:48 PM
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
(1, 32, 'panadol extra .  omnidol');

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
(3, 110, '2017-08-06 20:17:16', 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` text,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `username`, `password`, `phone`, `email`) VALUES
(110, 'patient', 'fahad', 'fahad611', 'admin', '1212', 'fahad@gmail.com'),
(111, 'doctor', 'hairs', 'root', 'admin', '2323', 'patient@gmail.com'),
(119, 'patient', 'shdjh', 'jhjkh', 'jkh', 'jhjkhjkhjk', 'kjjhh@gmail.com'),
(121, 'patient', 'ljh', 'jlhjl', 'hj', 'hj', 'hjh@gmail.com'),
(122, 'patient', 'bilal', 'bilal12', 'admin', '9989', 'bilal@gmail.com'),
(123, 'doctor', 'ather', 'ather61', 'admin', '13131', 'ather@gmail.com'),
(124, 'patient', 'azar', 'azar611', 'admin', '87878', 'azar@gmail.com'),
(125, 'doctor', 'kalid', 'kalid611', 'admin', '9897', 'kalid@gmail.com');

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
  ADD UNIQUE KEY `usersname` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_readings`
--
ALTER TABLE `patient_readings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
