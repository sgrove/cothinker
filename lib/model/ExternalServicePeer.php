<?php

/**
 * Subclass for performing query and update operations on the 'ct_external_service' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ExternalServicePeer extends BaseExternalServicePeer
{
  public static function retrieveByUserId($user_id)
  {
    $c = new Criteria();
    $c->add(self::USER_ID, $user_id);
    
    return self::doSelectOne($c);
  }
}
