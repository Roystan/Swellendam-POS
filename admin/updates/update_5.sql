CREATE TABLE `categories` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(20) NOT NULL,
	`updated` DATETIME NULL DEFAULT NULL,
	`created` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;

INSERT INTO `categories` (`id`, `title`, `updated`, `created`) VALUES (1, 'Single', NULL, '2016-01-06 19:14:33');
INSERT INTO `categories` (`id`, `title`, `updated`, `created`) VALUES (2, 'Family', NULL, '2016-01-06 19:14:44');

ALTER TABLE `members`
	ADD COLUMN `category_id` INT(11) NULL DEFAULT NULL AFTER `gender_id`;
	
ALTER TABLE `members`
	CHANGE COLUMN `coveramount` `coveramount` INT(11) NULL DEFAULT '0' AFTER `waitingperiod`,
	ADD COLUMN `premium` INT(11) NULL DEFAULT '0' AFTER `coveramount`;
	
ALTER TABLE `members`
	DROP COLUMN `category`;


