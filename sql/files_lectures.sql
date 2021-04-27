-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 05:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `files_lectures`
--

CREATE TABLE `files_lectures` (
  `l_file_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `time_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files_lectures`
--

INSERT INTO `files_lectures` (`l_file_id`, `lecture_id`, `file_name`, `time_created`) VALUES
(43, 30, 'f640901d5cee08a302ee2c61be1844e8.pdf', '2021-04-25 14:59:45'),
(44, 30, '7a90d0173c4942a6751b1daeee7baca5.pdf', '2021-04-25 14:59:45'),
(45, 30, '56c4b13913fb5b0bb113e5af114b2ac5.pdf', '2021-04-25 14:59:45'),
(46, 31, '43d473f8b8f25e54f6bbbf139f30abba.pdf', '2021-04-25 15:00:17'),
(47, 31, 'a515d1e8c67f1bcb1d251cff489a0c58docx', '2021-04-25 15:00:17'),
(48, 32, '1331164cf419a675d1fe8e4afd44f9ec.pdf', '2021-04-25 15:00:38'),
(49, 32, '71c67331b71be82eee1ea1bcab0f203cpptx', '2021-04-25 15:00:38'),
(50, 33, 'a509d03b513e97441bb82c1a52248647docx', '2021-04-25 15:04:08'),
(51, 34, 'f640901d5cee08a302ee2c61be1844e8.pdf', '2021-04-27 21:17:19'),
(52, 34, '7a90d0173c4942a6751b1daeee7baca5.pdf', '2021-04-27 21:17:19'),
(53, 35, 'f640901d5cee08a302ee2c61be1844e8.pdf', '2021-04-27 21:20:14'),
(54, 35, '7a90d0173c4942a6751b1daeee7baca5.pdf', '2021-04-27 21:20:14'),
(55, 36, 'd41d8cd98f00b204e9800998ecf8427e', '2021-04-27 21:20:43'),
(56, 37, 'f640901d5cee08a302ee2c61be1844e8.pdf', '2021-04-27 21:22:11'),
(57, 38, '7a90d0173c4942a6751b1daeee7baca5.pdf', '2021-04-27 21:23:43'),
(58, 39, 'f640901d5cee08a302ee2c61be1844e8.pdf', '2021-04-27 21:50:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files_lectures`
--
ALTER TABLE `files_lectures`
  ADD PRIMARY KEY (`l_file_id`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files_lectures`
--
ALTER TABLE `files_lectures`
  MODIFY `l_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files_lectures`
--
ALTER TABLE `files_lectures`
  ADD CONSTRAINT `files_lectures_ibfk_1` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`lecture_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
