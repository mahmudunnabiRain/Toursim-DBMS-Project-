-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 01:54 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_booking_table`
--

CREATE TABLE `food_booking_table` (
  `fb_id` int(11) NOT NULL,
  `fb_name` varchar(20) DEFAULT NULL,
  `fb_hour` varchar(20) DEFAULT NULL,
  `fb_price` int(11) DEFAULT NULL,
  `fb_sp_id` int(11) DEFAULT NULL,
  `fb_tourist_id` int(11) DEFAULT NULL,
  `fb_paid` varchar(3) NOT NULL DEFAULT 'no',
  `fb_done` varchar(3) DEFAULT 'no',
  `fb_point` int(11) NOT NULL DEFAULT '0',
  `fb_date` date NOT NULL,
  `fb_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_booking_table`
--

INSERT INTO `food_booking_table` (`fb_id`, `fb_name`, `fb_hour`, `fb_price`, `fb_sp_id`, `fb_tourist_id`, `fb_paid`, `fb_done`, `fb_point`, `fb_date`, `fb_quantity`) VALUES
(1, 'Sea Food', 'lunch', 1120, 1, 19, 'no', 'yes', 3, '2019-04-25', 4),
(2, 'na', 'breakfast', 408, 4, 19, 'no', 'no', 0, '2019-07-18', 12);

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(20) DEFAULT NULL,
  `food_hour` varchar(20) DEFAULT NULL,
  `food_price` int(11) DEFAULT NULL,
  `food_description` varchar(100) DEFAULT NULL,
  `food_image` varchar(255) DEFAULT NULL,
  `food_sp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`food_id`, `food_name`, `food_hour`, `food_price`, `food_description`, `food_image`, `food_sp_id`) VALUES
