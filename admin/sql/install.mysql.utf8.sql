DROP TABLE IF EXISTS `#__directmail`;
 
CREATE TABLE `#__directmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` INT(10) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `answer` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `ordering` INTEGER NOT NULL DEFAULT 0,
  `catid` int(11) NOT NULL DEFAULT '0',
  `checked_out` INTEGER UNSIGNED NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
   `state` TINYINT(3) NOT NULL DEFAULT '0',
   PRIMARY KEY  (`id`),
   INDEX `idx_state` (`state`),
   INDEX `idx_catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;