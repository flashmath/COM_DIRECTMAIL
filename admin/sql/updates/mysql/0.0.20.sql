ALTER TABLE`#__directmail` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0' AFTER `id`;
ALTER TABLE `#__directmail` ADD COLUMN `catid` int(11) NOT NULL DEFAULT '0';