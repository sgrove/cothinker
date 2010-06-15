<?php

/**
 * Subclass for representing a row from the 'ct_file_gallery' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfFileGallery extends BasesfFileGallery
{
  public function save($conn = null)
  {
    $uuid = myToolkit::customUuid(sfConfig::get('app_uuid_file_length'));
    if ($this->getUuid() == null) {$this->setUuid($uuid); }
    parent::save($conn);
  }

  public function getRealName() {
    return urlencode($this->getUuid().'.'.$this->getName());
  }
}

//sfPropelBehavior::add('sfFileGallery', array('sfPropelUuidBehavior'));