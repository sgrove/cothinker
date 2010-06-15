<?php

/**
 * Subclass for performing query and update operations on the 'sf_simple_forum_owner_object' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfSimpleForumOwnerPeer extends BasesfSimpleForumOwnerPeer
{
  public static function retrieveByModelId($model, $model_id)
  {
    $c = new Criteria();
    $c->add(self::MODEL, $model);
    $c->add(self::MODEL_ID, $model_id);
    
    return self::doSelectOne( $c );
  }
}
