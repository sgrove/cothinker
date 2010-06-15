<?php

/**
 * forums actions.
 *
 * @package    cothink
 * @subpackage forums
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class forumsComponents extends sfComponents
{
  public function executeLatestPosts()
  {
    $this->posts = sfSimpleForumPostPeer::getLatest(sfConfig::get('app_sfSimpleForumPlugin_max_per_block', 10));
  }
}