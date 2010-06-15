<?php

/**
 * Subclass for representing a row from the 'ct_did_you_know' table.
 *
 * 
 *
 * @package lib.model
 */ 
class DidYouKnow extends BaseDidYouKnow
{
}

sfPropelBehavior::add('DidYouKnow', array('sfPropelUuidBehavior'));