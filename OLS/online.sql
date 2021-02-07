-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 07:22 PM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `category` varchar(300) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `requirements` varchar(500) NOT NULL,
  `outcome` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category`, `duration`, `requirements`, `outcome`) VALUES
(1, 'analysis of algorithm', 'computer science', '12 weeks', 'Basic knowledge of any programming language like C, C++, Java, Python', 'After completing this course, students will be able to:\r\n1. Compare and demonstrate the efficiency of algorithms using asymptotic complexity notations\r\n2. Analyze and solve problems for different divide and conquer strategy, greedy method, dynamic\r\nprogramming approach and backtracking and branch & bound policies.\r\n3. Analyze and solve problems for different string matching algorithms'),
(2, 'digital design', 'computer science', '12 weeks', '', 'After completing this course, students will be able to:\r\n1. Recall basic gates & logic families and binary, octal & hexadecimal calculations\r\nand conversions.\r\n2. Use different minimization technique and solve combinational circuits.\r\n3. Design synchronous and asynchronous sequential circuits.\r\n4. Construct test and debug digital networks using VHDL.'),
(3, 'digital communication and network', 'computer science', '12 weeks', '', 'After completing this course students will-\r\n1. Explain the fundamentals of the Digital communication and Information theory e.g. modulation, information, entropy, sampling theorem, Shannon?s theorem etc.\r\n2. Explain the fundamentals of the data communication networks, reference models, topologies, physical media, devices, simulators and identify their use in day to day networks.\r\n3. Describe Data Link Layer, MAC layer technologies & protocols and implement the functionalities like error control, flow control.\r\n4. Describe the Network layer concepts and implement primitives related to addressing.\r\n5. Analyze the network on different performance metrics.'),
(4, 'microprocessor', 'computer science', '12 weeks', '', 'After completing this course, students will be able to:\r\n1. Explain the process of Compilation from Assembly language to machine language\r\n2. Build Microprocessor based system using memory chips and peripheral chips\r\n3. Analyze the techniques for faster execution of instructions and enhance performance of\r\nmicroprocessors.\r\n4. Identify and describe multicore processors'),
(5, 'theory of computer science', 'computer science', '12 weeks', '', 'After successful completion of the course students should be able to\r\nOutcome:\r\n1. describe languages using Regular Expressions, Finite Automata,\r\nNondeterministic Finite Automata, Mealy Machines, Moore Machines\r\n2. describe the formal relationships among machines, languages and\r\ngrammars\r\n3. write, simplify and normalize context free grammars.\r\n4. design Push down automata and Turing Machines'),
(6, 'operating system', 'computer science', '12 weeks', '', 'After successful completion of the course students should be able to:\r\n1. Explain the fundamental concepts of operating system with extension to Unix and Mobile OS\r\n2. Elaborate the concepts of process and threads with state transitions.\r\n2. Illustrate the working of process scheduling algorithms and compare their performance\r\n4. Describe the problems related to process concurrency and the different synchronization mechanisms available to solve them.\r\n5. Explain disk organization and file system structure with illustration of disk scheduling algorithms'),
(7, 'Object Oriented programing', 'Computer Science', '12 weeks', 'none', 'Full understanding of Objects');

-- --------------------------------------------------------

--
-- Table structure for table `educontent`
--

CREATE TABLE `educontent` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educontent`
--

INSERT INTO `educontent` (`id`, `cid`, `tid`, `title`, `creator`, `link`) VALUES
(1, 1, 1, 'Divide and Conquer', 'Hardik', 'https://www.youtube.com/embed/2Rr2tW9zvRg'),
(2, 1, 2, 'Greedy Method', 'Hardik', 'https://www.youtube.com/embed/ARvQcqJ_-NY'),
(3, 1, 3, 'Dynamic Programming', 'Hardik', 'https://www.youtube.com/embed/5dRGRueKU3M'),
(4, 1, 4, 'Backtracking', 'Hardik', 'https://www.youtube.com/embed/DKCbsiDBN6c'),
(5, 1, 5, 'Branch and Bound', 'Hardik', 'https://www.youtube.com/embed/3RBNPc0_Q6g'),
(6, 1, 6, 'String Matching Algorithms', 'Hardik', 'https://www.youtube.com/embed/V5-7GzOfADQ'),
(7, 2, 7, 'Introduction', 'Hardik', 'https://www.youtube.com/embed/zYT1tyA-mVM'),
(9, 3, 8, 'Raid Levels', 'Hardik', 'https://www.youtube.com/embed/dZAg5YLyJqw'),
(10, 3, 9, 'Framing', 'Hardik', 'https://www.youtube.com/embed/EwyPY_TSRcs'),
(11, 4, 10, '8086 Introduction', 'Hardik', 'https://www.youtube.com/embed/DmwOSdwzZ3E'),
(12, 5, 12, 'Push Down Automata', 'Hardik', 'https://www.youtube.com/embed/Gi44PRorYow'),
(13, 5, 13, 'Regular Language', 'Hardik', 'https://www.youtube.com/embed/WrzaPNj9OZ4'),
(14, 6, 14, 'File allocation techniques', 'Hardik', 'https://www.youtube.com/embed/LWPMnCNd1q8'),
(15, 7, 15, 'Threads', 'Hardik', 'https://www.youtube.com/embed/L95658yXRgI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Mname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `EmailId` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Age` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Mname`, `Lname`, `username`, `EmailId`, `password`, `DOB`, `Age`, `type`) VALUES
(1, 'mihir', 'milind', 'gandhi', 'mihir.mg', 'mihir.mg@somaiya.edu', 'mihirgandhi', '1998-06-07', 20, 1),
(2, 'hardik', 'kamlesh', 'chodvadiya', 'hardik.c', 'hardik.c@somaiya.edu', 'hardik', '1998-09-17', 20, 1),
(3, 'amit', 'nilesh', 'dave', 'amit.dave', 'amit.dave@somaiya.edu', 'amitdave', '1998-11-04', 20, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educontent`
--
ALTER TABLE `educontent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`tid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `educontent`
--
ALTER TABLE `educontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
