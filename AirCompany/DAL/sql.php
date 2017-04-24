-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8081
-- Generation Time: Apr 24, 2017 at 01:02 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `AirCompanyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `AirportTable`
--

CREATE TABLE `AirportTable` (
  `Id` int(11) NOT NULL,
  `Code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `AirportTable`
--

INSERT INTO `AirportTable` (`Id`, `Code`, `Name`, `City`) VALUES
(3, 'ADB', 'Adnan Menderes', 'İzmir'),
(4, 'IST', 'Atatürk', 'İstanbul'),
(5, 'SAW', 'S.Gökçen', 'İstanbul'),
(6, 'ESB', 'Esenboğa', 'Ankara'),
(7, 'AYT', 'Antalya', 'Antalya');

-- --------------------------------------------------------

--
-- Table structure for table `CheckinTable`
--

CREATE TABLE `CheckinTable` (
  `CheckId` int(11) NOT NULL,
  `FlightId` int(11) NOT NULL,
  `PNR` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Seat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IsChecked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `FlightTable`
--

CREATE TABLE `FlightTable` (
  `Id` int(11) NOT NULL,
  `FlightNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PlaneId` int(11) NOT NULL,
  `DepartureId` int(11) NOT NULL,
  `DestinationId` int(11) NOT NULL,
  `DepartureDateTime` datetime NOT NULL,
  `ArrivalDateTime` datetime NOT NULL,
  `Price` double NOT NULL,
  `Gate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `LoggingTable`
--

CREATE TABLE `LoggingTable` (
  `Id` int(11) NOT NULL,
  `Entity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Operation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PlaneTable`
--

CREATE TABLE `PlaneTable` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Capacity` int(11) NOT NULL DEFAULT '120',
  `RegistrationNumber` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PlaneTable`
--

INSERT INTO `PlaneTable` (`Id`, `Name`, `Capacity`, `RegistrationNumber`, `Status`) VALUES
(21, 'Kartal', 120, 'AA1001', 'ucusta'),
(22, 'Murat', 120, 'AA1002', 'ucusta'),
(23, 'Şahin', 120, 'AA1003', 'bakımda'),
(24, 'Doğan', 120, 'AA1004', 'uçuşta'),
(25, 'Kanarya', 120, 'AA1005', 'bakımda'),
(26, 'q', 120, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `UserTable`
--

CREATE TABLE `UserTable` (
  `Id` int(11) NOT NULL,
  `NameSurname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AirportTable`
--
ALTER TABLE `AirportTable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `CheckinTable`
--
ALTER TABLE `CheckinTable`
  ADD PRIMARY KEY (`CheckId`),
  ADD KEY `FlightId` (`FlightId`);

--
-- Indexes for table `FlightTable`
--
ALTER TABLE `FlightTable`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DepartureId` (`DepartureId`),
  ADD KEY `DestinationId` (`DestinationId`),
  ADD KEY `PlaneId` (`PlaneId`);

--
-- Indexes for table `LoggingTable`
--
ALTER TABLE `LoggingTable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `PlaneTable`
--
ALTER TABLE `PlaneTable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `UserTable`
--
ALTER TABLE `UserTable`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AirportTable`
--
ALTER TABLE `AirportTable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `CheckinTable`
--
ALTER TABLE `CheckinTable`
  MODIFY `CheckId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `FlightTable`
--
ALTER TABLE `FlightTable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `LoggingTable`
--
ALTER TABLE `LoggingTable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PlaneTable`
--
ALTER TABLE `PlaneTable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `UserTable`
--
ALTER TABLE `UserTable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CheckinTable`
--
ALTER TABLE `CheckinTable`
  ADD CONSTRAINT `FlightId` FOREIGN KEY (`FlightId`) REFERENCES `FlightTable` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `FlightTable`
--
ALTER TABLE `FlightTable`
  ADD CONSTRAINT `DepartureId` FOREIGN KEY (`DepartureId`) REFERENCES `AirportTable` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `DestinationId` FOREIGN KEY (`DestinationId`) REFERENCES `AirportTable` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `PlaneId` FOREIGN KEY (`PlaneId`) REFERENCES `PlaneTable` (`Id`) ON DELETE CASCADE;
