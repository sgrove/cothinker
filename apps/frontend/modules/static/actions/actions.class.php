<?php

/**
 * static actions.
 *
 * @package    cothink
 * @subpackage static
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class staticActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
  
  public function executeTos()
  {
  }
  
  public function executeContact()
  {
  }
  
  public function executeAbout()
  {
  }
}
