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
('L2-3.1.1', 'AC', 'AUTHORIZED ACCESS CONTROL [CUI DATA]', 'Limit system access to authorized users, processes acting on behalf of authorized users, and devices (including other systems).'),
('L2-3.1.2', 'AC', 'TRANSACTION & FUNCTION CONTROL', 'Limit system access to the types of transactions and functions that authorized users are permitted to execute'),
('L2-3.1.3', 'AC', 'CONTROL CUI FLOW', 'Control the flow of CUI in accordance with approved authorizations.'),
('L2-3.1.4', 'AC', 'SEPARATION OF DUTIES', 'Separate the duties of individuals to reduce the risk of malevolent activity without collusion.'),
('L2-3.1.5', 'AC', 'LEAST PRIVILEGE', 'Employ the principle of least privilege, including for specific security functions and privileged accounts.'),
('L2-3.1.6', 'AC', 'NON-PRIVILEGED ACCOUNT USE', 'Use non-privileged accounts or roles when accessing nonsecurity functions.'),
('L2-3.1.7', 'AC', 'PRIVILEGED FUNCTIONS', 'Prevent non-privileged users from executing privileged functions and capture the execution of such functions in audit logs.'),
('L2-3.1.8', 'AC', 'UNSUCCESSFUL LOGON ATTEMPTS', 'Limit unsuccessful logon attempts.'),
('L2-3.1.9', 'AC', 'PRIVACY & SECURITY NOTICES', 'Provide privacy and security notices consistent with applicable CUI rules.'),
('L2-3.1.10', 'AC', 'SESSION LOCK', 'Use session lock with pattern-hiding displays to prevent access and viewing of data after a period of inactivity.'),
('L2-3.1.11', 'AC', 'SESSION TERMINATION', 'Terminate (automatically) a user session after a defined condition.'),
('L2-3.1.12', 'AC', 'CONTROL REMOTE ACCESS', 'Monitor and control remote access sessions.'),
('L2-3.1.13', 'AC', 'REMOTE ACCESS CONFIDENTIALITY', 'Employ cryptographic mechanisms to protect the confidentiality of remote access sessions.'),
('L2-3.1.14', 'AC', 'REMOTE ACCESS ROUTING', 'Route remote access via managed access control points.'),
('L2-3.1.15', 'AC', 'PRIVILEGED REMOTE ACCESS', 'Authorize remote execution of privileged commands and remote access to security-relevant information.'),
('L2-3.1.16', 'AC', 'WIRELESS ACCESS AUTHORIZATION', 'Authorize wireless access prior to allowing such connections.'),
('L2-3.1.17', 'AC', 'WIRELESS ACCESS PROTECTION', 'Protect wireless access using authentication and encryption.'),
('L2-3.1.18', 'AC', 'MOBILE DEVICE CONNECTION', 'Control connection of mobile devices.'),
('L2-3.1.19', 'AC', 'ENCRYPT CUI ON MOBILE', 'Encrypt CUI on mobile devices and mobile computing platforms.'),
('L2-3.1.20', 'AC', 'EXTERNAL CONNECTIONS [CUI DATA]', 'Verify and control/limit connections to and use of external systems.'),
('L2-3.1.21', 'AC', 'PORTABLE STORAGE USE', 'Limit use of portable storage devices on external systems.'),
('L2-3.1.22', 'AC', 'CONTROL PUBLIC INFORMATION [CUI DATA]', 'Control CUI posted or processed on publicly accessible systems.'),
('L2-3.2.1', 'AT', 'ROLE-BASED RISK AWARENESS', 'Ensure that managers, systems administrators, and users of organizational systems are made aware of the security risks associated with their activities and of the applicable policies, standards, and procedures related to the security of those systems.'),
('L2-3.2.2', 'AT', 'ROLE-BASED TRAINING', 'Ensure that personnel are trained to carry out their assigned information security-related duties and responsibilities.'),
('L2-3.2.3', 'AT', 'INSIDER THREAT AWARENESS', 'Provide security awareness training on recognizing and reporting potential indicators of insider threat.'),
('L2-3.3.1', 'AU', 'SYSTEM AUDITING', 'Create and retain system audit logs and records to the extent needed to enable the monitoring, analysis, investigation, and reporting of unlawful or unauthorized system activity.'),
('L2-3.3.2', 'AU', 'USER ACCOUNTABILITY', 'Ensure that the actions of individual system users can be uniquely traced to those users so they can be held accountable for their actions.'),
('L2-3.3.3', 'AU', 'EVENT REVIEW', 'Review and update logged events.'),
('L2-3.3.4', 'AU', 'AUDIT FAILURE ALERTING', 'Alert in the event of an audit logging process failure.'),
('L2-3.3.5', 'AU', 'AUDIT CORRELATION', 'Correlate audit record review, analysis, and reporting processes for investigation and response to indications of unlawful, unauthorized, suspicious, or unusual activity.'),
('L2-3.3.6', 'AU', 'REDUCTION & REPORTING', 'Provide audit record reduction and report generation to support on-demand analysis and reporting.'),
('L2-3.3.7', 'AU', 'AUTHORITATIVE TIME SOURCE', 'Provide a system capability that compares and synchronizes internal system clocks with an authoritative source to generate time stamps for audit records.'),
('L2-3.3.8', 'AU', 'AUDIT PROTECTION', 'Protect audit information and audit logging tools from unauthorized access, modification, and deletion.'),
('L2-3.3.9', 'AU', 'AUDIT MANAGEMENT', 'Limit management of audit logging functionality to a subset of privileged users.'),
('L2-3.4.1', 'CM', 'SYSTEM BASELINING', 'Establish and maintain baseline configurations and inventories of organizational systems (including hardware, software, firmware, and documentation) throughout the respective system development life cycles.'),
('L2-3.4.2', 'CM', 'SECURITY CONFIGURATION ENFORCEMENT', 'Establish and enforce security configuration settings for information technology products employed in organizational systems.'),
('L2-3.4.3', 'CM', 'SYSTEM CHANGE MANAGEMENT', 'Track, review, approve or disapprove, and log changes to organizational systems.'),
('L2-3.4.4', 'CM', 'SECURITY IMPACT ANALYSIS', 'Analyze the security impact of changes prior to implementation.'),
('L2-3.4.5', 'CM', 'ACCESS RESTRICTIONS FOR CHANGE', 'Define, document, approve, and enforce physical and logical access restrictions associated with changes to organizational systems.'),
('L2-3.4.6', 'CM', 'LEAST FUNCTIONALITY', 'Employ the principle of least functionality by configuring organizational systems to provide only essential capabilities.'),
('L2-3.4.7', 'CM', 'NONESSENTIAL FUNCTIONALITY', 'Restrict, disable, or prevent the use of nonessential programs, functions, ports, protocols, and services.'),
('L2-3.4.8', 'CM', 'APPLICATION EXECUTION POLICY', 'Apply deny-by-exception (blacklisting) policy to prevent the use of unauthorized software or deny-all, permit-by-exception (whitelisting) policy to allow the execution of authorized software.'),
('L2-3.4.9', 'CM', 'USER-INSTALLED SOFTWARE', 'Control and monitor user-installed software.'),
('L2-3.5.1', 'IA', 'IDENTIFICATION [CUI DATA]', 'Identify system users, processes acting on behalf of users, and devices.'),
('L2-3.5.2', 'IA', 'AUTHENTICATION [CUI DATA]', 'Authenticate (or verify) the identities of users, processes, or devices, as a prerequisite to allowing access to organizational systems.'),
('L2-3.5.3', 'IA', 'MULTIFACTOR AUTHENTICATION', 'Use multifactor authentication for local and network access to privileged accounts and for network access to non-privileged accounts.'),
('L2-3.5.4', 'IA', 'REPLAY-RESISTANT AUTHENTICATION', 'Employ replay-resistant authentication mechanisms for network access to privileged and non-privileged accounts.'),
('L2-3.5.5', 'IA', 'IDENTIFIER REUSE', 'Prevent reuse of identifiers for a defined period.'),
('L2-3.5.6', 'IA', 'IDENTIFIER HANDLING', 'Disable identifiers after a defined period of inactivity.'),
('L2-3.5.7', 'IA', 'PASSWORD COMPLEXITY', 'Enforce a minimum password complexity and change of characters when new passwords are created.'),
('L2-3.5.8', 'IA', 'PASSWORD REUSE', 'Prohibit password reuse for a specified number of generations.'),
('L2-3.5.9', 'IA', 'TEMPORARY PASSWORDS', 'Allow temporary password use for system logons with an immediate change to a permanent password.'),
('L2-3.5.10', 'IA', 'CRYPTOGRAPHICALLY-PROTECTED PASSWORDS', 'Store and transmit only cryptographically-protected passwords.'),
('L2-3.5.11', 'IA', 'OBSCURE FEEDBACK', 'Obscure feedback of authentication information.'),
('L2-3.6.1', 'IR', 'INCIDENT HANDLING', 'Establish an operational incident-handling capability for organizational systems that includes preparation, detection, analysis, containment, recovery, and user response activities.'),
('L2-3.6.2', 'IR', 'INCIDENT REPORTING', 'Track, document, and report incidents to designated officials and/or authorities both internal and external to the organization.'),
('L2-3.6.3', 'IR', 'INCIDENT RESPONSE TESTING', 'Test the organizational incident response capability.'),
('L2-3.7.1', 'MA', 'PERFORM MAINTENANCE', 'Perform maintenance on organizational systems.'),
('L2-3.7.2', 'MA', 'SYSTEM MAINTENANCE CONTROL', 'Provide controls on the tools, techniques, mechanisms, and personnel used to conduct system maintenance.'),
('L2-3.7.3', 'MA', 'EQUIPMENT SANITIZATION', 'Ensure equipment removed for off-site maintenance is sanitized of any CUI.'),
('L2-3.7.4', 'MA', 'MEDIA INSPECTION', 'Check media containing diagnostic and test programs for malicious code before the media are used in organizational systems.'),
('L2-3.7.5', 'MA', 'NONLOCAL MAINTENANCE', 'Require multifactor authentication to establish nonlocal maintenance sessions via external network connections and terminate such connections when nonlocal maintenance is complete.'),
('L2-3.7.6', 'MA', 'MAINTENANCE PERSONNEL', 'Supervise the maintenance activities of maintenance personnel without required access authorization.'),
('L2-3.8.1', 'MP', 'MEDIA PROTECTION', 'Protect (i.e., physically control and securely store) system media containing CUI, both paper and digital.'),
('L2-3.8.2', 'MP', 'MEDIA ACCESS', 'Limit access to CUI on system media to authorized users.'),
('L2-3.8.3', 'MP', 'MEDIA DISPOSAL [CUI DATA]', 'Sanitize or destroy system media containing CUI before disposal or release for reuse.'),
('L2-3.8.4', 'MP', 'MEDIA MARKINGS', 'Mark media with necessary CUI markings and distribution limitations.'),
('L2-3.8.5', 'MP', 'MEDIA ACCOUNTABILITY', 'Control access to media containing CUI and maintain accountability for media during transport outside of controlled areas.'),
('L2-3.8.6', 'MP', 'PORTABLE STORAGE ENCRYPTION', 'Implement cryptographic mechanisms to protect the confidentiality of CUI stored on digital media during transport unless otherwise protected by alternative physical safeguards.'),
('L2-3.8.7', 'MP', 'REMOVEABLE MEDIA', 'Control the use of removable media on system components.'),
('L2-3.8.8', 'MP', 'SHARED MEDIA', 'Prohibit the use of portable storage devices when such devices have no identifiable owner.'),
('L2-3.8.9', 'MP', 'PROTECT BACKUPS', 'Protect the confidentiality of backup CUI at storage locations.'),
('L2-3.9.1', 'PS', 'SCREEN INDIVIDUALS', 'Screen individuals prior to authorizing access to organizational systems containing CUI.'),
('L2-3.9.2', 'PS', 'PERSONNEL ACTIONS', 'Ensure that organizational systems containing CUI are protected during and after personnel actions such as terminations and transfers.'),
('L2-3.10.1', 'PE', 'LIMIT PHYSICAL ACCESS [CUI DATA]', 'Limit physical access to organizational systems, equipment, and the respective operating environments to authorized individuals.'),
('L2-3.10.2', 'PE', 'MONITOR FACILITY', 'Protect and monitor the physical facility and support infrastructure for organizational systems.'),
('L2-3.10.3', 'PE', 'ESCORT VISITORS [CUI DATA]', 'Escort visitors and monitor visitor activity.'),
('L2-3.10.4', 'PE', 'PHYSICAL ACCESS LOGS [CUI DATA]', 'Maintain audit logs of physical access.'),
('L2-3.10.5', 'PE', 'MANAGE PHYSICAL ACCESS [CUI DATA]', 'Control and manage physical access devices.'),
('L2-3.10.6', 'PE', 'ALTERNATIVE WORK SITES', 'Enforce safeguarding measures for CUI at alternate work sites.'),
('L2-3.11.1', 'RA', 'RISK ASSESSMENTS', 'Periodically assess the risk to organizational operations (including mission, functions, image, or reputation), organizational assets, and individuals, resulting from the operation of organizational systems and the associated processing, storage, or transmission of CUI.'),
('L2-3.11.2', 'RA', 'VULNERABILITY SCAN', 'Scan for vulnerabilities in organizational systems and applications periodically and when new vulnerabilities affecting those systems and applications are identified.'),
('L2-3.11.3', 'RA', 'VULNERABILITY REMEDIATION', 'Remediate vulnerabilities in accordance with risk assessments.'),
('L2-3.12.1', 'CA', 'SECURITY CONTROL ASSESSMENT', 'Periodically assess the security controls in organizational systems to determine if the controls are effective in their application.'),
('L2-3.12.2', 'CA', 'OPERATIONAL PLAN OF ACTION', 'Develop and implement plans of action designed to correct deficiencies and reduce or eliminate vulnerabilities in organizational systems.'),
('L2-3.12.3', 'CA', 'SECURITY CONTROL MONITORING', 'Monitor security controls on an ongoing basis to ensure the continued effectiveness of the controls.'),
('L2-3.12.4', 'CA', 'SYSTEM SECURITY PLAN', 'Develop, document, and periodically update system security plans that describe system boundaries, system environments of operation, how security requirements are implemented, and the relationships with or connections to other systems.'),
('L2-3.13.1', 'SC', 'BOUNDARY PROTECTION [CUI DATA]', 'Monitor, control, and protect communications (i.e., information transmitted or received by organizational systems) at the external boundaries and key internal boundaries of organizational systems.'),
('L2-3.13.2', 'SC', 'SECURITY ENGINEERING', 'Employ architectural designs, software development techniques, and systems engineering principles that promote effective information security within organizational systems.'),
('L2-3.13.3', 'SC', 'ROLE SEPARATION', 'Separate user functionality from system management functionality.'),
('L2-3.13.4', 'SC', 'SHARED RESOURCE CONTROL', 'Prevent unauthorized and unintended information transfer via shared system resources.'),
('L2-3.13.5', 'SC', 'PUBLIC-ACCESS SYSTEM SEPARATION [CUI DATA]', 'Implement subnetworks for publicly accessible system components that are physically or logically separated from internal networks.'),
('L2-3.13.6', 'SC', 'NETWORK COMMUNICATION BY EXCEPTION', 'Deny network communications traffic by default and allow network communications traffic by exception (i.e., deny all, permit by exception).'),
('L2-3.13.7', 'SC', 'SPLIT TUNNELING', 'Prevent remote devices from simultaneously establishing non-remote connections with organizational systems and communicating via some other connection to resources in external networks (i.e., split tunneling).'),
('L2-3.13.8', 'SC', 'DATA IN TRANSIT', 'Implement cryptographic mechanisms to prevent unauthorized disclosure of CUI during transmission unless otherwise protected by alternative physical safeguards.'),
('L2-3.13.9', 'SC', 'CONNECTIONS TERMINATION', 'Terminate network connections associated with communications sessions at the end of the sessions or after a defined period of inactivity.'),
('L2-3.13.10', 'SC', 'KEY MANAGEMENT', 'Establish and manage cryptographic keys for cryptography employed in organizational systems.'),
('L2-3.13.11', 'SC', 'CUI ENCRYPTION', 'Employ FIPS-validated cryptography when used to protect the confidentiality of CUI.'),
('L2-3.13.12', 'SC', 'COLLABORATIVE DEVICE CONTROL', 'Prohibit remote activation of collaborative computing devices and provide indication of devices in use to users present at the device.'),
('L2-3.13.13', 'SC', 'MOBILE CODE', 'Control and monitor the use of mobile code.'),
('L2-3.13.14', 'SC', 'VOICE OVER INTERNET PROTOCOL', 'Control and monitor the use of Voice over Internet Protocol (VoIP) technologies.'),
('L2-3.13.15', 'SC', 'COMMUNICATIONS AUTHENTICITY', 'Protect the authenticity of communications sessions.'),
('L2-3.13.16', 'SC', 'DATA AT REST', 'Protect the confidentiality of CUI at rest.'),
('L2-3.14.1', 'SI', 'FLAW REMEDIATION [CUI DATA]', 'Identify, report, and correct system flaws in a timely manner.'),
('L2-3.14.2', 'SI', 'MALICIOUS CODE PROTECTION [CUI DATA]', 'Provide protection from malicious code at designated locations within organizational systems.'),
('L2-3.14.3', 'SI', 'SECURITY ALERTS & ADVISORIES', 'Monitor system security alerts and advisories and take action in response.'),
('L2-3.14.4', 'SI', 'UPDATE MALICIOUS CODE PROTECTION [CUI DATA]', 'Update malicious code protection mechanisms when new releases are available.'),
('L2-3.14.5', 'SI', 'SYSTEM & FILE SCANNING [CUI DATA]', 'Perform periodic scans of organizational systems and real-time scans of files from external sources as files are downloaded, opened, or executed.'),
('L2-3.14.6', 'SI', 'MONITOR COMMUNICATIONS FOR ATTACKS', 'Monitor organizational systems, including inbound and outbound communications traffic, to detect attacks and indicators of potential attacks.'),
('L2-3.14.7', 'SI', 'IDENTIFY UNAUTHORIZED USE', 'Identify unauthorized use of organizational systems.');

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
