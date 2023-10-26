# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.25-MariaDB)
# Database: osa_db
# Generation Time: 2023-10-26 08:16:22 +0000
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
  `ay_name` varchar(75) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_academic_year` WRITE;
/*!40000 ALTER TABLE `tbl_academic_year` DISABLE KEYS */;

INSERT INTO `tbl_academic_year` (`ay_id`, `ay_name`, `date_added`)
VALUES
	(1,'2022-2023','2023-09-20 15:35:22'),
	(2,'2023-2024','2023-09-20 15:42:36'),
	(21,'2024-2025','2023-10-26 14:11:16');

/*!40000 ALTER TABLE `tbl_academic_year` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_activities`;

CREATE TABLE `tbl_activities` (
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ay_id` int(11) NOT NULL,
  `activity_desc` varchar(150) NOT NULL DEFAULT '',
  `activity_date` date NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_activities` WRITE;
/*!40000 ALTER TABLE `tbl_activities` DISABLE KEYS */;

INSERT INTO `tbl_activities` (`activity_id`, `ay_id`, `activity_desc`, `activity_date`, `date_added`)
VALUES
	(1,1,'Intramurals','2023-10-07','2023-10-26 14:23:13');

/*!40000 ALTER TABLE `tbl_activities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_checklist_requirements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_checklist_requirements`;

CREATE TABLE `tbl_checklist_requirements` (
  `cr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cr_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_checklist_requirements` WRITE;
/*!40000 ALTER TABLE `tbl_checklist_requirements` DISABLE KEYS */;

INSERT INTO `tbl_checklist_requirements` (`cr_id`, `cr_desc`, `date_added`)
VALUES
	(1,'Requirement 1','2023-10-26 14:25:12'),
	(2,'Requirement 2','2023-10-26 14:25:16'),
	(3,'Requirement 3','2023-10-26 14:25:22');

/*!40000 ALTER TABLE `tbl_checklist_requirements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_clubs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_clubs`;

CREATE TABLE `tbl_clubs` (
  `club_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `club_name` varchar(75) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_clubs` WRITE;
/*!40000 ALTER TABLE `tbl_clubs` DISABLE KEYS */;

INSERT INTO `tbl_clubs` (`club_id`, `club_name`, `date_added`)
VALUES
	(1,'Math Club','2023-10-26 14:08:29'),
	(2,'Science Club','2023-10-26 14:08:36');

/*!40000 ALTER TABLE `tbl_clubs` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,'Information Technology','IT-00001',100,'2023-10-26 14:14:47'),
	(2,'Information System','IS-00001',100,'2023-10-26 14:15:07'),
	(3,'Industrial Technology','INT-00001',100,'2023-10-26 14:15:38'),
	(4,'Food Technology','FT-000001',100,'2023-10-26 14:15:57');

/*!40000 ALTER TABLE `tbl_courses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_exemplary_students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_exemplary_students`;

CREATE TABLE `tbl_exemplary_students` (
  `es_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `es_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_exemplary_students` WRITE;
/*!40000 ALTER TABLE `tbl_exemplary_students` DISABLE KEYS */;

INSERT INTO `tbl_exemplary_students` (`es_id`, `student_id`, `es_desc`, `date_added`)
VALUES
	(1,10,'Sample Exemplary Students 1','2023-10-26 14:22:42'),
	(2,11,'Sample Exemplary Students 2','2023-10-26 14:22:51');

/*!40000 ALTER TABLE `tbl_exemplary_students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_good_moral
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_good_moral`;

CREATE TABLE `tbl_good_moral` (
  `good_moral_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ay_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `good_modal_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`good_moral_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_good_moral` WRITE;
/*!40000 ALTER TABLE `tbl_good_moral` DISABLE KEYS */;

INSERT INTO `tbl_good_moral` (`good_moral_id`, `ay_id`, `student_id`, `good_modal_desc`, `date_added`)
VALUES
	(1,1,14,'Sample of good moral releasing 1','2023-10-26 14:24:27'),
	(2,2,13,'Sample of good moral releasing 2','2023-10-26 14:24:54');

/*!40000 ALTER TABLE `tbl_good_moral` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_messages`;

CREATE TABLE `tbl_messages` (
  `msg_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(1) NOT NULL DEFAULT '' COMMENT 'R = READ, U = UNREAD',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_messages` WRITE;
/*!40000 ALTER TABLE `tbl_messages` DISABLE KEYS */;

INSERT INTO `tbl_messages` (`msg_id`, `sender_id`, `receiver_id`, `message`, `date_added`, `status`)
VALUES
	(1,1,10,'Admin test message 1','2023-10-26 16:11:58','R'),
	(2,1,11,'Admin test message 1','2023-10-26 16:12:01','R'),
	(3,1,12,'Admin test message 1','2023-10-26 16:12:03','R'),
	(4,1,13,'Admin test message 1','2023-10-26 16:12:05','R'),
	(5,1,14,'Admin test message 1','2023-10-26 16:12:07','R'),
	(6,10,1,'Student test message','2023-10-26 16:12:28','U'),
	(7,10,1,'Student test message','2023-10-26 16:12:31','U'),
	(8,10,1,'Student test message','2023-10-26 16:12:32','U'),
	(9,11,1,'Student test message','2023-10-26 16:12:48','U'),
	(10,11,1,'Student test message','2023-10-26 16:12:49','U'),
	(11,12,1,'Student test message','2023-10-26 16:13:04','U'),
	(12,12,1,'Student test message','2023-10-26 16:13:05','U'),
	(13,12,1,'Student test message','2023-10-26 16:13:07','U'),
	(14,12,1,'Student test message','2023-10-26 16:13:08','U'),
	(15,12,1,'Student test message','2023-10-26 16:13:09','U'),
	(16,13,1,'Student test message','2023-10-26 16:13:23','R'),
	(17,14,1,'Student test message','2023-10-26 16:13:41','U'),
	(18,14,1,'Student test message','2023-10-26 16:13:42','U'),
	(19,14,1,'Student test message','2023-10-26 16:13:43','U'),
	(20,14,1,'Student test message','2023-10-26 16:13:44','U'),
	(21,14,1,'Student test message','2023-10-26 16:13:45','U'),
	(22,14,1,'Student test message','2023-10-26 16:13:47','U'),
	(23,14,1,'Student test message','2023-10-26 16:13:48','U');

/*!40000 ALTER TABLE `tbl_messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_offenses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_offenses`;

CREATE TABLE `tbl_offenses` (
  `offense_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sanction_id` int(11) NOT NULL,
  `ay_id` int(11) NOT NULL,
  `offense_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`offense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_offenses` WRITE;
/*!40000 ALTER TABLE `tbl_offenses` DISABLE KEYS */;

INSERT INTO `tbl_offenses` (`offense_id`, `violation_id`, `student_id`, `sanction_id`, `ay_id`, `offense_desc`, `date_added`)
VALUES
	(1,1,10,1,1,'Sample offense description 1','2023-10-26 14:26:45'),
	(2,3,14,2,1,'Sample offense description 2','2023-10-26 14:27:01');

/*!40000 ALTER TABLE `tbl_offenses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_organizational_officers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_organizational_officers`;

CREATE TABLE `tbl_organizational_officers` (
  `of_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ay_id` int(11) NOT NULL,
  `of_type` varchar(25) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`of_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_organizational_officers` WRITE;
/*!40000 ALTER TABLE `tbl_organizational_officers` DISABLE KEYS */;

INSERT INTO `tbl_organizational_officers` (`of_id`, `club_id`, `student_id`, `ay_id`, `of_type`, `date_added`)
VALUES
	(1,1,13,1,'President','2023-10-26 14:27:55'),
	(2,1,12,1,'Vice President','2023-10-26 14:28:07'),
	(3,1,10,1,'Member','2023-10-26 14:28:35'),
	(4,2,14,1,'President','2023-10-26 15:07:19');

/*!40000 ALTER TABLE `tbl_organizational_officers` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `tbl_sanctions` WRITE;
/*!40000 ALTER TABLE `tbl_sanctions` DISABLE KEYS */;

INSERT INTO `tbl_sanctions` (`sanction_id`, `sanction_name`, `sanction_desc`, `date_added`)
VALUES
	(1,'Sanction 1','Sanction 1 sample description','2023-10-26 14:10:23'),
	(2,'Sanction 2','Sanction 2 sample description','2023-10-26 14:10:33'),
	(3,'Sanction 3','Sanction 3 sample description','2023-10-26 14:10:42'),
	(4,'Sanction 4','Sanction 4 sample description','2023-10-26 14:10:51');

/*!40000 ALTER TABLE `tbl_sanctions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_services`;

CREATE TABLE `tbl_services` (
  `services_id` int(11) NOT NULL AUTO_INCREMENT,
  `services_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`services_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_services` WRITE;
/*!40000 ALTER TABLE `tbl_services` DISABLE KEYS */;

INSERT INTO `tbl_services` (`services_id`, `services_desc`, `date_added`)
VALUES
	(1,'Service 1','2023-10-26 14:26:03'),
	(2,'Service 2','2023-10-26 14:26:07'),
	(3,'Service 3','2023-10-26 14:26:15');

/*!40000 ALTER TABLE `tbl_services` ENABLE KEYS */;
UNLOCK TABLES;


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



# Dump of table tbl_token
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_token`;

CREATE TABLE `tbl_token` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` varchar(10) NOT NULL DEFAULT '',
  `category` varchar(1) NOT NULL DEFAULT '' COMMENT 'A = ADMIN, S = STUDENTS',
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_gender` varchar(1) NOT NULL DEFAULT '' COMMENT 'M = MALE, F =FEMALE',
  `user_address` varchar(150) NOT NULL DEFAULT '',
  `user_contact_num` varchar(50) NOT NULL DEFAULT '',
  `course_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_img` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;

INSERT INTO `tbl_users` (`user_id`, `user_code`, `category`, `user_fname`, `user_mname`, `user_lname`, `user_birthdate`, `user_gender`, `user_address`, `user_contact_num`, `course_id`, `username`, `password`, `date_added`, `profile_img`)
VALUES
	(1,'0','A','Juan','Quezon','Dela Cruz','0000-00-00','','','',0,'admin','827ccb0eea8a706c4c34a16891f84e7b','2023-05-30 11:48:05','678792-PROF-1.PNG'),
	(10,'000000010','S','Aldwin','Amihan','Amparo','2023-10-26','M','Sample address 1','09123456789',1,'aldwin','0cc175b9c0f1b6a831c399e269772661','2023-10-26 14:17:14',''),
	(11,'000000011','S','Basilio','Bartolome','Balagtas','2023-10-26','M','Sample Address 2','09132456789',2,'basilio','0cc175b9c0f1b6a831c399e269772661','2023-10-26 14:18:20',''),
	(12,'000000012','S','Belinda','Benigno','Benjamin','2023-10-26','F','Sample Address 3','09124356789',3,'belinda','0cc175b9c0f1b6a831c399e269772661','2023-10-26 14:19:04',''),
	(13,'000000013','S','Brando','Eleanor','Jacob','2023-10-26','M','Sample Address 4','09321654789',1,'brando','0cc175b9c0f1b6a831c399e269772661','2023-10-26 14:20:30',''),
	(14,'000000014','S','Jane','Narciso','Rosauro','2023-10-26','F','Sample address 5','09987654321',4,'jane','0cc175b9c0f1b6a831c399e269772661','2023-10-26 14:22:21','');

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

LOCK TABLES `tbl_violations` WRITE;
/*!40000 ALTER TABLE `tbl_violations` DISABLE KEYS */;

INSERT INTO `tbl_violations` (`violation_id`, `violation_name`, `violation_desc`, `violation_remarks`, `date_added`)
VALUES
	(1,'Violation 1','Violation 1 sample description','Violation 1 sample remarks','2023-10-26 14:09:21'),
	(2,'Violation 2','Violation 2 sample description','Violation 2 sample remarks','2023-10-26 14:09:40'),
	(3,'Violation 3','Violation 1 sample description','Violation 3 sample remarks','2023-10-26 14:09:55');

/*!40000 ALTER TABLE `tbl_violations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
