-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 09:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital management system`
--

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `CID` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  `Service` varchar(50) NOT NULL,
  `Charge` int(6) NOT NULL,
  `Pending` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`CID`, `PID`, `Service`, `Charge`, `Pending`) VALUES
(1, 10002, 'Admission fee', 1000, 0),
(2, 10003, 'Admission fee', 1000, 0),
(3, 10004, 'Admission fee', 1000, 0),
(4, 10004, 'Admission fee', 1000, 0),
(5, 10002, 'Bed occupy charge', 5000, 0),
(6, 10003, 'Bed occupy charge', 5000, 0),
(7, 10003, 'Operation charge', 500000, 0),
(8, 10003, 'Admission fee', 1000, 0),
(9, 10003, 'Admission fee', 1000, 0),
(10, 10003, 'Admission fee', 1000, 0),
(11, 10003, 'Admission fee', 1000, 0),
(12, 10003, 'Admission fee', 1000, 0),
(13, 10003, 'Admission fee', 1000, 0),
(14, 10003, 'Admission fee', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `TID` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  `Date` date NOT NULL,
  `Treatment details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`TID`, `PID`, `Date`, `Treatment details`) VALUES
(1, 10003, '2022-10-12', 'Need to take Rest life time'),
(2, 10003, '2022-10-12', 'Medicines: NPD-32, TI-232'),
(3, 10003, '2022-10-24', 'Operation/Surgery');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone number` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Specialization` varchar(100) NOT NULL,
  `Room no.` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `Name`, `Phone number`, `Email`, `Department`, `Specialization`, `Room no.`) VALUES
(2001, 'empty', '0000000', 'emoty@empty.com', 'empty', 'empty', 0),
(2002, 'Ehsaan Sarraf ', '7012383687', 'raju.dalia@contractor.org', 'Neurosurgery', 'Brain Tumor diagnosing', 456),
(2003, 'Jiya Chanda', '8494170531', 'isankaran@gmail.com', 'Cardiology', 'Specialization in Heart Surgery', 418),
(2004, 'Heena Gole', '7790399701', 'arun.grover@borah.com', 'Cardiology', 'Specialization in Clinical Cardiology', 415),
(2005, 'Naval Balay', '2540879265', 'ododiya@vig.com', 'Paramedical', 'Specialization in Parasitology', 324),
(2006, 'Kajal Tiwari', '1557503479', 'pamela.jaggi@hotmail.com', 'Radiology', 'Specialization in Radiographic examination', 375),
(2007, 'Radhika Loke', '3734511895', 'divya36@rediffmail.com', 'Pathology', 'Specialization in Histopathology', 296),
(2008, 'Ajeet Kurian', '9494704862', 'arjun.kata@rediffmail.com', 'Ear-Nose-Throat(ENT)', 'Specialization in Voice Disorders', 256),
(2009, 'Urmila Prasad', '1765029941', 'himanshu.sani@gmail.com', 'Oncology', 'Chemotherapy Specialist', 348),
(2010, 'Jatin Karan', '6196566068', 'malik41@hotmail.com', 'Psychiatry', 'Specialization in Patient Investigation', 458),
(2011, 'Nilima Malhotra', '4615237078', 'sandhu.fakaruddin@seth.net', 'Orthopaedic', 'Specialization in Setting Disjoints', 187);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `Id` int(5) NOT NULL,
  `UserID` int(5) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `UserType` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`Id`, `UserID`, `Password`, `UserType`) VALUES
