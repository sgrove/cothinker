<?php

/**
 * Subclass for representing a row from the 'sf_ticket_status' table.
 *
 * 
 *
 * @package plugins.sfSupportPlugin.lib.model
 */ 
class sfTicketStatus extends BasesfTicketStatus
{

	public function __toString() {
	  return $this->getName();
	}

}
