-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 12:52 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `testdata`
--

CREATE TABLE `testdata` (
  `Event` varchar(1000) NOT NULL,
  `Client` varchar(1000) NOT NULL,
  `Venue` varchar(1000) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Time` varchar(100) NOT NULL,
  `Equipment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testdata`
--

INSERT INTO `testdata` (`Event`, `Client`, `Venue`, `Date`, `Time`, `Equipment`) VALUES
('School Fun Day', 'Jane Smith', 'Vaz Prep', '15/12/2020', '9:00 am', 'Bounce-a-Bout, Ferris Wheel, Merry-go-Round'),
('Anna\'s Birthday Bash', 'Joanna Doe', 'Lot 22, Imaginary Street, Greater Portmore', '05/01/2021', '10:00 am', 'Bounce-a-Bout, Merry-go-Round'),
('Company Brunch', 'Anna Smalls', '9 Business Avenue, Kingston 10', '14/01/2021', '8:30 am', 'Tents'),
('Colin\'s Birthday Party', 'Joanna Johnson', '32 Blue Avenue, Kingston 20', '06/01/2021', '3:30 pm', 'Tents, Bounce-a-Bout'),
('Carlene\'s Family Reunion', 'Carlene Smith', '9 Business Avenue, Kingston 10', '11/01/2021', '5:30 pm', 'Tents'),
('Lisa\'s Birthday Party', 'John Doe', 'Hope Gardens', '02/12/2020', '10:00 am', 'Bounce-a-Bout');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
