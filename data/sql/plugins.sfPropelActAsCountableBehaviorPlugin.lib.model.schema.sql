
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_counter
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_counter`;


CREATE TABLE `sf_counter`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`countable_model` VARCHAR(30),
	`countable_id` INTEGER,
	`counter` INTEGER default 0,
	PRIMARY KEY (`id`),
	KEY `countable`(`countable_model`, `countable_id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
