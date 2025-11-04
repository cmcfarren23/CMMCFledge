-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 04, 2025 at 06:58 AM
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
  `Control_ID` varchar(10) NOT NULL,
  `Control_Family` varchar(5) DEFAULT NULL,
  `Control_Name` varchar(250) DEFAULT NULL,
  `Control_Explanation` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cmmc_controls`
--

INSERT INTO `cmmc_controls` (`Control_ID`, `Control_Family`, `Control_Name`, `Control_Explanation`) VALUES
('B.1.I', 'AC', 'AUTHORIZED ACCESS CONTROL [FCI DATA]', 'Limit information system access to authorized users, processes acting on behalf of\r\nauthorized users, or devices (including other information systems).'),
('B.1.II', 'AC', 'TRANSACTION & FUNCTION CONTROL [FCI DATA]', 'Limit information system access to the types of transactions and functions that authorized users are permitted to execute.'),
('B.1.III', 'AC', 'EXTERNAL CONNECTIONS [FCI DATA]', 'Verify and control/limit connections to and use of external information systems.'),
('B.1.IV', 'AC', 'CONTROL PUBLIC INFORMATION [FCI DATA]', 'Control information posted or processed on publicly accessible information systems.'),
('B.1.IX', 'PE', 'MANAGE VISITORS & PHYSICAL ACCESS [FCI DATA]', 'Escort visitors and monitor visitor activity; maintain audit logs of physical access; and control and manage physical access devices.'),
('B.1.V', 'IA', 'IDENTIFICATION [FCI DATA]', 'Identify information system users, processes acting on behalf of users, or devices.'),
('B.1.VI', 'IA', 'AUTHENTICATION [FCI DATA]', 'Authenticate (or verify) the identities of those users, processes, or devices, as a prerequisite to allowing access to organizational information systems.'),
('B.1.VII', 'MP', 'MEDIA DISPOSAL [FCI DATA]', 'Sanitize or destroy information system media containing Federal Contract Information before disposal or release for reuse.'),
('B.1.VIII', 'PE', 'LIMIT PHYSICAL ACCESS [FCI DATA]', 'Limit physical access to organizational information systems, equipment, and the respective operating environments to authorized individuals.'),
('B.1.X', 'SC', 'BOUNDARY PROTECTION [FCI DATA]', 'Monitor, control, and protect organizational communications (i.e., information transmitted or received by organizational information systems) at the external boundaries and key internal boundaries of the information systems.'),
('B.1.XI', 'SC', 'PUBLIC-ACCESS SYSTEM SEPARATION [FCI DATA]', 'Implement subnetworks for publicly accessible system components that are physically or logically separated from internal networks.'),
('B.1.XII', 'SI', 'FLAW REMEDIATION [FCI DATA]', 'Identify, report, and correct information and information system flaws in a timely manner.'),
('B.1.XIII', 'SI', 'MALICIOUS CODE PROTECTION [FCI DATA]', 'Provide protection from malicious code at appropriate locations within organizational information systems.'),
('B.1.XIV', 'SI', 'UPDATE MALICIOUS CODE PROTECTION [FCI DATA]', 'Update malicious code protection mechanisms when new releases are available.'),
('B.1.XV', 'SI', 'SYSTEM & FILE SCANNING [FCI DATA]', 'Perform periodic scans of the information system and real-time scans of files from external sources as files are downloaded, opened, or executed.');

-- --------------------------------------------------------

--
-- Table structure for table `control_assessments`
--

CREATE TABLE `control_assessments` (
  `idControl_Assessments` varchar(15) NOT NULL,
  `CMMC_Controls_Control_ID` varchar(10) NOT NULL,
  `Assessment_Text` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `control_assessments`
--

INSERT INTO `control_assessments` (`idControl_Assessments`, `CMMC_Controls_Control_ID`, `Assessment_Text`) VALUES
('B.1.I.a', 'B.1.I', 'authorized users are identified;'),
('B.1.I.b', 'B.1.I', 'processes acting on behalf of authorized users are identified;'),
('B.1.I.c', 'B.1.I', 'devices (and other systems) authorized to connect to the system are identified;'),
('B.1.I.d', 'B.1.I', 'system access is limited to authorized users;'),
('B.1.I.e', 'B.1.I', 'system access is limited to processes acting on behalf of authorized users; and'),
('B.1.I.f', 'B.1.I', 'system access is limited to authorized devices (including other systems).'),
('B.1.II.a', 'B.1.II', 'the types of transactions and functions that authorized users are permitted to\r\nexecute are defined; and'),
('B.1.II.b', 'B.1.II', 'system access is limited to the defined types of transactions and functions for\r\nauthorized users.'),
('B.1.III.a', 'B.1.III', 'connections to external systems are identified;'),
('B.1.III.b', 'B.1.III', 'the use of external systems is identified;'),
('B.1.III.c', 'B.1.III', 'connections to external systems are verified;'),
('B.1.III.d', 'B.1.III', 'the use of external systems is verified;'),
('B.1.III.e', 'B.1.III', 'connections to external systems are controlled/limited; and'),
('B.1.III.f', 'B.1.III', 'the use of external systems is controlled/limited.'),
('B.1.IV.a', 'B.1.IV', 'individuals authorized to post or process information on publicly accessible systems are identified;'),
('B.1.IV.b', 'B.1.IV', 'procedures to ensure [FCI] is not posted or processed on publicly accessible\r\nsystems are identified;'),
('B.1.IV.c', 'B.1.IV', 'a review process is in place prior to posting of any content to publicly accessible systems;'),
('B.1.IV.d', 'B.1.IV', 'content on publicly accessible systems is reviewed to ensure that it does not include [FCI]; and'),
('B.1.IV.e', 'B.1.IV', 'mechanisms are in place to remove and address improper posting of [FCI].'),
('B.1.IX.a', 'B.1.IX', 'visitors are escorted;'),
('B.1.IX.b', 'B.1.IX', 'visitor activity is monitored;'),
('B.1.IX.c', 'B.1.IX', 'audit logs of physical access are maintained;'),
('B.1.IX.d', 'B.1.IX', 'physical access devices are identified;'),
('B.1.IX.e', 'B.1.IX', 'physical access devices are controlled; and'),
('B.1.IX.f', 'B.1.IX', 'physical access devices are managed.'),
('B.1.V.a', 'B.1.V', 'system users are identified;'),
('B.1.V.b', 'B.1.V', 'processes acting on behalf of users are identified; and'),
('B.1.V.c', 'B.1.V', 'devices accessing the system are identified.'),
('B.1.VI.a', 'B.1.VI', 'the identity of each user is authenticated or verified as a prerequisite to system\r\naccess;'),
('B.1.VI.b', 'B.1.VI', 'the identity of each process acting on behalf of a user is authenticated or verified as a prerequisite to system access; and'),
('B.1.VI.c', 'B.1.VI', 'the identity of each device accessing or connecting to the system is authenticated or verified as a prerequisite to system access.'),
('B.1.VII.a', 'B.1.VII', 'system media containing [FCI] is sanitized or destroyed before disposal; and'),
('B.1.VII.b', 'B.1.VII', 'system media containing [FCI] is sanitized before it is released for reuse.'),
('B.1.VIII', 'B.1.VIII', 'authorized individuals allowed physical access are identified;'),
('B.1.VIII.b', 'B.1.VIII', 'physical access to organizational systems is limited to authorized individuals;'),
('B.1.VIII.c', 'B.1.VIII', 'physical access to equipment is limited to authorized individuals; and'),
('B.1.VIII.d', 'B.1.VIII', 'physical access to operating environments is limited to authorized individuals.'),
('B.1.X.a', 'B.1.X', 'the external system boundary is defined;'),
('B.1.X.b', 'B.1.X', 'key internal system boundaries are defined;'),
('B.1.X.c', 'B.1.X', 'communications are monitored at the external system boundary;'),
('B.1.X.d', 'B.1.X', 'communications are monitored at key internal boundaries;'),
('B.1.X.e', 'B.1.X', 'communications are controlled at the external system boundary;'),
('B.1.X.f', 'B.1.X', 'communications are controlled at key internal boundaries;'),
('B.1.X.g', 'B.1.X', 'communications are protected at the external system boundary; and'),
('B.1.X.h', 'B.1.X', 'communications are protected at key internal boundaries.'),
('B.1.XI.a', 'B.1.XI', 'publicly accessible system components are identified; and'),
('B.1.XI.b', 'B.1.XI', 'subnetworks for publicly accessible system components are physically or logically separated from internal networks.'),
('B.1.XII.a', 'B.1.XII', 'the time within which to identify system flaws is specified;'),
('B.1.XII.b', 'B.1.XII', 'system flaws are identified within the specified time frame;'),
('B.1.XII.c', 'B.1.XII', 'the time within which to report system flaws is specified;'),
('B.1.XII.d', 'B.1.XII', 'system flaws are reported within the specified time frame;'),
('B.1.XII.e', 'B.1.XII', 'the time within which to correct system flaws is specified; and'),
('B.1.XII.f', 'B.1.XII', 'system flaws are corrected within the specified time frame.'),
('B.1.XIII.a', 'B.1.XIII', 'designated locations for malicious code protection are identified; and'),
('B.1.XIII.b', 'B.1.XIII', 'protection from malicious code at designated locations is provided.'),
('B.1.XIV.a', 'B.1.XIV', 'malicious code protection mechanisms are updated when new releases are available.'),
('B.1.XV.a', 'B.1.XV', 'the frequency for malicious code scans is defined;'),
('B.1.XV.b', 'B.1.XV', 'malicious code scans are performed with the defined frequency; and'),
('B.1.XV.c', 'B.1.XV', 'real-time malicious code scans of files from external sources as files are downloaded, opened, or executed are performed.');

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
(10, 0, 'Water Assessments', 1),
(11, 1, 'Controlled Technical Information', 0),
(12, 1, 'DoD Critical Infrastructure Security Information', 1),
(13, 1, 'Naval Nuclear Propulsion Information', 0),
(14, 1, 'Privileged Safety Information', 1),
(15, 1, 'Unclassified Controlled Nuclear Information - Defense', 0),
(16, 2, 'Export Controlled', 0),
(17, 2, 'Export Controlled Research', 1),
(18, 3, 'Bank Secrecy', 0),
(19, 3, 'Budget', 0),
(20, 3, 'Comptroller General', 1),
(21, 3, 'Consumer Complaint Information', 0),
(22, 3, 'Electronic Funds Transfer', 1),
(23, 3, 'Federal Housing Finance Non-Public Information', 1),
(24, 3, 'Financial Supervision Information', 1),
(25, 3, 'General Financial Information', 0),
(26, 3, 'International Financial Institutions', 0),
(27, 3, 'Mergers', 1),
(28, 3, 'Net Worth', 1),
(29, 3, 'Mergers', 1),
(30, 4, 'Asylee', 1),
(31, 4, 'Battered Spouse or Child', 1),
(32, 4, 'Permanent Resident Status', 1),
(33, 4, 'Status Adjustment', 1),
(34, 4, 'Temporary Protected Status', 1),
(35, 4, 'Victims of Human Trafficking', 1),
(36, 4, 'Visas', 1),
(37, 5, 'Agriculture', 1),
(38, 5, 'Foreign Intelligence Surveillance Act', 0),
(39, 5, 'Foreign Intelligence Surveillance Act Business Records', 0),
(40, 5, 'General Intelligence', 0),
(41, 5, 'Geodetic Product Information', 0),
(42, 5, 'Intelligence Financial Records', 0),
(43, 5, 'Internal Data', 0),
(44, 5, 'Operations Security', 1),
(45, 6, 'International Agreement Information', 0),
(46, 7, 'Accident Investigation', 0),
(47, 7, 'Campaign Funds', 0),
(48, 7, 'Committed Person', 1),
(49, 7, 'Communications', 1),
(50, 7, 'Controlled Substances', 0),
(51, 7, 'Criminal History Records Information', 0),
(52, 7, 'DNA', 0),
(53, 7, 'General Law Enforcement', 1),
(54, 7, 'Informant', 0),
(55, 7, 'Investigation', 0),
(56, 7, 'Juvenile', 1),
(57, 7, 'Law Enforcement Financial Records', 0),
(58, 7, 'National Security Letter', 1),
(59, 7, 'Pen Register/Trap & Trace', 1),
(60, 7, 'Reward', 1),
(61, 7, 'Sex Crime Victim', 1),
(62, 7, 'Terrorist Screening', 1),
(63, 7, 'Whistleblower Identity', 0),
(64, 8, 'Administrative Proceedings', 0),
(65, 8, 'Child Pornography', 0),
(66, 8, 'Child Victim/Witness', 1),
(67, 8, 'Collective Bargaining', 1),
(68, 8, 'Federal Grand Jury', 1),
(69, 8, 'Legal Privilege', 1),
(70, 8, 'Legislative Materials', 1),
(71, 8, 'Presentence Report', 1),
(72, 8, 'Prior Arrest', 1),
(73, 8, 'Protective Order', 0),
(74, 8, 'Victim', 1),
(75, 8, 'Witness Protection', 0),
(76, 9, 'Archaeological Resources', 1),
(77, 9, 'Historic Properties', 0),
(78, 9, 'National Park System Resources', 0),
(79, 10, 'NATO Restricted', 0),
(80, 10, 'NATO Unclassified', 0),
(81, 11, 'General Nuclear', 0),
(82, 11, 'Nuclear Recommendation Material', 1),
(83, 11, 'Nuclear Security-Related Information', 0),
(84, 11, 'Safeguards Information', 0),
(85, 11, 'Unclassified Controlled Nuclear Information - Energy', 0),
(86, 12, 'Patent Applications', 1),
(87, 12, 'Inventions', 1),
(88, 12, 'Secrecy Orders', 1),
(89, 13, 'Contract Use', 0),
(90, 13, 'Death Records', 1),
(91, 13, 'General Privacy', 1),
(92, 13, 'Genetic Information', 0),
(93, 13, 'Health Information', 1),
(94, 13, 'Inspector General Protected', 0),
(95, 13, 'Military Personnel Records', 1),
(96, 13, 'Personnel Records', 1),
(97, 13, 'Student Records', 1),
(98, 14, 'General Procurement and Acquisition', 0),
(99, 14, 'Small Business Research and Technology', 1),
(100, 14, 'Source Selection', 0),
(101, 15, 'Entity Registration Information', 1),
(102, 15, 'General Proprietary Business Information', 1),
(103, 15, 'Ocean Common Carrier and Marine Terminal Operator Agreements', 1),
(104, 15, 'Ocean Common Carrier Service Contracts', 1),
(105, 15, 'Proprietary Manufacturer', 0),
(106, 15, 'Proprietary Postal', 1),
(107, 16, 'Homeland Security Agreement Information', 1),
(108, 16, 'Homeland Security Enforcement Information', 1),
(109, 16, 'Information Systems Vulnerability Information - Homeland', 1),
(110, 16, 'International Agreement Information - Homeland', 1),
(111, 16, 'Operations Security Information', 1),
(112, 16, 'Personnel Security Information', 1),
(113, 16, 'Physical Security - Homeland', 1),
(114, 16, 'Privacy Information', 1),
(115, 16, 'Sensitive Personally Identifiable Information', 1),
(116, 17, 'Investment Survey', 1),
(117, 17, 'Pesticide Producer Survey', 1),
(118, 17, 'Statistical Information', 0),
(119, 17, 'US Census', 0),
(120, 18, 'Federal Taxpayer Information', 0),
(121, 18, 'Tax Convention', 1),
(122, 18, 'Taxpayer Advocate Information', 1),
(123, 18, 'Written Determinations', 0),
(124, 19, 'Railroad Safety Analysis Records', 1),
(125, 19, 'Sensitive Security Information', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmmc_controls`
--
ALTER TABLE `cmmc_controls`
  ADD PRIMARY KEY (`Control_ID`);

--
-- Indexes for table `control_assessments`
--
ALTER TABLE `control_assessments`
  ADD PRIMARY KEY (`idControl_Assessments`,`CMMC_Controls_Control_ID`),
  ADD KEY `fk_Control_Assessments_CMMC_Controls1_idx` (`CMMC_Controls_Control_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `control_assessments`
--
ALTER TABLE `control_assessments`
  ADD CONSTRAINT `fk_Control_Assessments_CMMC_Controls1` FOREIGN KEY (`CMMC_Controls_Control_ID`) REFERENCES `cmmc_controls` (`Control_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
