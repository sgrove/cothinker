<?php

/**
 * Helper functions for generating links (linked icons) to easily add a url 
 * to a social bookmarking application. 
 *
 * <strong>Example:</strong>
 * <code>
 *  <?php use_helper('SocialBookmarking') ?>
 *
 *  <?php echo link_to_delicious('http://www.foobar.com?foo=bar&bar=123', 'How to do a FooBar'); ?> 
 * </code>
 *
 * With this code, a del.icio.us icon would be returned which links to a 
 * page that lets you bookmark the site in del.icio.us.
 *
 * You can also link to all available social bookmarking sites:
 *
 * <strong>Example:</strong>
 * <code>
 *   <?php use_helper('SocialBookmarking') ?>
 *
 *   <?php echo link_to_social_bookmarking('http://www.foobar.com?foo=bar&bar=123', 'How to do a FooBar'); ?>
 * </code>
 *
 * @package     symfony
 * @subpackage  helper
 * @author      Arthur Koziel <arthur@arthurkoziel.de>
 * @version     SVN: $Id$
 */

use_helper('Url');

/**
 * Builds a link to add url to del.icio.us.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_delicious($url, $title=null, $imgtitle='Add to del.icio.us')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('delicious.gif','title='.$imgtitle), 'http://del.icio.us/post?url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Technorati.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_technorati($url, $imgtitle='Add to Technorati')
{
  $url = urlencode($url);

  return link_to(image_tag('technorati.gif','title='.$imgtitle), 'http://technorati.com/faves/?add='.$url);
}

/**
 * Builds a link to add url to Furl.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_furl($url, $title=null, $imgtitle='Add to Furl')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('furl.gif','title='.$imgtitle), 'http://www.furl.net/storeIt.jsp?t='.$title.'&u='.$url);
}

/**
 * Builds a link to add url to Yahoo! My Web.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_yahoo_myweb($url, $title=null, $imgtitle='Add to Yahoo! My Web')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('yahoo_myweb.gif','title='.$imgtitle), 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$url.'&t='.$title);
}

/**
 * Builds a link to add url Google Bookmarks.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_google_bookmarks($url, $title=null, $imgtitle='Add to Google Bookmarks')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('google_bmarks.gif','title='.$imgtitle), 'http://www.google.com/bookmarks/mark?op=edit&bkmk='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Blinklist.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_blinklist($url, $title=null, $imgtitle='Add to Blinklist')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('blinklist.gif','title='.$imgtitle), 'http://blinklist.com/index.php?Action=Blink/addblink.php&Url='.$url.'&Title='.$title);
}

/**
 * Builds a link to add url to ma.gnolia.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_magnolia($url, $title=null, $imgtitle='Add to ma.gnolia')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('magnolia.gif','title='.$imgtitle), 'http://ma.gnolia.com/bookmarklet/add?url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Windows Live.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_windows_live($url, $title=null, $imgtitle='Add to Windows Live')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('windows_live.gif','title='.$imgtitle), 'https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url='.$url.'&title='.$title.'&top=1');
}

/**
 * Builds a link to add url to Digg.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_digg($url, $title=null, $imgtitle='Add to Digg')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('digg.gif','title='.$imgtitle), 'http://digg.com/submit?phase=2&url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Netscape.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_netscape($url, $title=null, $imgtitle='Add to Netscape')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('netscape.gif','title='.$imgtitle), 'http://www.netscape.com/submit/?U='.$url.'&T='.$title);
}

/**
 * Builds a link to add url to StumbleUpon.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_stumbleupon($url, $title=null, $imgtitle='Add to StumbleUpon')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('stumbleupon.gif','title='.$imgtitle), 'http://www.stumbleupon.com/submit?url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Newsvine.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_newsvine($url, $title=null, $imgtitle='Add to Newsvine')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('newsvine.gif','title='.$imgtitle), 'http://www.newsvine.com/_wine/save?u='.$url.'&h='.$title);
}

/**
 * Builds a link to add url to Reddit.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_reddit($url, $title=null, $imgtitle='Add to Reddit')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('reddit.gif','title='.$imgtitle), 'http://reddit.com/submit?url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Tailrank.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_tailrank($url, $title=null, $imgtitle='Add to Tailrank')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('tailrank.gif','title='.$imgtitle), 'http://tailrank.com/share/?link_href='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Spurl.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_spurl($url, $title=null, $imgtitle='Add to Spurl')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('spurl.gif','title='.$imgtitle), 'http://www.spurl.net/spurl.php?title='.$title.'&url='.$url);
}

/**
 * Builds a link to add url to Yigg.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_yigg($url, $imgtitle='Add to Yigg')
{
  $url = urlencode($url);

  return link_to(image_tag('yigg.gif','title='.$imgtitle), 'http://yigg.de/neu?exturl='.$url);
}

/**
 * Builds links to all available social bookmarking services.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @return  string   Linked icons
 * @see     link_to_delicious, link_to_technorati, link_to_furl, link_to_yahoo_myweb, link_to_google_bookmarks, link_to_blinklist, link_to_magnolia, link_to_windows_live, link_to_digg, link_to_netscape, link_to_stumbleupon, link_to_newsvine, link_to_reddit, link_to_tailrank, link_to_spurl, link_to_yigg
 */
function link_to_social_bookmarking($url, $title=null)
{
  $links = link_to_delicious($url, $title);
  $links .= ' '.link_to_technorati($url);
  $links .= ' '.link_to_furl($url, $title);
  $links .= ' '.link_to_yahoo_myweb($url, $title);
  $links .= ' '.link_to_google_bookmarks($url, $title);
  $links .= ' '.link_to_blinklist($url, $title);
  $links .= ' '.link_to_magnolia($url, $title);
  $links .= ' '.link_to_windows_live($url, $title);
  $links .= ' '.link_to_digg($url, $title);
  $links .= ' '.link_to_netscape($url, $title);
  $links .= ' '.link_to_stumbleupon($url, $title);
  $links .= ' '.link_to_newsvine($url, $title);
  $links .= ' '.link_to_reddit($url, $title);
  $links .= ' '.link_to_tailrank($url, $title);
  $links .= ' '.link_to_spurl($url, $title);
  $links .= ' '.link_to_yigg($url);

  return $links;
}

