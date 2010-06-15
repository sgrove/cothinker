<?php

/**
 * Subclass for representing a row from the 'ct_subdepartment' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Subdepartment extends BaseSubdepartment
{
  public function __toString()
  {
    return $this->getName();
  }
}

sfPropelBehavior::add('Subdepartment', array('sfPropelUuidBehavior'));