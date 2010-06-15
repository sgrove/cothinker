<?php

/**
 * Subclass for representing a row from the 'ct_position_application' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PositionApplication extends BasePositionApplication
{
}

sfPropelBehavior::add('PositionApplication', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('PositionApplication', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('PositionApplication', array('sfPropelActAsStarredBehavior'));
