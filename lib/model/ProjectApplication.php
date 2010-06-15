<?php

/**
 * Subclass for representing a row from the 'ct_project_application' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectApplication extends BaseProjectApplication
{
  public function save($conn = null)
  {
    $uuid = myToolkit::customUuid(sfConfig::get('app_uuid_project_length'));
    if ($this->getUuid() == null) {$this->setUuid($uuid); }
    parent::save($conn);
  }
  
  public function getTagsAsText ()
  {
      return implode(', ', $this->getTags());
  }
  
  public function getStatusInWords ()
  {
    if ($this->getStatus() == sfConfig::get('app_project_application_status_unapproved')) return 'unapproved';
    if ($this->getStatus() == sfConfig::get('app_project_application_status_approved')) return 'approved';
    if ($this->getStatus() == sfConfig::get('app_project_application_status_declined')) return 'declined';
    if ($this->getStatus() == sfConfig::get('app_project_application_status_pending')) return 'pending approval';
    return 'unknown';
  }
  
  public function getLengthInWords ()
  {
    if ($this->getPreferredTermLength() == sfConfig::get('app_time_length_no_preference')) return 'No preference';
    if ($this->getPreferredTermLength() == sfConfig::get('app_time_length_less_one_quarter')) return 'Less than 1 quarter (10 weeks)';
    if ($this->getPreferredTermLength() == sfConfig::get('app_time_length_one_quarter')) return 'Around 1 quarter (10 weeks)';
    if ($this->getPreferredTermLength() == sfConfig::get('app_time_length_one_semester')) return 'Around 1 semester (16 weeks)';
    if ($this->getPreferredTermLength() == sfConfig::get('app_time_length_one_year')) return 'Around 1 year';
    if ($this->getPreferredTermLength() == sfConfig::get('app_time_length_ongoing')) return 'It\'s an ongoing project';
    if ($this->getPreferredTermLength() == sfConfig::get('app_time_length_unknown')) return 'I have no idea, and the Cothink community isn\'t even sure';
    
    return 'unknown length code';
  }

  public function getPreferredTermLengthInWords ()
  {
    if ($this->getLength() == sfConfig::get('app_time_length_no_preference')) return 'No preference';
    if ($this->getLength() == sfConfig::get('app_time_length_quarter')) return 'Quarter system';
    if ($this->getLength() == sfConfig::get('app_time_length_semester')) return 'Semester system';
    if ($this->getLength() == sfConfig::get('app_time_length_year')) return 'Year long commitment';
    if ($this->getLength() == sfConfig::get('app_time_length_ongoing')) return 'Ongoing commitment';
    
    return 'unknown preferred term length code';
  }

  public function getPercentComplete ()
  {
    $percent = 0;
    if ($this->getPage1Complete() == true) $percent += 25;
    if ($this->getPage2Complete() == true) $percent += 25;
    if ($this->getPage3Complete() == true) $percent = 100;
    if ($this->getPage4Complete() == true) $percent += 25;
    
    return $percent;
  }
  
  public function adminApprove ()
  {
    $this->setStatus(sfConfig::get('app_project_application_status_approved'));
    $this->setApprovedBy('admin');
    
    $this->approve();
    $this->save();
  }

  public function communityApprove ()
  {
    $this->setStatus(sfConfig::get('app_project_application_status_approved'));
    $this->setApprovedBy('community');

    $this->approve();
    $this->save();
  }
  
  public function voteUp($user_id)
  {
    $user = sfGuardUserProfilePeer::retrieveByUserId($user_id);
    if ($user == null) return false;
    
    $this->setPoints($this->getPoints() + $user->getUserVotingPoints());
    
    $this->save();
    
    if ($this->getPoints() > sfConfig::get('app_project_application_approval_threshold')) {
      $this->CommunityApprove();
    }
  }
  
  public function approve()
  {
    if (!$this->getIsApproved()) {
      $this->setIsApproved( true );
      
      $project = new Project();

      $project->setCreatedBy($this->getCreatedBy());
      $project->setOwnerId($this->getOwnerId());
      $project->setDepartmentId($this->getDepartmentId());
      $project->setCampusId($this->getCampusId());
      $project->setTitle($this->getTitle());

      $project->setDescription($this->getDescription());
      $project->setNotes($this->getNotes());

      $project->setBegin($this->getBegin());
      $project->setFinish($this->getFinish());

      $project->setMainForm('default');

      $project->setPublished( true );
      $project->setIsApproved( true );

      $project->save();
    }
  }
  
  public function setDeclined()
  {
    $this->setStatus(sfConfig::get('app_project_application_status_declined'));
    
    $this->save();
    
    $this->getsfGuardUserRelatedByOwnerId()->getProfile()->notify('Your project application has been declined. Please check out the app review page for more details.');
  }

  

  

  
}

sfPropelBehavior::add('ProjectApplication', array('sfPropelActAsCommentableBehavior'));
sfPropelBehavior::add('ProjectApplication', array('versionable'));
//sfPropelBehavior::add('ProjectApplication', array('sfPropelUuidBehavior'));
//sfPropelBehavior::add('ProjectApplication', array('paranoid' => array('column' => 'deleted_at')));
sfPropelBehavior::add('ProjectApplication', array('sfPropelActAsTaggableBehavior'));
