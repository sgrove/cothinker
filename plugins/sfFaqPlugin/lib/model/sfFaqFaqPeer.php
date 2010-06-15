<?php

/**
 * Subclass for performing query and update operations on the 'sf_faq_faq' table.
 *
 * 
 *
 * @package plugins.sfFaqPlugin.lib.model
 * @author Jonathan Démoutiez <jonathan@demoutiez.net>
 */ 
class sfFaqFaqPeer extends BasesfFaqFaqPeer
{
	public static function doSelect(Criteria $criteria, $con = null)
	{
    if (!count($criteria->getOrderByColumns()))
			$criteria->addAscendingOrderByColumn(sfFaqFaqPeer::QUESTION);

    return parent::doSelect($criteria, $con);
	}
}
