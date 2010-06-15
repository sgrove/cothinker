<?php

/**
 * Subclass for representing a row from the 'ct_project_position' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectPosition extends BaseProjectPosition
{
  public function __toString()
  {
    return '['.$this->getProject().']:['.$this->getTitle().']';
  }

  public function isFilled()
  {
    //echo $this->__toString().' - '.$this->getStatus().'<br />';
    //if ($this->getStatus() == sfConfig::get('app_project_position_status_open')) return false;
    if ($this->getFilled() == false) return false;
    return true;
  }
  
  public function getQualificationsBrief($length = 100)
  {
    if (strlen($this->getQualifications()) > ($length + 3))
    {
      return substr($this->getQualifications(), 0, $length).'...';
    }
    return $this->getQualifications();
  }
  
  public function getUser()
  {
    if ($this->isFilled())
    {
      $projectuser = ProjectUserPeer::retrieveByPositionId($this->getId());
      if ($projectuser == null) return new sfGuardUser();
      return $projectuser->getUser();
    }
      
    return null;
  }

  public function getApplications()
  {
    return PositionApplicationPeer::retrieveByPositionId($this->getId());
  }
  // Applicants are just ProjectUsers with status != 1
  public function getApplicants()
  {
    return ProjectUserPeer::retrieveApplicantsByPositionId($this->getId());
  }
  
  public function isApplicant($user_id = null)
  {
    if ($user_id == null)
    {
      if (!sfContext::getInstance()->getUser()->isAuthenticated())
      {
        return false;
      }
      $user_id = sfContext::getInstance()->getUser()->getId();
    }

    $applicant = PositionApplicationPeer::retrieveByPositionIdUserId($this->getId(), $user_id);
    
    if ($applicant == null)
    {
      return false;
    }
    return true;
  }
  
  public function getThumbnail($size = "small")
  {
    if ($this->isFilled())
    {
      return $this->getUser()->getProfile()->getThumbnail($size);
    }
    
    $photo = "noprofile.png";
    
    if ($size == "tiny")  return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/tiny/'.$photo;
    if ($size == "small")  return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/small/'.$photo;
    if ($size == "medium") return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/medium/'.$photo;
    if ($size == "large") return '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/large/'.$photo;
  }
  
  public function getMilestones($sort_by = "deadline", $direction = "asc")
  {
    return PositionMilestonePeer::retrieveSortedByPositionId($this->getId(), $sort_by, $direction);
  }

  
  
  
  
}

//sfPropelBehavior::add('ProjectPosition', array('versionable'));
sfPropelBehavior::add('ProjectPosition', array('sfPropelUuidBehavior'));
//sfPropelBehavior::add('ProjectPosition', array('paranoid' => array('column' => 'deleted_at')));
sfPropelBehavior::add('ProjectPosition', array('sfPropelActAsCountableBehavior'));
sfPropelBehavior::add('ProjectPosition', array('sfPropelActAsTaggableBehavior'));
