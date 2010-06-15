<?php

/**
 * sfSupport actions.
 *
 * @package    project
 * @subpackage 
 * @author     Voznyak Nazar <voznyaknazar@gmail.com>
 * @version    SVN: $Id: actions.class.php 1415 2006-06-11 08:33:51Z fabien $
 */

class sfSupportActions extends sfActions
{
  public function executeIndex() {
	}

  public function executeCreate() {
	}

  public function executeHistory() {
    $c = new Criteria();
    $c->add(sfTicketPeer::USER_ID, sfGuardUser::getProfileUserId($this->getContext()->getUser()));
    $this->elements = sfTicketPeer::doSelect($c);
	}

  public function executeReply() {
		$this->ticket_id = $this->getRequestParameter('id');
		$this->ticket = sfTicketPeer::retrieveByPK($this->ticket_id);
    $this->threads = $this->ticket->getsfTicketThreads();
	}

  public function executeCreateReply() {
    $message = strip_tags($this->getRequestParameter('message'));
		$ticket_id = $this->getRequestParameter('ticket_id');
		sfTicketPeer::replyTicket($ticket_id, $message, sfGuardUser::getProfileUserId($this->getContext()->getUser()));

		return $this->redirect('sfSupport/history');
  }

  public function executeCreateTicket() {
    $subject = strip_tags($this->getRequestParameter('subject'));
    $message = strip_tags($this->getRequestParameter('message'));
		sfTicketPeer::createTicket($subject, $message, sfGuardUser::getProfileUserId($this->getContext()->getUser()));

		return $this->redirect('sfSupport/history');
  }

  public function handleErrorCreateTicket() {
		$this->forward('sfSupport', 'create');
	}

}
?>