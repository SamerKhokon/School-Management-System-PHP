/*
SQLyog Community v11.0 (64 bit)
MySQL - 5.1.36-community-log : Database - school
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`school` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `school`;

/*Table structure for table `left_menu` */

DROP TABLE IF EXISTS `left_menu`;

CREATE TABLE `left_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `left_menu_name` varchar(200) DEFAULT NULL,
  `left_menu1_id` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `left_menu` */

insert  into `left_menu`(`id`,`left_menu_name`,`left_menu1_id`,`file_name`) values (1,'Student Info',NULL,NULL),(2,'Exam Info',NULL,NULL),(3,'Student Fee Info',NULL,NULL),(4,'Course Info',NULL,NULL),(5,'Class Routine',NULL,NULL);

/*Table structure for table `main_menu` */

DROP TABLE IF EXISTS `main_menu`;

CREATE TABLE `main_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `main_name` varchar(100) DEFAULT NULL,
  `flag` varchar(10) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `main_menu` */

insert  into `main_menu`(`id`,`main_name`,`flag`,`order_id`) values (1,'Home','st',1),(2,'Administration',NULL,8),(3,'View','st',2),(5,'Accounting',NULL,6),(6,'Option','st',3),(8,'Student Fee',NULL,4),(9,'Teachers Info',NULL,7),(10,'Menu Permission',NULL,9),(11,'Fee','st',4),(12,'Exam & Result','st',5),(13,'Dashboard','ref_home',NULL),(14,'Home','tc',1),(15,'View','tc',5),(16,'Option','tc',10),(17,'Home','lib',1),(18,'View','lib',5),(19,'Setting','lib',10),(20,'Home',NULL,NULL),(21,'Home','ac',1),(22,'Make Fee','ac',5),(23,'Home',NULL,NULL),(24,'Administration',NULL,NULL),(25,'Home','ex',1),(26,'Option','ex',5),(27,'Home','ad',1),(28,'Accademic Setting','ad',5),(29,'Employment Setting','ad',10),(30,'SMS','ad',15),(31,'Notice Setting','ad',20),(32,'View','ad',25),(33,'Help','ad',30),(34,'Home','tr',1),(35,'View','tr',5),(36,'Setting','tr',10),(37,'Check Fee','ac',10),(38,'Make Voucher','ac',15),(39,'Collect Fee','ac',20),(40,'Amendment Fee','ac',25),(41,'View','ac',30),(42,'Result Processing','ex',10),(43,'Promotion','ex',15),(44,'Home','tt',NULL),(45,'View','tt',NULL),(46,'Time-Table','ad',9),(47,'Home','parents_ho',1),(48,'Student Profile','parents',2),(49,'Fee Info','parents',3),(50,'Exam Info','parents',4),(51,'Result Info','parents',5),(52,'Notice Info','parents',6),(53,'Attendance Info','parents',7);

/*Table structure for table `std_attendence_info` */

DROP TABLE IF EXISTS `std_attendence_info`;

CREATE TABLE `std_attendence_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stu_id` int(10) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `section` varchar(5) DEFAULT NULL,
  `total_attend` int(10) DEFAULT NULL,
  `total_absent` int(10) DEFAULT NULL,
  `total_open_day` int(10) DEFAULT NULL,
  `month` date DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_attendence_info` */

/*Table structure for table `std_book_list` */

DROP TABLE IF EXISTS `std_book_list`;

CREATE TABLE `std_book_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `book_title` varchar(200) DEFAULT NULL,
  `book_author` varchar(200) DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `std_book_list` */

insert  into `std_book_list`(`id`,`class_id`,`book_title`,`book_author`,`isbn`,`branch_id`) values (1,1,'Bangla(Class-1)','board book','--',1);

/*Table structure for table `std_branch` */

DROP TABLE IF EXISTS `std_branch`;

CREATE TABLE `std_branch` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `std_branch` */

insert  into `std_branch`(`id`,`branch_name`,`address`,`phone`,`mobile`) values (1,'branch1','dhaka,banani','1212121','266313131'),(2,'branch2','dhaka,mirpur','5646464','6876464'),(3,'branch3','dhaka,uttara','5646464','6876464'),(4,'branch4','dhaka,mohakhali','5646464','6876464'),(5,'branch5','dhaka,dhanmondi','5646464','6876464'),(6,'branch6','dhaka,motijhil','5646464','6876464'),(7,'branch7','dhaka,santinagar','5646464','6876464');

/*Table structure for table `std_class_config` */

DROP TABLE IF EXISTS `std_class_config`;

