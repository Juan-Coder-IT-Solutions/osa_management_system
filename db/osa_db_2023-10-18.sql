-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table osa_db.tbl_academic_year
CREATE TABLE IF NOT EXISTS `tbl_academic_year` (
  `ay_id` int(11) NOT NULL AUTO_INCREMENT,
  `ay_name` varchar(75) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_academic_year: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_academic_year` DISABLE KEYS */;
INSERT INTO `tbl_academic_year` (`ay_id`, `ay_name`, `date_added`) VALUES
	(1, '2022-2023', '2023-09-20 15:35:22'),
	(2, '2023-2024', '2023-09-20 15:42:36');
/*!40000 ALTER TABLE `tbl_academic_year` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_activities
CREATE TABLE IF NOT EXISTS `tbl_activities` (
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ay_id` int(11) NOT NULL,
  `activity_desc` varchar(150) NOT NULL DEFAULT '',
  `activity_date` date NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_activities: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_activities` DISABLE KEYS */;
INSERT INTO `tbl_activities` (`activity_id`, `ay_id`, `activity_desc`, `activity_date`, `date_added`) VALUES
	(2, 1, 'qweqwe', '2023-09-20', '2023-09-20 16:04:07'),
	(3, 1, 'dssd 1232132', '2023-09-22', '2023-09-20 16:04:16'),
	(4, 2, 'retydfg', '2023-09-20', '2023-09-20 16:04:24');
/*!40000 ALTER TABLE `tbl_activities` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_checklist_requirements
CREATE TABLE IF NOT EXISTS `tbl_checklist_requirements` (
  `cr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cr_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_checklist_requirements: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_checklist_requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_checklist_requirements` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_courses
CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_grade` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_courses: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_courses` DISABLE KEYS */;
INSERT INTO `tbl_courses` (`course_id`, `course_name`, `course_code`, `course_grade`, `date_added`) VALUES
	(5, 'IT', 'IT-123123', 100, '2023-05-30 16:34:37'),
	(6, 'HM', 'HM-123123', 100, '2023-05-30 16:34:40'),
	(7, 'aweawe', 'wer', 12, '2023-09-22 09:34:42');
/*!40000 ALTER TABLE `tbl_courses` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_exemplary_students
CREATE TABLE IF NOT EXISTS `tbl_exemplary_students` (
  `es_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `es_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_exemplary_students: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_exemplary_students` DISABLE KEYS */;
INSERT INTO `tbl_exemplary_students` (`es_id`, `student_id`, `es_desc`, `date_added`) VALUES
	(2, 3, 'qweqwe qweqwe', '2023-09-20 15:20:51');
/*!40000 ALTER TABLE `tbl_exemplary_students` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_good_moral
CREATE TABLE IF NOT EXISTS `tbl_good_moral` (
  `good_moral_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ay_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `good_modal_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`good_moral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_good_moral: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_good_moral` DISABLE KEYS */;
INSERT INTO `tbl_good_moral` (`good_moral_id`, `ay_id`, `student_id`, `good_modal_desc`, `date_added`) VALUES
	(1, 2, 11, 'wewewee23', '2023-09-20 16:26:52'),
	(3, 1, 8, '123123123123', '2023-09-20 16:28:14'),
	(4, 1, 8, 'wewe', '2023-09-20 16:28:39'),
	(5, 1, 3, 'yuyu', '2023-09-20 16:32:04');
/*!40000 ALTER TABLE `tbl_good_moral` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_offenses
CREATE TABLE IF NOT EXISTS `tbl_offenses` (
  `offense_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sanction_id` int(11) NOT NULL,
  `ay_id` int(11) NOT NULL,
  `offense_desc` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`offense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_offenses: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_offenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_offenses` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_organizational_officers
CREATE TABLE IF NOT EXISTS `tbl_organizational_officers` (
  `of_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `of_type` varchar(25) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`of_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_organizational_officers: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_organizational_officers` DISABLE KEYS */;
INSERT INTO `tbl_organizational_officers` (`of_id`, `student_id`, `of_type`, `date_added`) VALUES
	(2, 11, 'test', '2023-09-23 11:39:02');
/*!40000 ALTER TABLE `tbl_organizational_officers` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_sanctions
CREATE TABLE IF NOT EXISTS `tbl_sanctions` (
  `sanction_id` int(11) NOT NULL AUTO_INCREMENT,
  `sanction_name` varchar(50) NOT NULL,
  `sanction_desc` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sanction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_sanctions: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_sanctions` DISABLE KEYS */;
INSERT INTO `tbl_sanctions` (`sanction_id`, `sanction_name`, `sanction_desc`, `date_added`) VALUES
	(1, 'tes', 'tset', '2023-09-22 09:49:26');
/*!40000 ALTER TABLE `tbl_sanctions` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_services
CREATE TABLE IF NOT EXISTS `tbl_services` (
  `services_id` int(11) NOT NULL AUTO_INCREMENT,
  `services_desc` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`services_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_services: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_services` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_students
CREATE TABLE IF NOT EXISTS `tbl_students` (
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_students: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` (`student_id`, `student_code`, `student_fname`, `student_mname`, `student_lname`, `student_birthdate`, `student_gender`, `student_address`, `student_contact_num`, `course_id`, `date_added`) VALUES
	(3, 'qweqwew', 'qw', 'qw', 'qw', '2023-05-31', 'Female', 'qweqweqwew', '1231231231', 6, '2023-05-30 16:28:07'),
	(4, 'wwwww', 'w', 'w', 'w', '2023-05-30', 'Female', 'wwww', '123123123', 6, '2023-05-30 16:28:45'),
	(6, 'qwe', 'qwe', 'qwe', 'qwe', '2023-06-01', 'Male', 'qwe', '123123', 6, '2023-06-01 13:00:58'),
	(8, '1', '1', '1', '1', '2023-06-01', 'Female', '1', '1', 5, '2023-06-01 13:28:43'),
	(9, '2', '2', '2', '2', '2023-06-01', 'Female', '2', '123213', 5, '2023-06-01 13:40:03'),
	(11, '4', '4', '4', '4', '2023-06-01', 'Female', '4', '4', 5, '2023-06-01 13:47:28');
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_code`, `category`, `user_fname`, `user_mname`, `user_lname`, `user_birthdate`, `user_gender`, `user_address`, `user_contact_num`, `course_id`, `username`, `password`, `date_added`, `profile_img`) VALUES
	(8, '0', 'A', 'Juan', 'Quezon', 'Dela Cruz', '0000-00-00', '', '', '', 0, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2023-05-30 11:48:05', '116576-PROF-8.PNG'),
	(14, '000000014', 'A', 'aaa', 'aaa', 'aaa', '2023-11-30', 'F', 'aaa', '1234678', 6, 'aa', '4124bc0a9335c27f086f24ba207a4912', '2023-10-12 14:25:48', '');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_users_2
CREATE TABLE IF NOT EXISTS `tbl_users_2` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_img` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_users_2: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_users_2` DISABLE KEYS */;
INSERT INTO `tbl_users_2` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `username`, `password`, `date_added`, `profile_img`) VALUES
	(1, 'Juan', 'Quezon', 'Dela Cruz', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2023-05-30 11:48:05', '397728-PROF-1.PNG'),
	(6, 'abcde1', 'abcde1', 'abcde1', 'abcde1', '827ccb0eea8a706c4c34a16891f84e7b', '2023-05-30 15:06:23', ''),
	(7, 'rapa', '', 'rapa', 'rapa', '0cc175b9c0f1b6a831c399e269772661', '2023-09-20 13:39:25', ''),
	(8, 'Juan', 'Quezon', 'Dela Cruz', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2023-05-30 11:48:05', '397728-PROF-1.PNG');
/*!40000 ALTER TABLE `tbl_users_2` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_violations
CREATE TABLE IF NOT EXISTS `tbl_violations` (
  `violation_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_name` varchar(50) NOT NULL,
  `violation_desc` varchar(150) NOT NULL,
  `violation_remarks` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`violation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_violations: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_violations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_violations` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
