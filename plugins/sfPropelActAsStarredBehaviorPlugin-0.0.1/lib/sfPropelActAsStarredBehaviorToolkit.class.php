<?php
/**
 * Symfony Propel starred behavior plugin toolkit 
 * 
 * @package plugins
 * @subpackage staring
 * @author Gerald Estadieu
 */
class sfPropelActAsStarredBehaviorToolkit 
{
  /**
   * Returns true if the model is starred
   * 
   * @param      string  $model
   * @return     boolean
   */
  public static function isStarred($model)
  {
    if (is_object($model))
    {
      $model = get_class($model);
    }
    
    if (!is_string($model))
    {
      throw new Exception('The param passed to the metod isStarred must be a string.');
    }
    
    if (!class_exists($model))
    {
      throw new Exception(sprintf('Unknown class %s', $model));
    }
    
    $base_class = sprintf('Base%s', $model);
    return !is_null(sfMixer::getCallable($base_class.':setStar'));
  }

  /**
   * Retrieve a starred object
   * 
   * @param  string  $object_model
   * @param  int     $object_id
	 * @return object
   */
  public static function retrieveStarredObject($object_model, $object_id)
  {
    try
    {
      $peer = sprintf('%sPeer', $object_model);
    
      if (!class_exists($peer))
      {
        throw new Exception(sprintf('Unable to load class %s', $peer));
      }
    
      $object = call_user_func(array($peer, 'retrieveByPk'), $object_id);
    
      if (is_null($object))
      {
        throw new Exception(sprintf('Unable to retrieve %s with primary key %s', $object_model, $object_id));
      }
    
      if (!sfPropelActAsStarredBehaviorToolkit::isStarred($object))
      {
        throw new Exception(sprintf('Class %s does not have the starred behavior', $object_model));
      }
    
      return $object;
    }
    catch (Exception $e)
    {
      return sfContext::getInstance()->getLogger()->log($e->getMessage());
    }
  }

  /**
   * Retrieves the id of currently connected user, with sfGuardPlugin detection
   * 
   * @return mixed (int or null if no user id retrieved)
   */
  public static function getUserId()
  {
    // sfGuardPlugin detection and guard user id retrieval
    $session = sfContext::getInstance()->getUser();
    if (class_exists('sfGuardSecurityUser') && $session instanceof sfGuardSecurityUser && method_exists($session, 'getGuardUser'))
    {
      $guard_user = $session->getGuardUser();
      if (!is_null($guard_user))
      {
        $guard_user_id = $guard_user->getId();
        if (!is_null($guard_user_id))
        {
          return $guard_user_id;
        }
      }
    }
		return null;
	}
}
