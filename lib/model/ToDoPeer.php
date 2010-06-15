<?php

/**
 * Subclass for performing query and update operations on the 'ct_user_todo' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ToDoPeer extends BaseToDoPeer
{
  public static function retrieveByUserIdSlug($user_id, $slug) //, $all = false)
  {
    $c = new Criteria();
    $c->add(ToDoPeer::OWNER_ID, $user_id);
    $c->add(ToDoPeer::SLUG, $slug);
    $c->addAscendingOrderByColumn(ToDoPeer::FINISH);
    
    /*
    if ($all != true) {
      //$c->add(ToDoPeer::STATUS, sfConfig::get('app_task_status_open'));
    }
    */
    return ToDoPeer::doSelectOne($c);
  }
}
