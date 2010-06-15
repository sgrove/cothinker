<?php

/**
 * Subclass for performing query and update operations on the 'ct_project' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProjectPeer extends BaseProjectPeer
{
  public static function retrieveBySlug($value)
  {
    $c = new Criteria();
    $c->add(self::SLUG, $value);
    return self::doSelectOne($c);
  }
  
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    $c->add(self::UUID, $value);
    return self::doSelectOne($c);
  }

  public static function retrieveByUserId($value)
  {
    sfContext::getInstance()->getLogger()->info('retrieve projects either created or owned by user ['.$value.']');
    $c = new Criteria();
    $crit0 = $c->getNewCriterion(self::CREATED_BY, $value);
    $crit1 = $c->getNewCriterion(self::OWNER_ID, $value);
    
    $crit0->addOr( $crit1 );
    
    $c->add($crit0);
    
    return self::doSelect($c);
  }
  
  public static function retrievePager($c = null, $page = 1, $max = null)
  {
    if ($c == null)
    {
      $c = new Criteria();
    }
    
    if ($max == null)
    {
      $max = sfConfig::get('app_pager_project_max');
    }

    $c->addDescendingOrderByColumn(ProjectPeer::CREATED_AT);
    $c->setIgnoreCase( true );
    $pager = new sfPropelPager('Project', $max);
    $pager->setCriteria($c);
    //$pager->setPeerMethod('doSelectJoinSfGuardUserRelatedByOwnerId');
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function retrievePagerByUser($user_id, $page = 1, $max = null)
  {
    if ($max == null) $max = sfConfig::get('app_pager_project_max');

    sfContext::getInstance()->getLogger()->info('Begin project retrieval by user_id');

    $c = new Criteria();

    $positions = ProjectUserPeer::retrieveFilledByUserId($user_id); 

    $projects = array();

    foreach ($positions as $position)
    { 
      $projects[] = $position->getProjectPosition()->getProjectId();
    }

    if (count($projects) > 0) $c->add(self::ID, $projects, Criteria::IN);
    
    $crit0 = $c->getNewCriterion(self::CREATED_BY, $user_id);
    $crit1 = $c->getNewCriterion(self::OWNER_ID, $user_id);
    
    $crit0->addOr( $crit1 );
    
    $c->add( $crit0 );

    $pager = new sfPropelPager('Project', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();

    return $pager;
    }

  // Relies on the PropelActAsStarredBehavior Plugin
  public static function retrievePagerByUserStarred($user_id, $page = 1, $max = null)
  {
    if ($max == null) $max = sfConfig::get('app_pager_project_max');

    $c = new Criteria();
    $c->add(StarPeer::USER_ID, $user_id);
    $c->add(StarPeer::STARRED_MODEL, 'Project');
    $c->addAscendingOrderByColumn(StarPeer::STARRED_MODEL);
    sfContext::getInstance()->getLogger()->info('Grab starred project records...');
    $stars = StarPeer::doSelect($c);

    $c = new Criteria();
    $projects = array();

    sfContext::getInstance()->getLogger()->info('build project ids for query');
    foreach ($stars as $star)
    {
            $projects[] = $star->getStarredId();
    }

    sfContext::getInstance()->getLogger()->info('ID List Built! '.print_r($projects, true));

    $c->add(self::ID, $projects, Criteria::IN);

    sfContext::getInstance()->getLogger()->info('init starred pager');
    $pager = new sfPropelPager('Project', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();

    sfContext::getInstance()->getLogger()->info('got starred pager');
    return $pager;
  }
}
