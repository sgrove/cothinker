<?php

/**
 * Subclass for representing a row from the 'naho_wiki_wiki' table.
 *
 * 
 *
 * @package lib.model
 */ 
class nahoWikiWiki extends BasenahoWikiWiki
{
  public function __toString()
  {
    return $this->getSlug();
  }

  public function initPage($name)
  {
    $page = new nahoWikiPage();
    $page->setName($name);
    $page->setWikiId($this->getId());
    return $page;
  }
  
  public function getPage($name)
  {
    $page = nahoWikiPagePeer::retrieveByWikiIdName($this->getId(), $name);
    if ($page == null) {
      $page = $this->initPage($name);
    }

    return $page;
  }
  
  public function getProject()
  {
    if (strtolower($this->getModel()) == 'project') {
      
      $project = ProjectPeer::retrieveByPk($this->getModelId());
      if ($project != null) {
        return $project;
      }
    }
    return false;
  }

  public function getPages()
  {
    $c = new Criteria;
    $c->addAscendingOrderByColumn(nahoWikiPagePeer::NAME);
    $c->add(nahoWikiPagePeer::WIKI_ID, $this->getId());
    
    return nahoWikiPagePeer::doSelect( $c );
  }
}

$xyz = array('from'   => nahoWikiWikiPeer::TITLE, 'to'     => nahoWikiWikiPeer::SLUG);

sfPropelBehavior::add('nahoWikiWiki', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('nahoWikiWiki', array('sfPropelUuidBehavior'));
sfPropelBehavior::add('nahoWikiWiki', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));