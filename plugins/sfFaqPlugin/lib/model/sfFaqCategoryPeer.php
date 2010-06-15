<?php

/**
 * Subclass for performing query and update operations on the 'sf_faq_category' table.
 *
 * 
 *
 * @package plugins.sfFaqPlugin.lib.model
 * @author Jonathan Démoutiez <jonathan@demoutiez.net>
 */ 
class sfFaqCategoryPeer extends BasesfFaqCategoryPeer
{
	public static function getActiveCategories(Criteria $criteria = null, $con = null)
	{
		if (is_null($criteria))
			$criteria = new Criteria();

		$criteria->add(sfFaqCategoryPeer::ACTIVATE, true);
		return sfFaqCategoryPeer::doSelect($criteria, $con);
	}
	
	public static function getFirstActiveCategory(Criteria $criteria = null, $con = null)
	{
		$categories = sfFaqCategoryPeer::getActiveCategories($criteria, $con);
		return array_shift($categories);
	}

	public static function doSelect(Criteria $criteria, $con = null)
	{
    if (!count($criteria->getOrderByColumns()))
			$criteria->addAscendingOrderByColumn(sfFaqCategoryPeer::NAME);

    return parent::doSelect($criteria, $con);
	}
}
