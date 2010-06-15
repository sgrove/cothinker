<?php

/**
 * Subclass for representing a row from the 'ct_history_group_user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class HistoryGroupUser extends BaseHistoryGroupUser
{
}

sfPropelBehavior::add('HistoryGroupUser', array('sfPropelUuidBehavior'));