-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2013 at 11:45 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `left_menu`
--

CREATE TABLE IF NOT EXISTS `left_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `left_menu_name` varchar(200) DEFAULT NULL,
  `left_menu1_id` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `left_menu`
--

INSERT INTO `left_menu` (`id`, `left_menu_name`, `left_menu1_id`, `file_name`) VALUES
(1, 'Student Info', NULL, NULL),
(2, 'Exam Info', NULL, NULL),
(3, 'Student Fee Info', NULL, NULL),
(4, 'Course Info', NULL, NULL),
(5, 'Class Routine', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `left_menu2`
--

CREATE TABLE IF NOT EXISTS `left_menu2` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `left_menu1_name` varchar(200) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `left_menu2`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `main_name` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `user_acl` varchar(100) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `ordering` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `main_name`, `file_name`, `user_acl`, `remarks`, `ordering`) VALUES
(1, 'Home', NULL, NULL, NULL, 1),
(2, 'Administration', NULL, NULL, NULL, 8),
(3, 'View', NULL, NULL, NULL, 2),
(5, 'Accounting', NULL, NULL, NULL, 6),
(6, 'Option', NULL, NULL, NULL, 3),
(8, 'Student Fee', NULL, NULL, NULL, 4),
(9, 'Teachers Info', NULL, NULL, NULL, 7),
(10, 'Menu Permission', NULL, NULL, NULL, 9),
(11, 'Fee', NULL, NULL, NULL, 4),
(12, 'Exam & Result', NULL, NULL, NULL, 5),
(13, 'Dashboard', 'ref_home', NULL, NULL, NULL),
(14, 'Home', NULL, NULL, NULL, NULL),
(15, 'View', NULL, NULL, NULL, NULL),
(16, 'Option', NULL, NULL, NULL, NULL),
(17, 'Home', NULL, NULL, 'teacher', NULL),
(18, 'Home', NULL, NULL, 'accounts', NULL),
(19, 'Home', NULL, NULL, 'exam', NULL),
(20, 'Home', NULL, NULL, 'admin', NULL),
(21, 'Home', NULL, NULL, 'accounts', NULL),
(22, 'Accounting', NULL, NULL, 'accounts', NULL),
(23, 'Home', NULL, NULL, NULL, NULL),
(24, 'Administration', NULL, NULL, NULL, NULL),
(25, 'Home', NULL, NULL, NULL, NULL),
(26, 'Option', NULL, NULL, NULL, NULL),
(27, 'Home', NULL, NULL, NULL, NULL),
(28, 'Accademic Setting', NULL, NULL, NULL, NULL),
(29, 'Employment Setting', NULL, NULL, NULL, NULL),
(30, 'SMS', NULL, NULL, NULL, NULL),
(31, 'Notice Setting', NULL, NULL, NULL, NULL),
(32, 'View', NULL, NULL, NULL, NULL),
(33, 'Help', NULL, NULL, NULL, NULL),
(34, 'Home', NULL, NULL, 'library', NULL),
(35, 'View', NULL, NULL, 'library', NULL),
(36, 'Setting', NULL, NULL, 'library', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_sec`
--

CREATE TABLE IF NOT EXISTS `main_sec` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `main_sec`
--

INSERT INTO `main_sec` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `std_academic_year`
--

CREATE TABLE IF NOT EXISTS `std_academic_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `active_flag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_academic_year`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_book_list`
--

CREATE TABLE IF NOT EXISTS `std_book_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `book_title` varchar(200) DEFAULT NULL,
  `book_author` varchar(200) DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `std_book_list`
--

INSERT INTO `std_book_list` (`id`, `class_id`, `book_title`, `book_author`, `isbn`, `branch_id`) VALUES
(1, 0, 'book_title', 'book_author', 'isbn', 0),
(2, 0, 'book_title', 'book_author', 'isbn', 0),
(3, 0, 'book_title', 'book_author', 'isbn', 0),
(4, 0, 'book_title', 'book_author', 'isbn', 0),
(5, 0, 'book_title', 'book_author', 'isbn', 0),
(6, 0, 'book_title', 'book_author', 'isbn', 0),
(7, 0, 'book_title', 'book_author', 'isbn', 0),
(8, 0, 'book_title', 'book_author', 'isbn', 0),
(9, 0, 'book_title', 'book_author', 'isbn', 0),
(10, 0, 'book_title', 'book_author', 'isbn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `std_branch`
--

CREATE TABLE IF NOT EXISTS `std_branch` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `std_branch`
--

INSERT INTO `std_branch` (`id`, `branch_name`) VALUES
(1, 'branch1'),
(2, 'branch2'),
(3, 'branch3'),
(4, 'branch4'),
(5, 'branch5'),
(6, 'branch6'),
(7, 'branch7');

-- --------------------------------------------------------

--
-- Table structure for table `std_class_config`
--

CREATE TABLE IF NOT EXISTS `std_class_config` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(200) DEFAULT NULL,
  `no_of_student` varchar(100) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `total_CT` varchar(50) DEFAULT NULL,
  `total_st` varchar(50) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `daily_class` int(10) DEFAULT NULL,
  `class_start_time` varchar(10) DEFAULT NULL,
  `exam_fee` int(10) DEFAULT '0',
  `developement_fee` int(10) DEFAULT '0',
  `monthly_fee` int(10) DEFAULT '0',
  `hostel_fee` int(10) DEFAULT '0',
  `tution_fee` int(10) DEFAULT '0',
  `leb_fee` int(10) DEFAULT '0',
  `section_system` varchar(10) DEFAULT NULL,
  `class_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `std_class_config`
--

INSERT INTO `std_class_config` (`id`, `class_name`, `no_of_student`, `remarks`, `total_CT`, `total_st`, `branch_id`, `daily_class`, `class_start_time`, `exam_fee`, `developement_fee`, `monthly_fee`, `hostel_fee`, `tution_fee`, `leb_fee`, `section_system`, `class_order`) VALUES
(1, 'Class-1', '200', NULL, NULL, NULL, 1, 4, '8:30', 0, 0, 0, 0, 0, 0, NULL, 1),
(2, 'Class-2', '200', NULL, NULL, NULL, 1, 4, '8:30', 0, 0, 0, 0, 0, 0, NULL, 2),
(3, 'Class-3', '200', NULL, NULL, NULL, 1, 8, '8:30', 0, 0, 0, 0, 0, 0, NULL, 3),
(4, 'Class-4', '100', NULL, NULL, NULL, 1, 6, '8:30', 0, 0, 0, 0, 0, 0, NULL, 4),
(5, 'class-5', '100', NULL, NULL, NULL, 1, 8, '8:30', 0, 0, 0, 0, 0, 0, 'Z', 5);

-- --------------------------------------------------------

--
-- Table structure for table `std_class_exam`
--

