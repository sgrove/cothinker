<?php

/**
 * Subclass for representing a row from the 'ct_external_service' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ExternalService extends BaseExternalService
{
  public function getTwitterEncryptedPassword ()
  {
    if ($this->getTwitterPassword() != null) {
      return sfConfig::get('app_profile_null_password');
    }
    
    return null;
  }

  
}
