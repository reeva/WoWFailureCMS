CREATE TABLE `vote` (
	`ID` INT(10) NULL DEFAULT NULL,
	`Name` VARCHAR(10) NULL,
	`Link` TEXT NULL,
	`Points` INT(11) NULL DEFAULT NULL,
	`Vote_Date` DATE NULL DEFAULT NULL
)
COMMENT='This Table is all about the Infortmation for the Vote Panel.'
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
ROW_FORMAT=DEFAULT

CREATE TABLE `version` (
	`Name` TEXT NULL,
	`Number` VARCHAR(10) NULL DEFAULT NULL,
	`Revision` VARCHAR(10) NULL DEFAULT NULL
)
COMMENT='This here shows you what Version of WoWFailureCMS you have.'
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
ROW_FORMAT=DEFAULT

CREATE TABLE `player_vote` (
	`AccountID` INT(10) NULL DEFAULT NULL,
	`Account_IP` VARCHAR(11) NULL DEFAULT NULL,
	`Points` INT(10) NULL DEFAULT NULL,
	`Vote_Date` DATE NULL DEFAULT NULL,
	`Vote_Hour` TIME NULL DEFAULT NULL
)
COMMENT='In this table the Account Points and reset are saved.'
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
ROW_FORMAT=DEFAULT
