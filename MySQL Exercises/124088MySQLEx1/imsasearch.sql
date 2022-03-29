-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 11:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imsasearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Name` varchar(50) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `experience` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Name`, `userName`, `Title`, `experience`) VALUES
('Peter Dong', 'pdong', 'Devourer of Souls!!!!', 13),
('Micah Fogel', 'mfogel', 'Director of Math_Fun', 28),
('Evan Glazer', 'eglazer', 'President of Growth&Inspiratio', 1),
('JaRod Tobler', 'jrod', 'Regional Purple-Cow-Costume Ch', 8),
('Julia Husen', 'jhusen', 'Chief of \"Yes Admissions\"', 19),
('Leah Kind', 'lkind', 'Oxford Comma-destroyer', 13),
('Erin Micklo', 'emicklo', 'Grammar Fascist', 12),
('Ralph Flickinger', 'rflickinger', 'Digital Overload of Spam Recep', 24),
('Thomas Meyer', 'tmeyer', 'Emperor of Bit&Byte Land', 5),
('Eric Hawker', 'ehawker', 'Master of Disaster', 14),
('Namrata Pandya', 'npandya', 'Director of Happiness-Slayer', 17);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
