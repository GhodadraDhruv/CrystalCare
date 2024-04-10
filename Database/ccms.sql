-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 04:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`) VALUES
(1, 'Admin', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `number` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstName`, `lastName`, `gender`, `email`, `password`, `number`) VALUES
(1, 'User', 'dd', 'm', 'user@gmail.com', 'C@2', 9876543215),
(2, 'Admin', 'Try', 'm', 'Check@gmail.com', 'A#3', 9865895465);

-- --------------------------------------------------------

--
-- Table structure for table `tblbunkenquiry`
--

CREATE TABLE `tblbunkenquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phonenumber` bigint(30) NOT NULL,
  `enquiry` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbunkenquiry`
--

INSERT INTO `tblbunkenquiry` (`id`, `name`, `address`, `phonenumber`, `enquiry`) VALUES
(1, 'sad', 'rajkot', 8794561235, 'hioiii');

-- --------------------------------------------------------

--
-- Table structure for table `tblcarcoatingbooking`
--

CREATE TABLE `tblcarcoatingbooking` (
  `id` int(11) NOT NULL,
  `bookingId` bigint(10) DEFAULT NULL,
  `packageType` varchar(120) DEFAULT NULL,
  `carcoatingPoint` int(11) DEFAULT NULL,
  `fullName` varchar(150) DEFAULT NULL,
  `noplate` varchar(30) NOT NULL,
  `mobileNumber` bigint(12) DEFAULT NULL,
  `coatingDate` date DEFAULT NULL,
  `coatingTime` time DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `paymentMode` varchar(120) DEFAULT NULL,
  `txnNumber` varchar(120) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcoatingplans`
--

CREATE TABLE `tblcoatingplans` (
  `id` int(11) NOT NULL,
  `coating` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcoatingplans`
--

INSERT INTO `tblcoatingplans` (`id`, `coating`, `price`) VALUES
(1, 'Glass Coating', '500'),
(2, 'Teflon Coating', '1500'),
(3, 'Ceramic Coating', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `tblcoatingpoints`
--

CREATE TABLE `tblcoatingpoints` (
  `id` int(11) NOT NULL,
  `coatingPointName` varchar(255) DEFAULT NULL,
  `coatingPointAddress` varchar(255) DEFAULT NULL,
  `contactNumber` bigint(20) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcoatingpoints`
--

INSERT INTO `tblcoatingpoints` (`id`, `coatingPointName`, `coatingPointAddress`, `contactNumber`, `creationDate`) VALUES
(1, 'Shree Car Paints', 'Rajkot, Gujarat ', 9685346825, '2023-12-25 04:51:20'),
(2, 'Quick Car Coating & Painting', 'Surat, Gujarat ', 9796584653, '2023-12-26 02:52:38'),
(3, 'Perfect Car Coating', 'Ahemadabad, Gujarat', 9998685785, '2024-02-19 15:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Check', 'hii', '2024-01-10 14:44:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL,
  `openignHrs` varchar(255) DEFAULT NULL,
  `phoneNumber` bigint(20) DEFAULT NULL,
  `emailId` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`, `openignHrs`, `phoneNumber`, `emailId`) VALUES
(11, 'contact', 'Rajkot,Gujarat.\r\n', 'Mon - Fri, 8:00 AM - 9:00 PM', 1234567890, 'info@example.com'),
(22, 'aboutus', '<div style=\\\"text-align: justify;\\\"><span style=\\\"color: rgb(0, 0, 0); font-family: Georgia; font-size: 15px;\\\">Car coatings, also known as nano coatings, glass coatings and quartz coatings, are semi-permanent coatings applied on different surfaces to protect them against environmental damage and make them easier to clean & maintain. Different variants of these nano coatings are used in different industries like automotive, textiles, marine, heavy equipment, construction and many more.<br><br>\r\n\r\n    Ceramic coating for the car is a sacrificial layer that is applied on the car’s exterior paint in order to protect it from environmental debris, UV rays, dirt, and minor swirls and scratches.</span></div><div style=\\\"text-align: justify;\\\"><span style=\\\"color: rgb(0, 0, 0); font-family: Georgia; font-size: 15px;\\\"><br></span></div<div></div>						', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbunkenquiry`
--
ALTER TABLE `tblbunkenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcarcoatingbooking`
--
ALTER TABLE `tblcarcoatingbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcoatingplans`
--
ALTER TABLE `tblcoatingplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcoatingpoints`
--
ALTER TABLE `tblcoatingpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblbunkenquiry`
--
ALTER TABLE `tblbunkenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcarcoatingbooking`
--
ALTER TABLE `tblcarcoatingbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblcoatingplans`
--
ALTER TABLE `tblcoatingplans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcoatingpoints`
--
ALTER TABLE `tblcoatingpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
