<?php use_helper('Global') ?>
<?php echo link_to_favorite($object, array()) ?>
<?php /*
$type = sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_content_type',null);

if (!$type || $type == 'image')
{
	$content =  ($object->isStarred())?image_tag(sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_image_on','/sfPropelActAsStarredBehaviorPlugin/images/star_on.gif')):image_tag(sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_image_off','/sfPropelActAsStarredBehaviorPlugin/images/star_off.gif'));
}
else
{
	$content = ($object->isStarred())?sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_content_on'):sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_content_off');
}
echo $content
// $image =  ($object->isStarred())?image_tag(sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_image_on','/sfPropelActAsStarredBehaviorPlugin/images/star_on.gif')):image_tag(sfConfig::get('app_sfPropelActAsStarredBehaviorPlugin_image_off','/sfPropelActAsStarredBehaviorPlugin/images/star_off.gif'));
// echo link_to($image,'sfStar/starit?model='.$model.'&id='.$id,'class=sf_star');
*/
?>