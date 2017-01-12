ALTER TABLE `members`
	ALTER `policyno` DROP DEFAULT;
ALTER TABLE `members`
	CHANGE COLUMN `policyno` `policyno` INT(11) NOT NULL AFTER `premiumbilled`;
