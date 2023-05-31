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
  `ay_name` varchar(50) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_academic_year: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_academic_year` DISABLE KEYS */;
INSERT INTO `tbl_academic_year` (`ay_id`, `ay_name`, `date_added`) VALUES
	(2, 'aetaetasfasfafsfasfasf', '2023-05-31 09:06:33');
/*!40000 ALTER TABLE `tbl_academic_year` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_courses
CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_grade` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_courses: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_courses` DISABLE KEYS */;
INSERT INTO `tbl_courses` (`course_id`, `course_name`, `course_code`, `course_grade`, `date_added`) VALUES
	(5, 'tes', 'tse', 0, '2023-05-30 16:30:59');
/*!40000 ALTER TABLE `tbl_courses` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_offenses
CREATE TABLE IF NOT EXISTS `tbl_offenses` (
  `offense_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sanction_id` int(11) NOT NULL,
  `ay_id` int(11) NOT NULL,
  `offense_desc` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`offense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_offenses: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_offenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_offenses` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_sanctions
CREATE TABLE IF NOT EXISTS `tbl_sanctions` (
  `sanction_id` int(11) NOT NULL AUTO_INCREMENT,
  `sanction_name` varchar(50) NOT NULL,
  `sanction_desc` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sanction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_sanctions: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_sanctions` DISABLE KEYS */;
INSERT INTO `tbl_sanctions` (`sanction_id`, `sanction_name`, `sanction_desc`, `date_added`) VALUES
	(2, 'awet', 'awet', '2023-05-31 08:47:41');
/*!40000 ALTER TABLE `tbl_sanctions` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_students: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` (`student_id`, `student_code`, `student_fname`, `student_mname`, `student_lname`, `student_birthdate`, `student_gender`, `student_address`, `student_contact_num`, `course_id`, `date_added`) VALUES
	(4, 'awet', 'sawetawet', 'awet', 'awet', '2023-05-25', 'Male', 'awet', '', 5, '2023-05-31 08:47:32');
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_users: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `username`, `password`, `date_added`) VALUES
	(1, 'roger', 'd', 'g', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2023-05-30 12:26:31'),
	(27, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-05-31 10:41:43'),
	(28, 'a', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-05-31 10:42:59'),
	(29, 'aa', 's', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-05-31 10:43:04'),
	(30, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-05-31 10:46:35'),
	(31, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-05-31 10:46:55'),
	(32, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-05-31 10:57:40');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for table osa_db.tbl_violations
CREATE TABLE IF NOT EXISTS `tbl_violations` (
  `violation_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_name` varchar(50) NOT NULL,
  `violation_desc` varchar(150) NOT NULL,
  `violation_remarks` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`violation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table osa_db.tbl_violations: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_violations` DISABLE KEYS */;
INSERT INTO `tbl_violations` (`violation_id`, `violation_name`, `violation_desc`, `violation_remarks`, `date_added`) VALUES
	(3, 'test', 'set', 'test', '2023-05-31 08:47:12');
/*!40000 ALTER TABLE `tbl_violations` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
