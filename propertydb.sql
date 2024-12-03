-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 02:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(12) NOT NULL,
  `admin_username` varchar(128) NOT NULL,
  `admin_fullname` varchar(128) NOT NULL,
  `admin_birth` date NOT NULL,
  `admin_gender` text NOT NULL,
  `admin_phone` int(12) NOT NULL,
  `admin_email` varchar(128) NOT NULL,
  `admin_password` varchar(128) NOT NULL,
  `profile_picture` varchar(256) DEFAULT '../assets/image/gender.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_fullname`, `admin_birth`, `admin_gender`, `admin_phone`, `admin_email`, `admin_password`, `profile_picture`) VALUES
(1, 'admin000', 'Admin 000', '2000-11-11', 'Female', 191234566, 'admin000@gmail.com', 'admin000', '../assets/uploadImage/271.jpg'),
(2, 'admin002', 'admin002', '1990-12-01', 'Male', 12345678, 'admin2@hotmail.com', 'admin012345', '../assets/image/gender.png');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `map_id` int(12) NOT NULL,
  `map_name` varchar(256) NOT NULL,
  `map_image` varchar(256) NOT NULL DEFAULT '../assets/image/world-map.jpg',
  `visibility` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`map_id`, `map_name`, `map_image`, `visibility`) VALUES
(1, 'Master Layout TIM', '../assets/uploadImage/661.jpg', 1),
(2, 'Real Estate Map', '../assets/uploadImage/635.jpg', 1),
(3, 'Aterra Woods', '../assets/uploadImage/173.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(12) NOT NULL,
  `property_id` int(12) NOT NULL,
  `client_name` varchar(128) NOT NULL,
  `electricity_bill` double(10,2) NOT NULL,
  `water_bill` double(10,2) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `payment_status` text NOT NULL,
  `visibility` int(12) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `property_id`, `client_name`, `electricity_bill`, `water_bill`, `total_amount`, `payment_status`, `visibility`) VALUES
(1, 2, 'Yii Ki Ong', 120.00, 15.65, 10134.65, 'Unpaid', 1),
(2, 8, 'Muhammad bin Abudhkl', 80.30, 10.95, 2591.25, 'Paid', 1),
(5, 2, '1111123', 54545.00, 5454.00, 2144.00, 'Unpaid', 1),
(6, 14, 'Phoenix Yu', 100.00, 16.45, 1366.45, 'Unpaid', 1),
(7, 7, 'Client 001', 136.45, 13.08, 272.54, 'Unpaid', 1),
(8, 6, '123213', 123312.00, 123123.00, 247535.00, 'Unpaid', 1),
(9, 6, 'Ali', 6015.00, 22.99, 7137.99, 'Paid', 1),
(10, 1, '1', 1.00, 1.00, 1502.00, 'Unpaid', 1),
(11, 2, '1234', 123.00, 123.00, 10245.00, 'Unpaid', 1),
(12, 18, 'z1', 1.00, 1.00, 1234.00, 'Unpaid', 0),
(13, 0, '', 0.00, 0.00, 0.00, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(12) NOT NULL,
  `property_name` varchar(128) NOT NULL,
  `property_address` varchar(256) NOT NULL,
  `property_description` varchar(256) DEFAULT NULL,
  `property_owner` varchar(128) NOT NULL,
  `property_type` text NOT NULL,
  `rental_price` double(10,2) NOT NULL,
  `rental_status` text NOT NULL,
  `map_id` int(12) NOT NULL DEFAULT 1,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `visibility` int(12) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `property_address`, `property_description`, `property_owner`, `property_type`, `rental_price`, `rental_status`, `map_id`, `latitude`, `longitude`, `visibility`) VALUES
