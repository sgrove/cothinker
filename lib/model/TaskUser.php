<?php

/**
 * Subclass for representing a row from the 'ct_task_user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TaskUser extends BaseTaskUser
{
}

sfPropelBehavior::add('TaskUser', array('sfPropelUuidBehavior'));
