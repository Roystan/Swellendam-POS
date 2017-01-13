CREATE TABLE `reports` (
	`id` INT NOT NULL,
	`type` VARCHAR(20) NOT NULL,
	`from` DATE NOT NULL,
	`to` DATE NOT NULL,
	`active_id` INT NOT NULL,
	`created` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