(1, 1001, 'AdmiN', 'admin'),
(2, 1002, 'adMiN', 'admin'),
(3, 3001, 'MLA@login', 'mla'),
(4, 2002, 'AF doc@2002', 'doctor'),
(5, 2003, 'NDAdoc@2003', 'doctor'),
(6, 2004, 'OLEdoc@2004', 'doctor'),
(7, 2005, 'LAYdoc@2005', 'doctor'),
(8, 2006, 'ARIdoc@2006', 'doctor'),
(9, 2007, 'OKEdoc@2007', 'doctor'),
(10, 2008, 'IANdoc@2008', 'doctor'),
(11, 2009, 'SADdoc@2009', 'doctor'),
(12, 2010, 'RANdoc@2010', 'doctor'),
(13, 2011, 'TRAdoc@2011', 'doctor'),
(14, 10002, 'NIpat@2003', 'patient'),
(15, 10003, 'AHpat@2002', 'patient'),
(16, 10004, 'YApat@2002', 'patient'),
(17, 10004, 'YApat@2002', 'patient'),
(18, 10003, 'AHpat@2002', 'patient'),
(19, 10003, 'AHpat@2002', 'patient'),
(20, 10003, 'AHpat@2002', 'patient'),
(21, 10003, 'AHpat@2002', 'patient'),
(22, 10003, 'AHpat@2002', 'patient'),
(23, 10003, 'AHpat@2002', 'patient'),
(24, 10003, 'AHpat@2002', 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `OID` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  `Operation details` varchar(100) NOT NULL,
  `Doctor name` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Charge` int(6) NOT NULL,
  `Completed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`OID`, `PID`, `Operation details`, `Doctor name`, `Date`, `Time`, `Charge`, `Completed`) VALUES