CREATE TABLE IF NOT EXISTS `std_class_exam` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_id` int(100) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `class_sec` varchar(50) DEFAULT NULL,
  `stu_id` varchar(50) DEFAULT NULL,
  `stu_name` varchar(100) DEFAULT NULL,
  `exam_id` int(100) DEFAULT NULL,
  `exam_name` varchar(100) DEFAULT NULL,
  `sub_id` int(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `exam_date` varchar(100) DEFAULT NULL,
  `exam_num` double DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `period` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_class_exam`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_class_exam_arc`
--

CREATE TABLE IF NOT EXISTS `std_class_exam_arc` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_id` int(100) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `class_sec` varchar(50) DEFAULT NULL,
  `stu_id` int(100) DEFAULT NULL,
  `stu_name` varchar(100) DEFAULT NULL,
  `exam_id` int(100) DEFAULT NULL,
  `exam_name` varchar(100) DEFAULT NULL,
  `sub_id` int(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `exam_date` varchar(100) DEFAULT NULL,
  `exam_num` double DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_class_exam_arc`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_class_exam_mark_setting`
--

CREATE TABLE IF NOT EXISTS `std_class_exam_mark_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `class_sec` varchar(50) DEFAULT NULL,
  `stu_id` varchar(50) DEFAULT NULL,
  `sub_id` int(10) DEFAULT NULL,
  `subjective_mark` decimal(10,2) DEFAULT NULL,
  `objective_mark` decimal(10,2) DEFAULT NULL,
  `ct_mark` decimal(10,2) DEFAULT NULL,
  `total_mark` decimal(10,2) DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `point` decimal(10,2) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `period` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `std_class_exam_mark_setting`
--

INSERT INTO `std_class_exam_mark_setting` (`id`, `class_id`, `class_sec`, `stu_id`, `sub_id`, `subjective_mark`, `objective_mark`, `ct_mark`, `total_mark`, `grade`, `point`, `year`, `period`, `branch_id`) VALUES
(1, 1, 'A', '2013111', 101, '40.00', '40.00', '40.00', '114.29', 'A+', '5.00', '2013', 3, 1),
(2, 1, 'A', '2013111', 103, '20.00', '12.00', '12.00', '41.90', 'C-', '2.00', '2013', 3, 1),
(3, 1, 'A', '1', 101, '20.00', '30.00', '0.00', '47.62', 'C', '2.25', '2013', 1, 1),
(4, 1, 'A', '2', 101, '10.00', '20.00', '30.00', '57.14', 'B-', '3.00', '2013', 1, 1),
(5, 1, 'A', '3', 101, '50.00', '20.00', '10.00', '76.19', 'A', '4.50', '2013', 1, 1),
(6, 1, 'A', '4', 101, '30.00', '25.00', '0.00', '52.38', 'C+', '2.50', '2013', 1, 1),
(7, 1, 'A', '1', 103, '50.00', '20.00', '0.00', '66.67', 'B+', '3.50', '2013', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_class_info`
--

CREATE TABLE IF NOT EXISTS `std_class_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_id` int(100) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `class_sec` varchar(100) DEFAULT NULL,
  `stu_id` varchar(50) DEFAULT NULL,
  `stu_name` varchar(100) DEFAULT NULL,
  `class_roll` int(100) DEFAULT NULL,
  `total_open_day` int(50) DEFAULT NULL,
  `total_atten` int(50) DEFAULT NULL,
  `total_leave` int(20) DEFAULT NULL,
  `total_abs` int(10) DEFAULT NULL,
  `stuts` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `final_marks` varchar(50) DEFAULT NULL,
  `branch_id` int(10) NOT NULL,
  `ovr_roll` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `std_class_info`
--

INSERT INTO `std_class_info` (`id`, `class_id`, `class_name`, `class_sec`, `stu_id`, `stu_name`, `class_roll`, `total_open_day`, `total_atten`, `total_leave`, `total_abs`, `stuts`, `remarks`, `year`, `result`, `final_marks`, `branch_id`, `ovr_roll`) VALUES
(11, 2, 'Class-2', 'A', '2013111', 'Shahin', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'B+', NULL, 1, 1),
(2, 1, 'Class-1', 'B', '2013122', 'Faruk', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 1),
(3, 1, 'Class-1', 'B', '2013123', 'Jahid', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 2),
(4, 1, 'Class-1', 'A', '2013114', 'Sujan', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 3),
(5, 1, 'Class-1', 'A', '2013115', 'Hasan', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 4),
(6, 1, 'Class-1', 'B', '2013126', 'Ahsan', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 5),
(7, 1, 'Class-1', 'B', '2013127', 'Tanin', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 6),
(8, 1, 'Class-1', 'A', '2013118', 'Himel', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 7),
(9, 1, 'Class-1', 'A', '2013119', 'Urmi', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 8),
(10, 1, 'Class-1', 'A', '20131110', 'Raju', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 9),
(12, 5, 'class-5', 'A', '20135711', 'brinto', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 1),
(13, 1, 'Class-1', 'A', '20131112', 'tomal', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1, 10),
(14, 2, 'Class-2', 'A', '1', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'C+', NULL, 1, NULL),
(15, 2, 'Class-2', 'A', '2', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'D', NULL, 1, NULL),
(16, 2, 'Class-2', 'B', '3', '', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'C', NULL, 1, NULL),
(17, 2, 'Class-2', 'B', '4', '', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'D', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `std_class_info_arc`
--

CREATE TABLE IF NOT EXISTS `std_class_info_arc` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_id` int(100) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `class_sec` varchar(100) DEFAULT NULL,
  `stu_id` int(100) DEFAULT NULL,
  `stu_name` varchar(100) DEFAULT NULL,
  `class_roll` int(100) DEFAULT NULL,
  `total_open_day` int(50) DEFAULT NULL,
  `total_atten` int(50) DEFAULT NULL,
  `total_leave` int(20) DEFAULT NULL,
  `total_abs` int(10) DEFAULT NULL,
  `stuts` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `final_marks` varchar(50) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `std_class_info_arc`
--

INSERT INTO `std_class_info_arc` (`id`, `class_id`, `class_name`, `class_sec`, `stu_id`, `stu_name`, `class_roll`, `total_open_day`, `total_atten`, `total_leave`, `total_abs`, `stuts`, `remarks`, `year`, `result`, `final_marks`, `branch_id`) VALUES
(1, 1, 'Class-1', 'A', 2013111, 'Shahin', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2013', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_class_period`
--

CREATE TABLE IF NOT EXISTS `std_class_period` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `break_flag` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`period_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=11 ;

--
-- Dumping data for table `std_class_period`
--

INSERT INTO `std_class_period` (`period_id`, `period`, `start_time`, `end_time`, `entry_date`, `break_flag`, `branch_id`, `flag`) VALUES
(1, '1st', '08:30:00', '09:15:00', '2013-03-11', 0, '1', 1),
(2, '2nd', '09:20:00', '10:00:00', '2013-03-12', 0, '1', 1),
(3, '3rd', '10:10:00', '10:40:00', '2013-03-12', 0, '1', 1),
(4, 'Tiffin', '10:40:00', '11:10:00', '2013-03-12', 1, '1', 1),
(5, '4th', '11:10:00', '11:40:00', '2013-03-12', 0, '1', 1),
(6, '5th', '11:20:00', '12:00:00', '2013-03-12', 0, '1', 1),
(7, '6th', '12:10:00', '12:40:00', '2013-03-12', 0, '1', 1),
(8, '7th', '12:45:00', '13:15:00', '2013-03-12', 0, '1', 1),
(9, '8th', '13:25:00', '14:00:00', '2013-03-12', 0, '1', 1),
(10, '9th', '14:05:00', '14:40:00', '2013-03-12', 0, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_class_routine`
--

CREATE TABLE IF NOT EXISTS `std_class_routine` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `period` varchar(10) DEFAULT NULL,
  `day_sat` varchar(50) DEFAULT NULL,
  `day_sun` varchar(50) DEFAULT NULL,
  `day_mon` varchar(50) DEFAULT NULL,
  `day_tue` varchar(50) DEFAULT NULL,
  `day_wed` varchar(50) DEFAULT NULL,
  `day_thus` varchar(50) DEFAULT NULL,
  `class_id` int(3) DEFAULT NULL,
  `sec_id` int(3) DEFAULT NULL,
  `class_time` varchar(20) DEFAULT NULL,
  `Class_name` varchar(50) DEFAULT NULL,
  `sec_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_class_routine`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_class_routine_2`
--

CREATE TABLE IF NOT EXISTS `std_class_routine_2` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `period` varchar(10) DEFAULT NULL,
  `day_sat` varchar(50) DEFAULT NULL,
  `day_sun` varchar(50) DEFAULT NULL,
  `day_mon` varchar(50) DEFAULT NULL,
  `day_tue` varchar(50) DEFAULT NULL,
  `day_wed` varchar(50) DEFAULT NULL,
  `day_thus` varchar(50) DEFAULT NULL,
  `class_id` int(3) DEFAULT NULL,
  `sec_id` int(3) DEFAULT NULL,
  `class_time` time DEFAULT NULL,
  `Class_name` varchar(50) DEFAULT NULL,
  `sec_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_class_routine_2`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_class_routine_new`
--

CREATE TABLE IF NOT EXISTS `std_class_routine_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT '0',
  `subject_id` int(11) DEFAULT '0',
  `break_flag` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active_flag` int(11) NOT NULL DEFAULT '1',
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=481 ;

--
-- Dumping data for table `std_class_routine_new`
--

INSERT INTO `std_class_routine_new` (`id`, `day`, `period_id`, `class_id`, `section_id`, `teacher_id`, `subject_id`, `break_flag`, `branch_id`, `active_flag`, `entry_date`) VALUES
(1, 1, 1, 1, 1, 2, 1, 0, '1', 1, '2013-03-14'),
(2, 1, 2, 1, 1, 1, 1, 0, '1', 1, '2013-03-14'),
(3, 1, 3, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(4, 1, 4, 1, 1, 0, 0, 1, '1', 1, '2013-03-14'),
(5, 1, 5, 1, 1, 2, 1, 0, '1', 1, '2013-03-14'),
(6, 1, 6, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(7, 1, 7, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(8, 1, 8, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(9, 1, 9, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(10, 1, 10, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(11, 1, 1, 1, 2, 1, 3, 0, '1', 1, '2013-03-14'),
(12, 1, 2, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(13, 1, 3, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(14, 1, 4, 1, 2, 0, 0, 1, '1', 1, '2013-03-14'),
(15, 1, 5, 1, 2, 1, 1, 0, '1', 1, '2013-03-14'),
(16, 1, 6, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(17, 1, 7, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(18, 1, 8, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(19, 1, 9, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(20, 1, 10, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(21, 1, 1, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(22, 1, 2, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(23, 1, 3, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(24, 1, 4, 2, 3, 0, 0, 1, '1', 1, '2013-03-14'),
(25, 1, 5, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(26, 1, 6, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(27, 1, 7, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(28, 1, 8, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(29, 1, 9, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(30, 1, 10, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(31, 1, 1, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(32, 1, 2, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(33, 1, 3, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(34, 1, 4, 2, 4, 0, 0, 1, '1', 1, '2013-03-14'),
(35, 1, 5, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(36, 1, 6, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(37, 1, 7, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(38, 1, 8, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(39, 1, 9, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(40, 1, 10, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(41, 1, 1, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(42, 1, 2, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(43, 1, 3, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(44, 1, 4, 3, 5, 0, 0, 1, '1', 1, '2013-03-14'),
(45, 1, 5, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(46, 1, 6, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(47, 1, 7, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(48, 1, 8, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(49, 1, 9, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(50, 1, 10, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(51, 2, 1, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(52, 2, 2, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(53, 2, 3, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(54, 2, 4, 1, 1, 0, 0, 1, '1', 1, '2013-03-14'),
(55, 2, 5, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(56, 2, 6, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(57, 2, 7, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(58, 2, 8, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(59, 2, 9, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(60, 2, 10, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(61, 2, 1, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(62, 2, 2, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(63, 2, 3, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(64, 2, 4, 1, 2, 0, 0, 1, '1', 1, '2013-03-14'),
(65, 2, 5, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(66, 2, 6, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(67, 2, 7, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(68, 2, 8, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(69, 2, 9, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(70, 2, 10, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(71, 2, 1, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(72, 2, 2, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(73, 2, 3, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(74, 2, 4, 2, 3, 0, 0, 1, '1', 1, '2013-03-14'),
(75, 2, 5, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(76, 2, 6, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(77, 2, 7, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(78, 2, 8, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(79, 2, 9, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(80, 2, 10, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(81, 2, 1, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(82, 2, 2, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(83, 2, 3, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(84, 2, 4, 2, 4, 0, 0, 1, '1', 1, '2013-03-14'),
(85, 2, 5, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(86, 2, 6, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(87, 2, 7, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(88, 2, 8, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(89, 2, 9, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(90, 2, 10, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(91, 2, 1, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(92, 2, 2, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(93, 2, 3, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(94, 2, 4, 3, 5, 0, 0, 1, '1', 1, '2013-03-14'),
(95, 2, 5, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(96, 2, 6, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(97, 2, 7, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(98, 2, 8, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(99, 2, 9, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(100, 2, 10, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(101, 3, 1, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(102, 3, 2, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(103, 3, 3, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(104, 3, 4, 1, 1, 0, 0, 1, '1', 1, '2013-03-14'),
(105, 3, 5, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(106, 3, 6, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(107, 3, 7, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(108, 3, 8, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(109, 3, 9, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(110, 3, 10, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(111, 3, 1, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(112, 3, 2, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(113, 3, 3, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(114, 3, 4, 1, 2, 0, 0, 1, '1', 1, '2013-03-14'),
(115, 3, 5, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(116, 3, 6, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(117, 3, 7, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(118, 3, 8, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(119, 3, 9, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(120, 3, 10, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(121, 3, 1, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(122, 3, 2, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(123, 3, 3, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(124, 3, 4, 2, 3, 0, 0, 1, '1', 1, '2013-03-14'),
(125, 3, 5, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(126, 3, 6, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(127, 3, 7, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(128, 3, 8, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(129, 3, 9, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(130, 3, 10, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(131, 3, 1, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(132, 3, 2, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(133, 3, 3, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(134, 3, 4, 2, 4, 0, 0, 1, '1', 1, '2013-03-14'),
(135, 3, 5, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(136, 3, 6, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(137, 3, 7, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(138, 3, 8, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(139, 3, 9, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(140, 3, 10, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(141, 3, 1, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(142, 3, 2, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(143, 3, 3, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(144, 3, 4, 3, 5, 0, 0, 1, '1', 1, '2013-03-14'),
(145, 3, 5, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(146, 3, 6, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(147, 3, 7, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(148, 3, 8, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(149, 3, 9, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(150, 3, 10, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(151, 4, 1, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(152, 4, 2, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(153, 4, 3, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(154, 4, 4, 1, 1, 0, 0, 1, '1', 1, '2013-03-14'),
(155, 4, 5, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(156, 4, 6, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(157, 4, 7, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(158, 4, 8, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(159, 4, 9, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(160, 4, 10, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(161, 4, 1, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(162, 4, 2, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(163, 4, 3, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(164, 4, 4, 1, 2, 0, 0, 1, '1', 1, '2013-03-14'),
(165, 4, 5, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(166, 4, 6, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(167, 4, 7, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(168, 4, 8, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(169, 4, 9, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(170, 4, 10, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(171, 4, 1, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(172, 4, 2, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(173, 4, 3, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(174, 4, 4, 2, 3, 0, 0, 1, '1', 1, '2013-03-14'),
(175, 4, 5, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(176, 4, 6, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(177, 4, 7, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(178, 4, 8, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(179, 4, 9, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(180, 4, 10, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(181, 4, 1, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(182, 4, 2, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(183, 4, 3, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(184, 4, 4, 2, 4, 0, 0, 1, '1', 1, '2013-03-14'),
(185, 4, 5, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(186, 4, 6, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(187, 4, 7, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(188, 4, 8, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(189, 4, 9, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(190, 4, 10, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(191, 4, 1, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(192, 4, 2, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(193, 4, 3, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(194, 4, 4, 3, 5, 0, 0, 1, '1', 1, '2013-03-14'),
(195, 4, 5, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(196, 4, 6, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(197, 4, 7, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(198, 4, 8, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(199, 4, 9, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(200, 4, 10, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(201, 5, 1, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(202, 5, 2, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(203, 5, 3, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(204, 5, 4, 1, 1, 0, 0, 1, '1', 1, '2013-03-14'),
(205, 5, 5, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(206, 5, 6, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(207, 5, 7, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(208, 5, 8, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(209, 5, 9, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(210, 5, 10, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(211, 5, 1, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(212, 5, 2, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(213, 5, 3, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(214, 5, 4, 1, 2, 0, 0, 1, '1', 1, '2013-03-14'),
(215, 5, 5, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(216, 5, 6, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(217, 5, 7, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(218, 5, 8, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(219, 5, 9, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(220, 5, 10, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(221, 5, 1, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(222, 5, 2, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(223, 5, 3, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(224, 5, 4, 2, 3, 0, 0, 1, '1', 1, '2013-03-14'),
(225, 5, 5, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(226, 5, 6, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(227, 5, 7, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(228, 5, 8, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(229, 5, 9, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(230, 5, 10, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(231, 5, 1, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(232, 5, 2, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(233, 5, 3, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(234, 5, 4, 2, 4, 0, 0, 1, '1', 1, '2013-03-14'),
(235, 5, 5, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(236, 5, 6, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(237, 5, 7, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(238, 5, 8, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(239, 5, 9, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(240, 5, 10, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(241, 5, 1, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(242, 5, 2, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(243, 5, 3, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(244, 5, 4, 3, 5, 0, 0, 1, '1', 1, '2013-03-14'),
(245, 5, 5, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(246, 5, 6, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(247, 5, 7, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(248, 5, 8, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(249, 5, 9, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(250, 5, 10, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(251, 6, 1, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(252, 6, 2, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(253, 6, 3, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(254, 6, 4, 1, 1, 0, 0, 1, '1', 1, '2013-03-14'),
(255, 6, 5, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(256, 6, 6, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(257, 6, 7, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(258, 6, 8, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(259, 6, 9, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(260, 6, 10, 1, 1, 0, 0, 0, '1', 1, '2013-03-14'),
(261, 6, 1, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(262, 6, 2, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(263, 6, 3, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(264, 6, 4, 1, 2, 0, 0, 1, '1', 1, '2013-03-14'),
(265, 6, 5, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(266, 6, 6, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(267, 6, 7, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(268, 6, 8, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(269, 6, 9, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(270, 6, 10, 1, 2, 0, 0, 0, '1', 1, '2013-03-14'),
(271, 6, 1, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(272, 6, 2, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(273, 6, 3, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(274, 6, 4, 2, 3, 0, 0, 1, '1', 1, '2013-03-14'),
(275, 6, 5, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(276, 6, 6, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(277, 6, 7, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(278, 6, 8, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(279, 6, 9, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(280, 6, 10, 2, 3, 0, 0, 0, '1', 1, '2013-03-14'),
(281, 6, 1, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(282, 6, 2, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(283, 6, 3, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(284, 6, 4, 2, 4, 0, 0, 1, '1', 1, '2013-03-14'),
(285, 6, 5, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(286, 6, 6, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(287, 6, 7, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(288, 6, 8, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(289, 6, 9, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(290, 6, 10, 2, 4, 0, 0, 0, '1', 1, '2013-03-14'),
(291, 6, 1, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(292, 6, 2, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(293, 6, 3, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(294, 6, 4, 3, 5, 0, 0, 1, '1', 1, '2013-03-14'),
(295, 6, 5, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(296, 6, 6, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(297, 6, 7, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(298, 6, 8, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(299, 6, 9, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(300, 6, 10, 3, 5, 0, 0, 0, '1', 1, '2013-03-14'),
(301, 1, 1, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(302, 1, 2, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(303, 1, 3, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(304, 1, 4, 5, 7, 0, 0, 1, '1', 1, '2013-03-17'),
(305, 1, 5, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(306, 1, 6, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(307, 1, 7, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(308, 1, 8, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(309, 1, 9, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(310, 1, 10, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(311, 1, 1, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(312, 1, 2, 5, 8, 2, 11, 0, '1', 1, '2013-03-17'),
(313, 1, 3, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(314, 1, 4, 5, 8, 0, 0, 1, '1', 1, '2013-03-17'),
(315, 1, 5, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(316, 1, 6, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(317, 1, 7, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(318, 1, 8, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(319, 1, 9, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(320, 1, 10, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(321, 2, 1, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(322, 2, 2, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(323, 2, 3, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(324, 2, 4, 5, 7, 0, 0, 1, '1', 1, '2013-03-17'),
(325, 2, 5, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(326, 2, 6, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(327, 2, 7, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(328, 2, 8, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(329, 2, 9, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(330, 2, 10, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(331, 2, 1, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(332, 2, 2, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(333, 2, 3, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(334, 2, 4, 5, 8, 0, 0, 1, '1', 1, '2013-03-17'),
(335, 2, 5, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(336, 2, 6, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(337, 2, 7, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(338, 2, 8, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(339, 2, 9, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(340, 2, 10, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(341, 3, 1, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(342, 3, 2, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(343, 3, 3, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(344, 3, 4, 5, 7, 0, 0, 1, '1', 1, '2013-03-17'),
(345, 3, 5, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(346, 3, 6, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(347, 3, 7, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(348, 3, 8, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(349, 3, 9, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(350, 3, 10, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(351, 3, 1, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(352, 3, 2, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(353, 3, 3, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(354, 3, 4, 5, 8, 0, 0, 1, '1', 1, '2013-03-17'),
(355, 3, 5, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(356, 3, 6, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(357, 3, 7, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(358, 3, 8, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(359, 3, 9, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(360, 3, 10, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(361, 4, 1, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(362, 4, 2, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(363, 4, 3, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(364, 4, 4, 5, 7, 0, 0, 1, '1', 1, '2013-03-17'),
(365, 4, 5, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(366, 4, 6, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(367, 4, 7, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(368, 4, 8, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(369, 4, 9, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(370, 4, 10, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(371, 4, 1, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(372, 4, 2, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(373, 4, 3, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(374, 4, 4, 5, 8, 0, 0, 1, '1', 1, '2013-03-17'),
(375, 4, 5, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(376, 4, 6, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(377, 4, 7, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(378, 4, 8, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(379, 4, 9, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(380, 4, 10, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(381, 5, 1, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(382, 5, 2, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(383, 5, 3, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(384, 5, 4, 5, 7, 0, 0, 1, '1', 1, '2013-03-17'),
(385, 5, 5, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(386, 5, 6, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(387, 5, 7, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(388, 5, 8, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(389, 5, 9, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(390, 5, 10, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(391, 5, 1, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(392, 5, 2, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(393, 5, 3, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(394, 5, 4, 5, 8, 0, 0, 1, '1', 1, '2013-03-17'),
(395, 5, 5, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(396, 5, 6, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(397, 5, 7, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(398, 5, 8, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(399, 5, 9, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(400, 5, 10, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(401, 6, 1, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(402, 6, 2, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(403, 6, 3, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(404, 6, 4, 5, 7, 0, 0, 1, '1', 1, '2013-03-17'),
(405, 6, 5, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(406, 6, 6, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(407, 6, 7, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(408, 6, 8, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(409, 6, 9, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(410, 6, 10, 5, 7, 0, 0, 0, '1', 1, '2013-03-17'),
(411, 6, 1, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(412, 6, 2, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(413, 6, 3, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(414, 6, 4, 5, 8, 0, 0, 1, '1', 1, '2013-03-17'),
(415, 6, 5, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(416, 6, 6, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(417, 6, 7, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(418, 6, 8, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(419, 6, 9, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(420, 6, 10, 5, 8, 0, 0, 0, '1', 1, '2013-03-17'),
(421, 1, 1, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(422, 1, 2, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(423, 1, 3, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(424, 1, 4, 4, 9, 0, 0, 1, '1', 1, '2013-03-27'),
(425, 1, 5, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(426, 1, 6, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(427, 1, 7, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(428, 1, 8, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(429, 1, 9, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(430, 1, 10, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(431, 2, 1, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(432, 2, 2, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(433, 2, 3, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(434, 2, 4, 4, 9, 0, 0, 1, '1', 1, '2013-03-27'),
(435, 2, 5, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(436, 2, 6, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(437, 2, 7, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(438, 2, 8, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(439, 2, 9, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(440, 2, 10, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(441, 3, 1, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(442, 3, 2, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(443, 3, 3, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(444, 3, 4, 4, 9, 0, 0, 1, '1', 1, '2013-03-27'),
(445, 3, 5, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(446, 3, 6, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(447, 3, 7, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(448, 3, 8, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(449, 3, 9, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(450, 3, 10, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(451, 4, 1, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(452, 4, 2, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(453, 4, 3, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(454, 4, 4, 4, 9, 0, 0, 1, '1', 1, '2013-03-27'),
(455, 4, 5, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(456, 4, 6, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(457, 4, 7, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(458, 4, 8, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(459, 4, 9, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(460, 4, 10, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(461, 5, 1, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(462, 5, 2, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(463, 5, 3, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(464, 5, 4, 4, 9, 0, 0, 1, '1', 1, '2013-03-27'),
(465, 5, 5, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(466, 5, 6, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(467, 5, 7, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(468, 5, 8, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(469, 5, 9, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(470, 5, 10, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(471, 6, 1, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(472, 6, 2, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(473, 6, 3, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(474, 6, 4, 4, 9, 0, 0, 1, '1', 1, '2013-03-27'),
(475, 6, 5, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(476, 6, 6, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(477, 6, 7, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(478, 6, 8, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(479, 6, 9, 4, 9, 0, 0, 0, '1', 1, '2013-03-27'),
(480, 6, 10, 4, 9, 0, 0, 0, '1', 1, '2013-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `std_class_routine_test`
--

CREATE TABLE IF NOT EXISTS `std_class_routine_test` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `period` varchar(10) DEFAULT NULL,
  `day_sat` varchar(50) DEFAULT NULL,
  `day_sun` varchar(50) DEFAULT NULL,
  `day_mon` varchar(50) DEFAULT NULL,
  `day_tue` varchar(50) DEFAULT NULL,
  `day_wed` varchar(50) DEFAULT NULL,
  `day_thus` varchar(50) DEFAULT NULL,
  `class_id` int(3) DEFAULT NULL,
  `sec_id` int(3) DEFAULT NULL,
  `class_time` time DEFAULT NULL,
  `Class_name` varchar(50) DEFAULT NULL,
  `sec_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `std_class_routine_test`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_class_section_config`
--

CREATE TABLE IF NOT EXISTS `std_class_section_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(10) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `class_name` varchar(20) DEFAULT NULL,
  `class_teacher_id` int(10) DEFAULT NULL,
  `class_teacher_name` varchar(100) DEFAULT NULL,
  `subject_id` int(10) DEFAULT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `no_of_student` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `section_system` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `std_class_section_config`
--

INSERT INTO `std_class_section_config` (`id`, `section_name`, `class_id`, `class_name`, `class_teacher_id`, `class_teacher_name`, `subject_id`, `subject_name`, `no_of_student`, `branch_id`, `group_id`, `section_system`) VALUES
(1, 'A', 1, 'Class-1', 0, 'Bithi', 1, 'Bangla', 100, 1, NULL, 'E'),
(2, 'B', 1, 'Class-1', 2, 'meherun', 3, 'Math', 100, 1, NULL, 'E'),
(3, 'A', 2, 'Class-2', 1, 'Bithi', 5, 'english', 100, 1, NULL, 'E'),
(4, 'B', 2, 'Class-2', 4, 'pankoj', 6, 'Math', 100, 1, NULL, 'E'),
(5, 'A', 3, 'Class-3', 5, 'Dulal', 7, 'Bangla', 100, 1, NULL, 'E'),
(7, 'A', 5, 'class-5', 1, 'khokon', 10, 'bangla', 40, 1, NULL, 'E'),
(8, 'B', 5, 'class-5', 2, 'Fahim', 11, 'english', 60, 1, NULL, 'E'),
(9, 'A', 4, 'Class-4', 3, 'Abdul Mojid', 13, 'English', 100, 1, NULL, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `std_class_student_info`
--

CREATE TABLE IF NOT EXISTS `std_class_student_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_id` int(100) DEFAULT NULL,
  `sec_id` int(10) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `class_sec` varchar(100) DEFAULT NULL,
  `stu_id` varchar(50) DEFAULT NULL,
  `stu_name` varchar(100) DEFAULT NULL,
  `class_roll` int(100) DEFAULT NULL,
  `total_open_day` int(50) DEFAULT NULL,
  `total_atten` int(50) DEFAULT NULL,
  `total_leave` int(20) DEFAULT NULL,
  `total_abs` int(10) DEFAULT NULL,
  `stuts` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `final_marks` varchar(50) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `ovr_roll` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `std_class_student_info`
--

INSERT INTO `std_class_student_info` (`id`, `class_id`, `sec_id`, `class_name`, `class_sec`, `stu_id`, `stu_name`, `class_roll`, `total_open_day`, `total_atten`, `total_leave`, `total_abs`, `stuts`, `remarks`, `year`, `result`, `final_marks`, `branch_id`, `branch_name`, `group_id`, `group_name`, `ovr_roll`) VALUES
(11, 2, 1, 'Class-2', 'A', '2013111', 'Shahin', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'B+', NULL, 1, NULL, NULL, NULL, 1),
(2, 1, 2, 'Class-1', 'B', '2013122', 'Faruk', 1, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 1),
(3, 1, 2, 'Class-1', 'B', '2013123', 'Jahid', 2, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 2),
(4, 1, 1, 'Class-1', 'A', '2013114', 'Sujan', 2, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 3),
(5, 1, 1, 'Class-1', 'A', '2013115', 'Hasan', 3, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 4),
(6, 1, 2, 'Class-1', 'B', '2013126', 'Ahsan', 3, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 5),
(7, 1, 2, 'Class-1', 'B', '2013127', 'Tanin', 4, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 6),
(8, 1, 1, 'Class-1', 'A', '2013118', 'Himel', 4, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 7),
(9, 1, 1, 'Class-1', 'A', '2013119', 'Urmi', 5, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 8),
(10, 1, 1, 'Class-1', 'A', '20131110', 'Raju', 6, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 9),
(12, 5, 7, 'class-5', 'A', '20135711', 'brinto', 1, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 1),
(13, 1, 1, 'Class-1', 'A', '20131112', 'tomal', 7, NULL, NULL, NULL, NULL, 'Admitted', NULL, '2013', NULL, NULL, 1, NULL, NULL, NULL, 10),
(14, 2, NULL, 'Class-2', 'A', '1', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'C+', NULL, 1, NULL, NULL, NULL, NULL),
(15, 2, NULL, 'Class-2', 'A', '2', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'D', NULL, 1, NULL, NULL, NULL, NULL),
(16, 2, NULL, 'Class-2', 'B', '3', '', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'C', NULL, 1, NULL, NULL, NULL, NULL),
(17, 2, NULL, 'Class-2', 'B', '4', '', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2014', 'D', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `std_exam_config`
--

CREATE TABLE IF NOT EXISTS `std_exam_config` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(100) DEFAULT NULL,
  `period` varchar(100) DEFAULT NULL,
  `Prefix` varchar(10) DEFAULT NULL,
  `branch_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `std_exam_config`
--

INSERT INTO `std_exam_config` (`id`, `exam_name`, `period`, `Prefix`, `branch_id`) VALUES
(1, 'CT1', '1', 'C', 1),
(2, 'CT2', '1', 'C', 1),
(4, 'CT3', '1', 'C', 1),
(5, 'ST1', '1', 'S', 1),
(6, 'ST2', '1', 'S', 1),
(7, 'ST3', '1', 'S', 1),
(8, 'Term1', '1', 'T', 1),
(9, 'Term2', '2', 'T', 1),
(10, 'CT1', '2', 'C', 1),
(11, 'CT2', '2', 'C', 1),
(12, 'CT3', '2', 'C', 1),
(13, 'ST3', '2', 'S', 1),
(14, 'ST2', '2', 'S', 1),
(15, 'ST1', '2', 'S', 1),
(16, 'CT1', '2', 'C', 1),
(17, 'CT1', '3', 'C', 1),
(18, 'CT2', '3', 'C', 1),
(19, 'CT3', '3', 'C', 1),
(20, 'ST1', '3', 'S', 1),
(21, 'ST2', '3', 'S', 1),
(22, 'ST3', '3', 'S', 1),
(23, 'Term3', '3', 'T', 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_exam_config_new`
--

CREATE TABLE IF NOT EXISTS `std_exam_config_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_year` int(11) NOT NULL,
  `exam_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `period_ids` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `std_exam_config_new`
--

INSERT INTO `std_exam_config_new` (`id`, `academic_year`, `exam_name`, `period_ids`, `entry_date`, `flag`) VALUES
(1, 2013, '1st Term', '-1,1,2,3,-1', '2013-03-31', 1),
(2, 2013, '2nd Term', '-1,1,2,3,-1', '2013-03-31', 1),
(3, 2013, 'Final', '-1,4,5,6,-1', '2013-03-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_exam_period`
--

CREATE TABLE IF NOT EXISTS `std_exam_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `std_exam_period`
--

INSERT INTO `std_exam_period` (`id`, `period`, `start_time`, `end_time`, `flag`, `entry_date`) VALUES
(1, '1st Exam', '07:00:00', '09:30:00', 1, '2013-03-31'),
(2, '2nd Exam', '10:00:00', '12:30:00', 1, '2013-03-31'),
(3, '3rd Exam', '14:00:00', '16:30:00', 1, '2013-03-31'),
(4, '1st Exam', '07:00:00', '10:00:00', 1, '2013-03-31'),
(5, '2nd Exam', '10:30:00', '01:30:00', 1, '2013-03-31'),
(6, '3rd Exam', '14:15:00', '17:15:00', 1, '2013-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `std_exam_routine_new`
--

CREATE TABLE IF NOT EXISTS `std_exam_routine_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_year` int(11) NOT NULL,
  `exam_name_id` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_period_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL DEFAULT '0',
  `subject_id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `std_exam_routine_new`
--

INSERT INTO `std_exam_routine_new` (`id`, `academic_year`, `exam_name_id`, `exam_date`, `exam_period_id`, `start_time`, `end_time`, `class_id`, `section_id`, `subject_id`, `entry_date`, `branch_id`, `flag`) VALUES
(1, 2013, 1, '2013-04-03', 1, '07:00:00', '09:30:00', 1, 0, 1, '2013-04-03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_exam_schedule`
--

CREATE TABLE IF NOT EXISTS `std_exam_schedule` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(100) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `exam_id` int(10) DEFAULT NULL,
  `exam_name` varchar(100) DEFAULT NULL,
  `period` int(10) DEFAULT NULL,
  `subject_id` int(10) DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `exam_date` varchar(100) DEFAULT NULL,
  `exam_start_time` varchar(100) DEFAULT NULL,
  `exam_end_time` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `section_id` int(10) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `std_exam_schedule`
--

INSERT INTO `std_exam_schedule` (`id`, `class_id`, `class_name`, `exam_id`, `exam_name`, `period`, `subject_id`, `subject_name`, `exam_date`, `exam_start_time`, `exam_end_time`, `duration`, `mark`, `section_id`, `group_id`, `branch_id`) VALUES
(1, 1, 'class-1', 8, 'term-1', 1, 1, 'Bangla', '10-6-2011', '9:00AM', '12PM', '3', 100, NULL, NULL, NULL),
(2, 1, 'class-1', NULL, 'term-1', 1, 2, 'Bangla Language', '12-12-2012', '8:00AM', '10:0', '3', 70, 0, NULL, 1),
(4, 2, 'class-2', NULL, 'CT2', 2, 4, 'English Literature', '24-05-2012', '8:00AM', '11:0', '3', NULL, NULL, NULL, 1),
(5, 1, 'class-1', NULL, 'CT1', 1, 2, 'Bangla Language', '25-05-2012', '8:00AM', '11:0', '3', NULL, NULL, NULL, 1),
(6, 1, 'class-1', NULL, 'SP1', 1, 1, 'General Math', '26-05-2012', '9:00AM', '11:00', '3', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_fee_collection`
--

CREATE TABLE IF NOT EXISTS `std_fee_collection` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `std_id` varchar(20) DEFAULT NULL,
  `std_name` varchar(70) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `class_name` varchar(30) DEFAULT NULL,
  `section` varchar(5) DEFAULT NULL,
  `class_roll` int(10) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `month_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `std_fee_collection`
--

INSERT INTO `std_fee_collection` (`id`, `std_id`, `std_name`, `class_id`, `class_name`, `section`, `class_roll`, `amount`, `month`, `pay_date`, `status`, `branch_id`, `month_date`) VALUES
(1, '2013111', 'Shahin', 1, 'Class-1', 'A', 1, '180.00', 'Mar-2013', '2013-03-15', 'paid', 1, '2013-03-01'),
(2, '2013114', 'Sujan', 1, 'Class-1', 'A', 2, '180.00', 'Mar-2013', '2013-03-15', 'paid', 1, '2013-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `std_fee_details`
--

CREATE TABLE IF NOT EXISTS `std_fee_details` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `class_id` int(30) NOT NULL,
  `section_id` int(10) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `std_id` varchar(50) NOT NULL,
  `roll` int(10) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `fee_head_name` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `payment_date` date NOT NULL,
  `group_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `generation_status` varchar(20) NOT NULL,
  `checker_status` varchar(20) NOT NULL,
  `collection_status` varchar(20) NOT NULL,
  `month_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `std_fee_details`
--

INSERT INTO `std_fee_details` (`id`, `class_id`, `section_id`, `class_name`, `std_id`, `roll`, `std_name`, `fee_head_name`, `category`, `amount`, `month`, `payment_date`, `group_id`, `branch_id`, `generation_status`, `checker_status`, `collection_status`, `month_date`) VALUES
(1, 1, 1, 'Class-1', '2013111', 1, 'Shahin', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(2, 1, 1, 'Class-1', '2013111', 1, 'Shahin', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(3, 1, 1, 'Class-1', '2013111', 1, 'Shahin', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(4, 1, 1, 'Class-1', '2013111', 1, 'Shahin', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(5, 1, 1, 'Class-1', '2013111', 1, 'Shahin', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(6, 1, 1, 'Class-1', '2013114', 2, 'Sujan', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(7, 1, 1, 'Class-1', '2013114', 2, 'Sujan', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(8, 1, 1, 'Class-1', '2013114', 2, 'Sujan', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(9, 1, 1, 'Class-1', '2013114', 2, 'Sujan', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(10, 1, 1, 'Class-1', '2013114', 2, 'Sujan', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'paid', '2013-03-01'),
(11, 1, 1, 'Class-1', '2013115', 3, 'Hasan', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(12, 1, 1, 'Class-1', '2013115', 3, 'Hasan', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(13, 1, 1, 'Class-1', '2013115', 3, 'Hasan', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(14, 1, 1, 'Class-1', '2013115', 3, 'Hasan', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(15, 1, 1, 'Class-1', '2013115', 3, 'Hasan', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(16, 1, 1, 'Class-1', '2013118', 4, 'Himel', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(17, 1, 1, 'Class-1', '2013118', 4, 'Himel', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(18, 1, 1, 'Class-1', '2013118', 4, 'Himel', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(19, 1, 1, 'Class-1', '2013118', 4, 'Himel', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(20, 1, 1, 'Class-1', '2013118', 4, 'Himel', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(21, 1, 1, 'Class-1', '2013119', 5, 'Urmi', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(22, 1, 1, 'Class-1', '2013119', 5, 'Urmi', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(23, 1, 1, 'Class-1', '2013119', 5, 'Urmi', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(24, 1, 1, 'Class-1', '2013119', 5, 'Urmi', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(25, 1, 1, 'Class-1', '2013119', 5, 'Urmi', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(26, 1, 1, 'Class-1', '20131110', 6, 'Raju', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(27, 1, 1, 'Class-1', '20131110', 6, 'Raju', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(28, 1, 1, 'Class-1', '20131110', 6, 'Raju', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(29, 1, 1, 'Class-1', '20131110', 6, 'Raju', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(30, 1, 1, 'Class-1', '20131110', 6, 'Raju', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(31, 1, 2, 'Class-1', '2013122', 1, 'Faruk', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(32, 1, 2, 'Class-1', '2013122', 1, 'Faruk', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(33, 1, 2, 'Class-1', '2013122', 1, 'Faruk', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(34, 1, 2, 'Class-1', '2013122', 1, 'Faruk', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(35, 1, 2, 'Class-1', '2013122', 1, 'Faruk', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(36, 1, 2, 'Class-1', '2013123', 2, 'Jahid', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(37, 1, 2, 'Class-1', '2013123', 2, 'Jahid', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(38, 1, 2, 'Class-1', '2013123', 2, 'Jahid', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(39, 1, 2, 'Class-1', '2013123', 2, 'Jahid', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(40, 1, 2, 'Class-1', '2013123', 2, 'Jahid', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(41, 1, 2, 'Class-1', '2013126', 3, 'Ahsan', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(42, 1, 2, 'Class-1', '2013126', 3, 'Ahsan', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(43, 1, 2, 'Class-1', '2013126', 3, 'Ahsan', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(44, 1, 2, 'Class-1', '2013126', 3, 'Ahsan', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(45, 1, 2, 'Class-1', '2013126', 3, 'Ahsan', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(46, 1, 2, 'Class-1', '2013127', 4, 'Tanin', 'Admission', 'fixed', 50, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(47, 1, 2, 'Class-1', '2013127', 4, 'Tanin', 'Transport', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(48, 1, 2, 'Class-1', '2013127', 4, 'Tanin', 'Exam', 'fixed', 40, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(49, 1, 2, 'Class-1', '2013127', 4, 'Tanin', 'Hostel', 'fixed', 30, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(50, 1, 2, 'Class-1', '2013127', 4, 'Tanin', 'Tifin', 'fixed', 20, 'Mar-2013', '2013-03-15', 0, 1, 'initiate', 'checked', 'unpaid', '2013-03-01'),
(51, 5, 7, 'class-5', '20135711', 1, 'brinto', 'Admission', 'fixed', 300, 'Mar-2013', '2013-03-16', 0, 1, 'initiate', 'unchecked', 'unpaid', '2013-03-01'),
(52, 5, 7, 'class-5', '20135711', 1, 'brinto', 'Tution', 'fixed', 500, 'Mar-2013', '2013-03-16', 0, 1, 'initiate', 'unchecked', 'unpaid', '2013-03-01'),
(53, 5, 7, 'class-5', '20135711', 1, 'brinto', 'absence', 'abs', 0, 'Mar-2013', '0000-00-00', 0, 1, 'initiate', 'unchecked', 'unpaid', '2013-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `std_fee_details_bak`
--

CREATE TABLE IF NOT EXISTS `std_fee_details_bak` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `section_id` int(100) DEFAULT NULL,
  `std_id` int(10) DEFAULT NULL,
  `roll` int(10) DEFAULT NULL,
  `std_name` varchar(100) DEFAULT NULL,
  `tution_fee` int(100) DEFAULT NULL,
  `hostel_fee` int(100) DEFAULT NULL,
  `exam_fee` int(100) DEFAULT NULL,
  `Miscellanies` int(100) DEFAULT NULL,
  `due_amnt` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `paymeny_status` int(100) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_fee_details_bak`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_fee_info`
--

CREATE TABLE IF NOT EXISTS `std_fee_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `std_id` varchar(50) DEFAULT NULL,
  `voucher_id` varchar(20) DEFAULT NULL,
  `fee_head` varchar(160) DEFAULT NULL,
  `fee_amount` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `sec_id` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `fee_type` varchar(20) DEFAULT NULL,
  `std_roll` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_fee_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_fee_payment_info`
--

CREATE TABLE IF NOT EXISTS `std_fee_payment_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(50) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `voucher_id` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `pay_amount` decimal(10,2) DEFAULT NULL,
  `arear_amount` decimal(10,2) DEFAULT NULL,
  `surplus_amount` decimal(10,2) DEFAULT NULL,
  `pay_status` varchar(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `month_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_fee_payment_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_final_result_after_process`
--

CREATE TABLE IF NOT EXISTS `std_final_result_after_process` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(30) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `class_sec` varchar(5) DEFAULT NULL,
  `period` int(10) DEFAULT NULL,
  `cgpa` decimal(10,2) DEFAULT NULL,
  `grade` varchar(3) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `std_final_result_after_process`
--

INSERT INTO `std_final_result_after_process` (`id`, `stu_id`, `class_id`, `class_sec`, `period`, `cgpa`, `grade`, `year`, `branch_id`) VALUES
(1, '2013111', 1, 'A', 3, '3.50', 'B+', '2013', 1),
(2, '1', 1, 'A', 1, '2.88', 'C+', '2013', 1),
(3, '2', 1, 'A', 1, '1.50', 'D', '2013', 1),
(4, '3', 1, 'A', 1, '2.25', 'C', '2013', 1),
(5, '4', 1, 'A', 1, '1.25', 'D', '2013', 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_group`
--

CREATE TABLE IF NOT EXISTS `std_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `section_id` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `std_group`
--

INSERT INTO `std_group` (`id`, `group_name`, `class_id`, `section_id`, `branch_id`) VALUES
(1, 'science', 1, 1, 1),
(2, 'arts', 2, 2, 1),
(3, 'commerce', 3, 3, 1),
(5, 'group8', 2, 2, 2),
(6, 'group9', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `std_group_info`
--

CREATE TABLE IF NOT EXISTS `std_group_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `section_id` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `std_group_info`
--

INSERT INTO `std_group_info` (`id`, `group_name`, `class_id`, `section_id`, `branch_id`) VALUES
(10, 'science', 1, 1, 1),
(11, 'commerce', 1, 0, 1),
(12, 'commerce', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_mark_promo`
--

CREATE TABLE IF NOT EXISTS `std_mark_promo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pre_class` int(10) DEFAULT NULL,
  `pre_stu_id` varchar(50) DEFAULT NULL,
  `total_point` decimal(5,2) DEFAULT NULL,
  `pre_class_sec_roll` varchar(20) DEFAULT NULL,
  `new_class_roll` varchar(20) DEFAULT NULL,
  `pre_year` varchar(5) DEFAULT NULL,
  `new_year` varchar(5) DEFAULT NULL,
  `pre_section` varchar(5) DEFAULT NULL,
  `total_mark` decimal(10,2) DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `cgpa` decimal(5,2) DEFAULT NULL,
  `termid` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_mark_promo`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_profile`
--

CREATE TABLE IF NOT EXISTS `std_profile` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(100) DEFAULT NULL,
  `name` varchar(160) DEFAULT NULL,
  `father_name` varchar(160) DEFAULT NULL,
  `mother_name` varchar(160) DEFAULT NULL,
  `pre_address` text,
  `par_address` text,
  `home_phone` varchar(50) DEFAULT NULL,
  `emer_name1` varchar(100) DEFAULT NULL,
  `emer_mobile1` varchar(50) DEFAULT NULL,
  `emer_name2` varchar(100) DEFAULT NULL,
  `emer_mobile2` varchar(50) DEFAULT NULL,
  `mail_add` varchar(100) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `adm_date` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `adm_class` varchar(100) DEFAULT NULL,
  `adm_class_roll` varchar(100) DEFAULT NULL,
  `adm_group` varchar(50) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `father_income` varchar(50) DEFAULT NULL,
  `mother_income` varchar(50) DEFAULT NULL,
  `father_profession` varchar(200) DEFAULT NULL,
  `mother_profession` varchar(200) DEFAULT NULL,
  `father_qualification` varchar(200) DEFAULT NULL,
  `mother_qualification` varchar(200) DEFAULT NULL,
  `father_work_phone` varchar(50) DEFAULT NULL,
  `mother_work_phone` varchar(50) DEFAULT NULL,
  `admission_fee` varchar(100) DEFAULT NULL,
  `priv_schoole_name` varchar(200) DEFAULT NULL,
  `priv_school_add` varchar(100) DEFAULT NULL,
  `priv_school_class` varchar(100) DEFAULT NULL,
  `priv_school_class_roll` varchar(20) DEFAULT NULL,
  `priv_school_remarks` varchar(300) DEFAULT NULL,
  `priv_school_result` varchar(20) DEFAULT NULL,
  `present_class` varchar(50) DEFAULT NULL,
  `present_class_roll` varchar(50) DEFAULT NULL,
  `st_status` varchar(50) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `ovr_roll` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `std_profile`
--

INSERT INTO `std_profile` (`id`, `stu_id`, `name`, `father_name`, `mother_name`, `pre_address`, `par_address`, `home_phone`, `emer_name1`, `emer_mobile1`, `emer_name2`, `emer_mobile2`, `mail_add`, `sex`, `age`, `adm_date`, `dob`, `adm_class`, `adm_class_roll`, `adm_group`, `section`, `father_income`, `mother_income`, `father_profession`, `mother_profession`, `father_qualification`, `mother_qualification`, `father_work_phone`, `mother_work_phone`, `admission_fee`, `priv_schoole_name`, `priv_school_add`, `priv_school_class`, `priv_school_class_roll`, `priv_school_remarks`, `priv_school_result`, `present_class`, `present_class_roll`, `st_status`, `branch_id`, `ovr_roll`) VALUES
(1, '2013111', 'Shahin', 'teat', 'ffasdfa', NULL, '', '', 'test', '131313133', 'testse', '13165416464', 'test@yahoo.com', 'Male', '10', '2013-03-12', '1986-10-10', '1', '1', '', 'A', '13131', '163446', 'fdafa', 'fdsa', 'custom', 'custom', '2121212', '454545', 'custom', 'fadf', 'fadfda', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 1),
(2, '2013122', 'Faruk', 'fadfa', 'fadfa', NULL, '', '', 'fdafads', '4165466', 'fadfas', '63546464', 'afdasf@yahoo.com', 'Male', '11', '2013-03-12', '1986-11-10', '1', '1', '0', 'B', '646464', '312323', 'fadf', 'fadfas', 'custom', 'custom', '32323', '322323', 'custom', 'fdaf', 'fads', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 2),
(3, '2013123', 'Jahid', 'fdafa', 'fadfa', NULL, '', '', 'adfas', '14143131313', 'fdafdasf', '131313331', 'fdadfa@yahoo.com', 'Male', '11', '2013-03-12', '1987-10-11', '1', '2', '0', 'B', '13131', '13131641', 'fda', 'fadfadf', 'custom', 'custom', '2326565979', '6464614614', 'custom', 'fadfa', 'fdafa', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 3),
(4, '2013114', 'Sujan', 'fdad', 'fdaafa', NULL, '', '', 'tesat', '12314564545', 'tetaes', '16464646946', 'fafd@yahoo.com', 'Male', '12', '2013-03-02', '1985-10-10', '1', '2', '0', 'A', '12121212', '21121212', 'fdfads', 'fadsf', 'custom', 'custom', '212121', '152121212', 'custom', 'fdadfas', 'fadsfas', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 4),
(5, '2013115', 'Hasan', 'fafa', 'dafasf', NULL, '', '', 'teate', '132131313', 'test', '1321545', 'test@yahoo.com', 'Male', '12', '2013-03-12', '1985-10-10', '1', '3', '0', 'A', '132131313', '1313', 'fdafa', 'fdafas', 'custom', 'custom', '213111313', '13323', 'custom', 'fadfas', 'fasfdas', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 5),
(6, '2013126', 'Ahsan', 'fadfa', 'fafda', NULL, '', '', 'teat', '1313131', 'teata', '143646541641', 'fdafs@yahoo.com', 'Male', '12', '2013-03-12', '1986-12-11', '1', '3', '0', 'B', '1213213', '2121212', 'fadsf', 'fadfa', 'custom', 'custom', '1231212', '121212', 'custom', 'fadfa', 'fadfdas', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 6),
(7, '2013127', 'Tanin', 'dfafa', 'fdadf', NULL, '', '', 'dafadsf', '31313113', 'fadfas', '212155512', 'fadfas@gmail.com', 'Male', '11', '2013-02-11', '1987-01-12', '1', '4', '0', 'B', '13131', '3323', 'fads', 'fdas', 'custom', 'custom', '131313', '121212', 'custom', 'fadfas', 'fdas', '1', '1', 'custom', '2', 'Class-1', 'custom', 'available', 1, 7),
(8, '2013118', 'Himel', 'fadfas', 'fadsfass', NULL, '', '', 'dfafas', '1313131313', 'fadfas', '1251354551212', 'fadsf@yahoo.com', 'Male', '11', '2013-03-12', '1987-10-11', '1', '4', '0', 'A', '1131312', '2133123', 'fda', 'fdafa', 'custom', 'custom', '322133', '21212122', 'custom', 'fadfas', 'fads', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 8),
(9, '2013119', 'Urmi', 'topu', 'nima', NULL, '', '', 'urmi', '1313131', 'urmi', '13131313', 'urmi@yahoo.com', 'Female', '11', '2013-03-12', '1985-02-10', '1', '5', '0', 'A', '1313131', '1212113', 'business', 'housewife', 'custom', 'custom', '121212', '31321212', 'custom', 'abc', 'dhaka', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 9),
(10, '20131110', 'Raju', 'topon', 'maya', NULL, '', '', 'urmi', '1313131', 'urmi', '13131313', 'urmi@yahoo.com', 'Female', '11', '2013-03-12', '1985-02-10', '1', '6', '0', 'A', '1313131', '1212113', 'business', 'housewife', 'custom', 'custom', '121212', '31321212', 'custom', 'abc', 'dhaka', '1', '1', 'custom', '1', 'Class-1', 'custom', 'available', 1, 10),
(11, '20135711', 'brinto', 'dulal', '', NULL, '', '', '', '', '', '', '', 'Male', '7', '2013-03-02', '2001-01-03', '5', '1', '', 'A', '', '', '', '', 'custom', 'custom', '23434', '', 'custom', '', '', '', '', 'custom', '', 'class-5', 'custom', 'available', 1, 1),
(12, '20131112', 'tomal', '', '', NULL, '', '', '', '', '', '', '', 'Male', '7', '2013-02-09', '2007-04-18', '1', '7', '', 'A', '', '', '', '', 'custom', 'custom', '326254363', '', 'custom', '', '', '', '', 'custom', '', 'Class-1', 'custom', 'available', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_subject_config`
--

CREATE TABLE IF NOT EXISTS `std_subject_config` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `subject_code` varchar(10) DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `sub_mark` int(50) DEFAULT NULL,
  `ct_mark` int(50) DEFAULT NULL,
  `st_mark` int(50) DEFAULT NULL,
  `final_mark` int(50) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `std_subject_config`
--

INSERT INTO `std_subject_config` (`id`, `class_id`, `subject_code`, `subject_name`, `sub_mark`, `ct_mark`, `st_mark`, `final_mark`, `branch_id`) VALUES
(1, 1, '101', 'Bangla', 60, 20, 25, 105, 1),
(9, 3, '303', 'Math', 50, 50, 20, 120, 1),
(3, 1, '103', 'Math', 50, 30, 20, 100, 1),
(4, 2, 'Bangla', '201', 50, 30, 20, 100, 1),
(5, 2, '202', 'english', 50, 30, 20, 100, 1),
(6, 2, '203', 'Math', 50, 30, 20, 100, 1),
(7, 3, '301', 'Bangla', 50, 30, 20, 100, 1),
(8, 3, '302', 'English', 50, 30, 20, 100, 1),
(10, 5, '501', 'bangla', 50, 30, 20, 100, 1),
(11, 5, '502', 'english', 50, 20, 10, 80, 1),
(12, 4, '401', 'Bangla', 50, 30, 20, 100, 1),
(13, 4, '402', 'English', 60, 30, 10, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_tc_info`
--

CREATE TABLE IF NOT EXISTS `std_tc_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `std_id` varchar(20) NOT NULL,
  `class_id` int(10) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `class_roll` int(10) DEFAULT NULL,
  `tc_date` date DEFAULT NULL,
  `reason` varchar(150) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_tc_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_teacher`
--

CREATE TABLE IF NOT EXISTS `std_teacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `std_teacher`
--


-- --------------------------------------------------------

--
-- Table structure for table `std_teacher_info`
--

CREATE TABLE IF NOT EXISTS `std_teacher_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(100) DEFAULT NULL,
  `Telephone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Last_education` varchar(500) DEFAULT NULL,
  `married` varchar(10) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `group` varchar(30) DEFAULT NULL,
  `job_experience` varchar(500) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `teacher_code` varchar(20) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(5) NOT NULL,
  `other_add` varchar(100) NOT NULL,
  `present_add` varchar(100) NOT NULL,
  `permenent_add` varchar(100) NOT NULL,
  `present_status` varchar(30) NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `medical` decimal(10,2) DEFAULT NULL,
  `house_rent` decimal(10,2) DEFAULT NULL,
  `others` decimal(10,2) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `teacher_short_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `std_teacher_info`
--

INSERT INTO `std_teacher_info` (`id`, `teacher_name`, `Telephone`, `mobile`, `email`, `Last_education`, `married`, `sex`, `picture`, `subject`, `group`, `job_experience`, `branch_id`, `teacher_code`, `nationality`, `birth_date`, `age`, `other_add`, `present_add`, `permenent_add`, `present_status`, `basic`, `medical`, `house_rent`, `others`, `joining_date`, `teacher_short_name`) VALUES
(1, 'khokon', '31313131313', '2132131431313', 'adfda@yahoo.com', 'fad', 'Single', 'Male', NULL, 'Hibru', 'science', '2 yrs', 1, 'KS', 'Bangladeshi', '1985-10-10', 25, '', 'afd', 'fad', 'Teacher', '0.00', NULL, NULL, NULL, '2013-02-25', 'KS'),
(2, 'Fahim', '416416416', '13413131313', 'afda@yahoo.com', 'fadfa', 'Married', 'Male', NULL, 'Urdu', 'adf', '2 yrs', 1, 'FH', 'Bangladeshi', '1986-12-10', 26, '', 'fad', 'fads', 'teacher', '0.00', NULL, NULL, NULL, '2013-03-10', 'FM'),
(3, 'Abdul Mojid', '111', '222', 'mojid@gmail.com', 'BSC', 'Married', 'Male', NULL, 'CSE', 'Science', '3years', 1, '1004', 'Bangladeshi', '1983-12-31', 30, '', '-', '-', 'Asst.', '0.00', NULL, NULL, NULL, '2013-01-01', 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `std_voucher_summery`
--

CREATE TABLE IF NOT EXISTS `std_voucher_summery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `voucher_id` bigint(15) DEFAULT NULL,
  `std_id` varchar(50) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `month` varchar(30) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL,
  `total_amnt` float DEFAULT NULL,
  `payment_stat` varchar(20) DEFAULT 'DUE',
  `payment_date` date DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `month_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `std_voucher_summery`
--

INSERT INTO `std_voucher_summery` (`id`, `voucher_id`, `std_id`, `class_id`, `month`, `year`, `total_amnt`, `payment_stat`, `payment_date`, `branch_id`, `month_date`) VALUES
(1, 20130311092325, '201312', 1, 'Mar-2013', '2013', 150, 'Due', '2013-03-11', 1, '2013-03-01'),
(2, 20130311092325, '201311', 1, 'Mar-2013', '2013', 150, 'Due', '2013-03-11', 1, '2013-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu1`
--

CREATE TABLE IF NOT EXISTS `sub_menu1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_menu1_name` varchar(100) DEFAULT NULL,
  `main_menu_id` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `user_acl` varchar(100) DEFAULT NULL,
  `class_id` varchar(10) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `sub_menu1`
--

INSERT INTO `sub_menu1` (`id`, `sub_menu1_name`, `main_menu_id`, `file_name`, `user_acl`, `class_id`, `remarks`) VALUES
(1, 'Course Info', '3', 'view_course_info', NULL, '1', NULL),
(2, 'Exam Info', '11', 'exam_information', NULL, '2', NULL),
(3, 'Class Routine', '3', 'class_routine_for_student', NULL, '3', NULL),
(4, 'Student Profile', '3', 'Student_information', NULL, '4', NULL),
(5, 'Student Fee Info', '3', 'view_class_fee', NULL, '5', NULL),
(6, 'Teacher''s Routine', '28', 'teacher_routine_new', NULL, '6', NULL),
(9, 'New Student', '1', NULL, NULL, '0', NULL),
(10, 'Academic Activities', NULL, NULL, NULL, '1', NULL),
(11, 'Accounts setting', '22', NULL, NULL, '2', NULL),
(12, 'Employements', '24', NULL, NULL, NULL, NULL),
(13, 'Teachers Details', '15', NULL, NULL, NULL, NULL),
(14, 'Teacher Routine', '15', 'class_routine_for_teacher', NULL, NULL, NULL),
(15, 'Student Attendance', '15', NULL, NULL, NULL, NULL),
(16, 'Exam Marks', '26', '', NULL, NULL, NULL),
(17, 'Generate Routine', '24', 'routine_create', NULL, NULL, NULL),
(18, 'Add New Teacher', '24', 'teacher_add_form', NULL, NULL, NULL),
(19, 'Create Syllabus', '9', NULL, NULL, NULL, NULL),
(20, 'Notice Setting', '24', NULL, NULL, NULL, NULL),
(22, 'Result Info', '12', 'result_making_form', NULL, NULL, NULL),
(23, 'SMS Notification', '24', 'sms_notification_send_form', NULL, NULL, NULL),
(24, 'Registration List', '1', NULL, NULL, NULL, NULL),
(25, 'Classwise Student Info', '3', 'class_wise_student_info', NULL, NULL, NULL),
(26, 'Student Attendance Info', '3', NULL, NULL, NULL, NULL),
(27, 'Parents Info', '3', 'parents_info', NULL, NULL, NULL),
(65, 'Book List', '3', 'book_list', NULL, NULL, NULL),
(30, 'Notice Board', '6', 'notice_board', NULL, NULL, NULL),
(31, 'Create Student Account', '6', NULL, NULL, NULL, NULL),
(32, 'Student TC', '6', 'student_tc_form', NULL, NULL, NULL),
(33, 'Scholarship ', '11', 'scholarship_info', NULL, NULL, NULL),
(34, 'Transport Fee', '11', 'transport_fee', NULL, NULL, NULL),
(35, 'Hostel Fee', '11', 'hostel_fee', NULL, NULL, NULL),
(36, 'Fee Details', '11', 'view_class_fee', NULL, NULL, NULL),
(37, 'Exam Routine', '12', NULL, NULL, NULL, NULL),
(38, 'Subject Info', '15', 'view_course_info', NULL, NULL, NULL),
(39, 'Classwise Notification', '16', NULL, NULL, NULL, NULL),
(40, 'Parents Detail', '15', 'parents_info', NULL, NULL, NULL),
(41, 'Holiday Info', '15', 'holiday_info', NULL, NULL, NULL),
(42, 'Leave Info', '15', 'leave_info', NULL, NULL, NULL),
(43, 'Teacher Attendance Info', '16', NULL, NULL, NULL, NULL),
(44, 'Leave Request', '16', NULL, NULL, NULL, NULL),
(45, 'Add New Section', '28', 'section_config', NULL, NULL, NULL),
(46, 'Setting class information', '28', 'class_config', NULL, NULL, NULL),
(47, 'Add New Fee', '28', 'add_student_fee', NULL, NULL, NULL),
(48, 'Subject configure', '28', 'subject_config', NULL, NULL, NULL),
(49, 'Setting class fee', '28', 'class_fee_config', NULL, NULL, NULL),
(50, 'Generate Routine', '28', NULL, NULL, NULL, NULL),
(51, 'Grade Configure', '28', 'grade_setting', NULL, NULL, NULL),
(52, 'Teacher Routine', '28', 'teacher_routine_new', NULL, NULL, NULL),
(53, 'Exam schedule setting', '28', 'exam_schedule_config_new', NULL, NULL, NULL),
(54, 'Exam configure', '28', 'exam_config_new', NULL, NULL, NULL),
(55, 'Add New Teacher', '29', 'teacher_add_form', NULL, NULL, NULL),
(56, 'Add New employee', '29', 'new_employee_form', NULL, NULL, NULL),
(57, 'Send SMS to Parents', '30', 'parent_sms_sender_html_form', NULL, NULL, NULL),
(58, 'SMS Archive', '30', 'sms_list', NULL, NULL, NULL),
(61, 'Employee List', '29', 'employee_list', NULL, NULL, NULL),
(59, 'Add New Notice', '31', 'new_notice_add', NULL, NULL, NULL),
(60, 'Notice Log', '31', NULL, NULL, NULL, NULL),
(63, 'Employee Leave Requests', NULL, NULL, NULL, NULL, NULL),
(64, 'Teacher Leave Request', NULL, NULL, NULL, NULL, NULL),
(66, 'Subject Syllabus', '3', 'subject_syllabus', NULL, NULL, NULL),
(67, 'Teacher Classes', '28', 'teacher_classes', NULL, NULL, NULL),
(68, 'Mark Distribution', '28', 'mark_distribution', NULL, NULL, NULL),
(69, 'Book Setting', '28', 'book_add', NULL, NULL, NULL),
(70, 'Teacher List', '28', 'teacher_list_form', NULL, NULL, NULL),
(71, 'Employee List', '28', 'employee_list_form', NULL, NULL, NULL),
(72, 'Send SMS to Office Stuff', '30', 'office_stuff_sms_sender_html_form', NULL, NULL, NULL),
(73, 'Setting Class Period', '28', 'setting_class_period', NULL, NULL, NULL),
(74, 'Setting Exam Period', '28', 'setting_exam_period', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu2`
--

CREATE TABLE IF NOT EXISTS `sub_menu2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_menu2_name` varchar(100) DEFAULT NULL,
  `sub_menu1_id` varchar(200) DEFAULT NULL,
  `left_menu_id` varchar(100) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `user_acl` varchar(100) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `sub_menu2`
--

INSERT INTO `sub_menu2` (`id`, `sub_menu2_name`, `sub_menu1_id`, `left_menu_id`, `file_name`, `user_acl`, `remarks`) VALUES
(10, 'Add New Steudent', '9', NULL, 'std_admission_form', NULL, NULL),
(11, 'Generate ID card', '9', NULL, NULL, NULL, NULL),
(12, 'Add New Teacher', '29', NULL, 'teacher_add_form', NULL, NULL),
(13, 'Add New employee', '29', NULL, 'new_employee_form', NULL, NULL),
(14, 'Subject configure', '28', NULL, 'subject_config', NULL, NULL),
(15, 'Exam schedule setting', '28', NULL, 'exam_schedule_config', NULL, NULL),
(16, 'Class routine', '28', NULL, 'class_routine', NULL, NULL),
(17, 'Setting class information', '28', NULL, 'class_config', NULL, NULL),
(18, 'Exam configure', '28', NULL, 'exam_config', NULL, NULL),
(19, 'Teachers details', '13', NULL, 'teacher_information', NULL, NULL),
(20, 'Teachers class result', '13', NULL, NULL, NULL, NULL),
(22, 'Add New Section', '28', NULL, 'section_config', NULL, NULL),
(23, 'Teachers Routine', '28', NULL, 'teacher_routine', NULL, NULL),
(24, 'Group setting', '28', NULL, 'group_config', NULL, NULL),
(25, 'Setting class fee', '28', NULL, 'class_fee_config', NULL, NULL),
(26, 'Student Fee', '11', NULL, 'std_fee_generator_form', NULL, NULL),
(27, 'Add New Fee', '28', NULL, 'add_student_fee', NULL, NULL),
(28, 'View Class Fee', '28', NULL, 'view_class_fee', NULL, NULL),
(30, 'Class ways fees', '11', NULL, 'class_way_total_fee', NULL, NULL),
(31, 'Student way fee', '11', NULL, 'student_way_total_fee', NULL, NULL),
(32, 'Manual Exam Mark Setting', '16', NULL, 'exam_mark_setting', NULL, NULL),
(33, 'Excel File Mark Setting', '16', NULL, 'excel_mark_setting', NULL, NULL),
(34, 'Generate Excel Mark', '16', NULL, 'generate_excel_form', NULL, NULL),
(35, 'Text Notice', '20', NULL, NULL, NULL, NULL),
(36, 'File Notice', '20', NULL, NULL, NULL, NULL),
(37, 'Grade Configure', '28', NULL, 'grade_setting', NULL, NULL),
(38, 'Result Processing', '16', NULL, 'result_process_form', NULL, NULL),
(39, 'Payment Check', '11', NULL, 'payment_check', NULL, NULL),
(40, 'Promotion', '16', NULL, 'promotion_form', NULL, NULL),
(41, 'Fee Collection', '11', NULL, 'fee_collection_form', NULL, NULL),
(42, 'Subjectwise Marks', '16', NULL, 'subjectwise_mark_form', NULL, NULL),
(43, 'Email Notification', '39', NULL, 'email_notification_ui_form', NULL, NULL),
(44, 'SMS Notification', '39', NULL, 'sms_notification_form', NULL, NULL),
(45, 'Fee Collection Report', '11', NULL, 'fee_collection_report', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_exam_mark_distribution`
--

CREATE TABLE IF NOT EXISTS `tbl_class_exam_mark_distribution` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `OB_total` decimal(10,2) DEFAULT NULL,
  `SB_total` decimal(10,2) DEFAULT NULL,
  `CT_total` decimal(10,2) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_class_exam_mark_distribution`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_feehead`
--

CREATE TABLE IF NOT EXISTS `tbl_class_feehead` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `fee_head` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `category` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `branch_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_class_feehead`
--

INSERT INTO `tbl_class_feehead` (`id`, `fee_head`, `category`, `branch_id`) VALUES
(1, 'Admission', 'Fixed', 1),
(2, 'Transport', 'Fixed', 1),
(3, 'Exam', 'Fixed', 1),
(4, 'Hostel', 'Fixed', 1),
(5, 'Tifin', 'Fixed', 1),
(6, 'library', 'Fixed', 1),
(7, 'Tution ', 'Fixed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_fee_info`
--

CREATE TABLE IF NOT EXISTS `tbl_class_fee_info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `class_id` int(20) NOT NULL,
  `fee_head_id` int(10) NOT NULL,
  `amount` int(20) DEFAULT NULL,
  `branch_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_class_fee_info`
--

INSERT INTO `tbl_class_fee_info` (`id`, `class_id`, `fee_head_id`, `amount`, `branch_id`) VALUES
(1, 1, 1, 50, 1),
(2, 2, 1, 100, 1),
(3, 3, 1, 0, 1),
(4, 4, 1, 0, 1),
(5, 1, 2, 40, 1),
(6, 2, 2, 0, 1),
(7, 3, 2, 0, 1),
(8, 4, 2, 0, 1),
(9, 1, 3, 40, 1),
(10, 2, 3, 0, 1),
(11, 3, 3, 0, 1),
(12, 4, 3, 0, 1),
(13, 1, 4, 30, 1),
(14, 2, 4, 0, 1),
(15, 3, 4, 0, 1),
(16, 4, 4, 0, 1),
(17, 1, 5, 20, 1),
(18, 2, 5, 0, 1),
(19, 3, 5, 0, 1),
(20, 4, 5, 0, 1),
(21, 1, 6, 0, 1),
(22, 2, 6, 0, 1),
(23, 3, 6, 0, 1),
(24, 4, 6, 0, 1),
(25, 5, 1, 300, 1),
(26, 5, 2, 0, 1),
(27, 5, 3, 100, 1),
(28, 5, 4, 0, 1),
(29, 5, 5, 0, 1),
(30, 5, 6, 0, 1),
(31, 1, 7, 0, 1),
(32, 2, 7, 0, 1),
(33, 3, 7, 0, 1),
(34, 4, 7, 0, 1),
(35, 5, 7, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_salary_sturcture`
--

CREATE TABLE IF NOT EXISTS `tbl_emp_salary_sturcture` (
  `empid` bigint(14) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(40) NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `medical` decimal(10,2) DEFAULT NULL,
  `house_rent` decimal(10,2) DEFAULT NULL,
  `others` decimal(10,2) DEFAULT NULL,
  `branchid` int(10) NOT NULL,
  `update_date` date DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `mobileno` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_emp_salary_sturcture`
--

INSERT INTO `tbl_emp_salary_sturcture` (`empid`, `name`, `category`, `basic`, `medical`, `house_rent`, `others`, `branchid`, `update_date`, `join_date`, `address`, `mobileno`) VALUES
(1, 'hkkhkhkhk', 'Employee', '4500.00', '500.00', '1200.00', '120.00', 1, '2013-03-15', '2013-03-15', 'Dhaka', '13165416416441'),
(2, 'Halima', 'Employee', '2500.00', '400.00', '1000.00', '100.00', 1, '2013-03-15', '2013-03-15', 'Dhaka', '1313131313');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_grade_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(5) DEFAULT NULL,
  `mark_start` int(10) DEFAULT NULL,
  `mark_end` int(10) DEFAULT NULL,
  `point` decimal(10,2) DEFAULT NULL,
  `branchid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_grade_setting`
--

INSERT INTO `tbl_grade_setting` (`id`, `grade`, `mark_start`, `mark_end`, `point`, `branchid`) VALUES
(1, 'A+', 80, 100, '5.00', 1),
(2, 'A', 75, 79, '4.50', 1),
(3, 'A-', 70, 74, '4.00', 1),
(4, 'B+', 65, 69, '3.50', 1),
(5, 'B', 60, 64, '3.25', 1),
(6, 'B-', 55, 59, '3.00', 1),
(7, 'C+', 50, 54, '2.50', 1),
(8, 'C', 45, 49, '2.25', 1),
(9, 'C-', 40, 44, '2.00', 1),
(10, 'D', 35, 39, '1.00', 1),
(11, 'F', 0, 34, '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_group`
--

CREATE TABLE IF NOT EXISTS `tbl_menu_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(40) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `user_pass` varchar(30) DEFAULT NULL,
  `main_menu_id` text,
  `sub_menu1` text,
  `sub_menu2` text,
  `branch_id` text,
  `class_id` text,
  `subject_id` text,
  `others` text,
  `regdate` date DEFAULT NULL,
  `reg_expire_date` date DEFAULT NULL,
  `access_permission` varchar(50) DEFAULT NULL,
  `module_permission` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_menu_group`
--

INSERT INTO `tbl_menu_group` (`id`, `user_type`, `user_name`, `user_pass`, `main_menu_id`, `sub_menu1`, `sub_menu2`, `branch_id`, `class_id`, `subject_id`, `others`, `regdate`, `reg_expire_date`, `access_permission`, `module_permission`) VALUES
(1, 'user', 'khokon', '123', '1,2,3,4,5,6,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32', '1,2,3,4,5,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74', '4,5,6,8,9,10,13,14,15,16,17,19,22,23,24,25,26,27,28,30,31,32,33,34,35,36,37,38,39,40,41,43,44,45', '1,2,3,4,5', '1,2,3,11', '1,2,3,4,5,6,7', NULL, '2012-08-14', '2014-12-05', 'on', '1,2,3,4,5,6,8'),
(2, 'siteadmin', 'admin', '123456', '1,2,3,4,5,6,7', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18', '4,5,6,8,9,10,13,14,15,16,17,19,22,23,24,25,26,27,28,30,31', '1,2,3,4,5', '1,2,3,11', '1,2,3,4,5,6,7', NULL, '2012-08-14', '2014-11-19', 'on', '1,2,3,4,6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE IF NOT EXISTS `tbl_modules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(100) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `order_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`id`, `folder_name`, `module_name`, `order_id`) VALUES
(1, 'student', 'student', 1),
(2, 'teacher', 'teacher', 2),
(3, 'accounts', 'accounts', 3),
(4, 'exam', 'exam', 4),
(5, 'admin', 'admin', 8),
(6, 'transport', 'transport', 5),
(7, 'library', 'library', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notices`
--

CREATE TABLE IF NOT EXISTS `tbl_notices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_notices`
--

INSERT INTO `tbl_notices` (`id`, `title`, `notice_date`, `url`, `branch_id`) VALUES
(1, 'Test', '2013-03-10', 'purer2_5418_01_en13-126686.gif', 1),
(2, 'Holiday Notice', '2013-03-10', 'semicon_2013.jpg', 1),
(3, 'Janina', '2013-03-15', 'Penguins.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholarship_info`
--

CREATE TABLE IF NOT EXISTS `tbl_scholarship_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `scholarship_name` varchar(100) DEFAULT NULL,
  `sponsored_by` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_scholarship_info`
--

INSERT INTO `tbl_scholarship_info` (`id`, `class_id`, `scholarship_name`, `sponsored_by`, `amount`, `branch_id`) VALUES
(1, 1, 'DBBL Scholarship', 'Dutch Bangla Bank', '1200.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_std_pictures`
--

CREATE TABLE IF NOT EXISTS `tbl_std_pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stid` varchar(50) DEFAULT NULL,
  `pic_name` varchar(120) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_std_pictures`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_attendance_info`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher_attendance_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) DEFAULT NULL,
  `month` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_teacher_attendance_info`
--

INSERT INTO `tbl_teacher_attendance_info` (`id`, `teacher_id`, `month`, `date`, `year`) VALUES
(1, 1, 'Jan-2013', '2013-01-01', '2013'),
(2, 2, 'Jan-2013', '2013-01-01', '2013');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE IF NOT EXISTS `tbl_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `class` int(3) DEFAULT NULL,
  `group` varchar(12) DEFAULT NULL,
  `section` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `name`, `class`, `group`, `section`) VALUES
(1, 'abc', 1, NULL, 'A'),
(2, 'edf', 1, NULL, 'A'),
(3, 'dhfkd', 1, NULL, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `main_menu_id` varchar(250) DEFAULT NULL,
  `sub_menu_id1` varchar(250) DEFAULT NULL,
  `sub_menu_id2` varchar(250) DEFAULT NULL,
  `sub_menu_id3` varchar(250) DEFAULT NULL,
  `class_id` varchar(160) DEFAULT NULL,
  `subject_id` varchar(160) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `pass`, `main_menu_id`, `sub_menu_id1`, `sub_menu_id2`, `sub_menu_id3`, `class_id`, `subject_id`, `user_type`) VALUES
(1, 'Admin', 'Admin', '1,2,3', '1,2,3,4,5,6,7,8', '4,5,6,8,9', NULL, '1,2,3,11', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `web_menu`
--

CREATE TABLE IF NOT EXISTS `web_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(80) NOT NULL,
  `menu_content` varchar(80) NOT NULL,
  `sub_menu` varchar(10) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=25 ;

--
-- Dumping data for table `web_menu`
--

INSERT INTO `web_menu` (`menu_id`, `menu_name`, `menu_content`, `sub_menu`, `order_id`, `user_type`) VALUES
(1, 'Home', 'index', 'yes', 1, 'globle'),
(2, 'About Us', 'about', 'yes', 2, 'globle'),
(3, 'Curriculum', 'curriculum', 'yes', 3, 'globle'),
(4, 'Order Forms', 'extra', '', 4, 'globle'),
(5, 'Facilities', 'facilities', '', 5, 'globle'),
(12, 'Admission', 'admission', 'yes', 6, 'globle'),
(13, 'Gallery', 'gallery', NULL, 7, 'globle'),
(14, 'News', 'news', NULL, 8, 'globle'),
(15, 'Careers', 'careers', NULL, 9, 'globle'),
(16, 'Contact Us', 'visit', NULL, 10, 'globle'),
(17, 'Profile', 'profile', NULL, 11, 'user'),
(18, 'Result Info', 'result_info', NULL, 12, 'user'),
(19, 'Notice', 'notice', NULL, 13, 'user'),
(20, 'Remarks', 'remarks', NULL, 14, 'user'),
(21, 'Achievement ', 'achievement ', NULL, 15, 'user'),
(22, 'History', 'history', NULL, 16, 'user'),
(23, 'Payment Info', 'payment_info', NULL, 17, 'user'),
(24, 'Due Amount', 'due_amount', NULL, 18, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `web_std_pictures`
--

CREATE TABLE IF NOT EXISTS `web_std_pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stid` varchar(30) DEFAULT NULL,
  `pic_name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `web_std_pictures`
--


-- --------------------------------------------------------

--
-- Table structure for table `web_std_profile`
--

CREATE TABLE IF NOT EXISTS `web_std_profile` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(160) DEFAULT NULL,
  `father_name` varchar(160) DEFAULT NULL,
  `mother_name` varchar(160) DEFAULT NULL,
  `pre_address` text,
  `par_address` text,
  `home_phone` varchar(50) DEFAULT NULL,
  `emer_name1` varchar(100) DEFAULT NULL,
  `emer_mobile1` varchar(50) DEFAULT NULL,
  `emer_name2` varchar(100) DEFAULT NULL,
  `emer_mobile2` varchar(50) DEFAULT NULL,
  `mail_add` varchar(100) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `religion` varchar(200) DEFAULT NULL,
  `nationality` varchar(200) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `adm_date` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `adm_class` varchar(100) DEFAULT NULL,
  `adm_class_roll` varchar(100) DEFAULT NULL,
  `adm_group` varchar(50) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `father_income` varchar(50) DEFAULT NULL,
  `mother_income` varchar(50) DEFAULT NULL,
  `father_profession` varchar(200) DEFAULT NULL,
  `mother_profession` varchar(200) DEFAULT NULL,
  `father_qualification` varchar(200) DEFAULT NULL,
  `mother_qualification` varchar(200) DEFAULT NULL,
  `father_work_phone` varchar(50) DEFAULT NULL,
  `mother_work_phone` varchar(50) DEFAULT NULL,
  `admission_fee` varchar(100) DEFAULT NULL,
  `priv_schoole_name` varchar(200) DEFAULT NULL,
  `priv_school_add` varchar(100) DEFAULT NULL,
  `priv_school_class` varchar(100) DEFAULT NULL,
  `priv_school_class_roll` varchar(20) DEFAULT NULL,
  `priv_school_remarks` varchar(300) DEFAULT NULL,
  `priv_school_result` varchar(20) DEFAULT NULL,
  `present_class` varchar(50) DEFAULT NULL,
  `present_class_roll` varchar(50) DEFAULT NULL,
  `st_status` varchar(50) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `web_std_profile`
--

INSERT INTO `web_std_profile` (`id`, `stu_id`, `password`, `name`, `father_name`, `mother_name`, `pre_address`, `par_address`, `home_phone`, `emer_name1`, `emer_mobile1`, `emer_name2`, `emer_mobile2`, `mail_add`, `sex`, `religion`, `nationality`, `age`, `adm_date`, `dob`, `adm_class`, `adm_class_roll`, `adm_group`, `section`, `father_income`, `mother_income`, `father_profession`, `mother_profession`, `father_qualification`, `mother_qualification`, `father_work_phone`, `mother_work_phone`, `admission_fee`, `priv_schoole_name`, `priv_school_add`, `priv_school_class`, `priv_school_class_roll`, `priv_school_remarks`, `priv_school_result`, `present_class`, `present_class_roll`, `st_status`, `branch_id`) VALUES
(1, '201311', '201311A10', 'Shahin', 'Hamid', 'fadf', NULL, '', '45441', 'test', '131131313', 'tetst', '31313131', 'test@yahoo.com', 'Male', NULL, NULL, '10', '2013-03-12', '1985-10-10', 'Class-1', NULL, '', 'A', '132131', '512', 'dbusiness', 'fads', NULL, NULL, '231132', '1212', NULL, 'fadf', 'fad', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(2, '201311', '201311B11', 'Mahin', 'fdaf', 'fdafa', NULL, '', '44165416', 'teat', '121213211', 'adffads', '31313131313', 'teat@yaahooc.om', 'Male', NULL, NULL, '11', '2013-03-10', '1986-12-10', 'Class-1', NULL, '0', 'B', '1231', '531313', 'afd', 'fda', NULL, NULL, '4641313', '4646', NULL, 'fda', 'adfsa', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(3, '201312', '201312B11', 'Faisal', 'fadsf', 'fadfds', NULL, '', '321121', 'tafda', '415411415454', 'fdafa', '2313131', 'fda@yahoo.com', 'Male', NULL, NULL, '11', '2013-03-12', '1987-11-11', 'Class-1', NULL, '0', 'B', '5241142', '64416416', 'fads', 'fads', NULL, NULL, '364131', '313131', NULL, 'fdas', 'afdafds', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(4, '2013111', '2013111A10', 'Shahin', 'teat', 'ffasdfa', NULL, '', '54121212', 'test', '131313133', 'testse', '13165416464', 'test@yahoo.com', 'Male', NULL, NULL, '10', '2013-03-12', '1986-10-10', 'Class-1', NULL, '', 'A', '13131', '163446', 'fdafa', 'fdsa', NULL, NULL, '2121212', '454545', NULL, 'fadf', 'fadfda', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(5, '2013122', '2013122B11', 'Faruk', 'fadfa', 'fadfa', NULL, '', '1321212', 'fdafads', '4165466', 'fadfas', '63546464', 'afdasf@yahoo.com', 'Male', NULL, NULL, '11', '2013-03-12', '1986-11-10', 'Class-1', NULL, '0', 'B', '646464', '312323', 'fadf', 'fadfas', NULL, NULL, '32323', '322323', NULL, 'fdaf', 'fads', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(6, '2013123', '2013123B11', 'Jahid', 'fdafa', 'fadfa', NULL, '', '13136646', 'adfas', '14143131313', 'fdafdasf', '131313331', 'fdadfa@yahoo.com', 'Male', NULL, NULL, '11', '2013-03-12', '1987-10-11', 'Class-1', NULL, '0', 'B', '13131', '13131641', 'fda', 'fadfadf', NULL, NULL, '2326565979', '6464614614', NULL, 'fadfa', 'fdafa', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(7, '2013114', '2013114A12', 'Sujan', 'fdad', 'fdaafa', NULL, '', '1313131313', 'tesat', '12314564545', 'tetaes', '16464646946', 'fafd@yahoo.com', 'Male', NULL, NULL, '12', '2013-03-02', '1985-10-10', 'Class-1', NULL, '0', 'A', '12121212', '21121212', 'fdfads', 'fadsf', NULL, NULL, '212121', '152121212', NULL, 'fdadfas', 'fadsfas', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(8, '2013115', '2013115A12', 'Hasan', 'fafa', 'dafasf', NULL, '', '13131313', 'teate', '132131313', 'test', '1321545', 'test@yahoo.com', 'Male', NULL, NULL, '12', '2013-03-12', '1985-10-10', 'Class-1', NULL, '0', 'A', '132131313', '1313', 'fdafa', 'fdafas', NULL, NULL, '213111313', '13323', NULL, 'fadfas', 'fasfdas', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(9, '2013126', '2013126B12', 'Ahsan', 'fadfa', 'fafda', NULL, '', '122122', 'teat', '1313131', 'teata', '143646541641', 'fdafs@yahoo.com', 'Male', NULL, NULL, '12', '2013-03-12', '1986-12-11', 'Class-1', NULL, '0', 'B', '1213213', '2121212', 'fadsf', 'fadfa', NULL, NULL, '1231212', '121212', NULL, 'fadfa', 'fadfdas', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(10, '2013127', '2013127B11', 'Tanin', 'dfafa', 'fdadf', NULL, '', '12122', 'dafadsf', '31313113', 'fadfas', '212155512', 'fadfas@gmail.com', 'Male', NULL, NULL, '11', '2013-02-11', '1987-01-12', 'Class-1', NULL, '0', 'B', '13131', '3323', 'fads', 'fdas', NULL, NULL, '131313', '121212', NULL, 'fadfas', 'fdas', '1', '1', NULL, '2', NULL, NULL, NULL, 1),
(11, '2013118', '2013118A11', 'Himel', 'fadfas', 'fadsfass', NULL, '', '213233', 'dfafas', '1313131313', 'fadfas', '1251354551212', 'fadsf@yahoo.com', 'Male', NULL, NULL, '11', '2013-03-12', '1987-10-11', 'Class-1', NULL, '0', 'A', '1131312', '2133123', 'fda', 'fdafa', NULL, NULL, '322133', '21212122', NULL, 'fadfas', 'fads', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(12, '2013119', '2013119A11', 'Urmi', 'topu', 'nima', NULL, '', '321121', 'urmi', '1313131', 'urmi', '13131313', 'urmi@yahoo.com', 'Female', NULL, NULL, '11', '2013-03-12', '1985-02-10', 'Class-1', NULL, '0', 'A', '1313131', '1212113', 'business', 'housewife', NULL, NULL, '121212', '31321212', NULL, 'abc', 'dhaka', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(13, '20131110', '20131110A11', 'Urmi', 'topu', 'nima', NULL, '', '321121', 'urmi', '1313131', 'urmi', '13131313', 'urmi@yahoo.com', 'Female', NULL, NULL, '11', '2013-03-12', '1985-02-10', 'Class-1', NULL, '0', 'A', '1313131', '1212113', 'business', 'housewife', NULL, NULL, '121212', '31321212', NULL, 'abc', 'dhaka', '1', '1', NULL, '1', NULL, NULL, NULL, 1),
(14, '20135711', '20135711A7', 'brinto', 'dulal', '', NULL, '', '245245425425', '', '', '', '', '', 'Male', NULL, NULL, '7', '2013-03-02', '2001-01-03', 'class-5', NULL, '', 'A', '', '', '', '', NULL, NULL, '23434', '', NULL, '', '', '', '', NULL, '', NULL, NULL, NULL, 1),
(15, '20131112', '20131112A7', 'tomal', '', '', NULL, '', '', '', '', '', '', '', 'Male', NULL, NULL, '7', '2013-02-09', '2007-04-18', 'Class-1', NULL, '', 'A', '', '', '', '', NULL, NULL, '326254363', '', NULL, '', '', '', '', NULL, '', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_sub_menu1`
--

CREATE TABLE IF NOT EXISTS `web_sub_menu1` (
  `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_menu_name` varchar(80) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  `sub_menu_content` varchar(80) NOT NULL,
  `sub1_sub_menu` varchar(10) NOT NULL,
  `_show` int(1) NOT NULL,
  PRIMARY KEY (`sub_menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=64 ;

--
-- Dumping data for table `web_sub_menu1`
--

INSERT INTO `web_sub_menu1` (`sub_menu_id`, `sub_menu_name`, `main_menu_id`, `sub_menu_content`, `sub1_sub_menu`, `_show`) VALUES
(1, 'Principal''s Message', 2, 'principal_message', 'yes', 1),
(2, 'Mission and Vision', 2, 'mission_vision', 'yes', 1),
(13, 'Why US', 2, 'why_us', '', 1),
(14, 'School Policies', 2, 'school_policies', '', 1),
(16, 'Our Team', 2, 'our_team', '', 1),
(17, 'Head of Junior School', 2, 'head_junior_school', '', 1),
(22, 'Head of Middle School', 2, 'head_middle_school', '', 1),
(23, 'Head of Senior School', 2, 'head_senior_school', '', 1),
(24, 'Head of Arabic Department', 2, 'head_arabic_department', '', 1),
(25, 'AIS Mothers'' Group', 2, 'ais_mothers_group', '', 0),
(26, 'Early Learning Center (ELC)', 3, 'early_learning_center', '', 1),
(27, 'Junior School Curriculum', 3, 'junior_school_curriculum', '', 1),
(28, 'Middle School Curriculum', 3, 'middle_school_curriculum', '', 1),
(29, 'Senior School Curriculum', 3, 'senior_school_curriculum', '', 1),
(30, 'SHIP Program', 3, 'ship_program', '', 1),
(31, 'Performing Arts', 3, 'performing_arts', '', 1),
(32, 'French at AIS', 3, 'french_ais', '', 0),
(33, 'Camps and Excursions', 3, 'camps_excursions', '', 1),
(34, 'ESL Support Program at AIS', 3, 'esl_support_program', '', 0),
(35, 'Canteen', 4, 'canteen', '', 1),
(36, 'Stationery List', 4, 'stationery_list', '', 1),
(37, 'Uniform Order Forms', 4, 'uniform_order_forms', '', 1),
(38, 'Outdoor Areas', 5, 'outdoor_areas', '', 1),
(39, 'Computer Lab', 5, 'computer_lab', '', 1),
(40, 'Science Labs', 5, 'science_labs', '', 1),
(41, 'Music Room', 5, 'music_room', '', 1),
(42, 'Conference Room', 5, 'conference_room', '', 1),
(43, 'Swimming Pool', 5, 'swimming_pool', '', 1),
(44, 'Gymnasium', 5, 'gymnasium', '', 1),
(45, 'Library', 5, 'library', '', 1),
(46, 'Medical Clinic', 5, 'medical_clinic', '', 1),
(47, 'Transportation', 5, 'transportation', '', 1),
(48, 'Enrollment procedures and process', 12, 'enrollment_procedures_process', '', 1),
(49, 'Download forms', 12, 'download_forms', '', 1),
(50, 'Photos Album', 13, 'gallery', '', 1),
(51, 'Video Album', 13, 'gallery', '', 1),
(52, 'Photo Archive', 13, 'gallery', '', 1),
(53, 'Events Calender- 2012- 2013', 14, 'events_calende', '', 1),
(54, 'NEWSLETTER PRAISE', 14, 'newsletter_praise', '', 1),
(55, 'Celebrates National Day', 14, 'celebrates_national_day', '', 1),
(56, 'welcomes the new staff', 14, 'welcomes_new_staff', '', 1),
(57, 'Indoor Soccer Academy', 14, 'indoor_soccer_academy', '', 1),
(58, 'FLASH MOB', 14, 'flash_mob', '', 1),
(59, 'Code of conduct', 15, 'careers', '', 1),
(60, 'Apply Online', 15, 'apply_online', '', 1),
(61, 'Current Opening', 15, 'current_opening', '', 1),
(62, ' Contact Us', 16, 'visit', '', 1),
(63, 'Location map', 16, 'location_map', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_sub_menu2`
--

CREATE TABLE IF NOT EXISTS `web_sub_menu2` (
  `sub_menu2_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name2` varchar(80) DEFAULT NULL,
  `sub_menu1_id` int(11) NOT NULL,
  `menu_content` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`sub_menu2_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `web_sub_menu2`
--


-- --------------------------------------------------------

--
-- Table structure for table `web_user_acl`
--

CREATE TABLE IF NOT EXISTS `web_user_acl` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(80) DEFAULT NULL,
  `full_name` varchar(80) NOT NULL,
  `password` varchar(80) DEFAULT NULL,
  `user_type` varchar(40) DEFAULT NULL,
  `user_group_id` int(10) DEFAULT NULL,
  `created_by` varchar(80) NOT NULL,
  `user_create_time` varchar(80) DEFAULT NULL,
  `main_menu` varchar(80) DEFAULT NULL,
  `sub_menu1` varchar(80) DEFAULT NULL,
  `sub_menu2` varchar(80) DEFAULT NULL,
  `pos_id` int(10) DEFAULT NULL,
  `member_id` int(10) DEFAULT NULL,
  `founder_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `web_user_acl`
--

INSERT INTO `web_user_acl` (`user_id`, `user_name`, `full_name`, `password`, `user_type`, `user_group_id`, `created_by`, `user_create_time`, `main_menu`, `sub_menu1`, `sub_menu2`, `pos_id`, `member_id`, `founder_id`) VALUES
(32, 'admin', '', 'admin', 'admin', 2, '', NULL, NULL, NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_user_info`
--

CREATE TABLE IF NOT EXISTS `web_user_info` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(80) DEFAULT NULL,
  `full_name` varchar(80) NOT NULL,
  `password` varchar(80) DEFAULT NULL,
  `user_type` varchar(40) DEFAULT NULL,
  `created_by` varchar(80) NOT NULL,
  `user_create_time` varchar(80) DEFAULT NULL,
  `main_menu` varchar(80) DEFAULT NULL,
  `sub_menu1` varchar(80) DEFAULT NULL,
  `sub_menu2` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `web_user_info`
--

INSERT INTO `web_user_info` (`user_id`, `user_name`, `full_name`, `password`, `user_type`, `created_by`, `user_create_time`, `main_menu`, `sub_menu1`, `sub_menu2`) VALUES
(1, 'Admin', '', 'admin@bn', 'super', 'admin', '00:00:02', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', ''),
(2, 'robi', '', 'abc', 'client', 'admin', NULL, '1,4,5,6', '3,6,7,8,9', NULL),
(10, 'kjk', 'ui', 'jk', 'Admin', 'Admin', '09:29:48', '1,6', '1,2,3,4,5,6,7,8,9,10', NULL),
(11, 'nmnm', 'mnm', 'm', 'Normal user', 'Admin', '20110911095827', '1,2,3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_user_log`
--

CREATE TABLE IF NOT EXISTS `web_user_log` (
  `serial_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` varchar(80) NOT NULL,
  `login_ip` varchar(40) NOT NULL,
  `session_id` varchar(160) NOT NULL,
  `logout_time` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `web_user_log`
--

