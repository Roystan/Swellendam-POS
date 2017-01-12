CREATE TABLE `relationships` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`updated` DATETIME NULL DEFAULT NULL,
	`created` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;

INSERT INTO `relationships` (`id`, `title`, `updated`, `created`) VALUES (1, 'child', '2016-01-05 00:54:58', '2016-01-05 00:55:00');
INSERT INTO `relationships` (`id`, `title`, `updated`, `created`) VALUES (2, 'sister', '2016-01-05 00:55:19', '2016-01-05 00:55:17');
INSERT INTO `relationships` (`id`, `title`, `updated`, `created`) VALUES (3, 'brother', '2016-01-05 00:55:35', '2016-01-05 00:55:33');
INSERT INTO `relationships` (`id`, `title`, `updated`, `created`) VALUES (4, 'mother', '2016-01-05 00:55:55', '2016-01-05 00:55:53');
INSERT INTO `relationships` (`id`, `title`, `updated`, `created`) VALUES (5, 'father', '2016-01-05 00:56:32', '2016-01-05 00:56:30');
INSERT INTO `relationships` (`id`, `title`, `updated`, `created`) VALUES (6, 'other', '2016-01-05 00:56:35', '2016-01-05 00:56:33');
