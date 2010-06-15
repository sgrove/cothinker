<?php

use_helper('Javascript', 'ModalBox', 'Number', 'I18N');

function select_tag_departments($name = 'departments', $selected = 2, $options = array())
{
        $c = new Criteria();
        $c->addAscendingOrderByColumn(DepartmentPeer::NAME);
	$departments = DepartmentPeer::doSelect($c);
	return select_tag($name, objects_for_select($departments, 'getUuid', 'getName', $selected, array()), $options);
}

function select_tag_languages($name = 'languages', $selected = "en_US", $options = array())
{
	$languages = array(
			"en_US" => "English",
			"fr"	=> "French",
			"zh_CN" => "Chinese Simplified");

	return select_tag($name, options_for_select($languages, $selected), $options);
}

function select_tag_campuses($name = 'campus', $selected = 2, $options = array())
{
        $c = new Criteria();
        $c->addAscendingOrderByColumn(CampusPeer::NAME);
        
        $campuses =  CampusPeer::doSelect($c);
        return select_tag($name, objects_for_select($campuses, 'getId', 'getName', $selected, array()), $options);
}

function select_task_status($name = 'status', $selected = null, $options = array())
{
        if ($selected == null) $selected = sfConfig::get('app_task_status_open');
	return select_tag($name, options_for_select(array(
                                                    sfConfig::get('app_task_status_completed') => __('Completed'),
                                                    sfConfig::get('app_task_status_open') => __('Open')), $selected), $options);
}

function select_task_priority($name = 'priority', $selected = null, $options = array())
{
        if ($selected == null) $selected = sfConfig::get('app_task_priority_low');
	return select_tag($name, options_for_select(array(
                                                    sfConfig::get('app_task_priority_low') => __('Low'),
                                                    sfConfig::get('app_task_priority_medium') => __('Medium'),
                                                    sfConfig::get('app_task_priority_high') => __('High')), $selected), $options);
}

function pager_navigation2($pager, $uri, $navuri)
{
  $navigation = '';
  
  if ($pager->haveToPaginate())
  {
    $uri .= (preg_match('/\?/', $uri) ? '&' : '?').'page=';
    
    // First and previous page
    if ($pager->getPage() != 1)
    {
      /*
      $navigation .= link_to_remote(image_tag('first.gif', 'align=absmiddle'), array(
        'url'     =>   $uri.'1',
        'update'  =>  array('success' => 'table_swipers'),
        'loading' => "Element.show('indicator')",
        'complete'=> "Element.hide('indicator');".visual_effect('highlight', 'table_swipers')));
      $navigation .= link_to_remote(image_tag('previous.gif', 'align=absmiddle'), array(
        'url'     =>  $uri.$pager->getPreviousPage(),
        'update'  =>  array('success' => 'table_swipers'),
        'loading' => "Element.show('indicator')",
        'complete'=> "Element.hide('indicator');".visual_effect('highlight', 'table_swipers')));
      */
      $navigation .= link_to(image_tag('first.gif', 'align=absmiddle'), $uri.'1');
      $navigation .= link_to(image_tag('previous.gif', 'align=absmiddle'), $uri.$pager->getPreviousPage());
    }
    else
    {
      $navigation .= image_tag('first.gif', 'align=absmiddle');
      $navigation .= image_tag('previous.gif', 'align=absmiddle');
    }
    
    // Pages one by one
    $links = array();
    foreach ($pager->getLinks() as $page)
    {
      $links[] = link_to_unless($page == $pager->getPage(), $page, $navuri.$page);
    }
    
    $navigation .= join('&nbsp;&nbsp;', $links);
    
    // Next and last page
    if ($pager->getPage() != $pager->getCurrentMaxLink())
    {
      /*
      $navigation .= '&nbsp;'.link_to_remote(image_tag('next.gif', 'align=absmiddle'), array(
        'url'     =>  'home/pager?page='.$pager->getNextPage(),
        'update'  =>  array('success' => 'table_swipers'),
        'loading' => "Element.show('indicator')",
        'complete'=> "Element.hide('indicator');".visual_effect('highlight', 'swiper')));
      $navigation .= link_to_remote(image_tag('last.gif', 'align=absmiddle'), array(
        'url'     =>  'home/pager?page='.$pager->getLastPage(),
        'update'  =>  array('success' => 'table_swipers'),
        'loading' => "Element.show('indicator')",
        'complete'=> "Element.hide('indicator');".visual_effect('highlight', 'swiper')));
      */
      $navigation .= link_to(image_tag('next.gif', 'align=absmiddle'), $uri.$pager->getNextPage());
      $navigation .= link_to(image_tag('last.gif', 'align=absmiddle'), $uri.$pager->getLastPage());
    }
    else
    {
      $navigation .= '&nbsp;'.image_tag('next.gif', 'align=absmiddle');
      $navigation .= image_tag('last.gif', 'align=absmiddle');
    }
  }

  return $navigation;
}