(1, 10003, 'Heart surgery', 'Radhika', '2022-10-24', '04:47:00', 500000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient details`
--

CREATE TABLE `patient details` (
  `ID` int(5) NOT NULL,
  `First name` varchar(15) NOT NULL,
  `Last name` varchar(15) NOT NULL,
  `Phone number` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Date of birth` date NOT NULL,
  `Street` varchar(20) NOT NULL,
  `Area` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Postal code` int(6) NOT NULL,
  `Radiology reports` tinyblob NOT NULL,
  `Pathology reports` tinyblob NOT NULL,
  `Laboratory reports` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient details`
--

INSERT INTO `patient details` (`ID`, `First name`, `Last name`, `Phone number`, `Email`, `Gender`, `Date of birth`, `Street`, `Area`, `City`, `Postal code`, `Radiology reports`, `Pathology reports`, `Laboratory reports`) VALUES
(10001, 'first name', 'last name', 'phone numb', 'email', 'gender', '0000-00-00', 'street', 'area', 'city', 0, '', '', ''),
(10002, 'Naitik', 'Soni', '8799486484', 'naitiksoni1705@gmail.com', 'Male', '2003-05-17', 'badasa pole', 'dumral bazar', 'Nadiad', 387001, '', '', ''),
(10003, 'Pratham', 'Shah', '7041655968', 'itspratham2911@gmail.com', 'Male', '2002-11-29', 'abcd', 'EFGH', 'umreth', 388220, '', '', ''),
(10004, 'Tushar', 'Pankhaniya', '9313346569', 'pankhaniyatushar09@gmail.com', 'Male', '2002-02-22', 'GCET College', 'Bakrol Vadtal Road', 'Vidhyanagar', 388120, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Bed number` int(3) NOT NULL,
  `Room type` varchar(7) NOT NULL,
  `PID` int(5) NOT NULL,
  `Patient Name` varchar(30) NOT NULL,
  `Room charge` int(5) NOT NULL,
  `Occupancy` int(1) NOT NULL DEFAULT 0,
  `Allocate Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Bed number`, `Room type`, `PID`, `Patient Name`, `Room charge`, `Occupancy`, `Allocate Date`) VALUES
(1, 'General', 0, '', 500, 0, NULL),
(2, 'General', 0, '', 500, 0, NULL),
(3, 'General', 0, '', 500, 0, NULL),
(4, 'General', 0, '', 500, 0, NULL),
(5, 'General', 0, '', 500, 0, NULL),
(6, 'General', 0, '', 500, 0, NULL),
(7, 'General', 0, '', 500, 0, NULL),
(8, 'General', 0, '', 500, 0, NULL),
(9, 'General', 0, '', 500, 0, NULL),
(10, 'General', 0, '', 500, 0, NULL),
(11, 'General', 0, '', 500, 0, NULL),
(12, 'General', 0, '', 500, 0, NULL),
(13, 'General', 0, '', 500, 0, NULL),
(14, 'General', 0, '', 500, 0, NULL),
(15, 'General', 0, '', 500, 0, NULL),
(16, 'General', 0, '', 500, 0, NULL),
(17, 'General', 0, '', 500, 0, NULL),
(18, 'General', 0, '', 500, 0, NULL),
(19, 'General', 0, '', 500, 0, NULL),
(20, 'General', 0, '', 500, 0, NULL),
(21, 'General', 0, '', 500, 0, NULL),
(22, 'General', 0, '', 500, 0, NULL),
(23, 'General', 0, '', 500, 0, NULL),
(24, 'General', 0, '', 500, 0, NULL),
(25, 'General', 0, '', 500, 0, NULL),
(26, 'General', 0, '', 500, 0, NULL),
(27, 'General', 0, '', 500, 0, NULL),
(28, 'General', 0, '', 500, 0, NULL),
(29, 'General', 0, '', 500, 0, NULL),
(30, 'General', 0, '', 500, 0, NULL),
(31, 'General', 0, '', 500, 0, NULL),
(32, 'General', 0, '', 500, 0, NULL),
(33, 'General', 0, '', 500, 0, NULL),
(34, 'General', 0, '', 500, 0, NULL),
(35, 'General', 0, '', 500, 0, NULL),
(36, 'General', 0, '', 500, 0, NULL),
(37, 'General', 0, '', 500, 0, NULL),
(38, 'General', 0, '', 500, 0, NULL),
(39, 'General', 0, '', 500, 0, NULL),
(40, 'General', 0, '', 500, 0, NULL),
(41, 'General', 0, '', 500, 0, NULL),
(42, 'General', 0, '', 500, 0, NULL),
(43, 'General', 0, '', 500, 0, NULL),
(44, 'General', 0, '', 500, 0, NULL),
(45, 'General', 0, '', 500, 0, NULL),
(46, 'General', 0, '', 500, 0, NULL),
(47, 'General', 0, '', 500, 0, NULL),
(48, 'General', 0, '', 500, 0, NULL),
(49, 'General', 0, '', 500, 0, NULL),
(50, 'General', 0, '', 500, 0, NULL),
(51, 'General', 0, '', 500, 0, NULL),
(52, 'General', 0, '', 500, 0, NULL),
(53, 'General', 0, '', 500, 0, NULL),
(54, 'General', 0, '', 500, 0, NULL),
(55, 'General', 0, '', 500, 0, NULL),
(56, 'General', 0, '', 500, 0, NULL),
(57, 'General', 0, '', 500, 0, NULL),
(58, 'General', 0, '', 500, 0, NULL),
(59, 'General', 0, '', 500, 0, NULL),
(60, 'General', 0, '', 500, 0, NULL),
(61, 'General', 0, '', 500, 0, NULL),
(62, 'General', 0, '', 500, 0, NULL),
(63, 'General', 0, '', 500, 0, NULL),
(64, 'General', 0, '', 500, 0, NULL),
(65, 'General', 0, '', 500, 0, NULL),
(66, 'General', 0, '', 500, 0, NULL),
(67, 'General', 0, '', 500, 0, NULL),
(68, 'General', 0, '', 500, 0, NULL),
(69, 'General', 0, '', 500, 0, NULL),
(70, 'General', 0, '', 500, 0, NULL),
(71, 'General', 0, '', 500, 0, NULL),
(72, 'General', 0, '', 500, 0, NULL),
(73, 'General', 0, '', 500, 0, NULL),
(74, 'General', 0, '', 500, 0, NULL),
(75, 'General', 0, '', 500, 0, NULL),
(76, 'General', 0, '', 500, 0, NULL),
(77, 'General', 0, '', 500, 0, NULL),
(78, 'General', 0, '', 500, 0, NULL),
(79, 'General', 0, '', 500, 0, NULL),
(80, 'General', 0, '', 500, 0, NULL),
(81, 'General', 0, '', 500, 0, NULL),
(82, 'General', 0, '', 500, 0, NULL),
(83, 'General', 0, '', 500, 0, NULL),
(84, 'General', 0, '', 500, 0, NULL),
(85, 'General', 0, '', 500, 0, NULL),
(86, 'General', 0, '', 500, 0, NULL),
(87, 'General', 0, '', 500, 0, NULL),
(88, 'General', 0, '', 500, 0, NULL),
(89, 'General', 0, '', 500, 0, NULL),
(90, 'General', 0, '', 500, 0, NULL),
(91, 'General', 0, '', 500, 0, NULL),
(92, 'General', 0, '', 500, 0, NULL),
(93, 'General', 0, '', 500, 0, NULL),
(94, 'General', 0, '', 500, 0, NULL),
(95, 'General', 0, '', 500, 0, NULL),
(96, 'General', 0, '', 500, 0, NULL),
(97, 'General', 0, '', 500, 0, NULL),
(98, 'General', 0, '', 500, 0, NULL),
(99, 'General', 0, '', 500, 0, NULL),
(100, 'General', 0, '', 500, 0, NULL),
(101, 'General', 0, '', 500, 0, NULL),
(102, 'General', 0, '', 500, 0, NULL),
(103, 'General', 0, '', 500, 0, NULL),
(104, 'General', 0, '', 500, 0, NULL),
(105, 'General', 0, '', 500, 0, NULL),
(106, 'General', 0, '', 500, 0, NULL),
(107, 'General', 0, '', 500, 0, NULL),
(108, 'General', 0, '', 500, 0, NULL),
(109, 'General', 0, '', 500, 0, NULL),
(110, 'General', 0, '', 500, 0, NULL),
(111, 'General', 0, '', 500, 0, NULL),
(112, 'General', 0, '', 500, 0, NULL),
(113, 'General', 0, '', 500, 0, NULL),
(114, 'General', 0, '', 500, 0, NULL),
(115, 'General', 0, '', 500, 0, NULL),
(116, 'General', 0, '', 500, 0, NULL),
(117, 'General', 0, '', 500, 0, NULL),
(118, 'General', 0, '', 500, 0, NULL),
(119, 'General', 0, '', 500, 0, NULL),
(120, 'General', 0, '', 500, 0, NULL),
(121, 'General', 0, '', 500, 0, NULL),
(122, 'General', 0, '', 500, 0, NULL),
(123, 'General', 0, '', 500, 0, NULL),
(124, 'General', 0, '', 500, 0, NULL),
(125, 'General', 0, '', 500, 0, NULL),
(126, 'General', 0, '', 500, 0, NULL),
(127, 'General', 0, '', 500, 0, NULL),
(128, 'General', 0, '', 500, 0, NULL),
(129, 'General', 0, '', 500, 0, NULL),
(130, 'General', 0, '', 500, 0, NULL),
(131, 'General', 0, '', 500, 0, NULL),
(132, 'General', 0, '', 500, 0, NULL),
(133, 'General', 0, '', 500, 0, NULL),
(134, 'General', 0, '', 500, 0, NULL),
(135, 'General', 0, '', 500, 0, NULL),
(136, 'General', 0, '', 500, 0, NULL),
(137, 'General', 0, '', 500, 0, NULL),
(138, 'General', 0, '', 500, 0, NULL),
(139, 'General', 0, '', 500, 0, NULL),
(140, 'General', 0, '', 500, 0, NULL),
(141, 'General', 0, '', 500, 0, NULL),
(142, 'General', 0, '', 500, 0, NULL),
(143, 'General', 0, '', 500, 0, NULL),
(144, 'General', 0, '', 500, 0, NULL),
(145, 'General', 0, '', 500, 0, NULL),
(146, 'General', 0, '', 500, 0, NULL),
(147, 'General', 0, '', 500, 0, NULL),
(148, 'General', 0, '', 500, 0, NULL),
(149, 'General', 0, '', 500, 0, NULL),
(150, 'General', 0, '', 500, 0, NULL),
(151, 'General', 0, '', 500, 0, NULL),
(152, 'General', 0, '', 500, 0, NULL),
(153, 'General', 0, '', 500, 0, NULL),
(154, 'General', 0, '', 500, 0, NULL),
(155, 'General', 0, '', 500, 0, NULL),
(156, 'General', 0, '', 500, 0, NULL),
(157, 'General', 0, '', 500, 0, NULL),
(158, 'General', 0, '', 500, 0, NULL),
(159, 'General', 0, '', 500, 0, NULL),
(160, 'General', 0, '', 500, 0, NULL),
(161, 'General', 0, '', 500, 0, NULL),
(162, 'General', 0, '', 500, 0, NULL),
(163, 'General', 0, '', 500, 0, NULL),
(164, 'General', 0, '', 500, 0, NULL),
(165, 'General', 0, '', 500, 0, NULL),
(166, 'General', 0, '', 500, 0, NULL),
(167, 'General', 0, '', 500, 0, NULL),
(168, 'General', 0, '', 500, 0, NULL),
(169, 'General', 0, '', 500, 0, NULL),
(170, 'General', 0, '', 500, 0, NULL),
(171, 'General', 0, '', 500, 0, NULL),
(172, 'General', 0, '', 500, 0, NULL),
(173, 'General', 0, '', 500, 0, NULL),
(174, 'General', 0, '', 500, 0, NULL),
(175, 'General', 0, '', 500, 0, NULL),
(176, 'General', 0, '', 500, 0, NULL),
(177, 'General', 0, '', 500, 0, NULL),
(178, 'General', 0, '', 500, 0, NULL),
(179, 'General', 0, '', 500, 0, NULL),
(180, 'General', 0, '', 500, 0, NULL),
(181, 'General', 0, '', 500, 0, NULL),
(182, 'General', 0, '', 500, 0, NULL),
(183, 'General', 0, '', 500, 0, NULL),
(184, 'General', 0, '', 500, 0, NULL),
(185, 'General', 0, '', 500, 0, NULL),
(186, 'General', 0, '', 500, 0, NULL),
(187, 'General', 0, '', 500, 0, NULL),
(188, 'General', 0, '', 500, 0, NULL),
(189, 'General', 0, '', 500, 0, NULL),
(190, 'General', 0, '', 500, 0, NULL),
(191, 'General', 0, '', 500, 0, NULL),
(192, 'General', 0, '', 500, 0, NULL),
(193, 'General', 0, '', 500, 0, NULL),
(194, 'General', 0, '', 500, 0, NULL),
(195, 'General', 0, '', 500, 0, NULL),
(196, 'General', 0, '', 500, 0, NULL),
(197, 'General', 0, '', 500, 0, NULL),
(198, 'General', 0, '', 500, 0, NULL),
(199, 'General', 0, '', 500, 0, NULL),
(200, 'General', 0, '', 500, 0, NULL),
(201, 'General', 0, '', 500, 0, NULL),
(202, 'General', 0, '', 500, 0, NULL),
(203, 'General', 0, '', 500, 0, NULL),
(204, 'General', 0, '', 500, 0, NULL),
(205, 'General', 0, '', 500, 0, NULL),
(206, 'General', 0, '', 500, 0, NULL),
(207, 'General', 0, '', 500, 0, NULL),
(208, 'General', 0, '', 500, 0, NULL),
(209, 'General', 0, '', 500, 0, NULL),
(210, 'General', 0, '', 500, 0, NULL),
(211, 'General', 0, '', 500, 0, NULL),
(212, 'General', 0, '', 500, 0, NULL),
(213, 'General', 0, '', 500, 0, NULL),
(214, 'General', 0, '', 500, 0, NULL),
(215, 'General', 0, '', 500, 0, NULL),
(216, 'General', 0, '', 500, 0, NULL),
(217, 'General', 0, '', 500, 0, NULL),
(218, 'General', 0, '', 500, 0, NULL),
(219, 'General', 0, '', 500, 0, NULL),
(220, 'General', 0, '', 500, 0, NULL),
(221, 'General', 0, '', 500, 0, NULL),
(222, 'General', 0, '', 500, 0, NULL),
(223, 'General', 0, '', 500, 0, NULL),
(224, 'General', 0, '', 500, 0, NULL),
(225, 'General', 0, '', 500, 0, NULL),
(226, 'General', 0, '', 500, 0, NULL),
(227, 'General', 0, '', 500, 0, NULL),
(228, 'General', 0, '', 500, 0, NULL),
(229, 'General', 0, '', 500, 0, NULL),
(230, 'General', 0, '', 500, 0, NULL),
(231, 'General', 0, '', 500, 0, NULL),
(232, 'General', 0, '', 500, 0, NULL),
(233, 'General', 0, '', 500, 0, NULL),
(234, 'General', 0, '', 500, 0, NULL),
(235, 'General', 0, '', 500, 0, NULL),
(236, 'General', 0, '', 500, 0, NULL),
(237, 'General', 0, '', 500, 0, NULL),
(238, 'General', 0, '', 500, 0, NULL),
(239, 'General', 0, '', 500, 0, NULL),
(240, 'General', 0, '', 500, 0, NULL),
(241, 'General', 0, '', 500, 0, NULL),
(242, 'General', 0, '', 500, 0, NULL),
(243, 'General', 0, '', 500, 0, NULL),
(244, 'General', 0, '', 500, 0, NULL),
(245, 'General', 0, '', 500, 0, NULL),
(246, 'General', 0, '', 500, 0, NULL),
(247, 'General', 0, '', 500, 0, NULL),
(248, 'General', 0, '', 500, 0, NULL),
(249, 'General', 0, '', 500, 0, NULL),
(250, 'General', 0, '', 500, 0, NULL),
(251, 'Special', 0, '', 5000, 0, NULL),
(252, 'Special', 0, '', 5000, 0, NULL),
(253, 'Special', 0, '', 5000, 0, NULL),
(254, 'Special', 0, '', 5000, 0, NULL),
(255, 'Special', 0, '', 5000, 0, NULL),
(256, 'Special', 0, '', 5000, 0, NULL),
(257, 'Special', 0, '', 5000, 0, NULL),
(258, 'Special', 0, '', 5000, 0, NULL),
(259, 'Special', 0, '', 5000, 0, NULL),
(260, 'Special', 0, '', 5000, 0, NULL),
(261, 'Special', 0, '', 5000, 0, NULL),
(262, 'Special', 0, '', 5000, 0, NULL),
(263, 'Special', 0, '', 5000, 0, NULL),
(264, 'Special', 0, '', 5000, 0, NULL),
(265, 'Special', 0, '', 5000, 0, NULL),
(266, 'Special', 0, '', 5000, 0, NULL),
(267, 'Special', 0, '', 5000, 0, NULL),
(268, 'Special', 0, '', 5000, 0, NULL),
(269, 'Special', 0, '', 5000, 0, NULL),
(270, 'Special', 0, '', 5000, 0, NULL),
(271, 'Special', 0, '', 5000, 0, NULL),
(272, 'Special', 0, '', 5000, 0, NULL),
(273, 'Special', 0, '', 5000, 0, NULL),
(274, 'Special', 0, '', 5000, 0, NULL),
(275, 'Special', 0, '', 5000, 0, NULL),
(276, 'Special', 0, '', 5000, 0, NULL),
(277, 'Special', 0, '', 5000, 0, NULL),
(278, 'Special', 0, '', 5000, 0, NULL),
(279, 'Special', 0, '', 5000, 0, NULL),
(280, 'Special', 0, '', 5000, 0, NULL),
(281, 'Special', 0, '', 5000, 0, NULL),
(282, 'Special', 0, '', 5000, 0, NULL),
(283, 'Special', 0, '', 5000, 0, NULL),
(284, 'Special', 0, '', 5000, 0, NULL),
(285, 'Special', 0, '', 5000, 0, NULL),
(286, 'Special', 0, '', 5000, 0, NULL),
(287, 'Special', 0, '', 5000, 0, NULL),
(288, 'Special', 0, '', 5000, 0, NULL),
(289, 'Special', 0, '', 5000, 0, NULL),
(290, 'Special', 0, '', 5000, 0, NULL),
(291, 'Special', 0, '', 5000, 0, NULL),
(292, 'Special', 0, '', 5000, 0, NULL),
(293, 'Special', 0, '', 5000, 0, NULL),
(294, 'Special', 0, '', 5000, 0, NULL),
(295, 'Special', 0, '', 5000, 0, NULL),
(296, 'Special', 0, '', 5000, 0, NULL),
(297, 'Special', 0, '', 5000, 0, NULL),
(298, 'Special', 0, '', 5000, 0, NULL),
(299, 'Special', 0, '', 5000, 0, NULL),
(300, 'Special', 0, '', 5000, 0, NULL),
(301, 'Special', 0, '', 5000, 0, NULL),
(302, 'Special', 0, '', 5000, 0, NULL),
(303, 'Special', 0, '', 5000, 0, NULL),
(304, 'Special', 0, '', 5000, 0, NULL),
(305, 'Special', 0, '', 5000, 0, NULL),
(306, 'Special', 0, '', 5000, 0, NULL),
(307, 'Special', 0, '', 5000, 0, NULL),
(308, 'Special', 0, '', 5000, 0, NULL),
(309, 'Special', 0, '', 5000, 0, NULL),
(310, 'Special', 0, '', 5000, 0, NULL),
(311, 'Special', 0, '', 5000, 0, NULL),
(312, 'Special', 0, '', 5000, 0, NULL),
(313, 'Special', 0, '', 5000, 0, NULL),
(314, 'Special', 0, '', 5000, 0, NULL),
(315, 'Special', 0, '', 5000, 0, NULL),
(316, 'Special', 0, '', 5000, 0, NULL),
(317, 'Special', 0, '', 5000, 0, NULL),
(318, 'Special', 0, '', 5000, 0, NULL),
(319, 'Special', 0, '', 5000, 0, NULL),
(320, 'Special', 0, '', 5000, 0, NULL),
(321, 'Special', 0, '', 5000, 0, NULL),
(322, 'Special', 0, '', 5000, 0, NULL),
(323, 'Special', 0, '', 5000, 0, NULL),
(324, 'Special', 0, '', 5000, 0, NULL),
(325, 'Special', 0, '', 5000, 0, NULL),
(326, 'Special', 0, '', 5000, 0, NULL),
(327, 'Special', 0, '', 5000, 0, NULL),
(328, 'Special', 0, '', 5000, 0, NULL),
(329, 'Special', 0, '', 5000, 0, NULL),
(330, 'Special', 0, '', 5000, 0, NULL),
(331, 'Special', 0, '', 5000, 0, NULL),
(332, 'Special', 0, '', 5000, 0, NULL),
(333, 'Special', 0, '', 5000, 0, NULL),
(334, 'Special', 0, '', 5000, 0, NULL),
(335, 'Special', 0, '', 5000, 0, NULL),
(336, 'Special', 0, '', 5000, 0, NULL),
(337, 'Special', 0, '', 5000, 0, NULL),
(338, 'Special', 0, '', 5000, 0, NULL),
(339, 'Special', 0, '', 5000, 0, NULL),
(340, 'Special', 0, '', 5000, 0, NULL),
(341, 'Special', 0, '', 5000, 0, NULL),
(342, 'Special', 0, '', 5000, 0, NULL),
(343, 'Special', 0, '', 5000, 0, NULL),
(344, 'Special', 0, '', 5000, 0, NULL),
(345, 'Special', 0, '', 5000, 0, NULL),
(346, 'Special', 0, '', 5000, 0, NULL),
(347, 'Special', 0, '', 5000, 0, NULL),
(348, 'Special', 0, '', 5000, 0, NULL),
(349, 'Special', 0, '', 5000, 0, NULL),
(350, 'Special', 0, '', 5000, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `to do`
--

CREATE TABLE `to do` (
  `ID` int(5) NOT NULL,
  `Item` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `patient details`
--
ALTER TABLE `patient details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `to do`
--
ALTER TABLE `to do`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `CID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `checkup`
--
ALTER TABLE `checkup`
  MODIFY `TID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2012;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `OID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient details`
--
ALTER TABLE `patient details`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10013;

--
-- AUTO_INCREMENT for table `to do`
--
ALTER TABLE `to do`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
