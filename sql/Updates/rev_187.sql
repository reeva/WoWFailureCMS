ALTER TABLE `video_comments` RENAME TO `media_comments`,
  CHANGE COLUMN `videoid` `mediaid` INT(10) NOT NULL,
  MODIFY COLUMN `accountId` INT(10) NOT NULL;

UPDATE `version` SET `Revision`='187' WHERE `Name`='AquaFlameCMS';