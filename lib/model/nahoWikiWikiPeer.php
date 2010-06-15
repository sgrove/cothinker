<?php

/**
 * Subclass for performing query and update operations on the 'naho_wiki_wiki' table.
 *
 * 
 *
 * @package lib.model
 */ 
class nahoWikiWikiPeer extends BasenahoWikiWikiPeer
{
  public static function retrieveByModelId($model, $model_id)
  {
    $c = new Criteria();
    $c->add(self::MODEL, $model);
    $c->add(self::MODEL_ID, $model_id);
    
    return self::doSelectOne($c);
  }
}
