-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 09:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminnotes`
--

CREATE TABLE `adminnotes` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `direct_link` varchar(255) DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminnotes`
--

INSERT INTO `adminnotes` (`id`, `username`, `department`, `semester`, `subject`, `file_path`, `file_type`, `file_size`, `direct_link`, `upload_time`) VALUES
(1, 'admin', 'CSE', '1', 'Mathematics-I', 'uploads/final mini project report ty cse.pdf', 'application/pdf', 1525191, NULL, '2024-05-29 19:14:23'),
(2, 'admin', 'Mech', '2', 'Mathematics-II', 'uploads/final mini project report ty cse.pdf', 'application/pdf', 1525191, NULL, '2024-05-29 19:14:49'),
(6, 'admin', 'CSE', '2', 'Environmental Science', 'uploads/final mini project report ty cse.docx', 'application/vnd.openxmlformats-officedocument.word', 1237719, 'https://youtu.be/LE9KTG9PFho?si=TeCrDWFpTULLFasr', '2024-05-29 19:49:53'),
(7, 'admin', 'Mech', '2', 'Physics-II', 'uploads/final mini project report ty cse.pdf', 'application/pdf', 1525191, 'https://www.youtube.com/watch?v=y2QfjUQtzlI', '2024-05-30 09:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(38) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `course` varchar(10) DEFAULT NULL,
  `class` char(10) DEFAULT NULL,
  `idcard` varchar(250) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `name`, `email`, `phone`, `course`, `class`, `idcard`, `password`) VALUES
(56, 'sample1', 'sample1@gmail.com', '9561666471', 'Btech', 'Ty', 'idcard/1709371060767.jpeg', '12345'),
(57, 'user1', 'user1@gmail.com', '9561666472', 'Btech', 'Ty', 'idcard/1709371060767.jpeg', '12345'),
(58, 'omkar', 'ow@gmail.com', '9564789560', 'Btech', 'Ty', 'idcard/1709371060767.jpeg', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `atid` int(50) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `course` varchar(250) DEFAULT NULL,
  `class` varchar(250) DEFAULT NULL,
  `roll` varchar(50) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `section` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `clid` int(11) NOT NULL,
  `cl_short` varchar(250) DEFAULT NULL,
  `cl_full` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `cshort` varchar(250) DEFAULT NULL,
  `cfull` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `username`, `department`, `semester`, `subject`, `file_path`, `file_type`, `file_size`, `upload_date`) VALUES
(3, 'admin', 'CSE', 1, 'Mathematics-I', 'uploads/final mini project report ty cse.pdf', 'application/pdf', 1525191, '2024-05-29 18:45:42'),
(4, 'admin', 'CSE', 1, 'Introduction to Programming', 'uploads/final mini project report ty cse.pdf', 'application/pdf', 1525191, '2024-05-29 19:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rid` int(50) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `course` varchar(250) DEFAULT NULL,
  `class` varchar(250) DEFAULT NULL,
  `roll` varchar(250) DEFAULT NULL,
  `sem` varchar(250) DEFAULT NULL,
  `sub1` varchar(250) DEFAULT NULL,
  `obt1` varchar(250) DEFAULT NULL,
  `sub2` varchar(250) DEFAULT NULL,
  `obt2` varchar(250) DEFAULT NULL,
  `sub3` varchar(250) DEFAULT NULL,
  `obt3` varchar(250) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sid` int(50) NOT NULL,
  `section1` varchar(250) DEFAULT NULL,
  `section2` varchar(250) DEFAULT NULL,
  `section3` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentsharednotes`
--

CREATE TABLE `studentsharednotes` (
  `id` int(50) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `dept` varchar(250) DEFAULT NULL,
  `sem` varchar(250) DEFAULT NULL,
  `sub` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `cshort` varchar(250) DEFAULT NULL,
  `cfull` varchar(250) DEFAULT NULL,
  `subject1` varchar(250) DEFAULT NULL,
  `subject2` varchar(250) DEFAULT NULL,
  `subject3` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `name` varchar(38) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `image` varchar(38) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `phone`, `course`, `class`, `image`, `password`) VALUES
(11, 'teacher1', 'teacher1@gmail.com', '8012345678', 'Diploma', 'Fy', 'image/teacher1.jpg', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `course` varchar(10) DEFAULT NULL,
  `class` char(10) DEFAULT NULL,
  `roll` varchar(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fees` varchar(10) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `course`, `class`, `roll`, `email`, `fees`, `usertype`, `password`) VALUES
(1, 'admin', '987654321', NULL, '', '0', 'admin@gmail.com', NULL, 'admin', '1234'),
(24, 'teacher', '123456780', NULL, NULL, NULL, 'teacher@gmail.com', NULL, 'teacher', '1234'),
(61, 'sample1', '9561666471', 'Btech', 'Ty', NULL, 'sample1@gmail.com', NULL, 'student', '12345'),
(62, 'user1', '9561666472', 'Btech', 'Ty', NULL, 'user1@gmail.com', NULL, 'student', '12345'),
(63, 'omkar', '9564789560', 'Btech', 'Ty', NULL, 'ow@gmail.com', NULL, 'student', '12345'),
(64, 'omkar', '9564789560', 'Btech', 'Ty', NULL, 'ow@gmail.com', NULL, 'student', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminnotes`
--
ALTER TABLE `adminnotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`atid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`clid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `studentsharednotes`
--
ALTER TABLE `studentsharednotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminnotes`
--
ALTER TABLE `adminnotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `atid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `clid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentsharednotes`
--
ALTER TABLE `studentsharednotes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
