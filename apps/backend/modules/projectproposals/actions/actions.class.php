<?php

/**
 * projectproposals actions.
 *
 * @package    cothink
 * @subpackage projectproposals
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class projectproposalsActions extends autoprojectproposalsActions
{
  public function executeSetApproved()
  {
      $proposal = ProjectApplicationPeer::retrieveByPK($this->getRequestParameter('id'));
      $proposal->adminApprove();
      
      $this->redirect($this->getRequest()->getReferer());
  }

  public function executeSetDeclined()
  {
      $proposal = ProjectApplicationPeer::retrieveByPK($this->getRequestParameter('id'));
      $proposal->setDeclined();
      
      $this->redirect($this->getRequest()->getReferer());
  }
}
