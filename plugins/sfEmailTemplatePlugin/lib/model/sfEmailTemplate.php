<?php

/**
 * Subclass for representing a row from the 'sf_email_template' table.
 *
 * 
 *
 * @package plugins.sfEmailTemplatePlugin.lib.model
 */ 
class sfEmailTemplate extends BasesfEmailTemplate
{
  public function setName($v)
  {
    parent::setName(strtoupper(myTools::stripText($v)));
  }
}
