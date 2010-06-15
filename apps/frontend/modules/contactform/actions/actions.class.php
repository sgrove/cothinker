<?php

/**
 * contactform actions.
 *
 * @package    cothink
 * @subpackage contactform
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class contactformActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->message = new ContactMessage();
    
    myToolkit::prependPageTitle('Contact Us');
  }
  
  /**
   * Executes submit action
   *
   */
  public function executeSubmit()
  {
    $message = new ContactMessage();
    $message->setName($this->getRequestParameter('name'));
    $message->setEmail($this->getRequestParameter('email'));
    $message->setMessage($this->getRequestParameter('message'));
    
    $message->save();
    
    $this->message = $message;
    
    myToolkit::prependPageTitle('We got your message!');
  }
  
  public function handleErrorSubmit()
  {
    $message = new ContactMessage();
    $message->setName($this->getRequestParameter('name'));
    $message->setEmail($this->getRequestParameter('email'));
    $message->setMessage($this->getRequestParameter('message'));
    
    $this->message = $message;
    
    $this->setTemplate('index');
    
    myToolkit::prependPageTitle('Contact Us');
    
    return sfView::SUCCESS;
  }
}
