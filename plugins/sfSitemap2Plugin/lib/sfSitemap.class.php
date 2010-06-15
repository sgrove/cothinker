<?php

/*
 * This file is part of the sfSitemap2 package.
 * (c) 2007 Piotr Plenik <piotr.plenik@symfony.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfSitemap.
 *
 * based on feedgenerator.py from django project and sfFeed2 from symfony project
 *
 * @package    sfSitemap2
 * @author     Piotr Plenik <piotr.plenik@symfony.pl>
 */
class sfSitemap
{
  protected
    $items = array(),
    $encoding = 'UTF-8';

  public function construct($site_array = array())
  {
    if($site_array)
    {
      $this->initialize($site_array); 
    } 
  }
  
  /**
   * Defines the sitemap properties, based on an associative array
   *
   * @param array an associative array of sitemap parameters
   *
   * @return sfSitemap the current sfSitemap object
   */
  public function initialize($sitemap_array)
  {
    $this->setItems(isset($sitemap_array['items']) ? $sitemap_array['items'] : '');
    $this->setEncoding(isset($sitemap_array['encoding']) ? $sitemap_array['encoding'] : $this->encoding);
    
    return $this;
  }

  /**
   * Retrieves the sitemap items
   *
   * @return array an array of sfSitemapItem objects
   */
  public function getItems()
  {
    return $this->items;
  }

  /**
   * Defines the items of the sitemap
   * Caution: in previous versions, this method used to accept all kinds of objects.
   * Now only objects of class sfSitemapItem are allowed.
   *
   * @param array an array of sfSitemapItem objects
   *
   * @return sfSitemap the current sfSitemap object
   */
  public function setItems($items = array())
  {
    $this->items = array();
    $this->addItems($items);
    
    return $this;
  }

  /**
   * Adds one item to the sitemap
   *
   * @param sfSitemapItem an item object
   *
   * @return sfSitemap the current sfSitemap object
   */
  public function addItem($item)
  {
    if (!($item instanceof sfSitemapItem))
    {
      // the object is of the wrong class
      $error = 'Parameter of addItem() is not of class sfSitemapItem';

      throw new Exception($error);
    }
    $item->setSitemap($this);
    $this->items[] = $item;
    
    return $this;
  }
  
  /**
   * Adds several items to the sitemap
   *
   * @param array an array of sfSitemapItem objects
   *
   * @return sfSitemap the current sfSitemap object
   */
  public function addItems($items)
  {
    if(is_array($items))
    {
      foreach($items as $item)
      {
        $this->addItem($item); 
      }
    }
    
    return $this;
  }

  /**
   * Adds one item to the sitemap, based on an associative array
   *
   * @param array an associative array
   *
   * @return sfSitemap the current sfSitemap object
   */
  public function addItemFromArray($item_array)
  {
    $this->items[] = new sfSitemapItem($item_array);
    
    return $this;
  }
  
   /**
   * Removes the last items of the sitemap
   * so that the total number doesn't bypass the limit defined as a parameter
   *
   * @param integer the maximum number of items
   *
   * @return sfSitemap the current sfSitemap object
   */
  public function keepOnlyItems($count = 10)
  {
    if($count < count($this->items))
    {
      $this->items = array_slice($this->items, 0, $count);
    }
    
    return $this;
  }  

  public function getEncoding()
  {
    return $this->encoding;
  }

  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }

  public function getLatestPostDate()
  {
    $updates = array();
    foreach ($this->getItems() as $item)
    {
      if ($item->getPubdate())
      {
        $updates[] = $item->getPubdate();
      }
    }

    if ($updates)
    {
      sort($updates);
      return array_pop($updates);
    }
    else
    {
      return time();
    }
  }

  public function asXml()
  {
    throw new sfException('You must use newInstance to get a real Sitemap.');
  }

}

?>