function link_to_feed($name, $uri)
{
  return link_to(icon_tag('feed.gif', array('alt' => $name, 'title' => $name, 'align' => 'absmiddle')), $uri);
}

function span_button($text, $uri, $options = array())
{
  return link_to('<span class="span-button" style="padding: 1px 3px 1px 3px;">'.$text.'</span>', "$uri", $options);
}

function m_span_button($text, $uri, $options = array())
{
  return m_link_to('<span class="span-button" style="padding: 1px 3px 1px 3px;">'.$text.'</span>', "$uri", $options);
}

function tags_to_links($tags, $uri='tags/search')
{
	$output = '';
	foreach($tags as $tag)
	{
		$output .= link_to($tag, $uri.'?tag='.urlencode($tag)).', ';
	}
	
	return substr($output, 0, strlen($output) - 2);
}

function select_tag_yes_no($name, $selected = 0)
{
	return select_tag($name, options_for_select(array('1' => 'Yes', '0' => 'No'), $selected));
}

function yes_no($value)
{
	if ($value == 0)
	{
		return 'no';
	}
	elseif ($value == 1)
	{
		return 'yes';
	}
	else
	{
		return 'unknown value';
	}
}

function status_text($status)
{
  return format_number_choice('[0]Complete|[1]In Progress|[2]Pending/Planning|(2,+Inf]Unknown task status code)', '', $status);
}

function short_string($string, $length = 30)
{
    if (strlen($string) > ($length + 3))
    {
      return substr($string, 0, $length).'...';
    }
    return $string;
}

