<?php

/**
 * Subclass for representing a row from the 'ct_form' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CoForm extends BaseCoForm
{
    public function __toString()
    {
        return $this->getName();
    }
}

$xyz = array('from'   => CoFormPeer::NAME, 'to'     => CoFormPeer::SLUG);

sfPropelBehavior::add('CoForm', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('CoForm', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('CoForm', array('sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('CoForm', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));