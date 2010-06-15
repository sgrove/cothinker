<?php

/**
 * Subclass for performing query and update operations on the 'ct_project_application' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectApplicationPeer extends BaseProjectApplicationPeer
{
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    
    $c->add(self::UUID, $value);
    return self::doSelectOne($c);
  }
  
  public static function retrieveUnapprovedByUserId($user_id)
  {
    $c = new Criteria();
    $c->add(ProjectApplicationPeer::STATUS, sfConfig::get('app_project_application_status_unapproved'));
    $c->add(ProjectApplicationPeer::OWNER_ID, $user_id);
    
    return self::doSelect( $c );
  }
  
  public static function retrieveByUserId($user_id)
  {
    $c = new Criteria();
    $c->add(ProjectApplicationPeer::OWNER_ID, $user_id);
    $c->add(ProjectApplicationPeer::STATUS, sfConfig::get('app_project_application_status_approved'), Criteria::NOT_EQUAL);
    
    $c->addAscendingOrderByColumn(ProjectApplicationPeer::STATUS);
    
    return self::doSelect( $c );
  }

  public static function retrieveAllByUserId($user_id)
  {
    $c = new Criteria();
    $c->add(ProjectApplicationPeer::OWNER_ID, $user_id);
    
    //$c->addAscendingOrderByColumn(ProjectApplicationPeer::STATUS);
    
    return self::doSelect( $c );
  }
}
