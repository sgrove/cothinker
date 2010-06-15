<?php

/**
 * Subclass for representing a row from the 'ct_user_todo' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ToDo extends BaseToDo
{
  public function getStatusInWords()
  {
    if ($this->getStatus() == sfConfig::get('app_task_status_open') && ($this->getFinish() < date('Y-m-d H:i:s'))) return "overdue"; 
    if ($this->getStatus() == sfConfig::get('app_task_status_open')) return "open";
  }

  
}

$xyz = array('from'   => ToDoPeer::NAME, 'to'     => ToDoPeer::SLUG);
sfPropelBehavior::add('ToDo', 
                    array('sfPropelActAsSluggableBehavior' => 
                      array('columns'   => $xyz, 
                            'separator' => '_', 
                            'permanent' => false)));
sfPropelBehavior::add('ToDo', array('sfPropelUuidBehavior'));