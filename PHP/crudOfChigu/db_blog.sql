-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 10:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_detail` text NOT NULL,
  `create_at` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_title`, `blog_detail`, `create_at`, `user_id`, `status`) VALUES
(2, 'Chnadrayan 3 - 2023', 'India is having another success by landing chandrayan on moon on dated 23-8-2023', '2023-08-28', 3, 1),
(3, 'DPA Class for ty students', 'They dont know the concept of query so allow them to sit in FY class', '2023-08-28', 2, 1),
(4, 'Internal Exam on 25 sept', 'Internal exam is going to start from 25th sepetember.', '2023-08-29', 4, 1),
(8, 'test', 'test blog', '2023-09-02', 4, 1),
(10, 'Testing blog', 'this is just for testing', '2023-09-04', 3, 1),
(12, 'demo', 'demo testing', '2023-09-09', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobileno` bigint(20) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `address`, `mobileno`, `emailid`, `password`) VALUES
(2, 'Rahul', 'Gandhi', 'Delhi', 7878787878, 'rahul@gmail.com', '123'),
(3, 'abc', 'xyz', 'xyz', 654654561, 'abc@gmail.com', '123'),
(4, 'Test', 'test', 'test data', 852369741, 'test@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `tbl_blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
