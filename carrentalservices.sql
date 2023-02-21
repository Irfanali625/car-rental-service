-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 11:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentalservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(9, 'admin', '16d7a4fca7442dda3ad93c9a726597e4', '2022-08-06 18:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(11, 296310803, 'irfan@gmail.com', 13, '2022-08-17', '2022-08-18', 'Try Booking page', 0, '2022-08-16 20:44:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(5, 'Toyota', '2017-06-18 16:25:24', NULL),
(10, 'Honda', '2022-07-31 11:52:57', NULL),
(11, 'Suzuki', '2022-07-31 12:07:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(2, 'Irfan Ali', 'irfan@gmail.com', '3449864625', 'How i can reach your office', '2022-04-08 08:55:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(2, 'Irfan Ali', 'irfan@gmail.com', '718b84c99141527de725aeb999ea897d', '3449864625', '02/12/1999', 'P/O Khwaza Khela Mashkomai Tehsil Khwaza Khela district Swat', 'Swat', 'Pakistan', '2022-04-08 08:43:16', '2022-04-08 08:44:44'),
(15, 'ishfaq', 'ghazi@gmail.com', 'fa2f5c695989a8a2027d96088da51b73', '0344986462', NULL, NULL, NULL, NULL, '2022-08-13 11:30:01', '2022-08-14 17:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(9, 'Honda Civic 2022', 10, 'Honda Civic is manufactured by the Pakistani automobile manufacturer and Honda subsidiary Atlas Honda in Pakistan', 5000, 'Petrol', 2022, 5, 'Honda_Civic_Front_Left_Angled.jpg', 'Honda_Civic_Rear-.jpg', 'Honda_Civic_Rear_Left_Lamp.jpg', 'Honda_Civic_Card.jpg', 'Honda_Civic_Cockpit.jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, 1, '2022-07-31 11:57:40', '2022-08-14 18:44:28'),
(11, 'Toyota Prado TZ', 5, 'This car is a great reliable car, a pleasure to drive and own.', 7000, 'Petrol', 2007, 7, 'toyota-prado-tz-2-2007-69262659.jpg', 'toyota-prado-tz-2-2007-69262665.jpg', 'toyota-prado-tz-2-2007-69262662.jpg', 'toyota-prado-tz-2-2007-69262682.jpg', 'toyota-prado-tz-2-2007-69262673.jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, 1, '2022-07-31 12:26:07', NULL),
(12, 'Corolla Altis', 5, 'The Corolla Altis has a mileage of 14.28 to 21.43 kmpl & Ground clearance of Corolla Altis is 175mm', 5000, 'Petrol', 2021, 5, 'toyota-corolla-altis-x-automatic-1-6-2021-68915336.jpg', 'toyota-corolla-altis-x-automatic-1-6-2021-68915325.jpg', 'toyota-corolla-altis-x-automatic-1-6-2021-68915365.jpg', 'toyota-corolla-altis-x-automatic-1-6-2021-68915437.jpg', 'toyota-corolla-altis-x-automatic-1-6-2021-68915382.jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, 1, '2022-08-02 10:25:22', NULL),
(13, 'Aqua G-Sports', 5, 'Toyota Aqua is the Japanese version of Prius C. Compared to the Prius C, it has minor interior and safety differences. It is the most fuel-efficient vehicle in its category, but it has mediocre build quality.', 4000, 'Petrol', 2019, 5, 'toyota-aqua-g-sports-2019-69608351.jpg', 'toyota-aqua-g-sports-2019-69608352.jpg', 'toyota-aqua-g-sports-2019-69608359.jpg', 'toyota-aqua-g-sports-2019-69608368.jpg', 'Slide_toyota-aqua-g-sports-2019-69608361.jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, 1, '2022-08-07 10:58:00', NULL),
(14, 'Honda City', 10, 'Amongst some of the strongest and sturdiest range of sedans in the pre-owned market, one thing that makes the Honda City, quite a popular choice in the market is its good build quality and overall reliability', 5000, 'Petrol', 2022, 5, 'Honda_City_Front.jpg', 'RearLight_11zon.jpg', 'Engine-bay.jpg', 'Trunk_11zon.jpg', 'cockpit_11zon.jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, NULL, 1, NULL, 1, '2022-08-07 11:07:32', '2022-08-07 18:07:40'),
(15, 'Suzuki Cultus', 11, 'The AGS is the top-range variant of the Suzuki Cultus 2022. AGS is available with the amazing automatic gear shifting tech. The AGS Variant is named as an abbreviation of \'Auto Gear Shift', 3000, 'Petrol', 2022, 5, 'Suzuki_Cultus_2017_(2).jpg', 'Suzuki_Cultus_2017_(4).jpg', 'Suzuki_Cultus_2017_(3).jpg', 'RearSeats.jpg', 'Cockpit.jpg', 1, 1, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL, '2022-08-07 11:15:59', '2022-08-07 11:22:40'),
(16, 'Suzuki Vitara', 11, 'The Vitara is a relatively inexpensive car to run, and the mild-hybrid engine brings good fuel economy, with an official WLTP figure from 49.7mpg', 4000, 'Petrol', 2017, 5, 'Suzuki_Vitara_2017_(8).jpg', 'Suzuki_Vitara_2017_(9).jpg', 'Suzuki_Vitara_2017_(4).jpg', 'Suzuki_Vitara_2017_(2).jpg', 'Suzuki_Vitara_2017_(1).jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, 1, '2022-08-07 11:29:04', NULL),
(17, 'Toyota Fortuner', 5, 'At the heart of the SUV sits a 2.7-litre, four-cylinder petrol engine that is capable of churning out 158 bhp and 242 Nm of peak torque. In addition to that, it also benefits from a 2.4-litre, four-cylinder diesel that is capable of pushing out 145 bhp of maximum power and 400 Nm of peak torque', 10000, 'Petrol', 2021, 7, 'toyota-fortuner-2-8-sigma-2021-69990041.jpg', 'toyota-fortuner-2-8-sigma-2021-69990040.jpg', 'toyota-fortuner-2-8-sigma-2021-69990036.jpg', 'toyota-fortuner-2-8-sigma-2021-69990047.jpg', 'toyota-fortuner-2-8-sigma-2021-69990046.jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, 1, '2022-08-07 11:36:50', NULL),
(19, 'Toyota Corolla Axio', 5, 'Verdict. The Toyota Corolla Axio is one of the most spacious cars due to its wheelbase that provide a great interior space in the front cabin also in the rear cabin. The exterior of the car is very stylish and stands out. All in all, the Corolla Axio is very appealing and attractive car', 5000, 'Petrol', 2007, 5, 'toyota-corolla-axio-luxel-alpha-edition-1-8-2007-69525677.jpg', 'toyota-corolla-axio-luxel-alpha-edition-1-8-2007-69525669.jpg', 'toyota-corolla-axio-luxel-alpha-edition-1-8-2007-69525682.jpg', 'toyota-corolla-axio-luxel-alpha-edition-1-8-2007-69525683.jpg', 'toyota-corolla-axio-luxel-alpha-edition-1-8-2007-69525684.jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, 1, '2022-08-07 11:50:27', NULL),
(21, 'Honda BR-V', 5, 'It is a spacious and affordable MPV for the middle class family. Silent engine, good mileage, less maintenance cost, comfortable for city drive and other roads', 7000, 'Petrol', 2017, 6, 'honda-br-v-i-vtec-s-2017-61444346.jpg', 'honda-br-v-i-vtec-s-2017-61444347.jpg', 'honda-br-v-i-vtec-s-2017-61444338.jpg', 'honda-br-v-i-vtec-s-2017-61444315.jpg', 'honda-br-v-i-vtec-s-2017-61444320.jpg', 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, 1, '2022-08-07 12:13:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `AntiLockBrakingSystem` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