(1, 'Residential', 'No.44, Jalan Desa Melur 4/1, Taman Bandar Connaught, 56000 Cheras, Kuala Lumpur, Malaysia', '3 rooms, 3 air-con, 1 dining-room', 'Choo Hun Sang', 'Single-family Residences', 1500.00, 'Yes', 1, 366.5, 62, 1),
(2, 'Penthouse', 'No.10, Taman Melur, Jalan Northen, Sarawak, Malaysia', 'Highest floor of apartment', 'Wong Ang Lee', 'Apartments', 9999.00, 'Yes', 2, 208.25, 145.75, 1),
(3, 'Double Storey House', 'No.10, Taman ABC, Jalan Northen, 97000, Bintulu, Sarawak, Malaysia', 'Year built: 2000', 'Tan Weng Jing', 'Multi-family Residences', 2000.00, 'No', 3, 259.3831716472325, 232.32521489266506, 1),
(4, '11Property', 'No.11', '11', '111', 'Townhouses', 1.05, 'No', 1, 34.05570419109347, 63.4462434245029, 1),
(5, 'Agile Real Estate Group', 'The Straits View Condominium, Jalan Permas Selatan, Bandar Baru Permas, 81750 Masai, JohorB', 'Year Built: 2020\nParking: Yes\nBed: 3\nBath: 3\n', 'John Franklin', 'Townhouses', 2785.05, 'Yes', 2, 328.42761302095624, 529.0297062013698, 1),
(6, 'Kanvas Soho Cyberjaya', 'Kanvas SOHO, Jalan Teknokrat 6, Cyberjaya, Selangor, Malaysia', 'Built Up Size : 485 sq ft\nLand Size : 485 sq ft\n***FULLY FURNISHED\n- Fully Air-Conditioner (2-units)\n- 1-Bedroom, 1-Bathroom', 'Texas King', 'Apartments', 1100.00, 'No', 2, 0, 0, 1),
(7, 'ASDA1', 'sdaa1', 'asda1', 'aSd1', 'Single-family Residences', 123.10, 'Yes', 1, 206.20029112963445, 176.809751896225, 1),
(8, 'Gelang Patah, Johor Rumah Sewa', 'Gelang Patah, Johor, Malaysia', '4 Rooms', 'Alan Tang', 'Townhouses', 2500.00, 'Yes', 1, 31.72312171225145, 431.06124209000507, 1),
(9, 'Property666', 'No.10, Property Address, 97000, Bintulu, Sarawak, Malaysia', '1 bedroom\n1 air-con\npartially furnished', 'Property Agent', 'Single-family Residences', 1961.35, 'No', 3, 0, 0, 1),
(10, 'The Havre Condominium', 'The Havre Bukit Jalil, Bukit Jalil, Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', 'Location: Next to Pavilion 2 ( with covered walkway )\nSize layout: \n- 1,023sf ( 3 Bedrooms 2 Bathrooms 1 Powder Room )\n- 1,239sf ( 3 Bedrooms 3 Bathrooms )', 'Zac Arron', 'Condominiums', 3000.00, 'Yes', 1, 0, 0, 1),
(11, '1', '1', '1', '1', 'Single-family Residences', 1.00, 'Yes', 1, 0, 0, 1),
(12, '123', '123', '123', '123', 'Townhouses', 123.00, 'No', 2, 0, 0, 0),
(13, 'abc', 'abav', 'acas', 'daw', 'Townhouses', 123.00, 'No', 1, 181.75, 533.5, 1),
(14, 'Cadena Ara Sendayan', ' No 317, Jalan Ara Sendayan 1/8, Ara Sendayan, 70300 Seremban, Negeri Sembilan Darul Khusus', 'LA : 22 x 75\nBuilds up : 2,584sqft\nLayout : 4R 4B\nFurnished: fans ', 'Property Agent00', 'Apartments', 1250.00, 'Yes', 1, 0, 0, 1),
(15, 'q', 'q', 'q', 'q', 'Apartments', 0.00, 'Yes', 1, 0, 0, 0),
(16, '1123', '123', '12312313', '1231231', 'Multi-family Rsidences', 13231.00, 'Yes', 1, 0, 0, 1),
(17, 'bbb', 'bbb', 'bbb', 'bbb', 'Apartments', 111.00, 'Yes', 1, 321.42986558443016, 174.0106529216146, 1),
(18, '123dsa0', '123ads0', '123asd0', '12331230', 'Apartments', 1232.50, 'No', 2, 174.47716941738298, 343.35614088554513, 1),
(19, '123', '123', '123', '124', 'Townhouses', 12.04, 'No', 1, 0, 0, 0),
(20, '2', '2', '2', '2', 'Multi-family Rsidences', 2.00, 'Yes', 2, 0, 0, 0),
(21, 'z11', 'z', 'z', 'z', 'Single-family Residences', 12.00, 'Yes', 2, 0, 0, 0),
(22, 'master', 'master123', 'master layout', 'master0', 'Single-family Residences', 1047.00, 'No', 2, 333.09277797864024, 69.97747436526056, 1),
(23, 'real', 'estate', '1', '1', 'Apartments', 1.00, 'Yes', 1, 315.3651511394409, 431.06124209000507, 1),
(24, 'aterra', 'aterra', 'aterra woods', 'aterra', 'Apartments', 12345.00, 'No', 3, 116.62912394210093, 484.24412260760306, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `map_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
