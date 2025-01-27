-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.5.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table lms.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table lms.admin: ~1 rows (approximately)
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(0000000001, 'admin', 'admin');

-- Dumping structure for table lms.pre_order
CREATE TABLE IF NOT EXISTS `pre_order` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `resource_title` varchar(255) DEFAULT NULL,
  `resource_author` varchar(255) DEFAULT NULL,
  `resource_isbn` varchar(255) DEFAULT NULL,
  `resource_type` varchar(255) DEFAULT NULL,
  `request_date` timestamp NULL DEFAULT current_timestamp(),
  KEY `Index 1` (`req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table lms.pre_order: ~3 rows (approximately)
INSERT INTO `pre_order` (`req_id`, `user_id`, `resource_id`, `resource_title`, `resource_author`, `resource_isbn`, `resource_type`, `request_date`) VALUES
	(5, 1, 2, 'test', 'Test Author', '22', 'book', '2025-01-26 19:15:32'),
	(6, 1, 3, 'Harry potter ', 'Rawlings ', '258', 'book', '2025-01-26 19:15:36'),
	(7, 1, 4, 'tst2', 'Test Author', '223', 'book', '2025-01-26 19:15:41');

-- Dumping structure for table lms.resource
CREATE TABLE IF NOT EXISTS `resource` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `isbn` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `resource_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table lms.resource: ~3 rows (approximately)
INSERT INTO `resource` (`id`, `title`, `author`, `isbn`, `quantity`, `resource_type`) VALUES
	(2, 'test', 'Test Author', 22, 1, 'book'),
	(3, 'Harry potter ', 'Rawlings ', 258, 12, 'book'),
	(4, 'tst2', 'Test Author', 223, 1, 'book');

-- Dumping structure for table lms.student
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table lms.student: ~3 rows (approximately)
INSERT INTO `student` (`s_id`, `name`, `password`, `grade`) VALUES
	(1, 'student-01', '123', '12B'),
	(5, 'student-02', '123', '11A'),
	(6, 'Asrin Jumana', '124', 'A');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
