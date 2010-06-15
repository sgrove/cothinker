
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_polls
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_polls`;


CREATE TABLE `sf_polls`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255),
	`description` TEXT,
	`is_published` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_polls_answers
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_polls_answers`;


CREATE TABLE `sf_polls_answers`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`poll_id` INTEGER,
	`name` VARCHAR(255),
	`votes` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `sf_polls_answers_FI_1` (`poll_id`),
	CONSTRAINT `sf_polls_answers_FK_1`
		FOREIGN KEY (`poll_id`)
		REFERENCES `sf_polls` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_polls_users_answers
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_polls_users_answers`;


CREATE TABLE `sf_polls_users_answers`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`poll_id` INTEGER,
	`answer_id` INTEGER,
	`user_id` INTEGER,
	`ip_address` VARCHAR(15),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `sf_polls_users_answers_FI_1` (`poll_id`),
	CONSTRAINT `sf_polls_users_answers_FK_1`
		FOREIGN KEY (`poll_id`)
		REFERENCES `sf_polls` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_polls_users_answers_FI_2` (`answer_id`),
	CONSTRAINT `sf_polls_users_answers_FK_2`
		FOREIGN KEY (`answer_id`)
		REFERENCES `sf_polls_answers` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
