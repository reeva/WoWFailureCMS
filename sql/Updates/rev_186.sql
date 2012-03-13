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

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) DEFAULT 0 NOT NULL,
  `date` timestamp NOT NULL,
  `id_url` text,
  `title` text,
  `description` text,
  `comments` int(10) DEFAULT '0',
  `url` varchar(255),
  `visible` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

insert  into `videos`(`date`,`id_url`,`title`,`description`,`url`,`visible`) values 
('2012-03-12 01:59:00','-E5M3X-1KP0','CATACLYSM (Español - España) - World of Warcraft','Trailer de la tercera expansión de World of Warcraft que vería la luz a finales de este año 2010.</br>Esta expansión supone un gran cambio para todo el continente de Azeroth, que ha visto como un poder en el que esta como un implicado más Neltharion/Deathwing (Ala de Muerte) ha sacudido los cimientos del mundo, creando una gran devastación que ha transformado todo el planeta.','http://www.youtube.com/watch?v=-E5M3X-1KP0','1'),
('2012-03-12 01:59:00','CARC72zF7UI','World of Warcraft - Cinemáticas','Video de prueba','http://www.youtube.com/watch?v=CARC72zF7UI','1'),
('2012-03-12 01:59:00','dYK_Gqyf48Y','World of Warcraft - Cinematic Trailer','Trailers varios','http://www.youtube.com/watch?v=dYK_Gqyf48Y','1'),
('2012-03-12 01:59:00','IBHL_-biMrQ','World of Warcraft: The Burning Crusade','Trailer de Burning Crusade','http://www.youtube.com/watch?v=IBHL_-biMrQ','1');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `video_comments`;

CREATE TABLE `video_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `videoid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL DEFAULT '1337',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
=======
DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) DEFAULT 0 NOT NULL,
  `date` timestamp NOT NULL,
  `id_url` text,
  `title` text,
  `description` text,
  `comments` int(10) DEFAULT '0',
  `url` varchar(255),
  `visible` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

insert  into `videos`(`date`,`id_url`,`title`,`description`,`url`,`visible`) values 
('2012-03-12 01:59:00','-E5M3X-1KP0','CATACLYSM (Español - España) - World of Warcraft','Trailer de la tercera expansión de World of Warcraft que vería la luz a finales de este año 2010.</br>Esta expansión supone un gran cambio para todo el continente de Azeroth, que ha visto como un poder en el que esta como un implicado más Neltharion/Deathwing (Ala de Muerte) ha sacudido los cimientos del mundo, creando una gran devastación que ha transformado todo el planeta.','http://www.youtube.com/watch?v=-E5M3X-1KP0','1'),
('2012-03-12 01:59:00','CARC72zF7UI','World of Warcraft - Cinemáticas','Video de prueba','http://www.youtube.com/watch?v=CARC72zF7UI','1'),
('2012-03-12 01:59:00','dYK_Gqyf48Y','World of Warcraft - Cinematic Trailer','Trailers varios','http://www.youtube.com/watch?v=dYK_Gqyf48Y','1'),
('2012-03-12 01:59:00','IBHL_-biMrQ','World of Warcraft: The Burning Crusade','Trailer de Burning Crusade','http://www.youtube.com/watch?v=IBHL_-biMrQ','1');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `video_comments`;

CREATE TABLE `video_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `videoid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL DEFAULT '1337',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;