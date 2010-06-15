<?php

/**
 * Subclass for representing a row from the 'ct_application_field_entry' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CoApplicationFieldEntry extends BaseCoApplicationFieldEntry
{
}

sfPropelBehavior::add('CoApplicationFieldEntry', array('sfPropelUuidBehavior'));
