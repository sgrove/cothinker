<?php

/**
 * Subclass for performing query and update operations on the 'ct_featured_project' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FeaturedProjectPeer extends BaseFeaturedProjectPeer
{
    public static function retrieveLatest($c = null)
    {
        if ($c == null) $c = new Criteria();
        
        $c->addDescendingOrderByColumn(FeaturedProjectPeer::CREATED_AT);
        
        return FeaturedProjectPeer::doSelectOne( $c );
    }
    
    public static function retrieveRandom(){
              $c = new Criteria();
              // Select a random record
              // TODO: find a db-agnostic method of selecting a random record
              $c->addAscendingOrderByColumn('rand()');
              return FeaturedProjectPeer::doSelectOne($c);
      }
}
