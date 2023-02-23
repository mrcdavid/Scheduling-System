-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 07:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `permanent_sched_detail`
--

CREATE TABLE `permanent_sched_detail` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL DEFAULT '',
  `room` varchar(255) NOT NULL,
  `day` varchar(50) NOT NULL DEFAULT '',
  `schedule_from` time DEFAULT NULL,
  `schedule_to` time DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `section` varchar(100) NOT NULL DEFAULT '',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `course_title` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permanent_sched_summary`
--

CREATE TABLE `permanent_sched_summary` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL DEFAULT '',
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_sched`
--

CREATE TABLE `temporary_sched` (
  `temporary_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL DEFAULT '',
  `room` varchar(255) NOT NULL,
  `day` varchar(50) NOT NULL DEFAULT '',
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `section` varchar(100) NOT NULL DEFAULT '',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `course_title` text NOT NULL,
  `unit` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `schedule` time DEFAULT NULL,
  `schedule_to` time DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `id_no` varchar(50) NOT NULL DEFAULT '',
  `faculty_id` varchar(100) NOT NULL DEFAULT '',
  `faculty_name` varchar(100) NOT NULL DEFAULT '',
  `user_type` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `department` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `photo` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '',
  `locked` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `id_no`, `faculty_id`, `faculty_name`, `user_type`, `username`, `password`, `department`, `email`, `photo`, `status`, `locked`, `active`) VALUES
(1, '2022', '2022', 'Admin Default', 'Admin', 'admin', 'e1becf567f8bbec98a654f31ee2acb5326eb40a5', 'DCI', 'admin@ccc.edu.ph', '', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permanent_sched_detail`
--
ALTER TABLE `permanent_sched_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room` (`room`,`day`,`schedule_from`,`schedule_to`,`faculty_id`,`user_id`,`parent_id`) USING BTREE;

--
-- Indexes for table `permanent_sched_summary`
--
ALTER TABLE `permanent_sched_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_sched`
--
ALTER TABLE `temporary_sched`
  ADD PRIMARY KEY (`temporary_id`),
  ADD UNIQUE KEY `room_type` (`room_type`,`room`,`day`,`from_time`,`to_time`,`faculty_id`,`section`,`subject`,`schedule`,`schedule_to`,`unit`) USING BTREE;

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permanent_sched_detail`
--
ALTER TABLE `permanent_sched_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permanent_sched_summary`
--
ALTER TABLE `permanent_sched_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temporary_sched`
--
ALTER TABLE `temporary_sched`
  MODIFY `temporary_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
