-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 08:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(70) DEFAULT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_author_name` varchar(50) DEFAULT NULL,
  `book_publication_name` varchar(50) DEFAULT NULL,
  `book_purchase_date` varchar(50) DEFAULT NULL,
  `book_price` varchar(10) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `libraian_username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `libraian_username`) VALUES
(3, 'English', NULL, 'mamun', 'Adarsha', '2020-05-01', '700', 63, 540, 'mit'),
(5, 'python programming', NULL, 'Shajahan topon', 'Adarsha', '2020-05-19', '100', 20, 80, 'mit'),
(6, 'test papers', NULL, 'Shajahan topon', 'Adarsha', '2020-05-19', '5', 68, 354, 'mit'),
(7, 'physics', NULL, 'Shajahan topon', 'Adarsha', '2020-05-19', '250', 20, 120, 'mit'),
(8, 'C programming', NULL, 'tosiful islalm', 'tims', '2020-05-26', '250', 20, 100, 'mit');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 1, 6, '19-05-2020', '0', '2020-05-19 17:55:44'),
(2, 1, 3, '19-05-2019', '', '2020-05-19 17:55:55'),
(3, 1, 7, '19-05-2020', '19-05-2020', '2020-05-19 17:56:05'),
(4, 1, 8, '19-05-2020', '19-05-2020', '2020-05-19 17:56:15'),
(5, 1, 5, '19-05-2020', '19-05-2020', '2020-05-19 17:56:26'),
(6, 2, 5, '19-05-2020', '19-05-2020', '2020-05-19 18:07:18'),
(7, 2, 5, '19-05-2020', '19-05-2020', '2020-05-19 18:14:26'),
(8, 1, 3, '19-05-2020', '19-05-2020', '2020-05-19 19:02:24'),
(9, 2, 0, '19-05-2020', '', '2020-05-19 19:02:33'),
(10, 3, 6, '22-05-2020', '', '2020-05-22 09:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `librian`
--

CREATE TABLE `librian` (
  `id` int(6) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librian`
--

INSERT INTO `librian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'md', 'tosif', 'tosif@gmail.com', 'tim', '12345678', '2020-05-06 02:24:32'),
(2, 'm', 'mit', 'tim@gmail.com', 'mit', '25252525', '2020-05-06 02:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `roll` int(10) NOT NULL,
  `reg` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(1, 'tosiful ', 'islam', 161101, 161616, 'tosifulislam101@gmail.com', 'tosif', '$2y$10$JAc4fHNQh1E7n6WtB8LWnOD8my0RqV4zCN1ZuiHUl2zqm3Pww42S2', '01836100860', NULL, 1, '2020-05-19 17:52:54'),
(2, 'tosiful ', 'islam', 161102, 161617, 'tim@gmail.com', 'timam101', '$2y$10$Bj0jFa0KsEvIPUS3CTjnq.MEt5k/lwGjVEMkkjqCB7ai1z1XvfHDi', '01713100860', NULL, 1, '2020-05-19 17:53:29'),
(3, 'mohammad', 'khorshed', 161103, 161618, 'timsoft101@gmail.com', 'khorshed', '$2y$10$rorrUTjXi8aX4Whyy.2ssekRyb4IENDhq3lZeVQqT9n0xwyyP88O.', '01819617404', NULL, 1, '2020-05-19 17:54:12'),
(4, 'md', 'kalek', 161101, 161202, 'tim1@gmail.com', 'tim250000', '12345678', '01836100569', NULL, 1, '2020-05-24 10:44:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librian`
--
ALTER TABLE `librian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `librian`
--
ALTER TABLE `librian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
