<?php

/**
 * Subclass for performing query and update operations on the 'ct_project_form' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectFormPeer extends BaseProjectFormPeer
{
  public static function retrieveByProjectIdTitle($project_id, $title)
  {
    $c = new Criteria();
    
    $c->add(self::PROJECT_ID, $project_id);
    $c->add(self::TITLE, $title);
    
    return self::doSelectOne( $c );
  }
}
