-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2012 at 10:08 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `wComp`
--

-- --------------------------------------------------------

--
-- Table structure for table `wComp_Condition`
--

CREATE TABLE IF NOT EXISTS `wComp_Condition` (
  `id_Condition` int(11) NOT NULL AUTO_INCREMENT,
  `wComp_AnswerChange_idSomeChange` int(11) NOT NULL,
  `Condition_Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Condition`,`wComp_AnswerChange_idSomeChange`),
  KEY `fk_wComp_Parameter_wComp_AnswerChange1` (`wComp_AnswerChange_idSomeChange`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `wComp_Condition`
--

INSERT INTO `wComp_Condition` (`id_Condition`, `wComp_AnswerChange_idSomeChange`, `Condition_Name`) VALUES
(1, 2, 'Weight'),
(2, 4, 'Design'),
(3, 6, 'Price'),
(4, 8, 'WorkTime'),
(5, 10, 'USBCount'),
(6, 12, 'Camera'),
(7, 14, 'Diagonal'),
(8, 16, 'ODD'),
(9, 18, 'OS'),
(10, 20, 'CPU'),
(11, 22, 'Memory'),
(12, 24, 'VGA'),
(13, 26, 'Audio'),
(14, 28, 'HDD'),
(15, 30, 'MarkName'),
(16, 31, 'ColorList'),
(17, 32, 'Color'),
(18, 33, 'Surface'),
(19, 34, 'CartReader'),
(20, 35, 'BlueTooth'),
(21, 36, 'OS_Name'),
(22, 37, 'ODD_Name'),
(23, 38, 'Type'),
(24, 39, 'CPU_Name'),
(25, 40, 'CPU_MarkName'),
(26, 41, 'CPU_Clock rate'),
(27, 42, 'CPU_KernelCount'),
(28, 43, 'Memory_Count'),
(29, 44, 'VGA_Name'),
(30, 45, 'VGA_MarkName'),
(31, 46, 'VGA_Memory'),
(32, 47, 'Audio_MarkName'),
(33, 48, 'Audio_CanalCount'),
(34, 49, 'HDD_MarkName'),
(35, 50, 'HDD_Memory');

-- --------------------------------------------------------

--
-- Table structure for table `wComp_Criteria`
--

CREATE TABLE IF NOT EXISTS `wComp_Criteria` (
  `id_Criteria` int(11) NOT NULL AUTO_INCREMENT,
  `Criteria_DefaultValue` float DEFAULT NULL,
  `wComp_Parametr_id_Parametr` int(11) NOT NULL,
  `Criteria_Name` varchar(45) DEFAULT NULL,
  `Criteria_MinMax` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Criteria`,`wComp_Parametr_id_Parametr`),
  KEY `fk_wComp_Criteria_wComp_Parametr1` (`wComp_Parametr_id_Parametr`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `wComp_Criteria`
--

INSERT INTO `wComp_Criteria` (`id_Criteria`, `Criteria_DefaultValue`, `wComp_Parametr_id_Parametr`, `Criteria_Name`, `Criteria_MinMax`) VALUES
(1, 0.063, 1, 'Weight', 0),
(2, 0.1, 3, 'Design', 1),
(3, 0.23, 5, 'Price', 0),
(4, 0.149, 7, 'WorkTime', 1),
(5, 0.011, 9, 'USBCount', 1),
(6, 0.014, 11, 'Camera', 1),
(7, 0.071, 13, 'Diagonal', 1),
(8, 0.03, 15, 'ODD', 1),
(9, 0.045, 17, 'OS', 1),
(10, 0.101, 19, 'CPU', 1),
(11, 0.072, 21, 'Memory', 1),
(12, 0.07, 23, 'VGA', 1),
(13, 0.04, 25, 'Audio', 1),
(14, 0.094, 27, 'HDD', 1),
(15, 0.094, 29, 'WiFi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wComp_Parametr`
--

CREATE TABLE IF NOT EXISTS `wComp_Parametr` (
  `id_Parametr` int(11) NOT NULL AUTO_INCREMENT,
  `Parametr_Href` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Parametr`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `wComp_Parametr`
--

INSERT INTO `wComp_Parametr` (`id_Parametr`, `Parametr_Href`) VALUES
(1, 'Device_Weight'),
(2, 'Device_Weight'),
(3, 'Device_DesignDSSValue'),
(4, 'Device_DesignDSSValue'),
(5, 'CDevice_Price'),
(6, 'CDevice_Price'),
(7, 'Device_WorkTime'),
(8, 'Device_WorkTime'),
(9, 'Device_USBCount'),
(10, 'Device_USBCount'),
(11, 'Device_Camera'),
(12, 'Device_Camera'),
(13, 'Device_Diagonal'),
(14, 'Device_Diagonal'),
(15, 'ODD_DSSValue'),
(16, 'ODD_DSSValue'),
(17, 'OS_DSSValue'),
(18, 'OS_DSSValue'),
(19, 'CPU_DSSValue'),
(20, 'CPU_DSSValue'),
(21, 'Memory_DSSValue'),
(22, 'Memory_DSSValue'),
(23, 'VGA_DSSValue'),
(24, 'VGA_DSSValue'),
(25, 'Audio_DSSValue'),
(26, 'Audio_DSSValue'),
(27, 'HDD_DSSValue'),
(28, 'HDD_DSSValue'),
(29, 'WiFi_DSSValue'),
(30, 'Device_MarkName'),
(31, 'id_ColorList'),
(32, 'Color_NameRUS'),
(33, 'Device_Surface'),
(34, 'Device_CartReader'),
(35, 'Device_BlueTooth'),
(36, 'OS_Name'),
(37, 'ODD_Name'),
(38, 'Type_Name'),
(39, 'CPU_Name'),
(40, 'CPU_MarkName'),
(41, 'CPU_Clock rate'),
(42, 'CPU_KernelCount'),
(43, 'Memory_Count'),
(44, 'VGA_Name'),
(45, 'VGA_MarkName'),
(46, 'VGA_Memory'),
(47, 'Audio_MarkName'),
(48, 'Audio_CanalCount'),
(49, 'HDD_MarkName'),
(50, 'HDD_Memory');