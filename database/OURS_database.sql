-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 04:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ours_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `SRCode` varchar(8) NOT NULL,
  `ProductID` varchar(8) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ProductID` varchar(8) NOT NULL,
  `ProductName` varchar(65) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ProductID`, `ProductName`, `Price`, `Quantity`) VALUES
('CP', 'Collar Pin', 35, 100),
('IDL', 'I.D Lace', 50, 100),
('JP', 'Jogging Pants', 270, 100),
('MB1', 'Man Barong (18)', 350, 100),
('MB10', 'Man Barong (SS)', 476, 100),
('MB2', 'Man Barong (S)', 350, 100),
('MB3', 'Man Barong (M)', 365, 100),
('MB4', 'Man Barong (L)', 380, 100),
('MB5', 'Man Barong (XL)', 380, 100),
('MB6', 'Man Barong (2XL)', 415, 100),
('MB7', 'Man Barong (3XL)', 450, 100),
('MB8', 'Man Barong (4XL)', 450, 100),
('MB9', 'Man Barong (5XL)', 450, 100),
('MP1', 'Man Pants (16)', 356, 100),
('MP2', 'Man Pants (20)', 356, 100),
('MP3', 'Man Pants (24)', 356, 100),
('MP4', 'Man Pants (26-30)', 360, 100),
('MP5', 'Man Pants (31-34)', 385, 100),
('MP6', 'Man Pants (36-38)', 410, 100),
('MP7', 'Man Pants (40)', 410, 100),
('MP8', 'Man Pants (42)', 410, 100),
('MP9', 'Man Pants (SS)', 580, 100),
('PET', 'P.E T-shirt', 175, 100),
('WB1', 'Woman Blouse (S)', 315, 100),
('WB10', 'Woman Blouse (SS)', 485, 100),
('WB2', 'Woman Blouse (M)', 380, 100),
('WB3', 'Woman Blouse (L)', 380, 100),
('WB4', 'Woman Blouse (XL)', 380, 100),
('WB5', 'Woman Blouse (2XL)', 380, 100),
('WB6', 'Woman Blouse (3XL)', 415, 100),
('WB7', 'Woman Blouse (4XL)', 415, 100),
('WB8', 'Woman Blouse (5XL)', 415, 100),
('WB9', 'Woman Blouse (6XL)', 485, 100),
('WS1', 'Woman Skirt (S)', 230, 100),
('WS2', 'Woman Skirt (M)', 230, 100),
('WS3', 'Woman Skirt (L)', 240, 100),
('WS4', 'Woman Skirt (XL)', 240, 100),
('WS5', 'Woman Skirt (2XL)', 240, 100),
('WS6', 'Woman Skirt (3XL)', 270, 100),
('WS7', 'Woman Skirt (4XL)', 270, 100),
('WS8', 'Woman Skirt (SS)', 305, 100);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_table`
--

CREATE TABLE `reservation_table` (
  `ReservationID` int(8) NOT NULL,
  `Srcode` varchar(8) NOT NULL,
  `FirstName` varchar(35) NOT NULL,
  `LastName` varchar(35) NOT NULL,
  `ProductID` varchar(8) NOT NULL,
  `ProductName` varchar(65) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `PickupSchedule` varchar(65) NOT NULL,
  `Time` varchar(8) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Srcode` varchar(8) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `FirstName` varchar(35) NOT NULL,
  `LastName` varchar(35) NOT NULL,
  `Program` varchar(65) NOT NULL,
  `Department` varchar(65) NOT NULL,
  `YearLevel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Srcode`, `Password`, `FirstName`, `LastName`, `Program`, `Department`, `YearLevel`) VALUES
('20-00211', 'iamrheamari', 'Rhea Mari', 'Labajo', 'BS Information Technology', 'CICS', 'Third Year'),
('20-00376', 'iampatricia', 'Patricia', 'Dela Cruz', 'BS Information Technology', 'CICS', 'Third Year'),
('20-02488', 'iamchelseaclaire', 'Chelsea Claire', 'Daquis', 'BS Information Technology', 'CICS', 'Third Year'),
('20-03942', 'iamjhomari', 'Jhomari', 'Ramirez', 'BS Information Technology', 'CICS', 'Third Year'),
('20-07208', 'iamkaren', 'Karen Justin Elaine', 'Rivera', 'BS Information Technology', 'CICS', 'Third Year'),
('20-08577', 'iamadriellejoy', 'Adrielle Joy', 'Furto', 'BS Information Technology', 'CICS', 'Third Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `reservation_table`
--
ALTER TABLE `reservation_table`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `Srcode` (`Srcode`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `ProductID_2` (`ProductID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Srcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_table`
--
ALTER TABLE `reservation_table`
  MODIFY `ReservationID` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation_table`
--
ALTER TABLE `reservation_table`
  ADD CONSTRAINT `reservation_table_ibfk_1` FOREIGN KEY (`Srcode`) REFERENCES `student` (`Srcode`),
  ADD CONSTRAINT `reservation_table_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `inventory` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
