
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `photo`;


CREATE TABLE `photo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`entity` VARCHAR(255),
	`entity_id` INTEGER,
	`name` VARCHAR(255),
	`mime_type` VARCHAR(255),
	`size` INTEGER,
	`suffix` VARCHAR(255),
	`title` VARCHAR(255),
	`description` TEXT,
	`rank` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
