<?php

/**
 * Subclass for representing a row from the 'ct_contactinfo' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ContactInfo extends BaseContactInfo
{
}

sfPropelBehavior::add('ContactInfo', array('sfPropelUuidBehavior'));