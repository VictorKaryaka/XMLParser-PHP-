-- --------------------------------------------------------
-- Сервер:                       127.0.0.1
-- Версія сервера:               5.1.73-community - MySQL Community Server (GPL)
-- ОС сервера:                   Win32
-- HeidiSQL Версія:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for таблиця xmlParser_.category
CREATE TABLE IF NOT EXISTS `category` (
  `code_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `code_category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`code_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дані для експорту не вибрані


-- Dumping structure for таблиця xmlParser_.products
CREATE TABLE IF NOT EXISTS `products` (
  `code` varchar(50) NOT NULL,
  `code_category_id` int(11) NOT NULL,
  `article` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `basic_measure` varchar(50) DEFAULT NULL,
  `measure` varchar(50) DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `FK_products_category` (`code_category_id`),
  CONSTRAINT `FK_products_category` FOREIGN KEY (`code_category_id`) REFERENCES `category` (`code_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дані для експорту не вибрані
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
