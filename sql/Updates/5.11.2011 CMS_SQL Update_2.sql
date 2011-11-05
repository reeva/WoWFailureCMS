# Dumping structure for table site.player_vote
DROP TABLE IF EXISTS `player_vote`;
CREATE TABLE IF NOT EXISTS `player_vote` (
  `AccountID` int(10) DEFAULT NULL,
  `Account_IP` varchar(11) DEFAULT NULL,
  `Points` int(10) DEFAULT NULL,
  `Vote_Date` date DEFAULT NULL,
  `Vote_Hour` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='In this table the Account Points and reset are saved.';

# Dumping data for table site.player_vote: ~0 rows (approximately)
DELETE FROM `player_vote`;
/*!40000 ALTER TABLE `player_vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_vote` ENABLE KEYS */;

# Dumping structure for table site.version
DROP TABLE IF EXISTS `version`;
CREATE TABLE IF NOT EXISTS `version` (
  `Name` text,
  `Number` varchar(10) DEFAULT NULL,
  `Revision` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This here shows you what Version of WoWFailureCMS you have.';

# Dumping data for table site.version: ~1 rows (approximately)
DELETE FROM `version`;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
INSERT INTO `version` (`Name`, `Number`, `Revision`) VALUES
	('WoWFailure', '0.3.0', 'v1');
/*!40000 ALTER TABLE `version` ENABLE KEYS */;

# Dumping structure for table site.vote
DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `ID` int(10) DEFAULT NULL,
  `Link` text,
  `Points` int(11) DEFAULT NULL,
  `Vote_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Table is all about the Infortmation for the Vote Panel.';

# Dumping data for table site.vote: ~0 rows (approximately)
DELETE FROM `vote`;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;