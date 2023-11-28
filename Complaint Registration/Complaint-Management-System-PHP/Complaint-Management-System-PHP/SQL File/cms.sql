-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 12:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(259) DEFAULT NULL,
  `mobilenumber` bigint(11) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `mobilenumber`, `email`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 8956232356, 'admin@gmail.com', 'admin', 'f925916e2754e5e03f75dd58a5733251', '2023-09-12 05:16:16', '18-10-2016 04:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'E-commerce', 'E-commerce', '2023-08-28 07:10:55', '2023-09-14 07:10:30'),
(2, 'general', 'dsdas', '2023-08-11 10:54:06', '2023-09-14 07:10:46'),
(4, 'Consumer', 'Consumer complain lodged', '2023-09-12 06:26:48', NULL),
(5, 'Bank', 'Bank related user complaints', '2023-09-12 06:27:36', NULL),
(6, 'Labour', 'Labour related user complaints', '2023-09-12 06:33:43', '2023-09-12 06:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `remarkDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 3, 'in process', 'your ticket forward to associated team', '2023-09-15 13:05:38'),
(2, 3, 'closed', 'Ticket close in favor of user', '2023-09-15 13:06:31'),
(3, 5, 'in process', 'We are reviewing the complaint', '2023-10-01 04:12:48'),
(4, 5, 'closed', 'Issue resolved', '2023-10-01 04:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `stateDescription` tinytext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `stateName`, `stateDescription`, `postingDate`, `updationDate`) VALUES
(3, 'Uttar Pradesh', 'Uttar Pradesh-UP', '2023-09-28 16:56:56', '2023-10-01 10:30:30'),
(4, 'Punjab', 'Punjab-PB', '2023-09-28 16:56:56', '2023-10-01 10:30:33'),
(5, 'Haryana', 'Haryana-HR', '2023-09-28 16:56:56', '2023-10-01 10:30:36'),
(6, 'Delhi', 'Delhi-DL', '2023-09-28 16:56:56', '2023-10-01 10:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Online Shopping', '2023-03-28 07:11:07', '2023-09-14 07:10:13'),
(2, 1, 'E-wllaet', '2023-08-28 07:11:20', '2023-09-14 07:10:00'),
(3, 2, 'other', '2023-09-14 07:06:44', '2023-09-14 07:09:47'),
(4, 2, 'ABC', '2023-09-12 11:40:13', '2023-09-12 11:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `complaintType` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `noc` varchar(255) DEFAULT NULL,
  `complaintDetails` mediumtext DEFAULT NULL,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `subcategory`, `complaintType`, `state`, `noc`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(1, 3, 1, 'Online Shopping', ' Complaint', 'Punjab', 'Complain against Shopping website', 'company name xyz has not return my money after returning the item.', '', '2023-09-15 12:33:14', NULL, '2023-09-15 12:56:52'),
(2, 4, 1, 'E-wllaet', 'General Query', 'Punjab', 'htrdy', 'dytuj', '7db575b77409a4ad74cb9620814085e8.jpg', '2023-09-15 12:41:41', NULL, NULL),
(3, 1, 1, 'E-wllaet', 'General Query', 'Punjab', 'htrdy', 'dytuj', '7db575b77409a4ad74cb9620814085e8.jpg', '2023-09-15 12:45:26', 'closed', '2023-09-15 13:06:31'),
(4, 5, 1, 'Online Shopping', ' Complaint', 'Delhi', 'Complain against Shopping website', 'This is for testing.', '2c86e2aa7eb4cb4db70379e28fab9b52.pdf', '2023-09-26 01:28:17', NULL, NULL),
(5, 6, 1, 'Online Shopping', 'General Query', 'Punjab', 'Test nature', 'This is for testing', '858828b8b12d041fde07b353a94db5ed.png', '2023-10-01 04:12:07', 'closed', '2023-10-01 04:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `State`, `country`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(1, 'Anuj Kumar', 'anuj.lpu1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 9999857860, 'Shakarpur', 'Uttar Pradesh', 'India', 110092, '6e8024ec26c292f258ec30f01e0392dc.png', '2023-09-28 16:56:56', '2023-09-28 16:56:56', 1),
(2, 'test', 'test@123', '202cb962ac59075b964b07152d234b70', 7894561236, NULL, NULL, NULL, NULL, NULL, '2023-09-13 05:05:11', NULL, 1),
(3, 'Ram', 'ram@gmail.com', '202cb962ac59075b964b07152d234b70', 1234567899, NULL, NULL, NULL, NULL, NULL, '2023-09-15 06:33:30', NULL, 1),
(4, 'Rakesh Sharma', 'rakesh@gmail.com', '202cb962ac59075b964b07152d234b70', 8989898989, 'J-789, Near Metro Station', 'Delhi', 'India', 110110, 'e9a19a656ca1e4758c2025fe1adaeb64.jpg', '2023-09-15 06:43:53', NULL, 1),
(5, 'John Doe', 'jhndoe12@test.com', 'f925916e2754e5e03f75dd58a5733251', 4141414141, NULL, NULL, NULL, NULL, NULL, '2023-09-26 01:06:49', NULL, 1),
(6, 'Garima', 'grmat@test.com', 'f925916e2754e5e03f75dd58a5733251', 1234563214, 'A1 1222 XYZ Aprtment', 'Delhi', 'India', 110001, NULL, '2023-10-01 04:10:45', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
