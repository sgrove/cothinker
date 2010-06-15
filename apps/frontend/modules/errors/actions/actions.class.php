<?php

/**
 * errors actions.
 *
 * @package    cothink
 * @subpackage errors
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class errorsActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
  
  /**
   * Executes error404 action
   *
   */
  public function executeError404()
  {
    
  }
}
