<?php

/**
 * Subclass for representing a row from the 'sf_simple_forum_category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfSimpleForumCategory extends BasesfSimpleForumCategory
{
  public function getFora()
  {
    $c = new Criteria();
    $c->add(sfSimpleForumForumPeer::CATEGORY_ID, $this->getId());
    $c->addAscendingOrderByColumn(sfSimpleForumForumPeer::RANK);
    return sfSimpleForumForumPeer::doSelect($c);
  }
  
  public function __toString()
  {
    return $this->getName();
  }
  
  public function newForum($title, $description)
  {
    $forum = new sfSimpleForumForum();
    $forum->setName($title);
    $forum->setDescription($description);
    $forum->setCategoryId($this->getId());
    $forum->save();
    
    return $forum;
  }
}

$xyz = array('from'   => sfSimpleForumCategoryPeer::NAME, 'to'     => sfSimpleForumCategoryPeer::STRIPPED_NAME);

sfPropelBehavior::add('sfSimpleForumCategory', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));
