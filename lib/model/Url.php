<?php

/**
 * Subclass for representing a row from the 'ct_url' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Url extends BaseUrl
{
  public function __toString()
  {
    return $this->getUrl();
  }
}

sfPropelBehavior::add('Url', array('sfPropelUuidBehavior'));