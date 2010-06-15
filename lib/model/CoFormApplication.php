<?php

/**
 * Subclass for representing a row from the 'ct_form_application' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CoFormApplication extends BaseCoFormApplication
{
    public function __toString()
    {
        return $this->getName();
    }
}

$xyz = array('from'   => CoFormApplicationPeer::NAME, 'to'     => CoFormApplicationPeer::SLUG);

sfPropelBehavior::add('CoFormApplication', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('CoFormApplication', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('CoFormApplication', array('sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('CoFormApplication', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));