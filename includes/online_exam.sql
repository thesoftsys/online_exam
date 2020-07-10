-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2020 at 10:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
(16, 'Php'),
(17, 'Java'),
(18, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `add_new_exam`
--

CREATE TABLE `add_new_exam` (
  `id` int(10) NOT NULL,
  `course_id` varchar(250) NOT NULL,
  `ename` varchar(250) NOT NULL,
  `nquestion` varchar(250) NOT NULL,
  `exam_time` varchar(250) NOT NULL,
  `pmax` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT '0',
  `equestionm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_new_exam`
--

INSERT INTO `add_new_exam` (`id`, `course_id`, `ename`, `nquestion`, `exam_time`, `pmax`, `status`, `equestionm`) VALUES
(41, '16', 'Level 1', '10', '30', '65', '0', '2'),
(42, '17', 'Level 2', '10', '30', '65', '0', '3'),
(44, '16', 'Level 4', '10', '30', '1', '0', '1'),
(45, '18', 'Level 10', '0', '30', '10', '0', '10'),
(46, '16', 'Level 50', '10', '30', '1', '0', '12');

-- --------------------------------------------------------

--
-- Table structure for table `add_questions`
--

CREATE TABLE `add_questions` (
  `id` int(10) NOT NULL,
  `question_no` varchar(250) NOT NULL,
  `exam_id` varchar(250) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option_one` varchar(250) NOT NULL,
  `option_two` varchar(250) NOT NULL,
  `option_three` varchar(250) NOT NULL,
  `option_four` varchar(250) NOT NULL,
  `right_option` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_questions`
--

INSERT INTO `add_questions` (`id`, `question_no`, `exam_id`, `question`, `option_one`, `option_two`, `option_three`, `option_four`, `right_option`) VALUES
(151, '2', '42', 'Where Is Java Used?', 'For Website Development', 'For App Development', 'For Software Development', 'For All', 'For All'),
(152, '3', '42', 'What is the size of char variable?', '8 bit', '16 bit', '32 bit', '64 bit', '16 bit'),
(153, '4', '42', 'What is the default value of String variable?', 'hjhj', 'jkj', 'kjkj', 'kjkj', 'kjkjk'),
(163, '5', '42', 'askjdh', 'jhj', 'jhj', 'jhj', 'jhj', 'hjhj'),
(164, '1', '41', 'hsh', 'gh', 'hgh', 'ghg', 'hgh', 'ghg'),
(167, '3', '46', 'hgh', 'ghg', 'hgh', 'ghg', 'hgh', 'hghg'),
(168, '4', '46', 'jhjh', 'jhj', 'hjh', 'jh', 'jh', 'jjhj'),
(169, '5', '46', 'ghg', 'hghg', 'hghg', 'hghg', 'hghg', 'hgh'),
(170, '6', '46', 'ghgh', 'ghgh', 'hgh', 'gh', 'ghg', 'hg'),
(171, '7', '46', 'hghg', 'hghg', 'hghg', 'hghg', 'hghg', 'ghg'),
(172, '8', '46', 'hghgh', 'ghghg', 'hghg', 'hghg', 'hghg', 'hghg'),
(182, '9', '46', 'dfd', 'dfd', 'fdf', 'df', 'df', 'dfd'),
(185, '10', '46', 'sdsghhg', 'hghg', 'hgjhg', 'jgjhg', 'jhgjhg', 'ghjgh'),
(187, '2', '41', 'fg', 'gfgf', 'gfgfg', 'fgf', 'gfgf', 'gfgf'),
(188, '3', '41', 'ab', 'jj', 'jj', 'hjhj', 'jj', 'jj'),
(189, '4', '41', 'hh', 'jhjh', 'jhjh', 'jhj', 'hj', 'hjh'),
(190, '5', '41', 'hjhh', 'jh', 'jhj', 'hjh', 'jhj', 'hj'),
(191, '6', '41', 'hg', 'hgh', 'gh', 'gh', 'gh', 'ghssssss');

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
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `id` int(5) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `exam_id` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `total_question` varchar(100) NOT NULL,
  `correct_answer` varchar(100) NOT NULL,
  `wrong_answer` varchar(100) NOT NULL,
  `exam_time` varchar(100) NOT NULL,
  `marks_percentage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`id`, `user_id`, `exam_id`, `course_name`, `exam_name`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`, `marks_percentage`) VALUES
(86, 'dcst2', '41', 'Php', 'Level 1', '3', '3', '0', '20-05-18', '100'),
(87, 'dcst2', '42', 'Java', 'Level 2', '4', '4', '0', '20-05-18', '100'),
(88, 'dcst1', '42', 'Java', 'Level 2', '4', '1', '3', '20-05-18', '25'),
(97, 'Dcst1', '41', 'Php', 'Level 1', '3', '2', '1', '20-05-27', '66.666666666667');

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
(35, 'Abhishek kumar', 'abhishek@gmail.com', 'abhi', '9506847777', 'DCST1', '7599', 2),
(39, 'sanjeet', 'sanjeet@gmail.com', 'san', '8896556979', 'DCST2', '8779', 2);

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
(13, 'DCST1', 'abhi', 2),
(17, 'DCST2', 'san', 2);

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
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `add_new_exam`
--
ALTER TABLE `add_new_exam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `add_questions`
--
ALTER TABLE `add_questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `exam_admin`
--
ALTER TABLE `exam_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `exam_student`
--
ALTER TABLE `exam_student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
