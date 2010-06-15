<?php

/**
 * Subclass for representing a row from the 'ct_history_event' table.
 *
 * 
 *
 * @package lib.model
 */ 
class HistoryEvent extends BaseHistoryEvent
{
    public function getCategory()
    {
        $category = parent::getCategory();
        
        if ($category == null)
        {
            $category = 'General';
        }
        
        return $category;
    }
    
    public function getCategoryColor()
    {
      //return 'app_display_event_color_'.strtolower($this->getCategory());
      $color = sfConfig::get('app_display_event_color_'.strtolower($this->getCategory()), sfConfig::get('app_display_event_color_default', 'white'));
      
      return $color;
    }

    
    
    public function save($con = null)
    {
        if ($this->getUserId() == null)
        {
            if (sfContext::getInstance()->getUser()->isAuthenticated())
            {
                $this->setUserId(sfContext::getInstance()->getUser()->getId());
            }
            else
            {
                $user = sfGuardUserPeer::retrieveByUsername('admin');
                $this->setUserId($user->getId());
            }
        }
        
        parent::save();
    }
    
    public function getLanding()
    {
        return $this->getUuid();
    }
    
    public function getDescription()
    {
        return $this->getText();
    }
}

sfPropelBehavior::add('HistoryEvent', array('sfPropelUuidBehavior'));