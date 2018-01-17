-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2016 at 07:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indian_railway_reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `UserID` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `days_available`
--

CREATE TABLE IF NOT EXISTS `days_available` (
  `Train_ID` int(11) NOT NULL,
  `Available_days` varchar(20) NOT NULL,
  PRIMARY KEY (`Train_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days_available`
--

INSERT INTO `days_available` (`Train_ID`, `Available_days`) VALUES
(12309, 'S$TWT$$'),
(12310, 'S$TWT$$'),
(12396, '$MTWTF$'),
(12397, '$MTWTF$'),
(12401, 'SMTWTFS'),
(12402, 'SMTWTFS'),
(12411, 'SMTWTFS'),
(12412, 'SMTWTFS'),
(12519, 'SMTWTFS'),
(12520, 'SMTWTFS'),
(12889, 'SM$$TF$'),
(12890, 'SM$$TF$'),
(12900, 'S$TWTFS'),
(12901, 'S$TWTFS'),
(13231, 'S$TWTFS'),
(13232, 'S$TWTFS'),
(13245, 'SMTWT$S'),
(13246, 'SMTWT$S'),
(13343, 'S$TWTFS'),
(13344, 'S$TWTFS'),
(13458, 'SMTW$FS'),
(13459, 'SMTW$FS'),
(13512, '$MT$TFS'),
(13513, '$MT$TFS'),
(14005, 'SMT$TFS'),
(14006, 'SMT$TFS'),
(14411, '$$T$$$S'),
(14412, '$$T$$$S'),
(18203, '$$TWT$S'),
(18204, '$$TWT$S'),
(90188, 'SMTWTFS'),
(90189, 'SMTWTFS');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `PNR` varchar(25) NOT NULL,
  `Seat_number` int(11) NOT NULL,
  `Passenger_name` varchar(30) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Train_ID` int(11) NOT NULL,
  `Booked_By` varchar(30) NOT NULL,
  PRIMARY KEY (`PNR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`PNR`, `Seat_number`, `Passenger_name`, `Age`, `Gender`, `Train_ID`, `Booked_By`) VALUES
('101', 1, 'Srinivas', 38, 'M', 13343, 'Rahul Chowdary'),
('102', 2, 'Madhavi', 36, 'F', 13343, 'Rahul Chowdary'),
('103', 32, 'Venkat', 38, 'M', 13343, 'Krishna'),
('104', 12, 'Venkatesh', 38, 'M', 13343, 'Ram'),
('105', 13, 'Hari', 40, 'M', 13343, 'Ram'),
('106', 21, 'Radhika', 23, 'F', 12309, 'Kaushik'),
('107', 22, 'Raja', 23, 'M', 12309, 'Kaushik'),
('108', 26, 'Tom', 27, 'M', 12309, 'Kaushik'),
('109', 28, 'Tommy', 29, 'M', 12310, 'Vallabh'),
('110', 29, 'Mitchell', 29, 'M', 12310, 'Vallabh'),
('111', 21, 'Radha', 23, 'F', 12309, 'Rohit'),
('112', 21, 'Rachel', 23, 'F', 12310, 'Rohit'),
('113', 25, 'Roja', 25, 'F', 12310, 'Rohit'),
('114', 14, 'Ram', 40, 'M', 13344, 'krishna'),
('115', 16, 'Sandeep', 41, 'M', 13232, 'Krishna'),
('116', 17, 'Sandy', 30, 'F', 13232, 'Santhi'),
('117', 19, 'Pragya', 27, 'F', 13232, 'Santhi'),
('118', 19, 'Pragyan', 28, 'F', 18204, 'Sandeep'),
('119', 21, 'Praan', 29, 'M', 18204, 'Sandeep'),
('120', 21, 'Pran', 31, 'M', 18204, 'Sandeep'),
('121', 23, 'Pranjal', 33, 'M', 18204, 'Chandana'),
('122', 23, 'anjali', 35, 'F', 18204, 'Chandana'),
('123', 24, 'anjali', 35, 'F', 14006, 'Chandana'),
('124', 25, 'Raj', 37, 'M', 14006, 'Sandeep'),
('126', 2, 'Madhavi', 37, 'F', 12412, 'Rahul Chowdary'),
('127', 20, 'Mitchh', 16, 'M', 12901, 'Krishna'),
('128', 24, 'Radhika', 23, 'F', 12412, 'Kaushik'),
('129', 11, 'Mitch', 33, 'M', 18004, 'Krishna'),
('130', 21, 'Praan', 29, 'M', 90201, 'Sandeep'),
('131', 29, 'Mitchell', 29, 'M', 90201, 'Vallabh'),
('132', 29, 'Marsh', 29, 'M', 90201, 'Vallabh');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_ticket`
--

CREATE TABLE IF NOT EXISTS `passenger_ticket` (
  `PNR` varchar(25) NOT NULL,
  `Source_ID` varchar(8) NOT NULL,
  `Destination_ID` varchar(8) NOT NULL,
  `Class_type` varchar(50) NOT NULL,
  `Train_ID` int(11) NOT NULL,
  `Booked_By` varchar(30) NOT NULL,
  PRIMARY KEY (`PNR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger_ticket`
--

INSERT INTO `passenger_ticket` (`PNR`, `Source_ID`, `Destination_ID`, `Class_type`, `Train_ID`, `Booked_By`) VALUES
('101', '1234', '9081', 'Ac Third', 13343, 'Rahul Chowdary'),
('102', '1234', '1256', 'Ac Second', 13343, 'Rahul Chowdary'),
('103', '1256', '9081', 'Slipper', 13343, 'Krishna'),
('104', '1234', '19001', 'Slipper', 13343, 'Ram'),
('105', '1256', '9081', 'Slipper', 13343, 'Ram'),
('106', '1902', '1775', 'Ac Second', 12309, 'Kaushik'),
('107', '1902', '9012', 'Slipper', 12309, 'Kaushik'),
('108', '1936', '1775', 'Slipper', 12309, 'Kaushik'),
('109', '1775', '1902', 'Ac Second', 12310, 'Vallubh'),
('110', '1775', '1936', 'Ac Third', 12310, 'Vallubh'),
('111', '1902', '9012', 'Slipper', 12309, 'Rohit'),
('112', '1775', '1902', 'Slipper', 12310, 'Rohit'),
('113', '1775', '1936', 'Slipper', 12310, 'Rohit'),
('114', '1901', '1234', 'Slipper', 13344, 'Krishna'),
('115', '1936', '1775', 'Ac Third', 13232, 'Krishna'),
('116', '1936', '1775', 'Ac First', 13232, 'Santhi'),
('117', '1936', '1775', 'Slipper', 13232, 'Santhi'),
('118', '9012', '1902', 'Ac First', 18204, 'Sandeep'),
('119', '9012', '1902', 'Slipper', 18204, 'Sandeep'),
('120', '9012', '1902', 'Ac First', 18204, 'Sandeep'),
('121', '9012', '1902', 'Ac Third', 18204, 'Chandna'),
('122', '9012', '1902', 'Slipper', 18204, 'Chandana'),
('123', '1775', '8912', 'Ac Third', 14006, 'Chandana'),
('124', '1775', '9012', 'Slipper', 14006, 'Sandeep');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `Train_ID` int(11) NOT NULL,
  `Available_Date` varchar(20) NOT NULL,
  `EmailID` varchar(30) NOT NULL,
  `PNR` varchar(20) NOT NULL,
  `Reservation_Date` text NOT NULL,
  PRIMARY KEY (`Train_ID`,`Available_Date`,`EmailID`,`PNR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Train_ID`, `Available_Date`, `EmailID`, `PNR`, `Reservation_Date`) VALUES
(12309, '06-07-16', 'kaushik@gmail.com', '106', '06-07-16'),
(12309, '06-07-16', 'kaushik@gmail.com', '107', '06-07-16'),
(12309, '06-07-16', 'kaushik@gmail.com', '108', '06-07-16'),
(12309, '06-07-16', 'rohit@gmail.com', '111', '06-07-16'),
(12310, '06-07-16', 'rohit@gmail.com', '112', '17-05-16'),
(12310, '06-07-16', 'rohit@gmail.com', '113', '17-05-16'),
(12310, '06-07-16', 'vallabh@gmail.com', '109', '17-05-16'),
(12310, '06-07-16', 'vallabh@gmail.com', '110', '17-05-16'),
(12412, '06-07-16', 'kaushik@gmail.com', '128', '06-07-16'),
(12412, '06-07-16', 'rahul@gmail.com', '126', '06-07-16'),
(12901, '06-07-16', 'krishna@gmail.com', '127', '06-07-16'),
(13232, '03-06-16', 'krishna@gmail.com', '115', '05-06-16'),
(13232, '03-06-16', 'krishnai@gmail.com', '135', '03-06-16'),
(13232, '03-06-16', 'santhi@gmail.com', '116', '03-06-16'),
(13232, '03-06-16', 'santhi@gmail.com', '117', '03-06-16'),
(13343, '17-05-16', 'krishna@gmail.com', '103', '17-05-16'),
(13343, '17-05-16', 'rahul@gmail.com', '101', '17-05-16'),
(13343, '17-05-16', 'rahul@gmail.com', '102', '17-05-16'),
(13343, '17-05-16', 'ram@gmail.com', '104', '17-05-16'),
(13343, '17-05-16', 'ram@gmail.com', '105', '17-05-16'),
(13344, '05-06-16', 'krishna@gmail.com', '114', '05-06-16'),
(13344, '05-06-16', 'krishna@gmail.com', '133', '05-06-16'),
(13344, '05-06-16', 'krishna@gmail.com', '137', '05-06-16'),
(14006, '05-06-16', 'chandana@gmail.com', '123', '03-06-16'),
(14006, '05-06-16', 'sandeepb@gmail.com', '124', '03-06-16'),
(14006, '05-06-16', 'sandeepb@gmail.com', '138', '03-06-16'),
(14006, '05-06-16', 'sandeepb@gmail.com', '139', '03-06-16'),
(18004, '08-07-16', 'krishna@gmail.com', '125', '08-07-16'),
(18004, '08-07-16', 'krishna@gmail.com', '129', '08-07-16'),
(18004, '09-07-16', 'krishna@gmail.com', '140', '08-07-16'),
(18004, '09-07-16', 'krishna@gmail.com', '141', '08-07-16'),
(18204, '05-06-16', 'chandana@gmail.com', '121', '03-06-16'),
(18204, '05-06-16', 'chandana@gmail.com', '122', '03-06-16'),
(18204, '05-06-16', 'sandeep@gmail.com', '118', '03-06-16'),
(18204, '05-06-16', 'sandeep@gmail.com', '119', '03-06-16'),
(18204, '05-06-16', 'sandeep@gmail.com', '120', '03-06-16'),
(90201, '06-06-16', 'sandeep@gmail.com', '130', '03-06-16'),
(90201, '06-06-16', 'sandeep@gmail.com', '142', '03-06-16'),
(90201, '06-06-16', 'vallabh@gmail.com', '131', '03-06-16'),
(90201, '06-06-16', 'vallabh@gmail.com', '132', '03-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `Train_ID` int(11) NOT NULL,
  `Stop_number` int(11) NOT NULL,
  `Station_ID` varchar(8) NOT NULL,
  `Arrival_time` text NOT NULL,
  `Departure_time` text NOT NULL,
  `Source_distance` int(11) NOT NULL,
  `Fare_class1` int(11) DEFAULT NULL,
  `Fare_class2` int(11) DEFAULT NULL,
  `Fare_class3` int(11) DEFAULT NULL,
  PRIMARY KEY (`Train_ID`,`Stop_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`Train_ID`, `Stop_number`, `Station_ID`, `Arrival_time`, `Departure_time`, `Source_distance`, `Fare_class1`, `Fare_class2`, `Fare_class3`) VALUES
