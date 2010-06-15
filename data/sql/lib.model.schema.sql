
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`uuid` VARCHAR(36)  NOT NULL,
	`campus_id` INTEGER  NOT NULL,
	`department_id` INTEGER  NOT NULL,
	`subdepartment_id` INTEGER,
	`first_name` VARCHAR(100),
	`last_name` VARCHAR(100),
	`title` VARCHAR(100),
	`gender` INTEGER,
	`about` TEXT,
	`primary_email` VARCHAR(100),
	`picture` VARCHAR(255),
	`rating` FLOAT,
	`rating_count` INTEGER,
	`privacy_level` INTEGER,
	`private_key` VARCHAR(36),
	`karma` INTEGER,
	`version` INTEGER,
	`is_approved` INTEGER,
	`token` VARCHAR(255),
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_profile_FI_2` (`campus_id`),
	CONSTRAINT `sf_guard_user_profile_FK_2`
		FOREIGN KEY (`campus_id`)
		REFERENCES `ct_campus` (`id`),
	INDEX `sf_guard_user_profile_FI_3` (`department_id`),
	CONSTRAINT `sf_guard_user_profile_FK_3`
		FOREIGN KEY (`department_id`)
		REFERENCES `ct_department` (`id`),
	INDEX `sf_guard_user_profile_FI_4` (`subdepartment_id`),
	CONSTRAINT `sf_guard_user_profile_FK_4`
		FOREIGN KEY (`subdepartment_id`)
		REFERENCES `ct_subdepartment` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_external_service
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_external_service`;


CREATE TABLE `ct_external_service`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`uuid` VARCHAR(36)  NOT NULL,
	`twitter_username` VARCHAR(255),
	`twitter_password` VARCHAR(30),
	`twitter_update` INTEGER,
	`twitter_status_update` INTEGER,
	`twitter_confirmed` INTEGER,
	`facebook_account` VARCHAR(255),
	`facebook_update` INTEGER,
	`facebook_confirmed` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `ct_external_service_FI_1` (`user_id`),
	CONSTRAINT `ct_external_service_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_user_setting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_user_setting`;


CREATE TABLE `ct_user_setting`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`user_id` INTEGER  NOT NULL,
	`title` TEXT,
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`status` INTEGER,
	`type` INTEGER,
	`value` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_user_setting_FI_1` (`user_id`),
	CONSTRAINT `ct_user_setting_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_contactinfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_contactinfo`;


CREATE TABLE `ct_contactinfo`
(
	`user_id` INTEGER  NOT NULL,
	`uuid` VARCHAR(36)  NOT NULL,
	`title` VARCHAR(255),
	`email` VARCHAR(100),
	`phone` VARCHAR(15),
	`address1` VARCHAR(100),
	`address2` VARCHAR(100),
	`city` VARCHAR(100),
	`state` VARCHAR(100),
	`postal` VARCHAR(100),
	`published` INTEGER,
	`privacy_level` INTEGER,
	`deleted_at` DATETIME,
	`version` INTEGER,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `ct_contactinfo_FI_1` (`user_id`),
	CONSTRAINT `ct_contactinfo_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_campus
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_campus`;


CREATE TABLE `ct_campus`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`name` VARCHAR(50)  NOT NULL,
	`slug` VARCHAR(255)  NOT NULL,
	`address` VARCHAR(255),
	`city` VARCHAR(255),
	`state` VARCHAR(2),
	`zip` VARCHAR(5),
	`url` VARCHAR(255),
	`phone` VARCHAR(15),
	`email` VARCHAR(50)  NOT NULL,
	`about` TEXT,
	`version` INTEGER,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_department
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_department`;


