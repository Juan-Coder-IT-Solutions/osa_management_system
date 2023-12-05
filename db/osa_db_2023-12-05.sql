# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.25-MariaDB)
# Database: osa_db
# Generation Time: 2023-12-05 01:45:52 +0000
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
  `ay_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_academic_year` WRITE;
/*!40000 ALTER TABLE `tbl_academic_year` DISABLE KEYS */;

INSERT INTO `tbl_academic_year` (`ay_id`, `ay_name`, `ay_desc`, `date_added`)
VALUES
	(1,'2022-2023','qweqweqwe','2023-09-20 15:35:22'),
	(2,'2023-2024','','2023-09-20 15:42:36');

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
	(2,1,'qweqwe','2023-09-20','2023-09-20 16:04:07'),
	(3,2,'test','2023-09-22','2023-09-20 16:04:16'),
	(4,2,'retydfg','2023-09-20','2023-09-20 16:04:24');

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
	(2,'dfshg','2023-11-22 08:53:43'),
	(3,'yuto','2023-11-22 08:53:48');

/*!40000 ALTER TABLE `tbl_checklist_requirements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_clubs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_clubs`;

CREATE TABLE `tbl_clubs` (
  `club_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `club_name` varchar(75) NOT NULL DEFAULT '',
  `club_type` varchar(15) NOT NULL DEFAULT '' COMMENT 'A = ACADEMIC, N = NONACADEMIC',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_clubs` WRITE;
/*!40000 ALTER TABLE `tbl_clubs` DISABLE KEYS */;

INSERT INTO `tbl_clubs` (`club_id`, `club_name`, `club_type`, `date_added`)
VALUES
	(1,'test','Non-academic','2023-11-21 16:08:31'),
	(2,'awetawetawetqwe123','Academic','2023-11-21 16:19:08'),
	(3,'qwe','Academic','2023-12-05 09:41:43');

/*!40000 ALTER TABLE `tbl_clubs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_clubs_requirements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_clubs_requirements`;

CREATE TABLE `tbl_clubs_requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_id` int(11) NOT NULL,
  `of_id` int(11) NOT NULL,
  `attached_file` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_clubs_requirements` WRITE;
/*!40000 ALTER TABLE `tbl_clubs_requirements` DISABLE KEYS */;

INSERT INTO `tbl_clubs_requirements` (`id`, `cr_id`, `of_id`, `attached_file`, `date_added`)
VALUES
	(3,2,1,'788860-file-2.jpg','2023-12-05 09:23:26'),
	(4,3,1,'80236-file-3.jpg','2023-12-05 09:24:12');

/*!40000 ALTER TABLE `tbl_clubs_requirements` ENABLE KEYS */;
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
	(5,'IT','IT-123123',100,'2023-05-30 16:34:37'),
	(6,'HM','HM-123123',100,'2023-05-30 16:34:40'),
	(7,'test','test',12,'2023-09-22 09:34:42');

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
	(1,2,11,'wewewee23','2023-09-20 16:26:52'),
	(3,2,9,'test','2023-09-20 16:28:14'),
	(4,1,8,'wewe','2023-09-20 16:28:39'),
	(5,1,3,'yuyu','2023-09-20 16:32:04');

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
	(1,8,15,'test','2023-10-18 10:15:25','R'),
	(2,8,15,'test','2023-10-18 10:15:27','R'),
	(3,8,15,'hi','2023-10-18 10:16:16','R'),
	(4,8,15,'qwerty','2023-10-18 10:16:48','R'),
	(5,15,8,'hi','2023-10-18 10:16:56','R'),
	(37,8,15,'test','2023-10-18 11:22:54','R'),
	(38,8,15,'tstaset','2023-10-18 11:22:56','R'),
	(39,8,15,'awetawet','2023-10-18 11:22:57','R'),
	(40,8,15,'awerawer','2023-10-18 11:23:06','R'),
	(41,8,15,'dsgsdfg','2023-10-18 11:23:07','R'),
	(42,8,15,'sdfgsdfg','2023-10-18 11:23:08','R'),
	(43,8,15,'sdfgsdfg','2023-10-18 11:23:10','R'),
	(44,8,15,'sdfgsdfg','2023-10-18 11:23:11','R'),
	(45,8,15,'dsfgsdfg','2023-10-18 11:23:12','R'),
	(46,8,15,'df','2023-10-18 11:34:11','R'),
	(47,8,15,'awer','2023-10-18 11:34:13','R'),
	(48,8,15,'vb','2023-10-18 11:34:15','R'),
	(49,8,15,'afs','2023-10-18 11:38:33','R'),
	(50,8,15,'dsf','2023-10-18 11:43:10','R'),
	(51,8,15,'adf','2023-10-18 11:52:32','R'),
	(52,8,15,'test','2023-10-18 13:19:18','R'),
	(53,8,15,'1233','2023-10-18 16:17:39','R'),
	(54,8,15,'wet','2023-10-18 16:17:44','R'),
	(55,8,15,'dsdf','2023-10-18 16:17:47','R'),
	(56,8,15,'test','2023-11-15 13:33:06','R'),
	(57,8,15,'test','2023-11-15 13:33:16','R'),
	(58,8,15,'awertawer','2023-11-15 13:33:30','R'),
	(59,8,15,'asdfasd','2023-11-15 13:33:32','R'),
	(60,8,15,'test','2023-11-15 13:33:40','R'),
	(61,8,15,'test','2023-11-15 13:34:25','U'),
	(62,8,9,'test','2023-11-29 08:30:56','R'),
	(63,8,9,'test','2023-11-29 08:30:58','R'),
	(64,8,9,'tset','2023-11-29 08:30:59','R'),
	(65,8,9,'testset','2023-11-29 08:31:01','R'),
	(66,8,9,'testset','2023-11-29 08:31:02','R'),
	(67,9,8,'mj','2023-11-29 08:31:37','R'),
	(68,9,8,'g','2023-11-29 08:32:02','R');

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
  `club_id` int(11) NOT NULL,
  `ay_id` int(11) NOT NULL,
  `of_type` varchar(25) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`of_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_organizational_officers` WRITE;
