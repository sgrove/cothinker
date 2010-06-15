<?php
/*
 * This file is part of the sfPropelActAsStarredBehaviorPlugin
 * Helper to star an object
 * 
 * @author Gerald Estadieu <gestadieu@gmail.com>
 */

function link_to_star($object, $options = array())
{	  	
	$user = sfContext::getInstance()->getUser();
  if ($user->isAuthenticated())
  {
		$response = sfContext::getInstance()->getResponse();
		$has_jquery = sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_has_jquery');
		if (!$has_jquery)
		{
			$response->addJavascript('/sfPropelActAsStarredBehaviorPlugin/js/jquery-1.2.2.pack');
		}
		$response->addJavascript('/sfPropelActAsStarredBehaviorPlugin/js/sf_star');
		
		
		$is_starred = ($object->isStarred())?'sf_star_on':'sf_star_off';

		$options = _parse_attributes($options);
		if (isset($options['class']))
		{
			$options['class'] .= ' sf_star ' . $is_starred;
		}
		else
		{
			$options['class'] = 'sf_star ' . $is_starred;
		}
		$type = sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_content_type',null);
		
		if (!$type || $type == 'image')
		{
			$content =  ($object->isStarred())?image_tag(sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_image_on','/sfPropelActAsStarredBehaviorPlugin/images/star_on.gif')):image_tag(sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_image_off','/sfPropelActAsStarredBehaviorPlugin/images/star_off.gif'));
		}
		elseif (isset($options['txt_on']) && isset($options['txt_off']))
		{
			$content = ($object->isStarred())?$options['txt_off']:$options['txt_on'];
		}
		else
		{
			$content = ($object->isStarred())?sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_content_on'):sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_content_off');
		}

		$model = get_class($object);
		$id    = $object->getPrimaryKey();
		
		return link_to($content,'sfStar/starit?model='.$model.'&id='.$id,$options);
		
		// return content_tag('span',link_to($image,'sfStar/starit?model='.$model.'&id='.$id,'class=sf_star'));
  }
  else
  {
		return content_tag('span','');
  }
}
