-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2023 at 01:49 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artbyyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `AboutID` int(11) NOT NULL,
  `HomePage` text,
  `Story` text,
  `AboutImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`AboutID`, `HomePage`, `Story`, `AboutImage`) VALUES
(1, 'A community of artists coming together to share personal work and consignment pieces for the general public. Do you have what it takes?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'files\\unnamed.jpg\"');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `ArtistID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ArtistImage` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`ArtistID`, `Name`, `ArtistImage`, `Type`, `Description`) VALUES
(1, 'David Parker', 'files/artists/Artist_Name1.jpg', 'painter-oils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(2, 'Christian Dumfires', 'files/artists/Artist_Name2.jpg', 'painter-oils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(3, 'Mathew George', 'files/artists/Artist_Name3.jpg', 'painter-oils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(4, 'DeCaprio DiVinci', 'files/artists/Artist_Name4.jpg', 'painter-oils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(5, 'Patrick Batemon', 'files/artists/Artist_Name5.jpg', 'painter-oils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(6, 'Bruce Wayne', 'files/artists/Artist_Name6.jpg', 'painter-oils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(7, 'John Matthews', 'files/artists/Artist_Name7.jpg', 'painter-oils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(8, 'David Goggins', 'files/artists/Artist_Name8.jpg', 'painter-oils', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(15, 'new', 'files/artists/', 'new', 'new'),
(16, 'new', 'files/artists/', 'new', 'new'),
(17, 'nejd', 'files/artists/', 'jdwnjllhi', 'ljkjkljl'),
(18, 'a', 'files/artists/', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `ArtID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ArtImage` varchar(100) NOT NULL,
  `ThemeID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`ArtID`, `Title`, `ArtImage`, `ThemeID`, `ArtistID`) VALUES
(1, 'Birds', 'files\\Animals\\Animals_1.jpg', 1, 1),
(2, 'Wild', 'files\\Animals\\Animal_2.jpg', 1, 1),
(3, 'Roar', 'files\\Animals\\Animal_3.jpg', 1, 1),
(4, 'Authentic', 'files\\Animals\\Animal_4.jpg', 1, 1),
(5, 'Elegant', 'files\\Animals\\Animal_5.jpg', 1, 7),
(6, 'Rise', 'files\\Flower\\unnamed.jpg', 2, 2),
(7, 'Bloom', 'files\\Flower\\unnamed_2.jpg', 2, 2),
(8, 'Happy ', 'files\\Flower\\unnamed_3.jpg', 2, 2),
(9, 'Embrace', 'files\\Flower\\unnamed_4.jpg', 2, 2),
(10, 'Enhance', 'files\\Flower\\unnamed_5.jpg', 2, 8),
(11, 'Taste', 'files\\Food\\unnamed_1.jpg', 3, 3),
(12, 'Experience ', 'files\\Food\\unnamed_2.jpg', 3, 3),
(13, 'Crave', 'files\\Food\\unnamed_3.jpg', 3, 3),
(14, 'Eat', 'files\\Food\\unnamed_4.jpg', 3, 3),
(15, 'Fuel', 'files\\Food\\unnamed_5.jpg\r\n', 3, 8),
(16, 'Feel', 'files\\Water\\water_1.jpg', 6, 4),
(17, 'Beach', 'files\\Water\\water_2.jpg', 6, 4),
(18, 'planet', 'files\\Water\\water_3.jpg', 6, 4),
(19, 'wave', 'files\\Water\\water_4.jpg', 6, 4),
(20, 'Special', 'files\\Water\\water_5.jpg', 6, 5),
(21, 'Art', 'files\\Pot\\Pot_1.jpg', 5, 5),
(22, 'Work', 'files\\Pot\\Pot_2.jpg', 5, 5),
(23, 'Effort', 'files\\Pot\\Pot_3.jpg', 5, 5),
(24, 'Clean', 'files\\Pot\\Pot_4.jpg', 5, 6),
(25, 'Messy', 'files\\Pot\\Pot_5.jpg', 5, 6),
(26, 'Beauty', 'files\\textile\\Textile_1.jpg', 4, 6),
(27, 'New', 'files\\textile\\Textile_2.jpg', 4, 6),
(28, 'Colours', 'files\\textile\\Textile_3.jpg', 4, 7),
(29, 'Mix', 'files\\textile\\Textile_4.jpg', 4, 7),
(30, 'Different', 'files\\textile\\Textile_5.jpg', 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `UserId` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`UserId`, `ArtistID`, `Username`, `Password`) VALUES
(1, 1, 'jmenn', 'abc123'),
(2, 8, 'carl', 'abc123'),
(3, 4, 'mama', 'mama'),
(4, 5, 'skass', 'abc123'),
(5, 6, 'tvax', 'abc123'),
(6, 16, 'new', '$2y$10$Ami3lXsEQIBflkTQew1Rju2VvbnGHQy.GdiKXOeRWno6qn6dDMBoW'),
(7, 17, 'ljkljk', '$2y$10$YJgAiEtJLt2ZCj8wtv8I0ufKd3PSz68PNuXOlRKcaoYfBeTNLdllG'),
(8, 18, 'a', '$2y$10$7GbRsZ2i9xkPcJalGHsBjO9RzMVJZVTjwNH49S0AjnQjsJiNemOSS');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `ThemeID` int(11) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `ThemeImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`ThemeID`, `Theme`, `ThemeImage`) VALUES
(1, 'Animals', 'files\\Animals\\Animal_2.jpg'),
(2, 'Flower', 'files\\Flower\\unnamed.jpg'),
(3, 'Food', 'files\\Food\\unnamed_1.jpg'),
(4, 'textiles', 'files\\textile\\Textile_1.jpg'),
(5, 'Pot', 'files\\Pot\\Pot_1.jpg'),
(6, 'Water', 'files\\Water\\water_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`AboutID`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`ArtID`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`ThemeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `AboutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `ArtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `ThemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
