<?php

/**
 * Subclass for representing a row from the 'ct_project_user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectUser extends BaseProjectUser
{
  public function __toString()
  {
    return $this->getProject().' : '.$this->getTitle();
  }
  
  public function getUser()
  {
    return $this->getSfGuardUser();
  }
  
  public function getPositionTitle()
  {
    $position = $this->getProjectPosition();
    if ($position == null)
      return "Dead Project";
    
    return $position->getTitle();
  }
  
  public function getProjectTitle()
  {
    $position = $this->getProjectPosition();
    if ($position == null)
      return "Dead Project";
    
    $project = $position->getProject();
    
    if ($project == null)
      return "Dead Project";
    
    return $project->getTitle();
  }
  


}

sfPropelBehavior::add('ProjectUser', array('sfPropelUuidBehavior'));