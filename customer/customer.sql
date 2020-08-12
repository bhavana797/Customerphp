-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 04:36 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'India'),
(2, 'China'),
(3, 'France'),
(4, 'Brazil'),
(5, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `firstname`, `lastname`, `email`, `mobile`, `country`, `state`, `pincode`, `photo`) VALUES
(12, 'bhavana', 'kale', 'bhavanakale123@gmail.com', '9850563286', '1', 'MAHARASHTRA', '443303', 'gps.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(26, 'ANDHRA PRADESH', 1),
(27, 'ASSAM', 1),
(28, 'ARUNACHAL PRADESH', 1),
(29, 'BIHAR', 1),
(30, 'GUJRAT', 1),
(31, 'HARYANA', 1),
(32, 'HIMACHAL PRADESH', 1),
(33, 'JAMMU & KASHMIR', 1),
(34, 'KARNATAKA', 1),
(35, 'KERALA', 1),
(36, 'MADHYA PRADESH', 1),
(37, 'MAHARASHTRA', 1),
(38, 'MANIPUR', 1),
(39, 'MEGHALAYA', 1),
(40, 'MIZORAM', 1),
(41, 'NAGALAND', 1),
(42, 'ORISSA', 1),
(43, 'PUNJAB', 1),
(44, 'RAJASTHAN', 1),
(45, 'SIKKIM', 1),
(46, 'TAMIL NADU', 1),
(47, 'TRIPURA', 1),
(48, 'UTTAR PRADESH', 1),
(49, 'WEST BENGAL', 1),
(50, 'DELHI', 1),
(51, 'GOA', 1),
(52, 'PONDICHERY', 1),
(53, 'LAKSHDWEEP', 1),
(54, 'DAMAN & DIU', 1),
(55, 'DADRA & NAGAR', 1),
(56, 'CHANDIGARH', 1),
(57, 'ANDAMAN & NICOBAR', 1),
(58, 'UTTARANCHAL', 1),
(59, 'JHARKHAND', 1),
(60, 'CHATTISGARH', 1),
(61, 'ANDHRA PRADESH', 1),
(62, 'ASSAM', 1),
(63, 'ARUNACHAL PRADESH', 1),
(64, 'BIHAR', 1),
(65, 'GUJRAT', 1),
(66, 'HARYANA', 1),
(67, 'HIMACHAL PRADESH', 1),
(68, 'JAMMU & KASHMIR', 1),
(69, 'KARNATAKA', 1),
(70, 'KERALA', 1),
(71, 'MADHYA PRADESH', 1),
(72, 'MAHARASHTRA', 1),
(73, 'MANIPUR', 1),
(74, 'MEGHALAYA', 1),
(75, 'MIZORAM', 1),
(76, 'NAGALAND', 1),
(77, 'ORISSA', 1),
(78, 'PUNJAB', 1),
(79, 'RAJASTHAN', 1),
(80, 'SIKKIM', 1),
(81, 'TAMIL NADU', 1),
(82, 'TRIPURA', 1),
(83, 'UTTAR PRADESH', 1),
(84, 'WEST BENGAL', 1),
(85, 'DELHI', 1),
(86, 'GOA', 1),
(87, 'PONDICHERY', 1),
(88, 'LAKSHDWEEP', 1),
(89, 'DAMAN & DIU', 1),
(90, 'DADRA & NAGAR', 1),
(91, 'CHANDIGARH', 1),
(92, 'ANDAMAN & NICOBAR', 1),
(93, 'UTTARANCHAL', 1),
(94, 'JHARKHAND', 1),
(95, 'CHATTISGARH', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
