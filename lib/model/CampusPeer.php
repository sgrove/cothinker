<?php

/**
 * Subclass for performing query and update operations on the 'ct_campus' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CampusPeer extends BaseCampusPeer
{
  public static function retrieveBySlug($value)
  {
    $c = new Criteria();
    $c->add(self::SLUG, $value);
    return self::doSelectOne($c);
  }
  
  public static function buildSelectArray($c = null)
  {
    if ($c == null)
    {
      $c = new Criteria();
    }
    
    $t_campuses = self::doSelect($c);
    
    $campuses = array();
    
    foreach ($t_campuses as $t_campus)
    {
      $campuses[$t_campus->getId()] = $t_campus->getName();
    }
    
    return $campuses;
  }
  
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
  
  public static function retrieveByEmail($value)
  {
    $data = split('@', $value);
    $email = $data[1];
    
    $c = new Criteria();
    $c->add(self::EMAIL, $email);
    $c->setIgnoreCase( true );
    
    $result = self::doSelectOne($c);
    
    if ($result == null)
    {
      sfContext::getInstance()->getLogger()->log('no matching email domain for (' . $email . ')');
      return false;
    }
    
    sfContext::getInstance()->getLogger()->log('matching email domain found');
    return $result;
  }
  
  public static function retrieveAlphabetical($criteria = null)
  {
    if ($criteria == null) { $c = new Criteria(); } else { $c = $criteria; }
    
    $c->addAscendingOrderByColumn(self::NAME);
    
    return self::doSelect($c);
  }
}
