-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 06:38 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `authenu0_imet`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_info`
--

CREATE TABLE IF NOT EXISTS `agent_info` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(100) NOT NULL,
  `agent_address` text NOT NULL,
  `agent_phone_number` varchar(500) NOT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `agent_info`
--

INSERT INTO `agent_info` (`agent_id`, `agent_name`, `agent_address`, `agent_phone_number`) VALUES
(9, 'Md. Kabir', '', '01675061877'),
(10, 'Dr. Mofiz RMP', '', '01977027787'),
(11, 'Md. Babul', '', '01687782443'),
(12, 'Md. Parves', '', '01256445'),
(13, 'Md. Mobarak', '', '01564568'),
(14, 'Md. Selim', '', '015654596'),
(15, 'Md. Mohiuddin', '', '017135546'),
(16, 'Dr. Manik ', '', '0175546625'),
(17, 'Dr. Pobittro Bowmik', '', '01765456258'),
(18, 'Anik', '', ''),
(19, 'Anik', '', ''),
(20, 'Anik', '', ''),
(21, 'Anik', '', ''),
(22, 'Anik', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bank_acc_tbl`
--

CREATE TABLE IF NOT EXISTS `bank_acc_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ac_id` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_set`
--

CREATE TABLE IF NOT EXISTS `bank_set` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(65) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `bank_set`
--

INSERT INTO `bank_set` (`bank_id`, `bank_name`) VALUES
(1, 'Agrani Bank'),
(2, 'Sonali Bank'),
(3, 'Rupali Bank'),
(4, 'Janata Bank'),
(5, 'Uttara Bank Limited'),
(6, 'Mutual Trust Bank Limited'),
(7, 'Dhaka Bank'),
(8, 'Eastern Bank Limited'),
(9, 'Dutch Bangla Bank Limited'),
(10, 'Pubali Bank Limited'),
(11, 'IFIC Bank Limited'),
(12, 'National Bank Limited'),
(13, 'The City Bank Limited'),
(14, 'NCC Bank Limited'),
(15, 'Mercantile Bank Limited'),
(16, 'Prime Bank Limited'),
(17, 'Southeast Bank Limited'),
(18, 'Standard Bank Limited'),
(19, 'One Bank Limited'),
(20, 'Bangladesh Commerce Bank Limited'),
(21, 'The Premier Bank Limited'),
(22, 'Bank Asia Limited'),
(23, 'Trust Bank Limited'),
(24, 'Jamuna Bank Limited'),
(25, 'AB Bank Ltd'),
(26, 'NRB Commercial Bank Limited'),
(27, 'NRB Bank Limited'),
(28, 'Meghna Bank Limited'),
(29, 'Farmers Bank Limited'),
(30, 'Modhumoti Bank Limited'),
(31, 'South Bangla Agriculture and Commerce Bank Ltd'),
(32, 'Midland Bank Limited'),
(33, 'United Commercial Bank Ltd'),
(34, 'BRAC BANK LIMITED'),
(35, 'Islami Bank of Bangladesh Limited'),
(36, 'Shahjalal Imited'),
(37, 'First Security Islami Bank Limited'),
(38, 'Export Import Bank of Bangladesh Limited'),
(39, 'Al-Arafah Islami Bank Limited'),
(40, 'Social Islami Bank Limited'),
(41, 'ICB Islamic Bank'),
(42, 'Union Bank Limited'),
(43, 'Citibank NA'),
(44, 'HSBC'),
(45, 'Standard Chartered Bank'),
(46, 'Commercial Bank of Ceylon'),
(47, 'State Bank of India'),
(48, 'Habib Bank Limited'),
(49, 'National Bank of Pakistan'),
(50, 'Woori Bank'),
(51, 'Bank Alfalah'),
(52, 'Bangladesh Krishi Bank'),
(53, 'Rajshahi Krishi Unnayan Bank'),
(54, 'Bangladesh Development Bank Ltd'),
(55, 'BASIC Bank Limited'),
(56, 'Progoti Co-operative Land Development Bank Limited (progoti Bank)'),
(57, 'Uttara Finance and Investments Limited'),
(58, 'United Leasing Company Limited (ULCL)'),
(59, 'Union Capital Limited'),
(60, 'The UAE-Bangladesh Investment Co. Ltd'),
(61, 'Saudi-Bangladesh Industrial & Agricultural Investment Company Lim'),
(62, 'Reliance Finance Limited'),
(63, 'Prime Finance & Investment Ltd'),
(64, 'Premier Leasing & Finance Limited'),
(65, 'Phoenix Finance and Investments Limited'),
(66, 'People''s Leasing and Financial Services Ltd'),
(67, 'National Housing Finance and Investments Limited'),
(68, 'National Finance Ltd'),
(69, 'MIDAS Financing Ltd. (MFL)'),
(70, 'LankaBangla Finance Ltd.'),
(71, 'Islamic Finance and Investment Limited'),
(72, 'International Leasing and Financial Services Limited'),
(73, 'Infrastructure Development Company Limited (IDCOL)'),
(74, 'Industrial Promotion and Development Company of Bangladesh Limite'),
(75, 'Industrial and Infrastructure Development Finance Company (IIDFC)'),
(76, 'IDLC Finance Limited'),
(77, 'Hajj Finance Company Limited'),
(78, 'GSP Finance Company (Bangladesh) Limited (GSPB)'),
(79, 'First Lease Finance & Investment Ltd.'),
(80, 'FAS Finance & Investment Limited'),
(81, 'Fareast Finance & Investment Limited'),
(82, 'Delta Brac Housing Finance Corporation Ltd. (DBH)'),
(83, 'Bay Leasing & Investment Limited'),
(84, 'Bangladesh Industrial Finance Company Limited (BIFC)'),
(85, 'Bangladesh Finance & Investment Co. Ltd.'),
(86, 'Agrani SME Finance Co. Ltd.'),
(87, 'Premier Bank , Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `branch_set`
--

CREATE TABLE IF NOT EXISTS `branch_set` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(300) NOT NULL,
  `address` longtext NOT NULL,
  `bank_id` int(11) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cheque_repository_tbl`
--

CREATE TABLE IF NOT EXISTS `cheque_repository_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cheque_no` text NOT NULL,
  `cheque_date` date NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=not withdrow,1=withdraw',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `commission_domain`
--

