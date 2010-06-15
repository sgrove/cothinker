<?php

/**
 * Subclass for representing a row from the 'ct_campus' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Campus extends BaseCampus
{
  public function __toString()
  {
    return $this->getName();
  }
  
  public function getAboutBrief($length = 100)
  {
    if (strlen($this->getAbout()) > ($length + 3))
    {
      return substr($this->getAbout(), 0, $length).'...';
    }
    return $this->getAbout();
  }
}

$columns_map = array('from'   => CampusPeer::NAME,
                     'to'     => CampusPeer::SLUG);

sfPropelBehavior::add('Campus', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $columns_map, 
                            'separator' => '_', 
                            'permanent' => false)));

sfPropelBehavior::add('Campus', array('sfPropelUuidBehavior'));