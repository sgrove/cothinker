<?php

/**
 * Subclass for representing a row from the 'sf_simple_forum_owner_object' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfSimpleForumOwner extends BasesfSimpleForumOwner
{
  public function getCategories()
  {
     return sfSimpleForumCategoryPeer::retrieveByOwnerId($this->getId());
  }
}
