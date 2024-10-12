/* Create Database */
CREATE DATABASE userlitdb;

USE userlitdb;

/* Create Table */
CREATE TABLE `usertbl` (
`id` int(11) NOT NULL auto_increment,
`full_name` varchar(32) collate utf8_unicode_ci NOT NULL,
`email` varchar(32) collate utf8_unicode_ci NOT NULL,
`username` varchar(20) collate utf8_unicode_ci NOT NULL,
`password` varchar(32) collate utf8_unicode_ci NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;