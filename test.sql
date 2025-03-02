-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 07:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `Sections_ID` int(11) NOT NULL,
  `Section_Icon` varchar(250) NOT NULL,
  `Section_Name` varchar(250) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `Sub_Title` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  `img` varchar(250) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `Add_Date` date NOT NULL DEFAULT current_timestamp(),
  `Update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`Sections_ID`, `Section_Icon`, `Section_Name`, `Title`, `Sub_Title`, `Description`, `img`, `Status`, `Add_Date`, `Update_date`) VALUES
(1, 'DL-learning.svg', 'test', 'test', 'test', 'shdfafbfd', 'DL-Learning-1.jpg', 0, '2025-03-02', '0000-00-00'),
(2, 'Icon-24597.svg', 'asdfa test2', 'test2 ', 'asdasd', 'asdasdasd test2', 'slider-43618.jpg', 0, '2025-03-02', '0000-00-00'),
(3, 'DL-learning.svg', 'test', 'sdf', 'sdf', 'sdfdsfsdf', 'slider-61235.jpg', 0, '2025-03-02', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`Sections_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `Sections_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
