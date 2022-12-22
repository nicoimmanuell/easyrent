-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 01:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbus`
--

CREATE TABLE `tbbus` (
  `BusID` varchar(10) NOT NULL,
  `BusName` varchar(255) NOT NULL,
  `BusPlat` varchar(10) NOT NULL,
  `Capacity` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `RentStat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbus`
--

INSERT INTO `tbbus` (`BusID`, `BusName`, `BusPlat`, `Capacity`, `Price`, `RentStat`) VALUES
('BUS0001', 'Mercedes-Benz 508i', 'B 2834 KGH', '47-48', 2600000, 'AVAILABLE'),
('BUS0002', 'Mercedes-Benz 599i', 'B 3749 KDA', '31-41', 1500000, 'AVAILABLE'),
('BUS0003', 'JetBus HDD 2+', 'B 8750 GJT', '47-48', 2000000, 'AVAILABLE'),
('BUS0004', 'Mercedes-Benz OC 500', 'B 6587 YKD', '47-48', 3000000, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tbcar`
--

CREATE TABLE `tbcar` (
  `CarID` varchar(10) NOT NULL,
  `CarName` varchar(255) NOT NULL,
  `CarPlat` varchar(10) NOT NULL,
  `CarCC` int(11) NOT NULL,
  `Capacity` varchar(20) NOT NULL,
  `CarTM` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `RentStat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbcar`
--

INSERT INTO `tbcar` (`CarID`, `CarName`, `CarPlat`, `CarCC`, `Capacity`, `CarTM`, `Price`, `RentStat`) VALUES
('CAR0001', 'Honda Jazz', 'F 1837 OST', 1500, '5', 'Automatic', 300000, 'AVAILABLE'),
('CAR0003', 'Toyota Kijang Innova', 'B 3749 KMR', 2000, '8', 'Manual', 400000, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE `tbcustomer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(30) DEFAULT NULL,
  `BirthDate` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`CustomerID`, `Name`, `Gender`, `BirthDate`, `Address`, `PhoneNumber`) VALUES
(1, 'Nico Immanuel', 'Male', '2002-01-30', 'Jalan Taman Matahari 3 Blok E3 No. 02', '088809879020'),
(2, 'Jovan Febrian', 'Male', '2002-01-08', 'Jalan Matahari 3', '088545796215'),
(3, 'Christine', 'Female', '2022-03-09', 'Jalan Flamboyan Indah 1', '088625370044');

-- --------------------------------------------------------

--
-- Table structure for table `tbmotorcycle`
--

CREATE TABLE `tbmotorcycle` (
  `MotorID` varchar(10) NOT NULL,
  `MotorName` varchar(255) NOT NULL,
  `MotorPlat` varchar(10) NOT NULL,
  `MotorCC` int(11) NOT NULL,
  `MotorTM` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `RentStat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbmotorcycle`
--

INSERT INTO `tbmotorcycle` (`MotorID`, `MotorName`, `MotorPlat`, `MotorCC`, `MotorTM`, `Price`, `RentStat`) VALUES
('MTR0001', 'Honda PCX', 'B 2648 TRD', 150, 'Automatic', 70000, 'AVAILABLE'),
('MTR0002', 'Yamaha Aerox', 'B 1889 KFR', 155, 'Automatic', 70000, 'AVAILABLE'),
('MTR0003', 'Yamaha Mio', 'B 1976 FKJ', 125, 'Automatic', 50000, 'AVAILABLE'),
('MTR0004', 'Honda Beat', 'B 5594 GKH', 110, 'Automatic', 50000, 'AVAILABLE'),
('MTR0005', 'Yamaha Lexi', 'B 9863 TLG', 125, 'Automatic', 60000, 'AVAILABLE'),
('MTR0006', 'Kawasaki Ninja', 'B 6484 LTD', 250, 'Manual', 300000, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE `tborder` (
  `OrderID` int(11) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `VehicleID` varchar(10) NOT NULL,
  `VehicleName` varchar(255) NOT NULL,
  `VehiclePlat` varchar(10) NOT NULL,
  `RentDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `RentPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbus`
--
ALTER TABLE `tbbus`
  ADD PRIMARY KEY (`BusID`),
  ADD UNIQUE KEY `BusPlat` (`BusPlat`);

--
-- Indexes for table `tbcar`
--
ALTER TABLE `tbcar`
  ADD PRIMARY KEY (`CarID`),
  ADD UNIQUE KEY `CarPlat` (`CarPlat`);

--
-- Indexes for table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `tbmotorcycle`
--
ALTER TABLE `tbmotorcycle`
  ADD PRIMARY KEY (`MotorID`),
  ADD UNIQUE KEY `MotorPlat` (`MotorPlat`);

--
-- Indexes for table `tborder`
--
ALTER TABLE `tborder`
  ADD PRIMARY KEY (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tborder`
--
ALTER TABLE `tborder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
