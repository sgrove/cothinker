<?php

/**
 * Subclass for performing query and update operations on the 'ct_task' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TaskPeer extends BaseTaskPeer
{
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    $c->add(self::UUID, $value);
    return self::doSelectOne($c);
  }
  
  public static function retrieveBySlug($value)
  {
    $c = new Criteria();
    $c->add(self::SLUG, $value);
    return self::doSelectOne($c);
  }
  
  public static function retrieveByProjectIdJoined($value)
  {
    $c = new Criteria();
    $c->add(self::PROJECT_ID, $value);
    return self::doSelectJoinAll($c);
  }
  
  public static function retrieveSortedByProjectId($project_id, $sort_by = 'finish', $dir = 'asc')
  {
    $c = new Criteria();
    $c->add(self::PROJECT_ID, $project_id);
    
    $column = self::FINISH;
    
    if ($sort_by == 'finish') {
      $column = self::FINISH;
    }
    elseif ($sort_by == 'start') {
      $column = self::START;
    }
    elseif ($sort_by == 'name') {
      $column = self::NAME;
    }
    elseif ($sort_by == 'priority') {
      $column = self::PRIORITY;
    }
    elseif ($sort_by == 'assigned_by') {
      $column = self::OWNER_ID;
    }
    elseif ($sort_by == 'status') {
      $column = self::STATUS;
    }
    elseif ($sort_by == 'created') {
      $column = self::CREATED_AT;
    }
    
    
    
    
    
    if (strtolower($dir) == 'asc') {
      $c->addAscendingOrderByColumn($column);
    }
    else
    {
      $c->addDescendingOrderByColumn($column);
    }
    
    return self::doSelectJoinAll($c);
  }
  
  public static function retrieveByUserId($value, $criteria = null)
  {
    $c = new Criteria();

    $c->add(TaskUserPeer::USER_ID, $value);
    
    $results = TaskUserPeer::doSelect( $c );
    
    $task_ids = array();
    
    foreach ($results as $result) {
      $task_ids[] = $result->getTaskId();
    }
    
    if ($criteria == null) {
      $c = new Criteria();
    }
    else {
      $c = clone $criteria;
    }
    
    $c->add(self::ID, $task_ids, Criteria::IN);
    
    return self::doSelect( $c );
  }
}
