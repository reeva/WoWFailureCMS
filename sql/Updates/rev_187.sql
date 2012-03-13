DROP TABLE IF EXISTS `videos`;
DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `author` INT(10) NOT NULL DEFAULT '0',
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_url` VARCHAR(30) NOT NULL DEFAULT 0 COMMENT 'Just Youtube Videos',
  `title` TEXT CHARACTER SET latin1,
  `description` TEXT CHARACTER SET latin1,
  `comments` INT(10) DEFAULT '0',
  `link` VARCHAR(255) DEFAULT '#',
  `visible` INT(2) NOT NULL DEFAULT '0',
  `type` INT(2) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 video - 1 wallpapapers - 2 screenshots - 3 artwork - 4 comics',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `media`(`date`,`id_url`,`title`,`description`,`link`,`visible`,`type`) values 
('2012-03-12 01:59:00','-E5M3X-1KP0','CATACLYSM (Español - España) - World of Warcraft','Trailer of the third World of Warcraft Expansion.</br>This expansion supouse a big change for Azeroth, all the known world will change and the Deathwing`s rage will change the curse of the life.','http://www.youtube.com/watch?v=-E5M3X-1KP0','1','0'),
('2012-03-12 01:59:00','CARC72zF7UI','World of Warcraft - Cinemáticas','Normal Video','http://www.youtube.com/watch?v=CARC72zF7UI','1','0'),
('2012-03-12 01:59:00','dYK_Gqyf48Y','World of Warcraft - Cinematic Trailer','Some Trailers','http://www.youtube.com/watch?v=dYK_Gqyf48Y','1','0'),
('2012-03-12 01:59:00','IBHL_-biMrQ','World of Warcraft: The Burning Crusade','TBC Trailer','http://www.youtube.com/watch?v=IBHL_-biMrQ','1','0');


UPDATE `version` SET `Revision`='187' WHERE `Name`='AquaFlameCMS';