DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` integer NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY(`id`)
) DEFAULT CHARSET utf8;

DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `id` varchar(50) NOT NULL,
  `osType` varchar(50) NOT NULL,
  `user_id` integer,
  PRIMARY KEY(`id`)
) DEFAULT CHARSET utf8;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` integer NOT NULL,
  `user_id` integer NOT NULL,
  `device_id` integer NOT NULL,
  `request_start_time` datetime NOT NULL,
  `request_end_time` datetime NOT NULL,
  `start_time` datetime,
  `end_time` datetime,
  PRIMARY KEY(`id`)
) DEFAULT CHARSET utf8;


