<?php

/**
 * Subclass for performing query and update operations on the 'ct_project_user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectUserPeer extends BaseProjectUserPeer
{  
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    $c->add(self::UUID, $value);
    return self::doSelectOne($c);
  }
  
  public static function retrieveByPositionId($value)
  {
    $c = new Criteria();
    $c->add(self::POSITION_ID, $value);
    return self::doSelectOne($c);
  }
  
  public static function retrieveApplicantsByPositionId($value)
  {
    $c = new Criteria();
    $c->add(self::POSITION_ID, $value);
    $c->add(self::STATUS, 1, Criteria::NOT_EQUAL);
    return self::doSelect($c);
  }
  
  public static function retrieveByPositionIdUserId($position_id, $user_id)
  {
    $c = new Criteria();
    $c->add(self::POSITION_ID, $position_id);
    $c->add(self::USER_ID, $user_id);
    return self::doSelectOne($c);
  }

  public static function retrieveFilledByUserId($user_id)
  {
    $c = new Criteria();
    $c->add(self::STATUS, sfConfig::get('app_project_user_status_accepted'));
    $c->add(self::USER_ID, $user_id);
    return self::doSelect($c);
  }
}
