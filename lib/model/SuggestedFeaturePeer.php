<?php

/**
 * Subclass for performing query and update operations on the 'ct_suggest_feature' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SuggestedFeaturePeer extends BaseSuggestedFeaturePeer
{
    public static function retrieveByUuid($value)
    {
        $c = new Criteria();
        $c->add(SuggestedFeaturePeer::UUID, $value);
        
        return SuggestedFeaturePeer::doSelectOne( $c );
    }
    
    public static function retrieveBySlug($value)
    {
        $c = new Criteria();
        //$c->add(SuggestedFeaturePeer::SLUG, $value);
        
        return SuggestedFeaturePeer::doSelectOne( $c );
    }
}