CREATE TABLE IF NOT EXISTS `commission_domain` (
  `com_dom_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` int(11) NOT NULL,
  `total` text NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `commission` text NOT NULL,
  `uniqueToken` varchar(30) NOT NULL,
  PRIMARY KEY (`com_dom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `commission_type`
--

CREATE TABLE IF NOT EXISTS `commission_type` (
  `com_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `patient_rfrd` text NOT NULL,
  `uniqueToken` varchar(30) NOT NULL,
  PRIMARY KEY (`com_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE IF NOT EXISTS `company_info` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_name` text NOT NULL,
  `company_name` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_voucher`
--

CREATE TABLE IF NOT EXISTS `credit_voucher` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `vouch_no` text NOT NULL,
  `vouch_date` date NOT NULL,
  `vouch_time` time NOT NULL,
  `p_id` int(11) NOT NULL,
  `income_src` text NOT NULL,
  `pay_mode` tinyint(4) NOT NULL COMMENT '0=both,1=cash,2=cheque',
  `cash` decimal(12,2) NOT NULL,
  `cheque` decimal(12,2) NOT NULL,
  `cheque_no` text NOT NULL,
  `cheque_date` date NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `remarks` text NOT NULL,
  `userid` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `debit_voucher`
--

CREATE TABLE IF NOT EXISTS `debit_voucher` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `vouch_no` text NOT NULL,
  `vouch_date` date NOT NULL,
  `vouch_time` time NOT NULL,
  `eg_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `other_info` text NOT NULL,
  `pay_mode` tinyint(4) NOT NULL COMMENT '0=both,1=cash,2=cheque',
  `cash` decimal(12,2) NOT NULL,
  `cheque` decimal(12,2) NOT NULL,
  `cheque_no` text NOT NULL,
  `cheque_date` date NOT NULL,
  `b_id` int(11) NOT NULL,
  `ac_id` int(11) NOT NULL,
  `total` decimal(12,2) NOT NULL COMMENT 'total debit amount',
  `remarks` text NOT NULL,
  `userid` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `debit_voucher`
--

INSERT INTO `debit_voucher` (`id`, `vouch_no`, `vouch_date`, `vouch_time`, `eg_id`, `e_id`, `doc_id`, `st_id`, `other_info`, `pay_mode`, `cash`, `cheque`, `cheque_no`, `cheque_date`, `b_id`, `ac_id`, `total`, `remarks`, `userid`) VALUES
(5, 'cr14aj-0-0001', '2014-01-17', '12:30:35', 1, 0, 0, 0, '', 1, '123456.00', '0.00', '', '0000-00-00', 0, 0, '123456.00', '', '0'),
(6, 'cr14aj-0-0006', '2014-01-17', '12:33:29', 1, 0, 0, 0, '', 1, '123456789.00', '0.00', '', '0000-00-00', 0, 0, '123456789.00', '', '0'),
(7, 'cr14aj-0-0007', '2014-01-17', '12:58:15', 1, 0, 0, 0, '', 0, '2124.00', '22423.00', '2343', '2014-01-17', 1, 1, '24547.00', '', '0'),
(9, 'dr14aj--0008', '0000-00-00', '00:00:00', 1, 1, 0, 0, '0', 0, '100.00', '50.00', '12345', '0000-00-00', 1, 2, '150.00', 'yeeeeeeeehhhhhhhhhhhhhhhhhhhh', ''),
(10, 'dr14aj--00010', '2014-07-16', '13:11:44', 1, 1, 0, 0, '', 1, '30.00', '0.00', '', '0000-00-00', 0, -1, '30.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE IF NOT EXISTS `doctor_info` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_designation` varchar(300) NOT NULL,
  `doc_name` varchar(400) NOT NULL,
  `doc_phone_number` varchar(500) NOT NULL,
  `doc_qualification` text NOT NULL,
  `doc_address` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`doc_id`, `doc_designation`, `doc_name`, `doc_phone_number`, `doc_qualification`, `doc_address`, `image`) VALUES
(8, 'Asist. Prof.', 'Dr. Md. Nasirul Islam', '01720212508', 'FCPS, MD (Medicin)', '', ''),
(9, 'Consultant', 'Dr. S.M Ear-E Mahabub', '01711533177', 'MBBS, MD ', '', ''),
(10, 'Prof. ', 'Dr. M. Atahar Ali', '01711595770', 'MBBS, FCPS, MD', 'NICVD', ''),
(11, 'Prof.', 'Dr. A. H. M. Feroz', '01595687', 'MBBS, FCPS, MD (Medicine) ', '', ''),
(12, 'Consultant ', 'Dr. Parven Ahmed', '01819929161', 'MBBS, DGO, MCPS', '', ''),
(13, 'Assist. Prof.', 'Dr. Md. Mostafizur Rahman', '01852465', 'MBBS, MS (Uro)', '', ''),
(14, 'Consultant', 'Dr. Md. Hafizur Rahman', '01711149583', 'MBBS, PGT, CCD', '', ''),
(15, 'Assist. Prof. ', 'Dr. Tariq Hasan', '018123568', 'MBBS, Diploma In Pedi. ', '', ''),
(16, 'Consultant', 'Dr. A.K. Basak', '01713006841', 'MBBS, D. Ortho', '', ''),
(17, 'Assist. Prof.', 'Dr. M.A. Sabur', '01265555', 'MBBS, DLO (D. Uro)', '', ''),
(18, 'Consultant', 'Dr. Nazma Begum (Dolly)', '01783728484', 'MBBS, MCPS, DGO, CCD', '', ''),
(19, 'Consultant', 'Dr. Shafiul Azam', '01752125252', 'MBBS, DDV, TDS', '', ''),
(20, 'Consultant', 'Dr. Zakia Parven (Lipi)', '017176462525', 'MBBS, DGO', '', ''),
(21, 'Assist. Prof. ', 'Dr. Parul Akther', '01700000', 'MBBS, FCPS', '', ''),
(22, 'Assist. Prof.', 'Dr.Faruk Ahmed', '071710000', 'MBBS, FCPS', '', ''),
(23, 'Consultant ', 'Dr. A.B.M Zohirul Kadir Bhuyan', '071720014', 'MBBS, DLO', '', ''),
(24, 'Consultant ', 'Dr. Abdullah Al Mamun', '071545214', 'MBBS, DLO, MS', '', ''),
(25, 'Consultant ', 'Dr. Abdur Noor Sayem', '07154258', 'MBBS, BCS', '', ''),
(26, 'Consult.', 'Dr. Amol Kumar Roy', '07145654', 'MBBS FCPS', '', ''),
(27, 'Consult.Family', 'Dr. Ashis Kumar Day', '0714562', 'MBBS, FCPS CCD', '', ''),
(28, 'Consult.', 'Dr. Ashrafi Sharmin', '0714562', 'MBBS', '', ''),
(29, 'Consult.', 'Dr. Aysha Akther', '01654863', 'MBBS, MCPS(G)', '', ''),
(30, 'Consult. Family Medicine', 'Dr. Bhidhan Chan. Poddar', '07124521', 'MBBS, BCS, DCH(CD)', '', ''),
(31, 'Consult.', 'Dr. Ch. Iqbal Baher Shihab', '07145214', 'MBBS, BCS', '', ''),
(32, 'Consult. ENT', 'Dr. D G Akaiduzzaman', '07145', 'MBBS FCPS', '', ''),
(33, 'Consult.', 'Dr. Didar Imam', '07145', 'MBBS, MD', '', ''),
(34, 'Consult.', 'Dr. Dipa Islam', '07145', 'MBBS, MD, MS', '', ''),
(35, 'Consult.', 'Dr. Dipannita Dhar ', '07145', 'MBBS, BCS', '', ''),
(36, 'Quack', 'Dr. Dipok Chokro.', '0745621', 'RMP', '', ''),
(37, 'Quack', 'Dr. Emam Uddin Ahmed', '074362', 'RMP', '', ''),
(38, 'Consult. Orth.', 'Dr. F M Mahabubul Alom', '0746', 'MBBS, BCS MS', '', ''),
(39, 'Consult.', 'Dr. Farzana Sharmin', '452515', 'MBBS, BCS', '', ''),
(40, 'Consult.', 'Dr. Faruk Ahmed', '125541', 'MBBS', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `exp_grp`
--

CREATE TABLE IF NOT EXISTS `exp_grp` (
  `eg_id` int(11) NOT NULL AUTO_INCREMENT,
  `grp_name` varchar(65) NOT NULL,
  `description` text NOT NULL COMMENT 'expenditure Description',
  PRIMARY KEY (`eg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exp_set`
--

CREATE TABLE IF NOT EXISTS `exp_set` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(65) NOT NULL,
  `eg_id` int(11) NOT NULL COMMENT 'Expenditure Group ID',
  `description` longtext NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_group_domain_id` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `test_group_domain_id`, `group_name`) VALUES
(19, 6, 'BIOCHEMICAL REPORT'),
(20, 6, 'HEMATOLOGICAL REPORT'),
(21, 6, 'SEROLOGICAL REPORT'),
(22, 6, 'MICROBIOLOGY'),
(23, 6, 'STOOL'),
(24, 6, 'URINE'),
(25, 7, 'USG of Whole Abdomen'),
(26, 4, 'HORMONE'),
(27, 7, 'USG of Brain'),
(28, 7, 'USG of Brest'),
(29, 7, 'USG of HBS'),
(30, 7, 'USG of KUB'),
(31, 7, 'USG of Lower Abdomen'),
(32, 7, 'USG of Pregnancy'),
(33, 7, 'USG of Prostete'),
(34, 7, 'USG of Scrotum '),
(35, 7, 'USG of Testes'),
(36, 7, 'USG of Upper Abdomen'),
(37, 7, 'USG of Thyroid'),
(38, 2, 'ECG'),
(39, 3, 'ECHO'),
(40, 9, 'CHEST'),
(41, 6, 'Semen Analysis'),
(42, 9, 'X-Ray IVU'),
(43, 4, 'CANCER MARKER'),
(44, 9, 'CERVICAL SPINE'),
(45, 9, 'LUMBO-SACRAL SPINE'),
(46, 9, 'LUMBO-DORSAL SPINE'),
(47, 9, 'THORACIC SPINE'),
(48, 9, 'X-RAY PNS'),
(49, 9, 'PLAIN X-RAY ABDOMEN'),
(50, 9, 'X-RAY KUB'),
(51, 9, 'X-RAY SKULL'),
(52, 9, 'X-RAY BA-SWALLOW'),
(53, 9, 'X-RAY BA-ENEMA'),
(54, 9, 'X-RAY BA-MEAL'),
(55, 9, 'X-RAY BA-FOLLOW THROUGH'),
(56, 9, 'RETROGRADE CYSTOURETHROGRAM'),
(57, 6, 'M.T. Test'),
(58, 6, 'SKIN SCRAPINGS FOR FUNGUS'),
(59, 7, 'TVS'),
(60, 4, 'TUMOUR MARKER');

-- --------------------------------------------------------

--
-- Table structure for table `group_test`
--

CREATE TABLE IF NOT EXISTS `group_test` (
  `test_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `test_group_domain_id` int(11) NOT NULL,
  `test_name` varchar(150) NOT NULL,
  `show_result` int(2) NOT NULL,
  `patho_address` text NOT NULL,
  `test_price` decimal(12,2) NOT NULL,
  `test_unit` varchar(500) NOT NULL,
  `test_normal_range` varchar(500) NOT NULL,
  `test_default_result` varchar(200) NOT NULL,
  PRIMARY KEY (`test_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=331 ;

--
-- Dumping data for table `group_test`
--

INSERT INTO `group_test` (`test_group_id`, `group_id`, `test_group_domain_id`, `test_name`, `show_result`, `patho_address`, `test_price`, `test_unit`, `test_normal_range`, `test_default_result`) VALUES
(189, 19, 6, 'Random Blood Sugar ', 1, '', '100.00', 'mmol/L', '3.5-7.8 mmol/L', ''),
(190, 19, 6, 'Creatinine', 0, '', '300.00', 'mg/dl.', 'Male: 0.7-1.4, Female: 0.6-1.2 mg/dl.', ''),
(191, 19, 6, 'Fasting Blood Sugar', 0, '', '100.00', 'mmol/L', '2.5-5.5 mmol/L', ''),
(192, 19, 6, '2hrs ABF', 0, '', '100.00', 'mmol/L', '2.0-6.5 mmol/L', ''),
(193, 19, 6, 'Bilirubin (Total)', 0, '', '200.00', 'mg/dl', '1.0', ''),
(194, 19, 6, 'SGPT', 0, '', '300.00', 'U/L', '36 U/L', ''),
(195, 19, 6, 'SGOT', 0, '', '300.00', 'U/L', '36 U/L', ''),
(196, 19, 6, 'Lipid Profile', 0, '', '900.00', '', '', ''),
(197, 19, 6, 'Electrolytes', 0, '', '800.00', '', '', ''),
(198, 19, 6, 'Urea', 0, '', '300.00', 'mg/dl', '15-45 mg/dl', ''),
(199, 19, 6, 'Uric Acid', 0, '', '300.00', '', '', ''),
(200, 19, 6, 'Calcium', 0, '', '300.00', '', '', ''),
(201, 20, 6, 'CP', 1, '', '300.00', '', '', ''),
(202, 20, 6, 'CBC', 0, '', '400.00', '', '', ''),
(203, 20, 6, 'Platelet Count', 0, '', '100.00', '', '', ''),
(204, 20, 6, 'MP', 1, '', '100.00', '', '', ''),
(205, 20, 6, 'CE Count', 1, '', '100.00', '', '', ''),
(206, 20, 6, 'BT,CT', 1, '', '200.00', '', '', ''),
(207, 20, 6, 'Blood Film', 1, '', '100.00', '', '', ''),
(208, 19, 6, 'GTT', 1, '', '300.00', '', '', ''),
(209, 19, 6, '2hrs 75 gm Glucuse', 1, '', '100.00', 'mmol/L', '6.5-8.5 mmol/L', ''),
(210, 19, 6, 'Alk Phosphatase', 1, '', '300.00', 'U/L', '42 U/L', ''),
(211, 19, 6, 'Amylase', 1, '', '700.00', '', '', ''),
(212, 19, 6, 'Cholesterol', 1, '', '300.00', '', '', ''),
(213, 19, 6, 'Iron', 1, '', '300.00', '', '', ''),
(214, 20, 6, 'Reticulocyte Count', 1, '', '100.00', '', '', ''),
(215, 21, 6, 'HBsAg (ELISA)', 1, '', '500.00', '', '', ''),
(216, 21, 6, 'HBsAg (S)', 0, '', '500.00', '', '', ''),
(217, 21, 6, 'HBeAg', 1, '', '500.00', '', '', ''),
(218, 21, 6, 'Widal Test', 0, '', '400.00', '', '', ''),
(219, 21, 6, 'ASO Titer', 1, '', '400.00', '', '', ''),
(220, 21, 6, 'Febrile Antigen', 1, '', '800.00', '', '', ''),
(221, 21, 6, 'R.A. Test', 1, '', '400.00', '', '', ''),
(222, 21, 6, 'Rose Waaler Test', 1, '', '400.00', '', '', ''),
(223, 21, 6, 'CRP', 1, '', '400.00', '', '', ''),
(224, 21, 6, 'VDRL Q/Q', 1, '', '600.00', '', '', ''),
(225, 21, 6, 'VDRL', 1, '', '300.00', '', '', ''),
(226, 21, 6, 'TPHA', 1, '', '700.00', '', '', ''),
(227, 21, 6, 'Blood Group & Rh Factor', 1, '', '150.00', '', '', ''),
(228, 21, 6, 'ICT Filaria', 1, '', '800.00', '', '', ''),
(229, 21, 6, 'ICT Malaria', 0, '', '800.00', '', '', ''),
(230, 21, 6, 'ICT Kala-azar', 1, '', '800.00', '', '', ''),
(231, 22, 6, 'Blood for C/S', 1, '', '800.00', '', '', ''),
(232, 22, 6, 'Throat Swab for RE', 1, '', '300.00', '', '', ''),
(233, 22, 6, 'Throat Swab for C/S', 1, '', '400.00', '', '', ''),
(234, 22, 6, 'Sputum RE', 1, '', '200.00', '', '', ''),
(235, 22, 6, 'Sputum C/S', 0, '', '400.00', '', '', ''),
(236, 22, 6, 'Sputum AFB', 1, '', '200.00', '', '', ''),
(237, 22, 6, 'Sputum Gram Stain', 1, '', '200.00', '', '', ''),
(238, 22, 6, 'HVS RE', 1, '', '300.00', '', '', ''),
(239, 22, 6, 'HVS C/S', 1, '', '400.00', '', '', ''),
(240, 22, 6, 'HVS Gram Stain', 1, '', '300.00', '', '', ''),
(241, 22, 6, 'Wound Swab for C/S', 1, '', '400.00', '', '', ''),
(242, 22, 6, 'Wound Swab for RE', 1, '', '300.00', '', '', ''),
(243, 22, 6, 'Aural Swab for C/S', 1, '', '400.00', '', '', ''),
(244, 22, 6, 'Aural Swab for RE', 1, '', '300.00', '', '', ''),
(245, 22, 6, 'P/S for RE', 1, '', '300.00', '', '', ''),
(246, 22, 6, 'P/S for C/S', 1, '', '400.00', '', '', ''),
(247, 24, 6, 'RE', 1, '', '150.00', '', '', ''),
(248, 24, 6, 'C/S', 1, '', '400.00', '', '', ''),
(249, 24, 6, 'Pregnancy Test', 1, '', '200.00', '', '', ''),
(250, 24, 6, '24 Hrs. Total Protein/Calcium', 1, '', '400.00', '', '', ''),
(251, 23, 6, 'CS', 1, '', '150.00', '', '', ''),
(252, 23, 6, 'OBT', 1, '', '100.00', '', '', ''),
(253, 24, 6, 'RS', 1, '', '100.00', '', '', ''),
(254, 25, 7, 'USG of Whole Abdomen', 1, 'H.B.S:<div>There is no ascites. LIVER: Liver is normal in size with homogenous parenchymal echo pattern. No focal leson</div>', '1000.00', '', '', ''),
(255, 26, 4, 'TSH', 1, '', '700.00', '', '', ''),
(256, 26, 4, 'FSH', 1, '', '1000.00', '', '', ''),
(257, 26, 4, 'FT4', 1, '', '1000.00', '', '', ''),
(258, 26, 4, 'FT3', 1, '', '1000.00', '', '', ''),
(259, 26, 4, 'T3', 1, '', '700.00', '', '', ''),
(260, 26, 4, 'T4', 1, '', '700.00', '', '', ''),
(261, 26, 4, 'Prolactin', 1, '', '1000.00', '', '', ''),
(262, 26, 4, 'LH', 1, '', '1000.00', '', '', ''),
(263, 26, 4, 'Progesterone', 1, '', '1000.00', '', '', ''),
(264, 26, 4, 'Testosterone', 1, '', '1000.00', '', '', ''),
(265, 26, 4, 'Anti HBs Ab', 1, '', '1000.00', '', '', ''),
(266, 26, 4, 'Anti HCV', 1, '', '1000.00', '', '', ''),
(267, 26, 4, 'Anti HAV-IgM', 1, '', '1000.00', '', '', ''),
(268, 26, 4, 'Anti HBC- IgG', 1, '', '1000.00', '', '', ''),
(269, 26, 4, 'Anti HBc-IgM', 1, '', '1000.00', '', '', ''),
(270, 26, 4, 'anti HEV-IgM', 1, '', '1000.00', '', '', ''),
(271, 26, 4, 'B-HCG', 1, '', '1000.00', '', '', ''),
(272, 26, 4, 'PSA', 1, '', '1000.00', '', '', ''),
(273, 27, 7, 'USG of Brain', 1, '', '800.00', '', '', ''),
(274, 28, 7, 'USG of Lt. Brest', 1, '', '800.00', '', '', ''),
(275, 28, 7, 'USG of Rt. Brest', 1, '', '800.00', '', '', ''),
(276, 28, 7, 'USG of Both Brest', 1, '', '1000.00', '', '', ''),
(277, 29, 7, 'USG of HBS', 1, '', '800.00', '', '', ''),
(278, 30, 7, 'USG of KUB', 1, '', '800.00', '', '', ''),
(279, 31, 7, 'USG of Lower Abdomen', 1, '', '800.00', '', '', ''),
(280, 32, 7, 'USG of Pregnancy', 1, '', '800.00', '', '', ''),
(281, 33, 7, 'USG of Prostete', 1, '', '800.00', '', '', ''),
(282, 34, 7, 'USG of Scrotum', 1, '', '800.00', '', '', ''),
(283, 36, 7, 'USG of Upper Abdomen', 1, '', '800.00', '', '', ''),
(284, 37, 7, 'USG of Thyroid', 1, '', '800.00', '', '', ''),
(285, 38, 2, 'ECG', 1, '', '250.00', '', '', ''),
(286, 39, 3, 'ECHO', 1, '', '1200.00', '', '', ''),
(287, 39, 3, 'Endoscopy', 1, '', '1200.00', '', '', ''),
(288, 40, 9, 'Chest P/A View', 1, '', '350.00', '', '', ''),
(289, 40, 9, 'Lt. Lateral View ', 1, '', '350.00', '', '', ''),
(290, 40, 9, 'Rt. Lateral View ', 1, '', '350.00', '', '', ''),
(291, 40, 9, 'Rt. Oblique View', 1, '', '350.00', '', '', ''),
(292, 40, 9, 'Lt. Oblique View', 1, '', '350.00', '', '', ''),
(293, 42, 9, 'IVU', 1, '', '1500.00', '', '', ''),
(294, 41, 6, 'Semen Analysis', 1, '', '400.00', '', '', ''),
(295, 43, 4, 'CA- 15-3', 1, '', '1000.00', '', '', ''),
(296, 43, 4, 'CA- 19-9', 1, '', '1000.00', '', '', ''),
(297, 43, 4, 'CA- 125', 1, '', '1000.00', '', '', ''),
(298, 43, 4, 'CEA', 1, '', '1000.00', '', '', ''),
(299, 60, 4, 'Alfa Feto Protein ', 1, '', '1000.00', '', '', ''),
(300, 44, 9, 'Cervical Spine B/V', 1, '', '600.00', '', '', ''),
(301, 44, 9, 'Cervical Spine A/P View', 1, '', '350.00', '', '', ''),
(302, 44, 9, 'Cervical Spine Lat. View', 1, '', '350.00', '', '', ''),
(303, 44, 9, 'Cervical Spine Oblique View', 1, '', '350.00', '', '', ''),
(304, 45, 9, 'L/S Spine B/V ', 1, '', '600.00', '', '', ''),
(305, 45, 9, 'L/S Spine A/P View', 1, '', '350.00', '', '', ''),
(306, 45, 9, 'L/S Spine Lat. View', 1, '', '350.00', '', '', ''),
(307, 45, 9, 'L/S Spine Oblique View', 1, '', '350.00', '', '', ''),
(308, 46, 9, 'Lumbo-Dorsal Spine B/V', 1, '', '600.00', '', '', ''),
(309, 47, 9, 'Thoracic Spine B/V', 1, '', '600.00', '', '', ''),
(310, 47, 9, 'Thoracic Spine A/P View', 1, '', '350.00', '', '', ''),
(311, 47, 9, 'Thoracic Spine Lat. View', 1, '', '350.00', '', '', ''),
(312, 48, 9, 'PNS', 1, '', '350.00', '', '', ''),
(313, 48, 9, 'PNS OM View', 0, '', '350.00', '', '', ''),
(314, 48, 9, 'PNS Lat. View', 0, '', '350.00', '', '', ''),
(315, 49, 9, 'Abdomen (Big)', 1, '', '600.00', '', '', ''),
(316, 49, 9, 'Abdomen E/P', 1, '', '350.00', '', '', ''),
(317, 50, 9, 'X-Ray KUB', 1, '', '350.00', '', '', ''),
(318, 50, 9, 'X-Ray KUB Big', 1, '', '600.00', '', '', ''),
(319, 51, 9, 'Skull B/V', 1, '', '600.00', '', '', ''),
(320, 51, 9, 'Skull Lat. View', 1, '', '350.00', '', '', ''),
(321, 51, 9, 'Skull A/P View', 1, '', '350.00', '', '', ''),
(322, 35, 7, 'USG of Testes', 1, '', '800.00', '', '', ''),
(323, 52, 9, 'Ba- Swallow', 1, '', '1200.00', '', '', ''),
(324, 53, 9, 'Ba- Enema', 1, '', '1200.00', '', '', ''),
(325, 54, 9, 'Ba-Meal', 1, '', '1100.00', '', '', ''),
(326, 55, 9, 'Ba-Follow Through', 1, '', '1200.00', '', '', ''),
(327, 56, 9, 'X-Ray Retrograde', 1, '', '1500.00', '', '', ''),
(328, 57, 6, 'M.T. Test', 1, '', '300.00', '', '', ''),
(329, 58, 6, 'Skin Scraping For Fungus', 1, '', '300.00', '', '', ''),
(330, 59, 7, 'TVS', 1, '', '800.00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_acc_tbl`
--

CREATE TABLE IF NOT EXISTS `master_acc_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cash_in_hand` decimal(12,2) NOT NULL,
  `cheque_in_hand` decimal(12,2) NOT NULL,
  `cash_at_bank` decimal(12,2) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `master_acc_tbl`
--

INSERT INTO `master_acc_tbl` (`id`, `date`, `cash_in_hand`, `cheque_in_hand`, `cash_at_bank`, `total`, `time`) VALUES
(26, '2014-09-17', '100.00', '0.00', '0.00', '100.00', '00:00:00'),
(27, '2014-09-22', '2800.00', '0.00', '0.00', '2800.00', '08:05:00'),
(28, '2014-09-24', '2800.00', '0.00', '0.00', '2800.00', '00:00:00'),
(29, '2014-09-25', '3000.00', '0.00', '0.00', '3000.00', '10:05:00'),
(30, '2014-10-04', '3100.00', '0.00', '0.00', '3100.00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_due_tbl`
--

CREATE TABLE IF NOT EXISTS `patient_due_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `p_id` int(11) NOT NULL,
  `due` decimal(12,2) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `patient_due_tbl`
--

INSERT INTO `patient_due_tbl` (`id`, `date`, `p_id`, `due`, `time`) VALUES
(1, '2014-09-17', 3, '1000.00', '00:00:00'),
(2, '2014-09-22', 4, '0.00', '08:05:00'),
(3, '2014-09-22', 5, '0.00', '00:00:00'),
(4, '2014-09-22', 6, '2000.00', '20:25:00'),
(5, '2014-09-22', 7, '2300.00', '00:00:00'),
(6, '2014-09-22', 8, '1000.00', '00:00:00'),
(7, '2014-09-22', 9, '2050.00', '00:00:00'),
(8, '2014-09-22', 10, '2800.00', '00:00:00'),
(9, '2014-09-22', 11, '3200.00', '00:00:00'),
(10, '2014-09-22', 12, '2800.00', '00:00:00'),
(11, '2014-09-22', 12, '0.00', '00:00:00'),
(12, '2014-09-24', 14, '1750.00', '00:00:00'),
(13, '2014-09-25', 15, '600.00', '10:05:00'),
(14, '2014-10-04', 16, '500.00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE IF NOT EXISTS `patient_info` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(300) NOT NULL,
  `patient_sex` varchar(50) NOT NULL,
  `patient_age` varchar(50) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_result_update`
--

CREATE TABLE IF NOT EXISTS `patient_result_update` (
  `pat_res_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_test_id` int(11) NOT NULL,
  `result` varchar(500) NOT NULL,
  `info` text NOT NULL,
  `isCompleted` int(2) NOT NULL,
  PRIMARY KEY (`pat_res_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `patient_result_update`
--

INSERT INTO `patient_result_update` (`pat_res_id`, `patient_id`, `group_id`, `group_test_id`, `result`, `info`, `isCompleted`) VALUES
(15, 3, 19, 189, '5.9', '', 0),
(16, 3, 19, 190, '2.1', '', 0),
(17, 3, 19, 194, '48', '', 0),
(18, 3, 19, 192, '6.7', '', 0),
(19, 3, 19, 191, '5.3', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_doctor`
--

CREATE TABLE IF NOT EXISTS `register_doctor` (
  `reg_doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_doc_designation` varchar(300) NOT NULL,
  `reg_doc_name` varchar(200) NOT NULL,
  `reg_doc_qualification` text NOT NULL,
  `reg_doc_address` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `reg_doc_phn` text NOT NULL,
  PRIMARY KEY (`reg_doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1007 ;

--
-- Dumping data for table `register_doctor`
--

INSERT INTO `register_doctor` (`reg_doc_id`, `reg_doc_designation`, `reg_doc_name`, `reg_doc_qualification`, `reg_doc_address`, `image`, `reg_doc_phn`) VALUES
(1003, 'Assoc. Prof.', 'Dr. A.H.M. Omar Farooque', 'MBBS, M.Phil (Path)', 'H.F.R.M.C. Dhaka', '', '01673565034'),
(1004, 'Prof. ', 'Dr. Manindra Nath Roy', 'MBBS, M. Phil, MD (Clin. Bioch)', 'Prof. of Biochemistry Sir Salimullah Medical College And Mitford Hospital Dhaka.', '', '01716545669'),
(1005, 'Assist. Prof.', 'Dr. Nazibur Rahman ', 'MBBS, M. Phil (Path)', 'Department of Pathology\r\nDhaka Medical College Hospital, Dhaha.', '', '01556746655'),
(1006, 'Consultant.', 'Dr. Shafiul Azam', 'MBBS, DMRD, MD (R&I)', 'Trained Consultant (Radiology)\r\nDep. of Radiology & Imaging.\r\n300 Bad Hospital, Narayanganj.', '', '0176422364');

-- --------------------------------------------------------

--
-- Table structure for table `register_staff`
--

CREATE TABLE IF NOT EXISTS `register_staff` (
  `reg_staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_staff_name` varchar(300) NOT NULL,
  `reg_staff_designation` varchar(300) NOT NULL,
  `reg_staff_address` text NOT NULL,
  `reg_staff_phn` text NOT NULL,
  PRIMARY KEY (`reg_staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `req_commission`
--

CREATE TABLE IF NOT EXISTS `req_commission` (
  `req_commission_id` int(11) NOT NULL AUTO_INCREMENT,
  `req_investigation_id` int(11) NOT NULL,
  `uniqueToken` varchar(30) NOT NULL,
  PRIMARY KEY (`req_commission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `req_hierarchy`
--

CREATE TABLE IF NOT EXISTS `req_hierarchy` (
  `hierarchy_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(11) NOT NULL,
  `sub_category` int(11) NOT NULL,
  PRIMARY KEY (`hierarchy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `req_hierarchy`
--

INSERT INTO `req_hierarchy` (`hierarchy_id`, `category`, `sub_category`) VALUES
(1, 'm', 1),
(2, 'm', 2),
(3, '2', 3),
(4, '2', 4),
(5, 'm', 5),
(37, 'm', 15),
(38, '37', 16),
(40, '37', 18),
(41, '37', 19),
(42, '37', 20),
(43, '37', 21),
(44, '37', 22),
(45, '37', 23),
(46, '37', 24),
(47, '37', 25),
(48, '37', 26),
(49, '37', 27),
(50, '37', 28),
(51, '37', 29),
(52, '37', 30),
(53, '37', 31),
(54, 'm', 32),
(55, 'm', 33),
(56, 'm', 34),
(57, 'm', 35),
(58, 'm', 36),
(59, 'm', 37),
(60, 'm', 38),
(61, 'm', 39),
(64, 'm', 42),
(65, '61', 43),
(66, '61', 44),
(67, 'm', 45),
(68, '67', 46),
(69, '67', 47),
(70, '61', 48),
(71, '61', 49),
(72, '37', 50),
(73, 'm', 51),
(74, 'm', 52),
(75, 'm', 53),
(76, 'm', 54),
(77, '76', 55),
(79, 'm', 57),
(82, 'm', 60),
(84, 'm', 62),
(85, 'm', 63),
(86, 'm', 64),
(87, 'm', 65),
(88, 'm', 66),
(89, 'm', 67),
(90, 'm', 68),
(91, 'm', 69),
(92, 'm', 70),
(93, 'm', 71),
(94, '93', 72),
(95, '93', 73),
(96, 'm', 74),
(97, '96', 75),
(98, '96', 76),
(99, '96', 77);

-- --------------------------------------------------------

--
-- Table structure for table `req_investigation`
--

CREATE TABLE IF NOT EXISTS `req_investigation` (
  `rq_invstigation_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` text NOT NULL,
  `patient_sex` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `p_mobile` varchar(100) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `agt_name` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `entry_date` date NOT NULL,
  `entry_time` time NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `grand_total` float NOT NULL,
  `advance` decimal(12,2) NOT NULL,
  `due` decimal(12,2) NOT NULL,
  `less` decimal(12,2) NOT NULL,
  `vat` decimal(12,2) NOT NULL,
  `patient_rfrd` text NOT NULL,
  `random_number` bigint(20) NOT NULL,
  `isdelivered` int(2) NOT NULL,
  PRIMARY KEY (`rq_invstigation_id`),
  UNIQUE KEY `rq_invstigation_id` (`rq_invstigation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `req_investigation`
--

INSERT INTO `req_investigation` (`rq_invstigation_id`, `p_name`, `patient_sex`, `age`, `p_mobile`, `doc_id`, `agt_name`, `date`, `time`, `entry_date`, `entry_time`, `total`, `grand_total`, `advance`, `due`, `less`, `vat`, `patient_rfrd`, `random_number`, `isdelivered`) VALUES
(3, 'Md. Faysal Ahmed', 'Male', 32, '01919122300', 8, 0, '2014-09-17', '00:00:00', '2014-09-17', '17:54:35', '-100.00', -100, '0.00', '-100.00', '0.00', '0.00', 'refered', 31246334232, 0),
(4, 'Md.Anowar Hossain', 'Male', 27, '01911159518', 9, 12, '2014-09-22', '08:05:00', '2014-09-22', '13:00:23', '-2200.00', -2200, '800.00', '-3000.00', '0.00', '0.00', 'refered', 11276689716, 0),
(5, 'Md.Nuruddin Ahmed Akash', 'Male', 30, '01915762145', 9, 11, '2014-09-22', '00:00:00', '2014-09-22', '13:06:38', '550.00', 550, '550.00', '0.00', '0.00', '0.00', 'NCT', 67964636442, 0),
(6, 'Mr. Faysal Ahmed', 'Male', 32, '01919122300', 8, 11, '2014-09-23', '20:25:00', '2014-09-22', '15:47:40', '2250.00', 2250, '250.00', '2000.00', '0.00', '0.00', 'CFT', 10988765897, 0),
(7, 'Md. Shahin', 'Male', 22, '0175545665', 11, 12, '2014-09-22', '00:00:00', '2014-09-22', '15:56:13', '2300.00', 2000, '0.00', '2300.00', '300.00', '0.00', 'refered', 34124756033, 0),
(8, 'Md. Amin', 'Male', 24, '0167554565', 26, 0, '2014-09-23', '00:00:00', '2014-09-22', '16:02:35', '2450.00', 2000, '1000.00', '1000.00', '450.00', '0.00', 'refered', 17278127829, 0),
(9, 'Ayesha', 'Male', 20, '01647852544', 29, 0, '2014-09-23', '00:00:00', '2014-09-22', '16:04:27', '2050.00', 2000, '0.00', '2050.00', '50.00', '0.00', 'NCT', 25639419857, 0),
(10, 'Md. Jamal', 'Male', 20, '0155765464', 37, 15, '2014-09-23', '00:00:00', '2014-09-22', '19:13:44', '2800.00', 2600, '0.00', '2800.00', '200.00', '0.00', 'CFT', 13221902196, 0),
(11, 'Md. Hamidur Rahman', 'Male', 52, '017554565425', 9, 0, '2014-09-22', '00:00:00', '2014-09-22', '19:16:19', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 'NCT', 19155681408, 0),
(12, 'Md. Ashraf Ali', 'Male', 30, '01765456252', 9, 0, '2014-09-22', '00:00:00', '2014-09-22', '19:30:05', '2850.00', 2850, '50.00', '2800.00', '0.00', '0.00', 'refered', 25118248956, 0),
(13, 'Md. Ashraf Ali', 'Male', 30, '01765456252', 9, 0, '2014-09-22', '00:00:00', '2014-09-22', '19:30:07', '2850.00', 2850, '50.00', '2800.00', '0.00', '0.00', 'refered', 25118248956, 0),
(14, 'Md. Babul ', 'Male', 42, '01647522325', 28, 0, '2014-09-24', '00:00:00', '2014-09-24', '16:03:02', '1750.00', 1700, '0.00', '1750.00', '50.00', '0.00', 'refered', 37853168174, 0),
(15, 'Maruf Rahman', 'Male', 26, '01670617942', 11, 0, '2014-09-25', '10:05:00', '2014-09-25', '10:08:03', '1500.00', 1500, '200.00', '1300.00', '0.00', '0.00', 'refered', 15069726876, 0),
(16, 'Md. Rana Ahmed', 'Male', 28, '01574663122', 24, 10, '2014-10-04', '00:00:00', '2014-10-04', '11:58:13', '600.00', 600, '100.00', '500.00', '0.00', '0.00', 'CFT', 67418041551, 0);

-- --------------------------------------------------------

--
-- Table structure for table `req_investigation_test`
--

CREATE TABLE IF NOT EXISTS `req_investigation_test` (
  `req_investigation_test_id` int(11) NOT NULL AUTO_INCREMENT,
  `req_investigation_id` int(11) NOT NULL,
  `random_number` bigint(20) NOT NULL,
  `test_group_domain_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `test_name` int(11) NOT NULL,
  `test_price` decimal(12,2) NOT NULL,
  `isCompleted` int(2) NOT NULL,
  `result` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`req_investigation_test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=332 ;

--
-- Dumping data for table `req_investigation_test`
--

INSERT INTO `req_investigation_test` (`req_investigation_test_id`, `req_investigation_id`, `random_number`, `test_group_domain_id`, `group_id`, `test_name`, `test_price`, `isCompleted`, `result`, `price`) VALUES
(272, 5, 67964636442, 6, 19, 212, '300.00', 0, '', ''),
(273, 5, 67964636442, 6, 20, 203, '100.00', 0, '', ''),
(274, 5, 67964636442, 6, 24, 247, '150.00', 0, '', ''),
(275, 6, 10988765897, 6, 19, 189, '100.00', 0, '', ''),
(276, 6, 10988765897, 6, 19, 193, '200.00', 0, '', ''),
(277, 6, 10988765897, 6, 20, 201, '300.00', 0, '', ''),
(278, 6, 10988765897, 6, 20, 203, '100.00', 0, '', ''),
(279, 6, 10988765897, 7, 25, 254, '1000.00', 0, '', ''),
(280, 6, 10988765897, 6, 24, 247, '150.00', 0, '', ''),
(281, 6, 10988765897, 6, 24, 248, '400.00', 0, '', ''),
(282, 7, 34124756033, 6, 20, 201, '300.00', 0, '', ''),
(283, 7, 34124756033, 6, 19, 208, '300.00', 0, '', ''),
(284, 7, 34124756033, 4, 26, 255, '700.00', 0, '', ''),
(285, 7, 34124756033, 4, 26, 264, '1000.00', 0, '', ''),
(286, 8, 17278127829, 6, 19, 189, '100.00', 0, '', ''),
(287, 8, 17278127829, 6, 19, 196, '900.00', 0, '', ''),
(288, 8, 17278127829, 6, 21, 215, '500.00', 0, '', ''),
(289, 8, 17278127829, 6, 21, 227, '150.00', 0, '', ''),
(290, 8, 17278127829, 7, 34, 282, '800.00', 0, '', ''),
(291, 9, 25639419857, 6, 20, 201, '300.00', 0, '', ''),
(292, 9, 25639419857, 6, 19, 208, '300.00', 0, '', ''),
(293, 9, 25639419857, 6, 21, 215, '500.00', 0, '', ''),
(294, 9, 25639419857, 6, 21, 227, '150.00', 0, '', ''),
(295, 9, 25639419857, 7, 32, 280, '800.00', 0, '', ''),
(296, 10, 13221902196, 6, 19, 189, '100.00', 0, '', ''),
(297, 10, 13221902196, 6, 19, 190, '300.00', 0, '', ''),
(298, 10, 13221902196, 6, 19, 197, '800.00', 0, '', ''),
(299, 10, 13221902196, 7, 25, 254, '1000.00', 0, '', ''),
(300, 10, 13221902196, 9, 51, 319, '600.00', 0, '', ''),
(301, 11, 19155681408, 6, 21, 215, '500.00', 0, '', ''),
(302, 11, 19155681408, 6, 21, 220, '800.00', 0, '', ''),
(303, 11, 19155681408, 6, 21, 225, '300.00', 0, '', ''),
(304, 11, 19155681408, 4, 26, 264, '1000.00', 0, '', ''),
(305, 11, 19155681408, 9, 44, 300, '600.00', 0, '', ''),
(306, 12, 25118248956, 6, 19, 189, '100.00', 0, '', ''),
(307, 12, 25118248956, 6, 19, 190, '300.00', 0, '', ''),
(308, 12, 25118248956, 6, 19, 194, '300.00', 0, '', ''),
(309, 12, 25118248956, 6, 19, 196, '900.00', 0, '', ''),
(310, 12, 25118248956, 6, 21, 215, '500.00', 0, '', ''),
(311, 12, 25118248956, 6, 21, 227, '150.00', 0, '', ''),
(312, 12, 25118248956, 2, 38, 285, '250.00', 0, '', ''),
(313, 12, 25118248956, 9, 48, 313, '350.00', 0, '', ''),
(314, 12, 25118248956, 6, 19, 189, '100.00', 0, '', ''),
(315, 12, 25118248956, 6, 19, 190, '300.00', 0, '', ''),
(316, 12, 25118248956, 6, 19, 194, '300.00', 0, '', ''),
(317, 12, 25118248956, 6, 19, 196, '900.00', 0, '', ''),
(318, 12, 25118248956, 6, 21, 215, '500.00', 0, '', ''),
(319, 12, 25118248956, 6, 21, 227, '150.00', 0, '', ''),
(320, 12, 25118248956, 2, 38, 285, '250.00', 0, '', ''),
(321, 12, 25118248956, 9, 48, 313, '350.00', 0, '', ''),
(322, 14, 37853168174, 6, 20, 202, '400.00', 0, '', ''),
(323, 14, 37853168174, 6, 21, 215, '500.00', 0, '', ''),
(324, 14, 37853168174, 6, 21, 226, '700.00', 0, '', ''),
(325, 14, 37853168174, 6, 23, 251, '150.00', 0, '', ''),
(326, 15, 15069726876, 6, 19, 197, '800.00', 0, '', ''),
(327, 15, 15069726876, 9, 44, 300, '600.00', 0, '', ''),
(328, 15, 15069726876, 6, 19, 189, '100.00', 0, '', ''),
(329, 16, 67418041551, 6, 19, 189, '100.00', 0, '', ''),
(330, 16, 67418041551, 6, 19, 190, '300.00', 0, '', ''),
(331, 16, 67418041551, 6, 19, 193, '200.00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `req_modules`
--

CREATE TABLE IF NOT EXISTS `req_modules` (
  `moduleid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'module id',
  `name` text NOT NULL,
  `page_caption` text NOT NULL,
  `page_link` text NOT NULL,
  `is_report` int(2) NOT NULL COMMENT '1=report,0=form',
  `is_main` int(2) NOT NULL COMMENT '1=main,0=sub',
  `icon` varchar(300) NOT NULL,
  `show` int(2) NOT NULL COMMENT '1=show,0=hide',
  PRIMARY KEY (`moduleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `req_modules`
--

INSERT INTO `req_modules` (`moduleid`, `name`, `page_caption`, `page_link`, `is_report`, `is_main`, `icon`, `show`) VALUES
(1, 'Dashboard', 'Welcome to the administrative control panel !!!', 'home', 0, 0, 'icon-home', 0),
(2, 'User Management', '', '#', 0, 0, 'icon-fullscreen', 0),
(3, 'User and Permission', 'The smaller the function, the greater the management.', 'user_management', 0, 0, 'icon-group', 0),
(4, 'Module Entry', '', 'module_entry', 0, 0, 'icon-barcode', 0),
(57, 'Refered Doctor Information', '', 'doctor_information', 0, 0, '', 0),
(60, 'Registered Doctor Info', '', 'reg_doc_info', 0, 0, '', 0),
(62, 'Patient Information', '', 'patient_inf', 0, 0, '', 0),
(63, 'Patient Report', '', 'patient_report', 0, 0, '', 0),
(64, 'Patient report Delivery', '', 'report_delivery', 0, 0, '', 0),
(65, 'Pathology Setup', '', 'pathology_setup', 0, 0, '', 0),
(67, 'Request Investigation', '', 'req_investigation', 0, 0, '', 0),
(68, 'Commission', '', 'commission', 0, 0, '', 0),
(69, 'Collection Report', '', 'collection_report', 0, 0, '', 0),
(70, 'Vat', '', 'vat_entry', 0, 0, '', 0),
(71, 'Voucher', '', '#', 0, 0, '', 0),
(72, 'Credit Voucher', '', 'credit_voucher', 0, 0, '', 0),
(73, 'Debit Voucher', '', 'debit_voucher', 0, 0, '', 0),
(74, 'Report', '', '#', 0, 0, '', 0),
(75, 'Report Summary', '', 'report_summary', 0, 0, '', 0),
(76, 'Expenditure Report', '', 'expenditure_report', 0, 0, '', 0),
(77, 'Monthly Report', '', 'monthly_report', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `req_role`
--

CREATE TABLE IF NOT EXISTS `req_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(110) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `req_role`
--

INSERT INTO `req_role` (`role_id`, `role_name`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Executive');

-- --------------------------------------------------------

--
-- Table structure for table `req_user_admin`
--

CREATE TABLE IF NOT EXISTS `req_user_admin` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `userdate` date NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `req_user_admin`
--

INSERT INTO `req_user_admin` (`userid`, `username`, `email`, `role`, `password`, `userdate`, `image`) VALUES
(0, 'iQuantile', 'iQuantile', '1', 'e10adc3949ba59abbe56e057f20f883e', '2013-09-09', '201405280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `req_usr_module`
--

CREATE TABLE IF NOT EXISTS `req_usr_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `moduleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `accesslevel` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=451 ;

--
-- Dumping data for table `req_usr_module`
--

INSERT INTO `req_usr_module` (`id`, `userid`, `moduleid`, `accesslevel`) VALUES
(216, '0', 1, 'Add, Edit, Delete, View'),
(217, '0', 2, 'Add, Edit, Delete, View'),
(218, '0', 3, 'Add, Edit, Delete, View'),
(219, '0', 4, 'Add, Edit, Delete, View'),
(429, '0', 56, 'Add, Edit, Delete, View'),
(430, '0', 57, 'Add, Edit, Delete, View'),
(431, '0', 58, 'Add, Edit, Delete, View'),
(432, '0', 59, 'Add, Edit, Delete, View'),
(433, '0', 60, 'Add, Edit, Delete, View'),
(434, '0', 61, 'Add, Edit, Delete, View'),
(435, '0', 62, 'Add, Edit, Delete, View'),
(436, '0', 63, 'Add, Edit, Delete, View'),
(437, '0', 64, 'Add, Edit, Delete, View'),
(438, '0', 65, 'Add, Edit, Delete, View'),
(440, '0', 67, 'Add, Edit, Delete, View'),
(441, '0', 68, 'Add, Edit, Delete, View'),
(442, '0', 69, 'Add, Edit, Delete, View'),
(443, '0', 70, 'Add, Edit, Delete, View'),
(444, '0', 71, 'Add, Edit, Delete, View'),
(445, '0', 72, 'Add, Edit, Delete, View'),
(446, '0', 73, 'Add, Edit, Delete, View'),
(447, '0', 74, 'Add, Edit, Delete, View'),
(448, '0', 75, 'Add, Edit, Delete, View'),
(449, '0', 76, 'Add, Edit, Delete, View'),
(450, '0', 77, 'Add, Edit, Delete, View');

-- --------------------------------------------------------

--
-- Table structure for table `test_group_domain`
--

CREATE TABLE IF NOT EXISTS `test_group_domain` (
  `test_group_domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_group_domain_name` varchar(400) NOT NULL,
  PRIMARY KEY (`test_group_domain_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `test_group_domain`
--

INSERT INTO `test_group_domain` (`test_group_domain_id`, `test_group_domain_name`) VALUES
(1, 'Collection charge'),
(2, 'ECG'),
(3, 'ECHO'),
(4, 'Hormone'),
(5, 'NEBULISAR'),
(6, 'PATH'),
(7, 'USG'),
(8, 'VACCINATION'),
(9, 'X-ray');

-- --------------------------------------------------------

--
-- Table structure for table `t_bank_acc`
--

CREATE TABLE IF NOT EXISTS `t_bank_acc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_name` text NOT NULL COMMENT 'A/C name',
  `ac_no` text NOT NULL COMMENT 'bank A/C no',
  `bank_id` int(11) NOT NULL COMMENT 'bank id',
  `amount` decimal(12,2) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `account_created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vat_management`
--

CREATE TABLE IF NOT EXISTS `vat_management` (
  `vat_id` int(11) NOT NULL AUTO_INCREMENT,
  `vat_percent` float NOT NULL,
  `vat_percent_discount` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`vat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vat_management`
--

INSERT INTO `vat_management` (`vat_id`, `vat_percent`, `vat_percent_discount`, `date`) VALUES
(8, 0, 0, '2014-09-17'),
(9, 0, 0, '2014-09-20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
