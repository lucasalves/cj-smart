-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.5.28 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4234
-- Date/time:                    2013-05-07 21:26:46
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bd_cj.tb_curso
CREATE TABLE IF NOT EXISTS `tb_curso` (
  `curso_id` int(10) NOT NULL AUTO_INCREMENT,
  `curso_nome` varchar(50) DEFAULT NULL,
  `curso_descricao` varchar(50) DEFAULT NULL,
  `curso_duracao` int(11) DEFAULT NULL,
  PRIMARY KEY (`curso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table bd_cj.tb_materia
CREATE TABLE IF NOT EXISTS `tb_materia` (
  `materia_id` int(10) NOT NULL AUTO_INCREMENT,
  `materia_nome` varchar(100) NOT NULL,
  `materia_codigo` varchar(50) NOT NULL,
  PRIMARY KEY (`materia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table bd_cj.tb_materia_curso
CREATE TABLE IF NOT EXISTS `tb_materia_curso` (
  `materia_curso_id` int(10) NOT NULL AUTO_INCREMENT,
  `materia_id` int(11) NOT NULL DEFAULT '0',
  `curso_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`materia_curso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
