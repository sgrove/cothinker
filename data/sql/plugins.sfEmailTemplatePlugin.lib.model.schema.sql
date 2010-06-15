
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_email_template
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_email_template`;


CREATE TABLE `sf_email_template`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50),
	`subject` VARCHAR(255),
	`body` TEXT,
	`text_body` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_tag_template
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_tag_template`;


CREATE TABLE `sf_tag_template`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30),
	`value` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
