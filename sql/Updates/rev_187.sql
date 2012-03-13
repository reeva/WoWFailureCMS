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

UPDATE `version` SET `Revision`='187' WHERE `Name`='AquaFlameCMS';