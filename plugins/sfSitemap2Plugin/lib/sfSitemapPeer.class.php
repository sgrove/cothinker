<?php

/*
 * This file is part of the sfSitemap2 package.
 * (c) 2007 Piotr Plenik <piotr.plenik@symfony.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfSitemapPeer
 *
 *
 * @package    sfSitemap2
 * @author     Piotr Plenik <piotr.plenik@symfony.pl>
 */
class sfSitemapPeer
{

  private static $changefreqNames = array ( 'always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never');

  /**
   * Retrieve a new sfSitemap implementation instance.
   *
   * @param string A sfSitemap implementation name.
   *
   * @return sfSitemap A sfSitemap implementation instance.
   *
   * @throws sfFactoryException If a new Sitemap implementation instance cannot be created.
   */
  public static function newInstance($format = '')
  {
    try
    {
      $class = 'sf'.ucfirst($format).'Sitemap';

      // the class exists
      $object = new $class();

      if (!($object instanceof sfSitemap))
      {
          // the class name is of the wrong type
          $error = 'Class "%s" is not of the type sfSitemap';
          $error = sprintf($error, $class);

          throw new sfFactoryException($error);
      }

      return $object;
    }
    catch (sfException $e)
    {
      $e->printStackTrace();
    }
  }
  
  public static function getChangefreqNames()
  {
    return self::$changefreqNames;
  }
}

?>