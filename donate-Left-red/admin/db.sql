/*
SQLyog Enterprise - MySQL GUI v6.13
MySQL - 5.0.27-community-nt : Database - system_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `system_db`;

USE `system_db`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`user`,`pass`) values ('alive','xxyyzz');

/*Table structure for table `alocation_id_to_pos` */

DROP TABLE IF EXISTS `alocation_id_to_pos`;

CREATE TABLE `alocation_id_to_pos` (
  `id` int(10) NOT NULL auto_increment,
  `pos_id` int(10) default NULL,
  `member_login_id` varchar(20) default NULL,
  `member_mobile_no` varchar(20) default NULL,
  `alo_login_id_set` varchar(100) default NULL,
  `alo_date` varchar(30) default NULL,
  `alo_for` varchar(30) default NULL,
  `status` varchar(30) default 'panding',
  `deposit_id` int(10) default NULL,
  `collection_id` int(10) default NULL,
  `pos_type` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `alocation_id_to_pos` */

insert  into `alocation_id_to_pos`(`id`,`pos_id`,`member_login_id`,`member_mobile_no`,`alo_login_id_set`,`alo_date`,`alo_for`,`status`,`deposit_id`,`collection_id`,`pos_type`) values (1,1,'081118361','8801841787822','081131523,081159395,151813597,','20120206053036','Member','panding',1,1,NULL);

/*Table structure for table `bank_info` */

DROP TABLE IF EXISTS `bank_info`;

CREATE TABLE `bank_info` (
  `id` int(10) NOT NULL auto_increment,
  `bank_name` varchar(30) default NULL,
  `account_number` varchar(30) default NULL,
  `account_name` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bank_info` */

insert  into `bank_info`(`id`,`bank_name`,`account_number`,`account_name`) values (1,'DBBL','12312356465','suman'),(2,'SCB','18374252001','suman'),(3,'Bankasia','32132132123','arif');

/*Table structure for table `collection_agent` */

DROP TABLE IF EXISTS `collection_agent`;

CREATE TABLE `collection_agent` (
  `id` int(10) NOT NULL auto_increment,
  `agent` varchar(100) default NULL,
  `address` varchar(160) default NULL,
  `mobileno` varchar(50) default NULL,
  `status` varchar(50) default NULL,
  `type` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `collection_agent` */

insert  into `collection_agent`(`id`,`agent`,`address`,`mobileno`,`status`,`type`) values (1,'bcash',NULL,NULL,NULL,NULL),(2,'post office',NULL,NULL,NULL,NULL);

/*Table structure for table `company_account` */

DROP TABLE IF EXISTS `company_account`;

CREATE TABLE `company_account` (
  `id` int(10) NOT NULL auto_increment,
  `sender_id` varchar(20) default NULL,
  `receive_amount` varchar(30) default '0',
  `withdraw_amount` varchar(30) default '0',
  `current_balance` varchar(30) default '0',
  `transection_date` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `company_account` */

/*Table structure for table `donate_pos` */

DROP TABLE IF EXISTS `donate_pos`;

CREATE TABLE `donate_pos` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `mobile_no` varchar(20) default NULL,
  `address` varchar(160) default NULL,
  `security_money` varchar(30) default NULL,
  `status` varchar(20) default 'Deactive',
  `type` varchar(20) default NULL,
  `creation_time` varchar(50) default NULL,
  `service_charge` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `donate_pos` */

insert  into `donate_pos`(`id`,`name`,`mobile_no`,`address`,`security_money`,`status`,`type`,`creation_time`,`service_charge`) values (1,'Suman','01753859595',NULL,'20000','Active','Admin',NULL,'0'),(2,'Arif','01841787822',NULL,'20000','Active','Pos',NULL,'0'),(3,'Rukon','01817756450',NULL,'20000','Active','pos',NULL,'0');

/*Table structure for table `donate_pos_acc` */

DROP TABLE IF EXISTS `donate_pos_acc`;

CREATE TABLE `donate_pos_acc` (
  `id` int(10) NOT NULL auto_increment,
  `pos_id` int(10) default NULL,
  `mobile_no` varchar(20) default NULL,
  `deposit` varchar(20) default NULL,
  `no_of_id` int(10) default NULL,
  `deposit_adjust` varchar(20) default NULL,
  `bank_name` varchar(30) default NULL,
  `account_number` varchar(50) default NULL,
  `deposit_date` varchar(30) default NULL,
  `admin_confirm_date` varchar(30) default NULL,
  `deposit_type` varchar(30) default NULL,
  `status` varchar(20) default 'Panding',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `donate_pos_acc` */

insert  into `donate_pos_acc`(`id`,`pos_id`,`mobile_no`,`deposit`,`no_of_id`,`deposit_adjust`,`bank_name`,`account_number`,`deposit_date`,`admin_confirm_date`,`deposit_type`,`status`) values (1,1,NULL,'',NULL,NULL,'1','','20120204081158',NULL,'collection','Panding'),(2,1,NULL,'',NULL,NULL,'1','233132123123','20120204083307',NULL,'pinrequest','Panding');

/*Table structure for table `donate_pos_deposit` */

DROP TABLE IF EXISTS `donate_pos_deposit`;

CREATE TABLE `donate_pos_deposit` (
  `id` int(10) NOT NULL auto_increment,
  `pos_id` int(10) default NULL,
  `mobile_no` varchar(20) default NULL,
  `deposit` varchar(20) default NULL,
  `no_of_id` int(10) default NULL,
  `deposit_adjust` varchar(20) default NULL,
  `bank_name` varchar(30) default NULL,
  `account_number` varchar(50) default NULL,
  `deposit_date` varchar(30) default NULL,
  `admin_confirm_date` varchar(30) default NULL,
  `deposit_type` varchar(30) default NULL,
  `status` varchar(20) default 'Panding',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `donate_pos_deposit` */

insert  into `donate_pos_deposit`(`id`,`pos_id`,`mobile_no`,`deposit`,`no_of_id`,`deposit_adjust`,`bank_name`,`account_number`,`deposit_date`,`admin_confirm_date`,`deposit_type`,`status`) values (1,1,NULL,'',NULL,NULL,'1','','20120325065344',NULL,'collection','Panding');

/*Table structure for table `form_type` */

DROP TABLE IF EXISTS `form_type`;

CREATE TABLE `form_type` (
  `id` int(10) NOT NULL auto_increment,
  `form_type` char(5) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `form_type` */

insert  into `form_type`(`id`,`form_type`) values (1,'A'),(2,'B'),(3,'C');

/*Table structure for table `level_amount` */

DROP TABLE IF EXISTS `level_amount`;

CREATE TABLE `level_amount` (
  `id` int(10) NOT NULL auto_increment,
  `level` int(10) default NULL,
  `amount` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `level_amount` */

insert  into `level_amount`(`id`,`level`,`amount`) values (1,1,100),(2,2,200),(3,3,300),(4,4,400),(5,5,500),(6,6,600),(7,7,700),(8,8,800),(9,9,900);

/*Table structure for table `login_info` */

DROP TABLE IF EXISTS `login_info`;

CREATE TABLE `login_info` (
  `m_id` varchar(15) NOT NULL,
  `m_pass` varchar(15) NOT NULL,
  `m_join` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `app_no` varchar(15) NOT NULL,
  PRIMARY KEY  (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `login_info` */

insert  into `login_info`(`m_id`,`m_pass`,`m_join`,`status`,`app_no`) values ('081131432','goyhas','0000-00-00','A','71131432'),('081118361','goyhas','0000-00-00','A','101118361'),('081131523','goyhas','0000-00-00','A','21131523'),('081131594','goyhas','0000-00-00','A','61131594'),('081159395','123456','0000-00-00','A','61159395'),('151813597','123456','2009-10-15','A','91813597'),('151829258','123456','2009-10-15','A','71829258'),('151841169','123456','2009-10-15','A','21841169'),('1518581710','123456','2009-10-15','A','318581710'),('2219120511','123456','2009-10-22','A','119120511'),('2219222312','123456','2009-10-22','A','419222312'),('2512114213','123456','2009-10-25','A','212114213'),('2512380914','123456','2009-10-25','A','412380914'),('2512451515','123456','2009-10-25','A','412451515'),('2512511216','123456','2009-10-25','A','512511216'),('2513032717','123456','2009-10-25','A','1013032717'),('2513283618','123456','2009-10-25','A','913283618'),('2513513619','123456','2009-10-25','A','613513619'),('2514060020','123456','2009-10-25','A','214060020'),('3112374821','123456','2009-10-31','A','612374821'),('3112563522','123456','2009-10-31','NA','912563522');

/*Table structure for table `main_menu` */

DROP TABLE IF EXISTS `main_menu`;

CREATE TABLE `main_menu` (
  `id` int(10) NOT NULL auto_increment,
  `main_name` varchar(100) default NULL,
  `file_name` varchar(100) default NULL,
  `user_acl` varchar(100) default NULL,
  `remarks` varchar(200) default NULL,
  `ordering` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `main_menu` */

insert  into `main_menu`(`id`,`main_name`,`file_name`,`user_acl`,`remarks`,`ordering`) values (2,'Account',NULL,NULL,NULL,2),(3,'Pos Posting',NULL,NULL,NULL,3),(9,'Logout','log_out',NULL,NULL,7),(10,'Admin',NULL,NULL,NULL,4);

/*Table structure for table `main_menu_bak` */

DROP TABLE IF EXISTS `main_menu_bak`;

CREATE TABLE `main_menu_bak` (
  `menu_id` int(10) unsigned NOT NULL auto_increment,
  `menu_name` varchar(80) NOT NULL,
  `menu_content` varchar(80) NOT NULL,
  `sub_menu` varchar(180) default NULL,
  PRIMARY KEY  (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `main_menu_bak` */

insert  into `main_menu_bak`(`menu_id`,`menu_name`,`menu_content`,`sub_menu`) values (1,'Home','','yes'),(2,'My tree','code.txt','yes'),(3,'My account','account_info',NULL),(6,'Log Out','',NULL);

/*Table structure for table `member_under_pos` */

DROP TABLE IF EXISTS `member_under_pos`;

CREATE TABLE `member_under_pos` (
  `id` int(10) NOT NULL auto_increment,
  `pos_id` int(10) default NULL,
  `last_request_time` varchar(50) default NULL,
  `next_pos_id` int(10) default NULL,
  `member_id` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `member_under_pos` */

insert  into `member_under_pos`(`id`,`pos_id`,`last_request_time`,`next_pos_id`,`member_id`) values (8,0,NULL,1,'0000000000'),(10,1,'20120206045910',2,'081131432'),(11,2,'20120206050057',3,'081131432'),(12,3,'20120206050131',1,'081131432'),(13,1,'20120206050211',2,'081131432'),(14,2,'20120206050411',3,'081131432'),(15,3,'20120206050438',1,'081131432'),(16,1,'20120206051456',2,'081131432'),(17,2,'20120206051716',3,'081131594'),(18,3,'20120214071259',1,'081131594'),(19,1,'20120214073528',2,'081131523'),(20,2,'20120214080412',3,'081159395'),(21,3,'20120214080454',1,'151813597'),(22,1,'20120214085852',2,'2219222312'),(23,2,'20120223080557',3,'2512114213'),(24,3,'20120223111222',1,'1518581710'),(25,1,'20120223112730',2,'151841169'),(26,2,'20120301115705',3,'2512380914'),(27,3,'20120301115934',1,'2513032717'),(28,1,'20120301121100',2,'2512451515'),(29,2,'20120301121338',3,'2513283618'),(30,3,'20120301121821',1,'2513513619'),(31,1,'20120305100506',2,'081131432'),(32,2,'20120305101119',3,'081159395'),(33,3,'20120305101443',1,'151841169'),(34,1,'20120305101648',2,'2219222312'),(35,2,'20120305113023',3,'2512511216'),(36,3,'20120305114009',1,'2513283618'),(37,1,'20120306095023',2,'081131432'),(38,2,'20120306095440',3,'081131594'),(39,3,'20120306095613',1,'081131523'),(40,1,'20120329100826',2,'2219222312'),(41,2,'20120329101409',3,'2512114213'),(42,3,'20120329102955',1,'2512380914');

/*Table structure for table `order_list` */

DROP TABLE IF EXISTS `order_list`;

CREATE TABLE `order_list` (
  `id` int(10) NOT NULL auto_increment,
  `login_id` varchar(20) default NULL,
  `product` varchar(20) default 'Net id',
  `product_qunt` int(10) default NULL,
  `amount` varchar(20) default NULL,
  `order_date` varchar(20) default NULL,
  `payment_mode` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_list` */

insert  into `order_list`(`id`,`login_id`,`product`,`product_qunt`,`amount`,`order_date`,`payment_mode`) values (1,'1518581710','Net id',3,'2000',NULL,'1');

/*Table structure for table `payment_request` */

DROP TABLE IF EXISTS `payment_request`;

CREATE TABLE `payment_request` (
  `id` int(10) NOT NULL auto_increment,
  `login_id` varchar(20) default NULL,
  `mobile_no` varchar(20) default NULL,
  `amount` varchar(20) default NULL,
  `product_name` varchar(50) default 'net id',
  `product_quentity` varchar(10) default NULL,
  `payment_agent` varchar(100) default NULL,
  `payment_date` varchar(100) default NULL,
  `payment_receive_pin` varchar(50) default NULL,
  `status` varchar(20) default 'New',
  `creation_time` varchar(30) default NULL,
  `pos_id` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment_request` */

insert  into `payment_request`(`id`,`login_id`,`mobile_no`,`amount`,`product_name`,`product_quentity`,`payment_agent`,`payment_date`,`payment_receive_pin`,`status`,`creation_time`,`pos_id`) values (17,'081131594','8801841787822','2000','net id','','bcash','20120214071510','123456789','paid','14/02/2012 07:15:10',3),(18,'081131594','8801841787822','2000','net id','','bcash','20120214071836','1234569','paid','14/02/2012 07:18:36',3),(19,'081131594','8801841787822','2000','net id','','bcash','20120214091341','123456789554','paid','14/02/2012 09:13:41',3);

/*Table structure for table `pin_no` */

DROP TABLE IF EXISTS `pin_no`;

CREATE TABLE `pin_no` (
  `sno` int(15) NOT NULL auto_increment,
  `pin_no` varchar(15) NOT NULL,
  `login_id` varchar(15) NOT NULL,
  `active_date` date NOT NULL,
  `status` varchar(20) default 'Available',
  `woner_id` varchar(20) default NULL,
  `creation_date` varchar(30) default NULL,
  PRIMARY KEY  (`sno`),
  UNIQUE KEY `sno` (`sno`),
  UNIQUE KEY `pin_no` (`pin_no`)
) ENGINE=MyISAM AUTO_INCREMENT=100024 DEFAULT CHARSET=latin1;

/*Data for the table `pin_no` */

insert  into `pin_no`(`sno`,`pin_no`,`login_id`,`active_date`,`status`,`woner_id`,`creation_date`) values (10001,'919191','081118361','2009-10-08','Used',NULL,NULL),(10002,'909002','081131432','2009-10-08','Used',NULL,NULL),(10004,'909126','081131594','2009-10-08','Used',NULL,NULL),(10003,'929123','081131523','2009-10-08','Used',NULL,NULL),(10005,'909026','081159395','2009-10-08','Available',NULL,NULL),(10006,'909165','151813597','2009-10-15','Available',NULL,NULL),(10007,'912964','151829258','2009-10-15','Used',NULL,NULL),(10008,'923568','151841169','2009-10-15','Available',NULL,NULL),(10009,'123456789','1518581710','2009-10-15','Available',NULL,NULL),(10010,'326547','2219120511','2009-10-22','Available',NULL,NULL),(10011,'327845','2219222312','2009-10-22','Used',NULL,NULL),(10012,'327789','2512114213','2009-10-25','Used',NULL,NULL),(10013,'327956','2512380914','2009-10-25','Used',NULL,NULL),(10014,'326999','2512451515','2009-10-25','Available',NULL,NULL),(10015,'326789','2512511216','2009-10-25','Available',NULL,NULL),(10016,'326777','2513032717','2009-10-25','Available',NULL,NULL),(10017,'326329','2513283618','2009-10-25','Available',NULL,NULL),(10018,'326824','2513513619','2009-10-25','Available',NULL,NULL),(10019,'326025','2514060020','2009-10-25','Available',NULL,NULL),(100021,'4568945','3112374821','2009-10-31','Available',NULL,NULL);

/*Table structure for table `pos_collection_amount` */

DROP TABLE IF EXISTS `pos_collection_amount`;

CREATE TABLE `pos_collection_amount` (
  `id` int(10) NOT NULL auto_increment,
  `pos_id` int(10) default NULL,
  `collection_amount` varchar(20) default NULL,
  `login_id` varchar(20) default NULL,
  `date_time` varchar(30) default NULL,
  `status` varchar(30) default 'Panding',
  `collection_agent` varchar(20) default NULL,
  `member_mobileno` varchar(20) default NULL,
  `agent_pin` varchar(20) default NULL,
  `payment_req_date` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pos_collection_amount` */

insert  into `pos_collection_amount`(`id`,`pos_id`,`collection_amount`,`login_id`,`date_time`,`status`,`collection_agent`,`member_mobileno`,`agent_pin`,`payment_req_date`) values (1,1,'1983','081118361','20120206052921','Panding','bcash','8801841787822','123456789','20120206052659'),(2,3,'1983','081131594','20120214071556','Panding','bcash','8801841787822','123456789','20120214071510'),(3,3,'2000','081131594','20120214071852','Panding','bcash','8801841787822','1234569','20120214071836'),(4,3,'2000','081131594','20120214091517','Panding','bcash','8801841787822','123456789554','20120214091341');

/*Table structure for table `product_list` */

DROP TABLE IF EXISTS `product_list`;

CREATE TABLE `product_list` (
  `id` int(10) NOT NULL auto_increment,
  `product_name` varchar(20) default NULL,
  `product_price` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_list` */

insert  into `product_list`(`id`,`product_name`,`product_price`) values (1,'ID','2000');

/*Table structure for table `sub_menu1` */

DROP TABLE IF EXISTS `sub_menu1`;

CREATE TABLE `sub_menu1` (
  `sub_menu_id` int(11) NOT NULL auto_increment,
  `sub_menu_name` varchar(80) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  `sub_menu_content` varchar(80) NOT NULL,
  `sub1_sub_menu` varchar(250) NOT NULL,
  PRIMARY KEY  (`sub_menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=260 DEFAULT CHARSET=latin1;

/*Data for the table `sub_menu1` */

insert  into `sub_menu1`(`sub_menu_id`,`sub_menu_name`,`main_menu_id`,`sub_menu_content`,`sub1_sub_menu`) values (247,'Tree',2,'code.txt',''),(249,'Payment Request',3,'payment_request',''),(250,'Payment Check',3,'payment_check',''),(251,'Withdraw Request',10,'withdraw_request',''),(252,'Withdarw Check',10,'withdraw_check',''),(253,'My Account',2,'member_account',''),(254,'Deposit Request',3,'payment_deposit',''),(255,'Alocation Pin',3,'pos_pin_alocation',''),(256,'Deposit Check',10,'deposit_check',''),(257,'Pos Collection',10,'pos_payment_collection',''),(258,'Registration',3,'reg_form',''),(259,'sumitra',3,'body_2','');

/*Table structure for table `sub_menu2` */

DROP TABLE IF EXISTS `sub_menu2`;

CREATE TABLE `sub_menu2` (
  `sub_menu2_id` int(10) unsigned NOT NULL auto_increment,
  `menu_name2` varchar(80) default NULL,
  `sub_menu1_id` int(11) NOT NULL,
  `menu_content` varchar(80) default NULL,
  PRIMARY KEY  (`sub_menu2_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `sub_menu2` */

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `value` varchar(500) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `test` */

/*Table structure for table `tree_info` */

DROP TABLE IF EXISTS `tree_info`;

CREATE TABLE `tree_info` (
  `id` int(10) NOT NULL auto_increment,
  `tree_root_id` varchar(15) default NULL,
  `tree_woner` varchar(20) default NULL,
  `woner_login_id` varchar(10) default NULL,
  `woner_mobileno` varchar(20) default NULL,
  `commission` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tree_info` */

insert  into `tree_info`(`id`,`tree_root_id`,`tree_woner`,`woner_login_id`,`woner_mobileno`,`commission`) values (1,'000000','Arif','081118361','01841787822',50),(2,'111111','Suman','151829258','01753859595',50);

/*Table structure for table `user_account` */

DROP TABLE IF EXISTS `user_account`;

CREATE TABLE `user_account` (
  `id` int(10) NOT NULL auto_increment,
  `login_id` varchar(100) default NULL,
  `receive_amount` int(10) default '0',
  `sender_id` varchar(100) default NULL,
  `transection_date` varchar(50) default NULL,
  `withdraw_amount` varchar(50) default '0',
  `current_balance` varchar(20) default NULL,
  `status` varchar(20) default 'Panding',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_account` */

insert  into `user_account`(`id`,`login_id`,`receive_amount`,`sender_id`,`transection_date`,`withdraw_amount`,`current_balance`,`status`) values (1,'081118361',100,'081118361','20120311000000','0','100','Panding'),(2,'000000',200,'081118361','20120311000000','0','200','Panding'),(3,'081118361',100,'081118361','20120311000000','0','200','Panding'),(4,'000000',200,'081118361','20120311000000','0','400','Panding'),(5,'081118361',100,'081118361','20120311000000','0','300','Panding'),(6,'000000',200,'081118361','20120311000000','0','600','Panding'),(7,'081131432',100,'081131432','20120311000000','0','100','Panding'),(8,'081118361',200,'081131432','20120311000000','0','500','Panding'),(9,'000000',300,'081131432','20120311000000','0','900','Panding'),(10,'151829258',100,'151829258','20120311000000','0','100','Panding'),(11,'111111',200,'151829258','20120311000000','0','200','Panding'),(12,'081131432',100,'081131432','20120311000000','0','200','Panding'),(13,'081118361',200,'081131432','20120311000000','0','700','Panding'),(14,'000000',300,'081131432','20120311000000','0','1200','Panding'),(15,'081118361',100,'081118361','20120311000000','0','800','Panding'),(16,'000000',200,'081118361','20120311000000','0','1100','Panding'),(17,'081131432',100,'081131432','20120311000000','0','300','Panding'),(18,'081118361',200,'081131432','20120311000000','0','1000','Panding'),(19,'000000',300,'081131432','20120311000000','0','1200','Panding'),(20,'081131432',100,'081131432','20120311000000','0','400','Panding'),(21,'081118361',200,'081131432','20120311000000','0','1000','Panding'),(22,'000000',300,'081131432','20120311000000','0','1200','Panding');

/*Table structure for table `user_acl` */

DROP TABLE IF EXISTS `user_acl`;

CREATE TABLE `user_acl` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `user_name` varchar(80) default NULL,
  `full_name` varchar(80) NOT NULL,
  `password` varchar(80) default NULL,
  `user_type` varchar(40) default NULL,
  `created_by` varchar(80) NOT NULL,
  `user_create_time` varchar(80) default NULL,
  `main_menu` varchar(80) default NULL,
  `sub_menu1` varchar(80) default NULL,
  `sub_menu2` varchar(80) default NULL,
  `pos_id` int(10) default NULL,
  `member_id` int(10) default NULL,
  `founder_id` int(10) default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `user_acl` */

insert  into `user_acl`(`user_id`,`user_name`,`full_name`,`password`,`user_type`,`created_by`,`user_create_time`,`main_menu`,`sub_menu1`,`sub_menu2`,`pos_id`,`member_id`,`founder_id`) values (1,'admin','','abc','Admin','admin','00:00:02','1,2,3,4,5,6','1,2,3,4,5,6,7,8,9,10','',1,2,1),(2,'arif','','arif','pos','admin',NULL,'3','249,250,254,255',NULL,1,NULL,NULL),(11,'suman','mnm','suman','founder','Admin','20110911095827','1,2,3',NULL,NULL,1,NULL,NULL),(12,'rukon','','rukon','member','Admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'2512114213','','f6P8MYpc','member','',NULL,'1,2','247,249,250,253,255',NULL,NULL,NULL,NULL),(14,'1518581710','','L2GbQHkN','member','',NULL,'1,2','247,253',NULL,NULL,NULL,NULL),(15,'151841169','','3Br2M4Zn','member','',NULL,'1,2','247,253',NULL,NULL,NULL,NULL),(16,'2512380914','','qjvgyVfR','member','',NULL,'1,2','247,253',NULL,NULL,NULL,NULL),(17,'2513032717','','fWHTjLBF','member','',NULL,'1,2','247,253',NULL,NULL,NULL,NULL),(18,'2512451515','','nMjgNFDm','member','',NULL,'1,2','247,253',NULL,NULL,NULL,NULL),(19,'2513283618','','dTY7mVch','member','',NULL,'1,2','247,253',NULL,NULL,NULL,NULL),(20,'2513513619','','Qpn7drJT','member','',NULL,'1,2','247,253',NULL,NULL,NULL,NULL),(21,'2219222312','','K9qbNjyn','member','',NULL,'1,2','247,253',NULL,NULL,NULL,NULL);

/*Table structure for table `user_info` */

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `s_id` varchar(15) NOT NULL,
  `form_type` varchar(6) NOT NULL,
  `m_name` varchar(35) NOT NULL,
  `pname` varchar(35) NOT NULL,
  `m_dob` date NOT NULL,
  `m_status` varchar(10) NOT NULL,
  `nationality` varchar(10) NOT NULL,
  `address` varchar(65) NOT NULL,
  `mailing_address` varchar(65) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `mobile_no` varchar(20) NOT NULL default '',
  `mobile_network` varchar(10) NOT NULL,
  `phone_office` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `picture` varchar(200) default NULL,
  `dispatch_mode` varchar(10) NOT NULL,
  `n_name` varchar(35) NOT NULL,
  `n_relation` varchar(30) NOT NULL,
  `n_address` varchar(65) NOT NULL,
  `n_dob` date NOT NULL,
  `bank_name` varchar(35) NOT NULL,
  `acc_no` varchar(14) NOT NULL,
  `bank_branch` varchar(20) NOT NULL,
  `pan_no` varchar(10) NOT NULL,
  `ifsc_code` varchar(10) NOT NULL,
  `login_id` varchar(15) NOT NULL,
  `login_pass` varchar(15) NOT NULL default '',
  `hint` varchar(50) NOT NULL,
  `hint_ans` varchar(75) NOT NULL,
  `app_no` varchar(15) NOT NULL,
  `status` varchar(20) default 'Deactive',
  `creation_time` varchar(20) default NULL,
  `donate_care` varchar(20) default NULL,
  `pos_id` int(10) default NULL,
  `tree_id` int(10) default NULL,
  PRIMARY KEY  (`login_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `user_info` */

insert  into `user_info`(`s_id`,`form_type`,`m_name`,`pname`,`m_dob`,`m_status`,`nationality`,`address`,`mailing_address`,`city`,`state`,`pincode`,`mobile_no`,`mobile_network`,`phone_office`,`email`,`picture`,`dispatch_mode`,`n_name`,`n_relation`,`n_address`,`n_dob`,`bank_name`,`acc_no`,`bank_branch`,`pan_no`,`ifsc_code`,`login_id`,`login_pass`,`hint`,`hint_ans`,`app_no`,`status`,`creation_time`,`donate_care`,`pos_id`,`tree_id`) values ('000000','','Mr. Sahyog Jan Kalyan Shiksha Samit','S/O Sahyog Jan Kalyan Shiksha Samit','1990-09-26','Unmarried','Indian','1445, First Floor, Sector 17C, Gurgaon Haryana','1445, First Floor, Sector 17C, Gurgaon Haryana','Gurgaon','Haryana','205001','8801753859595','gsm','','saurav_pandey786@yahoo.com',NULL,'Online','Sahyog','BROTHER','As Above','2009-09-26','NA','NA','NA','NA','','081118361','goyJk9','What is your pet name?','sahyog','101118361','Active',NULL,NULL,1,1),('111111','','Mr Tamim','','0000-00-00','','','','','','','','8801753859','','','',NULL,'','','','','0000-00-00','','','','','','151829258','123456','','','','Active',NULL,NULL,1,2),('081131432','A','sdfgdfg','','0000-00-00','','','','','','','','01718233932','','','abc42094@yahoo.com',NULL,'','','','','0000-00-00','','','','','','081131523','wnJLd4zf','','','','Active',NULL,NULL,NULL,NULL),('081131432','C','suman','','0000-00-00','','','1445, First Floor, Sector 17C, Gurgaon Haryana','1445, First Floor, Sector 17C, Gurgaon Haryana','','','','01753859595','','','abc42092@yahoo.com',NULL,'','','','','0000-00-00','','','','','','081131594','qrDZ64MK','','','','Active',NULL,NULL,NULL,NULL),('081118361','A','suman','','0000-00-00','','','','','','','','01841787822','','','abc42092@yahoo.com',NULL,'','','','','0000-00-00','','','','','','081131432','krQRtvwH','','','','Active',NULL,NULL,NULL,NULL);

/*Table structure for table `user_info_bak` */

DROP TABLE IF EXISTS `user_info_bak`;

CREATE TABLE `user_info_bak` (
  `s_id` varchar(15) NOT NULL,
  `form_type` varchar(6) NOT NULL,
  `m_name` varchar(35) NOT NULL,
  `pname` varchar(35) NOT NULL,
  `m_dob` date NOT NULL,
  `m_status` varchar(10) NOT NULL,
  `nationality` varchar(10) NOT NULL,
  `address` varchar(65) NOT NULL,
  `mailing_address` varchar(65) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `mobile_network` varchar(10) NOT NULL,
  `phone_office` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dispatch_mode` varchar(10) NOT NULL,
  `n_name` varchar(35) NOT NULL,
  `n_relation` varchar(30) NOT NULL,
  `n_address` varchar(65) NOT NULL,
  `n_dob` date NOT NULL,
  `bank_name` varchar(35) NOT NULL,
  `acc_no` varchar(14) NOT NULL,
  `bank_branch` varchar(20) NOT NULL,
  `pan_no` varchar(10) NOT NULL,
  `ifsc_code` varchar(10) NOT NULL,
  `login_id` varchar(15) NOT NULL,
  `login_pass` varchar(15) NOT NULL,
  `hint` varchar(50) NOT NULL,
  `hint_ans` varchar(75) NOT NULL,
  `app_no` varchar(15) NOT NULL,
  PRIMARY KEY  (`login_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `user_info_bak` */

insert  into `user_info_bak`(`s_id`,`form_type`,`m_name`,`pname`,`m_dob`,`m_status`,`nationality`,`address`,`mailing_address`,`city`,`state`,`pincode`,`mobile_no`,`mobile_network`,`phone_office`,`email`,`dispatch_mode`,`n_name`,`n_relation`,`n_address`,`n_dob`,`bank_name`,`acc_no`,`bank_branch`,`pan_no`,`ifsc_code`,`login_id`,`login_pass`,`hint`,`hint_ans`,`app_no`) values ('000000','','Mr. Sahyog Jan Kalyan Shiksha Samit','S/O Sahyog Jan Kalyan Shiksha Samit','1990-09-26','Unmarried','Indian','1445, First Floor, Sector 17C, Gurgaon Haryana','1445, First Floor, Sector 17C, Gurgaon Haryana','Gurgaon','Haryana','205001','9837035841','gsm','','saurav_pandey786@yahoo.com','Online','Sahyog','BROTHER','As Above','2009-09-26','NA','NA','NA','NA','','081118361','goyhas','What is your pet name?','sahyog','101118361'),('081118361','A','Mr. Sahyog Jan Kalyan Shiksha Samit','S/O Sahyog Jan Kalyan Shiksha Samit','1990-09-26','Unmarried','Indian','1445, First Floor, Sector 17C, Gurgaon Haryana','1445, First Floor, Sector 17C, Gurgaon Haryana','Gurgaon','Haryana','205001','9837035841','gsm','','saurav_pandey786@yahoo.com','Online','Sahyog','BROTHER','Same As','2009-09-26','NA','NA','NA','NA','','081131432','goyhas','What is your pet name?','sahyog','71131432'),('081118361','B','Mr. Sahyog Jan Kalyan Shiksha Samit','S/O Sahyog Jan Kalyan Shiksha Samit','1990-09-26','Unmarried','Indian','1445, First Floor, Sector 17C, Gurgaon Haryana','1445, First Floor, Sector 17C, Gurgaon Haryana','Gurgaon','Haryana','205001','9837035841','gsm','','saurav_pandey786@yahoo.com','Online','Sahyog','BROTHER','Same As','2009-09-26','NA','NA','NA','NA','','081131523','goyhas','What is your pet name?','sahyog','21131523'),('081118361','C','Mr. Sahyog Jan Kalyan Shiksha Samit','S/O Sahyog Jan Kalyan Shiksha Samit','1990-09-26','Unmarried','Indian','1445, First Floor, Sector 17C, Gurgaon Haryana','1445, First Floor, Sector 17C, Gurgaon Haryana','Gurgaon','Haryana','205001','9837035841','gsm','','saurav_pandey786@yahoo.com','Online','Sahyog','BROTHER','Same As','2009-09-26','NA','NA','NA','NA','','081131594','goyhas','What is your pet name?','sahyog','61131594'),('081131432','A','Mr. Gyan Singh Kushwah','S/O Balwant Singh Kushwah','0000-00-00','Married','Indian','Mo. Siyapuram Opp. Bajaj Show Room, Station Road','Mo. Siyapuram Opp. Bajaj Show Room, Station Road','Mainpuri','Uttar Pradesh','205001','9719005869','gsm','','saurav_pandey786@yahoo.com','By Courier','Anita Kushwah','WIFE','Same As','0000-00-00','PNB','03480001002800','Mainpuri','NA','','081159395','123456','What is your pet name?','gyan','61159395'),('081159395','A','Mr. munendra singh chauhan','S/O netra pal singh','1975-04-10','Married','Indian','haridarshan nagar,mainpuri','as above','mainpuri','Uttar Pradesh','205001','9457415926','gsm','','www.saurav_pandey786@yahoo.com','By Courier','prem lata','WIFE','as above','0000-00-00','s.b.i.','3055312577','mainpuri','AHNTC1997J','','151813597','123456','What is your pet name?','MUNNI','91813597'),('151813597','A','Mr. anoop kumar','S/O amar singh','0000-00-00','Unmarried','Indian','vill-pragpur, post gariya(chhinkaura)\r\ndistt-mainpuri','as above','mainpuri','Uttar Pradesh','206301','9760142035','gsm','','www.saurav_pandey786@yahoo.com','By Courier','amar singh','FATHER','as above','0000-00-00','bank of india`','29840','bewar','a','','151829258','123456','What is your pet name?','anoop','71829258'),('151829258','C','Mr. kuldeep kumar','S/O rati ram saxena','1980-02-15','Unmarried','Indian','4/255,awas vikas colony,mainpuri','as above','mainpuri','Uttar Pradesh','205001','9457364391','gsm','','www.saurav_pandey786@yahoo.com','By Courier','rati ram saxena','FATHER','same','0000-00-00','pnb','03480001002265','mainpuri','a','','151841169','123456','What is your pet name?','kuldeep','21841169'),('151841169','A','Mr. gyan chandra gupta','S/O radhe shyam gupta','0000-00-00','Married','Indian','1/66/2,awas vikas ,mainpuri','same','mainpuri','Uttar Pradesh','205001','9410450208','gsm','','www.saurav_pandey786@yahoo.com','By Courier','sangeeta gupta','WIFE','same','0000-00-00','sbi','10902962663','mainpuri','afppg8878n','','1518581710','123456','What is your pet name?','gyan','318581710'),('081131432','B','Ms. sheela varma','W/O c.l. verma','1952-05-13','Married','Indian','c 21,phase 1,trans yamuna colony,agra','same','agra','Uttar Pradesh','282006','9412516927','gsm','','www.saurav_pandey786@yahoo.com','By Courier','satyendra verma','SON','same','1974-12-24','pnb','a','agra','282006','','2219120511','123456','What is your pet name?','verma','119120511'),('151841169','B','Mr. BACHAN SINGH GANGWAR','S/O RAM SINGH','0000-00-00','Married','Indian','VILL+POST-PITAURA,KAIMGANJ,DISST-FARRUKHABAD','SAME','FARRUKHABAD','Uttar Pradesh','207502','0988932593','gsm','','www.saurav_pandey786@yahoo.com','By Courier','SAROJNI DEVI','WIFE','same','0000-00-00','A','A','A','A','A','2219222312','123456','What is your pet name?','BACHAN','419222312'),('2219120511','C','Mr. MANOJ KUMAR AMAN','S/O SATISH CHANDRA','1978-03-11','Married','Indian','B.S.A OFFICE I.W.D.P. SABRI ROAD , HAYAT NAGAR MIRZAPUR.','B.S.A OFFICE I.W.D.P. SABRI ROAD , HAYAT NAGAR MIRZAPUR.','MIRZAPUR','Uttar Pradesh','000000','9839328265','gsm','','25SARBESH06KUMAR76@GMAIL.COM','By Courier','NEERAJ','WIFE','B.S.A OFFICE I.W.D.P. SABRI ROAD , HAYAT NAGAR MIRZAPUR.','0000-00-00','PNB','03220001300926','MIRZAPUR','AKLPA8965D','','2512114213','123456','What is your pet name?','AMAN','212114213'),('151829258','A','Ms. NEMA DEVI','D/O MADANSEN ','0000-00-00','Unmarried','Indian','VILL-SRANGARPUR POST-KARIMGANJ DIST-MAINPURI','VILL-SRANGARPUR POST-KARIMGANJ DIST-MAINPURI','MAINPURI','Uttar Pradesh','205001','9719855072','gsm','','ATULBHADAURIA13@GMAIL.COM','By Courier','MARGSHREE','MOTHER','VILL-SRANGARPUR POST-KARIMGANJ DIST-MAINPURI','0000-00-00','AA','A','AA','AA','AA','2512380914','123456','What is your pet name?','NEMA','412380914'),('2512380914','A','Mr. NEM SINGH','S/O AMAR SINGH','1990-07-10','Unmarried','Indian','VILL-SRANGARPUR POST-KARIMGANJ DIST-MAINPURI','VILL-SRANGARPUR POST-KARIMGANJ DIST-MAINPURI','MAINPURI','Uttar Pradesh','205001','9719972035','gsm','','ATULBHADAURIA13@GMAIL.COM','By Courier','AMAR SINGH','FATHER','VILL-SRANGARPUR POST-KARIMGANJ DIST-MAINPURI','0000-00-00','C.B.I.','32476','MAINPURI','A','A','2512451515','123456','What is your pet name?','NEM','412451515'),('2512451515','A','Mr. RAJEEV KUMAR','S/O JUGAL KISHORE','0000-00-00','Unmarried','Indian','VILL-SINGARPUR POST-KARIMGANJ DIST-MAINPURI','VILL-SINGARPUR POST-KARIMGANJ DIST-MAINPURI','MAINPURI','Uttar Pradesh','205001','9719972035','gsm','','ATULBHADAURIA13@GMAIL.COM','By Courier','JUGAL KISHORE','FATHER','VILL-SINGARPUR POST-KARIMGANJ DIST-MAINPURI','0000-00-00','AA','AA','AA','AA','AA','2512511216','123456','What is your pet name?','RAJEEV','512511216'),('151829258','B','Mr. RATAN KUMAR','S/O GAYAPRASAD','0000-00-00','Unmarried','Indian','VILL-PRAGPUR POST-GARIYA (CHHINKAURA) DIST-MAINPURI','VILL-PRAGPUR POST-GARIYA (CHHINKAURA) DIST-MAINPURI','MAINPURI','Uttar Pradesh','205001','9719691242','gsm','','ATULBHADAURIA13@GMAIL.COM','By Courier','GAYAPRASAD','FATHER','AS ABOVE','0000-00-00','A','A','A','A','A','2513032717','123456','What is your pet name?','RATAN','1013032717'),('2513032717','C','Mr. OMPAL SINGH','S/O SHRIPAL SINGH','1988-10-10','Unmarried','Indian','VILL-PRAGPUR  POST-GARIYA(CHHINKAURA)\r\nDISTT. MAINPURI','VILL-PRAGPUR  POST-GARIYA(CHHINKAURA)\r\nDISTT. MAINPURI','MAINPURI','Uttar Pradesh','205001','9760401920','gsm','','25SARBESH06KUMAR76@GMAIL.COM','By Courier','SHRIPAL SINGH','FATHER','AS ABOVE','0000-00-00','AA','AA','AA','AA','AA','2513283618','123456','What is your pet name?','OM','913283618'),('2512114213','A','Mr. SANJESH KUMAR','S/O YAD RAM','1974-08-17','Unmarried','Indian','6A,RAJA KA BAGH MAINPURI','6A,RAJA KA BAGH MAINPURI','MAINPURI','Uttar Pradesh','205001','9410271309','gsm','','SANJESH1974@ORKUT.COM','By Courier','RAM MURTI DEVI','MOTHER','AS ABOVE','0000-00-00','PNB','03480001002963','MAINPURI','CCZPS6508L','A','2513513619','123456','What is your pet name?','SANJESH','613513619'),('2513513619','A','Mr. NIKHIL SAXENA','S/O ANIL KUMAR SAXENA','0000-00-00','Unmarried','Indian','285 CHAUTHIYANA DEVI ROAD MAINPURI','AS ABOVE','MAINPURI','Uttar Pradesh','205001','9219744878','gsm','','SAJESH1974@ORKUT.COM','By Courier','NEELAM SAXENA ','MOTHER','AS ABOVE','0000-00-00','SBI','30669861659','MAINPURI','CBSPS8804B','','2514060020','123456','What is your pet name?','NIKHIL','214060020'),('2512380914','C','Mr. pramod kumar','S/O Horilal','1991-06-24','Unmarried','Indian','Vill-N.miti post sugaun Dist Mainpuri','Vill-N.miti post sugaun Dist Mainpuri','Mainpuri','Uttar Pradesh','205120','9760275307','gsm','','www.saurav@yahoo.com','Online','Horilal','FATHER','Vill-N.miti post sugaun Dist Mainpuri','1951-04-20','aa','a','a','a','a','3112374821','123456','What make was your first car or bike?','maruti','612374821'),('2512380914','B','Md. pankaj kumar','S/O Ramsanehi lal','0000-00-00','Unmarried','Indian','Vill-Harchandpur post-Nagla jula \r\nDist-Mainpuri','Vill-Harchandpur post-Nagla jula \r\nDist-Mainpuri','Mainpuri','Uttar Pradesh','205001','9917562030','gsm','','www.anoop9760@yahoo.com','Online','Ramsanehi lal','FATHER','Vill-Harchandpur post-Nagla jula ','1945-05-11','aa','aa','aa','aa','aa','3112563522','123456','What make was your first car or bike?','hero honda','912563522');

/*Table structure for table `user_level` */

DROP TABLE IF EXISTS `user_level`;

CREATE TABLE `user_level` (
  `login_id` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `user_level` */

/*Table structure for table `withdraw_request` */

DROP TABLE IF EXISTS `withdraw_request`;

CREATE TABLE `withdraw_request` (
  `id` int(10) NOT NULL auto_increment,
  `mobile_no` varchar(20) default NULL,
  `login_id` varchar(20) default NULL,
  `amount` decimal(10,0) default NULL,
  `request_date` varchar(20) default NULL,
  `creation_time` varchar(20) default NULL,
  `status` varchar(20) default 'New',
  `pin` varchar(20) default NULL,
  `agent` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `withdraw_request` */

insert  into `withdraw_request`(`id`,`mobile_no`,`login_id`,`amount`,`request_date`,`creation_time`,`status`,`pin`,`agent`) values (4,'8801841787822','081118361','100','20120206053729','06/02/2012 05:37:29','Paid','32132123123','bcash'),(5,'8801841787822','081118361','300','20120206064924','06/02/2012 06:49:24','New',NULL,NULL),(6,'8801753859595','081118361','200','20120223083533','23/02/2012 08:35:33','Paid','123456','bcash');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
