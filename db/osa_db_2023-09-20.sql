# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.25-MariaDB)
# Database: osa_db
# Generation Time: 2023-09-20 06:54:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_academic_year
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_academic_year`;

CREATE TABLE `tbl_academic_year` (
  `ay_id` int(11) NOT NULL AUTO_INCREMENT,
  `ay_name` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_activities`;

CREATE TABLE `tbl_activities` (
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `activity_desc` text NOT NULL,
  `activity_date` date NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_checklist_requirements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_checklist_requirements`;

CREATE TABLE `tbl_checklist_requirements` (
  `cr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cr_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_courses`;

CREATE TABLE `tbl_courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_grade` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_courses` WRITE;
/*!40000 ALTER TABLE `tbl_courses` DISABLE KEYS */;

INSERT INTO `tbl_courses` (`course_id`, `course_name`, `course_code`, `course_grade`, `date_added`)
VALUES
	(5,'IT','IT-123123',100,'2023-05-30 16:34:37'),
	(6,'HM','HM-123123',100,'2023-05-30 16:34:40');

/*!40000 ALTER TABLE `tbl_courses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_exemplary_students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_exemplary_students`;

CREATE TABLE `tbl_exemplary_students` (
  `es_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_good_moral
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_good_moral`;

CREATE TABLE `tbl_good_moral` (
  `good_moral_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`good_moral_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_offenses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_offenses`;

CREATE TABLE `tbl_offenses` (
  `offense_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sanction_id` int(11) NOT NULL,
  `ay_id` int(11) NOT NULL,
  `offense_desc` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`offense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_organizational_officers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_organizational_officers`;

CREATE TABLE `tbl_organizational_officers` (
  `of_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `of_type` varchar(25) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`of_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_sanctions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_sanctions`;

CREATE TABLE `tbl_sanctions` (
  `sanction_id` int(11) NOT NULL AUTO_INCREMENT,
  `sanction_name` varchar(50) NOT NULL,
  `sanction_desc` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sanction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_services`;

CREATE TABLE `tbl_services` (
  `services_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sevices_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`services_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_students`;

CREATE TABLE `tbl_students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_code` varchar(50) NOT NULL,
  `student_fname` varchar(50) NOT NULL,
  `student_mname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_birthdate` date NOT NULL,
  `student_gender` varchar(50) NOT NULL,
  `student_address` varchar(150) NOT NULL,
  `student_contact_num` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_students` WRITE;
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;

INSERT INTO `tbl_students` (`student_id`, `student_code`, `student_fname`, `student_mname`, `student_lname`, `student_birthdate`, `student_gender`, `student_address`, `student_contact_num`, `course_id`, `date_added`)
VALUES
	(3,'qweqwew','qw','qw','qw','2023-05-31','Female','qweqweqwew','1231231231',6,'2023-05-30 16:28:07'),
	(4,'wwwww','w','w','w','2023-05-30','Female','wwww','123123123',6,'2023-05-30 16:28:45'),
	(6,'qwe','qwe','qwe','qwe','2023-06-01','Male','qwe','123123',6,'2023-06-01 13:00:58'),
	(8,'1','1','1','1','2023-06-01','Female','1','1',5,'2023-06-01 13:28:43'),
	(9,'2','2','2','2','2023-06-01','Female','2','123213',5,'2023-06-01 13:40:03'),
	(11,'4','4','4','4','2023-06-01','Female','4','4',5,'2023-06-01 13:47:28');

/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `username`, `password`, `date_added`)
VALUES
	(1,'Juan','Quezon','Dela Cruz','admin','21232f297a57a5a743894a0e4a801fc3','2023-05-30 11:48:05'),
	(6,'abcde1','abcde1','abcde1','abcde1','827ccb0eea8a706c4c34a16891f84e7b','2023-05-30 15:06:23'),
	(7,'rapa','','rapa','rapa','0cc175b9c0f1b6a831c399e269772661','2023-09-20 13:39:25');

/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_violations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_violations`;

CREATE TABLE `tbl_violations` (
  `violation_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_name` varchar(50) NOT NULL,
  `violation_desc` varchar(150) NOT NULL,
  `violation_remarks` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`violation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