CREATE TABLE `ct_department`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`name` VARCHAR(50)  NOT NULL,
	`abbreviation` VARCHAR(10),
	`slug` VARCHAR(255)  NOT NULL,
	`version` INTEGER,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_subdepartment
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_subdepartment`;


CREATE TABLE `ct_subdepartment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`department_id` INTEGER  NOT NULL,
	`name` VARCHAR(50)  NOT NULL,
	`abbreviation` VARCHAR(10),
	`slug` VARCHAR(255)  NOT NULL,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_subdepartment_FI_1` (`department_id`),
	CONSTRAINT `ct_subdepartment_FK_1`
		FOREIGN KEY (`department_id`)
		REFERENCES `ct_department` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_did_you_know
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_did_you_know`;


CREATE TABLE `ct_did_you_know`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`title` VARCHAR(255),
	`text` TEXT,
	`slug` VARCHAR(255)  NOT NULL,
	`version` INTEGER,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_project
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_project`;


CREATE TABLE `ct_project`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(5)  NOT NULL,
	`created_by` INTEGER,
	`owner_id` INTEGER  NOT NULL,
	`department_id` INTEGER  NOT NULL,
	`campus_id` INTEGER,
	`title` VARCHAR(255),
	`picture` VARCHAR(255),
	`slug` VARCHAR(255),
	`description` TEXT,
	`notes` TEXT,
	`keywords` TEXT,
	`begin` DATE,
	`finish` DATE,
	`budget` INTEGER,
	`status` INTEGER,
	`applications` INTEGER,
	`season` INTEGER,
	`year` DATE,
	`scale` INTEGER,
	`commitment` INTEGER,
	`goals` INTEGER,
	`goals_complete` INTEGER,
	`hours_weekly` INTEGER,
	`hours_total` INTEGER,
	`published` INTEGER,
	`flagged_aup` INTEGER,
	`flagged_help` INTEGER,
	`main_form` VARCHAR(255),
	`is_approved` INTEGER,
	`hits` INTEGER,
	`version` INTEGER,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_project_FI_1` (`created_by`),
	CONSTRAINT `ct_project_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `ct_project_FI_2` (`owner_id`),
	CONSTRAINT `ct_project_FK_2`
		FOREIGN KEY (`owner_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_project_FI_3` (`department_id`),
	CONSTRAINT `ct_project_FK_3`
		FOREIGN KEY (`department_id`)
		REFERENCES `ct_department` (`id`),
	INDEX `ct_project_FI_4` (`campus_id`),
	CONSTRAINT `ct_project_FK_4`
		FOREIGN KEY (`campus_id`)
		REFERENCES `ct_campus` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_project_application
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_project_application`;


