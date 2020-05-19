-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 08:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Santanu Kumar Sahu', 'santanu06.1994@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `assign_work`
--

CREATE TABLE `assign_work` (
  `rno` int(11) NOT NULL,
  `requestid` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_pin` int(11) NOT NULL,
  `requester_email` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `assign_tech` varchar(100) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assign_work`
--

INSERT INTO `assign_work` (`rno`, `requestid`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_pin`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(1, 1, 'Laptop not working', 'loptop geting slow after 10 minutes of use.', 'santanu', 'Angul', 'angul', 'Nalco', 'odisha', 759128, 'sanatnu@gamil.com', 8763013999, 'Ramesh Kumar', '2020-05-06'),
(3, 2, 'Mobile not Working', 'Mi note 7pro mobile stop working after 1 hour of continues use .', 'Shakti Sangram Sahu', 'At-A/397,Po-Nalco Nagar', 'At-Balaram parasad', 'Angul', 'Odisha', 759145, 'shakti@gmail.com', 9876543214, 'Tapan Ram', '2020-05-08'),
(6, 3, 'Laptop screen blinking', 'While turning on my laptop on first time a command prompt is blinking.', 'Santanu Kumar sahu', 'AtPo/Balaram Parasd', 'Bhaludari sahi', 'Angul', 'Odisha', 759128, 'santanu@gmail.com', 9874563215, 'Rahul Dixit', '2020-05-10'),
(7, 4, 'Logiteck Keyboard not working', 'Some of the key not working some time of my keyboard', 'abcd', 'abcd', 'xyz', 'dfgh', 'fwd', 234555, 'shakti@gmail.com', 9874566547, 'Badal hota', '2020-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE `customer_invoice` (
  `cp_id` int(11) NOT NULL,
  `cust_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `cust_add` varchar(60) COLLATE utf8_bin NOT NULL,
  `cproduct_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cp_quantity` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `total_price` float NOT NULL,
  `selldate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_invoice`
--

INSERT INTO `customer_invoice` (`cp_id`, `cust_name`, `cust_add`, `cproduct_name`, `cp_quantity`, `selling_price`, `total_price`, `selldate`) VALUES
(1, 'Santanu', 'bbsr', 'Keyboard', 2, 2000, 4000, '2020-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `p_dop` date NOT NULL,
  `p_available` int(11) NOT NULL,
  `p_total` int(11) NOT NULL,
  `p_original_cost` float NOT NULL,
  `p_selling_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`p_id`, `p_name`, `p_dop`, `p_available`, `p_total`, `p_original_cost`, `p_selling_cost`) VALUES
(3, 'Keyboard', '2019-05-11', 18, 20, 500, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest`
--

CREATE TABLE `submitrequest` (
  `requestid` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `requester_add1` varchar(50) COLLATE utf8_bin NOT NULL,
  `requester_add2` varchar(50) COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `requester_satate` varchar(50) COLLATE utf8_bin NOT NULL,
  `requester_pin` int(11) NOT NULL,
  `requester_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `technician_details`
--

CREATE TABLE `technician_details` (
  `tech_id` int(11) NOT NULL,
  `tech_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `tech_city` varchar(30) COLLATE utf8_bin NOT NULL,
  `tech_mobile` varchar(20) COLLATE utf8_bin NOT NULL,
  `tech_emailid` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_details`
--

INSERT INTO `technician_details` (`tech_id`, `tech_name`, `tech_city`, `tech_mobile`, `tech_emailid`) VALUES
(2, 'Tapan Ojha', 'Jajpur', '9876543215', 'tapan@gmail.com'),
(3, 'Ramesh Moharana', 'Angul', '9876544785', 'ramesh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `u_emailid` varchar(50) COLLATE utf8_bin NOT NULL,
  `u_password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`u_id`, `u_name`, `u_emailid`, `u_password`) VALUES
(5, 'Tapas Kumar Mohanty', 'tapas@gmail.com', 'tapas123'),
(9, 'smith sangram', 'smith@gmail.com', 'smith123'),
(11, 'Shakti Sangram Sahu', 'shakti@gmail.com', 'shakti123'),
(12, 'Shakti Sangram Sahu', 'shakti@gmail.com', 'shakti123'),
(13, 'Gopal Mohanty', 'gopal@gmail.com', 'gopal123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assign_work`
--
ALTER TABLE `assign_work`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `submitrequest`
--
ALTER TABLE `submitrequest`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `technician_details`
--
ALTER TABLE `technician_details`
  ADD PRIMARY KEY (`tech_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign_work`
--
ALTER TABLE `assign_work`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submitrequest`
--
ALTER TABLE `submitrequest`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `technician_details`
--
ALTER TABLE `technician_details`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
