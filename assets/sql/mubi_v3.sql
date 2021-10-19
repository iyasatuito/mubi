-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 06:18 AM
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
('6169bf29c542b', 'S004', 'U001', 3, 48),
('6169bf8429474', 'S002', 'U001', 1, 18),
('6169bfd778851', 'S002', 'U001', 1, 18),
('6169c0061d517', 'S002', 'U001', 3, 48),
('616aa47d866d5', 'S001', 'U001', 3, 68),
('616aa6ea27a41', 'S001', 'U001', 2, 48),
('616aa6fcb8f00', 'S001', 'U001', 0, 0),
('616aa73aef650', 'S001', 'U001', 1, 16),
('616d7c03ec6db', 'S002', 'U001', 4, 62),
('616d7c9007257', 'S001', 'U001', 5, 78),
('616d7cc4cb5b9', 'S001', 'U001', 5, 78),
('616d7cfdac1cd', 'S001', 'U001', 5, 78),
('616d7d145e16d', 'S001', 'U001', 5, 78),
('616d7e5d00c72', 'S001', 'U001', 5, 78),
('616d7e6841070', 'S001', 'U001', 5, 78),
('616d7e714721e', 'S001', 'U001', 5, 78),
('616d7e8d66cbe', 'S001', 'U001', 5, 78),
('616d7ea86a460', 'S001', 'U001', 5, 78),
('616d7f501bdfd', 'S001', 'U001', 5, 78),
('616d7f5eee21b', 'S001', 'U001', 5, 78),
('616d7fafc46e8', 'S001', 'U001', 5, 78),
('616d80077d650', 'S001', 'U001', 5, 78),
('616d804b782f3', 'S001', 'U001', 5, 78),
('616d80ffa9059', 'S001', 'U001', 5, 78),
('616d81330af8b', 'S001', 'U001', 5, 78),
('616d817a9c08a', 'S001', 'U001', 5, 78),
('616d818873a3a', 'S001', 'U001', 5, 78),
('616d81b9d1ae7', 'S001', 'U001', 5, 78),
('616d821d2419e', 'S001', 'U001', 5, 78),
('616d823623161', 'S001', 'U001', 5, 78),
('616d8273a6991', 'S001', 'U001', 5, 78),
('616d827c6c721', 'S001', 'U001', 5, 78),
('616d82b426b00', 'S001', 'U001', 5, 78),
('616d82cef340b', 'S001', 'U001', 5, 78),
('616d83564ba8a', 'S001', 'U001', 3, 48),
('616d863e436b0', 'S001', 'U001', 0, 0),
('616d8657c1e03', 'S001', 'U001', 0, 0),
('616d873be4b7d', 'S001', 'U001', 0, 0),
('616d8743f39b1', 'S001', 'U001', 0, 0),
('616d8788d781c', 'S001', 'U001', 3, 48),
('616d87e2cc36e', 'S001', 'U001', 1, 18),
('616da7788d493', 'S002', 'U001', 3, 48),
('616e3e7e4944d', 'S001', 'U001', 3, 48),
('616e3f1958857', 'S001', 'U001', 0, 0),
('616e3f78bd07d', 'S001', 'U001', 0, 0),
('616e3fe40051f', 'S001', 'U001', 0, 0),
('616e4005138b5', 'S001', 'U001', 0, 0),
('616e40081dd18', 'S001', 'U001', 0, 0),
('616e4025759ad', 'S001', 'U001', 0, 0),
('616e402f1b16f', 'S001', 'U001', 0, 0),
('616e403bd1b35', 'S001', 'U001', 0, 0),
('B001', 'S001', 'U001', 2, 30),
('B002', 'S002', 'U002', 1, 18),
('B003', 'S001', 'U003', 1, 14),
('kskhuhus', 'S001', 'U001', 2, 32);

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
('C002', 'Cinema 2', 200),
('C003', 'Cinema 3', 200);

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
  `movieHero` varchar(100) NOT NULL,
  `movieBanner` varchar(200) NOT NULL,
  `moviePoster` varchar(200) NOT NULL,
  `movieTrailer` varchar(200) NOT NULL,
  `isFeatured` int(11) DEFAULT NULL,
  `isScreening` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movieID`, `movieTitle`, `movieDescription`, `movieDirector`, `movieActor`, `movieDuration`, `movieHero`, `movieBanner`, `moviePoster`, `movieTrailer`, `isFeatured`, `isScreening`) VALUES
('M001', 'Shang-Chi and The Legend of the Ten Rings', 'Marvel Studios’ Shang-Chi and The Legend of The Ten Rings stars Simu Liu as Shang-Chi, who must confront the past he thought he left behind when he is drawn into the web of the mysterious Ten Rings organization. The film also stars Tony Leung as Wenwu, Awkwafina as Shang-Chi’s friend Katy and Michelle Yeoh as Jiang Nan, as well as Fala Chen, Meng’er Zhang, Florian Munteanu and Ronny Chieng. Shang-Chi and The Legend of The Ten Rings is directed by Destin Daniel Cretton and produced by Kevin Feige and Jonathan Schwartz, with Louis D’Esposito, Victoria Alonso and Charles Newirth serving as executive producers. David Callaham & Destin Daniel Cretton & Andrew Lanham wrote the screenplay for the film.', 'Destin Daniel Cretton', 'Simu Liu, Michelle Yeoh, Awkwafina', 120, 'shang-chi-hero.jpg', 'shang-chi.jpg', 'shang-chi-poster.jpg', '8YjFbMbfXaQ', 0, 1),
('M002', 'Free Guy', 'In Free Guy, a bank teller who discovers he is actually a background player in an open-world video game, decides to become the hero of his own story...one he rewrites himself. Now in a world where there are no limits, he is determined to be the guy who saves his world his way...before it is too late. Starring Ryan Reynolds, Jodie Comer, Lil Rel Howery, Joe Keery, Utkarsh Ambudkar and Taika Waititi, Free Guy is directed by Shawn Levy from a screenplay by Matt Lieberman and Zak Penn and a story by Lieberman. The film is produced by Ryan Reynolds, p.g.a., Shawn Levy, p.g.a., Sarah Schechter, Greg Berlanti and Adam Kolbrenner with Mary McLaglen, Josh McLaglen, George Dewey, Dan Levine and Michael Riley McGrath serving as executive producers. Some of the video gaming world’s most influential figures drop in for cameos in “Free Guy,” including: Imane “Pokimane” Anys, Lannan “LazarBeam” Eacott, Seán William “Jacksepticeye” McLoughlin, Tyler “Ninja” Blevins and Daniel “DanTDM” Middleton.', 'Shawn Levy', 'Ryan Reynolds, Taika Waititi, LilRel Howery', 120, 'free-guy-hero.jpg', 'free-guy.jpg', 'free-guy-poster.jpg', 'X2m-08cOAbc', 1, 1),
('M003', 'Paw Patrol: The Movie', 'The PAW Patrol is on a roll! When their biggest rival, Humdinger, becomes Mayor of nearby Adventure City and starts wreaking havoc, Ryder and everyone’s favorite heroic pups kick into high gear to face the challenge head on. While one pup must face his past in Adventure City, the team finds help from a new ally, the savvy dachshund Liberty. Together, armed with exciting new gadgets and gear, the PAW Patrol fights to save the citizens of Adventure City! Joining the PAW Patrol in their thrilling first big screen adventure are members from the original series’ cast along with Iain Armitage, Marsai Martin, Yara Shahidi, Kim Kardashian West, Randall Park, Dax Shepard, with Tyler Perry and Jimmy Kimmel and introducing Will Brisbin.', 'Cal Brunker', 'Tyler Perry, Randall Park, Jimmy Kimmel', 120, 'paw-patrol-hero.jpg', 'paw-patrol.jpg', 'paw-patrol-poster.jpg', 'LRMTr2VZcr8', 0, 0),
('M004', 'Honsla Rakd', 'This film is directed by Amarjit Singh Saroon and produced by Daljit Thind & Diljit Dosanjh. What happens when a loveable, rooted, desi, punjabi young man, who’s a single father with a seven year old boy attempts to find love again, find a mom for his son, crosses paths with his ex who comes back into the city after a seven year gap? Honsla Rakh, starring Diljit Dosanjh, Sonam Bajwa, Shehnaaz Gill & Shinda Grewal is a romantic comedy set in Vancouver, Canada that has warmth at its center and deals with the emotional bonds between father and child, and love between men and women in modern times. ', 'Amarjit Singh Saron', 'Diljit Dosanjh, Sonam Bajwa, Shehnaaz Gill', 120, 'honsla-rakh-hero.jpg', 'honsla-rakh.jpg', 'honsla-rakh-poster.jpg', 'KjOfqltPRqs', 0, 1),
('M005', 'The Dark Knight Rises', 'Despite his tarnished reputation after the events of The Dark Knight (2008), in which he took the rap for Dent\'s crimes, Batman feels compelled to intervene to assist the city and its Police force, which is struggling to cope with Bane\'s plans to destroy the city.', 'Christopher Nolan', 'Joseph Gordon-Levitt, Michael Caine, Tom Hardy', 120, 'dark-knight-hero.jpg', 'dark-night.jpg', 'dark-knight-poster.jpg', 'GAjBzu8ggi0', 1, 0),
('M006', 'The Eternals', 'The Eternals, a race of immortal beings with superhuman powers who have secretly lived on Earth for thousands of years, reunite to battle the evil Deviants.', 'Chloé Zhao', 'Gemma Chan, Richard Madden, Kumail Nanjiani', 120, 'the-eternals-hero.jpg', 'eternals.jpg', 'eternals-poster.jpg', 'x_me3xsvDgk', 0, 0);

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
('S002', 'M001', 'C002', '2021-12-30', '09:00:00'),
('S003', 'M001', 'C003', '2021-12-31', '09:00:00'),
('S004', 'M001', 'C001', '2021-12-31', '11:00:00'),
('S005', 'M001', 'C002', '2021-12-28', '11:00:00');

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
('T003', 'B002', 'A14', 'qr.jpg'),
('T004', 'B003', 'A13', 'qr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(50) NOT NULL,
  `userFirst` varchar(200) NOT NULL,
  `userLast` varchar(200) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userPassword` varchar(200) NOT NULL,
  `userRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userFirst`, `userLast`, `userEmail`, `userPassword`, `userRole`) VALUES
('U000', 'Guest', 'Guest', 'guest@mubi.com', '000000', 2),
('U001', 'Betina', 'Bondoc', 'betinabondoc@gmail.com', '123456', 1),
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
