<?php

/**
 * Subclass for performing query and update operations on the 'ct_task_user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TaskUserPeer extends BaseTaskUserPeer
{
  public static function retrieveTaskUsers($id)
  {
    $c = new Criteria();
    $c->add(self::TASK_ID, $id);
    return self::doSelectJoinAll($c);
  }
  
  public static function retrieveByTaskUser($task_id, $user_id)
  {
    $c = new Criteria();
    $c->add(self::TASK_ID, $task_id);
    $c->add(self::USER_ID, $user_id);
    return self::doSelectOne($c);
  }
}
