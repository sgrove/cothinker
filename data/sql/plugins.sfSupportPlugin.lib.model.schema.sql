
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_ticket
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_ticket`;


CREATE TABLE `sf_ticket`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`sf_ticket_status_id` INTEGER,
	`subject` VARCHAR(255),
	`message` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `sf_ticket_FI_1` (`user_id`),
	CONSTRAINT `sf_ticket_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `sf_ticket_FI_2` (`sf_ticket_status_id`),
	CONSTRAINT `sf_ticket_FK_2`
		FOREIGN KEY (`sf_ticket_status_id`)
		REFERENCES `sf_ticket_status` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_ticket_thread
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_ticket_thread`;


CREATE TABLE `sf_ticket_thread`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`sf_ticket_id` INTEGER,
	`user_id` INTEGER,
	`message` TEXT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `sf_ticket_thread_FI_1` (`sf_ticket_id`),
	CONSTRAINT `sf_ticket_thread_FK_1`
		FOREIGN KEY (`sf_ticket_id`)
		REFERENCES `sf_ticket` (`id`),
	INDEX `sf_ticket_thread_FI_2` (`user_id`),
	CONSTRAINT `sf_ticket_thread_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_ticket_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_ticket_status`;


CREATE TABLE `sf_ticket_status`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20),
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
