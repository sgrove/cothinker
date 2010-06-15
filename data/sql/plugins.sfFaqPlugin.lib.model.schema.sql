
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_faq_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_faq_category`;


CREATE TABLE `sf_faq_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`description` TEXT,
	`activate` INTEGER default 1,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_faq_faq
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_faq_faq`;


CREATE TABLE `sf_faq_faq`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`question` VARCHAR(255),
	`answer` TEXT,
	`category_id` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `sf_faq_faq_FI_1` (`category_id`),
	CONSTRAINT `sf_faq_faq_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `sf_faq_category` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
