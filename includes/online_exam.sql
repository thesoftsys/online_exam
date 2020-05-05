-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 07:23 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_course`
--

CREATE TABLE `add_course` (
  `id` int(10) NOT NULL,
  `cname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_course`
--

INSERT INTO `add_course` (`id`, `cname`) VALUES
(5, '.Net Development'),
(6, 'Java Programming'),
(7, 'Python Programming');

-- --------------------------------------------------------

--
-- Table structure for table `add_new_exam`
--

CREATE TABLE `add_new_exam` (
  `id` int(10) NOT NULL,
  `ename` varchar(250) NOT NULL,
  `ccode` varchar(250) NOT NULL,
  `nquestion` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `pmax` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `equestionm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_new_exam`
--

INSERT INTO `add_new_exam` (`id`, `ename`, `ccode`, `nquestion`, `time`, `pmax`, `status`, `equestionm`) VALUES
(9, 'First Exam1', 'HFJKL', '500', '14:22', '50', '', '20'),
(10, 'dgfhjkl', 'c53235', '56', '17:02', '50', '', '20');

-- --------------------------------------------------------

--
-- Table structure for table `add_questions`
--

CREATE TABLE `add_questions` (
  `id` int(10) NOT NULL,
  `cname` varchar(250) NOT NULL,
  `ename` varchar(250) NOT NULL,
  `question` varchar(250) NOT NULL,
  `option_one` varchar(250) NOT NULL,
  `option_two` varchar(250) NOT NULL,
  `option_three` varchar(250) NOT NULL,
  `option_four` varchar(250) NOT NULL,
  `right_option` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_questions`
--

INSERT INTO `add_questions` (`id`, `cname`, `ename`, `question`, `option_one`, `option_two`, `option_three`, `option_four`, `right_option`) VALUES
(7, '.Net Development', 'First Exam1', 'full form of cdma', 'code division multiple apply', 'core diver m acess', 'core driver multi approch', 'core division multiple access', 'code division multiple access'),
(8, 'Python Programming', 'dgfhjkl', 'xhgjkl', 'vhjkl', 'hgjkl;', 'vbn', 'dfghjkl', 'fghjkl;');

-- --------------------------------------------------------

--
-- Table structure for table `exam_admin`
--

CREATE TABLE `exam_admin` (
  `id` int(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin` varchar(250) NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_admin`
--

INSERT INTO `exam_admin` (`id`, `email`, `password`, `admin`, `role`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_student`
--

CREATE TABLE `exam_student` (
  `id` int(10) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `otp` varchar(250) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_student`
--

INSERT INTO `exam_student` (`id`, `fullname`, `email`, `password`, `mobile`, `user_id`, `otp`, `role`) VALUES
(15, 'sanjeet', 'sanjeet34@gmail.com', '12345', '231654', 'DCST1', '3015', 2),
(17, 'Utkarsh', 'ut123@gmail.com', 'utk123', '336625252', 'DCST2', '6822', 2),
(18, 'abhi', 'abhi23@gmail.com', 'abhi123', '9935325512', 'DCST3', '5017', 2),
(19, 'student', 'student@gmail.com', 'stu123', '6252665', 'DCST4', '7529', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `id` int(10) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`id`, `user_id`, `password`, `role`) VALUES
(3, 'DCST1', '12345', 2),
(4, 'DCST2', 'utk123', 2),
(5, 'DCST2', 'utk123', 2),
(6, 'DCST3', 'abhi123', 2),
(7, 'DCST4', 'stu123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_course`
--
ALTER TABLE `add_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_new_exam`
--
ALTER TABLE `add_new_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_questions`
--
ALTER TABLE `add_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_admin`
--
ALTER TABLE `exam_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_student`
--
ALTER TABLE `exam_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_course`
--
ALTER TABLE `add_course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `add_new_exam`
--
ALTER TABLE `add_new_exam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `add_questions`
--
ALTER TABLE `add_questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam_admin`
--
ALTER TABLE `exam_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_student`
--
ALTER TABLE `exam_student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
