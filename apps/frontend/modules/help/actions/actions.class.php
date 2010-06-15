<?php

/**
 * help actions.
 *
 * @package    cothink
 * @subpackage help
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class helpActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('sfFaq', 'index');
  }
}
