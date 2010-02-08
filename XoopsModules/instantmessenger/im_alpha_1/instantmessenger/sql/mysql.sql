CREATE TABLE `instantmessenger_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_from` varchar(255) NOT NULL,
  `_to` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;