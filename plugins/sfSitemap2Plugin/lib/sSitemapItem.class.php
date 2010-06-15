<?php

/*
 * This file is part of the sfSitemap2 package.
 * (c) 2007 Piotr Plenik <piotr.plenik@symfony.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    sfSitemap2
 * @author     Piotr Plenik <piotr.plenik@symfony.pl>
 */
class sfSitemapItem
{
  private
   $loc,
   $lastMod,
   $changeFreq,
   $priority,
   $sitemap;

  public function __construct($item_array = array())
  {
    if($item_array)
    {
      $this->initialize($item_array); 
    }
  }
  
  /**
   * Sets the sitemap item parameters, based on an associative array
   *
   * @param array an associative array
   *
   * @return sfSitemapItem the current sfSitemapItem object
   */
  public function initialize($item_array)
  {
    $this->setLoc(isset($item_array['loc']) ? $item_array['loc'] : '');
    $this->setLastMod(isset($item_array['lastMod']) ? $item_array['lastMod'] : '');
    $this->setChangeFreq(isset($item_array['changeFreq']) ? $item_array['changeFreq'] : '');
    $this->setPriority(isset($item_array['priority']) ? $item_array['priority'] : '');
    
    return $this;
  }

  public function setLoc ($loc)
  {
    $this->loc = $loc;
  }

  public function getLoc ()
  {
    return $this->loc;
  }

  public function setLastMod ($lastMod)
  {
    $this->lastMod = $lastMod;
  }

  public function getLastMod ()
  {
    return $this->lastMod;
  }

  public function setChangeFreq ($changeFreq)
  {
    $changeFreqNames = sfSitemapPeer::getChangefreqNames();
    
    if(!in_array($changeFreq, $changeFreqNames) )
    {
	throw new PropelException("'$changeFreq' could not be found in the changeFreq values (" . 
		implode(', ', sfSitemapPeer::getChangefreqNames()) . ')' );
    }
  
    $this->changeFreq = $changeFreq;
  }

  public function getChangeFreq ()
  {
    return $this->changeFreq;
  }
  
  public function setPriority ($priority)
  {
    $this->priority = $priority;
  }

  public function getPriority ()
  {
    return $this->priority;
  }

  public function setSitemap ($sitemap)
  {
    $this->sitemap = $sitemap;
  }

  public function getSitemap ()
  {
    return $this->sitemap;
  }

}

?>