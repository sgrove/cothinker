<?php

/**
 * Subclass for performing query and update operations on the 'ct_subdepartment' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SubdepartmentPeer extends BaseSubdepartmentPeer
{
  public static function retrieveByName($value)
  {
    $c = new Criteria();
    
    $c->add(self::NAME, $value);
    $c->setIgnoreCase( true );
    
    return self::doSelectOne($c);
  }
  
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    
    $c->add(self::UUID, $value);
    $c->setIgnoreCase( true );
    
    return self::doSelectOne($c);
  }
  
}
