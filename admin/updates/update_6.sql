ALTER TABLE `genders`
	ALTER `update` DROP DEFAULT,
	ALTER `created` DROP DEFAULT;
ALTER TABLE `genders`
	CHANGE COLUMN `update` `update` DATETIME NULL AFTER `title`,
	CHANGE COLUMN `created` `created` DATETIME NULL AFTER `update`;

ALTER TABLE `genders`
	CHANGE COLUMN `update` `updated` DATETIME NULL DEFAULT NULL AFTER `title`;
	
ALTER TABLE `members`
	CHANGE COLUMN `firstnames` `firstname` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci' AFTER `id`;
	
ALTER TABLE `spouses`
	DROP COLUMN `entrydate`;
	ALTER `gender` DROP DEFAULT;
	CHANGE COLUMN `gender` `gender_id` INT(11) NOT NULL COLLATE 'utf8_unicode_ci' AFTER `dateofbirth`;
	ADD COLUMN `category_id` INT(11) NOT NULL AFTER `gender_id`,
	ADD COLUMN `address` VARCHAR(256) NULL DEFAULT NULL AFTER `category_id`;
	ADD COLUMN `telnr` VARCHAR(100) NULL DEFAULT NULL AFTER `address`,
	ADD COLUMN `cellnr` VARCHAR(100) NULL DEFAULT NULL AFTER `telnr`;
	ADD COLUMN `updated` DATETIME NULL DEFAULT NULL AFTER `waitingperiod`,
	ADD COLUMN `created` DATETIME NULL DEFAULT NULL AFTER `updated`;

ALTER TABLE `members`
	ADD COLUMN `linked_spouse` INT NULL DEFAULT '0' AFTER `waitingperiod`,
	ADD COLUMN `linked_dependants` INT NULL DEFAULT '0' AFTER `linked_spouse`;
	
ALTER TABLE `spouses`
	CHANGE COLUMN `firstnames` `firstname` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci' AFTER `id`;


	


