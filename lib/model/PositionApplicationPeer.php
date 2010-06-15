<?php

/**
 * Subclass for performing query and update operations on the 'ct_position_application' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PositionApplicationPeer extends BasePositionApplicationPeer
{
    public static function retrieveByPositionIdUserId($position_id, $user_id)
    {
        $c = new Criteria();
        $c->add(PositionApplicationPeer::POSITION_ID, $position_id);
        $c->add(PositionApplicationPeer::USER_ID, $user_id);
        
        return PositionApplicationPeer::doSelectOne($c);
    }
    
    public static function retrieveByPositionId($position_id)
    {
        $c = new Criteria();
        $c->add(PositionApplicationPeer::POSITION_ID, $position_id);
        
        return PositionApplicationPeer::doSelect($c);
    }
    
    public static function retrieveByUuid($value)
    {
        $c = new Criteria();
        $c->add(PositionApplicationPeer::UUID, $value);
        
        return PositionApplicationPeer::doSelectOne($c);
    }
}
