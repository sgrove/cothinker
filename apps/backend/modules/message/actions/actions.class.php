<?php

/**
 * message actions.
 *
 * @package    cothink
 * @subpackage message
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class messageActions extends automessageActions
{
  public function executeMarkAsUnread()
  {
      $message = MessagePeer::retrieveByPK($this->getRequestParameter('id'));
      echo var_dump($message);
      $message->setReadAt( NULL );
      echo "<hr />";
      echo var_dump($message);
      $message->save();
      
      $this->redirect($this->getRequest()->getReferer());
  }
}
