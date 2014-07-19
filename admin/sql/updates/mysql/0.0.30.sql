DROP TABLE IF EXISTS `#__directmail_sub`;

CREATE TABLE `#__directmail_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_id` INT(10) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
   PRIMARY KEY  (`id`),
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;