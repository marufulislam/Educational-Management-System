-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2017 at 03:27 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims-modified`
--

-- --------------------------------------------------------

--
-- Table structure for table `hierarchy`
--

CREATE TABLE `hierarchy` (
  `hierarchy_id` int(11) NOT NULL,
  `category` varchar(11) NOT NULL,
  `sub_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hierarchy`
--

INSERT INTO `hierarchy` (`hierarchy_id`, `category`, `sub_category`) VALUES
(1, 'm', 1),
(2, 'm', 2),
(3, '2', 3),
(4, '2', 4),
(5, 'm', 5),
(6, '5', 6),
(7, '5', 7),
(8, '5', 8),
(9, '5', 9),
(10, '5', 10),
(11, '5', 11),
(12, '5', 12),
(13, '5', 13),
(14, '5', 14),
(15, 'm', 15),
(16, '15', 16),
(17, '15', 17),
(18, '15', 18),
(19, 'm', 19),
(20, '19', 20),
(21, '19', 21),
(22, '19', 22),
(23, '19', 23),
(24, '19', 24),
(25, '19', 25),
(26, '19', 26),
(27, 'm', 27),
(28, '27', 28),
(29, '27', 29),
(30, '27', 30),
(31, '27', 31),
(33, '27', 33),
(34, 'm', 34),
(35, '34', 35),
(36, '27', 36),
(37, '19', 37),
(38, '27', 38),
(39, '5', 39),
(40, '5', 40),
(41, 'm', 41),
(42, '41', 42),
(43, '15', 43),
(44, 'm', 44),
(45, '44', 45),
(46, '44', 46),
(47, '44', 47),
(48, '44', 48),
(49, '44', 49),
(50, '44', 50),
(51, '19', 51),
(52, '5', 52),
(53, '27', 53),
(54, '5', 54),
(55, '5', 55),
(56, 'm', 56),
(57, '56', 57),
(58, '56', 58),
(59, '56', 59),
(60, '56', 60);

-- --------------------------------------------------------

--
-- Table structure for table `req_company`
--

CREATE TABLE `req_company` (
  `iCompanyId` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `tComapanyName` text NOT NULL,
  `slogan` varchar(200) NOT NULL,
  `call_us` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `sLogo` text NOT NULL,
  `email` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `paypal` varchar(350) NOT NULL,
  `toll_free` varchar(100) NOT NULL,
  `local` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `general_info` varchar(100) NOT NULL,
  `google_link` varchar(100) NOT NULL,
  `fb_link` varchar(100) NOT NULL,
  `twitter_link` varchar(100) NOT NULL,
  `linkedIn_link` varchar(100) NOT NULL,
  `pinterest_link` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_company`
--

INSERT INTO `req_company` (`iCompanyId`, `school_id`, `tComapanyName`, `slogan`, `call_us`, `website`, `sLogo`, `email`, `address`, `domain`, `paypal`, `toll_free`, `local`, `fax`, `general_info`, `google_link`, `fb_link`, `twitter_link`, `linkedIn_link`, `pinterest_link`, `date`) VALUES
(1, 1, 'Bangladesh High School & College', 'Knowledge is power.', '+88017000000', '', '', 'test@test.edu.bd', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'dev'),
(2, 'Admin'),
(3, 'Teacher'),
(4, 'Parents'),
(5, 'Students');

-- --------------------------------------------------------

--
-- Table structure for table `select_percentage`
--

CREATE TABLE `select_percentage` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `select_percentage`
--

INSERT INTO `select_percentage` (`id`, `value`) VALUES
(1, 20),
(2, 80);

-- --------------------------------------------------------

--
-- Table structure for table `student_sub_assign`
--

CREATE TABLE `student_sub_assign` (
  `sub_assign_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `subject_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `information_type` int(11) NOT NULL,
  `about_details` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `school_id`, `information_type`, `about_details`, `status`, `created_on`) VALUES
