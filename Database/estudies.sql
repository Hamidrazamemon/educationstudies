-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2022 at 02:37 AM
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
-- Database: `estudies`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_report`
--

CREATE TABLE `academic_report` (
  `attendance` varchar(255) NOT NULL,
  `class_perform` varchar(255) NOT NULL,
  `class_behaviour` varchar(255) NOT NULL,
  `tests_num` int(10) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `std_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_report`
--

INSERT INTO `academic_report` (`attendance`, `class_perform`, `class_behaviour`, `tests_num`, `grade`, `std_id`) VALUES
('10', 'Good', 'Poor', 90, 'A1', 1),
('40', 'Good', 'Poor', 90, 'B', 2),
('10', 'Good', 'Poor', 25, 'A1', 3),
('50', 'Good', 'Good', 90, 'A1', 4),
('50', 'Good', 'Good', 44, 'B', 5);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `contact` int(15) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `firstname`, `lastname`, `email`, `password`, `category`, `contact`, `student_id`) VALUES
(1, 'Hussain', 'Riaz', 'parent@gmail.com', '12345', 'Parents', 3332133, 2);

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE `revision` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revision`
--

INSERT INTO `revision` (`id`, `title`, `date`, `teacher_name`, `subject`) VALUES
(1, 'new', '2022-08-21', 'Faizan', 'Urdu'),
(2, 'ggg', '2022-08-25', 'Hussain', 'Urdu'),
(3, 'Story', '2022-08-27', 'Ahmed', 'Urdu');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `contact` int(13) NOT NULL,
  `age` int(10) NOT NULL,
  `class` int(10) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `pass`, `contact`, `age`, `class`, `teacher_id`, `category`) VALUES
(1, 'Hussain Riaz', 'student@gmail.com', '123', 30210224, 19, 4, 19, 'Student'),
(2, 'Hussain Riaz', 'student@gmail.com', '12345', 33321, 18, 5, 20, 'Student'),
(3, 'Muzammil', 'muzammil@gmail.com', '12345', 3332211, 18, 10, 20, 'Student'),
(4, 'Hussain Riaz', 'student22@gmail.com', '12345', 13133, 18, 10, 20, 'Student'),
(5, 'unknwon', 'student222@gmail.com', '1234', 3332133, 18, 10, 20, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `study_notes`
--

CREATE TABLE `study_notes` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `teachername` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `new_name` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `study_notes`
--

INSERT INTO `study_notes` (`id`, `title`, `teachername`, `subject`, `new_name`) VALUES
(2, 'New', 'Ahmed', 'urdu', '1208221660329917Orange___Blue_Modern_Smart_Tutoring_Logo-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'inactive',
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `category`, `contact`, `status`, `subject`) VALUES
(11, 'Tech', 'Solution', 'admin@gmail.com', '12345', 'Admin', '2324233', 'Active', ''),
(18, 'Hussain', 'Riaz', 'hussainriaz@gmail.com', '12345', 'Parents', '03332133', 'inactive', ''),
(20, 'Ahmed', 'Riaz', 'teacher@gmail.com', '12345', 'Teacher', '03332133', 'Active', 'English');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_report`
--
ALTER TABLE `academic_report`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_notes`
--
ALTER TABLE `study_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `study_notes`
--
ALTER TABLE `study_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
