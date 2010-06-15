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
 * Protocol: http://www.sitemaps.org/protocol.php
 *
 * @package    sfDefaultSitemap
 * @author     Piotr Plenik <piotr.plenik@symfony.pl>
 * @webpage    http://www.symfony.pl/
 */
class sfDefaultSitemap extends sfSitemap
{
  protected
    $context;

  protected function initContext()
  {
  	if(!$this->context)
  	{
  	  $this->context = sfContext::getInstance();
  	}
  }

  /**
   * Returns the the current object as a valid XML sitemap
   * And sets the response content type accordingly.
   *
   * @return string An XML string.
   */
  public function asXml()
  {
    $this->initContext();
    $this->context->getResponse()->setContentType('application/xml');

    return $this->toXml();
  }

  /**
   * Returns the the current object as a valid XML sitemap.
   *
   * @return string An XML string.
   */
  public function toXml()
  {
    $this->initContext();
    $controller = $this->context->getController();

    $xml = array();
    $xml[] = '<?xml version="1.0" encoding="'.$this->getEncoding().'" ?>';

    $xml[] = sprintf('<urlset xmlns="%s" xmlns:xsi="%s" xsi:schemaLocation="%s">',
			'http://www.sitemaps.org/schemas/sitemap/0.9',
			'http://www.w3.org/2001/XMLSchema-instance',
			'http://www.sitemaps.org/schemas/sitemap/0.9  http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

    $xml[] = $this->getElements();

    $xml[] = '</urlset>';

    return implode("\n", $xml);
  }

  /**
   * Returns an array of <entry> tags corresponding to the sitemap items.
   *
   * @return string A list of <entry> elements.
   */
  private function getElements()
  {
    $controller = $this->context->getController();
    $xml = array();

    foreach ($this->getItems() as $item)
    {
      $xml[] = '<url>';
      $xml[] = '  <loc>'.$controller->genUrl($item->getLoc(), true).'</loc>';
      if ($item->getLastMod())
      {
        $xml[] = '  <lastmod>'.strftime('%Y-%m-%dT%H:%M:%S+00:00', $item->getLastMod()).'</lastmod>';
      }

      // author information
      if ($item->getChangeFreq())
      {
        $xml[] = '  <changefreq>'.$item->getChangeFreq().'</changefreq>';
      }

      // unique id
      if ($item->getPriority())
      {
        $xml[] = '  <priority>'.$item->getPriority().'</priority>';
      }

      $xml[] = '</url>';
    }

    return implode("\n", $xml);
  }

}

?>
