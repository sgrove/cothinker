<?php

/**
 * Subclass for performing query and update operations on the 'sf_recommendation' table.
 *
 * 
 *
 * @package plugins.sfPropelActAsRecommendableBehaviorPlugin.lib.model
 */ 
class sfRecommendationPeer extends BasesfRecommendationPeer
{
    public static function retrieveRecommendations($recommendable_model, $recommendable_id)
    {
        $c = new Criteria();
        $c->add(sfRecommendationPeer::RECOMMENDABLE_MODEL, $recommendable_model);
        $c->add(sfRecommendationPeer::RECOMMENDABLE_ID, $recommendable_id);
    
        return sfRecommendationPeer::doSelectOne( $c );
    }
}
