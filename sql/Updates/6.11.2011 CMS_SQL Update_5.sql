ALTER TABLE `player_vote`  ADD COLUMN `ItemID_took` INT(10) NULL AFTER `Vote_Hour`;
ALTER TABLE `player_vote`  ADD COLUMN `Costs` INT(10) NULL AFTER `ItemID_took`;