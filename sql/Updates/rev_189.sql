ALTER TABLE `realms`   
  ADD COLUMN `version` VARCHAR(15) DEFAULT '4.0.6a' NOT NULL AFTER `char_db`;
  ADD COLUMN `drop_rate` VARCHAR(5) DEFAULT '1x' NOT NULL AFTER `version`,
  ADD COLUMN `exp_rate` VARCHAR(5) DEFAULT '1x' NOT NULL AFTER `drop_rate`;