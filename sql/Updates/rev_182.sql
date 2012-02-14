CREATE TABLE `realms`(  
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `realmid` INT(10),
  `world_db` VARCHAR(255) NOT NULL DEFAULT 'world',
  `char_db` VARCHAR(255) NOT NULL DEFAULT 'chars',
  PRIMARY KEY (`id`)
);
UPDATE `version` SET `Revision`='182' WHERE `Name`='AquaFlameCMS';