(12309, 0, '1902', '06:10', '08:20', 0, 0, 0, 0),
(12309, 1, '1936', '11:45', '11:50', 300, 850, 610, 425),
(12309, 2, '9012', '16:20', '16:30', 700, 1230, 910, 650),
(12309, 3, '1775', '23:40', '00:50', 1100, 2250, 1410, 1275),
(12310, 0, '1775', '00:50', '08:30', 0, 0, 0, 0),
(12310, 1, '9012', '14:50', '15:00', 400, 1250, 810, 525),
(12310, 2, '1936', '10:30', '10:35', 800, 1950, 1210, 825),
(12310, 3, '1902', '06:10', '08:20', 1100, 2250, 1410, 1275),
(12396, 0, '1775', '02:20', '10:50', 0, 0, 0, 0),
(12396, 1, '8111', '16:20', '16:25', 400, 1250, 810, 525),
(12396, 2, '8912', '09:10', '12:20', 800, 1950, 1210, 825),
(12397, 0, '8912', '09:10', '12:20', 0, 0, 0, 0),
(12397, 1, '8111', '17:15', '17:20', 400, 1250, 810, 525),
(12397, 2, '1775', '02:20', '10:50', 800, 1950, 1210, 825),
(12401, 0, '8912', '14:20', '15:30', 0, 0, 0, 0),
(12401, 1, '7812', '18:10', '18:15', 200, 650, 500, 325),
(12401, 2, '9017', '09:45', '09:50', 900, 2150, 1410, 1125),
(12401, 3, '1775', '15:35', '15:40', 1400, 2900, 1830, 1320),
(12402, 0, '1775', '15:35', '15:40', 0, 0, 0, 0),
(12402, 1, '9017', '23:15', '23:20', 500, 1230, 910, 650),
(12402, 2, '7812', '10:20', '10:25', 1200, 1230, 910, 650),
(12402, 3, '8912', '14:20', '15:50', 1400, 2900, 1830, 1320),
(12411, 0, '1936', '14:20', '18:30', 0, 0, 0, 0),
(12411, 1, '9910', '23:10', '23:15', 350, 850, 630, 420),
(12411, 2, '1234', '06:00', '08:00', 550, 1200, 830, 620),
(12412, 0, '1234', '06:00', '08:00', 0, 0, 0, 0),
(12412, 1, '9910', '09:30', '09:35', 200, 650, 500, 325),
(12412, 2, '1936', '14:20', '18:30', 550, 1200, 830, 620),
(12519, 0, '1234', '00:05', '02:00', 0, 0, 0, 0),
(12519, 1, '6780', '04:10', '04:15', 200, 650, 500, 325),
(12519, 2, '9910', '07:30', '07:35', 450, 1230, 910, 650),
(12519, 3, '1936', '09:50', '01:10', 550, 1200, 830, 620),
(12520, 0, '1936', '09:50', '13:10', 0, 0, 0, 0),
(12520, 1, '9910', '15:00', '15:05', 100, 550, 330, 220),
(12520, 2, '6780', '17:30', '17:35', 350, 850, 630, 420),
(12889, 0, '1936', '08:10', '18:15', 0, 0, 0, 0),
(12889, 1, '6790', '23:10', '23:15', 400, 1250, 810, 525),
(12889, 2, '1234', '01:55', '03:00', 550, 1200, 830, 620),
(12890, 0, '1234', '01:55', '03:00', 0, 0, 0, 0),
(12890, 1, '6790', '05:00', '05:05', 150, 1230, 910, 650),
(12890, 2, '1936', '08:10', '18:15', 550, 1200, 830, 620),
(12900, 0, '7899', '20:10', '23:40', 0, 0, 0, 0),
(12900, 1, '9829', '03:30', '03:35', 200, 650, 500, 325),
(12900, 2, '9012', '09:30', '09:35', 600, 1230, 910, 650),
(12900, 3, '8945', '18:10', '18:15', 1000, 1550, 1130, 820),
(12900, 4, '1795', '00:20', '01:45', 1500, 3250, 2210, 1625),
(12901, 0, '1795', '00:20', '01:45', 0, 0, 0, 0),
(12901, 1, '8945', '06:10', '06:15', 500, 1230, 910, 650),
(12901, 2, '9012', '12:30', '12:35', 900, 2150, 1410, 1125),
(12901, 3, '9829', '16:45', '16:50', 1300, 1230, 910, 650),
(12901, 4, '7899', '20:10', '23:40', 1500, 3250, 2210, 1625),
(13231, 0, '1775', '23:50', '07:10', 0, 0, 0, 0),
(13231, 1, '1936', '06:10', '12:20', 1000, 1550, 1130, 820),
(13232, 0, '1936', '06:10', '12:20', 0, 0, 0, 0),
(13232, 1, '1775', '23:50', '07:10', 1000, 1550, 1130, 820),
(13245, 0, '1901', '03:10', '05:15', 0, 0, 0, 0),
(13245, 1, '9013', '12:10', '12:15', 400, 1250, 810, 525),
(13245, 2, '8901', '19:35', '19:40', 800, 1950, 1210, 825),
(13245, 3, '9112', '01:25', '01:30', 1200, 1230, 910, 650),
(13245, 4, '5671', '07:15', '07:20', 1600, 2850, 1230, 1120),
(13245, 5, '1775', '13:25', '16:10', 2000, 3850, 2630, 1420),
(13246, 0, '1775', '13:25', '16:10', 0, 0, 0, 0),
(13246, 1, '5671', '22:15', '22:20', 400, 1250, 810, 525),
(13246, 2, '9112', '08:45', '08:50', 800, 1950, 1210, 825),
(13246, 3, '8901', '14:15', '14:20', 1200, 1230, 910, 650),
(13246, 4, '9013', '18:10', '18:15', 1600, 2850, 1230, 1120),
(13246, 5, '1901', '03:30', '05:15', 2000, 3850, 2630, 1420),
(13343, 0, '1234', '01:10', '02:35', 0, 0, 0, 0),
(13343, 1, '1256', '08:15', '08:20', 400, 1250, 810, 525),
(13343, 2, '9081', '13:45', '13:50', 800, 1950, 1210, 825),
(13344, 0, '1901', '21:20', '00:40', 0, 0, 0, 0),
(13344, 1, '9081', '06:10', '06:15', 400, 1250, 810, 525),
(13344, 2, '1256', '13:45', '13:50', 800, 1950, 1210, 825),
(13344, 3, '1234', '01:10', '02:35', 1200, 1230, 910, 650),
(13443, 3, '1901', '21:20', '00:40', 1200, 1230, 910, 650),
(13458, 0, '1234', '04:50', '09:25', 0, 0, 0, 0),
(13458, 1, '6790', '23:25', '23:30', 500, 1230, 910, 650),
(13458, 2, '9012', '08:10', '10:15', 800, 1950, 1210, 825),
(13459, 0, '9012', '08:10', '10:15', 0, 0, 0, 0),
(13459, 1, '6790', '16:25', '16:30', 300, 850, 610, 425),
(13459, 2, '1234', '04:50', '09:25', 800, 1950, 1210, 825),
(13512, 0, '1234', '16:10', '20:45', 0, 0, 0, 0),
(13512, 1, '6790', '23:10', '23:15', 200, 650, 500, 325),
(13512, 2, '1936', '04:35', '08:40', 550, 1200, 830, 620),
(13513, 0, '1936', '04:35', '08:40', 0, 0, 0, 0),
(13513, 1, '6790', '13:30', '13:35', 350, 850, 630, 420),
(13513, 2, '1234', '16:10', '20:45', 550, 1200, 830, 620),
(14005, 0, '8912', '02:30', '04:50', 0, 0, 0, 0),
(14005, 1, '9012', '16:45', '16:50', 600, 1230, 910, 650),
(14005, 2, '1775', '01:30', '03:30', 1400, 2900, 1830, 1320),
(14006, 0, '1775', '01:30', '03:30', 0, 0, 0, 0),
(14006, 1, '9012', '15:20', '15:30', 800, 1950, 1210, 825),
(14006, 2, '8912', '02:30', '04:30', 1400, 2900, 1830, 1320),
(14411, 0, '1936', '16:20', '21:20', 0, 0, 0, 0),
(14411, 1, '7890', '00:30', '00:35', 200, 650, 500, 325),
(14411, 2, '6780', '01:30', '01:35', 350, 850, 630, 420),
(14411, 3, '1234', '05:15', '10:30', 550, 1200, 830, 620),
(14412, 0, '1234', '05:15', '10:30', 0, 0, 0, 0),
(14412, 1, '6780', '13:05', '13:10', 200, 650, 500, 325),
(14412, 2, '7890', '14:40', '14:45', 350, 850, 630, 420),
(14412, 3, '1936', '16:20', '21:20', 550, 1200, 830, 620),
(18203, 0, '1902', '04:10', '08:15', 0, 0, 0, 0),
(18203, 1, '9012', '23:25', '05:15', 1100, 2250, 1410, 1275),
(18204, 0, '9012', '23:25', '05:15', 0, 0, 0, 0),
(18204, 1, '1902', '04:10', '08:15', 1100, 2250, 1410, 1275);

