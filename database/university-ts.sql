-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 10:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university-ts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `email`, `phone`, `password`) VALUES
(1, 'Admin', 'admin@uni-ts.com', '01734292662', '8520');

-- --------------------------------------------------------

--
-- Table structure for table `course_requests`
--

CREATE TABLE `course_requests` (
  `id` int(11) NOT NULL,
  `course_name` varchar(191) NOT NULL,
  `student_id` int(191) NOT NULL,
  `student_name` varchar(191) NOT NULL,
  `student_email` varchar(191) NOT NULL,
  `student_phone` varchar(191) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_requests`
--

INSERT INTO `course_requests` (`id`, `course_name`, `student_id`, `student_name`, `student_email`, `student_phone`, `time`) VALUES
(4, 'CSE173', 1610254042, 'Ahmed Rayhan', 'rayhan.rakib@northsouth.edu', '01717272998', '15-08-2021 11:31 AM'),
(5, 'ARC214', 1610254042, 'Ahmed Rayhan', 'rayhan.rakib@northsouth.edu', '01717272998', '15-08-2021 12:18 PM');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `department` varchar(30) NOT NULL,
  `nsu_id` varchar(10) NOT NULL,
  `member_since` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `phone`, `gender`, `department`, `nsu_id`, `member_since`) VALUES
(1, 'Ahmed Rayhan', 'rayhan.rakib@northsouth.edu', '12345678', '01717272998', 'Male', 'ECE', '1610254042', '04-08-2021');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(60) NOT NULL,
  `course_name` varchar(60) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `teacher_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `student_id` int(30) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `teacher_email` varchar(30) NOT NULL,
  `teacher_phone` varchar(11) NOT NULL,
  `teacher_department` varchar(30) NOT NULL,
  `time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `department` varchar(15) NOT NULL,
  `nsu_id` varchar(10) NOT NULL,
  `member_since` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `phone`, `gender`, `department`, `nsu_id`, `member_since`) VALUES
(1, 'Shahriar Rahman', 'shahriar2020@gmail.com', '123456', '01984738938', 'Male', 'BBA', '1510520042', '04-08-2021'),
(2, 'Raisul Islam', 'raisul123@gmail.com', '123456', '01918765475', 'Male', 'ECE', '1336580042', '14-08-2021');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

CREATE TABLE `teacher_courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `teacher_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nsu_id` int(10) NOT NULL,
  `department` varchar(30) NOT NULL,
  `time` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_courses`
--

INSERT INTO `teacher_courses` (`id`, `course_name`, `teacher_name`, `email`, `phone`, `nsu_id`, `department`, `time`) VALUES
(14, 'CSE215', 'Shahriar Rahman', 'shahriar2020@gmail.com', '01984738938', 1510520042, 'BBA', '15-08-2021 11:55 AM'),
(11, 'ARC214', 'Raisul Islam', 'raisul123@gmail.com', '01918765475', 1336580042, 'ECE', '14-08-2021 07:28 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_requests`
--
ALTER TABLE `course_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_requests`
--
ALTER TABLE `course_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
