<?php

/**
 * Subclass for performing query and update operations on the 'sf_ticket' table.
 *
 * 
 *
 * @package plugins.sfSupportPlugin.lib.model
 */ 
class sfTicketPeer extends BasesfTicketPeer
{

	public function replyTicket($ticket_id, $message, $user_id) {
		$t = new sfTicketThread;
		$t->setsfTicketId($ticket_id);
//		$t->getsfTicket()->setsfTicketStatusId(1); // ticket is opened
		$t->setMessage($message);
		$t->setUserId($user_id);
		$t->save();

	}

	public function createTicket($subject, $message, $user_id) {
		$t = new sfTicket;
		$t->setsfTicketStatusId(1); // ticket is opened
		$t->setSubject($subject);
		$t->setMessage($message);
		$t->setUserId($user_id);
		$t->save();

	}
}
