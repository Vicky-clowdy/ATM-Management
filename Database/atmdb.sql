-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 06:03 AM
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
-- Database: `atmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `amounttb`
--

CREATE TABLE `amounttb` (
  `amount` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amounttb`
--

INSERT INTO `amounttb` (`amount`, `id`) VALUES
('3210.68', '01'),
('800', '02'),
('61000', '03'),
('400', '04'),
('5000', '05');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `DOB` date DEFAULT NULL,
  `pan_number` varchar(100) NOT NULL,
  `loan_amt` varchar(100) NOT NULL,
  `loan_emi` decimal(10,2) DEFAULT NULL,
  `total_amt` decimal(10,2) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `user_name`, `mobile_number`, `DOB`, `pan_number`, `loan_amt`, `loan_emi`, `total_amt`, `status`) VALUES
('01', 'vicky', '1234567890', '0000-00-00', 'AEWQSXDFF', '55000', 4887.00, -4.00, 'completed'),
('01', 'john', '1234567890', '0000-00-00', 'ASDQWERD', '55000', 4886.68, 53753.52, 'pending'),
('01', 'smith', '1234567890', '0000-00-00', 'ASDQWERD', '55000', 4886.68, 58640.20, 'pending'),
('01', 'vicky', '1234567890', '1999-04-17', 'ASDQWERD', '55000', 4886.68, 58640.20, 'pending'),
('01', 'John smith', '1234567890', '2000-04-17', 'AEWQSXFAS7', '100000', 4614.49, 106133.33, 'pending'),
('01', 'vicky', '1234567890', '2000-04-21', 'AEWQSXFAS9', '55000', 2537.97, 50759.42, 'pending'),
('01', 'vicky', '9876543210', '2005-04-21', 'AEWPV2341K', '55000', 2799.27, 64383.19, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `name` varchar(30) NOT NULL,
  `pin` int(10) NOT NULL,
  `id` varchar(100) NOT NULL,
  `acc_number` bigint(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`name`, `pin`, `id`, `acc_number`) VALUES
('user1', 1234, '01', 1234567890),
('user2', 2345, '02', 2545661654),
('user3', 3456, '03', 7652910457),
('user4', 4567, '04', 8523671035),
('user5', 5678, '05', 9765922109);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_type` enum('deposit','withdrawl') DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `user_id`, `transaction_type`, `amount`, `transaction_date`) VALUES
(34, 1, 'deposit', 500.00, '2024-04-21 07:08:37'),
(35, 1, 'withdrawl', 100.00, '2024-04-21 07:08:51'),
(36, 1, 'withdrawl', 100.00, '2024-04-21 08:56:57'),
(37, 1, 'deposit', 500.00, '2024-04-21 08:57:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amounttb`
--
ALTER TABLE `amounttb`
  ADD UNIQUE KEY `id` (`id`(10));

--
-- Indexes for table `logintb`
--
ALTER TABLE `logintb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amounttb`
--
ALTER TABLE `amounttb`
  ADD CONSTRAINT `amounttb_ibfk_1` FOREIGN KEY (`id`) REFERENCES `logintb` (`id`),
  ADD CONSTRAINT `amounttb_ibfk_2` FOREIGN KEY (`id`) REFERENCES `logintb` (`id`),
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `logintb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
