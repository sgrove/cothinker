
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_recommendation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_recommendation`;


CREATE TABLE `sf_recommendation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`recommendable_model` VARCHAR(50)  NOT NULL,
	`recommendable_id` VARCHAR(32)  NOT NULL,
	`score` INTEGER,
	PRIMARY KEY (`id`),
	KEY `recommendable_index`(`recommendable_model`, `recommendable_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_user_recommendation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_user_recommendation`;


CREATE TABLE `sf_user_recommendation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`recommendable_model` VARCHAR(50)  NOT NULL,
	`recommendable_id` VARCHAR(32)  NOT NULL,
	`user_id` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `recommendable_index`(`recommendable_model`, `recommendable_id`),
	INDEX `sf_user_recommendation_FI_1` (`user_id`),
	CONSTRAINT `sf_user_recommendation_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
