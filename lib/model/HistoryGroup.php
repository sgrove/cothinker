<?php

/**
 * Subclass for representing a row from the 'ct_history_group' table.
 *
 * 
 *
 * @package lib.model
 */ 
class HistoryGroup extends BaseHistoryGroup
{
    public function __toString()
    {
        return $this->getName();
    }
    
    public function getLastHistoryEvent()
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(HistoryEventPeer::CREATED_AT);
        $c->add(HistoryEventPeer::HISTORY_GROUP_ID, $this->getId());
        
        $event = HistoryEventPeer::doSelectOne($c);
        return $event;
    }
    
}

sfPropelBehavior::add('HistoryGroup', array('sfPropelUuidBehavior'));