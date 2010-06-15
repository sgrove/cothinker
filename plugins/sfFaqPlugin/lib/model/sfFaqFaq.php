<?php

/**
 * Subclass for representing a row from the 'sf_faq_faq' table.
 *
 * 
 *
 * @package plugins.sfFaqPlugin.lib.model
 * @author Jonathan Démoutiez <jonathan@demoutiez.net>
 */ 
class sfFaqFaq extends BasesfFaqFaq
{
	public function __toString()
	{
		return $this->getQuestion();
	}
}
