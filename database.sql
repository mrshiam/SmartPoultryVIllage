-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 04:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartpoultryvillage`
--

-- --------------------------------------------------------

--
-- Table structure for table `chicken_mortality`
--

CREATE TABLE `chicken_mortality` (
  `id` int(10) NOT NULL,
  `chicken_number` int(20) NOT NULL,
  `batch_name` varchar(50) NOT NULL,
  `reason_of_die` varchar(60) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chicken_mortality`
--

INSERT INTO `chicken_mortality` (`id`, `chicken_number`, `batch_name`, `reason_of_die`, `date`) VALUES
(1, 5, 'CH-1', 'Stroke', '2020-11-01'),
(2, 6, 'CH-2', 'Ranikhet disease', '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `chicken_purchase`
--

CREATE TABLE `chicken_purchase` (
  `id` int(10) NOT NULL,
  `batch_name` varchar(20) NOT NULL,
  `chicken_number` int(20) NOT NULL,
  `chicken_inventory` int(20) NOT NULL,
  `chicken_price` int(20) NOT NULL,
  `per_price` double NOT NULL,
  `purchase_date` date NOT NULL DEFAULT current_timestamp(),
  `retailer_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chicken_purchase`
--

INSERT INTO `chicken_purchase` (`id`, `batch_name`, `chicken_number`, `chicken_inventory`, `chicken_price`, `per_price`, `purchase_date`, `retailer_name`) VALUES
(2, 'CH-1', 55, 100, 5000, 50, '2020-11-01', 'Harun Poultry'),
(3, 'CH-2', 34, 100, 5000, 50, '2020-11-01', 'Jabbar Poultry');

-- --------------------------------------------------------

--
-- Table structure for table `chicken_sale`
--

CREATE TABLE `chicken_sale` (
  `id` int(10) NOT NULL,
  `batch_name` varchar(20) NOT NULL,
  `schicken_number` int(30) NOT NULL,
  `per_kg_price` double NOT NULL,
  `tchicken_weight` double NOT NULL,
  `tamount_money` double NOT NULL,
  `sale_date` date NOT NULL DEFAULT current_timestamp(),
  `customer_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chicken_sale`
--

INSERT INTO `chicken_sale` (`id`, `batch_name`, `schicken_number`, `per_kg_price`, `tchicken_weight`, `tamount_money`, `sale_date`, `customer_name`) VALUES
(1, 'CH-1', 20, 110, 35, 3850, '2020-11-28', 'Monjur Ali '),
(2, 'CH-2', 60, 115, 115, 13225, '2020-11-28', 'Monjur Ali '),
(3, 'CH-1', 20, 115, 38, 4370, '2020-11-29', 'Monjur Ali ');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `customer_address` varchar(80) NOT NULL,
  `customer_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `customer_name`, `customer_address`, `customer_phone`) VALUES
(1, 'Monjur Ali ', 'Ludhua Matlab', '01565623124');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `id` int(10) NOT NULL,
  `employee_name` varchar(40) NOT NULL,
  `employee_address` varchar(100) NOT NULL,
  `employee_phone` varchar(12) NOT NULL,
  `salary_amount` int(20) NOT NULL,
  `given_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id`, `employee_name`, `employee_address`, `employee_phone`, `salary_amount`, `given_date`) VALUES
(1, 'Mohosin Mia', 'Matlab North', '01875781788', 2000, '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `food_given`
--

CREATE TABLE `food_given` (
  `id` int(10) NOT NULL,
  `food_id` int(20) NOT NULL,
  `gfood_amount` int(20) NOT NULL,
  `batch_name` varchar(20) NOT NULL,
  `given_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_given`
--

INSERT INTO `food_given` (`id`, `food_id`, `gfood_amount`, `batch_name`, `given_date`) VALUES
(1, 1, 2, 'CH-1', '2020-11-01'),
(2, 3, 3, 'CH-1', '2020-11-02'),
(3, 2, 3, 'CH-1', '2020-11-03'),
(4, 1, 8, 'CH-2', '2020-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `id` int(10) NOT NULL,
  `food_name` varchar(60) NOT NULL,
  `food_unit_price` int(60) NOT NULL,
  `adding_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`id`, `food_name`, `food_unit_price`, `adding_date`) VALUES
(1, 'Scratch', 80, '2020-11-01'),
(2, 'Grit', 300, '2020-11-01'),
(3, 'Maze Broken', 70, '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `food_purchase_detail`
--

CREATE TABLE `food_purchase_detail` (
  `id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `food_amount` double NOT NULL,
  `food_price` int(20) NOT NULL,
  `food_unit_price` int(60) NOT NULL,
  `purchase_date` date NOT NULL,
  `retailer_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_purchase_detail`
--

INSERT INTO `food_purchase_detail` (`id`, `food_id`, `food_amount`, `food_price`, `food_unit_price`, `purchase_date`, `retailer_name`) VALUES
(1, 1, 10, 600, 60, '2020-11-01', 'Mamun Enterprise'),
(2, 2, 10, 3000, 300, '2020-11-01', 'Mamun Enterprise'),
(3, 3, 5, 350, 70, '2020-11-01', 'Mamun Enterprise'),
(4, 1, 10, 800, 80, '2020-11-24', 'Shopon Enterprise');

-- --------------------------------------------------------

--
-- Table structure for table `med_given`
--

CREATE TABLE `med_given` (
  `id` int(10) NOT NULL,
  `med_id` int(10) NOT NULL,
  `med_given_amount` double NOT NULL,
  `batch_name` varchar(50) NOT NULL,
  `med_given_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `med_given`
--

INSERT INTO `med_given` (`id`, `med_id`, `med_given_amount`, `batch_name`, `med_given_date`) VALUES
(1, 1, 1, 'CH-1', '2020-11-02'),
(2, 3, 2, 'CH-2', '2020-11-02'),
(3, 2, 1, 'CH-1', '2020-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `med_item`
--

CREATE TABLE `med_item` (
  `id` int(10) NOT NULL,
  `med_name` varchar(60) NOT NULL,
  `med_type` varchar(50) NOT NULL,
  `med_unit` varchar(60) NOT NULL,
  `med_unit_price` int(60) NOT NULL,
  `adding_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `med_item`
--

INSERT INTO `med_item` (`id`, `med_name`, `med_type`, `med_unit`, `med_unit_price`, `adding_date`) VALUES
(1, 'Aminoglycosides', 'Liquid', 'lit', 300, '2020-11-01'),
(2, 'Macrolides', 'Powder', 'kg', 200, '2020-11-01'),
(3, 'Tetracyclines', 'Liquid', 'lit', 250, '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `med_purchase`
--

CREATE TABLE `med_purchase` (
  `id` int(10) NOT NULL,
  `med_id` int(10) NOT NULL,
  `med_unit` varchar(20) NOT NULL,
  `med_amount` double NOT NULL,
  `med_price` int(30) NOT NULL,
  `med_unit_price` int(20) NOT NULL,
  `med_pdate` date NOT NULL DEFAULT current_timestamp(),
  `med_rname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `med_purchase`
--

INSERT INTO `med_purchase` (`id`, `med_id`, `med_unit`, `med_amount`, `med_price`, `med_unit_price`, `med_pdate`, `med_rname`) VALUES
(1, 1, 'lit', 5, 1500, 300, '2020-11-01', 'Dhaka Animal Drug House'),
(2, 2, 'kg', 5, 1000, 200, '2020-11-01', 'Dhaka Animal Drug House'),
(3, 3, 'lit', 7, 1750, 250, '2020-11-01', 'Dhaka Animal Drug House');

-- --------------------------------------------------------

--
-- Table structure for table `other_expenses`
--

CREATE TABLE `other_expenses` (
  `id` int(10) NOT NULL,
  `element_name` varchar(60) NOT NULL,
  `buying_reason` varchar(80) NOT NULL,
  `element_price` int(20) NOT NULL,
  `buying_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other_expenses`
--

INSERT INTO `other_expenses` (`id`, `element_name`, `buying_reason`, `element_price`, `buying_date`) VALUES
(1, 'Litre', 'Feeding Chicken', 300, '2020-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `transpotation`
--

CREATE TABLE `transpotation` (
  `id` int(10) NOT NULL,
  `transport_name` varchar(40) NOT NULL,
  `batch_name` varchar(60) NOT NULL,
  `transport_cost` varchar(20) NOT NULL,
  `used_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transpotation`
--

INSERT INTO `transpotation` (`id`, `transport_name`, `batch_name`, `transport_cost`, `used_date`) VALUES
(1, 'Truck', 'CH-1', '2000', '2020-11-02'),
(2, 'Truck', 'CH-2', '2000', '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `farm_name` varchar(60) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `email_address` varchar(60) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `hashed_password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `farm_name`, `full_name`, `email_address`, `phone_number`, `hashed_password`) VALUES
(1, 'Test Poultry Farm', 'Test Name', 'test@gmail.com', '01521255551', '$2y$10$xqgg.JzTz8Q3ZhAEYSScru0ZA.mjJSAQ/oz7/PqJbj8LNX9zSbXDG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chicken_mortality`
--
ALTER TABLE `chicken_mortality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chicken_purchase`
--
ALTER TABLE `chicken_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chicken_sale`
--
ALTER TABLE `chicken_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_given`
--
ALTER TABLE `food_given`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_purchase_detail`
--
ALTER TABLE `food_purchase_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_given`
--
ALTER TABLE `med_given`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_item`
--
ALTER TABLE `med_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_purchase`
--
ALTER TABLE `med_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_expenses`
--
ALTER TABLE `other_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transpotation`
--
ALTER TABLE `transpotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chicken_mortality`
--
ALTER TABLE `chicken_mortality`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chicken_purchase`
--
ALTER TABLE `chicken_purchase`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chicken_sale`
--
ALTER TABLE `chicken_sale`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_given`
--
ALTER TABLE `food_given`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_purchase_detail`
--
ALTER TABLE `food_purchase_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `med_given`
--
ALTER TABLE `med_given`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `med_item`
--
ALTER TABLE `med_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `med_purchase`
--
ALTER TABLE `med_purchase`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `other_expenses`
--
ALTER TABLE `other_expenses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transpotation`
--
ALTER TABLE `transpotation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