CREATE TABLE `std_class_config` (
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
  `class_order` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `std_class_config` */

insert  into `std_class_config`(`id`,`class_name`,`no_of_student`,`remarks`,`total_CT`,`total_st`,`branch_id`,`daily_class`,`class_start_time`,`exam_fee`,`developement_fee`,`monthly_fee`,`hostel_fee`,`tution_fee`,`leb_fee`,`section_system`,`class_order`) values (1,'Class-1','50',NULL,NULL,NULL,1,4,'08:00',0,0,0,0,0,0,'E',NULL),(2,'Class-2','60',NULL,NULL,NULL,1,4,'08:00',0,0,0,0,0,0,'E',NULL);

/*Table structure for table `std_class_exam` */

DROP TABLE IF EXISTS `std_class_exam`;

CREATE TABLE `std_class_exam` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_class_exam` */

/*Table structure for table `std_class_exam_arc` */

DROP TABLE IF EXISTS `std_class_exam_arc`;

CREATE TABLE `std_class_exam_arc` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_class_exam_arc` */

/*Table structure for table `std_class_exam_mark_setting` */

DROP TABLE IF EXISTS `std_class_exam_mark_setting`;

CREATE TABLE `std_class_exam_mark_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `class_sec` varchar(50) DEFAULT NULL,
  `stu_id` varchar(50) DEFAULT NULL,
  `sub_id` varchar(10) DEFAULT NULL,
  `subjective_mark` decimal(10,2) DEFAULT NULL,
  `objective_mark` decimal(10,2) DEFAULT NULL,
  `ct_mark` decimal(10,2) DEFAULT NULL,
  `pt_mark` decimal(10,2) DEFAULT '0.00',
  `total_mark` decimal(10,2) DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `point` decimal(10,2) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `period` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_class_exam_mark_setting` */

/*Table structure for table `std_class_info` */

DROP TABLE IF EXISTS `std_class_info`;

CREATE TABLE `std_class_info` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `std_class_info` */

insert  into `std_class_info`(`id`,`class_id`,`class_name`,`class_sec`,`stu_id`,`stu_name`,`class_roll`,`total_open_day`,`total_atten`,`total_leave`,`total_abs`,`stuts`,`remarks`,`year`,`result`,`final_marks`,`branch_id`,`ovr_roll`) values (1,1,'Class-1','A','2013111','lipon',1,NULL,NULL,NULL,NULL,NULL,NULL,'2013',NULL,NULL,1,1);

/*Table structure for table `std_class_info_arc` */

DROP TABLE IF EXISTS `std_class_info_arc`;

CREATE TABLE `std_class_info_arc` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_class_info_arc` */

/*Table structure for table `std_class_period` */

DROP TABLE IF EXISTS `std_class_period`;

CREATE TABLE `std_class_period` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `break_flag` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`period_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `std_class_period` */

insert  into `std_class_period`(`period_id`,`period`,`start_time`,`end_time`,`entry_date`,`break_flag`,`branch_id`,`flag`) values (1,'1st','08:00:00','09:00:00','2013-07-03',0,'1',1),(2,'2nd','09:05:00','09:50:00','2013-07-03',0,'1',1),(3,'3rd','09:55:00','10:40:00','2013-07-03',0,'1',1),(4,'4th','10:45:00','11:30:00','2013-07-03',0,'1',1),(5,'Tiffin','11:30:00','12:30:00','2013-07-03',1,'1',1),(6,'5th','12:35:00','13:20:00','2013-07-03',0,'1',1),(7,'6th','13:25:00','14:10:00','2013-07-03',0,'1',1),(8,'7th','14:15:00','15:00:00','2013-07-03',0,'1',1);

/*Table structure for table `std_class_routine` */

DROP TABLE IF EXISTS `std_class_routine`;

CREATE TABLE `std_class_routine` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_class_routine` */

/*Table structure for table `std_class_routine_2` */

DROP TABLE IF EXISTS `std_class_routine_2`;

CREATE TABLE `std_class_routine_2` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_class_routine_2` */

/*Table structure for table `std_class_routine_new` */

DROP TABLE IF EXISTS `std_class_routine_new`;

CREATE TABLE `std_class_routine_new` (
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
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `std_class_routine_new` */

insert  into `std_class_routine_new`(`id`,`day`,`period_id`,`class_id`,`section_id`,`teacher_id`,`subject_id`,`break_flag`,`branch_id`,`active_flag`,`entry_date`) values (1,1,1,1,1,1,1,0,'1',1,'2013-07-03'),(2,1,2,1,1,0,0,0,'1',1,'2013-07-03'),(3,1,3,1,1,0,0,0,'1',1,'2013-07-03'),(4,1,4,1,1,0,0,0,'1',1,'2013-07-03'),(5,1,5,1,1,0,0,1,'1',1,'2013-07-03'),(6,1,6,1,1,0,0,0,'1',1,'2013-07-03'),(7,1,7,1,1,0,0,0,'1',1,'2013-07-03'),(8,1,8,1,1,0,0,0,'1',1,'2013-07-03'),(9,1,1,1,2,2,2,0,'1',1,'2013-07-03'),(10,1,2,1,2,0,0,0,'1',1,'2013-07-03'),(11,1,3,1,2,0,0,0,'1',1,'2013-07-03'),(12,1,4,1,2,0,0,0,'1',1,'2013-07-03'),(13,1,5,1,2,0,0,1,'1',1,'2013-07-03'),(14,1,6,1,2,0,0,0,'1',1,'2013-07-03'),(15,1,7,1,2,0,0,0,'1',1,'2013-07-03'),(16,1,8,1,2,0,0,0,'1',1,'2013-07-03'),(17,2,1,1,1,0,0,0,'1',1,'2013-07-03'),(18,2,2,1,1,0,0,0,'1',1,'2013-07-03'),(19,2,3,1,1,0,0,0,'1',1,'2013-07-03'),(20,2,4,1,1,0,0,0,'1',1,'2013-07-03'),(21,2,5,1,1,0,0,1,'1',1,'2013-07-03'),(22,2,6,1,1,0,0,0,'1',1,'2013-07-03'),(23,2,7,1,1,0,0,0,'1',1,'2013-07-03'),(24,2,8,1,1,0,0,0,'1',1,'2013-07-03'),(25,2,1,1,2,0,0,0,'1',1,'2013-07-03'),(26,2,2,1,2,0,0,0,'1',1,'2013-07-03'),(27,2,3,1,2,0,0,0,'1',1,'2013-07-03'),(28,2,4,1,2,0,0,0,'1',1,'2013-07-03'),(29,2,5,1,2,0,0,1,'1',1,'2013-07-03'),(30,2,6,1,2,0,0,0,'1',1,'2013-07-03'),(31,2,7,1,2,0,0,0,'1',1,'2013-07-03'),(32,2,8,1,2,0,0,0,'1',1,'2013-07-03'),(33,3,1,1,1,0,0,0,'1',1,'2013-07-03'),(34,3,2,1,1,0,0,0,'1',1,'2013-07-03'),(35,3,3,1,1,0,0,0,'1',1,'2013-07-03'),(36,3,4,1,1,0,0,0,'1',1,'2013-07-03'),(37,3,5,1,1,0,0,1,'1',1,'2013-07-03'),(38,3,6,1,1,0,0,0,'1',1,'2013-07-03'),(39,3,7,1,1,0,0,0,'1',1,'2013-07-03'),(40,3,8,1,1,0,0,0,'1',1,'2013-07-03'),(41,3,1,1,2,0,0,0,'1',1,'2013-07-03'),(42,3,2,1,2,0,0,0,'1',1,'2013-07-03'),(43,3,3,1,2,0,0,0,'1',1,'2013-07-03'),(44,3,4,1,2,0,0,0,'1',1,'2013-07-03'),(45,3,5,1,2,0,0,1,'1',1,'2013-07-03'),(46,3,6,1,2,0,0,0,'1',1,'2013-07-03'),(47,3,7,1,2,0,0,0,'1',1,'2013-07-03'),(48,3,8,1,2,0,0,0,'1',1,'2013-07-03'),(49,4,1,1,1,0,0,0,'1',1,'2013-07-03'),(50,4,2,1,1,0,0,0,'1',1,'2013-07-03'),(51,4,3,1,1,0,0,0,'1',1,'2013-07-03'),(52,4,4,1,1,0,0,0,'1',1,'2013-07-03'),(53,4,5,1,1,0,0,1,'1',1,'2013-07-03'),(54,4,6,1,1,0,0,0,'1',1,'2013-07-03'),(55,4,7,1,1,0,0,0,'1',1,'2013-07-03'),(56,4,8,1,1,0,0,0,'1',1,'2013-07-03'),(57,4,1,1,2,0,0,0,'1',1,'2013-07-03'),(58,4,2,1,2,0,0,0,'1',1,'2013-07-03'),(59,4,3,1,2,0,0,0,'1',1,'2013-07-03'),(60,4,4,1,2,0,0,0,'1',1,'2013-07-03'),(61,4,5,1,2,0,0,1,'1',1,'2013-07-03'),(62,4,6,1,2,0,0,0,'1',1,'2013-07-03'),(63,4,7,1,2,0,0,0,'1',1,'2013-07-03'),(64,4,8,1,2,0,0,0,'1',1,'2013-07-03'),(65,5,1,1,1,0,0,0,'1',1,'2013-07-03'),(66,5,2,1,1,0,0,0,'1',1,'2013-07-03'),(67,5,3,1,1,0,0,0,'1',1,'2013-07-03'),(68,5,4,1,1,0,0,0,'1',1,'2013-07-03'),(69,5,5,1,1,0,0,1,'1',1,'2013-07-03'),(70,5,6,1,1,0,0,0,'1',1,'2013-07-03'),(71,5,7,1,1,0,0,0,'1',1,'2013-07-03'),(72,5,8,1,1,0,0,0,'1',1,'2013-07-03'),(73,5,1,1,2,0,0,0,'1',1,'2013-07-03'),(74,5,2,1,2,0,0,0,'1',1,'2013-07-03'),(75,5,3,1,2,0,0,0,'1',1,'2013-07-03'),(76,5,4,1,2,0,0,0,'1',1,'2013-07-03'),(77,5,5,1,2,0,0,1,'1',1,'2013-07-03'),(78,5,6,1,2,0,0,0,'1',1,'2013-07-03'),(79,5,7,1,2,0,0,0,'1',1,'2013-07-03'),(80,5,8,1,2,0,0,0,'1',1,'2013-07-03'),(81,6,1,1,1,0,0,0,'1',1,'2013-07-03'),(82,6,2,1,1,0,0,0,'1',1,'2013-07-03'),(83,6,3,1,1,0,0,0,'1',1,'2013-07-03'),(84,6,4,1,1,0,0,0,'1',1,'2013-07-03'),(85,6,5,1,1,0,0,1,'1',1,'2013-07-03'),(86,6,6,1,1,0,0,0,'1',1,'2013-07-03'),(87,6,7,1,1,0,0,0,'1',1,'2013-07-03'),(88,6,8,1,1,0,0,0,'1',1,'2013-07-03'),(89,6,1,1,2,0,0,0,'1',1,'2013-07-03'),(90,6,2,1,2,0,0,0,'1',1,'2013-07-03'),(91,6,3,1,2,0,0,0,'1',1,'2013-07-03'),(92,6,4,1,2,0,0,0,'1',1,'2013-07-03'),(93,6,5,1,2,0,0,1,'1',1,'2013-07-03'),(94,6,6,1,2,0,0,0,'1',1,'2013-07-03'),(95,6,7,1,2,0,0,0,'1',1,'2013-07-03'),(96,6,8,1,2,0,0,0,'1',1,'2013-07-03');

/*Table structure for table `std_class_routine_test` */

DROP TABLE IF EXISTS `std_class_routine_test`;

CREATE TABLE `std_class_routine_test` (
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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `std_class_routine_test` */

/*Table structure for table `std_class_section_config` */

DROP TABLE IF EXISTS `std_class_section_config`;

CREATE TABLE `std_class_section_config` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `std_class_section_config` */

insert  into `std_class_section_config`(`id`,`section_name`,`class_id`,`class_name`,`class_teacher_id`,`class_teacher_name`,`subject_id`,`subject_name`,`no_of_student`,`branch_id`,`group_id`,`section_system`) values (1,'A',1,'Class-1',0,'test',1,'Bangla',25,1,NULL,'E'),(2,'B',1,'Class-1',0,'Siddik',2,'English',25,1,NULL,'E');

/*Table structure for table `std_class_student_info` */

DROP TABLE IF EXISTS `std_class_student_info`;

CREATE TABLE `std_class_student_info` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `std_class_student_info` */

insert  into `std_class_student_info`(`id`,`class_id`,`sec_id`,`class_name`,`class_sec`,`stu_id`,`stu_name`,`class_roll`,`total_open_day`,`total_atten`,`total_leave`,`total_abs`,`stuts`,`remarks`,`year`,`result`,`final_marks`,`branch_id`,`branch_name`,`group_id`,`group_name`,`ovr_roll`) values (1,1,1,'Class-1','A','2013111','lipon',1,NULL,NULL,NULL,NULL,'Admitted',NULL,'2013',NULL,NULL,1,NULL,NULL,NULL,1);

/*Table structure for table `std_exam_config` */

DROP TABLE IF EXISTS `std_exam_config`;

CREATE TABLE `std_exam_config` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(100) DEFAULT NULL,
  `period` varchar(100) DEFAULT NULL,
  `Prefix` varchar(10) DEFAULT NULL,
  `branch_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_exam_config` */

/*Table structure for table `std_exam_config_new` */

DROP TABLE IF EXISTS `std_exam_config_new`;

CREATE TABLE `std_exam_config_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_year` int(11) NOT NULL,
  `exam_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `period_ids` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `std_exam_config_new` */

insert  into `std_exam_config_new`(`id`,`academic_year`,`exam_name`,`period_ids`,`entry_date`,`flag`,`branch_id`) values (1,2013,'1st Term','-1,1,2,3,-1','2013-07-03',1,1),(2,2013,'2nd Term','-1,1,2,3,-1','2013-07-03',1,1),(3,2013,'Final Exam','-1,4,5,6,-1','2013-07-03',1,1);

/*Table structure for table `std_exam_period` */

DROP TABLE IF EXISTS `std_exam_period`;

CREATE TABLE `std_exam_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `std_exam_period` */

insert  into `std_exam_period`(`id`,`period`,`start_time`,`end_time`,`flag`,`entry_date`) values (1,'1st Exam','09:00:00','11:30:00',1,'2013-07-03'),(2,'2nd Exam','12:00:00','13:30:00',1,'2013-07-03'),(3,'3rd Exam','14:00:00','16:30:00',1,'2013-07-03'),(4,'1st Exam(F)','08:30:00','11:30:00',1,'2013-07-03'),(5,'2nd Exam(F)','12:00:00','15:00:00',1,'2013-07-03'),(6,'3rd Exam(F)','16:00:00','19:00:00',1,'2013-07-03');

/*Table structure for table `std_exam_routine_new` */

DROP TABLE IF EXISTS `std_exam_routine_new`;

CREATE TABLE `std_exam_routine_new` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `std_exam_routine_new` */

insert  into `std_exam_routine_new`(`id`,`academic_year`,`exam_name_id`,`exam_date`,`exam_period_id`,`start_time`,`end_time`,`class_id`,`section_id`,`subject_id`,`entry_date`,`branch_id`,`flag`) values (1,2013,1,'2013-07-03',1,'09:00:00','11:30:00',1,0,1,'2013-07-03',1,1);

/*Table structure for table `std_exam_schedule` */

DROP TABLE IF EXISTS `std_exam_schedule`;

CREATE TABLE `std_exam_schedule` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_exam_schedule` */

/*Table structure for table `std_fee_collection` */

DROP TABLE IF EXISTS `std_fee_collection`;

CREATE TABLE `std_fee_collection` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_fee_collection` */

/*Table structure for table `std_fee_details` */

DROP TABLE IF EXISTS `std_fee_details`;

CREATE TABLE `std_fee_details` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_fee_details` */

/*Table structure for table `std_fee_details_bak` */

DROP TABLE IF EXISTS `std_fee_details_bak`;

CREATE TABLE `std_fee_details_bak` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `std_fee_details_bak` */

/*Table structure for table `std_fee_info` */

DROP TABLE IF EXISTS `std_fee_info`;

CREATE TABLE `std_fee_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `std_fee_info` */

/*Table structure for table `std_final_result_after_process` */

DROP TABLE IF EXISTS `std_final_result_after_process`;

CREATE TABLE `std_final_result_after_process` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(30) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `class_sec` varchar(5) DEFAULT NULL,
  `prev_sec_roll` int(10) DEFAULT NULL,
  `prev_class_roll` int(10) DEFAULT NULL,
  `new_sec_roll` int(10) DEFAULT NULL,
  `new_class_roll` int(10) DEFAULT NULL,
  `period` int(10) DEFAULT NULL,
  `cgpa` decimal(10,2) DEFAULT NULL,
  `grade` varchar(3) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_final_result_after_process` */

/*Table structure for table `std_mark_promo` */

DROP TABLE IF EXISTS `std_mark_promo`;

CREATE TABLE `std_mark_promo` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_mark_promo` */

/*Table structure for table `std_profile` */

DROP TABLE IF EXISTS `std_profile`;

CREATE TABLE `std_profile` (
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
  `religion` varchar(40) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `quota` varchar(30) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `std_profile` */

insert  into `std_profile`(`id`,`stu_id`,`name`,`father_name`,`mother_name`,`pre_address`,`par_address`,`home_phone`,`emer_name1`,`emer_mobile1`,`emer_name2`,`emer_mobile2`,`mail_add`,`sex`,`age`,`adm_date`,`dob`,`adm_class`,`adm_class_roll`,`adm_group`,`section`,`father_income`,`mother_income`,`father_profession`,`mother_profession`,`father_qualification`,`mother_qualification`,`father_work_phone`,`mother_work_phone`,`admission_fee`,`priv_schoole_name`,`priv_school_add`,`priv_school_class`,`priv_school_class_roll`,`priv_school_remarks`,`priv_school_result`,`present_class`,`present_class_roll`,`st_status`,`branch_id`,`ovr_roll`,`religion`,`nationality`,`quota`,`password`) values (1,'2013111','lipon','abul','jarina','dhaka','','','','','','','','Male','1','2013-07-01','2006-10-10','1','1','','A','20000','10000','business','housewife','custom','custom','01685965321','01685965321','custom','abc','dhaka','1','1','custom','1','Class-1','custom','available',1,1,NULL,NULL,NULL,'123');

/*Table structure for table `std_subject_config` */

DROP TABLE IF EXISTS `std_subject_config`;

CREATE TABLE `std_subject_config` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `subject_code` varchar(10) DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `sub_mark` int(10) DEFAULT '0',
  `ct_mark` int(10) DEFAULT '0',
  `ob_mark` int(10) DEFAULT '0',
  `practical_mark` int(10) DEFAULT '0',
  `st_mark` int(10) DEFAULT '0',
  `final_mark` int(10) DEFAULT '0',
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `std_subject_config` */

insert  into `std_subject_config`(`id`,`class_id`,`subject_code`,`subject_name`,`short_name`,`sub_mark`,`ct_mark`,`ob_mark`,`practical_mark`,`st_mark`,`final_mark`,`branch_id`) values (1,1,'101','Bangla','BNG',30,30,30,10,0,100,1),(2,1,'102','English','Eng',40,30,30,0,0,100,1);

/*Table structure for table `std_tc_info` */

DROP TABLE IF EXISTS `std_tc_info`;

CREATE TABLE `std_tc_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_tc_info` */

/*Table structure for table `std_teacher` */

DROP TABLE IF EXISTS `std_teacher`;

CREATE TABLE `std_teacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `std_teacher` */

/*Table structure for table `std_teacher_info` */

DROP TABLE IF EXISTS `std_teacher_info`;

CREATE TABLE `std_teacher_info` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `std_teacher_info` */

insert  into `std_teacher_info`(`id`,`teacher_name`,`Telephone`,`mobile`,`email`,`Last_education`,`married`,`sex`,`picture`,`subject`,`group`,`job_experience`,`branch_id`,`teacher_code`,`nationality`,`birth_date`,`age`,`other_add`,`present_add`,`permenent_add`,`present_status`,`basic`,`medical`,`house_rent`,`others`,`joining_date`,`teacher_short_name`) values (1,'test','4464446466','01671523562','test@yahoo.com','bsc','Married','Male',NULL,'bangla','','2 yrs',1,'TC','Bangladeshi','1985-09-06',25,'','dhaka','dhaka','Teacher',0.00,NULL,NULL,NULL,'2010-10-10','CTR'),(2,'Siddik','123','01716614072','himelice@yahoo.com','MA','Single','Male',NULL,'English','Arts','5',1,'2','bangladeshi','1978-01-01',35,'','Mirpur','Mirpur','Lecturer',0.00,NULL,NULL,NULL,'2002-03-02','SDK');

/*Table structure for table `std_voucher_summery` */

DROP TABLE IF EXISTS `std_voucher_summery`;

CREATE TABLE `std_voucher_summery` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `std_voucher_summery` */

/*Table structure for table `sub_menu1` */

DROP TABLE IF EXISTS `sub_menu1`;

CREATE TABLE `sub_menu1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_menu1_name` varchar(100) DEFAULT NULL,
  `main_menu_id` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

/*Data for the table `sub_menu1` */

insert  into `sub_menu1`(`id`,`sub_menu1_name`,`main_menu_id`,`file_name`,`order_id`) values (1,'Course Info','3','view_course_info',NULL),(2,'Exam Info','','exam_information',NULL),(3,'Class Routine','3','class_routine_for_student',NULL),(4,'Student Profile','3','student_information',NULL),(5,'Student Fee Info','3','view_class_fee',NULL),(6,'Teacher\'s Routine','','teacher_routine_new',NULL),(9,'New Student','1','std_admission_form',NULL),(10,'Academic Activities',NULL,NULL,NULL),(11,'Make Fee','22','std_fee_generator_form',NULL),(12,'Employements','24',NULL,NULL),(13,'Teachers Details','15','teacher_information',NULL),(14,'Teacher Routine','15','class_routine_for_teacher',NULL),(15,'Student Attendance','15','student_attendence_entry',NULL),(91,'Generated Voucher List','38','generated_voucher_list',NULL),(17,'Generate Routine','24','routine_create',NULL),(18,'Add New Teacher','24','teacher_add_form',NULL),(19,'Create Syllabus','9',NULL,NULL),(20,'Notice Setting','24',NULL,NULL),(22,'Result Info','12','result_making_form',NULL),(23,'SMS Notification','24','sms_notification_send_form',NULL),(24,'Registration List','',NULL,NULL),(25,'Classwise Student Info','3','class_wise_student_info',NULL),(26,'Student Attendance Info','3','student_attendence_entry',NULL),(27,'Parents Info','3','parents_info',NULL),(65,'Book List','3','book_list',NULL),(30,'Notice Board','6','notice_board',NULL),(31,'Create Student Account','6','create_student_account_form',NULL),(32,'Student TC','6','student_tc_form',NULL),(33,'Scholarship ','11','scholarship_info',NULL),(34,'Transport Fee','11','transport_fee',NULL),(35,'Hostel Fee','11','hostel_fee',NULL),(36,'Fee Details','11','view_class_fee',NULL),(37,'Exam Routine','12','view_exam_routine',NULL),(38,'Subject Info','15','view_course_info',NULL),(39,'Classwise Notification','16',NULL,NULL),(40,'Parents Detail','15','parents_info',NULL),(41,'Holiday Info','15','holiday_info',NULL),(42,'Leave Info','15','leave_info',NULL),(43,'Teacher Attendance Info','16','teacher_attendance_entry',NULL),(44,'Leave Request','0',NULL,NULL),(45,'Add New Section','28','section_config',20),(46,'Setting class information','28','class_config',10),(47,'Add New Fee','28','add_student_fee',100),(48,'Subject configure','28','subject_config',15),(49,'Setting class fee','28','class_fee_config',110),(96,'Teacher List','0','teacher_list_form',10),(51,'Grade Configure','28','grade_setting',60),(52,'Teacher Routine','46','teacher_routine_new',50),(53,'Exam schedule setting','46','exam_schedule_config_new',90),(54,'Exam configure','46','exam_config_new',80),(55,'Add New Teacher','29','teacher_add_form',1),(56,'Add New employee','29','new_employee_form',20),(57,'Result SMS Send','30','result_sms_sender_html_form',NULL),(58,'Fee SMS Send','30','fee_sms_sender_html_form',NULL),(61,'Employee List','0','employee_list',30),(59,'Add New Notice','31','new_notice_add',NULL),(60,'Notice Log','0','notice_log',NULL),(63,'Employee Leave Requests',NULL,NULL,NULL),(64,'Teacher Leave Request',NULL,NULL,NULL),(66,'Subject Syllabus',NULL,NULL,NULL),(67,'Teacher Classes','','teacher_classes',NULL),(69,'Book Setting','28','book_add',120),(70,'Teacher List','32','teacher_list_form',NULL),(71,'Employee List','32','employee_list_form',NULL),(72,'Notice SMS Send','30','notice_sms_sender_html_form',NULL),(73,'Setting Class Period','46','setting_class_period',40),(75,'Admission List','1','admission_student_list',NULL),(76,'Checking Fee','37','payment_check',NULL),(77,'Generate Voucher','38','make_voucher_form',NULL),(78,'Fee Collect','39','fee_collection_form',NULL),(79,'Fee Amendment','40','fee_amendment_form',NULL),(80,'Class ways fees','41','class_way_total_fee',NULL),(81,'Student way fee','41','student_way_total_fee',NULL),(82,'Fee Collection Report','41','fee_collection_report',NULL),(83,'Setting Exam Period','46','setting_exam_period',70),(84,'Accademic Calendar','46','accademic_calendar',130),(85,'Result Processing','42','result_process_form',NULL),(86,'Promotion','43','promotion_form',NULL),(87,'Manual Exam Mark Setting','26','exam_mark_setting',NULL),(88,'Excel File Mark Setting','26','excel_mark_setting',NULL),(89,'Generate Excel Mark','26','generate_excel_form',NULL),(90,'Studentwise Marks','26','student_wise_marks',NULL),(92,'Fee Checked List','37','fee_checked_list',NULL),(93,'Fee SMS Notification','41','fee_sms_sender_html_form',NULL),(94,'Result SMS Notification','26','result_sms_sender_html_form',NULL),(95,'Accademic Calendar','3','accademic_calendar',NULL),(97,'Fee Collection List','39','fee_collection_report',NULL),(98,'Class Routine','45','class_routine_for_student',1),(99,' 	Teacher Routine','45','class_routine_for_teacher',5),(100,'Accademic Calendar','45','accademic_calendar',10),(101,'Term Result Report','42','term_result_report',NULL),(102,'Subjectwise Result Report','26','subjectwise_result_report',NULL),(103,'Voucher Generate','41','voucher_generate',NULL),(104,'Generate ID Card','3','generate_id_card',NULL),(105,'Aggregate Result Report','43','aggregate_result',NULL);

/*Table structure for table `sub_menu2` */

DROP TABLE IF EXISTS `sub_menu2`;

CREATE TABLE `sub_menu2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_menu2_name` varchar(100) DEFAULT NULL,
  `sub_menu1_id` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `sub_menu2` */

insert  into `sub_menu2`(`id`,`sub_menu2_name`,`sub_menu1_id`,`file_name`,`order_id`) values (12,'Add New Teacher','29','teacher_add_form',NULL),(13,'Add New employee','29','new_employee_form',NULL),(14,'Subject configure','28','subject_config',NULL),(15,'Exam schedule setting','28','exam_schedule_config',NULL),(16,'Class routine','28','class_routine',NULL),(17,'Setting class information','28','class_config',NULL),(18,'Exam configure','28','exam_config',NULL),(20,'Teachers class result','13',NULL,NULL),(22,'Add New Section','28','section_config',NULL),(23,'Teachers Routine','28','teacher_routine',NULL),(24,'Group setting','28','group_config',NULL),(25,'Setting class fee','28','class_fee_config',NULL),(27,'Add New Fee','28','add_student_fee',NULL),(28,'View Class Fee','28','view_class_fee',NULL),(32,'Manual Exam Mark Setting','16','exam_mark_setting',NULL),(33,'Excel File Mark Setting','16','excel_mark_setting',NULL),(34,'Generate Excel Mark','16','generate_excel_form',NULL),(35,'Text Notice','20',NULL,NULL),(36,'File Notice','20',NULL,NULL),(37,'Grade Configure','28','grade_setting',NULL),(38,'Result Processing','16','result_process_form',NULL),(40,'Promotion','16','promotion_form',NULL),(42,'Subjectwise Marks','16','subjectwise_mark_form',NULL),(43,'Email Notification','39','email_notification_ui_form',NULL),(44,'SMS Notification','39','sms_notification_form',NULL),(47,'Studentwise Marks','16','student_wise_marks',NULL),(48,'Accademic Calendar','10','accademic_calendar',NULL);

/*Table structure for table `tbl_acc_calendar` */

DROP TABLE IF EXISTS `tbl_acc_calendar`;

CREATE TABLE `tbl_acc_calendar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `day_name` varchar(20) DEFAULT NULL,
  `evtn_name` text,
  `flag` int(2) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=366 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_acc_calendar` */

insert  into `tbl_acc_calendar`(`id`,`date`,`day_name`,`evtn_name`,`flag`,`branch_id`) values (1,'2013-01-01','Tue',' ',0,1),(2,'2013-01-02','Wed','',0,1),(3,'2013-01-03','Thu',' ',0,1),(4,'2013-01-04','Fri','Weekend',1,1),(5,'2013-01-05','Sat',' ',0,1),(6,'2013-01-06','Sun',' ',0,1),(7,'2013-01-07','Mon','',0,1),(8,'2013-01-08','Tue','dfa',1,1),(9,'2013-01-09','Wed',' ',0,1),(10,'2013-01-10','Thu',' ',0,1),(11,'2013-01-11','Fri','Weekend',1,1),(12,'2013-01-12','Sat',' ',0,1),(13,'2013-01-13','Sun',' ',0,1),(14,'2013-01-14','Mon','',0,1),(15,'2013-01-15','Tue','',0,1),(16,'2013-01-16','Wed','',0,1),(17,'2013-01-17','Thu',' ',0,1),(18,'2013-01-18','Fri','Weekend',1,1),(19,'2013-01-19','Sat',' ',0,1),(20,'2013-01-20','Sun','',0,1),(21,'2013-01-21','Mon',' ',0,1),(22,'2013-01-22','Tue','',0,1),(23,'2013-01-23','Wed',' ',0,1),(24,'2013-01-24','Thu',' ',0,1),(25,'2013-01-25','Fri','Weekend',1,1),(26,'2013-01-26','Sat',' ',0,1),(27,'2013-01-27','Sun',' ',0,1),(28,'2013-01-28','Mon',' ',0,1),(29,'2013-01-29','Tue',' ',0,1),(30,'2013-01-30','Wed',' ',0,1),(31,'2013-01-31','Thu',' ',0,1),(32,'2013-02-01','Fri','Weekend',1,1),(33,'2013-02-02','Sat',' ',0,1),(34,'2013-02-03','Sun',' ',0,1),(35,'2013-02-04','Mon',' ',0,1),(36,'2013-02-05','Tue',' ',0,1),(37,'2013-02-06','Wed',' ',0,1),(38,'2013-02-07','Thu',' ',0,1),(39,'2013-02-08','Fri','Weekend',1,1),(40,'2013-02-09','Sat',' ',0,1),(41,'2013-02-10','Sun',' ',0,1),(42,'2013-02-11','Mon',' ',0,1),(43,'2013-02-12','Tue','',0,1),(44,'2013-02-13','Wed',' ',0,1),(45,'2013-02-14','Thu','',0,1),(46,'2013-02-15','Fri','Weekend',1,1),(47,'2013-02-16','Sat',' ',0,1),(48,'2013-02-17','Sun',' ',0,1),(49,'2013-02-18','Mon',' ',0,1),(50,'2013-02-19','Tue',' ',0,1),(51,'2013-02-20','Wed',' ',0,1),(52,'2013-02-21','Thu','Internation Mother Language Day',1,1),(53,'2013-02-22','Fri','Weekend',1,1),(54,'2013-02-23','Sat',' ',0,1),(55,'2013-02-24','Sun',' ',0,1),(56,'2013-02-25','Mon',' ',0,1),(57,'2013-02-26','Tue',' ',0,1),(58,'2013-02-27','Wed',' ',0,1),(59,'2013-02-28','Thu',' ',0,1),(60,'2013-03-01','Fri','Weekend',1,1),(61,'2013-03-02','Sat',' ',0,1),(62,'2013-03-03','Sun',' ',0,1),(63,'2013-03-04','Mon',' ',0,1),(64,'2013-03-05','Tue',' ',0,1),(65,'2013-03-06','Wed',' ',0,1),(66,'2013-03-07','Thu',' ',0,1),(67,'2013-03-08','Fri','Weekend',1,1),(68,'2013-03-09','Sat',' ',0,1),(69,'2013-03-10','Sun',' ',0,1),(70,'2013-03-11','Mon',' ',0,1),(71,'2013-03-12','Tue',' ',0,1),(72,'2013-03-13','Wed',' ',0,1),(73,'2013-03-14','Thu',' ',0,1),(74,'2013-03-15','Fri','Weekend',1,1),(75,'2013-03-16','Sat',' ',0,1),(76,'2013-03-17','Sun',' ',0,1),(77,'2013-03-18','Mon',' ',0,1),(78,'2013-03-19','Tue',' ',0,1),(79,'2013-03-20','Wed',' ',0,1),(80,'2013-03-21','Thu',' ',0,1),(81,'2013-03-22','Fri','Weekend',1,1),(82,'2013-03-23','Sat',' ',0,1),(83,'2013-03-24','Sun',' ',0,1),(84,'2013-03-25','Mon',' ',0,1),(85,'2013-03-26','Tue','Independent Day',1,1),(86,'2013-03-27','Wed',' ',0,1),(87,'2013-03-28','Thu',' ',0,1),(88,'2013-03-29','Fri','Weekend',1,1),(89,'2013-03-30','Sat',' ',0,1),(90,'2013-03-31','Sun',' ',0,1),(91,'2013-04-01','Mon',' ',0,1),(92,'2013-04-02','Tue',' ',0,1),(93,'2013-04-03','Wed',' ',0,1),(94,'2013-04-04','Thu',' ',0,1),(95,'2013-04-05','Fri','Weekend',1,1),(96,'2013-04-06','Sat',' ',0,1),(97,'2013-04-07','Sun',' ',0,1),(98,'2013-04-08','Mon',' ',0,1),(99,'2013-04-09','Tue',' ',0,1),(100,'2013-04-10','Wed',' ',0,1),(101,'2013-04-11','Thu',' ',0,1),(102,'2013-04-12','Fri','Weekend',1,1),(103,'2013-04-13','Sat','1st Bosonto',1,1),(104,'2013-04-14','Sun','Bangla Noboborso',1,1),(105,'2013-04-15','Mon',' ',0,1),(106,'2013-04-16','Tue',' ',0,1),(107,'2013-04-17','Wed',' ',0,1),(108,'2013-04-18','Thu',' ',0,1),(109,'2013-04-19','Fri','Weekend',1,1),(110,'2013-04-20','Sat',' ',0,1),(111,'2013-04-21','Sun',' ',0,1),(112,'2013-04-22','Mon',' ',0,1),(113,'2013-04-23','Tue',' ',0,1),(114,'2013-04-24','Wed',' ',0,1),(115,'2013-04-25','Thu',' ',0,1),(116,'2013-04-26','Fri','Weekend',1,1),(117,'2013-04-27','Sat',' ',0,1),(118,'2013-04-28','Sun',' ',0,1),(119,'2013-04-29','Mon',' ',0,1),(120,'2013-04-30','Tue',' ',0,1),(121,'2013-05-01','Wed','Labour Day',1,1),(122,'2013-05-02','Thu',' ',0,1),(123,'2013-05-03','Fri','Weekend',1,1),(124,'2013-05-04','Sat',' ',0,1),(125,'2013-05-05','Sun',' ',0,1),(126,'2013-05-06','Mon',' ',0,1),(127,'2013-05-07','Tue',' ',0,1),(128,'2013-05-08','Wed',' ',0,1),(129,'2013-05-09','Thu',' ',0,1),(130,'2013-05-10','Fri','Weekend',1,1),(131,'2013-05-11','Sat',' ',0,1),(132,'2013-05-12','Sun',' ',0,1),(133,'2013-05-13','Mon',' ',0,1),(134,'2013-05-14','Tue',' ',0,1),(135,'2013-05-15','Wed',' ',0,1),(136,'2013-05-16','Thu',' ',0,1),(137,'2013-05-17','Fri','Weekend',1,1),(138,'2013-05-18','Sat',' ',0,1),(139,'2013-05-19','Sun',' ',0,1),(140,'2013-05-20','Mon',' ',0,1),(141,'2013-05-21','Tue',' ',0,1),(142,'2013-05-22','Wed',' ',0,1),(143,'2013-05-23','Thu',' ',0,1),(144,'2013-05-24','Fri','Weekend',1,1),(145,'2013-05-25','Sat',' ',0,1),(146,'2013-05-26','Sun',' ',0,1),(147,'2013-05-27','Mon',' ',0,1),(148,'2013-05-28','Tue',' ',0,1),(149,'2013-05-29','Wed',' ',0,1),(150,'2013-05-30','Thu',' ',0,1),(151,'2013-05-31','Fri','Weekend',1,1),(152,'2013-06-01','Sat',' ',0,1),(153,'2013-06-02','Sun',' ',0,1),(154,'2013-06-03','Mon',' ',0,1),(155,'2013-06-04','Tue',' ',0,1),(156,'2013-06-05','Wed',' ',0,1),(157,'2013-06-06','Thu',' ',0,1),(158,'2013-06-07','Fri','Weekend',1,1),(159,'2013-06-08','Sat',' ',0,1),(160,'2013-06-09','Sun',' ',0,1),(161,'2013-06-10','Mon',' ',0,1),(162,'2013-06-11','Tue',' ',0,1),(163,'2013-06-12','Wed',' ',0,1),(164,'2013-06-13','Thu',' ',0,1),(165,'2013-06-14','Fri','Weekend',1,1),(166,'2013-06-15','Sat',' ',0,1),(167,'2013-06-16','Sun',' ',0,1),(168,'2013-06-17','Mon',' ',0,1),(169,'2013-06-18','Tue',' ',0,1),(170,'2013-06-19','Wed',' ',0,1),(171,'2013-06-20','Thu',' ',0,1),(172,'2013-06-21','Fri','Weekend',1,1),(173,'2013-06-22','Sat',' ',0,1),(174,'2013-06-23','Sun',' ',0,1),(175,'2013-06-24','Mon',' ',0,1),(176,'2013-06-25','Tue',' ',0,1),(177,'2013-06-26','Wed',' ',0,1),(178,'2013-06-27','Thu',' ',0,1),(179,'2013-06-28','Fri','Weekend',1,1),(180,'2013-06-29','Sat',' ',0,1),(181,'2013-06-30','Sun',' ',0,1),(182,'2013-07-01','Mon',' ',0,1),(183,'2013-07-02','Tue',' ',0,1),(184,'2013-07-03','Wed',' ',0,1),(185,'2013-07-04','Thu',' ',0,1),(186,'2013-07-05','Fri','Weekend',1,1),(187,'2013-07-06','Sat',' ',0,1),(188,'2013-07-07','Sun',' ',0,1),(189,'2013-07-08','Mon',' ',0,1),(190,'2013-07-09','Tue',' ',0,1),(191,'2013-07-10','Wed',' ',0,1),(192,'2013-07-11','Thu',' ',0,1),(193,'2013-07-12','Fri','Weekend',1,1),(194,'2013-07-13','Sat',' ',0,1),(195,'2013-07-14','Sun',' ',0,1),(196,'2013-07-15','Mon',' ',0,1),(197,'2013-07-16','Tue',' ',0,1),(198,'2013-07-17','Wed',' ',0,1),(199,'2013-07-18','Thu',' ',0,1),(200,'2013-07-19','Fri','Weekend',1,1),(201,'2013-07-20','Sat',' ',0,1),(202,'2013-07-21','Sun',' ',0,1),(203,'2013-07-22','Mon',' ',0,1),(204,'2013-07-23','Tue',' ',0,1),(205,'2013-07-24','Wed',' ',0,1),(206,'2013-07-25','Thu',' ',0,1),(207,'2013-07-26','Fri','Weekend',1,1),(208,'2013-07-27','Sat',' ',0,1),(209,'2013-07-28','Sun',' ',0,1),(210,'2013-07-29','Mon',' ',0,1),(211,'2013-07-30','Tue',' ',0,1),(212,'2013-07-31','Wed',' ',0,1),(213,'2013-08-01','Thu',' ',0,1),(214,'2013-08-02','Fri','Weekend',1,1),(215,'2013-08-03','Sat',' ',0,1),(216,'2013-08-04','Sun',' ',0,1),(217,'2013-08-05','Mon',' ',0,1),(218,'2013-08-06','Tue',' ',0,1),(219,'2013-08-07','Wed',' ',0,1),(220,'2013-08-08','Thu',' ',0,1),(221,'2013-08-09','Fri','Weekend',1,1),(222,'2013-08-10','Sat',' ',0,1),(223,'2013-08-11','Sun',' ',0,1),(224,'2013-08-12','Mon',' ',0,1),(225,'2013-08-13','Tue',' ',0,1),(226,'2013-08-14','Wed',' ',0,1),(227,'2013-08-15','Thu',' ',0,1),(228,'2013-08-16','Fri','Weekend',1,1),(229,'2013-08-17','Sat',' ',0,1),(230,'2013-08-18','Sun',' ',0,1),(231,'2013-08-19','Mon',' ',0,1),(232,'2013-08-20','Tue',' ',0,1),(233,'2013-08-21','Wed',' ',0,1),(234,'2013-08-22','Thu',' ',0,1),(235,'2013-08-23','Fri','Weekend',1,1),(236,'2013-08-24','Sat',' ',0,1),(237,'2013-08-25','Sun',' ',0,1),(238,'2013-08-26','Mon',' ',0,1),(239,'2013-08-27','Tue',' ',0,1),(240,'2013-08-28','Wed',' ',0,1),(241,'2013-08-29','Thu',' ',0,1),(242,'2013-08-30','Fri','Weekend',1,1),(243,'2013-08-31','Sat',' ',0,1),(244,'2013-09-01','Sun',' ',0,1),(245,'2013-09-02','Mon',' ',0,1),(246,'2013-09-03','Tue',' ',0,1),(247,'2013-09-04','Wed',' ',0,1),(248,'2013-09-05','Thu',' ',0,1),(249,'2013-09-06','Fri','Weekend',1,1),(250,'2013-09-07','Sat',' ',0,1),(251,'2013-09-08','Sun',' ',0,1),(252,'2013-09-09','Mon',' ',0,1),(253,'2013-09-10','Tue',' ',0,1),(254,'2013-09-11','Wed',' ',0,1),(255,'2013-09-12','Thu',' ',0,1),(256,'2013-09-13','Fri','Weekend',1,1),(257,'2013-09-14','Sat',' ',0,1),(258,'2013-09-15','Sun',' ',0,1),(259,'2013-09-16','Mon',' ',0,1),(260,'2013-09-17','Tue',' ',0,1),(261,'2013-09-18','Wed',' ',0,1),(262,'2013-09-19','Thu',' ',0,1),(263,'2013-09-20','Fri','Weekend',1,1),(264,'2013-09-21','Sat',' ',0,1),(265,'2013-09-22','Sun',' ',0,1),(266,'2013-09-23','Mon',' ',0,1),(267,'2013-09-24','Tue',' ',0,1),(268,'2013-09-25','Wed',' ',0,1),(269,'2013-09-26','Thu',' ',0,1),(270,'2013-09-27','Fri','Weekend',1,1),(271,'2013-09-28','Sat',' ',0,1),(272,'2013-09-29','Sun',' ',0,1),(273,'2013-09-30','Mon',' ',0,1),(274,'2013-10-01','Tue',' ',0,1),(275,'2013-10-02','Wed',' ',0,1),(276,'2013-10-03','Thu',' ',0,1),(277,'2013-10-04','Fri','Weekend',1,1),(278,'2013-10-05','Sat',' ',0,1),(279,'2013-10-06','Sun',' ',0,1),(280,'2013-10-07','Mon',' ',0,1),(281,'2013-10-08','Tue',' ',0,1),(282,'2013-10-09','Wed',' ',0,1),(283,'2013-10-10','Thu','',0,1),(284,'2013-10-11','Fri','Weekend',1,1),(285,'2013-10-12','Sat',' ',0,1),(286,'2013-10-13','Sun',' ',0,1),(287,'2013-10-14','Mon',' ',0,1),(288,'2013-10-15','Tue',' ',0,1),(289,'2013-10-16','Wed',' ',0,1),(290,'2013-10-17','Thu',' ',0,1),(291,'2013-10-18','Fri','Weekend',1,1),(292,'2013-10-19','Sat',' ',0,1),(293,'2013-10-20','Sun',' ',0,1),(294,'2013-10-21','Mon',' ',0,1),(295,'2013-10-22','Tue',' ',0,1),(296,'2013-10-23','Wed',' ',0,1),(297,'2013-10-24','Thu',' ',0,1),(298,'2013-10-25','Fri','Weekend',1,1),(299,'2013-10-26','Sat',' ',0,1),(300,'2013-10-27','Sun',' ',0,1),(301,'2013-10-28','Mon',' ',0,1),(302,'2013-10-29','Tue',' ',0,1),(303,'2013-10-30','Wed',' ',0,1),(304,'2013-10-31','Thu',' ',0,1),(305,'2013-11-01','Fri','Weekend',1,1),(306,'2013-11-02','Sat',' ',0,1),(307,'2013-11-03','Sun',' ',0,1),(308,'2013-11-04','Mon',' ',0,1),(309,'2013-11-05','Tue',' ',0,1),(310,'2013-11-06','Wed',' ',0,1),(311,'2013-11-07','Thu',' ',0,1),(312,'2013-11-08','Fri','Weekend',1,1),(313,'2013-11-09','Sat',' ',0,1),(314,'2013-11-10','Sun',' ',0,1),(315,'2013-11-11','Mon',' ',0,1),(316,'2013-11-12','Tue',' ',0,1),(317,'2013-11-13','Wed',' ',0,1),(318,'2013-11-14','Thu',' ',0,1),(319,'2013-11-15','Fri','Weekend',1,1),(320,'2013-11-16','Sat',' ',0,1),(321,'2013-11-17','Sun',' ',0,1),(322,'2013-11-18','Mon',' ',0,1),(323,'2013-11-19','Tue',' ',0,1),(324,'2013-11-20','Wed',' ',0,1),(325,'2013-11-21','Thu',' ',0,1),(326,'2013-11-22','Fri','Weekend',1,1),(327,'2013-11-23','Sat',' ',0,1),(328,'2013-11-24','Sun',' ',0,1),(329,'2013-11-25','Mon',' ',0,1),(330,'2013-11-26','Tue',' ',0,1),(331,'2013-11-27','Wed',' ',0,1),(332,'2013-11-28','Thu',' ',0,1),(333,'2013-11-29','Fri','Weekend',1,1),(334,'2013-11-30','Sat',' ',0,1),(335,'2013-12-01','Sun',' ',0,1),(336,'2013-12-02','Mon',' ',0,1),(337,'2013-12-03','Tue',' ',0,1),(338,'2013-12-04','Wed',' ',0,1),(339,'2013-12-05','Thu',' ',0,1),(340,'2013-12-06','Fri','Weekend',1,1),(341,'2013-12-07','Sat',' ',0,1),(342,'2013-12-08','Sun',' ',0,1),(343,'2013-12-09','Mon',' ',0,1),(344,'2013-12-10','Tue',' ',0,1),(345,'2013-12-11','Wed',' ',0,1),(346,'2013-12-12','Thu',' ',0,1),(347,'2013-12-13','Fri','Weekend',1,1),(348,'2013-12-14','Sat',' ',0,1),(349,'2013-12-15','Sun',' ',0,1),(350,'2013-12-16','Mon','Victory Day',1,1),(351,'2013-12-17','Tue',' ',0,1),(352,'2013-12-18','Wed',' ',0,1),(353,'2013-12-19','Thu',' ',0,1),(354,'2013-12-20','Fri','Weekend',1,1),(355,'2013-12-21','Sat',' ',0,1),(356,'2013-12-22','Sun',' ',0,1),(357,'2013-12-23','Mon',' ',0,1),(358,'2013-12-24','Tue',' ',0,1),(359,'2013-12-25','Wed',' ',0,1),(360,'2013-12-26','Thu',' ',0,1),(361,'2013-12-27','Fri','Weekend',1,1),(362,'2013-12-28','Sat',' ',0,1),(363,'2013-12-29','Sun',' ',0,1),(364,'2013-12-30','Mon',' ',0,1),(365,'2013-12-31','Tue',' ',0,1);

/*Table structure for table `tbl_class_exam_mark_distribution` */

DROP TABLE IF EXISTS `tbl_class_exam_mark_distribution`;

CREATE TABLE `tbl_class_exam_mark_distribution` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `OB_total` decimal(10,2) DEFAULT NULL,
  `SB_total` decimal(10,2) DEFAULT NULL,
  `CT_total` decimal(10,2) DEFAULT NULL,
  `PT_total` decimal(10,2) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_class_exam_mark_distribution` */

/*Table structure for table `tbl_class_fee_info` */

DROP TABLE IF EXISTS `tbl_class_fee_info`;

CREATE TABLE `tbl_class_fee_info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `class_id` int(20) NOT NULL,
  `fee_head_id` int(10) NOT NULL,
  `amount` int(20) DEFAULT NULL,
  `branch_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tbl_class_fee_info` */

insert  into `tbl_class_fee_info`(`id`,`class_id`,`fee_head_id`,`amount`,`branch_id`) values (1,1,1,5000,1),(2,2,1,0,1),(3,1,2,2000,1),(4,2,2,0,1);

/*Table structure for table `tbl_class_feehead` */

DROP TABLE IF EXISTS `tbl_class_feehead`;

CREATE TABLE `tbl_class_feehead` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `fee_head` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `category` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `branch_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tbl_class_feehead` */

insert  into `tbl_class_feehead`(`id`,`fee_head`,`category`,`branch_id`) values (1,'Yearly Fee','Fixed',1),(2,'Student wellfare','Fixed',1);

/*Table structure for table `tbl_emp_salary_sturcture` */

DROP TABLE IF EXISTS `tbl_emp_salary_sturcture`;

CREATE TABLE `tbl_emp_salary_sturcture` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_emp_salary_sturcture` */

insert  into `tbl_emp_salary_sturcture`(`empid`,`name`,`category`,`basic`,`medical`,`house_rent`,`others`,`branchid`,`update_date`,`join_date`,`address`,`mobileno`) values (1,'Kuddus','Office Stuff',12500.00,500.00,5000.00,1000.00,1,'2013-07-02','2013-07-02','Mirpur','01716614072');

/*Table structure for table `tbl_employees` */

DROP TABLE IF EXISTS `tbl_employees`;

CREATE TABLE `tbl_employees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_employees` */

/*Table structure for table `tbl_grade_setting` */

DROP TABLE IF EXISTS `tbl_grade_setting`;

CREATE TABLE `tbl_grade_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(5) DEFAULT NULL,
  `mark_start` int(10) DEFAULT NULL,
  `mark_end` int(10) DEFAULT NULL,
  `point` decimal(10,2) DEFAULT NULL,
  `branchid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_grade_setting` */

insert  into `tbl_grade_setting`(`id`,`grade`,`mark_start`,`mark_end`,`point`,`branchid`) values (1,'A+',80,100,5.00,1),(2,'A',75,79,4.50,1),(3,'A-',70,74,4.00,1),(4,'B+',65,69,3.50,1),(5,'B',60,64,3.25,1),(6,'B-',55,59,3.00,1),(7,'C+',50,54,2.50,1),(8,'C',45,49,2.25,1),(9,'C-',40,44,2.00,1),(10,'D',35,39,1.00,1),(11,'F',0,34,0.00,1);

/*Table structure for table `tbl_menu_group` */

DROP TABLE IF EXISTS `tbl_menu_group`;

CREATE TABLE `tbl_menu_group` (
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
  `school_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_group` */

insert  into `tbl_menu_group`(`id`,`user_type`,`user_name`,`user_pass`,`main_menu_id`,`sub_menu1`,`sub_menu2`,`branch_id`,`class_id`,`subject_id`,`others`,`regdate`,`reg_expire_date`,`access_permission`,`module_permission`,`school_id`) values (1,'user','school','school321','1,2,3,4,5,6,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,37,38,39,40,41,44,45,46','1,2,3,4,5,7,8,9,10,11,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,28,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105','4,5,6,8,9,10,13,14,15,16,17,19,22,23,24,25,26,27,28,30,31,32,33,34,35,36,37,38,39,40,41,43,44,45,46,47,48','1,2,3,4,5','1,2,3,11','1,2,3,4,5,6,7',NULL,'2012-08-14','2014-12-05','on','1,2,3,4,5,6,8',1),(2,'siteadmin','admin','123456','1,2,3,4,5,6,7','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18','4,5,6,8,9,10,13,14,15,16,17,19,22,23,24,25,26,27,28,30,31','1,2,3,4,5','1,2,3,11','1,2,3,4,5,6,7',NULL,'2012-08-14','2014-11-19','on','1,2,3,4,6',1),(3,'user','alamin','alamin','1,2,3,4,5,6,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,37,38,39,40,41,44,45','1,2,3,4,5,7,8,9,10,11,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,28,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100','4,5,6,8,9,10,13,14,15,16,17,19,22,23,24,25,26,27,28,30,31,32,33,34,35,36,37,38,39,40,41,43,44,45,46,47,48','1,2,3,4,5',NULL,NULL,NULL,'2012-08-14','2014-12-05','on','1,2,3,4,5,6,8',1),(4,'user','afza','afza',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-14','2013-05-24','on','1,2,3,4,5,6,8',1),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-14','2013-05-24',NULL,NULL,0);

/*Table structure for table `tbl_modules` */

DROP TABLE IF EXISTS `tbl_modules`;

CREATE TABLE `tbl_modules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(100) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `order_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_modules` */

insert  into `tbl_modules`(`id`,`folder_name`,`module_name`,`order_id`) values (1,'student','student',1),(2,'teacher','teacher',2),(3,'accounts','accounts',3),(4,'exam','exam',4),(5,'admin','admin',8),(6,'transport','transport',5),(7,'library','library',6);

/*Table structure for table `tbl_notices` */

DROP TABLE IF EXISTS `tbl_notices`;

CREATE TABLE `tbl_notices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_notices` */

/*Table structure for table `tbl_scholarship_info` */

DROP TABLE IF EXISTS `tbl_scholarship_info`;

CREATE TABLE `tbl_scholarship_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `scholarship_name` varchar(100) DEFAULT NULL,
  `sponsored_by` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_scholarship_info` */

/*Table structure for table `tbl_school_info` */

DROP TABLE IF EXISTS `tbl_school_info`;

CREATE TABLE `tbl_school_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `website` varchar(80) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_school_info` */

insert  into `tbl_school_info`(`id`,`name`,`address`,`phone`,`website`,`status`,`reg_date`) values (1,'Bir Shrestha Noo Mohammad','Pilkhana,Dhaka','454545545','www.bsnm.com',1,'2013-06-03');

/*Table structure for table `tbl_std_pictures` */

DROP TABLE IF EXISTS `tbl_std_pictures`;

CREATE TABLE `tbl_std_pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stid` varchar(50) DEFAULT NULL,
  `pic_name` varchar(120) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_std_pictures` */

/*Table structure for table `tbl_teacher_attendance_info` */

DROP TABLE IF EXISTS `tbl_teacher_attendance_info`;

CREATE TABLE `tbl_teacher_attendance_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) DEFAULT NULL,
  `month` date DEFAULT NULL,
  `total_open` int(10) DEFAULT NULL,
  `total_attend` int(10) DEFAULT NULL,
  `total_absent` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_teacher_attendance_info` */

/*Table structure for table `web_menu` */

DROP TABLE IF EXISTS `web_menu`;

CREATE TABLE `web_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(80) NOT NULL,
  `menu_content` varchar(80) NOT NULL,
  `sub_menu` varchar(10) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `web_menu` */

insert  into `web_menu`(`menu_id`,`menu_name`,`menu_content`,`sub_menu`,`order_id`,`user_type`) values (1,'Home','index','yes',1,'globle'),(2,'About Us','about','yes',2,'globle'),(3,'Curriculum','curriculum','yes',3,'globle'),(4,'Order Forms','extra','',4,'globle'),(5,'Facilities','facilities','',5,'globle'),(12,'Admission','admission','yes',6,'globle'),(13,'Gallery','gallery',NULL,7,'globle'),(14,'News','news',NULL,8,'globle'),(15,'Careers','careers',NULL,9,'globle'),(16,'Contact Us','visit',NULL,10,'globle'),(17,'Profile','profile',NULL,11,'user'),(18,'Result Info','result_info',NULL,12,'user'),(19,'Notice','notice',NULL,13,'user'),(20,'Remarks','remarks',NULL,14,'user'),(21,'Achievement ','achievement ',NULL,15,'user'),(22,'History','history',NULL,16,'user'),(23,'Payment Info','payment_info',NULL,17,'user'),(24,'Due Amount','due_amount',NULL,18,'user');

/*Table structure for table `web_std_pictures` */

DROP TABLE IF EXISTS `web_std_pictures`;

CREATE TABLE `web_std_pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stid` varchar(30) DEFAULT NULL,
  `pic_name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `web_std_pictures` */

/*Table structure for table `web_std_profile` */

DROP TABLE IF EXISTS `web_std_profile`;

CREATE TABLE `web_std_profile` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `web_std_profile` */

insert  into `web_std_profile`(`id`,`stu_id`,`password`,`name`,`father_name`,`mother_name`,`pre_address`,`par_address`,`home_phone`,`emer_name1`,`emer_mobile1`,`emer_name2`,`emer_mobile2`,`mail_add`,`sex`,`religion`,`nationality`,`age`,`adm_date`,`dob`,`adm_class`,`adm_class_roll`,`adm_group`,`section`,`father_income`,`mother_income`,`father_profession`,`mother_profession`,`father_qualification`,`mother_qualification`,`father_work_phone`,`mother_work_phone`,`admission_fee`,`priv_schoole_name`,`priv_school_add`,`priv_school_class`,`priv_school_class_roll`,`priv_school_remarks`,`priv_school_result`,`present_class`,`present_class_roll`,`st_status`,`branch_id`) values (1,'2013111','2013111A1','lipon','abul','jarina',NULL,'','01685965321','','','','','','Male',NULL,NULL,'1','2013-07-01','2006-10-10','Class-1',NULL,'','A','20000','10000','business','housewife',NULL,NULL,'01685965321','01685965321',NULL,'abc','dhaka','1','1',NULL,'1',NULL,NULL,NULL,1);

/*Table structure for table `web_sub_menu1` */

DROP TABLE IF EXISTS `web_sub_menu1`;

CREATE TABLE `web_sub_menu1` (
  `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_menu_name` varchar(80) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  `sub_menu_content` varchar(80) NOT NULL,
  `sub1_sub_menu` varchar(10) NOT NULL,
  `_show` int(1) NOT NULL,
  PRIMARY KEY (`sub_menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `web_sub_menu1` */

insert  into `web_sub_menu1`(`sub_menu_id`,`sub_menu_name`,`main_menu_id`,`sub_menu_content`,`sub1_sub_menu`,`_show`) values (1,'Principal\'s Message',2,'principal_message','yes',1),(2,'Mission and Vision',2,'mission_vision','yes',1),(13,'Why US',2,'why_us','',1),(14,'School Policies',2,'school_policies','',1),(16,'Our Team',2,'our_team','',1),(17,'Head of Junior School',2,'head_junior_school','',1),(22,'Head of Middle School',2,'head_middle_school','',1),(23,'Head of Senior School',2,'head_senior_school','',1),(24,'Head of Arabic Department',2,'head_arabic_department','',1),(25,'AIS Mothers\' Group',2,'ais_mothers_group','',0),(26,'Early Learning Center (ELC)',3,'early_learning_center','',1),(27,'Junior School Curriculum',3,'junior_school_curriculum','',1),(28,'Middle School Curriculum',3,'middle_school_curriculum','',1),(29,'Senior School Curriculum',3,'senior_school_curriculum','',1),(30,'SHIP Program',3,'ship_program','',1),(31,'Performing Arts',3,'performing_arts','',1),(32,'French at AIS',3,'french_ais','',0),(33,'Camps and Excursions',3,'camps_excursions','',1),(34,'ESL Support Program at AIS',3,'esl_support_program','',0),(35,'Canteen',4,'canteen','',1),(36,'Stationery List',4,'stationery_list','',1),(37,'Uniform Order Forms',4,'uniform_order_forms','',1),(38,'Outdoor Areas',5,'outdoor_areas','',1),(39,'Computer Lab',5,'computer_lab','',1),(40,'Science Labs',5,'science_labs','',1),(41,'Music Room',5,'music_room','',1),(42,'Conference Room',5,'conference_room','',1),(43,'Swimming Pool',5,'swimming_pool','',1),(44,'Gymnasium',5,'gymnasium','',1),(45,'Library',5,'library','',1),(46,'Medical Clinic',5,'medical_clinic','',1),(47,'Transportation',5,'transportation','',1),(48,'Enrollment procedures and process',12,'enrollment_procedures_process','',1),(49,'Download forms',12,'download_forms','',1),(50,'Photos Album',13,'gallery','',1),(51,'Video Album',13,'gallery','',1),(52,'Photo Archive',13,'gallery','',1),(53,'Events Calender- 2012- 2013',14,'events_calende','',1),(54,'NEWSLETTER PRAISE',14,'newsletter_praise','',1),(55,'Celebrates National Day',14,'celebrates_national_day','',1),(56,'welcomes the new staff',14,'welcomes_new_staff','',1),(57,'Indoor Soccer Academy',14,'indoor_soccer_academy','',1),(58,'FLASH MOB',14,'flash_mob','',1),(59,'Code of conduct',15,'careers','',1),(60,'Apply Online',15,'apply_online','',1),(61,'Current Opening',15,'current_opening','',1),(62,' Contact Us',16,'visit','',1),(63,'Location map',16,'location_map','',1);

/*Table structure for table `web_sub_menu2` */

DROP TABLE IF EXISTS `web_sub_menu2`;

CREATE TABLE `web_sub_menu2` (
  `sub_menu2_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name2` varchar(80) DEFAULT NULL,
  `sub_menu1_id` int(11) NOT NULL,
  `menu_content` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`sub_menu2_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `web_sub_menu2` */

/*Table structure for table `web_user_info` */

DROP TABLE IF EXISTS `web_user_info`;

CREATE TABLE `web_user_info` (
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `web_user_info` */

insert  into `web_user_info`(`user_id`,`user_name`,`full_name`,`password`,`user_type`,`created_by`,`user_create_time`,`main_menu`,`sub_menu1`,`sub_menu2`) values (1,'Admin','','admin@bn','super','admin','00:00:02','1,2,3,4,5,6','1,2,3,4,5,6,7,8,9,10',''),(2,'robi','','abc','client','admin',NULL,'1,4,5,6','3,6,7,8,9',NULL),(10,'kjk','ui','jk','Admin','Admin','09:29:48','1,6','1,2,3,4,5,6,7,8,9,10',NULL),(11,'nmnm','mnm','m','Normal user','Admin','20110911095827','1,2,3',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