CREATE TABLE `ct_project_application`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(5)  NOT NULL,
	`created_by` INTEGER,
	`owner_id` INTEGER  NOT NULL,
	`department_id` INTEGER  NOT NULL,
	`campus_id` INTEGER,
	`title` VARCHAR(255),
	`picture` VARCHAR(255),
	`slug` VARCHAR(255),
	`description` TEXT,
	`notes` TEXT,
	`community_benefits` TEXT,
	`student_reasons` TEXT,
	`keywords` TEXT,
	`begin` DATE,
	`finish` DATE,
	`budget` INTEGER,
	`status` INTEGER,
	`applications` INTEGER,
	`season` INTEGER,
	`length` INTEGER,
	`preferred_term_length` INTEGER,
	`year` DATE,
	`scale` INTEGER,
	`commitment` INTEGER,
	`goals` INTEGER,
	`goals_complete` INTEGER,
	`hours_weekly` INTEGER,
	`hours_total` INTEGER,
	`published` INTEGER,
	`flagged_aup` INTEGER,
	`flagged_help` INTEGER,
	`page1_complete` INTEGER,
	`page2_complete` INTEGER,
	`page3_complete` INTEGER,
	`page4_complete` INTEGER,
	`liability` INTEGER,
	`liability_details` TEXT,
	`profit` INTEGER,
	`profit_details` TEXT,
	`is_approved` INTEGER,
	`points` INTEGER,
	`approved_by` VARCHAR(36),
	`hits` INTEGER,
	`version` INTEGER,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_project_application_FI_1` (`created_by`),
	CONSTRAINT `ct_project_application_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `ct_project_application_FI_2` (`owner_id`),
	CONSTRAINT `ct_project_application_FK_2`
		FOREIGN KEY (`owner_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_project_application_FI_3` (`department_id`),
	CONSTRAINT `ct_project_application_FK_3`
		FOREIGN KEY (`department_id`)
		REFERENCES `ct_department` (`id`),
	INDEX `ct_project_application_FI_4` (`campus_id`),
	CONSTRAINT `ct_project_application_FK_4`
		FOREIGN KEY (`campus_id`)
		REFERENCES `ct_campus` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_project_setting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_project_setting`;


CREATE TABLE `ct_project_setting`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`project_id` INTEGER  NOT NULL,
	`uuid` VARCHAR(36)  NOT NULL,
	`group` VARCHAR(255),
	`title` VARCHAR(255),
	`setting` TEXT,
	`description` TEXT,
	PRIMARY KEY (`id`),
	INDEX `ct_project_setting_FI_1` (`project_id`),
	CONSTRAINT `ct_project_setting_FK_1`
		FOREIGN KEY (`project_id`)
		REFERENCES `ct_project` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_project_form
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_project_form`;


CREATE TABLE `ct_project_form`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`project_id` INTEGER  NOT NULL,
	`uuid` VARCHAR(36)  NOT NULL,
	`title` VARCHAR(255),
	`setting` TEXT,
	`description` TEXT,
	`widget_1` VARCHAR(255),
	`wigest_1_setting` TEXT,
	`widget_2` VARCHAR(255),
	`wigest_2_setting` TEXT,
	`widget_3` VARCHAR(255),
	`wigest_3_setting` TEXT,
	`widget_4` VARCHAR(255),
	`wigest_4_setting` TEXT,
	PRIMARY KEY (`id`),
	INDEX `ct_project_form_FI_1` (`project_id`),
	CONSTRAINT `ct_project_form_FK_1`
		FOREIGN KEY (`project_id`)
		REFERENCES `ct_project` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_user_vote
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_user_vote`;


CREATE TABLE `ct_user_vote`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`user_id` INTEGER,
	`vote` INTEGER,
	`type` VARCHAR(255)  NOT NULL,
	`points` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `ct_user_vote_FI_1` (`user_id`),
	CONSTRAINT `ct_user_vote_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_project_position
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_project_position`;


CREATE TABLE `ct_project_position`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(5)  NOT NULL,
	`project_id` INTEGER  NOT NULL,
	`user_id` INTEGER,
	`title` VARCHAR(255)  NOT NULL,
	`qualifications` TEXT  NOT NULL,
	`description` TEXT  NOT NULL,
	`deadline` DATE,
	`weekly_hours` INTEGER,
	`status` INTEGER,
	`filled` INTEGER,
	`milestone_count` INTEGER,
	`campus_preference` INTEGER,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_project_position_FI_1` (`project_id`),
	CONSTRAINT `ct_project_position_FK_1`
		FOREIGN KEY (`project_id`)
		REFERENCES `ct_project` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_project_position_FI_2` (`user_id`),
	CONSTRAINT `ct_project_position_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_project_position_FI_3` (`campus_preference`),
	CONSTRAINT `ct_project_position_FK_3`
		FOREIGN KEY (`campus_preference`)
		REFERENCES `ct_campus` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_position_milestone
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_position_milestone`;


CREATE TABLE `ct_position_milestone`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`position_id` INTEGER  NOT NULL,
	`title` VARCHAR(255)  NOT NULL,
	`description` TEXT  NOT NULL,
	`deliverables` TEXT  NOT NULL,
	`deadline` DATE,
	`status` INTEGER,
	`rank` INTEGER,
	`filled` INTEGER,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_position_milestone_FI_1` (`position_id`),
	CONSTRAINT `ct_position_milestone_FK_1`
		FOREIGN KEY (`position_id`)
		REFERENCES `ct_project_position` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_project_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_project_user`;


CREATE TABLE `ct_project_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(8)  NOT NULL,
	`user_id` INTEGER,
	`position_id` INTEGER  NOT NULL,
	`total_hours` INTEGER,
	`position` INTEGER,
	`status` INTEGER,
	`is_approved` INTEGER,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_project_user_FI_1` (`user_id`),
	CONSTRAINT `ct_project_user_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_project_user_FI_2` (`position_id`),
	CONSTRAINT `ct_project_user_FK_2`
		FOREIGN KEY (`position_id`)
		REFERENCES `ct_project_position` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_task_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_task_user`;


CREATE TABLE `ct_task_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`task_id` INTEGER  NOT NULL,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_task_user_FI_1` (`user_id`),
	CONSTRAINT `ct_task_user_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_task_user_FI_2` (`task_id`),
	CONSTRAINT `ct_task_user_FK_2`
		FOREIGN KEY (`task_id`)
		REFERENCES `ct_task` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_task
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_task`;


CREATE TABLE `ct_task`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(6)  NOT NULL,
	`project_id` INTEGER  NOT NULL,
	`owner_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`begin` DATETIME,
	`finish` DATETIME,
	`status` INTEGER,
	`context` VARCHAR(50),
	`priority` INTEGER,
	`privileged` INTEGER,
	`version` INTEGER,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_task_FI_1` (`project_id`),
	CONSTRAINT `ct_task_FK_1`
		FOREIGN KEY (`project_id`)
		REFERENCES `ct_project` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_task_FI_2` (`owner_id`),
	CONSTRAINT `ct_task_FK_2`
		FOREIGN KEY (`owner_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_user_todo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_user_todo`;


CREATE TABLE `ct_user_todo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`owner_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`begin` DATETIME,
	`finish` DATETIME,
	`status` INTEGER,
	`context` VARCHAR(50) default 'personal',
	`priority` INTEGER,
	`privileged` INTEGER,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_user_todo_FI_1` (`owner_id`),
	CONSTRAINT `ct_user_todo_FK_1`
		FOREIGN KEY (`owner_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_url
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_url`;


CREATE TABLE `ct_url`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`project_id` INTEGER  NOT NULL,
	`uuid` VARCHAR(36)  NOT NULL,
	`url` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`version` INTEGER,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_url_FI_1` (`project_id`),
	CONSTRAINT `ct_url_FK_1`
		FOREIGN KEY (`project_id`)
		REFERENCES `ct_project` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_message
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_message`;


CREATE TABLE `ct_message`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`public_id` VARCHAR(255)  NOT NULL,
	`owner_id` INTEGER  NOT NULL,
	`sender_id` INTEGER  NOT NULL,
	`recipient_id` INTEGER  NOT NULL,
	`subject` TEXT,
	`body` TEXT,
	`html_body` TEXT,
	`folder` VARCHAR(128),
	`read_at` DATETIME,
	`parent_id` VARCHAR(36),
	`message_type` INTEGER,
	`version` INTEGER,
	`is_hidden` INTEGER,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_message_FI_1` (`owner_id`),
	CONSTRAINT `ct_message_FK_1`
		FOREIGN KEY (`owner_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_message_FI_2` (`sender_id`),
	CONSTRAINT `ct_message_FK_2`
		FOREIGN KEY (`sender_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_message_FI_3` (`recipient_id`),
	CONSTRAINT `ct_message_FK_3`
		FOREIGN KEY (`recipient_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_history_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_history_group`;


CREATE TABLE `ct_history_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`public_title` VARCHAR(255),
	`version` INTEGER,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_history_group_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_history_group_user`;


CREATE TABLE `ct_history_group_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`history_group_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`version` INTEGER,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_history_group_user_FI_1` (`history_group_id`),
	CONSTRAINT `ct_history_group_user_FK_1`
		FOREIGN KEY (`history_group_id`)
		REFERENCES `ct_history_group` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_history_group_user_FI_2` (`user_id`),
	CONSTRAINT `ct_history_group_user_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_history_event
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_history_event`;


CREATE TABLE `ct_history_event`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`history_group_id` INTEGER  NOT NULL,
	`category` VARCHAR(255),
	`title` VARCHAR(255),
	`text` TEXT,
	`user_id` INTEGER,
	`slug` VARCHAR(255)  NOT NULL,
	`version` INTEGER,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_history_event_FI_1` (`history_group_id`),
	CONSTRAINT `ct_history_event_FK_1`
		FOREIGN KEY (`history_group_id`)
		REFERENCES `ct_history_group` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_history_event_FI_2` (`user_id`),
	CONSTRAINT `ct_history_event_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_social_connection
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_social_connection`;


CREATE TABLE `ct_social_connection`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36)  NOT NULL,
	`user1_id` INTEGER  NOT NULL,
	`user2_id` INTEGER  NOT NULL,
	`notes` TEXT,
	`status` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_social_connection_FI_1` (`user1_id`),
	CONSTRAINT `ct_social_connection_FK_1`
		FOREIGN KEY (`user1_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_social_connection_FI_2` (`user2_id`),
	CONSTRAINT `ct_social_connection_FK_2`
		FOREIGN KEY (`user2_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_file_gallery
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_file_gallery`;


CREATE TABLE `ct_file_gallery`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`group_id` VARCHAR(36),
	`uuid` VARCHAR(6),
	`entity` VARCHAR(255),
	`entity_id` INTEGER,
	`name` VARCHAR(255),
	`mime_type` VARCHAR(255),
	`size` INTEGER,
	`suffix` VARCHAR(255),
	`title` VARCHAR(255),
	`description` TEXT,
	`uploaded_by` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_file_gallery_FI_1` (`uploaded_by`),
	CONSTRAINT `ct_file_gallery_FK_1`
		FOREIGN KEY (`uploaded_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_featured_project
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_featured_project`;


CREATE TABLE `ct_featured_project`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`project_id` INTEGER  NOT NULL,
	`comment` TEXT,
	`slug` VARCHAR(255),
	`title` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_featured_project_FI_1` (`project_id`),
	CONSTRAINT `ct_featured_project_FK_1`
		FOREIGN KEY (`project_id`)
		REFERENCES `ct_project` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_suggest_feature
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_suggest_feature`;


CREATE TABLE `ct_suggest_feature`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`user_id` INTEGER  NOT NULL,
	`title` TEXT,
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`status` INTEGER,
	`type` INTEGER,
	`category` INTEGER,
	`feeling` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_suggest_feature_FI_1` (`user_id`),
	CONSTRAINT `ct_suggest_feature_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_panel_ui
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_panel_ui`;


CREATE TABLE `ct_panel_ui`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`title` TEXT,
	`description` TEXT,
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_cothink_contact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_cothink_contact`;


CREATE TABLE `ct_cothink_contact`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`user_id` INTEGER,
	`email` VARCHAR(255),
	`name` VARCHAR(255),
	`title` TEXT,
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`status` INTEGER,
	`type` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_cothink_contact_FI_1` (`user_id`),
	CONSTRAINT `ct_cothink_contact_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_field
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_field`;


CREATE TABLE `ct_field`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`form_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`status` INTEGER,
	`type` INTEGER,
	`position` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_field_FI_1` (`form_id`),
	CONSTRAINT `ct_field_FK_1`
		FOREIGN KEY (`form_id`)
		REFERENCES `ct_form` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_form
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_form`;


CREATE TABLE `ct_form`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`owner_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`status` INTEGER,
	`type` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_form_FI_1` (`owner_id`),
	CONSTRAINT `ct_form_FK_1`
		FOREIGN KEY (`owner_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_form_application
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_form_application`;


CREATE TABLE `ct_form_application`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`form_id` INTEGER  NOT NULL,
	`position_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`status` INTEGER,
	`type` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_form_application_FI_1` (`form_id`),
	CONSTRAINT `ct_form_application_FK_1`
		FOREIGN KEY (`form_id`)
		REFERENCES `ct_form` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_form_application_FI_2` (`position_id`),
	CONSTRAINT `ct_form_application_FK_2`
		FOREIGN KEY (`position_id`)
		REFERENCES `ct_project_position` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_application
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_application`;


CREATE TABLE `ct_application`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`application_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`status` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_application_FI_1` (`application_id`),
	CONSTRAINT `ct_application_FK_1`
		FOREIGN KEY (`application_id`)
		REFERENCES `ct_form_application` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_application_FI_2` (`user_id`),
	CONSTRAINT `ct_application_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_application_field_entry
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_application_field_entry`;


CREATE TABLE `ct_application_field_entry`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`application_id` INTEGER  NOT NULL,
	`field_id` INTEGER  NOT NULL,
	`value` TEXT,
	`status` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_application_field_entry_FI_1` (`application_id`),
	CONSTRAINT `ct_application_field_entry_FK_1`
		FOREIGN KEY (`application_id`)
		REFERENCES `ct_application` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_application_field_entry_FI_2` (`field_id`),
	CONSTRAINT `ct_application_field_entry_FK_2`
		FOREIGN KEY (`field_id`)
		REFERENCES `ct_field` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_position_application
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_position_application`;


CREATE TABLE `ct_position_application`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`user_id` INTEGER  NOT NULL,
	`position_id` INTEGER  NOT NULL,
	`interest` TEXT,
	`qualification` TEXT,
	`notes` TEXT,
	`status` INTEGER,
	`read_at` DATETIME,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `ct_position_application_FI_1` (`user_id`),
	CONSTRAINT `ct_position_application_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `ct_position_application_FI_2` (`position_id`),
	CONSTRAINT `ct_position_application_FK_2`
		FOREIGN KEY (`position_id`)
		REFERENCES `ct_project_position` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- naho_wiki_wiki
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `naho_wiki_wiki`;


CREATE TABLE `naho_wiki_wiki`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`title` VARCHAR(255),
	`slug` VARCHAR(255),
	`model` VARCHAR(255),
	`model_id` INTEGER,
	`standalone` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- naho_wiki_page
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `naho_wiki_page`;


CREATE TABLE `naho_wiki_page`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`wiki_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	`latest_revision` INTEGER default 1 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `naho_wiki_page_FI_1` (`wiki_id`),
	CONSTRAINT `naho_wiki_page_FK_1`
		FOREIGN KEY (`wiki_id`)
		REFERENCES `naho_wiki_wiki` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- naho_wiki_content
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `naho_wiki_content`;


CREATE TABLE `naho_wiki_content`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`content` TEXT,
	`gz_content` LONGBLOB,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- naho_wiki_revision
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `naho_wiki_revision`;


CREATE TABLE `naho_wiki_revision`
(
	`created_at` DATETIME,
	`page_id` INTEGER  NOT NULL,
	`revision` INTEGER default 1 NOT NULL,
	`user_name` VARCHAR(255)  NOT NULL,
	`comment` VARCHAR(255),
	`content_id` INTEGER  NOT NULL,
	PRIMARY KEY (`page_id`,`revision`,`content_id`),
	CONSTRAINT `naho_wiki_revision_FK_1`
		FOREIGN KEY (`page_id`)
		REFERENCES `naho_wiki_page` (`id`)
		ON DELETE CASCADE,
	INDEX `naho_wiki_revision_FI_2` (`content_id`),
	CONSTRAINT `naho_wiki_revision_FK_2`
		FOREIGN KEY (`content_id`)
		REFERENCES `naho_wiki_content` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_simple_forum_owner_object
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_simple_forum_owner_object`;


CREATE TABLE `sf_simple_forum_owner_object`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`title` VARCHAR(255),
	`slug` VARCHAR(255),
	`model` VARCHAR(255),
	`model_id` INTEGER,
	`standalone` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_simple_forum_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_simple_forum_category`;


CREATE TABLE `sf_simple_forum_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`owner_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	`stripped_name` VARCHAR(255),
	`description` TEXT,
	`rank` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`owner_id`),
	INDEX `sf_simple_forum_category_FI_1` (`owner_id`),
	CONSTRAINT `sf_simple_forum_category_FK_1`
		FOREIGN KEY (`owner_id`)
		REFERENCES `sf_simple_forum_owner_object` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_simple_forum_topic
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_simple_forum_topic`;


CREATE TABLE `sf_simple_forum_topic`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255),
	`is_sticked` INTEGER default 0,
	`is_locked` INTEGER default 0,
	`forum_id` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`latest_post_id` INTEGER,
	`user_id` INTEGER,
	`stripped_title` VARCHAR(255),
	`nb_posts` BIGINT default 0,
	`nb_views` BIGINT default 0,
	PRIMARY KEY (`id`),
	INDEX `sf_simple_forum_topic_FI_1` (`forum_id`),
	CONSTRAINT `sf_simple_forum_topic_FK_1`
		FOREIGN KEY (`forum_id`)
		REFERENCES `sf_simple_forum_forum` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_simple_forum_topic_FI_2` (`latest_post_id`),
	CONSTRAINT `sf_simple_forum_topic_FK_2`
		FOREIGN KEY (`latest_post_id`)
		REFERENCES `sf_simple_forum_post` (`id`)
		ON DELETE SET NULL,
	INDEX `sf_simple_forum_topic_FI_3` (`user_id`),
	CONSTRAINT `sf_simple_forum_topic_FK_3`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_simple_forum_post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_simple_forum_post`;


CREATE TABLE `sf_simple_forum_post`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255),
	`content` TEXT,
	`topic_id` INTEGER,
	`user_id` INTEGER,
	`created_at` DATETIME,
	`forum_id` INTEGER,
	`author_name` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `sf_simple_forum_post_FI_1` (`topic_id`),
	CONSTRAINT `sf_simple_forum_post_FK_1`
		FOREIGN KEY (`topic_id`)
		REFERENCES `sf_simple_forum_topic` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_simple_forum_post_FI_2` (`user_id`),
	CONSTRAINT `sf_simple_forum_post_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_simple_forum_post_FI_3` (`forum_id`),
	CONSTRAINT `sf_simple_forum_post_FK_3`
		FOREIGN KEY (`forum_id`)
		REFERENCES `sf_simple_forum_forum` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_simple_forum_forum
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_simple_forum_forum`;


CREATE TABLE `sf_simple_forum_forum`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`description` TEXT,
	`rank` INTEGER,
	`category_id` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`stripped_name` VARCHAR(255),
	`latest_post_id` INTEGER,
	`nb_posts` BIGINT,
	`nb_topics` BIGINT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_simple_forum_forum_stripped_name_unique` (`stripped_name`),
	INDEX `sf_simple_forum_forum_FI_1` (`category_id`),
	CONSTRAINT `sf_simple_forum_forum_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `sf_simple_forum_category` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_simple_forum_forum_FI_2` (`latest_post_id`),
	CONSTRAINT `sf_simple_forum_forum_FK_2`
		FOREIGN KEY (`latest_post_id`)
		REFERENCES `sf_simple_forum_post` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_simple_forum_topic_view
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_simple_forum_topic_view`;


CREATE TABLE `sf_simple_forum_topic_view`
(
	`user_id` INTEGER  NOT NULL,
	`topic_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`user_id`,`topic_id`),
	CONSTRAINT `sf_simple_forum_topic_view_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_simple_forum_topic_view_FI_2` (`topic_id`),
	CONSTRAINT `sf_simple_forum_topic_view_FK_2`
		FOREIGN KEY (`topic_id`)
		REFERENCES `sf_simple_forum_topic` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ct_contact_message
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ct_contact_message`;


CREATE TABLE `ct_contact_message`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36),
	`name` VARCHAR(255),
	`email` VARCHAR(255),
	`message` TEXT,
	`title` TEXT,
	`slug` VARCHAR(255)  NOT NULL,
	`status` INTEGER,
	`type` INTEGER,
	`category` INTEGER,
	`feeling` INTEGER,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
