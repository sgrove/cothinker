<?php

/**
 * Subclass for performing query and update operations on the 'ct_history_event' table.
 *
 * 
 *
 * @package lib.model
 */ 
class HistoryEventPeer extends BaseHistoryEventPeer
{
  public static function retrieveByUser($user_id, $max = 5)
  {
    $userGroups = HistoryGroupUserPeer::retrieveByUserId($user_id);

    $groups = array();

    foreach ($userGroups as $result)
    {
      $groups[] = $result->getHistoryGroup();
    }

    $c = new Criteria();

    $crit0 = $c->getNewCriterion(self::HISTORY_GROUP_ID, '');
    
    $crit_groups = array();
    
    foreach ($groups as $group)
    {
      $group = HistoryGroupPeer::retrieveByName($group->getName());
      $crit_groups[] = $c->getNewCriterion(self::HISTORY_GROUP_ID, $group->getId());
    }
    
    sfContext::getInstance()->getLogger()->info('Groups: ['.count($crit_groups).']');
    foreach($crit_groups as $crit_group)
    {
      $crit0->addOr($crit_group);
    }

    $c->add($crit0);
    $c->addDescendingOrderByColumn(self::CREATED_AT);
    $c->setLimit($max);
    
    
    sfContext::getInstance()->getLogger()->info('Grabbing history now');
    return self::doSelect($c);
  }
  
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    
    $c->add(HistoryEventPeer::UUID, $value);
    return HistoryEventPeer::doSelectOne( $c );
  }
}