function nav_tabs($section, $current = null, $object = null)
{
  use_helper('sfIcon');
	if ($section == "profile")
	{
		$tabs = array();
		$tabs[] = array('text' => 'Profile',    'icon' => 'user', 'link' => '@show_user_profile?user='.$object->getUuid());
		//$tabs[] = array('text' => 'Blog',       'icon' => 'word', 'link' => 'user/show?tab=blog&user='.$object->getUuid(), 'class' => 'inactive');
		$tabs[] = array('text' => 'Personal Projects',   'icon' => 'application', 'link' => '@show_user_projects?user='.$object->getUuid());
		if (sfContext::getInstance()->getUser()->isAuthenticated() && sfContext::getInstance()->getUser()->getId() == $object->getUserId()) $tabs[] = array('text' => 'Personal',     'link' => '@show_user_personal');
		if (sfContext::getInstance()->getUser()->isAuthenticated() && sfContext::getInstance()->getUser()->getId() == $object->getUserId()) $tabs[] = array('text' => 'Edit Profile', 'link' => '@edit_user_profile');
	}
	
	if ($section == "project")
	{
		$tabs = array();
		$tabs[] = array('text' => __(sfConfig::get('app_tab_project_main')),   'link' => '@show_project_main?project='.$object->getSlug());
		$tabs[] = array('text' => __(sfConfig::get('app_tab_project_tasks')),  'link' => '@show_project_tasks?project='.$object->getSlug());
		$tabs[] = array('text' => __(sfConfig::get('app_tab_project_team')),   'link' => '@show_project_team?project='.$object->getSlug());
		$tabs[] = array('text' => __(sfConfig::get('app_tab_project_wiki')),   'link' => '@show_project_wiki?slug='.$object->getSlug().'&tab=wiki', );
		$tabs[] = array('text' => __(sfConfig::get('app_tab_project_forums')), 'link' => '@show_project_forums?project='.$object->getSlug());
		//$tabs[] = array('text' => __(sfConfig::get('app_tab_project_events')), 'link' => '@show_project_calendar?project='.$object->getSlug());
    //if ($object->isAdmin()) { $tabs[] = array('text' => 'Resources',  'link' => 'project/resources?slug='.$object->getSlug().'&tab=resources'); }
		if ($object->isAdmin()) { $tabs[] = array('text' => 'Edit',     'link' => '@show_project_tools?project='.$object->getSlug(), 'authenticated' => 'true'); }
	}

	if ($section == "projects")
	{
    if ($current == null) $current = 'browse';
                
		$tabs = array();
		$tabs[] = array('text' => __(sfConfig::get('app_tab_projects_browse')),     'link' => '@list_projects');
		$tabs[] = array('text' => __(sfConfig::get('app_tab_projects_my_projects')),'link' => '@list_my_projects',            'authenticated' => 'true');
		$tabs[] = array('text' => __(sfConfig::get('app_tab_projects_favorites')), 	'link' => '@list_favorite_projects',      'authenticated' => 'true');
		$tabs[] = array('text' => __(sfConfig::get('app_tab_projects_create')), 	  'link' => '@create_project_instructions', 'authenticated' => 'true');
		
		//$tabs[] = array('text' => __(sfConfig::get('app_tab_projects_waiting_pool')),'link' => '@show_project_waiting_pool', 'authenticated' => 'true', 'class' => 'emphasize');
	}
	
	if ($section == "messages")
	{
		$tabs = array();
		$tabs[] = array('text' => __(sfConfig::get('app_tab_messages_inbox')),    'link' => '@show_user_mailbox?folder=inbox', 'authenticated' => 'true');
		$tabs[] = array('text' => __(sfConfig::get('app_tab_messages_sent')),	    'link' => '@show_user_outbox', 'authenticated' => 'true');
		$tabs[] = array('text' => __(sfConfig::get('app_tab_messages_compose')), 	'link' => '@compose_message', 'authenticated' => 'true');
	}

	
  if ($section == "network")
	{
		$tabs = array();
		$tabs[] = array('text' => 'Main',     'link' => 'networks/index?tab=main');
		$tabs[] = array('text' => 'Pending', 'link' => 'networks/index?tab=pending');
	}

  if ($section == "members")
	{
		$tabs = array();
		$tabs[] = array('text' => 'Search Members',     'link' => '@list_users');
	}
        
  if ($section == "features")
	{
		$tabs = array();
		$tabs[] = array('text' => 'Most Recent',   'link' => 'features/list?tab=mostrecent');
		$tabs[] = array('text' => 'Most Popular', 'link' => 'features/list?tab=mostpopular');
    $tabs[] = array('text' => 'Features', 'link' => 'features/list?tab=features');
    $tabs[] = array('text' => 'Bugs', 'link' => 'features/list?tab=bugs');
	}


	$output = '';
	$output .= '<div id="project-tabs"><ul>';
  
	foreach ($tabs as $tab)
	{
		if (strtoupper(str_replace(' ', '', $tab['text'])) == strtoupper(str_replace(' ', '', $current))) { $tab['class'] = 'current'; } elseif (!isset($tab['class'])) { $tab['class'] = ''; }
// || (isset($tabs['authenticated'] && sfContext::getInstance()->getUser()->isAuthenticated())))
		if (!isset($tab['authenticated']) || (isset($tab['authenticated']) && sfContext::getInstance()->getUser()->isAuthenticated()))
                $output .= "<li class='".$tab['class']."'>".link_to(__($tab['text']), $tab['link'])."</li>";
	}
	
	$output .= '</ul></div>';

	return $output;
}

function output_panel($options = array())
{
  if (is_array($options))
  {
    $id = $options['id'];
    $class = $options['class'];
    $title = $options['title'];
    $content = $options['content'];
    
    $random = substr(md5(uniqid(rand(), true)), 0, 5);

    $controls = link_to_function('', visual_effect('fade', $id, array('duration' => 0.2)), array('class' => 'panel-controls panel-close'));
    $controls .= link_to_function('', visual_effect('toggle_blind', $id.'-content', array('duration' => 0.2)), array('class' => 'panel-controls panel-minus'));
    
    $output  = "<div id='$id' class='$class'>";
    $output .= "<div class='panel-titlebar'>$controls<span class='panel-title'>$title</span></div>";
    $output .= "<p id='$id-content' class='panel-content'>$content</p></div>";

    return $output;
  }

  return false;
}

function link_to_favorite($object, $options = array())
{	  	
	$user = sfContext::getInstance()->getUser();
  if ($user->isAuthenticated())
  {			
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
		
		// Lifted from the php.net site
    $random = substr(md5(uniqid(rand(), true)), 0, 5);
    
    $link = link_to_remote($content, array(
      'update' => 'star_'.$random,
      'url'    => '@mark_project_as_favorite?id='.$id,
      ), $options);
    
    
		return "<span id=\"star_$random\">".$link."</span>";
		
		// return content_tag('span',link_to($image,'sfStar/starit?model='.$model.'&id='.$id,'class=sf_star'));
  }
  else
  {
		return content_tag('span','');
  }
}