(4, 0, 1, '<p><img alt="" src="http://www.usd497.org/cms/lib8/KS01906981/Centricity/ModuleInstance/105/large/NYSCHOOL.JPG?rnd=0.645567466805488" style="width: 250px; height: 134px; float: left;" />sfaSFasfASFADASsfgjsfgjsfgjgj</p>\r\n', 1, '2017-02-17 11:55:25'),
(5, 0, 2, '<p>tf65 f6 f65 68f&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>tfbr bfurbtyfbtiyfbtf</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>tyfbbtdfutdftyfbtyfbtybf</p>\r\n', 1, '2017-02-22 12:20:08'),
(6, 0, 3, '<p>this is test for edit option</p>\r\n', 1, '2017-03-02 13:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_effects`
--

CREATE TABLE `tbl_academic_effects` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `information_type` int(11) NOT NULL,
  `effects_details` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic_effects`
--

INSERT INTO `tbl_academic_effects` (`id`, `school_id`, `information_type`, `effects_details`, `status`, `created_on`) VALUES
(1, 0, 2, '<p>this is test message</p>\r\n', 1, '2017-02-24 09:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_information`
--

CREATE TABLE `tbl_academic_information` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `information_type` int(11) NOT NULL,
  `academic_details` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic_information`
--

INSERT INTO `tbl_academic_information` (`id`, `school_id`, `information_type`, `academic_details`, `status`, `created_on`) VALUES
(1, 0, 2, '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px;">\r\n	<tbody>\r\n		<tr>\r\n			<td>afasfa</td>\r\n			<td>asfafa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asfasfasf</td>\r\n			<td>asfafa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>DJSFGJDF</td>\r\n			<td>dhdfhfh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2017-02-17 12:18:56'),
(2, 0, 6, '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px;">\r\n	<tbody>\r\n		<tr>\r\n			<td>afasfa</td>\r\n			<td>asfafa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asfasfasf</td>\r\n			<td>asfafa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>DJSFGJDF</td>\r\n			<td>dhdfhfh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2017-02-17 12:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `unique_code` varchar(500) NOT NULL,
  `entry_date` date NOT NULL,
  `attendance` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `unique_code`, `entry_date`, `attendance`) VALUES
(74, 'holiday', '2017-02-16', 'H'),
(75, 'holiday', '2017-02-21', 'H'),
(76, 'holiday', '2017-02-25', 'H'),
(77, 'X8bTNYHECj', '2017-02-15', '0'),
(78, 'X8bTNYHECk', '2017-02-15', '1'),
(79, 'holiday', '2017-02-15', 'H'),
(80, 'holiday', '2017-02-21', 'H'),
(81, 'holiday', '2017-02-25', 'H'),
(82, 'holiday', '2017-02-15', 'H'),
(83, 'holiday', '2017-02-21', 'H'),
(84, 'holiday', '2017-02-25', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance_teacher`
--

CREATE TABLE `tbl_attendance_teacher` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `entry_date` date NOT NULL,
  `teacher_attendance` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance_teacher`
--

INSERT INTO `tbl_attendance_teacher` (`id`, `school_id`, `teacher_id`, `entry_date`, `teacher_attendance`) VALUES
(1, 0, '1', '2017-02-15', '0'),
(2, 0, '0', '2017-02-15', 'H'),
(3, 0, '0', '2017-02-21', 'H'),
(4, 0, '0', '2017-02-25', 'H'),
(5, 0, 'holiday', '2017-02-17', 'H'),
(6, 0, 'holiday', '2017-02-21', 'H'),
(7, 0, 'holiday', '2017-02-25', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `class_short_form` int(50) NOT NULL,
  `num_of_subject` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `school_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_name`, `class_short_form`, `num_of_subject`, `status`, `school_id`, `created_on`) VALUES
(1, 'six', 6, 3, 1, 0, '2016-12-23 16:43:14'),
(2, 'Seven', 7, 12, 1, 0, '2017-02-17 09:11:46'),
(3, 'Nine', 9, 12, 1, 0, '2017-03-02 17:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_teacher_assign`
--

CREATE TABLE `tbl_class_teacher_assign` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `short_department_name` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`, `short_department_name`, `school_id`, `status`, `created_on`) VALUES
(1, 'Accounts', 'A', 1, 1, '2014-12-24 05:48:00'),
(2, 'Academic', 'Aca', 1, 1, '2014-12-24 05:48:06'),
(3, 'IT', 'IT', 1, 1, '2014-12-24 05:48:12'),
(4, 'Staff', 'S', 1, 1, '2014-12-24 05:48:16'),
(5, 'HR & Administration', 'HR-Ad', 1, 1, '2014-12-24 05:48:21'),
(6, 'Library', 'Lib', 1, 1, '2015-01-08 23:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_id` int(11) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `designation_name`, `school_id`, `status`, `created_on`) VALUES
(1, 'Principal', 1, 1, '2014-12-24 06:22:37'),
(2, 'Vice Principal', 1, 1, '2014-12-24 06:23:08'),
(3, 'Lecturer', 1, 1, '2015-03-13 05:42:33'),
(4, 'Senior Teacher ', 1, 1, '2015-03-13 05:42:33'),
(5, 'Asst. Teacher', 1, 1, '2014-12-24 06:23:17'),
(6, 'Jr. Teacher', 1, 1, '2014-12-24 06:23:25'),
(7, 'MLSS', 1, 1, '2014-12-24 06:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_routine`
--

CREATE TABLE `tbl_exam_routine` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `exm_date` date NOT NULL,
  `day` varchar(100) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_name` varchar(500) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exam_routine`
--

INSERT INTO `tbl_exam_routine` (`id`, `class_id`, `section_id`, `shift_id`, `exm_date`, `day`, `subject_id`, `teacher_name`, `start_time`, `end_time`, `room_no`) VALUES
(1, 1, 1, 1, '0000-00-00', 'saturday', 1, 'Masud Rana', '07:15:00', '08:15:00', '02'),
(2, 1, 1, 1, '0000-00-00', 'sunday', 2, 'sfasf', '11:20:00', '12:30:00', '23'),
(3, 1, 1, 1, '2017-02-03', 'sunday', 1, 'asd', '08:15:00', '09:15:00', '23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fee_category`
--

CREATE TABLE `tbl_fee_category` (
  `fee_category_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `fee_category_name` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fee_category`
--

INSERT INTO `tbl_fee_category` (`fee_category_id`, `school_id`, `fee_category_name`, `created_on`) VALUES
(1, 1, 'Monthly', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fee_report`
--

CREATE TABLE `tbl_fee_report` (
  `fee_report_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `exm_year` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `less` int(11) NOT NULL,
  `random_number` varchar(500) NOT NULL,
  `entry_date` date NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fee_sub_category`
--

CREATE TABLE `tbl_fee_sub_category` (
  `fee_sub_category_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_class` varchar(200) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `fee_sub_category_name` varchar(200) NOT NULL,
  `fee_sub_category_price` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fee_sub_category`
--

INSERT INTO `tbl_fee_sub_category` (`fee_sub_category_id`, `school_id`, `student_class`, `fee_category_id`, `fee_sub_category_name`, `fee_sub_category_price`, `created_on`) VALUES
(1, 1, '1', 1, 'asdf', 250, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form`
--

CREATE TABLE `tbl_form` (
  `notice_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `notice_heading` varchar(255) NOT NULL,
  `publish_date` varchar(50) NOT NULL,
  `notice_attachment` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_form`
--

INSERT INTO `tbl_form` (`notice_id`, `school_id`, `notice_heading`, `publish_date`, `notice_attachment`, `status`, `created_on`) VALUES
(1, 0, 'asfasfaf', '02/03/2017', '2017030201404136834.png', 1, '2017-03-02 13:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_full_marks`
--

CREATE TABLE `tbl_full_marks` (
  `full_marks_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_name` int(11) NOT NULL,
  `class_name` int(11) NOT NULL,
  `section_name` int(11) NOT NULL,
  `shift_name` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  `subject_name` int(11) NOT NULL,
  `term_name` int(11) NOT NULL,
  `exam_year` int(11) NOT NULL,
  `ct_marks1` varchar(200) NOT NULL,
  `ct_marks2` varchar(200) NOT NULL,
  `avg` int(11) NOT NULL,
  `creative` varchar(200) NOT NULL,
  `objective` varchar(200) NOT NULL,
  `practicle` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `integration` int(11) NOT NULL,
  `subject_grade` varchar(50) NOT NULL,
  `subject_gpa` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_full_marks`
--

INSERT INTO `tbl_full_marks` (`full_marks_id`, `school_id`, `student_name`, `class_name`, `section_name`, `shift_name`, `group_name`, `subject_name`, `term_name`, `exam_year`, `ct_marks1`, `ct_marks2`, `avg`, `creative`, `objective`, `practicle`, `total`, `integration`, `subject_grade`, `subject_gpa`) VALUES
(14, 0, 1, 1, 1, 1, 1, 1, 1, 1, '8', '38', 18, '54', '18', '18', 72, 45, '', '0.00'),
(15, 0, 1, 1, 1, 1, 1, 1, 2, 1, '8', '38', 18, '54', '15', '19', 70, 44, '', '0.00'),
(16, 0, 2, 1, 1, 1, 1, 1, 1, 1, '8', '32', 16, '56', '14', '16', 69, 43, '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_assign`
--

CREATE TABLE `tbl_grade_assign` (
  `grade_assign_id` int(3) NOT NULL,
  `school_id` int(1) DEFAULT NULL,
  `subject_id` int(2) DEFAULT NULL,
  `grade_from` int(2) DEFAULT NULL,
  `grade_to` int(3) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `gpa` decimal(2,1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `datetime` varchar(19) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_grade_assign`
--

INSERT INTO `tbl_grade_assign` (`grade_assign_id`, `school_id`, `subject_id`, `grade_from`, `grade_to`, `grade`, `gpa`, `status`, `datetime`) VALUES
(1, 0, 1, 0, 32, 'F', '0.0', 1, '2016-12-24T00:24:58'),
(2, 0, 1, 70, 100, 'A', '4.0', 1, '2016-12-25T00:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_total`
--

CREATE TABLE `tbl_grade_total` (
  `grade_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `grade_from` varchar(50) NOT NULL,
  `grade_to` varchar(50) NOT NULL,
  `cgpa` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`group_id`, `school_id`, `group_name`, `status`, `created_on`) VALUES
(1, 0, 'None', 1, '2016-12-23 16:44:12'),
(2, 0, 'Science', 1, '2017-03-02 17:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_important_information`
--

CREATE TABLE `tbl_important_information` (
  `important_information_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `information_type` int(11) NOT NULL COMMENT '1= important_information; 2=rules_regulation; 3=steps; 4=facility; 5=Principal list; 6=Vice Principal list; 7=Library; 8=Vacant Post;9=Teacher''s panel',
  `information_heading` varchar(255) NOT NULL,
  `information_details` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_important_information`
--

INSERT INTO `tbl_important_information` (`important_information_id`, `school_id`, `information_type`, `information_heading`, `information_details`, `status`, `created_on`) VALUES
(1, 0, 1, 'sgdgsdg', '<p>test sdg adsg as dgasd g</p>\r\n', 1, '2017-03-02 13:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marksheet`
--

CREATE TABLE `tbl_marksheet` (
  `tbl_marksheet_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_name` int(11) NOT NULL,
  `class_name` int(11) NOT NULL,
  `section_name` int(11) NOT NULL,
  `shift_name` int(11) NOT NULL,
  `group_name` int(11) NOT NULL,
  `subject_name` int(11) NOT NULL,
  `term_name` int(11) NOT NULL,
  `exam_year` int(11) NOT NULL,
  `sub_marks` int(11) NOT NULL,
  `subject_grade` varchar(50) NOT NULL,
  `subject_gpa` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_marksheet`
--

INSERT INTO `tbl_marksheet` (`tbl_marksheet_id`, `school_id`, `student_name`, `class_name`, `section_name`, `shift_name`, `group_name`, `subject_name`, `term_name`, `exam_year`, `sub_marks`, `subject_grade`, `subject_gpa`) VALUES
(8, 0, 1, 1, 1, 1, 1, 1, 1, 1, 89, 'A', '4.00'),
(9, 0, 1, 1, 1, 1, 1, 2, 1, 1, 89, 'A', '4.00'),
(10, 0, 1, 1, 1, 1, 1, 3, 1, 1, 89, 'A', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `notice_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `notice_type` int(11) NOT NULL COMMENT '1= General Notice; 2 = Admission Notice',
  `notice_heading` varchar(255) NOT NULL,
  `notice_details` longtext NOT NULL,
  `publish_date` varchar(50) NOT NULL,
  `notice_attachment` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`notice_id`, `school_id`, `notice_type`, `notice_heading`, `notice_details`, `publish_date`, `notice_attachment`, `status`, `created_on`) VALUES
(1, 0, 2, 'Admission going on for 2017 Session', '<p>Student admission is going on for 2017 session. please contact our adminision office for further information</p>\r\n', '30/12/2016', '', 1, '2017-02-14 18:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo_catagory`
--

CREATE TABLE `tbl_photo_catagory` (
  `catagory_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `catagory_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_photo_catagory`
--

INSERT INTO `tbl_photo_catagory` (`catagory_id`, `school_id`, `catagory_name`, `created_on`) VALUES
(1, 0, 'dgsdgsdgsdg', '2017-03-02 13:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo_gallery`
--

CREATE TABLE `tbl_photo_gallery` (
  `photo_gallery_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `photo_caption` varchar(255) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `gallery_image_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_principal_message`
--

CREATE TABLE `tbl_principal_message` (
  `message_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `principal_name` varchar(255) NOT NULL,
  `principal_image` varchar(255) NOT NULL,
  `principal_message` longtext NOT NULL,
  `type` int(11) NOT NULL COMMENT '1= Principal; 2= Vice Principal',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_principal_message`
--

INSERT INTO `tbl_principal_message` (`message_id`, `school_id`, `principal_name`, `principal_image`, `principal_message`, `type`, `status`, `created_on`) VALUES
(3, 0, 'Abdullah Al Mamun', '2017021416966.jpg', '<p>Our shared dedication to the people who comprise our school community defines us. As a sensitive, caring, tolerant and nurturing community, we encourage young people to take risks and, in the process, to grow. At Westminster, we aspire to an extraordinarily ambitious commitment to education, a commitment that rests on the goodwill and enthusiastic participation of our entire school community.</p>\r\n', 1, 1, '2017-02-14 18:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_req_fee_report`
--

CREATE TABLE `tbl_req_fee_report` (
  `req_fee_report_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `fee_sub_name` int(11) NOT NULL,
  `fee_charge` int(11) NOT NULL,
  `random_number` varchar(500) NOT NULL,
  `isCompleted` int(11) NOT NULL,
  `create_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_id`, `class_id`, `section_name`, `school_id`, `status`, `created_on`) VALUES
(1, 1, 'A', 0, 1, '2016-12-23 16:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `session_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`session_id`, `school_id`, `session_name`, `status`, `created_on`) VALUES
(1, 0, '2017', 1, '2016-12-23 16:48:32'),
(2, 0, '2018', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shift`
--

CREATE TABLE `tbl_shift` (
  `shift_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `shift_name` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shift`
--

INSERT INTO `tbl_shift` (`shift_id`, `class_id`, `section_id`, `shift_name`, `school_id`, `status`, `created_on`) VALUES
(1, 1, 1, 'Day', 0, 1, '2016-12-23 16:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide_image`
--

CREATE TABLE `tbl_slide_image` (
  `slide_image_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `slide_image_name` varchar(255) NOT NULL,
  `slide_caption` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slide_image`
--

INSERT INTO `tbl_slide_image` (`slide_image_id`, `school_id`, `slide_image_name`, `slide_caption`, `status`, `created_on`) VALUES
(1, 0, '2017021419653.jpg', 'We create graduates who will make an impact on our economy.', 1, '2017-02-14 17:55:42'),
(2, 0, '2017021420259.jpg', 'Bangladesh High School & College', 1, '2017-02-14 18:22:14'),
(3, 0, '2017021439997.jpg', 'We teach our kids moral values and education that will make them a great human being.', 1, '2017-02-14 18:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_alumini`
--

CREATE TABLE `tbl_student_alumini` (
  `student_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_name` varchar(500) NOT NULL,
  `student_birth` date NOT NULL,
  `student_age` int(11) NOT NULL,
  `student_birth_place` varchar(200) NOT NULL,
  `student_nationality` varchar(200) NOT NULL,
  `student_religion` varchar(200) NOT NULL,
  `student_gender` varchar(100) NOT NULL,
  `student_image` varchar(200) NOT NULL,
  `student_pre_address` text NOT NULL,
  `student_per_address` text NOT NULL,
  `student_emmergency_cont_name` varchar(200) NOT NULL,
  `student_emmergency_cont_relation` varchar(200) NOT NULL,
  `student_emmergency_cont_number` varchar(200) NOT NULL,
  `student_father_name` varchar(500) NOT NULL,
  `student_mother_name` varchar(500) NOT NULL,
  `student_father_occupation` varchar(200) NOT NULL,
  `student_mother_occupation` varchar(200) NOT NULL,
  `student_father_education` varchar(200) NOT NULL,
  `student_mother_education` varchar(200) NOT NULL,
  `student_father_email` varchar(200) NOT NULL,
  `student_mother_email` varchar(200) NOT NULL,
  `student_home_number` varchar(100) NOT NULL,
  `student_father_number` varchar(100) NOT NULL,
  `student_mother_number` varchar(100) NOT NULL,
  `student_parents_image1` varchar(200) NOT NULL,
  `student_parents_image2` varchar(200) NOT NULL,
  `student_sibling_name1` varchar(500) NOT NULL,
  `student_sibling_age1` varchar(50) NOT NULL,
  `student_sibling_grade1` varchar(100) NOT NULL,
  `student_sibling_currentschool1` text NOT NULL,
  `student_sibling_name2` varchar(500) NOT NULL,
  `student_sibling_age2` varchar(50) NOT NULL,
  `student_sibling_grade2` varchar(100) NOT NULL,
  `student_sibling_currentschool2` text NOT NULL,
  `student_sibling_name3` varchar(500) NOT NULL,
  `student_sibling_age3` varchar(50) NOT NULL,
  `student_sibling_grade3` varchar(100) NOT NULL,
  `student_sibling_currentschool3` text NOT NULL,
  `student_med_condition` text NOT NULL,
  `student_blood_group` varchar(100) NOT NULL,
  `student_class` int(11) NOT NULL,
  `student_section` int(11) NOT NULL,
  `student_group` int(11) NOT NULL,
  `student_shift` int(11) NOT NULL,
  `optional_sub` int(11) NOT NULL,
  `student_session` int(11) NOT NULL,
  `student_class_roll` int(11) NOT NULL,
  `student_addmission_fee_aid` int(11) NOT NULL,
  `student_tution_fee_aid` int(11) NOT NULL,
  `student_note` text NOT NULL,
  `testfile` varchar(500) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_due`
--

CREATE TABLE `tbl_student_due` (
  `student_due_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `create_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_info`
--

CREATE TABLE `tbl_student_info` (
  `student_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_name` varchar(500) NOT NULL,
  `student_birth` date NOT NULL,
  `student_age` int(11) NOT NULL,
  `student_birth_place` varchar(200) NOT NULL,
  `student_nationality` varchar(200) NOT NULL,
  `student_religion` varchar(200) NOT NULL,
  `student_gender` varchar(100) NOT NULL,
  `student_image` varchar(200) NOT NULL,
  `student_pre_address` text NOT NULL,
  `student_per_address` text NOT NULL,
  `student_emmergency_cont_name` varchar(200) NOT NULL,
  `student_emmergency_cont_relation` varchar(200) NOT NULL,
  `student_emmergency_cont_number` varchar(200) NOT NULL,
  `student_father_name` varchar(500) NOT NULL,
  `student_mother_name` varchar(500) NOT NULL,
  `student_father_occupation` varchar(200) NOT NULL,
  `student_mother_occupation` varchar(200) NOT NULL,
  `student_father_education` varchar(200) NOT NULL,
  `student_mother_education` varchar(200) NOT NULL,
  `student_father_email` varchar(200) NOT NULL,
  `student_mother_email` varchar(200) NOT NULL,
  `student_home_number` varchar(100) NOT NULL,
  `student_father_number` varchar(100) NOT NULL,
  `student_mother_number` varchar(100) NOT NULL,
  `student_parents_image1` varchar(200) NOT NULL,
  `student_parents_image2` varchar(200) NOT NULL,
  `student_sibling_name1` varchar(500) NOT NULL,
  `student_sibling_age1` varchar(50) NOT NULL,
  `student_sibling_grade1` varchar(100) NOT NULL,
  `student_sibling_currentschool1` text NOT NULL,
  `student_sibling_name2` varchar(500) NOT NULL,
  `student_sibling_age2` varchar(50) NOT NULL,
  `student_sibling_grade2` varchar(100) NOT NULL,
  `student_sibling_currentschool2` text NOT NULL,
  `student_sibling_name3` varchar(500) NOT NULL,
  `student_sibling_age3` varchar(50) NOT NULL,
  `student_sibling_grade3` varchar(100) NOT NULL,
  `student_sibling_currentschool3` text NOT NULL,
  `student_med_condition` text NOT NULL,
  `student_blood_group` varchar(100) NOT NULL,
  `student_class` int(11) NOT NULL,
  `student_section` int(11) NOT NULL,
  `student_group` int(11) NOT NULL,
  `student_shift` int(11) NOT NULL,
  `optional_sub` int(11) NOT NULL,
  `student_session` int(11) NOT NULL,
  `student_class_roll` int(11) NOT NULL,
  `student_addmission_fee_aid` int(11) NOT NULL,
  `student_tution_fee_aid` int(11) NOT NULL,
  `student_note` text NOT NULL,
  `testfile` varchar(500) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_info`
--

INSERT INTO `tbl_student_info` (`student_id`, `school_id`, `student_name`, `student_birth`, `student_age`, `student_birth_place`, `student_nationality`, `student_religion`, `student_gender`, `student_image`, `student_pre_address`, `student_per_address`, `student_emmergency_cont_name`, `student_emmergency_cont_relation`, `student_emmergency_cont_number`, `student_father_name`, `student_mother_name`, `student_father_occupation`, `student_mother_occupation`, `student_father_education`, `student_mother_education`, `student_father_email`, `student_mother_email`, `student_home_number`, `student_father_number`, `student_mother_number`, `student_parents_image1`, `student_parents_image2`, `student_sibling_name1`, `student_sibling_age1`, `student_sibling_grade1`, `student_sibling_currentschool1`, `student_sibling_name2`, `student_sibling_age2`, `student_sibling_grade2`, `student_sibling_currentschool2`, `student_sibling_name3`, `student_sibling_age3`, `student_sibling_grade3`, `student_sibling_currentschool3`, `student_med_condition`, `student_blood_group`, `student_class`, `student_section`, `student_group`, `student_shift`, `optional_sub`, `student_session`, `student_class_roll`, `student_addmission_fee_aid`, `student_tution_fee_aid`, `student_note`, `testfile`, `created_on`) VALUES
(1, 0, 'Al-Amin', '0000-00-00', 8, 'Dhaka', 'Bangladeshi', 'Islam', 'Male', '2016122315546.jpg', 'sdgasdg', 'asdgsdg', '33573457', 'SDgasd', '3632462346', 'adgasdg', 'sdgasdg', 'asdgasdg', 'asdgsdg', 'asdgasdg', 'asdgasdg', 'asdasdg@asd.sdf', 'asdfasdf@asdg.sd', '34534573457', '23462346', '34636346346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'good', 'AB+', 1, 1, 1, 1, 0, 1, 1, 0, 0, 'sdgasdgasdg', 'X8bTNYHECj', '2016-12-23 17:11:46'),
(2, 0, 'Abdul Rahim', '0000-00-00', 8, 'Dhaka', 'Bangladeshi', 'Islam', 'Male', '2016122315546.jpg', 'sdgasdg', 'asdgsdg', '33573457', 'SDgasd', '3632462346', 'adgasdg', 'sdgasdg', 'asdgasdg', 'asdgsdg', 'asdgasdg', 'asdgasdg', 'asdasdg@asd.sdf', 'asdfasdf@asdg.sd', '34534573457', '23462346', '34636346346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'good', 'AB+', 2, 1, 1, 1, 0, 2, 2, 0, 0, 'sdgasdgasdg', 'X8bTNYHECk', '2016-12-23 17:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_routine`
--

CREATE TABLE `tbl_student_routine` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_routine`
--

INSERT INTO `tbl_student_routine` (`id`, `class_id`, `section_id`, `shift_id`, `day`, `start_time`, `end_time`, `subject_id`) VALUES
(1, 1, 1, 1, 'saturday', '08:15:00', '00:00:00', 0),
(2, 1, 1, 1, 'saturday', '08:15:00', '09:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stuff_recruitment`
--

CREATE TABLE `tbl_stuff_recruitment` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `details` longtext NOT NULL,
  `status` int(1) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stuff_recruitment`
--

INSERT INTO `tbl_stuff_recruitment` (`id`, `school_id`, `heading`, `details`, `status`, `created_on`) VALUES
(2, 0, 'Test Heading', '<p>this is test recruitment for the teacher</p>\r\n', 1, '2017-02-25 20:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `pass_marks_under` int(11) NOT NULL,
  `cr_pass_marks` int(11) NOT NULL,
  `ob_pass_marks` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `school_id`, `class_id`, `subject_name`, `subject_code`, `pass_marks_under`, `cr_pass_marks`, `ob_pass_marks`, `status`, `created_on`) VALUES
(1, 0, 1, 'Bangla', 107, 33, 0, 0, 1, '2016-12-23 16:48:13'),
(2, 0, 1, 'English', 102, 33, 17, 12, 1, '2017-02-20 16:08:13'),
(3, 0, 1, 'Mathmetics', 105, 33, 17, 12, 1, '2017-02-20 16:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_pay`
--

CREATE TABLE `tbl_teacher_pay` (
  `tbl_teacher_pay_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `month_name` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_registration`
--

CREATE TABLE `tbl_teacher_registration` (
  `teacher_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `husband_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `permanent_district` varchar(255) NOT NULL,
  `permanent_thana` varchar(255) NOT NULL,
  `permanent_contact` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `present_district` varchar(255) NOT NULL,
  `present_thana` varchar(255) NOT NULL,
  `present_contact` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `national_id_card_no` int(30) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `teacher_image` varchar(255) NOT NULL,
  `archive` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_teacher_registration`
--

INSERT INTO `tbl_teacher_registration` (`teacher_id`, `school_id`, `status`, `created_on`, `teacher_name`, `father_name`, `husband_name`, `mother_name`, `birth_date`, `gender`, `marital_status`, `permanent_address`, `permanent_district`, `permanent_thana`, `permanent_contact`, `present_address`, `present_district`, `present_thana`, `present_contact`, `account_number`, `religion`, `nationality`, `national_id_card_no`, `blood_group`, `email`, `department_id`, `designation_id`, `joining_date`, `teacher_image`, `archive`) VALUES
(1, 0, 1, '2017-02-15 17:59:05', 'Masud Rana', 'asdg', '', 'asdgasdg', '08/03/2000', 'Male', 'Married', 'asgf', 'asfasf', 'afasf', '', 'asfasf', 'asfasf', 'asfasf', '123512351235', 'asfasf', 'Islam', 'Bangladeshi', 2147483647, 'AB+', 'ab@gmail.com', 3, 3, '15/07/2015', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_salary`
--

CREATE TABLE `tbl_teacher_salary` (
  `teacher_salary_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `house_rent` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `others` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term`
--

CREATE TABLE `tbl_term` (
  `term_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `term_name` varchar(100) NOT NULL,
  `isActive` int(1) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_term`
--

INSERT INTO `tbl_term` (`term_id`, `school_id`, `term_name`, `isActive`, `datetime`) VALUES
(1, 0, 'Half Yearly', 0, '2016-12-23 17:21:37'),
(2, 0, 'Full Yearly', 1, '2016-12-23 17:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term_sector`
--

CREATE TABLE `tbl_term_sector` (
  `term_sector_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `sector_name` varchar(200) NOT NULL,
  `exam_marks` int(11) NOT NULL,
  `isActive` int(1) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_term_sector`
--

INSERT INTO `tbl_term_sector` (`term_sector_id`, `school_id`, `term_id`, `sector_name`, `exam_marks`, `isActive`, `datetime`) VALUES
(1, 0, 1, 'CT', 10, 1, '2016-12-23 17:22:14'),
(2, 0, 1, 'Mid Term', 40, 1, '2016-12-23 17:22:36'),
(3, 0, 1, 'Half Year', 100, 0, '2016-12-24 00:30:53'),
(4, 0, 2, 'CT', 10, 1, '2016-12-25 01:04:24'),
(5, 0, 2, 'Mid Term', 40, 1, '2016-12-25 01:04:43'),
(6, 0, 2, 'Full Year', 100, 0, '2016-12-25 01:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weeks`
--

CREATE TABLE `tbl_weeks` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_weeks`
--

INSERT INTO `tbl_weeks` (`id`, `day`, `status`, `created_at`) VALUES
(1, 'saturday', 1, '2017-03-02 13:09:21'),
(2, 'sunday', 1, '2017-03-02 11:33:30'),
(3, 'monday', 1, '2017-03-02 11:25:32'),
(4, 'tuesday', 1, '2017-03-02 11:34:32'),
(5, 'wednesday', 1, '2017-03-02 12:25:19'),
(6, 'thursday', 1, '2017-03-02 13:22:29'),
(7, 'friday', 0, '2017-03-02 12:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_routine`
--

CREATE TABLE `teachers_routine` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_routine`
--

INSERT INTO `teachers_routine` (`id`, `school_id`, `class_id`, `section_id`, `shift_id`, `day`, `start_time`, `end_time`, `subject_id`, `teacher_id`, `created_at`) VALUES
(1, 0, 1, 1, 1, 'saturday', '06:15:00', '07:00:00', 1, 1, '2017-03-03 09:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `t_modules`
--

CREATE TABLE `t_modules` (
  `moduleid` int(11) NOT NULL COMMENT 'module id',
  `name` text NOT NULL,
  `page_caption` text NOT NULL,
  `page_link` text NOT NULL,
  `is_report` int(2) NOT NULL COMMENT '1=report,0=form',
  `is_main` int(2) NOT NULL COMMENT '1=main,0=sub',
  `icon` varchar(300) NOT NULL,
  `show` int(2) NOT NULL COMMENT '1=show,0=hide'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_modules`
--

INSERT INTO `t_modules` (`moduleid`, `name`, `page_caption`, `page_link`, `is_report`, `is_main`, `icon`, `show`) VALUES
(1, 'Dashboard', 'Welcome to the administrative control panel !!!', 'home', 0, 0, 'icon-home', 0),
(2, 'User Management', '', '#', 0, 0, 'icon-fullscreen', 0),
(3, 'User Permission', 'The smaller the function, the greater the management.', 'user_management', 0, 0, '', 0),
(4, 'Module Entry', '', 'module_entry', 0, 0, '', 0),
(5, 'Website Information', '', '#', 0, 0, 'icon-collapse', 0),
(6, 'About School', '', 'about', 0, 0, 'icon-file', 0),
(7, 'School Description', '', 'school_description', 0, 0, 'icon-file', 0),
(8, 'School Slider', '', 'school_slide', 0, 0, 'icon-file', 0),
(9, 'Head/Principle Message', '', 'head_priciple', 0, 0, 'icon-file', 0),
(10, 'School Notice', '', 'notices', 0, 0, 'icon-file', 0),
(11, 'School Form', '', 'forms', 0, 0, 'icon-file', 0),
(12, 'Photo Category', '', 'photo_category', 0, 0, 'icon-file', 0),
(13, 'Photo Gallery', '', 'photo_gallery', 0, 0, 'icon-file', 0),
(14, 'Other Information', '', 'other_information', 0, 0, 'icon-file', 0),
(15, 'Teacher & Staff Management', '', '#', 0, 0, 'icon-collapse', 0),
(16, 'Registration Form', '', 'registrationa_form', 0, 0, 'icon-file', 0),
(17, 'Class Teacher Assign', '', 'class_teacher_assign', 0, 0, 'icon-file', 0),
(18, 'Salary Structure', '', 'salary_structure', 0, 0, 'icon-file', 0),
(19, 'Student Setup', '', '#', 0, 0, 'icon-collapse', 0),
(20, 'Class Assign', '', 'class_assign', 0, 0, 'icon-file', 0),
(21, 'Section Assign', '', 'section_assign', 0, 0, 'icon-file', 0),
(22, 'Shift Assign', '', 'shift_assign', 0, 0, 'icon-file', 0),
(23, 'Group Assign', '', 'group_assign', 0, 0, 'icon-file', 0),
(24, 'Subject Assign', '', 'subject_assign', 0, 0, 'icon-file', 0),
(25, 'Session Assign', '', 'session_assign', 0, 0, 'icon-file', 0),
(26, 'Student Registration', '', 'student_registration', 0, 0, 'icon-file', 0),
(27, 'Result Management', '', '#', 0, 0, 'icon-collapse', 0),
(28, 'Subject Grade Assign', '', 'grade_assign', 0, 0, 'icon-file', 0),
(29, 'Term Assign', '', 'term_assign', 0, 0, 'icon-file', 0),
(30, 'Exam Assign', '', 'exam_assign', 0, 0, 'icon-file', 0),
(31, 'Marks Entry', '', 'set_ct_marks', 0, 0, 'icon-file', 0),
(33, 'Mark Sheet', '', 'mark_sheet', 0, 0, 'icon-file', 0),
(34, 'SMS Alert', '', '#', 0, 0, 'icon-collapse', 0),
(35, 'Notice to Students', '', 'student_sms_notice', 0, 0, 'icon-file', 0),
(36, 'Total Grade', '', 'total_grade', 0, 0, 'icon-file', 0),
(38, 'Individual Edit ', '', 'subject_delete', 0, 0, 'icon-file', 0),
(39, 'Fees Category', '', 'fees_category', 0, 0, 'icon-file', 0),
(40, 'Fees Sub-Category', '', 'fees_subcategory', 0, 0, 'icon-file', 0),
(41, 'Fees Management', '', '#', 0, 0, 'icon-collapse', 0),
(42, 'Fees Management', '', 'fees_management', 0, 0, 'icon-file', 0),
(43, 'teachers Payment', '', 'teachers_payment', 0, 0, 'icon-file', 0),
(44, 'Attendance Management', '', '#', 0, 0, 'icon-collapse', 0),
(46, 'Student Attendance', '', 'menual_attendance', 0, 0, 'icon-user-md', 0),
(47, 'Student Attendance Report', '', 'generate_attendance_report', 0, 0, 'icon-gift', 0),
(48, 'Select Holiday', '', 'select_holiday', 0, 0, 'icon-flag', 0),
(49, 'Teacher Attendance', '', 'manual_teacher_attendance', 0, 0, 'icon-briefcase', 0),
(50, 'Teacher Attendance Report', '', 'teacher_attendance_report', 0, 0, 'icon-folder-open', 0),
(51, 'Student Promotion', '', 'student_promotion', 0, 0, 'icon-flag', 0),
(52, 'Academic Information', '', 'academic_information', 0, 0, 'icon-rss', 0),
(53, 'Tabulation Sheet', '', 'tabulation_sheet', 0, 0, 'icon-star-empty', 0),
(54, 'Academic Effects ', '', 'academic_effects', 0, 0, 'icon-lemon', 0),
(55, 'Stuff Recruitment', '', 'stuff_recruitment', 0, 0, 'icon-legal', 0),
(56, 'Routine', '', '#', 0, 0, 'icon-pencil', 0),
(57, 'Weekly Shedule', '', 'weeks_shedule', 0, 0, 'icon-sort', 0),
(58, 'Create Class Routine', '', 'class_routine', 0, 0, 'icon-gift', 0),
(59, 'Create Exam Routine', '', 'exm_routine', 0, 0, 'icon-user-md', 0),
(60, 'Create Teacher Routine', '', 'teacher_routine', 0, 0, 'icon-lemon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user_module`
--

CREATE TABLE `t_user_module` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL DEFAULT '',
  `moduleid` bigint(10) UNSIGNED NOT NULL DEFAULT '0',
  `accesslevel` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_module`
--

INSERT INTO `t_user_module` (`id`, `userid`, `moduleid`, `accesslevel`) VALUES
(441, '0', 1, 'Add, Edit, Delete, View'),
(442, '0', 2, 'Add, Edit, Delete, View'),
(443, '0', 3, 'Add, Edit, Delete, View'),
(444, '0', 4, 'Add, Edit, Delete, View'),
(539, '0', 5, 'Add, Edit, Delete, View'),
(540, '0', 6, 'Add, Edit, Delete, View'),
(541, '0', 7, 'Add, Edit, Delete, View'),
(542, '0', 8, 'Add, Edit, Delete, View'),
(543, '0', 9, 'Add, Edit, Delete, View'),
(544, '0', 10, 'Add, Edit, Delete, View'),
(545, '0', 11, 'Add, Edit, Delete, View'),
(546, '0', 12, 'Add, Edit, Delete, View'),
(547, '0', 13, 'Add, Edit, Delete, View'),
(548, '0', 14, 'Add, Edit, Delete, View'),
(549, '0', 15, 'Add, Edit, Delete, View'),
(550, '0', 16, 'Add, Edit, Delete, View'),
(551, '0', 17, 'Add, Edit, Delete, View'),
(552, '0', 18, 'Add, Edit, Delete, View'),
(553, '0', 19, 'Add, Edit, Delete, View'),
(554, '0', 20, 'Add, Edit, Delete, View'),
(555, '0', 21, 'Add, Edit, Delete, View'),
(556, '0', 22, 'Add, Edit, Delete, View'),
(557, '0', 23, 'Add, Edit, Delete, View'),
(558, '0', 24, 'Add, Edit, Delete, View'),
(559, '0', 25, 'Add, Edit, Delete, View'),
(560, '0', 26, 'Add, Edit, Delete, View'),
(561, '0', 27, 'Add, Edit, Delete, View'),
(562, '0', 28, 'Add, Edit, Delete, View'),
(563, '0', 29, 'Add, Edit, Delete, View'),
(564, '0', 30, 'Add, Edit, Delete, View'),
(565, '0', 31, 'Add, Edit, Delete, View'),
(567, '0', 33, 'Add, Edit, Delete, View'),
(568, '0', 34, 'Add, Edit, Delete, View'),
(569, '0', 35, 'Add, Edit, Delete, View'),
(601, '0', 36, 'Add, Edit, Delete, View'),
(668, '0', 38, 'Add, Edit, Delete, View'),
(797, '0', 39, 'Add, Edit, Delete, View'),
(798, '0', 40, 'Add, Edit, Delete, View'),
(799, '0', 41, 'Add, Edit, Delete, View'),
(800, '0', 42, 'Add, Edit, Delete, View'),
(839, '0', 43, 'Add, Edit, Delete, View'),
(840, '0', 44, 'Add, Edit, Delete, View'),
(842, '1', 1, 'Add, Edit, Delete, View'),
(843, '1', 2, 'Add, Edit, Delete, View'),
(844, '1', 3, 'Add, Edit, Delete, View'),
(845, '1', 4, 'Add, Edit, Delete, View'),
(846, '1', 5, 'Add, Edit, Delete, View'),
(847, '1', 6, 'Add, Edit, Delete, View'),
(848, '1', 7, 'Add, Edit, Delete, View'),
(849, '1', 8, 'Add, Edit, Delete, View'),
(850, '1', 9, 'Add, Edit, Delete, View'),
(851, '1', 10, 'Add, Edit, Delete, View'),
(852, '1', 11, 'Add, Edit, Delete, View'),
(853, '1', 12, 'Add, Edit, Delete, View'),
(854, '1', 13, 'Add, Edit, Delete, View'),
(855, '1', 14, 'Add, Edit, Delete, View'),
(856, '1', 15, 'Add, Edit, Delete, View'),
(857, '1', 16, 'Add, Edit, Delete, View'),
(858, '1', 17, 'Add, Edit, Delete, View'),
(859, '1', 18, 'Add, Edit, Delete, View'),
(860, '1', 19, 'Add, Edit, Delete, View'),
(861, '1', 20, 'Add, Edit, Delete, View'),
(862, '1', 21, 'Add, Edit, Delete, View'),
(863, '1', 22, 'Add, Edit, Delete, View'),
(864, '1', 23, 'Add, Edit, Delete, View'),
(865, '1', 24, 'Add, Edit, Delete, View'),
(866, '1', 25, 'Add, Edit, Delete, View'),
(867, '1', 26, 'Add, Edit, Delete, View'),
(868, '1', 27, 'Add, Edit, Delete, View'),
(869, '1', 28, 'Add, Edit, Delete, View'),
(870, '1', 29, 'Add, Edit, Delete, View'),
(871, '1', 30, 'Add, Edit, Delete, View'),
(872, '1', 31, 'Add, Edit, Delete, View'),
(873, '1', 33, 'Add, Edit, Delete, View'),
(874, '1', 34, 'Add, Edit, Delete, View'),
(875, '1', 35, 'Add, Edit, Delete, View'),
(876, '1', 36, 'Add, Edit, Delete, View'),
(877, '1', 37, 'Add, Edit, Delete, View'),
(878, '1', 38, 'Add, Edit, Delete, View'),
(879, '1', 39, 'Add, Edit, Delete, View'),
(880, '1', 40, 'Add, Edit, Delete, View'),
(881, '1', 41, 'Add, Edit, Delete, View'),
(882, '1', 42, 'Add, Edit, Delete, View'),
(883, '1', 43, 'Add, Edit, Delete, View'),
(884, '1', 44, 'Add, Edit, Delete, View'),
(886, '0', 46, 'Add, Edit, Delete, View'),
(887, '2', 19, 'Add, Edit, Delete, View'),
(888, '2', 20, 'Add, Edit, Delete, View'),
(889, '2', 21, 'Add, Edit, Delete, View'),
(890, '2', 22, 'Add, Edit, Delete, View'),
(891, '2', 23, 'Add, Edit, Delete, View'),
(892, '2', 24, 'Add, Edit, Delete, View'),
(893, '2', 25, 'Add, Edit, Delete, View'),
(894, '2', 26, 'Add, Edit, Delete, View'),
(895, '2', 27, 'Add, Edit, Delete, View'),
(896, '2', 28, 'Add, Edit, Delete, View'),
(897, '2', 29, 'Add, Edit, Delete, View'),
(898, '2', 30, 'Add, Edit, Delete, View'),
(899, '2', 31, 'Add, Edit, Delete, View'),
(900, '2', 33, 'Add, Edit, Delete, View'),
(901, '2', 34, 'Add, Edit, Delete, View'),
(902, '2', 35, 'Add, Edit, Delete, View'),
(903, '2', 36, 'Add, Edit, Delete, View'),
(904, '2', 37, 'Add, Edit, Delete, View'),
(905, '2', 38, 'Add, Edit, Delete, View'),
(906, '2', 39, 'Add, Edit, Delete, View'),
(907, '2', 40, 'Add, Edit, Delete, View'),
(908, '2', 41, 'Add, Edit, Delete, View'),
(909, '2', 42, 'Add, Edit, Delete, View'),
(910, '2', 43, 'Add, Edit, Delete, View'),
(911, '2', 44, 'Add, Edit, Delete, View'),
(913, '2', 46, 'Add, Edit, Delete, View'),
(914, '0', 47, 'Add, Edit, Delete, View'),
(915, '0', 48, 'Add, Edit, Delete, View'),
(916, '0', 49, 'Add, Edit, Delete, View'),
(917, '0', 50, 'Add, Edit, Delete, View'),
(918, '0', 51, 'Add, Edit, Delete, View'),
(919, '0', 52, 'Add, Edit, Delete, View'),
(920, '0', 53, 'Add, Edit, Delete, View'),
(921, '0', 54, 'Add, Edit, Delete, View'),
(922, '0', 55, 'Add, Edit, Delete, View'),
(923, '0', 56, 'Add, Edit, Delete, View'),
(924, '0', 57, 'Add, Edit, Delete, View'),
(925, '0', 58, 'Add, Edit, Delete, View'),
(926, '0', 59, 'Add, Edit, Delete, View'),
(927, '0', 60, 'Add, Edit, Delete, View');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `userid` int(11) NOT NULL,
  `username` text NOT NULL,
  `usr_code` varchar(500) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `image` varchar(300) NOT NULL,
  `userdate` date NOT NULL,
  `uniqueToken` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`userid`, `username`, `usr_code`, `role`, `password`, `image`, `userdate`, `uniqueToken`) VALUES
(0, 'Maruf', 'admin', '1', 'e10adc3949ba59abbe56e057f20f883e', '2014093031659.png', '2013-09-09', ''),
(1, 'Rony', 'rony', '2', 'e10adc3949ba59abbe56e057f20f883e', '', '2016-08-17', ''),
(2, 'Rashedul Islam', 'kuddus', '3', 'e10adc3949ba59abbe56e057f20f883e', '', '2017-02-14', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hierarchy`
--
ALTER TABLE `hierarchy`
  ADD PRIMARY KEY (`hierarchy_id`);

--
-- Indexes for table `req_company`
--
ALTER TABLE `req_company`
  ADD PRIMARY KEY (`iCompanyId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `select_percentage`
--
ALTER TABLE `select_percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_sub_assign`
--
ALTER TABLE `student_sub_assign`
  ADD PRIMARY KEY (`sub_assign_id`);

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_academic_effects`
--
ALTER TABLE `tbl_academic_effects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_academic_information`
--
ALTER TABLE `tbl_academic_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance_teacher`
--
ALTER TABLE `tbl_attendance_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `tbl_class_teacher_assign`
--
ALTER TABLE `tbl_class_teacher_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `tbl_exam_routine`
--
ALTER TABLE `tbl_exam_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fee_category`
--
ALTER TABLE `tbl_fee_category`
  ADD PRIMARY KEY (`fee_category_id`);

--
-- Indexes for table `tbl_fee_report`
--
ALTER TABLE `tbl_fee_report`
  ADD PRIMARY KEY (`fee_report_id`);

--
-- Indexes for table `tbl_fee_sub_category`
--
ALTER TABLE `tbl_fee_sub_category`
  ADD PRIMARY KEY (`fee_sub_category_id`);

--
-- Indexes for table `tbl_form`
--
ALTER TABLE `tbl_form`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbl_full_marks`
--
ALTER TABLE `tbl_full_marks`
  ADD PRIMARY KEY (`full_marks_id`);

--
-- Indexes for table `tbl_grade_assign`
--
ALTER TABLE `tbl_grade_assign`
  ADD PRIMARY KEY (`grade_assign_id`),
  ADD UNIQUE KEY `grade_assign_id` (`grade_assign_id`);

--
-- Indexes for table `tbl_grade_total`
--
ALTER TABLE `tbl_grade_total`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tbl_important_information`
--
ALTER TABLE `tbl_important_information`
  ADD PRIMARY KEY (`important_information_id`);

--
-- Indexes for table `tbl_marksheet`
--
ALTER TABLE `tbl_marksheet`
  ADD PRIMARY KEY (`tbl_marksheet_id`);

--
-- Indexes for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbl_photo_catagory`
--
ALTER TABLE `tbl_photo_catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `tbl_photo_gallery`
--
ALTER TABLE `tbl_photo_gallery`
  ADD PRIMARY KEY (`photo_gallery_id`);

--
-- Indexes for table `tbl_principal_message`
--
ALTER TABLE `tbl_principal_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_req_fee_report`
--
ALTER TABLE `tbl_req_fee_report`
  ADD PRIMARY KEY (`req_fee_report_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  ADD PRIMARY KEY (`shift_id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `tbl_slide_image`
--
ALTER TABLE `tbl_slide_image`
  ADD PRIMARY KEY (`slide_image_id`);

--
-- Indexes for table `tbl_student_alumini`
--
ALTER TABLE `tbl_student_alumini`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_student_due`
--
ALTER TABLE `tbl_student_due`
  ADD PRIMARY KEY (`student_due_id`);

--
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_student_routine`
--
ALTER TABLE `tbl_student_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stuff_recruitment`
--
ALTER TABLE `tbl_stuff_recruitment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_teacher_pay`
--
ALTER TABLE `tbl_teacher_pay`
  ADD PRIMARY KEY (`tbl_teacher_pay_id`);

--
-- Indexes for table `tbl_teacher_registration`
--
ALTER TABLE `tbl_teacher_registration`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tbl_teacher_salary`
--
ALTER TABLE `tbl_teacher_salary`
  ADD PRIMARY KEY (`teacher_salary_id`);

--
-- Indexes for table `tbl_term`
--
ALTER TABLE `tbl_term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `tbl_term_sector`
--
ALTER TABLE `tbl_term_sector`
  ADD PRIMARY KEY (`term_sector_id`);

--
-- Indexes for table `tbl_weeks`
--
ALTER TABLE `tbl_weeks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_routine`
--
ALTER TABLE `teachers_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_modules`
--
ALTER TABLE `t_modules`
  ADD PRIMARY KEY (`moduleid`);

--
-- Indexes for table `t_user_module`
--
ALTER TABLE `t_user_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hierarchy`
--
ALTER TABLE `hierarchy`
  MODIFY `hierarchy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `req_company`
--
ALTER TABLE `req_company`
  MODIFY `iCompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `select_percentage`
--
ALTER TABLE `select_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_sub_assign`
--
ALTER TABLE `student_sub_assign`
  MODIFY `sub_assign_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_academic_effects`
--
ALTER TABLE `tbl_academic_effects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_academic_information`
--
ALTER TABLE `tbl_academic_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `tbl_attendance_teacher`
--
ALTER TABLE `tbl_attendance_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_class_teacher_assign`
--
ALTER TABLE `tbl_class_teacher_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_exam_routine`
--
ALTER TABLE `tbl_exam_routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_fee_category`
--
ALTER TABLE `tbl_fee_category`
  MODIFY `fee_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_fee_report`
--
ALTER TABLE `tbl_fee_report`
  MODIFY `fee_report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_fee_sub_category`
--
ALTER TABLE `tbl_fee_sub_category`
  MODIFY `fee_sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_form`
--
ALTER TABLE `tbl_form`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_full_marks`
--
ALTER TABLE `tbl_full_marks`
  MODIFY `full_marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_grade_assign`
--
ALTER TABLE `tbl_grade_assign`
  MODIFY `grade_assign_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_grade_total`
--
ALTER TABLE `tbl_grade_total`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_important_information`
--
ALTER TABLE `tbl_important_information`
  MODIFY `important_information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_marksheet`
--
ALTER TABLE `tbl_marksheet`
  MODIFY `tbl_marksheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_photo_catagory`
--
ALTER TABLE `tbl_photo_catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_photo_gallery`
--
ALTER TABLE `tbl_photo_gallery`
  MODIFY `photo_gallery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_principal_message`
--
ALTER TABLE `tbl_principal_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_req_fee_report`
--
ALTER TABLE `tbl_req_fee_report`
  MODIFY `req_fee_report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_session`
--
ALTER TABLE `tbl_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_slide_image`
--
ALTER TABLE `tbl_slide_image`
  MODIFY `slide_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_student_alumini`
--
ALTER TABLE `tbl_student_alumini`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_due`
--
ALTER TABLE `tbl_student_due`
  MODIFY `student_due_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_student_routine`
--
ALTER TABLE `tbl_student_routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_stuff_recruitment`
--
ALTER TABLE `tbl_stuff_recruitment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_teacher_pay`
--
ALTER TABLE `tbl_teacher_pay`
  MODIFY `tbl_teacher_pay_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_teacher_registration`
--
ALTER TABLE `tbl_teacher_registration`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_teacher_salary`
--
ALTER TABLE `tbl_teacher_salary`
  MODIFY `teacher_salary_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_term`
--
ALTER TABLE `tbl_term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_term_sector`
--
ALTER TABLE `tbl_term_sector`
  MODIFY `term_sector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_weeks`
--
ALTER TABLE `tbl_weeks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teachers_routine`
--
ALTER TABLE `teachers_routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_modules`
--
ALTER TABLE `t_modules`
  MODIFY `moduleid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'module id', AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `t_user_module`
--
ALTER TABLE `t_user_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=928;
--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
