-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 09:02 PM
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
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `booking_id` int(11) NOT NULL,
  `Accomodation_id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Ratings` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Cost_per_night` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`booking_id`, `Accomodation_id`, `Name`, `Ratings`, `Location`, `Type`, `Cost_per_night`) VALUES
(101, 1, 'Sea View Resort', 5, 'Cox’s Bazar', 'Resort', 6500),
(102, 2, 'Green Valley Hotel', 4, 'Sylhet', 'Hotel', 4200),
(103, 3, 'City Lights Inn', 4, 'Dhaka', 'Motel', 2500),
(104, 4, 'Mountain Breeze Cottage', 5, 'Bandarban', 'Cottage', 5500),
(105, 5, 'Royal Heritage Hotel', 4, 'Chittagong', 'Hotel', 4800),
(106, 6, 'Sundarban Eco Lodge', 5, 'Khulna', 'Lodge', 3700),
(107, 7, 'Paradise Beach Bungalow', 5, 'Kuakata', 'Bungalow', 7200),
(108, 8, 'Golden Sands Resort', 4, 'Cox’s Bazar', 'Resort', 6000),
(109, 9, 'River View Guest House', 4, 'Rangamati', 'Guest House', 2800),
(110, 10, 'Luxury Stay Apartments', 5, 'Dhaka', 'Apartment', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `User_Admin` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`User_Admin`, `Password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `Package_type` varchar(20) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Payment_status` varchar(10) NOT NULL,
  `Total_cost` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimated_package`
--

CREATE TABLE `estimated_package` (
  `package_id` int(11) NOT NULL,
  `P_name` varchar(20) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Inclusion` int(11) NOT NULL,
  `Base_cost` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int(11) NOT NULL,
  `Group_size` int(11) NOT NULL,
  `Estimated_cost` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `Group_size`, `Estimated_cost`, `user_id`) VALUES
(4, 13, 34, 7),
(5, 312, 2147483647, 1231),
(6, 312, 2147483647, 1231),
(7, 312, 2147483647, 1231);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `reward_id` int(11) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `Discount_percent` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `Tcost` int(11) NOT NULL,
  `Ptype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`reward_id`, `valid_from`, `valid_to`, `Discount_percent`, `booking_id`, `Tcost`, `Ptype`) VALUES
(1, '2025-09-01', '2025-09-15', 10, 101, 6500, 'Resort'),
(2, '2025-09-05', '2025-09-20', 15, 102, 4200, 'Hotel'),
(3, '2025-09-10', '2025-09-25', 5, 103, 2500, 'Motel'),
(4, '2025-09-01', '2025-09-30', 20, 104, 5500, 'Cottage'),
(5, '2025-09-12', '2025-09-22', 13, 105, 4800, 'Hotel'),
(6, '2025-09-15', '2025-09-30', 8, 106, 3700, 'Lodge'),
(7, '2025-09-18', '2025-09-28', 25, 107, 7200, 'Bungalow'),
(8, '2025-09-01', '2025-09-10', 18, 108, 6000, 'Resort'),
(9, '2025-09-20', '2025-09-30', 7, 109, 2800, 'Guest House'),
(10, '2025-09-05', '2025-09-18', 30, 110, 5000, 'Apartment');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Payment_method` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reward_point`
--

CREATE TABLE `reward_point` (
  `reward_id` int(11) NOT NULL,
  `Points` int(11) NOT NULL,
  `Reward_type` varchar(10) NOT NULL,
  `Ranking` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `booking_id` int(11) NOT NULL,
  `Vname` varchar(500) NOT NULL,
  `From` varchar(50) NOT NULL,
  `To` varchar(100) NOT NULL,
  `Vtype` varchar(222) NOT NULL,
  `Price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`booking_id`, `Vname`, `From`, `To`, `Vtype`, `Price`) VALUES
(1, 'Green Line Express', 'Dhaka', 'Chittagong', 'Bus', 1200),
(2, 'Shyamoli Paribahan', 'Dhaka', 'Sylhet', 'Bus', 950),
(3, 'Bangladesh Rail', 'Dhaka', 'Rajshahi', 'Train', 700),
(4, 'Air Astra', 'Dhaka', 'Cox’s Bazar', 'Flight', 5500),
(5, 'UberX', 'Dhanmondi', 'Gulshan', 'Car', 350);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Name`, `Email`, `Phone`, `Password`, `Address`) VALUES
(3, 'Rokib', 'rokib@kdfhglksf', 2147483647, 'Rakib', 'House: 112, Road: 16, Sector: 14, Uttara, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `estimated_package`
--
ALTER TABLE `estimated_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reward_point`
--
ALTER TABLE `reward_point`
  ADD PRIMARY KEY (`reward_id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimated_package`
--
ALTER TABLE `estimated_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reward_point`
--
ALTER TABLE `reward_point`
  MODIFY `reward_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `trip` (`booking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
