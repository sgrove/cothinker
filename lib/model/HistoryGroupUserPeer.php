<?php

/**
 * Subclass for performing query and update operations on the 'ct_history_group_user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class HistoryGroupUserPeer extends BaseHistoryGroupUserPeer
{
  public static function retrieveByUserId($user_id)
  {
    $c = new Criteria();
    
    $c->add(self::USER_ID, $user_id);
    
    return self::doSelect($c);
  }
}