-- --------------------------------------------------------

--
-- Table structure for table `route_has_station`
--

CREATE TABLE IF NOT EXISTS `route_has_station` (
  `Train_ID` int(11) NOT NULL,
  `Station_ID` varchar(8) NOT NULL,
  `Stop_number` int(11) NOT NULL,
  PRIMARY KEY (`Train_ID`,`Station_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_has_station`
--

INSERT INTO `route_has_station` (`Train_ID`, `Station_ID`, `Stop_number`) VALUES
(12309, '1775', 3),
(12309, '1902', 0),
(12309, '1936', 1),
(12309, '9012', 2),
(12310, '1775', 0),
(12310, '1902', 3),
(12310, '1936', 2),
(12310, '9012', 1),
(12396, '1775', 0),
(12396, '8111', 1),
(12396, '8912', 2),
(12397, '1775', 2),
(12397, '8111', 1),
(12397, '8912', 0),
(12401, '1775', 3),
(12401, '7812', 1),
(12401, '8912', 0),
(12401, '9017', 2),
(12402, '1775', 0),
(12402, '7812', 2),
(12402, '8912', 3),
(12402, '9017', 1),
(12411, '1234', 2),
(12411, '1936', 0),
(12411, '9910', 1),
(12412, '1234', 0),
(12412, '1936', 2),
(12412, '9910', 1),
(12510, '1234', 3),
(12519, '1234', 0),
(12519, '1936', 3),
(12519, '6780', 1),
(12519, '9910', 2),
(12520, '1936', 0),
(12520, '6780', 2),
(12520, '9910', 1),
(12889, '1234', 2),
(12889, '1936', 0),
(12889, '6790', 1),
(12890, '1234', 0),
(12890, '1936', 2),
(12890, '6790', 1),
(12900, '1795', 4),
(12900, '7899', 0),
(12900, '8945', 3),
(12900, '9012', 2),
(12900, '9829', 1),
(12901, '1795', 0),
(12901, '7899', 4),
(12901, '8945', 1),
(12901, '9012', 2),
(12901, '9829', 3),
(13231, '1775', 0),
(13231, '1936', 1),
(13232, '1775', 1),
(13232, '1936', 0),
(13245, '1775', 5),
(13245, '1901', 0),
(13245, '5671', 4),
(13245, '8901', 2),
(13245, '9013', 1),
(13245, '9112', 3),
(13246, '1775', 0),
(13246, '1901', 5),
(13246, '5671', 1),
(13246, '8901', 3),
(13246, '9013', 4),
(13246, '9112', 2),
(13343, '1234', 0),
(13343, '1256', 1),
(13343, '9081', 2),
(13344, '1234', 3),
(13344, '1256', 2),
(13344, '1901', 0),
(13344, '9081', 1),
(13443, '1901', 3),
(13458, '1234', 0),
(13458, '6790', 1),
(13458, '9012', 2),
(13459, '1234', 2),
(13459, '6790', 1),
(13459, '9012', 0),
(13512, '1234', 0),
(13512, '1936', 2),
(13512, '6790', 1),
(13513, '1234', 2),
(13513, '1936', 0),
(13513, '6790', 1),
(14005, '1775', 2),
(14005, '8912', 0),
(14005, '9012', 1),
(14006, '1775', 0),
(14006, '8912', 2),
(14006, '9012', 1),
(14411, '1234', 3),
(14411, '1936', 0),
(14411, '6780', 2),
(14411, '7890', 1),
(14412, '1234', 0),
(14412, '1936', 3),
(14412, '6780', 1),
(14412, '7890', 2),
(18203, '1902', 0),
(18203, '9012', 1),
(18204, '1902', 1),
(18204, '9012', 0),
(90188, '6034', 6),
(90188, '7812', 0),
(90188, '7890', 2),
(90188, '8600', 7),
(90188, '8912', 1),
(90188, '8971', 5),
(90188, '9013', 8),
(90188, '9110', 4),
(90188, '9910', 3),
(90189, '6034', 2),
(90189, '7812', 8),
(90189, '7890', 6),
(90189, '8600', 1),
(90189, '8912', 7),
(90189, '8971', 3),
(90189, '9013', 0),
(90189, '9110', 4),
(90189, '9910', 5);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `Station_ID` varchar(8) NOT NULL,
  `Station_Name` varchar(30) NOT NULL,
  PRIMARY KEY (`Station_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`Station_ID`, `Station_Name`) VALUES
('1234', 'Jabalpur'),
('1256', 'Nashik'),
('1775', 'New Delhi'),
('1901', 'Hyderabad'),
('1902', 'Patna'),
('1936', 'Allahabad'),
('5671', 'Panjab'),
('6034', 'Pune'),
('6712', 'Sikandrabad'),
('6780', 'Katni'),
('6790', 'Satna'),
('7620', 'Ajmer'),
('7810', 'Durg'),
('7812', 'Pratapgarh'),
('7834', 'itarsi'),
('7890', 'Naini'),
('7899', 'Kolkata'),
('7926', 'Gwalior'),
('8102', 'Visakhapatnam'),
('8111', 'Agra'),
('8600', 'Nagpur'),
('8710', 'Vijayvada'),
('8761', 'Mughalsarai'),
('8897', 'Bharatpur'),
('8898', 'Bikaner'),
('8901', 'Ghansi'),
('8912', 'Varansi'),
('8945', 'Meerut'),
('8971', 'Bhopal'),
('9012', 'Kanpur'),
('9013', 'Mumbai'),
('9017', 'Aligarh'),
('9019', 'Lucknow'),
('9081', 'Nellore'),
('9110', 'Indore'),
('9112', 'Jaipur'),
('9829', 'Mirzapur'),
('9910', 'Manikpur');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE IF NOT EXISTS `train` (
  `Train_ID` int(11) NOT NULL,
  `Train_name` varchar(50) NOT NULL,
  `Train_type` varchar(50) NOT NULL,
  `Source_stn` varchar(30) DEFAULT NULL,
  `Destination_stn` varchar(30) DEFAULT NULL,
  `Source_ID` varchar(8) DEFAULT NULL,
  `Destination_ID` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Train_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`Train_ID`, `Train_name`, `Train_type`, `Source_stn`, `Destination_stn`, `Source_ID`, `Destination_ID`) VALUES
(12309, 'Rajendra Nagar Patna - New Delhi', 'Raj', 'Patna', 'New Delhi', 'RJBP', 'NDLS'),
(12310, 'New Delhi - Rajendra Nagar Patna', 'Raj', 'New Delhi', 'Patna', 'NDLS', 'RJBP'),
(12396, 'Brahmaputra Mail', 'SF', 'New Delhi', 'Varanshi', 'NDLS', 'VRNS'),
(12397, 'Brahmaputra Mail', 'SF', 'Varanshi', 'New Delhi', 'VRNS', 'NDLS'),
(12401, 'Magadh Express', 'Exp', 'Varansi', 'New Delhi', 'VRNS', 'NDLS'),
(12402, 'Magadh Express', 'Exp', 'New Delhi', 'Varansi', 'NDLS', 'VRNS'),
(12411, 'Shipra Express', 'SF', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(12412, 'Shipra Express', 'SF', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(12519, 'Sabarmati Express', 'Exp', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(12520, 'Sabarmati Express', 'Exp', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(12889, 'Poorva Express', 'Exp', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(12890, 'Poorva Express', 'Exp', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(12900, 'Lal quila Express', 'Exp', 'Kolkata', 'New Delhi', 'KLKT', 'NDLS'),
(12901, 'Lal quila Express', 'Exp', 'New Delhi', 'Kolkata', 'NDLS', 'KLKT'),
(13231, 'Prayagraj Express', 'SF', 'New Delhi', 'Allahabad', 'NDLS', 'ALD'),
(13232, 'Prayagraj Express', 'SF', 'Allahabad', 'New Delhi', 'ALD', 'NDLS'),
(13245, 'Rajdhani Express', 'Raj', 'Hyderabad', 'New Delhi', 'HDBD', 'NDLS'),
(13246, 'Rajdhani Express', 'Raj', 'New Delhi', 'Hyderabad', 'NDLS', 'HDBD'),
(13343, 'Jabalpur - Hyderabad', 'SF', 'Jabalpur', 'Hyderabad', 'JBP', 'HDBD'),
(13344, 'Hyderabad - Jabalpur', 'SF', 'Hyderabad', 'Jabalpur', 'HDBD', 'JBP'),
(13458, 'Kamayani Express', 'SF', 'Jabalpur', 'Kanpur', 'JBL', 'KNPR'),
(13459, 'Kamayani Express', 'SF', 'Kanpur', 'Jabalpur', 'KNPR', 'JBL'),
(13512, 'Sanghmitra Express', 'SF', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(13513, 'Sanghmitra Express', 'SF', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(14005, 'Lichchavi Express', 'Exp', 'Varansi', 'New Delhi', 'VRNS', 'NDLS'),
(14006, 'Lichchavi Express', 'Exp', 'New Delhi', 'Varansi', 'NDLS', 'VRNS'),
(14411, 'Sampark Kranti Express', 'SF', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(14412, 'Sampark Kranti Express', 'SF', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(18203, 'Gyan Ganga', 'SF', 'Patna', 'Kanpur', 'RJB', 'KNPR'),
(18204, 'Gyan Ganga', 'SF', 'Kanpur', 'Patna', 'KNPR', 'RJB'),
(90188, 'Pawan Express', 'SF', 'Kalkata', 'Mumbai', 'KLKT', 'BMB'),
(90189, 'Pawan Express', 'SF', 'Mumbai', 'Kalkata', 'BMB', 'KLKT');

-- --------------------------------------------------------

--
-- Table structure for table `train_class`
--

CREATE TABLE IF NOT EXISTS `train_class` (
  `Train_ID` int(11) NOT NULL,
  `Train_name` varchar(50) NOT NULL,
  `Train_type` varchar(50) NOT NULL,
  `Source_stn` varchar(30) NOT NULL,
  `Destination_stn` varchar(30) NOT NULL,
  `Source_ID` varchar(8) NOT NULL,
  `Destination_ID` varchar(8) NOT NULL,
  PRIMARY KEY (`Train_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_class`
--

INSERT INTO `train_class` (`Train_ID`, `Train_name`, `Train_type`, `Source_stn`, `Destination_stn`, `Source_ID`, `Destination_ID`) VALUES
(12309, 'Rajendra Nagar Patna - New Delhi', 'Raj', 'Patna', 'New Delhi', 'RJBP', 'NDLS'),
(12310, 'New Delhi - Rajendra Nagar Patna', 'Raj', 'New Delhi', 'Patna', 'NDLS', 'RJBP'),
(12396, 'Brahmaputra Mail', 'SF', 'New Delhi', 'Varanshi', 'NDLS', 'VRNS'),
(12397, 'Brahmaputra Mail', 'SF', 'Varanshi', 'New Delhi', 'VRNS', 'NDLS'),
(12401, 'Magadh Express', 'Exp', 'Varansi', 'New Delhi', 'VRNS', 'NDLS'),
(12402, 'Magadh Express', 'Exp', 'New Delhi', 'Varansi', 'NDLS', 'VRNS'),
(12411, 'Shipra Express', 'SF', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(12412, 'Shipra Express', 'SF', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(12519, 'Sabarmati Express', 'Exp', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(12520, 'Sabarmati Express', 'Exp', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(12889, 'Poorva Express', 'Exp', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(12890, 'Poorva Express', 'Exp', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(12900, 'Lal quila Express', 'Exp', 'Kolkata', 'New Delhi', 'KLKT', 'NDLS'),
(12901, 'Lal quila Express', 'Exp', 'New Delhi', 'Kolkata', 'NDLS', 'KLKT'),
(13231, 'Prayagraj Express', 'SF', 'New Delhi', 'Allahabad', 'NDLS', 'ALD'),
(13232, 'Prayagraj Express', 'SF', 'Allahabad', 'New Delhi', 'ALD', 'NDLS'),
(13245, 'Rajdhani Express', 'Raj', 'Hyderabad', 'New Delhi', 'HDBD', 'NDLS'),
(13246, 'Rajdhani Express', 'Raj', 'New Delhi', 'Hyderabad', 'NDLS', 'HDBD'),
(13343, 'Jabalpur - Hyderabad', 'SF', 'Jabalpur', 'Hyderabad', 'JBP', 'HDBD'),
(13344, 'Hyderabad - Jabalpur', 'SF', 'Hyderabad', 'Jabalpur', 'HDBD', 'JBP'),
(13458, 'Kamayani Express', 'SF', 'Jabalpur', 'Kanpur', 'JBL', 'KNPR'),
(13459, 'Kamayani Express', 'SF', 'Kanpur', 'Jabalpur', 'KNPR', 'JBL'),
(13512, 'Sanghmitra Express', 'SF', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(13513, 'Sanghmitra Express', 'SF', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(14005, 'Lichchavi Express', 'Exp', 'Varansi', 'New Delhi', 'VRNS', 'NDLS'),
(14006, 'Lichchavi Express', 'Exp', 'New Delhi', 'Varansi', 'NDLS', 'VRNS'),
(14411, 'Sampark Kranti Express', 'SF', 'Allahabad', 'Jabalpur', 'ALD', 'JBP'),
(14412, 'Sampark Kranti Express', 'SF', 'Jabalpur', 'Allahabad', 'JBP', 'ALD'),
(18203, 'Gyan Ganga', 'SF', 'Patna', 'Kanpur', 'RJB', 'KNPR'),
(18204, 'Gyan Ganga', 'SF', 'Kanpur', 'Patna', 'KNPR', 'RJB'),
(34340, 'Saket Express', 'Exp', 'Patna', 'Mumbai', 'RJBP', 'BMB'),
(34341, 'Saket Express', 'Exp', 'Mumbai', 'Patna', 'BMB', 'RJBP'),
(90188, 'Pawan Express', 'SF', 'Kalkata', 'Mumbai', 'KLKT', 'BMB'),
(90189, 'Pawan Express', 'SF', 'Mumbai', 'Kalkata', 'BMB', 'KLKT'),
(90200, 'Samghjhauta Express', 'Exp', 'New Delhi', 'Lahore', 'NDLS', 'LHR'),
(90201, 'Samghjhauta Express', 'Exp', 'Lahore', 'New Delhi', 'LHR', 'NDLS'),
(90900, 'Hawrah - Mumbai Mail', 'SF', 'Hawrah', 'Mumbai', 'HWR', 'BMB');

-- --------------------------------------------------------

--
-- Table structure for table `train_status`
--

CREATE TABLE IF NOT EXISTS `train_status` (
  `Train_ID` int(11) NOT NULL,
  `Available_Date` varchar(20) NOT NULL,
  `Booked_seats1` int(11) NOT NULL,
  `Booked_seats2` int(11) NOT NULL,
  `Booked_seats3` int(11) NOT NULL,
  `Waiting_seats1` int(11) NOT NULL,
  `Waiting_seats2` int(11) NOT NULL,
  `Waiting_seats3` int(11) NOT NULL,
  PRIMARY KEY (`Train_ID`,`Available_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_status`
--

INSERT INTO `train_status` (`Train_ID`, `Available_Date`, `Booked_seats1`, `Booked_seats2`, `Booked_seats3`, `Waiting_seats1`, `Waiting_seats2`, `Waiting_seats3`) VALUES
(12309, '6-7-16', 1, 0, 3, 0, 0, 0),
(12310, '6-7-16', 1, 1, 2, 0, 0, 0),
(13232, '3-6-16', 1, 1, 1, 0, 0, 0),
(13343, '17-5-2016', 1, 1, 3, 0, 1, 1),
(13344, '5-6-16', 0, 0, 1, 0, 0, 0),
(14006, '5-6-16', 0, 1, 1, 0, 0, 0),
(18204, '8-7-16', 2, 1, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `EmailID` varchar(30) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Age` int(11) NOT NULL,
  `Mobile` varchar(14) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Security_question` varchar(40) NOT NULL,
  `Security_answer` varchar(20) NOT NULL,
  PRIMARY KEY (`EmailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`EmailID`, `Password`, `FullName`, `Gender`, `Age`, `Mobile`, `City`, `State`, `Security_question`, `Security_answer`) VALUES
('aditya@gmail.com', 'aditya', 'Aditya', 'M', 20, '7207830000', 'Hyderabad', 'Telangana', 'What is my first school', 'St Josephs'),
('adityan@gmail.com', 'adityan', 'Adityan', 'M', 21, '7207830022', 'Vijayawada', 'Andhra Pradesh', 'What is my first school', 'Vps'),
('chandana@gmail.com', 'chandana', 'Chandana Charu', 'F', 22, '9873324333', 'Delhi', 'Delhi', 'What is my first school', 'Delhi Public School'),
('Divyesh@gmail.com', 'divyesh', 'Divyesh Garg', 'M', 32, '7866767767', 'Ahmedabad', 'Gujarat', 'What is your first school', 'Delhi Public School'),
('kaushik@gmail.com', 'kaushik', 'Kaushik sharma', 'M', 27, '9834234243', 'Cochin', 'Kerala', 'What is my first school', 'Hyderabad Public'),
('krishna@gmail.com', 'krishna', 'Krishna Reddy', 'M', 20, '73002324334', 'Hyderabad', 'Telangana', 'What is your home town', 'Kothagudem'),
('megh@gmail.com', 'megh', 'Megh Mandava', 'F', 25, '9704232322', 'Jabalpur', 'Madhya Pradesh', 'What is your first school', 'Vps'),
('meghana@gmail.com', 'meghana', 'Meghana Mandava', 'F', 24, '9704232323', 'Bhopal', 'Madhya Pradesh', 'What is your first school', 'St Pauls '),
('rahul@gmail.com', 'rahul', 'Rahul Chowdary', 'M', 22, '7207830075', 'Bengaluru', 'Karnataka', 'What is your first car', 'Zen'),
('ram@gmail.com', 'ram', 'Ram Chowdary', 'M', 22, '7207830076', 'Bengaluru', 'Karnataka', 'What is your first car', 'benz'),
('rohit@gmail.com', 'rohit', 'rohit kesarwani', 'M', 20, '9834342342', 'Jabalpur', 'Madhya Pradesh', 'What is my first school', 'Oakridge Public Scho'),
('sandeep@gmail.com', 'sandeep', 'Sandeep Reddy', 'M', 20, '9491123479', 'Mumbai', 'Maharashtra', 'Who is ur best friend', 'Rahul'),
('sandeepb@gmail.com', 'sandeepb', 'Sandeep Bhavani', 'M', 21, '9491123472', 'Chandigarh', 'Punjab', 'Who is ur best friend', 'Ram'),
('sandy@gmail.com', 'sandy', 'Sandeep Iyer', 'M', 21, '9491123432', 'Chennai', 'Tamil Nadu', 'Who is ur best friend', 'Lyer'),
('santhi@gmail.com', 'santhi', 'Santhi Tummala', 'F', 20, '9833426729', 'Kolkata', 'West Bengal', 'who is your best friend', 'Chandana'),
('vallabh@gmail.com', 'vallabh', 'vallabh remani', 'm', 22, '7823423422', 'Pune', 'Maharashtra', 'who is your best friend', 'Rahul');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
