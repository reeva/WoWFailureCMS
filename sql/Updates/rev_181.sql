ALTER TABLE `users`   
  ADD COLUMN `vote_points` INT(10) DEFAULT 0 NOT NULL AFTER `character`;

UPDATE `version` SET `Revision`='181' WHERE `Name`='AquaFlameCMS';

create table `votes` (
	`id` int (10),
	`userid` int (10),
	`date` datetime ,
	`voteid` int (10)
); 

drop table `player_vote`;