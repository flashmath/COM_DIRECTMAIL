ALTER TABLE `#__directmail` ADD COLUMN `state` TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE `#__directmail` ADD INDEX `idx_state` (`state`);
ALTER TABLE `#__directmail` ADD INDEX `idx_catid` (`catid`);
