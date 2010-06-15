<?php

/**
 * Subclass for performing query and update operations on the 'star' table.
 *
 * 
 *
 * @package plugins.sfPropelActAsStarredBehaviorPlugin.lib.model
 */ 
class StarPeer extends BaseStarPeer
{
	/**
   * Retrieves starred objects for a user
   *
   * @param  int    $user_id
   * @param  array  $options
   * @return array  
   **/
  public static function getUserStars($user_id = null, $options = array())
  { 
		if (!$user_id)
		{
			$user_id = sfPropelActAsStarredBehaviorToolkit::getUserId();
		}
		if (!$user_id)
		{
			throw new sfException('Cannot retrieve current user.');
		}
	
		$c = new Criteria();
		$c->add(StarPeer::USER_ID, $user_id);
		
		if (isset($options['model']))
		{
			$c->add(StarPeer::STARRED_MODEL, $options['model']);			
		}
		$c->addAscendingOrderByColumn(StarPeer::STARRED_MODEL);
		$stars = StarPeer::doSelect($c);
		$results = array();

		foreach ($stars as $star)
		{
			$c = new Criteria();
			$peer = $star->getStarredModel() .'Peer';
			$object = call_user_func(array($peer, 'retrieveByPK'), $star->getStarredId());

			$results[] = $object;
		}
		return $results;
  }

  /**
   * Counts stars made by a given user.
   * 
   * @param  int  $user_id
   * @return int
   */
  public static function countUserStars($user_id = null)
  {
		if (!$user_id)
		{
			$user_id = sfPropelActAsStarredBehaviorToolkit::getUserId();
		}
		if (!$user_id)
		{
			throw new sfException('Cannot retrieve current user.');
		}
		$c = new Criteria();
		$c->add(StarPeer::USER_ID,$user_id);
		return StarPeer::doCount($c);
  }
}
