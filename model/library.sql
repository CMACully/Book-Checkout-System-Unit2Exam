-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 04:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `bookTitle` varchar(250) NOT NULL,
  `bookDesc` varchar(250) NOT NULL,
  `bookAvail` int(10) NOT NULL,
  `active` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `bookTitle`, `bookDesc`, `bookAvail`, `active`) VALUES
(2, '1000 Gardening Answers & Questions', 'New Yorks', 2, 0),
(3, 'BHG - Step by Step Yard & Garden Basics', 'More than 300 easy projects & tips for a beautiful yard and garden', 3, 1),
(4, 'Gardening with BioChar', 'Supercharge your soil with bioactivated charcoal', 2, 1),
(6, '1000 Life Signs in Gardens', 'Jump right in', 8, 0),
(7, '1000 Gardening Questions & Answers', 'The New York Times', 4, 1),
(8, 'Charlie Bucket ', 'Story about Charlie', 7, 0),
(9, 'Ball Red Book', 'Create beautiful Red Ball Roses with this step-by-step book', 3, 1),
(10, 'Garden Insects of North America', 'Find out what type of garden insects you could see with this helpful book', 2, 1),
(11, 'Greenhouse Gardeners Companion', 'The best Companion to have for those special greenhouse gardeners', 4, 1),
(12, 'How to Get Rid of Garden Pests & Diseases', 'Here is a helpful guide on how to keep your garden safe from those nasty pests and diseases', 4, 1),
(13, 'Lawn & Garden Computerized Fertilizer Recommendation Guide', 'Great techno recommendation guide for lawn and garden fertilizer ', 6, 1),
(14, 'Missouri\'s Oaks & Hickories', 'Find out the different types of Missouri\'s Oaks and Hickories with this great book', 4, 1),
(15, 'Scotts Lawns', 'An exciting book on describing all of ... Scotts lawns', 7, 1),
(16, 'Steel in the Field', 'This book can help show you the helpful tools of steel that can be used in the field', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkOutID` int(11) NOT NULL,
  `checkOutDT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `checkOutBook` varchar(250) NOT NULL,
  `checkOutCustomer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkOutID`, `checkOutDT`, `checkOutBook`, `checkOutCustomer`) VALUES
(40, '2022-11-06 23:01:55', 'BHG - Step by Step Yard & Garden Basics', 'Happy Gilmore'),
(41, '2022-11-07 14:38:46', 'Missouri\'s Oaks & Hickories', 'Happy Gilmore'),
(42, '2022-11-07 15:09:24', 'How to Get Rid of Garden Pests & Diseases', 'Charlie Hampton'),
(43, '2022-11-07 15:09:39', 'Steel in the Field', 'Steel Young');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkOutID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkOutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
