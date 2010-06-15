<?php

/**
 * Subclass for representing a row from the 'ct_department' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Department extends BaseDepartment
{
  public function __toString()
  {
    return $this->getName();
  }
}

sfPropelBehavior::add('Department', array('sfPropelUuidBehavior'));

$xyz = array('from'   => DepartmentPeer::NAME, 'to'     => DepartmentPeer::SLUG);

sfPropelBehavior::add('Department', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));

