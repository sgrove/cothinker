<?php
/**
 * sfPropelActAsStarredBehaviorPlugin base actions.
 * 
 * @package    plugins
 * @subpackage star 
 * @author     Gerald Estadieu <gestadieu@gmail.com>
 * @link       http://trac.symfony-project.com/trac/wiki/sfPropelActAsStarredBehaviorPlugin
 */
class BasesfStarActions extends sfActions
{  
  /**
   * Star a propel object.
   * 
   */
  public function executeStarit()
  {
		$this->model = $this->getRequestParameter('model');
		$this->id    = $this->getRequestParameter('id');
		$object = sfPropelActAsStarredBehaviorToolkit::retrieveStarredObject($this->model,$this->id);
		
		if (!$object->isStarred())
		{
			$object->setStar();
		}
		else
		{
			$object->clearStar();
		}
		
		if (!$this->getRequest()->isXmlHttpRequest())
		{
			$referer = $this->getRequest()->getReferer();
			$this->redirect($referer);
		}		
		$this->object = $object;
  }  
}
