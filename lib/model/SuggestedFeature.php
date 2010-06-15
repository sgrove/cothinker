<?php

/**
 * Subclass for representing a row from the 'ct_suggest_feature' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SuggestedFeature extends BaseSuggestedFeature
{
    public function delete($con = null)
    {
      $recommendations = sfRecommendationPeer::retrieveRecommendations('SuggestedFeature', $this->getId());
      if ($recommendations != null) $recommendations->delete();
      
      $user_recommendations = sfUserRecommendationPeer::retrieveUserRecommendations('SuggestedFeature', $this->getId());
      if ($user_recommendations != null)
      {
        foreach ($user_recommendations as $recommendation)
        {
            $recommendation->delete();
        }
      }
      
      parent::delete();
    }
    
    public function isOpen()
    {
        if ($this->getStatus() == sfConfig::get('app_feature_status_open')) return true;
        
        return false;
    }
    
    public function getStatusInWords()
    {
        if ($this->getStatus() == sfConfig::get('app_feature_status_closed')) return "closed";
        if ($this->getStatus() == sfConfig::get('app_feature_status_open')) return "open";
        if ($this->getStatus() == sfConfig::get('app_feature_status_implemented')) return "implemented";
        if ($this->getStatus() == sfConfig::get('app_feature_status_fixed')) return "fixed";
        
        return "unknown";
    }
    
    public function getCategoryInWords()
    {
        if ($this->getCategory() == sfConfig::get('app_feature_category_design')) return "design";
        if ($this->getCategory() == sfConfig::get('app_feature_category_projects')) return "projects";
        if ($this->getCategory() == sfConfig::get('app_feature_category_inbox')) return "inbox";
        if ($this->getCategory() == sfConfig::get('app_feature_category_other')) return "other";
        
        return "other";
    }
    
    public function getTypeInWords()
    {
        if ($this->getType() == sfConfig::get('app_feature_type_feature')) return "feature request";
        if ($this->getType() == sfConfig::get('app_feature_type_bug')) return "bug report";
        
        return "unknown";
    }
    
    public function setStatus($value)
    {
        parent::setStatus($value);
        $this->save();
        
        if ($this->getStatus() == sfConfig::get('app_feature_status_implemented'))
        {
            $title = 'Your '.$this->getTypeInWords().' "'.$this->getTitle().'" was implemented!';
            $text = 'Thank you very much for your '.$this->getTypeInWords().', we really appreciate all your feedback. We have reviewed your report, and have implemented your suggestion. If we missed what you were trying to suggest, feel free to comment on the request and flag it for our later review. Again, thank you very much for your participation in making Cothink work better for you!';
        }
        elseif ($this->getStatus() == sfConfig::get('app_feature_status_closed'))
        {
            $title = 'Your '.$this->getTypeInWords().' "'.$this->getTitle().'" has been closed.';
            $text = 'Thank you very much for your '.$this->getTypeInWords().', we appreciate every suggestion we recieve. We have reviewed your report, and have chosen not to implement it at this time. Usual reasons for this are (a) it is outside our scope, or (b) the suggestion is a duplicate of another already active suggestion. If you feel we have made an error in this, please feel free to comment on the request and flag it for our later review. Again, thank you very much for your participation in making Cothink work better for you!';
        }
        elseif ($this->getStatus() == sfConfig::get('app_feature_status_open'))
        {
            $title = 'Your '.$this->getTypeInWords().' "'.$this->getTitle().'" has been opened.';
            $text = 'Thank you very much for your '.$this->getTypeInWords().', we appreciate every suggestion we recieve. Yours has been opened and we\'re going to review it as soon as possible - feel free to keep up on it by viewing the details page for your suggestion. Again, thank you very much for your participation in making Cothink work better for you!';
        }
        elseif ($this->getStatus() == sfConfig::get('app_feature_status_fixed'))
        {
            $title = 'Your '.$this->getTypeInWords().' "'.$this->getTitle().'" was fixed!';
            $text = 'Thank you very much for your '.$this->getTypeInWords().', we really appreciate all your feedback. We have reviewed your report, and have fixed the issue according to your suggestion. If we missed what you were trying to suggest, feel free to comment on the request and flag it for our later review. Again, thank you very much for your participation in making Cothink work better for you!';
        }
        else
        {
            return null;
        }
        
        $this->getsfGuardUser()->getProfile()->addHistoryEvent($title, $text, 'suggestions');
    }
    
    public function createHistoryGroup()
    {
      // TODO: subscribe the project to this task's history
      // Also, get some more soju. It's been awhile.
      $group = new HistoryGroup();
      $group->setName('feature-history-'.$this->getUuid());
      $group->save();
      
      $event = new HistoryEvent();
      $event->setHistoryGroupId($group->getId());
      $event->setTitle('History group created for '.$this->getTitle());
      $event->setText('The '.$this->getTypeInWords().' "'.$this->getTitle().'" has been created and a new history group applied.');
      $event->save();
      
      return $group;
    }
    
    public function getHistoryGroup()
    {
      $group = HistoryGroupPeer::retrieveByName('feature-history-'.$this->getUuid());
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
    
    public function addHistoryEvent($title, $text, $category = 'features')
    {
      sfContext::getInstance()->getLogger()->info('grabbing project history group');
      $group = $this->getHistoryGroup();
  
      $event = new HistoryEvent();
      $event->setTitle($title);
      $event->setText($text);
      $event->setHistoryGroupId($group->getId());
      $event->setCategory($category);
      
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
      
     $this->addHistoryEvent('A new comment for the '.$this->getTypeInWords().', "'.$this->getTitle().'" was added', 'A new comment has been added to the '.$this->getTypeInWords().' by '.$name, 'comments');
    }
    
    public function save($conn = null)
    {
        $new = false;
        
        if ($this->isNew()) $new = true;
        
        parent::save($conn);
        
        if ($new == true)
        {
            $this->addHistoryEvent('A '.$this->getTypeInWords().' was created by '.$this->getsfGuardUser()->getProfile()->getFullname(), '"'.$this->getTitle().'" was created. Full Text: '.$this->getDescription());
            // TODO: Change the following to a global "watching" admin user/group
            //$user = sfGuardUserPeer::retrieveByUsername('sgrove@cothink.org');
            //$user->getProfile()->subscribeToHistory($this->getHistoryGroup());
            
            $this->getsfGuardUser()->getProfile()->subscribeToHistory($this->getHistoryGroup());
        }
    }
}

sfPropelBehavior::add('SuggestedFeature', array('sfPropelActAsRecommendableBehavior'));

$xyz = array('from'   => SuggestedFeaturePeer::TITLE, 'to'     => SuggestedFeaturePeer::SLUG);
sfPropelBehavior::add('SuggestedFeature', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));
sfPropelBehavior::add('SuggestedFeature', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('SuggestedFeature', array('sfPropelActAsStarredBehavior'));
sfPropelBehavior::add('SuggestedFeature', array('sfPropelUuidBehavior'));