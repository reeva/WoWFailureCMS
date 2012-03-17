ALTER TABLE `users`   
  DROP COLUMN `character_realm`, 
  ADD COLUMN `char_realm` INT(10) DEFAULT 1 NOT NULL AFTER `donation_points`;