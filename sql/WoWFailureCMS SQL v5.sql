/*
SQLyog Community v9.50 
MySQL - 5.5.8 : Database - failure
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`failure` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `site`;

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newsid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL DEFAULT '1337',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

/*  Data  */
insert  into `community_slides`(`id`,`desc`,`title`,`url`,`date`,`image`) values (1,'Testing WoWFailureCMS at maximum capacity.','Testing WoWFailureCMS','#','2011-04-20','4ZONJ2G8H02S1291403588642.jpg'),(2,'Find us on WoWFailureCore.org.','Where to find us?','#','2011-04-20','3A016YGNDN971281040709386.jpg'),(3,'Check The Forum for the latest updates.','WoWFailureCMS Forum','#','2011-04-20','HXW8I6KL6MRK1290045863003.jpg'),(4,'test','test','#','2011-04-20','TE943VAV1IVZ1290560963083.jpg');

/*Table structure for table `community_slides` */
DROP TABLE IF EXISTS `community_slides`;

CREATE TABLE `community_slides` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '#',
  `date` date NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(11) unsigned DEFAULT NULL COMMENT 'Account ID',
  `country` varchar(50) DEFAULT NULL COMMENT 'The Country of Residence',
  `date` date DEFAULT NULL COMMENT 'Date of Birth',
  `year` year(4) DEFAULT NULL COMMENT 'Year of Birth',
  `security_question` char(4) DEFAULT NULL COMMENT 'Security Question from the Registration',
  `answer` varchar(50) DEFAULT NULL COMMENT 'Answer of the Security Question',
  `name` varchar(50) DEFAULT NULL COMMENT 'User''s Name',
  `lastname` varchar(50) DEFAULT NULL COMMENT 'User''s Last Name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `forum_blizzposts` */

DROP TABLE IF EXISTS `forum_blizzposts`;

CREATE TABLE `forum_blizzposts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `postid` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `forum_categ` */

DROP TABLE IF EXISTS `forum_categ`;

CREATE TABLE `forum_categ` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*  Data  */
insert  into `forum_categ`(`id`,`num`,`name`) values (1,1,'WoWFailureCMS');

/*Table structure for table `forum_forums` */
DROP TABLE IF EXISTS `forum_forums`;

CREATE TABLE `forum_forums` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) NOT NULL,
  `categ` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `locked` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*  Data  */
insert  into `forum_forums`(`id`,`num`,`categ`,`name`,`image`,`description`,`locked`) values (1,1,1,'Announcement','blizzard','All important messages/announcements/informations regarding WoWFailureCMS will be posted here.',1),(2,2,1,'General Talk','general','You can talk anything you want here :)',0),(3,3,1,'Bugs','bugs','Post here all bugs you find.',0),(4,4,1,'Suggestions','suggestions','Post here your ideas regarding WoWFailureCMS.',0);
/*Table structure for table `forum_replies` */

DROP TABLE IF EXISTS `forum_replies`;

CREATE TABLE `forum_replies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `threadid` int(10) NOT NULL,
  `content` text NOT NULL,
  `author` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `forumid` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `forum_threads` */

DROP TABLE IF EXISTS `forum_threads`;

CREATE TABLE `forum_threads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `forumid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` int(10) NOT NULL,
  `replies` int(10) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `content` text NOT NULL,
  `locked` tinyint(1) DEFAULT '0',
  `has_blizz` tinyint(1) DEFAULT '0',
  `prefix` varchar(255) NOT NULL DEFAULT 'none',
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `txn_id` varchar(32) DEFAULT NULL,
  `payer_email` varchar(64) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `info` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'FailZorD',
  `class` varchar(255) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL DEFAULT 'Unkown',
  `date` date NOT NULL,
  `content` text,
  `authorlnk` text,
  `contentlnk` text,
  `title` text,
  `comments` int(10) DEFAULT '0',
  `image` varchar(255) DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `player_vote` */

DROP TABLE IF EXISTS `player_vote`;

CREATE TABLE `player_vote` (
  `AccountID` int(10) DEFAULT NULL,
  `Account_IP` varchar(11) DEFAULT NULL,
  `Points` int(10) DEFAULT NULL,
  `Vote_Date` date DEFAULT NULL,
  `Vote_Hour` time DEFAULT NULL,
  `ItemID_took` int(10) DEFAULT NULL,
  `Costs` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='In this table the Account Points and reset are saved.';

/*Table structure for table `rewards` */

DROP TABLE IF EXISTS `rewards`;

CREATE TABLE `rewards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `server` int(10) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `item1` int(10) unsigned NOT NULL,
  `item2` int(10) unsigned NOT NULL,
  `item3` int(10) unsigned NOT NULL,
  `item4` int(10) unsigned NOT NULL,
  `item5` int(10) unsigned NOT NULL,
  `item6` int(10) unsigned NOT NULL,
  `item7` int(10) unsigned NOT NULL,
  `item8` int(10) unsigned NOT NULL,
  `gold` int(10) unsigned NOT NULL,
  `price` float unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `servers` */

DROP TABLE IF EXISTS `servers`;

CREATE TABLE `servers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `host` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `database` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `shouts` */

DROP TABLE IF EXISTS `shouts`;

CREATE TABLE `shouts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `body` longtext,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `slideshows` */

DROP TABLE IF EXISTS `slideshows`;

CREATE TABLE `slideshows` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*  DATA  */
insert  into `slideshows`(`id`,`title`,`description`,`image`,`link`) values (2,'WoWFailureCMS is Back!','This is your new awesome website. Please be sure to LEAVE THE FOOTER ALONE! Contact FailZorD from Bitbucket, if you want custom logos or images. Enjoy!','traveling_rocket.jpg','#'),(1,'Updates soon','I\'m gonna post some updates soon...','draenei.jpg','#');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) NOT NULL DEFAULT '0-0.jpg',
  `blizz` tinyint(1) DEFAULT '0',
  `class` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `character` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Table structure for table `version` */

DROP TABLE IF EXISTS `version`;

CREATE TABLE `version` (
  `Name` text,
  `Number` varchar(10) DEFAULT NULL,
  `Revision` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This here shows you what Version of WoWFailureCMS you have.';

/*  DATA  */
INSERT INTO `version` (`Name`, `Number`, `Revision`) VALUES ('AquaFlameCMS', '0.5.0', 'v5');
/*Table structure for table `vote` */

DROP TABLE IF EXISTS `vote`;

CREATE TABLE `vote` (
  `ID` int(10) DEFAULT NULL COMMENT 'ID has to be from 1 to 5',
  `Name` varchar(50) DEFAULT NULL COMMENT 'This is the Name of the Voting Site.',
  `Link` text COMMENT 'It must have http:// to work properly',
  `Description` text COMMENT 'Add the Description for the Voting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Table is all about the Infortmation for the Vote Panel.';

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
