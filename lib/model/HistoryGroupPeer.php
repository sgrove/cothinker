<?php

/**
 * Subclass for performing query and update operations on the 'ct_history_group' table.
 *
 * 
 *
 * @package lib.model
 */ 
class HistoryGroupPeer extends BaseHistoryGroupPeer
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
    
    return self::doSelectOne($c);
  }
}
