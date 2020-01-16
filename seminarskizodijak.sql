-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2017 at 07:40 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seminarskizodijak`
--
CREATE DATABASE IF NOT EXISTS `seminarskizodijak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `seminarskizodijak`;

-- --------------------------------------------------------

--
-- Table structure for table `astrolozi`
--

CREATE TABLE IF NOT EXISTS `astrolozi` (
  `astrologID` int(11) NOT NULL AUTO_INCREMENT,
  `imePrezimeAstrologa` varchar(255) NOT NULL,
  `grad` varchar(255) NOT NULL,
  `slika` varchar(255) NOT NULL,
  PRIMARY KEY (`astrologID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `astrolozi`
--

INSERT INTO `astrolozi` (`astrologID`, `imePrezimeAstrologa`, `grad`, `slika`) VALUES
(1, 'Milan Radonjic', 'Beograd', 'tarot.jpg'),
(2, 'Zorka', 'Sabac', 'zorka.jpg'),
(3, 'Miljana Nikolic', 'Beograd', 'miljana.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `korisnikID` int(11) NOT NULL AUTO_INCREMENT,
  `imePrezime` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`korisnikID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `imePrezime`, `username`, `password`, `admin`) VALUES
(1, 'Miljana Nikolic', 'milja', 'milja', 1),
(2, 'proba', 'proba', 'proba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prognoza`
--

CREATE TABLE IF NOT EXISTS `prognoza` (
  `prognozaID` int(11) NOT NULL AUTO_INCREMENT,
  `tipID` int(11) NOT NULL,
  `znakID` int(11) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`prognozaID`),
  KEY `tipID` (`tipID`),
  KEY `znakID` (`znakID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `prognoza`
--

INSERT INTO `prognoza` (`prognozaID`, `tipID`, `znakID`, `opis`, `datum`) VALUES
(1, 1, 1, 'Danas se osecate odlicno.', '2016-12-21'),
(2, 2, 1, 'Nazalost, ljubavi ni na vidiku...', '2016-12-21'),
(3, 3, 1, 'Ocekujte povisicu...', '2016-12-21'),
(4, 1, 2, 'Stomacni problemi.', '2016-12-21'),
(5, 2, 2, 'Devojka vaseg zivota ce se uskoro pojaviti', '2016-12-21'),
(6, 3, 2, 'Novca nemate, ali idu bolji dani.', '2016-12-21'),
(7, 1, 3, 'Verovatno cete uhvatiti neki virus', '2016-12-21'),
(8, 2, 3, 'Nije dobro', '2016-12-21'),
(9, 3, 3, 'Interesantna prilika ce se ukazati', '2016-12-21'),
(10, 1, 4, 'pazite se promene vremena', '2016-12-21'),
(11, 2, 4, 'Upoznacete nove ljude', '2016-12-21'),
(12, 3, 4, 'Nove prilike', '2016-12-21'),
(13, 1, 5, 'Stomacni virus', '2016-12-21'),
(14, 2, 5, 'Nova ljubav. Pazite se prevare', '2016-12-21'),
(15, 3, 5, 'Nema promena', '2016-12-21'),
(16, 1, 6, 'Rekreacija u slobodno vreme', '2016-12-21'),
(17, 2, 6, 'Nema novih ljudi u vasem zivotu', '2016-12-21'),
(18, 3, 6, 'Priliv novca', '2016-12-21'),
(19, 1, 7, 'Problemi sa disanjem', '2016-12-21'),
(20, 2, 7, 'Upoznacete nove ljude', '2016-12-21'),
(21, 3, 7, 'Novcana nestasica', '2016-12-21'),
(22, 1, 8, 'Dobra prilika', '2016-12-21'),
(23, 2, 8, 'Zaljubicete se', '2016-12-21'),
(24, 3, 8, 'Veliki troskovi', '2016-12-21'),
(25, 1, 9, 'Brzo se umarate', '2016-12-21'),
(26, 2, 9, 'Usamljeni ste', '2016-12-21'),
(27, 3, 9, 'Priliv novca', '2016-12-21'),
(28, 1, 10, 'Posetite lekara', '2016-12-21'),
(29, 2, 10, 'Novve prilike', '2016-12-21'),
(30, 3, 10, 'Blagi priliv novca', '2016-12-21'),
(31, 1, 11, 'Izmerite pritisak, vise aktivnosti', '2016-12-21'),
(32, 2, 11, 'Previse novih ljudi u vasem zivotu, pokrenite se', '2016-12-21'),
(33, 3, 11, 'Standarni problemi na poslu', '2016-12-21'),
(34, 1, 12, 'Savrseno', '2016-12-21'),
(35, 2, 12, 'Ocekujte prinovu', '2016-12-21'),
(36, 3, 12, 'Upornost se isplati.', '2016-12-21'),
(41, 1, 2, 'Imate problema sa stomakom', '2017-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

CREATE TABLE IF NOT EXISTS `tip` (
  `tipID` int(11) NOT NULL AUTO_INCREMENT,
  `nazivTipa` varchar(255) NOT NULL,
  `slikica` varchar(25) NOT NULL,
  PRIMARY KEY (`tipID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`tipID`, `nazivTipa`, `slikica`) VALUES
(1, 'zdravlje', 'ambulance'),
(2, 'ljubav', 'heart'),
(3, 'posao', 'eur');

-- --------------------------------------------------------

--
-- Table structure for table `znak`
--

CREATE TABLE IF NOT EXISTS `znak` (
  `znakID` int(11) NOT NULL AUTO_INCREMENT,
  `nazivZnaka` varchar(255) NOT NULL,
  `trajanje` varchar(255) NOT NULL,
  PRIMARY KEY (`znakID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `znak`
--

INSERT INTO `znak` (`znakID`, `nazivZnaka`, `trajanje`) VALUES
(1, 'OVAN', '21.MART-20.APRIL'),
(2, 'BIK', '21.APRIL-21.MAJ'),
(3, 'BLIZANCI', '21.MAJ-21.JUN'),
(4, 'RAK', '22.JUN-22.JUL'),
(5, 'LAV', '23.JUL-23.AUGUST'),
(6, 'DEVICA', '24.AVGUST-23.SEPTEMBAR'),
(7, 'VAGA', '24.SEPTEMBAR-23.OKTOBAR'),
(8, 'SKORPIJA', '24.OKTOBAR-22.NOVEMBAR'),
(9, 'STRELAC', '23.NOVEMBAR-21.DECEMBAR'),
(10, 'JARAC', '22.DECEMBAR-20.JANUAR'),
(11, 'VODOLIJA', '21.JANUAR-19. FEBRUAR'),
(12, 'RIBE', '20. FEBRUAR 20. MART');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prognoza`
--
ALTER TABLE `prognoza`
  ADD CONSTRAINT `prognoza_ibfk_1` FOREIGN KEY (`tipID`) REFERENCES `tip` (`tipID`),
  ADD CONSTRAINT `prognoza_ibfk_2` FOREIGN KEY (`znakID`) REFERENCES `znak` (`znakID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
