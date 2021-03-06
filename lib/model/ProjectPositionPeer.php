<?php

/**
 * Subclass for performing query and update operations on the 'ct_project_position' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectPositionPeer extends BaseProjectPositionPeer
{
   public static function retrieveByProjectId($value)
  {
    $c = new Criteria();
    $c->add(self::PROJECT_ID, $value);
    $c->addAscendingOrderByColumn(self::TITLE);
    return self::doSelect($c);
  }
  
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    $c->add(self::UUID, $value);
    return self::doSelectOne($c);
  }

  public static function retrieveByUserId($value)
  {
    $c = new Criteria();
    $c->add(self::USER_ID, $value);
    return self::doSelect($c);
  }
  
}
