<?php

/**
 * Subclass for representing a row from the 'ct_project' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Project extends BaseProject
{
  public function __toString()
  {
    return $this->getTitle();
  }
  
  public function save($con = null)
  {
    if ($this->getUuid() == null || strlen($this->getUuid()) > sfConfig::get('app_uuid_project_length')) {
      $this->setUuid(myToolkit::customUuid(sfConfig::get('app_uuid_project_length')));
    }
    parent::save();
    if (sfContext::getInstance()->getUser()->isAuthenticated())
    {
      $user = sfContext::getInstance()->getUser();
      //$user->refreshCredentials();
    }
  }

  public function getDescriptionBrief($length = 100)
  {
    if (strlen($this->getDescription()) > ($length + 3))
    {
      return substr($this->getDescription(), 0, $length).'...';
    }
    return $this->getDescription();
  }

  public function getPhoto($size = "full")
  {
    $photo = sfPhotoGalleryPeer::retrieveByUuid($this->getPicture());
    
    if (is_null($photo))
    {
      $photo = "noproject.png";
    }
    else
    {
      $photo = $photo->getRealName();
    }
    
    if ($size == "small")  return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/small/'.$photo;
    if ($size == "medium") return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/medium/'.$photo;
    if ($size == "large") return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/large/'.$photo;
    if ($size == "full")  return '/'.sfConfig::get('sf_upload_dir_name').'/photos/'.$photo;
  }
  
  public function getPhotos()
  {
    return sfPhotoGalleryPeer::getPhotos('project', $this->getId());
  }
  
  public function getThumbnail()
  {
    return $this->getPhoto('small');
    //$photo = sfPhotoGalleryPeer::retrieveByUuid($this->getPicture());
    //return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/'.$photo->getRealName();
  }

  // Return users that are currently joined to the project
  // Do this by sorting through positions, and recording
  // those that are filled.
  //
  // Returns: Array of sfGuardUserProfile objects
  public function getUsers()
  {
    $users = array();
    $positions = $this->getPositions();
    sfContext::getInstance()->getLogger()->info('Positions Found: ['.count($positions).']');
    foreach ($positions as $position)
    {
      if ($position->isFilled())
      {
        sfContext::getInstance()->getLogger()->info('Positions filled, user: ['.$position->getUser().']');
        $users[] = $position->getUser()->getProfile();
      }
    }
    
    $users[] = $this->getOwner();
    
    return array_unique($users);
  }
  
  public function getPositions()
  {
    return ProjectPositionPeer::retrieveByProjectId($this->getId());
  }

  public function getUserPositions($user_id)
  {
    sfContext::getInstance()->getLogger()->info('Looking up project positions by user...');
    $output_positions = array();
    $positions = $this->getPositions();

    foreach ($positions as $position)
    {
	foreach($position->getProjectUsers() as $position_user)
	{
    	     sfContext::getInstance()->getLogger()->info('Position: ['.$position->getTitle().']:['.$position_user->getUserId().']:['.$user_id.']');  
	     if ($position_user->getUserId() == $user_id)
	      {
	        $output_positions[] = $position;
	      }
	}
    }
    
    return $output_positions;
  }
  
  public function getTagsAsArray()
  {
  	$tags = array();
  	
  	foreach ($this->getTags() as $tag)
  	{
  		$tags[] = $tag;
  	}
  	
  	return $tags;
  }
  
  public function getTagsAsText()
  {
  	return implode(', ', $this->getTagsAsArray());
  }
  
  public function getTasksJoinOwner()
  {
    return TaskPeer::retrieveByProjectIdJoined($this->getId());
  }
  
 public function getSortedTasks($sort_by, $dir = 'asc')
 {
   return TaskPeer::retrieveSortedByProjectId($this->getId(), $sort_by, $dir);
 }

 

  public function isAdmin($user = null)
  {
    sfContext::getInstance()->getLogger()->info('Checking if user is project admin');
    
    if ($user == null)
    {
      if (sfContext::getInstance()->getUser()->isAuthenticated())
      {
        $user = sfContext::getInstance()->getUser()->getId();
      } 
      else
      {
        return false;
      }
    }
    
    $result = $this->hasGroup('admins', $user);
    
    sfContext::getInstance()->getLogger()->info('finished checking: ['.$result.']');
    
    return $result;
  }
  
  public function isMember($user = null)
  {
    if ($this->hasGroup('members', $user) || $this->hasGroup('admins', $user))
    {
      return true;
    }
    
    return false;
    }

  public function getYear($format = '')
  {
  	return date('Y', strtotime(parent::getYear()));
  }
  
  public function getProjectLeads()
  {
    
  	// TODO: implement multiple project leads
  	if ($this->getSfGuardUserRelatedByOwnerId() != null)
  	{
  	  return $this->getSfGuardUserRelatedByOwnerId()->getProfile();
	  }
	  
	  return null;
  }
  
  public function setKeywords($tags)
  {
    $tags = str_replace(', ', ',', $tags);
    $tags = ereg_replace('  +', '', $tags);
    $this->removeAllTags();
    $this->addTag(explode(',', strip_tags($tags)));
  }
  
  public function getOwner()
  {
    // TODO: Allow multiple project leads
    return $this->getSfGuardUserRelatedByOwnerId()->getProfile();
  }
  
  public function hasGroup($group, $user_id)
  {
    $user = sfGuardUserPeer::retrieveByPk($user_id);

    // $user is sfGuardUser ID
    sfContext::getInstance()->getLogger()->info('checking for group ['.$this->getUuid().'-'.$group.'] for user ['.$user.']');
    

    if ($user->hasGroup($this->getUuid().'-'.$group))
    {
      sfContext::getInstance()->getLogger()->info('found, in group');
      return true;
    }
    
    sfContext::getInstance()->getLogger()->info('not found, not in group');
    return false;
  }
  
  public function createProjectGroup($name, $description)
  {
    // TODO: make sure group name does not already exist
    if (sfGuardGroupPeer::retrieveByName($this->getUuid().'-'.$name) != null)
    {
      return true;
    }
    $group = new sfGuardGroup();
    $group->setName($this->getUuid().'-'.$name);
    $group->setDescription($description);
    //$group->setDescription();
    $group->save();
  }
  
  public function createProjectPermission($name, $description)
  {
    // TODO: make sure permission does not already exist - what a PITA
    if (sfGuardPermissionPeer::retrieveByName($this->getUuid().'-'.$name) != null)
    {
      return true;
    }

    $permission = new sfGuardPermission();
    $permission->setName($this->getUuid().'-'.$name);
    $permission->setDescription($description);
    $permission->save();
  }
  
  public function grantProjectGroupPermission($group_name, $permission_name)
  {
    $permission = sfGuardPermissionPeer::retrieveByName($this->getUuid().'-'.$permission_name);
    $group = sfGuardGroupPeer::retrieveByName($this->getUuid().'-'.$group_name);
    
    if ($permission == null)
    {
      sfContext::getInstance()->getLogger()->info('permission not found: ['.$this->getUuid().$permission_name.']');
      return false;
    }
    elseif ($group == null)
    {
      sfContext::getInstance()->getLogger()->info('group not found: ['.$this->getUuid().$group_name.']');
      return false;
    }
    
    // TODO: make sure that the group permission name does not already exist
    $groupPermission = new sfGuardGroupPermission();
    $groupPermission->setGroupId($group->getPrimaryKey());
    $groupPermission->setPermissionId($permission->getId());
    $groupPermission->save();
    sfContext::getInstance()->getLogger()->info('group permission saved: ['.$this->getUuid().$group_name.']:['.$this->getUuid().$permission_name.']');
  }
  
  public function hasPermission($permission_name, $user = null)
  {
    if ($user == null)
    {
      sfContext::getInstance()->getLogger()->info('Using current user');
      if (!sfContext::getInstance()->getUser()->isAuthenticated())
      {
        return false;
      }
      $user = sfContext::getInstance()->getUser();
    }
    else
    {
      sfContext::getInstance()->getLogger()->info('Looking up user: ['.$user.']');
      $user = sfGuardUserPeer::retrieveByPK($user);
    }
    
    if ($user->hasPermission($this->getUuid().'-'.$permission_name) || $this->hasGroup('admins', $user->getId()))
    {
      sfContext::getInstance()->getLogger()->info('Permission found for user: ['.$this->getUuid().'-'.$permission_name.']:['.$user.']');
      return true;
    }
    
    sfContext::getInstance()->getLogger()->info('Group not found for user: ['.$this->getUuid().'-'.$permission_name.']:['.$user.']');
    return false;
  }
  
  public function isAuthorized($permission_name, $user_id)
  {
    $user = sfGuardUserPeer::retrieveByPK($user_id);
    if ($this->hasPermission($permission_name, $user_id) || $this->hasGroup('admins', $user_id))
    {
      return true;
    }
    
    return false;
  }
  
  public function createDefaultPermissions()
  {
    sfContext::getInstance()->getLogger()->info('New project, creating admin group');
      
    // Create Project admin group
    $this->createProjectGroup('admins', 'Group setup to administer the project ['.$this->getTitle().'], created by '.$this->getsfGuardUserRelatedByCreatedBy());
      
    // Create project member group
    $this->createProjectGroup('members', 'Group setup to hold members of the project ['.$this->getTitle().']');
  
    // Possibly add a "trusted" group of users who are not members, but can view more than others.
    
    sfContext::getInstance()->getLogger()->info('Groups saved, creating permissions');

    sfContext::getInstance()->getLogger()->info('creating delete-project permission');
    // Create appropriate permissions, assign to groups
    // 1. Delete permission
    $this->createProjectPermission('delete-project', 'The ability to delete the project, ['.$this->getTitle().'], only for project admins');
    $this->grantProjectGroupPermission('admins', 'delete-project');
    
    sfContext::getInstance()->getLogger()->info('creating handle-application permission');
    // 2. Accept applications permission
    $this->createProjectPermission('handle-applications', 'The ability to handle applications for ['.$this->getTitle().'], only for project admins');
    $this->grantProjectGroupPermission('admins', 'handle-applications');
    
    sfContext::getInstance()->getLogger()->info('creating create-task permission');
    // 3. Create Task
    $this->createProjectPermission('create-task', 'The ability to create tasks for ['.$this->getTitle().']');
    $this->grantProjectGroupPermission('admins', 'create-task');
    $this->grantProjectGroupPermission('members', 'create-task');
    
    sfContext::getInstance()->getLogger()->info('creating delete-task permission');
    // 4. Delete Task
    $this->createProjectPermission('delete-task', 'The ability to update tasks for ['.$this->getTitle().']');
    $this->grantProjectGroupPermission('admins', 'delete-task');
    $this->grantProjectGroupPermission('members', 'delete-task');

    sfContext::getInstance()->getLogger()->info('default permission set created and assigned, assigning creator to admins');
    
    // Add creator of the project to the admin group
    $user = $this->getsfGuardUserRelatedByCreatedBy();
    $user->addGroupByName($this->getUuid().'-admins');
    sfContext::getInstance()->getLogger()->info('phew, finished!');
  }
  
  public function acceptApplicant($application_id)
  {
	$application = PositionApplicationPeer::retrieveByPk($application_id);
    if ($application == null) return false;

	$position = $application->getProjectPosition();
    //if ($position == null) return false;

    $positionUser = ProjectUserPeer::retrieveByPositionIdUserId($application->getPositionId(), $application->getUserId());
	if ($positionUser == null) return false;
	
	$user = $positionUser->getsfGuardUser()->getProfile();

    if ($position == null || $user == null || $positionUser == null)
    {
      sfContext::getInstance()->getLogger()->info('Position, user, or PositionUser not found, unable to accept applicant');
      return false;
    }
    
    $positionUser->setStatus(sfConfig::get('app_project_user_status_accepted')); // Status(1): Accepted
    $positionUser->save();
    
    $position->setFilled(true); // position has been filled, goodnight everyone!
    $position->save();

	$application->setStatus(sfConfig::get('app_position_application_status_accepted'));
	$application->save();
    
    // Assign user to members group
    $user = $application->getsfGuardUser()->getId();
    $this->addUserToGroup($user, 'members');
    
    return true;
  }

  public function clonePositionAcceptApplicant($position_uuid, $user_uuid)
  {
    // retrieve desired position
    $position_old = ProjectPositionPeer::retrieveByUuid($position_uuid);
    
    // clone position
    $position = $position_old->copy();
    
    // clear uuid so it will regenerate a unique one, save
    $position->setUuid(NULL);
    $position->setFilled(true);
    $position->save();
    
    // grab desired user
    $user = sfGuardUserProfilePeer::retrieveByUuid($user_uuid);
    
    // remove applicant from old position
    $positionUser = ProjectUserPeer::retrieveByPositionIdUserId($position_old->getId(), $user->getUserId());
    if ($positionUser == null)
    {
      sfContext::getInstance()->getLogger()->info('Old PositionUser not found, unable to clone and accept applicant');
      return false;
    }
    
    $positionUser->delete();
    
    // build a new positionUser object
    $positionUser = new ProjectUser();
    $positionUser->setPositionId($position->getId());
    $positionUser->setUserId($user->getUserId());
    $positionUser->setStatus(1); // Status(1): Accepted
    $positionUser->save();


    if ($position == null || $user == null || $positionUser == null)
    {
      sfContext::getInstance()->getLogger()->info('Position, user, or PositionUser not found, unable to accept applicant');
      return false;
    }
    
    // Assign user to members group
    $user = $user->getSfGuardUser();
    $this->addUserToGroup($user, 'members');
    
    return true;
  }
  
  public function handleNewApplicant($position_id, $user_id)
  {
    $position = ProjectPositionPeer::retrieveByPK($position_id);
    $user = sfGuardUserPeer::retrieveByPK($user_id);

    // Alert the project owner of the application
    $profile = $this->getSfGuardUserRelatedByOwnerId()->getProfile();
    $profile->addHistoryEvent('New application for project "'.$this->getTitle().'"',
                              $user->getProfile()->getFullName().
                              ' has applied for a project you currently own. '.ucfirst($user->getProfile()->getGenderSubject()).' would like to join your project as "'.$position->getTitle().'". Please review the application using the applicaiton manager found on the project\'s page.', 'projects');
    
    $message = array();
    $message["from"] = $user->getId();
    $message["to"] = $this->getOwnerId();
    $message["owner"] = $this->getOwnerId();
    $message["folder"] = "inbox";
    $message["parent"] = null;
    $message["subject"] = 'New application for project "'.$this.'"';
    $message["text"] = $user->getProfile()->getFullName().' has applied for a project you currently own. '.ucfirst($user->getProfile()->getGenderSubject()).' would like to join your project as "'.$position->getTitle().'". Please review the application using the applicaiton manager found on the project\'s page.';
    
    $options = array();
    $options["copyTo"] = "none";

    $projectUser = new ProjectUser();
    $projectUser->setUserId($user->getId());
    $projectUser->setPositionId($position->getId());
    $projectUser->setStatus(sfConfig::get('app_project_user_status_pending')); // Status(3): pending review
    
    $projectUser->save();

    MessagePeer::sendSimpleMessage($message, $options);
  }

  public function addUserToGroup($user_id, $group_name)
  {
    $user = sfGuardUserPeer::retrieveByPK($user_id);
    
    if ($user == null)
    {
      sfContext::getInstance()->getLogger()->info('User not found, unable to add to group ['.$this->getUuid().'-'.$group_name.']');
      return false;
    }
    
    if (!$user->hasGroup($this->getUuid().'-'.$group_name)) $user->addGroupByName($this->getUuid().'-'.$group_name);
  }
  
  public function createHistoryGroup()
  {
    $group = new HistoryGroup();
    $group->setName($this->getUuid().'-project-history');
    $group->save();
    
    $event = new HistoryEvent();
    $event->setHistoryGroupId($group->getId());
    $event->setTitle('History group created for '.$this->getTitle());
    $event->setText('The project '.$this->getTitle().' has been created and a new history group applied.');
    $event->save();
    
    return $group;
  }
  
  public function getHistoryGroup()
  {
    $group = HistoryGroupPeer::retrieveByName($this->getUuid().'-project-history');
    if ($group == null)
    {
      $group = $this->createHistoryGroup();
    }
    
    return $group;
  }

  public function getHistory($max = 5)
  {
    $group = $this->getHistoryGroup();
    
    $c = new Criteria();
    $c->addDescendingOrderByColumn(HistoryEventPeer::CREATED_AT);
    $history = $group->getHistoryEvents($c);
    
    return array_slice($history, 0, $max);
  }
  
  public function addHistoryEvent($title, $text)
  {
    sfContext::getInstance()->getLogger()->info('grabbing project history group');
    $group = $this->getHistoryGroup();

    $event = new HistoryEvent();
    $event->setTitle($title);
    $event->setText($text);
    $event->setHistoryGroupId($group->getId());
    
    sfContext::getInstance()->getLogger()->info('adding event');    
    $event->save();

    $group->addHistoryEvent($event);
    
    $event->save();
  }

  public function getLastUpdated()
  {
    $group = $this->getHistoryGroup();
    $updated = $group->getLastHistoryEvent();

    return $updated;
  }

  public function trackChanges($old)
  {
    $changes = array();
    if ($this->getTitle() != $old->getTitle()) 
      { $changes[] = 'Title change: "'.$old->getTitle().'" -> "'.$this->getTitle().'")"'; }
    if ($this->getBegin() != $old->getBegin())
      { $changes[] = 'Project Date Begin change: "'.$old->getBegin().'" -> "'.$this->getBegin().'")"'; }
    if ($this->getFinish() != $old->getFinish())
      { $changes[] = 'Project Finish Date change: "'.$old->getFinish().'" -> "'.$this->getFinish().'")"'; }
    if ($this->getStatus() != $old->getStatus())
      { $changes[] = 'Status change: "'.$old->getTitle().'" -> "'.$this->getTitle().'")"'; }
    if ($this->getTags() != $old->getTags())
      { // Can't currently track tag changes, the copy/clone doesn't keep the tags $changes[] = 'Project Tags change: "'.implode("\n", $old->getTags()).'" -> "'.implode("\n", $this->getTags()).'")"'; }
      }

    $output = '';
    foreach ($changes as $change)
    {
      $output .= $change."\n";
    }
    
    if ($output != '')
    {
      return $output;
    }
    else
    {
      return false;
    }
  }
  
  public function addComment($comment)
  {
    // Comment *should* have author_id filled in
    // TERRIBLY f***ing hackish...no multiple inheritance...this seems to be the only way to overrride plugin behavior per-object
    $commentable = new sfPropelActAsCommentableBehavior();
    
    $comment['text'] = $comment['text'];
    $commentable->addComment($this, $comment);
    
    $author = sfGuardUserPeer::retrieveByPK($comment['author_id'])->getProfile();
    if ($author == null)
    {
      $name = "anonymous";
    }
    else
    {
    $name = $author->getFullName();
    }

    $this->addHistoryEvent('A new comment for project '.$this->getTitle(), 'A new comment has been added to the project '.$this->getTitle().' by '.$name);
  }

  public function getWiki()
  {
    $wiki = nahoWikiWikiPeer::retrieveByModelId('project', $this->getId());
    if ($wiki == null) {
      $wiki = new nahoWikiWiki();
      $wiki->setModel('project');
      $wiki->setModelId($this->getId());
      $wiki->setTitle($this->getTitle(). ' Wiki');
      $wiki->save();
    }
    
    return $wiki;
  }
  
  public function getForumCategories()
  {
    $categories = sfSimpleForumCategoryPeer::retrieveByProjectId($this->getId());
    
    if ($categories == null) {
      $owner_object = sfSimpleForumOwnerPeer::retrieveByModelId('project', $this->getId());
      if ($owner_object == null)
      {
        $owner_object = new sfSimpleForumOwner();
        $owner_object->setModel('project');
        $owner_object->setModelId($this->getId());
        $owner_object->setTitle($this->getTitle(). ' Forum Categories');
        $owner_object->save();
      }
    
      $category = new sfSimpleForumCategory();
      $category->setName($this->getTitle().' Default');
      $category->setDescription('Default forum for project '.$this->getTitle());
      $category->setOwnerId($owner_object->getId());
      $category->save();
      
      $forum = $category->newForum('Default '.$this->getTitle().' Forum', 'A general forum for discussing anything related to the project "'.$this->getTitle().'"');
      
      return $owner_object->getCategories();
    }
    
    return $categories;
  }
  
  public function getForums()
  {
    $categories = $this->getForumCategories();
    $forums = array();
    foreach ($categories as $category) {
      foreach ($category->getFora() as $forum) {
        $forums[] = $forum;
      }
    }
    
    return $forums;
  }
  
  public function getForm($title, $create = false)
  {
    sfContext::getInstance()->getLogger()->info("Getting form [".$title."], creating? (".$create.")");
    $setting = ProjectSettingPeer::retrieveByProjectIdTitle($this->getId(), 'form_'.$title);
    
    if ($setting == null || $setting->getSetting() == null)
    {
      sfContext::getInstance()->getLogger()->info("Setting not found!");
      if ($create == true) {
        return $this->setDefaultForm($title);
      }
      
      return null;
      //return $this->getForm($title);
    }
    

    $form = ProjectFormPeer::retrieveByProjectIdTitle($this->getId(), $setting->getSetting());
    
    if ($form == null)
    {
      sfContext::getInstance()->getLogger()->info("Form not found for setting [".$setting->getSetting().']');
      if ($create == true) {
        return $this->setDefaultForm($title);
      }
      
      //return $this->getForm($title);
    }
    
    return $form;
  }
  
  public function setForm($title, $form = "default")
  {
    $setting = ProjectSettingPeer::retrieveByProjectIdTitle($this->getId(), $title);
    
    if ($setting == null)
    {
      $setting = new ProjectSetting();
    
      $setting->setProjectId($this->getId());
    }
    
    $setting->setTitle('form_'.$title);
    $setting->setSetting($form);
  
    $setting->save();
  }

  public function setDefaultForm($title, $form = "default")
  {
    sfContext::getInstance()->getLogger()->info("Setting defaults for form [".$title."], setting form to (".$form.")");
    // TODO: Going to sleep now, but seems like we need to prepend the title of the form before the form - "main_default" insted of just "default"
    // TODO: Maybe it's lack of sleep, but title<->form are mixed up, it seems
    $setting = ProjectSettingPeer::retrieveByProjectIdTitle($this->getId(), $title);
    
    if ($setting == null)
    {
      sfContext::getInstance()->getLogger()->info("Setting not found when setting default (normal behavior)");
      $setting = new ProjectSetting();
    
      $setting->setProjectId($this->getId());  
      $setting->setTitle('form_'.$title);
      $setting->setSetting($form);
  
      $setting->save();
    }
    
    $new_form = ProjectFormPeer::retrieveByProjectIdTitle($this->getId(), $setting->getSetting());
    
    if ($new_form == null) {
      sfContext::getInstance()->getLogger()->info("Form not found (normal behavior)");
      $new_form = new ProjectForm();
      
      $new_form->setProjectId($this->getId());
      $new_form->setTitle($form);
       
      $new_form->save();
    }
    
    sfContext::getInstance()->getLogger()->info("Form created, setting assigned. ");
    
    return $form;
  }

  
  
  // Settings interfaces are still temporary, and not explicitely necessary
  public function getSettings()
  {
    return ProjectSettingPeer::retrieveByProjectId($this->getId());
  }
  
  public function getSetting($setting)
  {
    return ProjectSettingPeer::retrieveByProjectIdTitle($this->getId(), $setting);
  }
  
  public function setSetting($setting, $description = null)
  {
    $setting = ProjectSettingPeer::retrieveByProjectIdTitle($this->getId(), $setting);
    
    if ($setting == null) {
      $setting = new ProjectSetting();
      $setting->setProjectId($this->getId());
      $setting->setTitle($setting);
      $setting->setDescription($description); // Optional description of setting, if title is unclear
    }
    
    $setting->setSetting($setting);
    $setting->save();
  }
  
}

$xyz = array('from'   => ProjectPeer::TITLE, 'to'     => ProjectPeer::SLUG);

sfPropelBehavior::add('Project', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));
sfPropelBehavior::add('Project', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('Project', array('sfPropelActAsStarredBehavior'));
