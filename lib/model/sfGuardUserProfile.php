<?php

/**
 * Subclass for representing a row from the 'ct_user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfGuardUserProfile extends BasesfGuardUserProfile
{
  public function __toString()
  {
    return substr($this->getFirstName(),0,1).' '.$this->getLastName();
  }
  
  public function getUsername ()
  {
    return $this->getsfGuardUser()->getUsername();
  }

  
  public function getFullName()
  {
    return $this->getFirstName().' '.$this->getLastName();
  }
  
  public function getLastNameFirstName()
  {
    return $this->getLastName().' '.$this->getFirstName();
  }
  
  public function getPhoto($size = "full")
  {
    $photo = sfPhotoGalleryPeer::retrieveByUuid($this->getPicture());
    
    if (is_null($photo))
    {
      $photo = "noprofile.png";
    }
    else
    {
      $photo = $photo->getRealName();
    }
    
    if ($size == "tiny")  return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/tiny/'.$photo;
    if ($size == "small")  return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/small/'.$photo;
    if ($size == "medium") return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/medium/'.$photo;
    if ($size == "large") return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/large/'.$photo;
    if ($size == "full")  return '/'.sfConfig::get('sf_upload_dir_name').'/photos/'.$photo;
  }
  
  public function getPhotos()
  {
    return sfPhotoGalleryPeer::getPhotos('User', $this->getUserId());
  }
  
  public function getThumbnail()
  {
    return $this->getPhoto('small');
    //$photo = sfPhotoGalleryPeer::retrieveByUuid($this->getPicture());
    //return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/'.$photo->getRealName();
  }
  
  public function getContacts()
  {
    return ContactInfoPeer::getAllUserContactInfo($this->getUserId());
  }
  
  public function getPrimaryContactInfo()
  {
    $contact = ContactInfoPeer::getUserContactInfo($this->getUserId(), 'primary');
    if ($contact == null)
    {
      $contact = new ContactInfo();
      $contact->setTitle('Primary');
      $contact->setEmail($this->getsfGuardUser()->getUserName());
      $contact->setPrivacyLevel(sfConfig::get('app_profile_privacy_default'));
      $contact->setUserId($this->getUserId());
      
      $contact->save();
    }
    
    return $contact;
  }
  
  public function getProjectApplications ($status = null)
  {
    if ($status == null || $status == "unapproved") {
      //return ProjectApplicationPeer::retrieveUnapprovedByUserId($this->getUserId());
      return ProjectApplicationPeer::retrieveByUserId($this->getUserId());
    }
  }

  

  public function getProjects()
  {
	  sfContext::getInstance()->getLogger()->info('Filtering user positions for projects...');
	  $positions = $this->getPositionsUser();

	  $projects = array();

	  foreach ($positions as $position)
	  {
		  $projects[] = $position->getProjectPosition()->getProject();
	  }
          
    foreach (ProjectPeer::retrieveByUserId($this->getUserId()) as $project)
    {
      $projects[] = $project;
    }
    
    foreach ($projects as $key => $value) {
      if ($projects[$key] == null) {
        unset($projects[$key]);
      }
    }

	  return array_unique($projects);
  }

  public function getPositions()
  {
	  sfContext::getInstance()->getLogger()->info('Filtering user positions for projects...');
	  $positionsUser = $this->getPositionsUser();

	  $positions = array();

	  foreach ($positionsUser as $positionUser)
	  {
		  $positions[] = $positionUser->getPosition();
	  }

	  return $positions;
  }
  
  public function getPositionsUser()
  {
	sfContext::getInstance()->getLogger()->info('Grabbing user positions...');
	return ProjectUserPeer::retrieveFilledByUserId($this->getUserId());
  }

  public function setNoPicture()
  {
    $this->setPicture('noprofile_100.png');
  }

  // == Extend the model for business logic

  public function save($con = null)
  {
      // == pre save hook
      // fill prereq fields

      // == call the parent save() method
      parent::save($con);
  }

  public function isUser($user_id)
  {
	  if ($this->getUserId() == $user_id)
	  {
		  return true;
	  }
	  
	  if ((string) $this->getUuid() == (string) $user_id)
	  {
		  return true;
	  }
	  

	  return false;
  }
  
  public function subscribeToHistory($historyGroup)
  {
    $group = HistoryGroupPeer::retrieveByName($historyGroup);
    
    $c = new Criteria();
    
    $c->add(HistoryGroupUserPeer::HISTORY_GROUP_ID, $group->getId());
    $c->add(HistoryGroupUserPeer::USER_ID, $this->getSfGuardUser()->getId());
    
    $subscription = HistoryGroupUserPeer::doSelectOne($c);
    
    if ($subscription == null)
    {
      sfContext::getInstance()->getLogger()->info('User not subscribing, subscribing now');
      $subscription = new HistoryGroupUser();
      $subscription->setHistoryGroupId($group->getId());
      $subscription->setUserId($this->getSfGuardUser()->getId());
      $subscription->save();
      $this->addHistoryEvent('You have subscribe to a feed', 'You will now be alerted for whenever the feed '.$historyGroup.' is updated. The updates will also be available on your external RSS feed.', 'feeds');

      return true;
    }
    
    sfContext::getInstance()->getLogger()->info('User already subscribing');
    
    return true;
  }
  
  public function unsubscribeToHistory($historyGroup)
  {
    $group = HistoryGroupPeer::retrieveByName($historyGroup);
    
    $c = new Criteria();
    
    $c->add(HistoryGroupUserPeer::HISTORY_GROUP_ID, $group->getId());
    $c->add(HistoryGroupUserPeer::USER_ID, $this->getSfGuardUser()->getId());
    
    $subscription = HistoryGroupUserPeer::doSelectOne($c);
    
    if ($subscription == null)
    {
      sfContext::getInstance()->getLogger()->info('User not subscribed anyway');
      return true;
    }
    
    $subscription->delete();
    
    $this->addHistoryEvent('You have unsubscribe a feed', 'You will no longer be alerted whenever the feed '.$historyGroup.' is updated. The updates will also no longer appear in your external RSS feed.', 'feeds');
      
    
    sfContext::getInstance()->getLogger()->info('User unsubscribed');
    
    return true;
  }
  
  public function isSubscribedToHistoryGroup($historyGroup)
  {
    $group = HistoryGroupPeer::retrieveByName($historyGroup);
    
    $c = new Criteria();
    
    $c->add(HistoryGroupUserPeer::HISTORY_GROUP_ID, $group->getId());
    $c->add(HistoryGroupUserPeer::USER_ID, $this->getSfGuardUser()->getId());
    
    $subscription = HistoryGroupUserPeer::doSelectOne($c);
    
    if ($subscription == null)
    {
      sfContext::getInstance()->getLogger()->info('User is not subscribed');
      return false;
    }

    sfContext::getInstance()->getLogger()->info('User is subscribed');
    return true;
  }
  
  public function getHistory($max = 5)
  {
    return HistoryEventPeer::retrieveByUser($this->getUserId(), $max);
  }

  public function createHistoryGroup()
  {
    $group = new HistoryGroup();
    $group->setName($this->getUuid().'-user-history');
    $group->save();
    
    $event = new HistoryEvent();
    $event->setHistoryGroupId($group->getId());
    $event->setTitle('History tracking created for '.$this->getFullName());
    $event->setText('You keep track of all of your recent activity via your history tracker.');
    $event->save();
    
    $this->subscribeToHistory($group->getName());
    
    return $group;
  }

  public function getHistoryGroup()
  {
    $group = HistoryGroupPeer::retrieveByName($this->getUuid().'-user-history');
    if ($group == null)
    {
      $group = $this->createHistoryGroup();
    }
    
    return $group;
  }

  public function addHistoryEvent($title, $text, $category = 'general')
  {
    sfContext::getInstance()->getLogger()->info('grabbing user history group');
    $group = $this->getHistoryGroup();

    $event = new HistoryEvent();
    $event->setTitle($title);
    $event->setText($text);
    $event->setCategory($category);
    $event->setHistoryGroupId($group->getId());
    $event->setUserId($this->getUserId());
    
    sfContext::getInstance()->getLogger()->info('adding event');    
    $event->save();

    $group->addHistoryEvent($event);
    
    $event->save();
  }
  
  public function getConnection($user_id)
  {
    $socon = null;
    
    if (sfContext::getInstance()->getUser()->isAuthenticated())
    {
      $socon = SocialConnectionPeer::retrieveByUsers($this->getUserId(), $user_id);
    }
    
    return $socon;
  }

  public function isConnected($user_id, $status = null)
  {
    if ($status == null)
    {
      //$status = sfConfig::get('app_socon_status_approved');
    }

    sfContext::getInstance()->getLogger()->info('Checking for a pre-existing socon');

    // socon == SocialConnection
    $socon = SocialConnectionPeer::retrieveByUsers($this->getUserId(), $user_id, $status);
    
    if ($socon == null)
    {
      sfContext::getInstance()->getLogger()->info('no pre-existing socon found');
      return false;
    }
    
    sfContext::getInstance()->getLogger()->info('found pre-existing socon');
    return true;
  }
  
  public function addConnection($user_id)
  {
    if ($this->isConnected($user_id))
    {
      return false;
    }
    
    $socon = new SocialConnection();
    $socon->setUser1Id($this->getUserId());
    $socon->setUser2Id($user_id);
    $socon->setStatus(sfConfig::get('app_socon_status_pending'));
    
    $socon->save();
    
    return true;
  }
  
  public function getConnections($status = null)
  {
    if ($status == null)
    {
      $status = sfConfig::get('app_socon_status_approved');
    }

    sfContext::getInstance()->getLogger()->info('Getting approved connections...');
    return SocialConnectionPeer::retrieveByUserId($this->getUserId(), $status);
  }
  
  public function getPendingConnections()
  {
    return SocialConnectionPeer::retrievePendingByUserId($this->getUserId());
  }
  
  public function getApprovableConnections()
  {
    return SocialConnectionPeer::retrieveApprovableByUserId($this->getUserId());
  }

  public function getAllPendingConnections()
  {
    $status = sfConfig::get('app_socon_status_pending');
    return SocialConnectionPeer::retrieveByUserId($this->getUserId(), $status);
  }
  
  public function checkPrivacyLevel($level)
  {
    if ($this->getPrivacyLevel() == $level) return true;
    
    return false;
  }
  
  // Used to generate the RSS feeds based on user's network
  // relies on sfFeed2Plugin
  public function getDefaultFeed($max = 25)
  {
    $feed = new sfRssFeed();

    $feed->initialize(array(
      'title'       => 'Cothink Feed for '.$this->getFullName(),
      'link'        => 'http://www.cothink.org/',
      'authorEmail' => $this->getPrimaryContactInfo()->getEmail(),
      'authorName'  => $this->getFullName()
    ));
  
    $events = HistoryEventPeer::retrieveByUser($this->getUserId(), $max); // TODO: Allow user to configure max
  
    $eventItems = sfFeedPeer::convertObjectsToItems($events, array('routeName' => '@permalink'));
    $feed->addItems($eventItems);
    
    return $feed;
  }
  
  public function getGenderSubject()
  {
    if ($this->getGender() == sfConfig::get('app_profile_male')) return "he";
    if ($this->getGender() == sfConfig::get('app_profile_female')) return "she";
    return "they";
  }

  public function getGenderObject()
  {
    if ($this->getGender() == sfConfig::get('app_profile_male')) return "him";
    if ($this->getGender() == sfConfig::get('app_profile_female')) return "her";
    return "them";
  }
  
  public function getTodos($type = "all", $max = 5)
  {
    sfContext::getInstance()->getLogger()->info('begin selecting upcoming tasks');
    $c = new Criteria();
    $c->addAscendingOrderByColumn(TaskPeer::FINISH);
    $c->add(TaskPeer::STATUS, sfConfig::get('app_task_status_open'));
    $c->add(TaskPeer::DELETED_AT, null);
    $tasks = TaskPeer::retrieveByUserId($this->getUserId(), $c);
    sfContext::getInstance()->getLogger()->info('finish selecting upcoming tasks');

    sfContext::getInstance()->getLogger()->info('begin selecting todos, though the date is f#$2d up');
    $c = new Criteria();
    $c->addAscendingOrderByColumn(ToDoPeer::FINISH);
    $todos = $this->getsfGuardUser()->getTodos( $c );
    sfContext::getInstance()->getLogger()->info('finished grabbing screwy todo list');    
    if ($type == "all") {
      $tasks_array = array();
      $task_array['todos'] = $todos;
      $task_array['tasks'] = $tasks;
      
      return $task_array;
    }
    elseif ($type == 'todos') {
      return $todos;
    }
    
    return $tasks;
  }
  
  public function getUserVotingPoints()
  {
    return $this->getKarma() * sfConfig::get('app_user_points_karma_mod', 1);
  }
  
  public function getTwitterUsername()
  {
    $services = $this->getExternalServices();
    
    if ($services == null) return false;
    
    if ($services->getTwitterConfirmed()) return $services->getTwitterUsername();
  }
  
  public function getExternalServices()
  {
    $es = ExternalServicePeer::retrieveByUserId($this->getUserId());
    
    if ($es == null)
    {
      $es = new ExternalService();
    
      $es->setUserId($this->getUserId());
      $es->save();
    }
    
    return $es;
  }

  public function notify($message, $options = array())
  {
    $es = $this->getExternalServices();
    
    if ($es->getTwitterUpdate()) {
      $this->sendTwitterMessage($message);
    }
    
    /*
    if ($es->getFacebookUpdate())
    {
      $this->sendFacebookMessage($message)
    }
    */
  }
  
  public function sendTwitterMessage($message, $options = array())
  {
    if (!isset($options["full"]) || $options["full"]  == false)
    {
  	  if (strlen($message) > 100) {
  	   $message = substr($message, 0, 100).'...';
  	  }
    }
    
    $twitter = new TwitterService(sfConfig::get('app_external_twitter_username'), sfConfig::get('app_external_twitter_password'));
    
    $response = $twitter->sendMessage($this->getTwitterUsername(), $message);
    
    return $response->isError();
  }
  
  public function addKarma($points = 1)
  {
    $this->setKarma($this->getKarma() + $points);
    $this->save();
  }
  
  public function removeKarma($points = 1)
  {
    $this->setKarma($this->getKarma() - $points);
    $this->save();
  }
}

sfPropelBehavior::add('private_key', array('sfPropelUuidBehavior'));