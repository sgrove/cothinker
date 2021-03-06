<?php

/**
 * networks actions.
 *
 * @package    cothink
 * @subpackage networks
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class networksActions extends sfActions
{
  /**
   * Executes preExecute action
   *
   */
  public function executePreExecute()
  {
  }
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->tab = $this->getRequestParameter('tab', 'main');
    //$this->tab = sfConfig::get('app_tab_network');
    if ($this->tab == 'main') $this->connections = $this->getUser()->getProfile()->getConnections();
    if ($this->tab == 'pending') $this->connections = $this->getUser()->getProfile()->getAllPendingConnections();
    //$this->connections = SocialConnectionPeer::retrieveByUserId($this->getUser()->getGuardUser()->getId());
  }
  
  public function executeRequestConnection()
  {
    $user1 = $this->getUser()->getProfile();
    $user2 = SfGuardUserProfilePeer::retrieveByUuid($this->getRequestParameter('connect'));
    
    $this->forward404Unless($user2, 'User2 not found, unable to request connections');
    
    if ($user1->isConnected($user2->getUserId()))
    {
      $this->message = "This user is already in your network, or a request is still pending";
      $this->forward404($this->message);
    }
    
    $result = $user1->addConnection($user2->getUserId());
    
    if ($result == false)
    {
      $this->forward404('Error adding SoCon');
    }
    
    $message = array();
    $message["from"] = $user1->getUserId();
    $message["to"] = $user2->getUserId();
    $message["owner"] = $user2->getUserId();
    $message["parent"] = null;
    $message["folder"] = "inbox";
    $message["subject"] = $user1->getFullName().' has requested to add you to their network.';
    $message["text"] = 'You can view, accept or decline the request by going to My Network';
    
    $options = array();
    $options["copyTo"] = "sent";

    MessagePeer::sendSimpleMessage($message, $options);
    
    $user1->addHistoryEvent($user1->getFullName().' requested '.$user2->getFullName().' to join their network.', $user1->getFullName().' has asked '.$user2->getFullName().' to join their network.');
    $user2->addHistoryEvent($user1->getFullName().' requested '.$user2->getFullName().' to join their network.', $user1->getFullName().' has asked '.$user2->getFullName().' to join their network.');

    
    $this->redirect('networks/index?tab=pending');
  }
  
  public function executeRetryConnection()
  {
    $socon = SocialConnectionPeer::retrieveByUuid($this->getRequestParameter('socon'));
    $this->forward404Unless($socon, "Socon not found, unable to accept");
    
    $socon->setStatus(sfConfig::get('app_socon_status_pending'));
    $socon->save();
    
    $this->redirect('networks/index?tab=pending');
  }
  
  public function executeAcceptConnection()
  {
    $socon = SocialConnectionPeer::retrieveByUuid($this->getRequestParameter('socon'));
    $this->forward404Unless($socon, "Socon not found, unable to accept");
    
    $this->logMessage("socon: ".print_r($socon, true));
    $result = $socon->isRequested($this->getUser()->getGuardUser()->getId());
    $this->forward404Unless($result, 'Not socon-requested user, unable to accept');
    
    $socon->setStatus(sfConfig::get('app_socon_status_approved'));
    $socon->save();
    
    $message = array();
    $message["from"] = $socon->getUser2Id();
    $message["to"] = $socon->getUser1Id();
    $message["owner"] = $socon->getUser1Id();
    $message["parent"] = null;
    $message["folder"] = "inbox";
    $message["subject"] = $socon->getSfGuardUserRelatedByUser2Id()->getProfile()->getFullName().' has accepted your request.';
    $message["text"] = 'Your request has been approved, you are now connected.';
    
    $options = array();
    $options["copyTo"] = "sent";

    MessagePeer::sendSimpleMessage($message, $options);

    $this->redirect('networks/index?tab=pending');
  }
  
  public function executeDeclineConnection()
  {
    $socon = SocialConnectionPeer::retrieveByUuid($this->getRequestParameter('socon'));
    $this->forward404Unless($socon, "Socon not found, unable to decline");
    
    $this->forward404Unless($socon->isRequested($this->getUser()->getGuardUser()->getId()), 'Not socon requested, unable to accept');
    
    $socon->setStatus(sfConfig::get('app_socon_status_declined'));
    $socon->save();
    
    $message = array();
    $message["from"] = $socon->getUser2Id();
    $message["to"] = $socon->getUser1Id();
    $message["owner"] = $socon->getUser1Id();
    $message["parent"] = null;
    $message["folder"] = "inbox";
    $message["subject"] = $socon->getSfGuardUserRelatedByUser2Id()->getProfile()->getFullName().' has declined your request.';
    $message["text"] = 'Your request has been decline.';
    
    $options = array();
    $options["copyTo"] = "sent";

    MessagePeer::sendSimpleMessage($message, $options);

    $this->redirect('networks/index?tab=pending');
  }
 
  public function executeRemoveConnection()
  {
    $socon = SocialConnectionPeer::retrieveByUuid($this->getRequestParameter('socon'));
    $this->forward404Unless($socon, "Socon not found, unable to remove");
    
    $socon->setStatus(sfConfig::get('app_socon_status_declined'));
    $socon->save();

    $other = $socon->getOtherUser($this->getUser()->getId());
    
    $message = array();
    $message["from"] = $this->getUser()->getId();
    $message["to"] = $this->getUser()->getId();
    $message["owner"] = $this->getUser()->getId();
    $message["parent"] = null;
    $message["folder"] = "inbox";
    $message["subject"] = "You have removed a social connection";
    $message["text"] = 'You have removed your connection with '.$other->getProfile().'.';
    
    $options = array();

    MessagePeer::sendSimpleMessage($message, $options);

    $this->redirect('networks/index?tab=main');
  }

}
