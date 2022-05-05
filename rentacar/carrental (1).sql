-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 03:20 PM
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
(143, 'Karla', 'Mikulic', 'lucija.mikulic@live.com'),
(144, 'Marija', 'Duplić', 'marija@inet.hr'),
(145, 'Matej', 'Laurić', 'laura@yahoo.com'),
(146, 'Dragutin', 'Perković', 'dragulj@hotmail.com'),
(169, 'Linda', 'Prelijepa', 'linda@gmail.com'),
(182, 'Molim', 'Lijepo', 'radipliz@net.hr'),
(185, 'Molim', 'Te', 'boze@gmail.com'),
(186, 'Honda', 'safd', 'ant@outlook.com'),
(187, 'Vozilo', 'hes', 'y@gmail.com'),
(188, 'Honda', 'hgfd', 'gladna.je@gmail.com'),
(189, 'Lucija', 'Mikulic', 'lucija@gmail.com'),
(190, 'Lucija', 'Vjerkić', 'tg@g.l'),
(191, 'Sandra', 'sadf', 'hjoj@gmai.c'),
(193, 'Karla', 'Mikulic', 'erg@g.k'),
(194, 'Ante', 'Automobil', 'aut@gmail.com'),
(196, 'Marijana', 'Petrov', 'marre@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `najmovi`
--

CREATE TABLE `najmovi` (
  `Id` int(10) NOT NULL,
  `VoziloID` int(10) NOT NULL,
  `KupacID` int(10) NOT NULL,
  `BrojDana` int(10) NOT NULL,
  `Total` int(255) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Deactivated',
  `Cijena` int(11) NOT NULL,
  `imeKupca` varchar(50) DEFAULT NULL,
  `prezimeKupca` varchar(50) DEFAULT NULL,
  `emailKupca` varchar(50) DEFAULT NULL,
  `imeVozila` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `najmovi`
--

INSERT INTO `najmovi` (`Id`, `VoziloID`, `KupacID`, `BrojDana`, `Total`, `Status`, `Cijena`, `imeKupca`, `prezimeKupca`, `emailKupca`, `imeVozila`) VALUES
(72, 1, 143, 8, 25600, 'Activated', 0, NULL, NULL, NULL, NULL),
(73, 55, 144, 3, 1950, 'Activated', 0, NULL, NULL, NULL, NULL),
(74, 5, 145, 7, 560, 'Activated', 0, NULL, NULL, NULL, NULL),
(75, 2, 146, 2, 460, 'Activated', 0, NULL, NULL, NULL, NULL),
(98, 4, 169, 6, 660, 'Activated', 0, NULL, NULL, NULL, NULL),
(111, 6, 182, 6, 240, 'Activated', 0, NULL, NULL, NULL, NULL),
(114, 1, 185, 7, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(115, 1, 186, 4, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(116, 1, 187, 5, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(117, 1, 188, 5, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(118, 1, 189, 2, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(119, 2, 190, 2, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(120, 4, 191, 2, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(122, 1, 193, 2, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(123, 1, 194, 2, 0, 'Activated', 0, NULL, NULL, NULL, NULL),
(125, 2, 196, 7, 0, 'Activated', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vozila`
--

CREATE TABLE `vozila` (
  `Id` int(11) NOT NULL,
  `Ime` varchar(255) NOT NULL,
  `Cijena` int(11) NOT NULL,
  `Kategorija` varchar(255) NOT NULL,
  `Kolicina` int(100) NOT NULL,
  `Oznaka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vozila`
--

INSERT INTO `vozila` (`Id`, `Ime`, `Cijena`, `Kategorija`, `Kolicina`, `Oznaka`) VALUES
(1, 'Tesla', 3200, 'Automobil', 0, 0),
(2, 'Škoda', 230, 'Automobil', 14, 0),
(4, 'Vespa', 110, 'Skuter', 2, 0),
(5, 'Yamaha', 80, 'Skuter', 39, 0),
(6, 'BTWIN', 40, 'Bicikl', 12, 0),
(7, 'Rockrider', 60, 'Bicikl', 4, 0),
(55, 'BMW', 650, 'Automobil', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kupci`
--
ALTER TABLE `kupci`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `najmovi`
--
ALTER TABLE `najmovi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `test` (`KupacID`),
  ADD KEY `test2` (`VoziloID`);

--
-- Indexes for table `vozila`
--
ALTER TABLE `vozila`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kupci`
--
ALTER TABLE `kupci`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `najmovi`
--
ALTER TABLE `najmovi`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

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
  ADD CONSTRAINT `test` FOREIGN KEY (`KupacID`) REFERENCES `kupci` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test2` FOREIGN KEY (`VoziloID`) REFERENCES `vozila` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
