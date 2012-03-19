CREATE TABLE `prices`(  
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `service` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL DEFAULT 'vote',
  `vp` INT(10) DEFAULT 0,
  `dp` INT(10) DEFAULT 0,
  PRIMARY KEY (`id`)
);

ALTER TABLE `users`   
	ADD COLUMN `donation_points` INT(10) DEFAULT 0 NOT NULL AFTER `vote_points`;
	
UPDATE `version` SET `Revision`='188' WHERE `Name`='AquaFlameCMS';