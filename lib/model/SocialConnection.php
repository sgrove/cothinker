<?php

/**
 * Subclass for representing a row from the 'ct_social_connection' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SocialConnection extends BaseSocialConnection
{
  public function __toString()
  {
    return $this->getsfGuardUserRelatedByUser1Id().'<->'.$this->getsfGuardUserRelatedByUser2Id();
  }
  
  public function isRequester($user_id)
  {
    if ($this->getUser1Id() == $user_id)
    {
      return true;
    }
    
    return false;
  }
  
  public function isRequested($user_id)
  {
    if ($this->getUser2Id() == $user_id)
    {
      return true;
    }
    
    return false;
  }
  
  public function isMember($user_id)
  {
    if ($this->getUser1Id() == $user_id || $this->getUser2Id() == $user_id)
    {
      return true;
    }
    
    return false;
  }
  
  public function getOther($user_id)
  {
    if ($this->isMember($user_id))
    {
      if ($this->getUser1Id() == $user_id)
      {
        return $this->getUser2Id();
      }
      
      return $this->getUser1Id();
    }
    
    return false;
  }

  public function getOtherUser($user_id)
  {
    $id = $this->getOther($user_id);

    if ($id != false)
    {
      return sfGuardUserPeer::retrieveByPk($id);
    } else {
      return false;
    }
  }

  public function isPending()
  {
    if ($this->getStatus() == sfConfig::get('app_socon_status_pending'))
    {
      return true;
    }
    
    return false;
  }
}
sfPropelBehavior::add('SocialConnection', array('sfPropelUuidBehavior'));