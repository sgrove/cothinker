<?php

/**
 * Subclass for performing query and update operations on the 'sf_user_recommendation' table.
 *
 * 
 *
 * @package plugins.sfPropelActAsRecommendableBehaviorPlugin.lib.model
 */ 
class sfUserRecommendationPeer extends BasesfUserRecommendationPeer
{
    public static function retrieveUserRecommendations($recommendable_model, $recommendable_id)
    {
        $c = new Criteria();
        $c->add(sfUserRecommendationPeer::RECOMMENDABLE_MODEL, $recommendable_model);
        $c->add(sfUserRecommendationPeer::RECOMMENDABLE_ID, $recommendable_id);
    
        return sfUserRecommendationPeer::doSelect( $c );
    }
}
