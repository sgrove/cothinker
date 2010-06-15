<?php

/**
 * Subclass for representing a row from the 'ct_task' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Task extends BaseTask
{
  public function __toString()
  {
    return $this->getName();
  }
  
  public function getUsers()
  {
    return TaskUserPeer::retrieveTaskUsers($this->getId());
  }
  
  // Temporary function until we expose the ability to assign to multiple users
  public function getSingleUser($field = 'id')
  {
    $c = new Criteria();
    $c->add(TaskUserPeer::TASK_ID, $this->getId());
    $user = TaskUserPeer::doSelectOne($c);
    
    if ($user != null)
    {
	  $user = $user->getsfGuardUser()->getProfile();
      if ($field == 'id' || $field == null) return $user->getUserId();
      if ($field == 'uuid') return $user->getUuid();
	  if ($field == 'user') return $user->getsfGuardUser();
    }
    
    return null;
  }
  
  public function getOwner()
  {
    return $this->getSfGuardUser()->getProfile();
  }
  
  public function isUser($user_id)
  {
    $user = sfGuardUserPeer::retrieveByPK($user_id);
    if ($user == null) return false;
    
    sfContext::getInstance()->getLogger()->info('Searching for task user now...');
    
    $taskUser = TaskUserPeer::retrieveByTaskUser($this->getId(), $user->getId());
    
    if ($taskUser != null)
    {
      sfContext::getInstance()->getLogger()->info('Task already assigned to user...');
      return true;
    }
    
    sfContext::getInstance()->getLogger()->info('Task not assigned to user...');    
    return false;
  }
  
  public function addUser($user_id)
  {
    $user = sfGuardUserPeer::retrieveByPK($user_id);
    
    if ($user == null) return false;
    
    $profile = $user->getProfile();
    
    sfContext::getInstance()->getLogger()->info('Is task already assigned to user?');
    if ($this->isUser($user->getId()))
    {
      sfContext::getInstance()->getLogger()->info('Task already assigned to user: ['.$this->getName().']:['.$user->getFullName().']:['.$user->getUserId().']');
      return true;
    }
    
    $taskuser = new TaskUser();
    $taskuser->setTaskId($this->getId());
    $taskuser->setUserId($user->getId());
    
    try{
      $taskuser->save();
    } 
    catch (Exception $e)
    {
      sfContext::getInstance()->getLogger()->info('Exception assigning task to user, unable to continue');
      return false;
    }
    
    
    sfContext::getInstance()->getLogger()->info('Task successfully assigned to user: ['.$this->getName().']:['.$profile->getFullName().']:['.$user->getId().']');
    return true;
  }
  
  public function removeUser($user)
  {
    if (!$this->isUser($user))
    {
      return true;
    }
    
    $taskuser = TaskUserPeer::retrieveByTaskUser($this->getId(), $user->getUserId());
    
    try{
      $taskuser->delete();
    } 
    catch (Exception $e)
    {
      return false;
    }
    
    return true;
  }
  
  public function clearUsers()
  {
    $taskUsers = $this->getUsers();
    
    foreach($taskUsers as $taskUser)
    {
      $taskUser->delete();
    }
  }
  
  public function isAuthorized($user_id)
  {
    $user = sfGuardUserPeer::retrieveByPK($user_id);
    if ($user == null) return false;
    
    $project = $this->getProject();
  	
    if ($project->hasGroup('members', $user->getId()) || $project->hasGroup('admins', $user->getId()))
    {
      return true;
    }
  	
    return false;
  }
  
  public function isComplete()
  {
  	if ($this->getStatus() == 0)
  	{
  		return true;
  	}
  	
  	return false;
  }

  public function createHistoryGroup()
  {
    // TODO: subscribe the project to this task's history
    // Also, get some more soju. It's been awhile.
    $group = new HistoryGroup();
    $group->setName($this->getUuid().'-task-history');
    $group->save();
    
    $event = new HistoryEvent();
    $event->setHistoryGroupId($group->getId());
    $event->setTitle('History group created for '.$this->getName());
    $event->setText('The task '.$this->getName().' has been created and a new history group applied.');
    $event->save();
    
    return $group;
  }
  
  public function getHistoryGroup()
  {
    $group = HistoryGroupPeer::retrieveByName($this->getUuid().'-task-history');
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
    
    $project = $this->getProject();

    $this->addHistoryEvent('A new comment for task "'.$this->getName().'" in project "'.$project->getTitle().'"', 'A new comment has been added to the task '.$this->getName().' by '.$name);
    $project->addHistoryEvent('Task "'.$this->getName().'" updated with a comment', $name.' has this to say about the task "'.$this->getName().'": '.$comment['text']);
  }

  public function getStatus()
  {
    $now = new sfDate();
    $dt = new sfDate($this->getFinish());
    if (parent::getStatus() == sfConfig::get('app_task_status_open') && ($this->getFinish() < date('Y-m-d H:i:s'))) return sfConfig::get('app_task_status_overdue');
    if (parent::getStatus() == sfConfig::get('app_task_status_open') && ($now <= $dt && $now->addDay(sfConfig::get('app_task_status_upcoming_days')) >= $dt)) return sfConfig::get('app_task_status_upcoming');
    if (parent::getStatus() == sfConfig::get('app_task_status_open')) return sfConfig::get('app_task_status_open');
    if (parent::getStatus() == sfConfig::get('app_task_status_completed')) return sfConfig::get('app_task_status_completed');
    
    return sfConfig::get('app_task_status_unknown');
  }
  
  public function getStatusInWords()
  {
    if ($this->getStatus() == sfConfig::get('app_task_status_overdue')) return "overdue";
    if ($this->getStatus() == sfConfig::get('app_task_status_upcoming')) return "upcoming";
    if ($this->getStatus() == sfConfig::get('app_task_status_open')) return 'open';
    if ($this->getStatus() == sfConfig::get('app_task_status_completed')) return 'completed';
    
    return "unknown";
  }
  
  public function getPriorityInWords()
  {
    if ($this->getStatus() == sfConfig::get('app_task_priority_high')) return "high"; 
    if ($this->getStatus() == sfConfig::get('app_task_priority_medium')) return 'medium';
    if ($this->getStatus() == sfConfig::get('app_task_priority_low')) return 'low';
    return "unknown";
  }
}

$xyz = array('from'   => TaskPeer::NAME, 'to'     => TaskPeer::SLUG);


sfPropelBehavior::add('Task', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('Task', array('versionable'));
sfPropelBehavior::add('Task', array('sfPropelUuidBehavior'));
//sfPropelBehavior::add('Task', array('paranoid' => array('column' => 'deleted_at')));
sfPropelBehavior::add('Task', array('sfPropelActAsTaggableBehavior'));

sfPropelBehavior::add('Task', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));
