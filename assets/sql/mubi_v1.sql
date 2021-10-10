-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 06:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mubi`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` varchar(50) NOT NULL,
  `scheduleID` varchar(10) DEFAULT NULL,
  `userID` varchar(10) DEFAULT NULL,
  `ticketQty` int(11) DEFAULT NULL,
  `totalCost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `scheduleID`, `userID`, `ticketQty`, `totalCost`) VALUES
('B001', 'S001', 'U001', 2, 30),
('B002', 'S002', 'U002', 1, 18),
('B003', 'S001', 'U003', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `cinemaID` varchar(10) NOT NULL,
  `cinemaName` varchar(50) NOT NULL,
  `cinemaSeats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`cinemaID`, `cinemaName`, `cinemaSeats`) VALUES
('C001', 'Cinema 1', 200),
('C002', 'Cinema 1', 200),
('C003', 'Cinema 1', 200);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movieID` varchar(50) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieDescription` varchar(1000) NOT NULL,
  `movieDirector` varchar(200) NOT NULL,
  `movieActor` varchar(200) NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieBanner` varchar(200) NOT NULL,
  `moviePoster` varchar(200) NOT NULL,
  `movieTrailer` varchar(200) NOT NULL,
  `isFeatured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movieID`, `movieTitle`, `movieDescription`, `movieDirector`, `movieActor`, `movieDuration`, `movieBanner`, `moviePoster`, `movieTrailer`, `isFeatured`) VALUES
('M001', 'Tangled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M002', 'Hawkeye', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M003', 'Avengers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M004', 'Iron Man', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M005', 'Captain America', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M006', 'Spider Man', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M007', 'Loco', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M008', 'Cruella', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `priceID` varchar(50) NOT NULL,
  `ticketType` varchar(200) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`priceID`, `ticketType`, `price`) VALUES
('P001', 'Adult', 18),
('P002', 'Child', 14),
('P003', 'Senior', 16);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleID` varchar(50) NOT NULL,
  `movieID` varchar(10) DEFAULT NULL,
  `cinemaID` varchar(10) DEFAULT NULL,
  `scheduleDate` date DEFAULT NULL,
  `scheduleTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleID`, `movieID`, `cinemaID`, `scheduleDate`, `scheduleTime`) VALUES
('S001', 'M001', 'C001', '2021-12-31', '09:00:00'),
('S002', 'M001', 'C002', '2021-12-31', '09:00:00'),
('S003', 'M002', 'C003', '2021-12-31', '09:00:00'),
('S004', 'M002', 'C001', '2021-12-31', '11:00:00'),
('S005', 'M002', 'C002', '2021-12-31', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketID` varchar(50) NOT NULL,
  `bookingID` varchar(10) DEFAULT NULL,
  `seat` varchar(10) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketID`, `bookingID`, `seat`, `code`) VALUES
('T001', 'B001', 'A1', 'qr.jpg'),
('T002', 'B001', 'A2', 'qr.jpg'),
('T003', 'B002', 'A1', 'qr.jpg'),
('T004', 'B003', 'A3', 'qr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(50) NOT NULL,
  `userFirst` varchar(200) NOT NULL,
  `userLast` varchar(200) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userlPassword` varchar(200) NOT NULL,
  `userRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userFirst`, `userLast`, `userEmail`, `userlPassword`, `userRole`) VALUES
('U001', 'Betty', 'Bondoc', 'betinabondoc@gmail.com', '123456', 1),
('U002', 'Pia', 'Satuitio', 'iyasatuito@gmail.com', '123456', 1),
('U003', 'Ma', 'Pia', 'iya@gmail.com', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `scheduleID` (`scheduleID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cinemaID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movieID`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`priceID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `movieID` (`movieID`),
  ADD KEY `cinemaID` (`cinemaID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`scheduleID`) REFERENCES `schedule` (`scheduleID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`movieID`) REFERENCES `movie` (`movieID`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`cinemaID`) REFERENCES `cinema` (`cinemaID`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
