-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 05:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `kupci`
--

CREATE TABLE `kupci` (
  `Id` int(11) NOT NULL,
  `Ime` varchar(255) NOT NULL,
  `Prezime` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupci`
--

INSERT INTO `kupci` (`Id`, `Ime`, `Prezime`, `Email`) VALUES
(1, 'Lucija', 'Mikulic', 'lucija.mikulic@gmail.com'),
(2, 'Karlo', 'Rajić', 'rajic@yahoo.com'),
(3, 'Vlado', 'Trešnja', 'vlada@gmail.com'),
(4, 'Darija', 'Huljić', 'hulja@aspira.hr'),
(5, 'Mislav', 'Markić', 'marko@inet.hr');

-- --------------------------------------------------------

--
-- Table structure for table `najmovi`
--

CREATE TABLE `najmovi` (
  `Id` int(10) NOT NULL,
  `VoziloID` int(10) NOT NULL,
  `KupacID` int(10) NOT NULL,
  `BrojDana` int(10) NOT NULL,
  `UkupnaZarada` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vozila`
--

CREATE TABLE `vozila` (
  `Id` int(11) NOT NULL,
  `Ime` varchar(255) NOT NULL,
  `Cijena` int(11) NOT NULL,
  `Kategorija` varchar(255) NOT NULL,
  `Kolicina` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vozila`
--

INSERT INTO `vozila` (`Id`, `Ime`, `Cijena`, `Kategorija`, `Kolicina`) VALUES
(1, 'Tesla', 3200, 'Automobil', 8),
(2, 'Škoda', 230, 'Automobil', 21),
(4, 'Vespa', 110, 'Skuter', 3),
(5, 'Yamaha', 80, 'Skuter', 43),
(6, 'BTWIN', 40, 'Bicikl', 16),
(7, 'Rockrider', 60, 'Bicikl', 9),
(55, 'BMW', 650, 'Automobil', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kupci`
--
ALTER TABLE `kupci`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `najmovi`
--
ALTER TABLE `najmovi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`),
  ADD KEY `test` (`KupacID`),
  ADD KEY `test2` (`VoziloID`);

--
-- Indexes for table `vozila`
--
ALTER TABLE `vozila`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kupci`
--
ALTER TABLE `kupci`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `najmovi`
--
ALTER TABLE `najmovi`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vozila`
--
ALTER TABLE `vozila`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `najmovi`
--
ALTER TABLE `najmovi`
  ADD CONSTRAINT `test` FOREIGN KEY (`KupacID`) REFERENCES `kupci` (`Id`),
  ADD CONSTRAINT `test2` FOREIGN KEY (`VoziloID`) REFERENCES `vozila` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
