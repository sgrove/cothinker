<?php

/**
 * Subclass for representing a row from the 'sf_ticket' table.
 *
 * 
 *
 * @package plugins.sfSupportPlugin.lib.model
 */ 
class sfTicket extends BasesfTicket
{

	public function getTicketStatus() {
		if ($this->getsfTicketStatus())
		  return $this->getsfTicketStatus()->getName();
	}

	public function getCreator() {
		if ($this->getsfGuardUser())
		  return $this->getsfGuardUser()->getUsername();
	}

	public function getRepliesCnt() {
	  return $this->countsfTicketThreads();
	}

  public function getLatestMessage() {
    $c = new Criteria();
    $c->add(sfTicketThreadPeer::SF_TICKET_ID, $this->getId());
    $c->addAscendingOrderByColumn(sfTicketThreadPeer::CREATED_AT);
    $threads = sfTicketThreadPeer::doSelect($c);

    return ($threads) ?  end($threads) : sfTicketPeer::retrieveByPk($this->getId());
  }

}