(1, 'Sea Food', 'lunch', 280, 'rice, dal', '3.jpg', 1),
(2, 'poor', 'breakfast', 20, 'water, ruti', 'nik.jpg', 1),
(3, 'na', 'breakfast', 34, 'dffg', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sp_table`
--

CREATE TABLE `sp_table` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(20) DEFAULT NULL,
  `sp_service_type` varchar(20) DEFAULT NULL,
  `sp_email` varchar(20) DEFAULT NULL,
  `sp_address` varchar(40) DEFAULT NULL,
  `sp_password` varchar(20) DEFAULT NULL,
  `sp_phnno` varchar(20) DEFAULT NULL,
  `sp_point` int(11) NOT NULL,
  `sp_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_table`
--

INSERT INTO `sp_table` (`sp_id`, `sp_name`, `sp_service_type`, `sp_email`, `sp_address`, `sp_password`, `sp_phnno`, `sp_point`, `sp_balance`) VALUES
(1, 'farin', 'food', 'farin@gmail.com', 'Dhaka', '1234', '01521326220', 0, 10000),
(2, 'brinti', 'tourguide', 'brinti@gmail.com', 'bandarban', '111111', '0101010101', 0, 10000),
(3, 'arpon', 'tourguide', 'arpon@gmail.com', 'hdEQUIHUIfchuivh', '12345678', '12345789', 0, 10000),
(4, 'jkgh', 'food', 'a@a.c', 'sd', '1', '456', 0, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tourguide_booking_table`
--

CREATE TABLE `tourguide_booking_table` (
  `tb_id` int(11) NOT NULL,
  `tb_place` varchar(20) DEFAULT NULL,
  `tb_fromdate` date DEFAULT NULL,
  `tb_todate` date DEFAULT NULL,
  `tb_sp_id` int(11) DEFAULT NULL,
  `tb_tourist_id` int(11) DEFAULT NULL,
  `tb_price` int(11) NOT NULL,
  `tb_paid` varchar(3) NOT NULL DEFAULT 'no',
  `tb_done` varchar(3) NOT NULL DEFAULT 'no',
  `tb_point` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourguide_booking_table`
--

INSERT INTO `tourguide_booking_table` (`tb_id`, `tb_place`, `tb_fromdate`, `tb_todate`, `tb_sp_id`, `tb_tourist_id`, `tb_price`, `tb_paid`, `tb_done`, `tb_point`) VALUES
(1, 'bandarban', '2019-05-01', '2019-05-04', 2, 19, 7996, 'no', 'yes', 5),
(2, 'bandarban', '2019-04-26', '2019-04-29', 2, 19, 7996, 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tourguide_table`
--

CREATE TABLE `tourguide_table` (
  `tg_id` int(11) NOT NULL,
  `tg_place` varchar(20) DEFAULT NULL,
  `tg_price` int(11) DEFAULT NULL,
  `tg_description` varchar(100) DEFAULT NULL,
  `tg_sp_id` int(11) DEFAULT NULL,
  `tg_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourguide_table`
--

INSERT INTO `tourguide_table` (`tg_id`, `tg_place`, `tg_price`, `tg_description`, `tg_sp_id`, `tg_image`) VALUES
(1, 'bandarban', 1999, 'i am a good tour guide', 2, 'Nvidia_007.jpg'),
(2, 'coxs bazar', 211111, 'hi', 2, 'bagpack.jpg'),
(3, 'hbdlqcaLKNC', 66667, 'JHBFEHc fbLHAJCBDl', 3, 'WIN_20190124_16_09_54_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tourist_table`
--

CREATE TABLE `tourist_table` (
  `tourist_id` int(11) NOT NULL,
  `tourist_name` varchar(20) DEFAULT NULL,
  `tourist_address` varchar(40) DEFAULT NULL,
  `tourist_password` varchar(20) DEFAULT NULL,
  `tourist_image` varchar(100) DEFAULT NULL,
  `tourist_email` varchar(20) DEFAULT NULL,
  `tourist_phnno` varchar(20) NOT NULL,
  `tourist_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourist_table`
--

INSERT INTO `tourist_table` (`tourist_id`, `tourist_name`, `tourist_address`, `tourist_password`, `tourist_image`, `tourist_email`, `tourist_phnno`, `tourist_balance`) VALUES
(19, 'rain', 'Dhaka', '1234', 'nik.jpg', 'rain@gmail.com', '01784', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_booking_table`
--
ALTER TABLE `food_booking_table`
  ADD PRIMARY KEY (`fb_id`),
  ADD KEY `fb_sp_id` (`fb_sp_id`),
  ADD KEY `fb_tourist_id` (`fb_tourist_id`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `fb_sp_id` (`food_sp_id`);

--
-- Indexes for table `sp_table`
--
ALTER TABLE `sp_table`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `tourguide_booking_table`
--
ALTER TABLE `tourguide_booking_table`
  ADD PRIMARY KEY (`tb_id`),
  ADD KEY `tb_sp_id` (`tb_sp_id`),
  ADD KEY `tb_tourist_id` (`tb_tourist_id`);

--
-- Indexes for table `tourguide_table`
--
ALTER TABLE `tourguide_table`
  ADD PRIMARY KEY (`tg_id`),
  ADD KEY `tg_sp_id` (`tg_sp_id`);

--
-- Indexes for table `tourist_table`
--
ALTER TABLE `tourist_table`
  ADD PRIMARY KEY (`tourist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_booking_table`
--
ALTER TABLE `food_booking_table`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sp_table`
--
ALTER TABLE `sp_table`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tourguide_booking_table`
--
ALTER TABLE `tourguide_booking_table`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tourguide_table`
--
ALTER TABLE `tourguide_table`
  MODIFY `tg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tourist_table`
--
ALTER TABLE `tourist_table`
  MODIFY `tourist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_booking_table`
--
ALTER TABLE `food_booking_table`
  ADD CONSTRAINT `food_booking_table_ibfk_1` FOREIGN KEY (`fb_sp_id`) REFERENCES `sp_table` (`sp_id`),
  ADD CONSTRAINT `food_booking_table_ibfk_2` FOREIGN KEY (`fb_tourist_id`) REFERENCES `tourist_table` (`tourist_id`);

--
-- Constraints for table `food_table`
--
ALTER TABLE `food_table`
  ADD CONSTRAINT `food_table_ibfk_1` FOREIGN KEY (`food_sp_id`) REFERENCES `sp_table` (`sp_id`);

--
-- Constraints for table `tourguide_booking_table`
--
ALTER TABLE `tourguide_booking_table`
  ADD CONSTRAINT `tourguide_booking_table_ibfk_1` FOREIGN KEY (`tb_sp_id`) REFERENCES `sp_table` (`sp_id`),
  ADD CONSTRAINT `tourguide_booking_table_ibfk_2` FOREIGN KEY (`tb_tourist_id`) REFERENCES `tourist_table` (`tourist_id`);

--
-- Constraints for table `tourguide_table`
--
ALTER TABLE `tourguide_table`
  ADD CONSTRAINT `tourguide_table_ibfk_1` FOREIGN KEY (`tg_sp_id`) REFERENCES `sp_table` (`sp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
