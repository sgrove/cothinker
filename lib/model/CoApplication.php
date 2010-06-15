<?php

/**
 * Subclass for representing a row from the 'ct_application' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CoApplication extends BaseCoApplication
{
    public function __toString()
    {
        return '['.$this->getCoFormApplication().']:['.$this->getsfGuardUser().']';
    }
}

sfPropelBehavior::add('CoApplication', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('CoApplication', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('CoApplication', array('sfPropelActAsTaggableBehavior'));
