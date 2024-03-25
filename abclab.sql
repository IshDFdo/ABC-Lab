-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2024 at 03:50 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abclab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Email`, `Password`) VALUES
('Ishan', 'ishan@gmail.com', 'IshanFdo');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Doctor` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ID`, `Name`, `Email`, `Date`, `Time`, `Doctor`) VALUES
(67, 'dilki', 'dd', '2024-03-21', '22:37:00', 'Sam'),
(71, 'jack', 'jj@gmail.com', '2024-03-28', '12:55:00', 'Ranil'),
(70, 'dilki', 'www@gmail.com', '2024-03-21', '21:31:00', 'Sam'),
(69, 'Dilmi', 'dd@gmail.com', '2024-03-21', '21:23:00', 'Ishan'),
(72, 'harry', 'harry@gmail.com', '2024-03-29', '19:30:00', 'Jack');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Specialty` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DateTime` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`ID`, `Name`, `Email`, `Specialty`, `Password`, `DateTime`) VALUES
(8, 'Jack', 'jack@gmail.com', 'oncology', 'jackjjj', '2024-03-29 19:30:00'),
(7, 'Kasun', 'kasun@gmail.com', 'Dermatologists', 'kasunkkk', '2024-03-31 08:00:00'),
(6, 'Ishan', 'ishan@gmail.com', 'Cardiology', 'ishaniii', '2024-03-28 16:00:00'),
(9, 'Mike', 'mike@gmail.com', 'Anesthesiology', 'mike', '2024-03-28 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `UserName`, `Email`, `Password`) VALUES
(31, 'dd', 'dd@gmail.com', 'ss'),
(30, 'dd', 'dd@gmail.com', 'ss'),
(29, 'dd', 'dd@gmail.com', 'ss'),
(28, 'dd', 'dd@gmail.com', 'ss'),
(8, 'kavee', 'k@gmail.com', '111'),
(27, 'dd', 'dd@gmail.com', 'gg'),
(26, 'dd', 'dd@gmail.com', 'sss'),
(13, 'kavisha', 'kkk@gmail.com', 'pppp'),
(25, 'dd', 'dd@gmail.com', '123'),
(24, 'yy', 'yy@', 'yyy'),
(23, 'yy', 'yy@', 'yyy'),
(17, 'hiruni', 'hiruni@gmail.com', 'asdf'),
(22, 'lll', 'hh@', 'sss'),
(21, 'ggggg', 'hiruni@gmail.com', 'vbn'),
(32, 'dd', 'dd@gmail.com', 'hh'),
(33, 'dd', 'dd@gmail.com', 'dd'),
(34, 'jack', 'jj@gmail.com', 'jj'),
(35, 'Harry', 'harry@gmail.com', 'harry');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `RepID` int NOT NULL AUTO_INCREMENT,
  `ID` int NOT NULL,
  `Report` blob NOT NULL,
  PRIMARY KEY (`RepID`),
  KEY `fk_ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`RepID`, `ID`, `Report`) VALUES
(1, 3, 0x75706c6f6164732f79792e676966),
(2, 3, 0x75706c6f6164732f74657374207265706f72742e706466),
(3, 3, 0x75706c6f6164732f494d475f37393638202831292e4a5047),
(4, 7, 0x75706c6f6164732f74657374207265706f72742e706466),
(5, 7, 0x75706c6f6164732f74657374207265706f72742e706466),
(6, 7, 0x75706c6f6164732f74657374207265706f72742e706466),
(7, 50, 0x75706c6f6164732f6b6176656565656565736861612e706466),
(8, 50, 0x75706c6f6164732f6b6176656565656565736861612e706466),
(9, 71, 0x75706c6f6164732f6b6176656565656565736861612e706466),
(10, 72, 0x75706c6f6164732f74657374207265706f72742e706466),
(11, 72, 0x75706c6f6164732f6b6176656565656565736861612e706466);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
