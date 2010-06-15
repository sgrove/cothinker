<?php

/**
 * Subclass for representing a row from the 'ct_fields' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CoField extends BaseCoField
{
    public function __toString()
    {
        return '['.$this->getCoForm().']:['.$this->getName().']';
    }
}
$xyz = array('from'   => CoFieldPeer::NAME, 'to'     => CoFieldPeer::SLUG);
sfPropelBehavior::add('CoField', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('CoField', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('CoField', array('sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('CoField', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));