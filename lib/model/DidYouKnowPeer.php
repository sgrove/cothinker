<?php

/**
 * Subclass for performing query and update operations on the 'ct_did_you_know' table.
 *
 * 
 *
 * @package lib.model
 */ 
class DidYouKnowPeer extends BaseDidYouKnowPeer
{
  public static function getRandom(){
		$c = new Criteria();
		// Select a random recor
		// TODO: find a db-agnostic method of selecting a random record
		$c->addAscendingOrderByColumn('rand()');
		return self::doSelectOne($c);
	}
}
