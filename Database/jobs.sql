-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `job_postings`
--

CREATE TABLE `job_postings` (
  `id` int(11) NOT NULL,
  `date_posted` date NOT NULL,
  `company` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `job_description` text NOT NULL,
  `apply_by` date NOT NULL,
  `skills_required` varchar(255) NOT NULL,
  `training_period` varchar(50) NOT NULL,
  `google_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_postings`
--

INSERT INTO `job_postings` (`id`, `date_posted`, `company`, `posted_by`, `company_website`, `contact_number`, `email`, `location`, `salary`, `job_description`, `apply_by`, `skills_required`, `training_period`, `google_link`) VALUES
(6, '2024-04-07', 'dummy', 'adadad', 'https://www.google.com/forms/about/', '1312312', 'tuhinpal@gmail.com', 'Kolkata', '1200000', 'asddddddddadadaaaaaaaaasdasdasdddddddddddddd', '2024-04-03', 'asdfasfd', 'asdfsfd', 'https://www.google.com/forms/about/'),
(7, '2024-04-19', 'user webdev', 'username', 'https://www.google.com/forms/about/', '987654321', 'user@gmail.com', 'xyz\r\n', '300000 - 1000000', 'devloper role:- as website developer\r\n                as software developer\r\nneed to be good in php, html&css ', '2024-04-25', 'html, css, php.', '1- 2 months after selection', 'https://www.google.com/forms/about/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(12) NOT NULL,
  `city` varchar(25) NOT NULL,
  `age` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `name`, `number`, `city`, `age`, `email`, `password`) VALUES
(1, 'dummy', 12, 'bg', 1213, 'z@gmail.com', 'zzzz'),
(2, 'dummyaaaaaaaaaaaaaaaa', 1490909, 'kolkata', 12, 'a@gmail.com', 'aaaa'),
(3, 'mvvvvvv', 2147483647, 'bgp', 12, 'm@gmail.com', 'mmmm'),
(4, 'new', 999999, 'bihar', 23, 'w24@gmail.com', 'wwww'),
(5, 'tuhin', 987654321, 'kolkata', 24, 'tuhinpal@gmail.com', '3817848ef191468810fc4b1cfc855ba1'),
(6, '', 0, '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e'),
(7, '', 0, '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, '', 0, '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, '', 0, '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e'),
(10, '', 0, '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e'),
(11, 'shovik ', 2147483647, 'kolkataaaaaaaa', 25, 'shovik@gmail.com', '41d6ad0761a5d27a9e1bd567041ce9e9'),
(12, 'ra', 809809322, 'kol', 19, 'ra@gmail.com', '4b43b0aee35624cd95b910189b3dc231'),
(13, 'user', 987654321, 'kolkata', 22, 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee'),
(14, 'mihir verma', 809182047, 'bglpr', 22, 'm@gmail.com', '9de37a0627c25684fdd519ca84073e34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_postings`
--
ALTER TABLE `job_postings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
