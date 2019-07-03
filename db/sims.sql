-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2019 at 11:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sims`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_no` varchar(30) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` text,
  `suppliers` text,
  `notes` varchar(300) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `total_pmt` int(11) NOT NULL,
  `total_bal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_no`, `purchase_date`, `category`, `suppliers`, `notes`, `total_amt`, `total_pmt`, `total_bal`) VALUES
('Purchase-5cebcfc459d8b', '2019-05-27 12:53:53', 'RAW MATERIALS', 'Xaoumi China', 'iphone 6s lite', 70000, 75000, 145000),
('Purchase-5cefdabae5e6c', '2019-05-30 14:30:08', 'FINISHED GOODS', 'Musk Germany', 'garri rate', 70000, 75000, 145000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_no` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `sales_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notes` varchar(100) NOT NULL,
  `total_amt` bigint(100) NOT NULL,
  `dis_amt` bigint(100) NOT NULL,
  `tax_per` bigint(100) NOT NULL,
  `total_bal` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_no`, `customer_id`, `sales_date`, `notes`, `total_amt`, `dis_amt`, `tax_per`, `total_bal`) VALUES
('Sales-5cdf292fd751b', 'First Customer', '2019-05-17 22:36:00', 'UK', 20, 4, 8, 222),
('Sales-5cefdaea2d72c', 'First Customer', '2019-05-30 14:31:26', 'garri rate', 75000, 2, 0, 73000);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `category` varchar(55) DEFAULT NULL,
  `supplier_no` varchar(32) DEFAULT NULL,
  `stock_no` varchar(323) DEFAULT NULL,
  `stock_name` varchar(233) DEFAULT NULL,
  `purchasing_price` bigint(21) DEFAULT NULL,
  `selling_price` bigint(21) DEFAULT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`category`, `supplier_no`, `stock_no`, `stock_name`, `purchasing_price`, `selling_price`, `notes`) VALUES
('FINISHED GOODS', 'Xaoumi China', 'stock-5cebcb03ea919', 'I-Phone 6s', 70000, 10000, 'iphone 6s lite'),
('RAW MATERIALS', 'Xaoumi China', 'stock-5cebefb0a3b58', 'wrist watch', 1000, 1500, 'watch'),
('RAW MATERIALS', 'Musk Germany', 'stock-5cebefd469c74', 'Shoes', 5000, 5500, 'shoes'),
('WORK-IN-PROCESS', 'Philix Usa', 'stock-5cefd9b25b0d2', 'Car Parts', 100000, 150000, 'Car parts');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_no` varchar(30) NOT NULL,
  `supplier_name` varchar(300) NOT NULL,
  `Address` text NOT NULL,
  `City` text NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Contact_Person` bigint(14) NOT NULL,
  `Phone` bigint(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` bigint(15) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_no`, `supplier_name`, `Address`, `City`, `Country`, `Contact_Person`, `Phone`, `email`, `mobile_no`, `note`) VALUES
('Supplier-5cefda54c29fc', 'LINUX', 'TEXAS, USA', 'HOUSGTHON', 'USA', 0, 44962356323, 'admin@linux.com', 0, 'linux');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$.kBsDANJRHALzppnCrnmEezaFXiFFOENEWhZFRtlX93yV5isC2yP6', '2019-05-06 15:24:12'),
(2, 'Bideeen_DSN', 'master', '2019-05-08 13:44:11'),
(3, 'bideen', '$2y$10$9Rkn.vped97FaQmgrjjywOxWEOjhuPLQK3iz8Y.PV/.prFTpm8N4e', '2019-05-27 10:56:16'),
(4, 'aaaremu', '$2y$10$nmleEU2ECOe.KBwfOZ2fhuv1xGZrT3LJ1Or5j4v4ETh2GWLGSlL5u', '2019-05-28 01:12:07'),
(5, 'jaige', '$2y$10$Wn276a6FLs5RDuhWSyDUe.62s.e1KiuspmvOF8PKOy5y2Dsjorupy', '2019-05-30 14:20:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
