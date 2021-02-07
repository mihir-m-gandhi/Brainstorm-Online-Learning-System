-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 07:29 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `cid`, `Name`, `Description`) VALUES
(1, 1, 'Divide and Conquer', '1. Decision and analysis fundamentals.\n\r\n2. Performance analysis , space and time complexity.\n \r\n3. Growth of function - Big -Oh ,Omega , Theta notation\r\n4. Analysis of selection sort , insertion sort\r\n5. Randomized algorithms\r\n3. Recursive algorithms\r\n4. The substitution method \n\r\nRecursion tree method'),
(2, 1, 'Greedy Method', '1. Decision and analysis fundamentals.\n\r\n2. Performance analysis , space and time complexity.\n \r\n3. Growth of function - Big -Oh ,Omega , Theta notation\r\n4. Analysis of selection sort , insertion sort\r\n5. Randomized algorithms\r\n3. Recursive algorithms\r\n4. The substitution method \n\r\nRecursion tree method'),
(3, 1, 'Dynamic Programming', '1. Decision and analysis fundamentals.\n\r\n2. Performance analysis , space and time complexity.\n \r\n3. Growth of function - Big -Oh ,Omega , Theta notation\r\n4. Analysis of selection sort , insertion sort\r\n5. Randomized algorithms\r\n3. Recursive algorithms\r\n4. The substitution method \n\r\nRecursion tree method'),
(4, 1, 'Backtracking', '1. Decision and analysis fundamentals.\n\r\n2. Performance analysis , space and time complexity.\n \r\n3. Growth of function - Big -Oh ,Omega , Theta notation\r\n4. Analysis of selection sort , insertion sort\r\n5. Randomized algorithms\r\n3. Recursive algorithms\r\n4. The substitution method \n\r\nRecursion tree method'),
(5, 1, 'Branch and Bound', '1. Decision and analysis fundamentals.\n\r\n2. Performance analysis , space and time complexity.\n \r\n3. Growth of function - Big -Oh ,Omega , Theta notation\r\n4. Analysis of selection sort , insertion sort\r\n5. Randomized algorithms\r\n3. Recursive algorithms\r\n4. The substitution method \n\r\nRecursion tree method'),
(6, 1, 'String Matching Algorithms', '1. Decision and analysis fundamentals.\n\r\n2. Performance analysis , space and time complexity.\n \r\n3. Growth of function - Big -Oh ,Omega , Theta notation\r\n4. Analysis of selection sort , insertion sort\r\n5. Randomized algorithms\r\n3. Recursive algorithms\r\n4. The substitution method \n\r\nRecursion tree method'),
(7, 2, 'Introduction', 'Digital design implementation '),
(8, 3, 'Raid Levels', 'Disc allocations'),
(9, 3, 'Framing', 'Frames or packets travelling from data link layer'),
(10, 4, '8086 Introduction', 'Basic Introduction in 8085 '),
(11, 5, 'Turing  machines', 'Using Buffers'),
(12, 5, 'Push Down Automata', 'Using stack'),
(13, 5, 'Regular Language', 'Lowest level possible for machines'),
(14, 6, 'File allocation techniques', 'how Files are allocated'),
(15, 7, 'Threads', 'Threads package');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
