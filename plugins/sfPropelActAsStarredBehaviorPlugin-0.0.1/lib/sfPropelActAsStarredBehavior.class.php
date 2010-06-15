<?php
/**
 * This Propel behavior aims at providing staring capabilities on Propel object
 *
 * @package    plugins
 * @subpackage star
 * @author     Gerald Estadieu <gestadieu@gmail.com>
 */
class sfPropelActAsStarredBehavior
{
	/**
   * Star an Object
   *
   * @param  BaseObject  $object
   **/
  public function setStar(BaseObject $object)
  {
   	$user_id = sfPropelActAsStarredBehaviorToolkit::getUserId();
		if (!$user_id)
		{
			throw new sfException('Cannot retrieve current user.');
		}
		
		$star = self::getOrCreate($object, $user_id);
		$star->setStarredModel(get_class($object));
		$star->setStarredId($object->getPrimaryKey());
		$star->setUserId($user_id);
		$star->save();
  }

  /**
   * Counts stars made on given object.
   * 
   * @param  BaseObject  $object
   * @return int
   */
  public function countStars(BaseObject $object)
  {
		$c = new Criteria();
		$c->add(StarPeer::STARRED_ID, $object->getPrimaryKey());
		$c->add(StarPeer::STARRED_MODEL, get_class($object));		
		return StarPeer::doCount($c);
  }

  /**
   * Checks if an Object has been rated by current user
   *
   * @param  BaseObject  $object
   * @param  int         $user_id  
   **/
  public function isStarred(BaseObject $object)
  {
	 	$user_id = sfPropelActAsStarredBehaviorToolkit::getUserId();
		if (!$user_id)
		{
			throw new sfException('Cannot retrieve current user.');
		}
  
		$c = new Criteria();
		$c->add(StarPeer::STARRED_ID, $object->getPrimaryKey());
		$c->add(StarPeer::STARRED_MODEL, get_class($object));
		
		$c->add(StarPeer::USER_ID,$user_id);
		return (StarPeer::doCount($c) > 0);
  }

  /**
   * Clear a star for a given object
   *
   * @param  BaseObject  $object
   **/
  public function clearStar(BaseObject $object)
  {
	 	$user_id = sfPropelActAsStarredBehaviorToolkit::getUserId();
		if (!$user_id)
		{
			throw new sfException('Cannot retrieve curent user.');
		}
  
		$c = new Criteria();
		$c->add(StarPeer::STARRED_ID, $object->getPrimaryKey());
		$c->add(StarPeer::STARRED_MODEL, get_class($object));

		$c->add(StarPeer::USER_ID,$user_id);

		StarPeer::doDelete($c);
  }


  /**
   * Retrieves an existing Star object, or return a new empty one
   *
   * @param  BaseObject  $object
   * @param  integer     $user_id  
   * @return Star
   **/
  protected static function getOrCreate(BaseObject $object, $user_id)
  {
		if ($object->isNew())
		{
		  throw new sfException('Unsaved objects cannot be starred');
		}
 
		$c = new Criteria();
		$c->add(StarPeer::STARRED_ID, $object->getPrimaryKey());
		$c->add(StarPeer::STARRED_MODEL, get_class($object));
		$c->add(StarPeer::USER_ID, $user_id);
		$ustar = StarPeer::doSelectOne($c);
		return is_null($ustar) ? new Star() : $ustar;
  }
   
  /**
   * Deletes all stars for a Starred object
   * 
   * @param  BaseObject  $object
   */
  public function preDelete(BaseObject $object)
  {
		try
		{
			$c = new Criteria();
			$c->add(StarPeer::STARRED_MODEL,get_class($object));
			$c->add(StarPeer::STARRED_ID, $object->getPrimaryKey());
			StarPeer::doDelete($c);
		}
		catch (Exception $e)
		{
		 throw new sfException('Unable to delete starred object related records');
		}
  }
}