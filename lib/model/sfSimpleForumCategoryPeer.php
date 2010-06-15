<?php

/**
 * Subclass for performing query and update operations on the 'sf_simple_forum_category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfSimpleForumCategoryPeer extends BasesfSimpleForumCategoryPeer
{
  public static function retrieveByProjectId($project_id)
  {
    $owner_object = sfSimpleForumOwnerPeer::retrieveByModelId('project', $project_id);
    
    if ($owner_object != null) {
      return self::retrieveByOwnerId($owner_object->getId());
    }
    
    return null;
  }
  
  public static function retrieveByOwnerId($owner_id)
  {
    $c = new Criteria();
    
    $c->add(self::OWNER_ID, $owner_id);
    
    return self::doSelect( $c );
  }
}
