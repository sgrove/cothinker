<?php

/**
 * Subclass for representing a row from the 'ct_project_form' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectForm extends BaseProjectForm
{
  public function __toString()
  {
    return $this->getTitle();
  }
  
  public function getWidget($widget, $default = null)
  {
    switch ($widget) {
      case '1':
        return $this->getWidget1($default);
        break;

      case '2':
        return $this->getWidget2($default);
        break;
        
      case '3':
        return $this->getWidget3($default);
        break;

      case '4':
        return $this->getWidget4($default);
        break;
    }
    
    return null;
  }
  
  public function getWidget1 ($default = null)
  {
    if (parent::getWidget1() == null) {
      return $default;
    } 
    
    return parent::getWidget1();
  }

  public function getWidget2 ($default = null)
  {
    if (parent::getWidget2() == null) {
      return $default;
    } 
    
    return parent::getWidget2();
  }
  
  public function getWidget3 ($default = null)
  {
    if (parent::getWidget3() == null) {
      return $default;
    } 
    
    return parent::getWidget3();
  }
  
  public function getWidget4 ($default = null)
  {
    if (parent::getWidget4() == null) {
      return $default;
    } 
    
    return parent::getWidget4();
  }
  
}
