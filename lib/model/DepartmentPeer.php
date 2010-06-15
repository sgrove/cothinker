<?php

/**
 * Subclass for performing query and update operations on the 'ct_department' table.
 *
 * 
 *
 * @package lib.model
 */ 
class DepartmentPeer extends BaseDepartmentPeer
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

  public static function retrieveAlphabetical($criteria = null)
  {
    sfContext::getInstance()->getLogger()->info('Retrieve alphabetical list of departments...');
    
    if ($criteria == null) { $c = new Criteria(); } else { $c = $criteria; }
    
    $c->addAscendingOrderByColumn(self::NAME);
    
    return self::doSelect($c);
  }
  
}
