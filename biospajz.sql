-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 04:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biospajz`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `kategorijaId` int(11) NOT NULL,
  `imeKategorije` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`kategorijaId`, `imeKategorije`) VALUES
(1, 'Suseno voce'),
(2, 'Dzemovi'),
(3, 'Zitarice'),
(4, 'Proizvodi od mleka'),
(5, 'Veganski proizvodi');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikId`, `username`, `password`) VALUES
(1, 'vesna', 'vesna'),
(2, 'admin', 'admin'),
(3, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `proizvodId` int(11) NOT NULL,
  `imeProizvoda` varchar(255) NOT NULL,
  `nutritivnaVrednost` int(255) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `kategorijaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvodId`, `imeProizvoda`, `nutritivnaVrednost`, `cena`, `kategorijaId`) VALUES
(1, 'Susena jabuka', 200, '150.00', 1),
(2, 'Suseno grozdje', 190, '200.00', 1),
(3, 'Dzem od jagoda', 500, '600.00', 2),
(4, 'Dzem od borovnica', 450, '700.00', 2),
(5, 'Psenicne mekinje', 200, '300.00', 3),
(6, 'Integralne mekinje', 210, '300.00', 3),
(7, 'Jogurt', 130, '200.00', 4),
(8, 'Vegetarijanski burger', 320, '500.00', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`kategorijaId`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikId`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`proizvodId`),
  ADD KEY `kategorijaId` (`kategorijaId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `kategorijaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `proizvodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`kategorijaId`) REFERENCES `kategorija` (`kategorijaId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
