ALTER TABLE `payments`
	ADD COLUMN `date_to` DATE NULL DEFAULT NULL AFTER `date_for`;
		ADD COLUMN `months` INT NOT NULL DEFAULT '1' AFTER `amount_received`;