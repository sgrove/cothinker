<?php

/**
 * Subclass for representing a row from the 'ct_user_task' table.
 *
 * 
 *
 * @package lib.model
 */ 
class UserTask extends BaseUserTask
{
}

sfPropelBehavior::add('UserTask', array('sfPropelUuidBehavior'));