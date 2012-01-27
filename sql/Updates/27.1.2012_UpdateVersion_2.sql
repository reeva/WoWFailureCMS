DROP TABLE IF EXISTS `version`;
CREATE TABLE IF NOT EXISTS `version` (
  `Name` text,
  `Number` varchar(10) DEFAULT NULL,
  `Revision` varchar(10) DEFAULT NULL,
  `DB_Version` varchar(50) DEFAULT NULL,
  `Updates` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This here shows you what Version of WoWFailureCMS you have.';

# Dumping data for table website.version: ~1 rows (approximately)
DELETE FROM `version`;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
REPLACE INTO `version` (`Name`, `Number`, `Revision`, `DB_Version`, `Updates`) VALUES ('AquaFlameCMS', 'v5', '150', 'v6', '2');