/*!40000 ALTER TABLE `tbl_organizational_officers` DISABLE KEYS */;

INSERT INTO `tbl_organizational_officers` (`of_id`, `student_id`, `club_id`, `ay_id`, `of_type`, `date_added`)
VALUES
	(1,9,2,1,'President','2023-12-04 13:56:36'),
	(2,9,2,1,'Secretary','2023-12-04 13:56:57');

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
	(1,'tes','tset','2023-09-22 09:49:26');

/*!40000 ALTER TABLE `tbl_sanctions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_services`;

CREATE TABLE `tbl_services` (
  `services_id` int(11) NOT NULL AUTO_INCREMENT,
  `services_desc` varchar(150) NOT NULL DEFAULT '',
  `services_remarks` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`services_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_services` WRITE;
/*!40000 ALTER TABLE `tbl_services` DISABLE KEYS */;

INSERT INTO `tbl_services` (`services_id`, `services_desc`, `services_remarks`, `date_added`)
VALUES
	(1,'test','','2023-11-20 09:11:52'),
	(2,'qwe','qwe123','2023-12-04 13:42:53'),
	(3,'sadsad1','adsasdqwe1','2023-12-04 13:44:28');

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

LOCK TABLES `tbl_students` WRITE;
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;

INSERT INTO `tbl_students` (`student_id`, `student_code`, `student_fname`, `student_mname`, `student_lname`, `student_birthdate`, `student_gender`, `student_address`, `student_contact_num`, `course_id`, `date_added`)
VALUES
	(3,'qweqwew','qw','qw','qw','2023-05-31','Female','qweqweqwew','1231231231',6,'2023-05-30 16:28:07'),
	(4,'wwwww','w','w','w','2023-05-30','Female','wwww','123123123',6,'2023-05-30 16:28:45'),
	(6,'qwe','qwe','qwe','qwe','2023-06-01','Male','qwe','123123',6,'2023-06-01 13:00:58'),
	(8,'1','1','1','1','2023-06-01','Female','1','1',5,'2023-06-01 13:28:43'),
	(9,'2','2','2','2','2023-06-01','Female','2','123213',5,'2023-06-01 13:40:03'),
	(11,'4','4','4','4','2023-06-01','Female','4','4',5,'2023-06-01 13:47:28'),
	(12,'','Ana','D','Monkey','2023-11-30','F','test','',5,'2023-11-29 08:56:25');

/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` varchar(11) NOT NULL DEFAULT '',
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
	(8,'0','A','Juan','Quezon','Dela Cruz','0000-00-00','','','',0,'admin','827ccb0eea8a706c4c34a16891f84e7b','2023-05-30 11:48:05',''),
	(9,'000000009','S','test','test','test','2023-10-31','F','','123',7,'test','827ccb0eea8a706c4c34a16891f84e7b','2023-11-29 08:30:47','');

/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_users_2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_users_2`;

CREATE TABLE `tbl_users_2` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_img` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_users_2` WRITE;
/*!40000 ALTER TABLE `tbl_users_2` DISABLE KEYS */;

INSERT INTO `tbl_users_2` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `username`, `password`, `date_added`, `profile_img`)
VALUES
	(1,'Juan','Quezon','Dela Cruz','admin','827ccb0eea8a706c4c34a16891f84e7b','2023-05-30 11:48:05','397728-PROF-1.PNG'),
	(6,'abcde1','abcde1','abcde1','abcde1','827ccb0eea8a706c4c34a16891f84e7b','2023-05-30 15:06:23',''),
	(7,'rapa','','rapa','rapa','0cc175b9c0f1b6a831c399e269772661','2023-09-20 13:39:25',''),
	(8,'Juan','Quezon','Dela Cruz','admin','827ccb0eea8a706c4c34a16891f84e7b','2023-05-30 11:48:05','397728-PROF-1.PNG');

/*!40000 ALTER TABLE `tbl_users_2` ENABLE KEYS */;
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
	(1,'test','','test','2023-10-18 08:52:33');

/*!40000 ALTER TABLE `tbl_violations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
