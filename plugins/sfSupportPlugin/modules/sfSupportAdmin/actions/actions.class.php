<?php

/**
 * sfSupportAdmin actions.
 *
 * @package    project
 * @subpackage sfSupportAdmin
 * @author     Voznyak Nazar <voznyaknazar@gmail.com>
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class sfSupportAdminActions extends autosfSupportAdminActions
{

  public function executeReply() {
    $this->ticket_id = $this->getRequestParameter('id');
		$this->ticket = sfTicketPeer::retrieveByPK($this->ticket_id);
    $this->threads = $this->ticket->getsfTicketThreads();
  }

  public function executeDelete() {
    $this->ticket_id = $this->getRequestParameter('id');
		$ticket = sfTicketPeer::retrieveByPK($this->ticket_id);
		$ticket->setsfTicketStatusId(2); // ticket is closed
		$ticket->save();

		return $this->redirect('sfSupportAdmin');
  }

  public function executeCreateReply() {
    $message = strip_tags($this->getRequestParameter('message'));
		$ticket_id = $this->getRequestParameter('ticket_id');
		sfTicketPeer::replyTicket($ticket_id, $message, $this->getContext()->getUser());

		return $this->redirect('sfSupportAdmin');
  }

}
