<?php

/**
 * Subclass for representing a row from the 'sf_faq_category' table.
 *
 * 
 *
 * @package plugins.sfFaqPlugin.lib.model
 * @author Jonathan Démoutiez <jonathan@demoutiez.net>
 */ 
class sfFaqCategory extends BasesfFaqCategory
{
	public function __toString()
	{
		return $this->getName();
	}
}
