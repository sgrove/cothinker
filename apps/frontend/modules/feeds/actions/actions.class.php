<?php

/**
 * feeds actions.
 *
 * @package    cothink
 * @subpackage feeds
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class feedsActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
  
  public function executeLatest()
  {
    // TODO: Add a unique UUID key to the profile, which will serve as the "KEY" to accessing a user's feed. Brilliant.
    $user = sfGuardUserProfilePeer::retrieveByUuid($this->getRequestParameter('feed'));
    
    $this->forward404Unless($user, 'Feed not found for user');
    $feed = $user->getDefaultFeed();
 
    $this->feed = $feed;
  }
  
  public function executeShowItem()
  {
    $this->event = HistoryEventPeer::retrieveByUuid($this->getRequestParameter('landing'));
    $this->forward404Unless($this->event, 'news item not found');
  }
  
  public function executeSitemap()
  {
  $sitemap = new sfDefaultSitemap();

  $projects = ProjectPeer::doSelect(new Criteria() );

  $priority = '0.3';
  $freq = 'weekly';

  foreach ($projects as $project)
  {
    $item = new sfSitemapItem();
    $item->initialize(array(
      'loc'        => '@show_project?project='.$project->getSlug(),
      'lastmod'    => $project->getUpdatedAt(),
      'changeFreq' => $freq,
      'piority'	   => $priority
    ));

    $sitemap->addItem($item);
  }
  
  $members = sfGuardUserProfilePeer::doSelect(new Criteria());
  
  foreach ($members as $member)
  {
    $item = new sfSitemapItem();
    $item->initialize(array(
      'loc'        => '@show_user?user='.$member->getUuid(),
      'lastmod'    => $member->getUpdatedAt(),
      'changeFreq' => $freq,
      'piority'	   => $priority
    ));

    $sitemap->addItem($item);
  }
  
  $features = SuggestedFeaturePeer::doSelect(new Criteria());
  
  $freq = 'daily';
  
  foreach ($features as $feature)
  {
    $item = new sfSitemapItem();
    $item->initialize(array(
      'loc'        => '@show_feature?feature='.$feature->getUuid(),
      'lastmod'    => $feature->getUpdatedAt(),
      'changeFreq' => $freq,
      'piority'	   => $priority
    ));

    $sitemap->addItem($item);
  }

  $this->sitemap = $sitemap;
  }
}
