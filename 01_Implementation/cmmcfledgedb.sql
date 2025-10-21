-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 21, 2025 at 06:00 PM
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
-- Database: `cmmcfledgedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmmc_controls`
--

CREATE TABLE `cmmc_controls` (
  `idCMMC_Controls` int(11) NOT NULL,
  `Control_Family` varchar(5) DEFAULT NULL,
  `Control_ID` varchar(10) DEFAULT NULL,
  `Control_Name` varchar(250) DEFAULT NULL,
  `Control_Explanation` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `control_assessments`
--

CREATE TABLE `control_assessments` (
  `idControl_Assessments` int(11) NOT NULL,
  `CMMC_Controls_idForeign` int(11) NOT NULL,
  `Assessment_Text` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cui_cat`
--

CREATE TABLE `cui_cat` (
  `idCUI_Cat` int(11) NOT NULL,
  `Cat_Name` varchar(45) DEFAULT NULL,
  `Defense_Index_Group` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cui_cat`
--

INSERT INTO `cui_cat` (`idCUI_Cat`, `Cat_Name`, `Defense_Index_Group`) VALUES
(0, 'Critical Infrastructure', 1),
(1, 'Defense', 1),
(2, 'Export Control', 1),
(3, 'Financial', 1),
(4, 'Immigration', 1),
(5, 'Intelligence', 1),
(6, 'International Agreements', 1),
(7, 'Law Enforcement', 1),
(8, 'Legal', 1),
(9, 'Natural and Cultural Resources', 1),
(10, 'North Atlantic Treaty Organization (NATO)', 1),
(11, 'Nuclear', 1),
(12, 'Patent', 1),
(13, 'Privacy', 1),
(14, 'Procurement and Acquisition', 1),
(15, 'Proprietary Business Information', 1),
(16, 'Provisional', 1),
(17, 'Statistical', 1),
(18, 'Tax', 1),
(19, 'Transportation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cui_types`
--

CREATE TABLE `cui_types` (
  `idCUI_Types` int(11) NOT NULL,
  `CUI_Cat_idCUI_Cat` int(11) NOT NULL,
  `Type_Name` varchar(200) DEFAULT NULL,
  `Is_Basic` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cui_types`
--

INSERT INTO `cui_types` (`idCUI_Types`, `CUI_Cat_idCUI_Cat`, `Type_Name`, `Is_Basic`) VALUES
(0, 0, 'Ammonium Nitrate', 0),
(1, 0, 'Chemical-terrorism Vulnerability Information', 0),
(2, 0, 'Critical Energy Infrastructure Information', 0),
(3, 0, 'Emergency Management', 1),
(4, 0, 'General Critical Infrastructure Information', 1),
(5, 0, 'Information Systems Vulnerability Information', 1),
(6, 0, 'Physical Security', 1),
(7, 0, 'Protected Critical Infrastructure Information', 0),
(8, 0, 'SAFETY Act Information', 1),
(9, 0, 'Toxic Substances', 0),
(10, 0, 'Water Assessments', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmmc_controls`
--
ALTER TABLE `cmmc_controls`
  ADD PRIMARY KEY (`idCMMC_Controls`);

--
-- Indexes for table `control_assessments`
--
ALTER TABLE `control_assessments`
  ADD PRIMARY KEY (`idControl_Assessments`,`CMMC_Controls_idForeign`),
  ADD KEY `fk_Control_Assessments_CMMC_Controls_idx` (`CMMC_Controls_idForeign`);

--
-- Indexes for table `cui_cat`
--
ALTER TABLE `cui_cat`
  ADD PRIMARY KEY (`idCUI_Cat`);

--
-- Indexes for table `cui_types`
--
ALTER TABLE `cui_types`
  ADD PRIMARY KEY (`idCUI_Types`,`CUI_Cat_idCUI_Cat`),
  ADD KEY `fk_CUI_Types_CUI_Cat1_idx` (`CUI_Cat_idCUI_Cat`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `control_assessments`
--
ALTER TABLE `control_assessments`
  ADD CONSTRAINT `fk_Control_Assessments_CMMC_Controls` FOREIGN KEY (`CMMC_Controls_idForeign`) REFERENCES `cmmc_controls` (`idCMMC_Controls`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cui_types`
--
ALTER TABLE `cui_types`
  ADD CONSTRAINT `fk_CUI_Types_CUI_Cat1` FOREIGN KEY (`CUI_Cat_idCUI_Cat`) REFERENCES `cui_cat` (`idCUI_Cat`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
