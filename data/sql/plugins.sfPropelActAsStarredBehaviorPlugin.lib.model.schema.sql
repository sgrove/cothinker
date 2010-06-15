
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- star
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `star`;


CREATE TABLE `star`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`starred_model` VARCHAR(50)  NOT NULL,
	`starred_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `starred_index`(`starred_model`, `starred_id`),
	KEY `starred_uindex`(`starred_model`, `starred_id`, `user_id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
