<?php


abstract class BasesfFaqFaqPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_faq_faq';

	
	const CLASS_DEFAULT = 'plugins.sfFaqPlugin.lib.model.sfFaqFaq';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_faq_faq.ID';

	
	const QUESTION = 'sf_faq_faq.QUESTION';

	
	const ANSWER = 'sf_faq_faq.ANSWER';

	
	const CATEGORY_ID = 'sf_faq_faq.CATEGORY_ID';

	
	const CREATED_AT = 'sf_faq_faq.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Question', 'Answer', 'CategoryId', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfFaqFaqPeer::ID, sfFaqFaqPeer::QUESTION, sfFaqFaqPeer::ANSWER, sfFaqFaqPeer::CATEGORY_ID, sfFaqFaqPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'question', 'answer', 'category_id', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Question' => 1, 'Answer' => 2, 'CategoryId' => 3, 'CreatedAt' => 4, ),
		BasePeer::TYPE_COLNAME => array (sfFaqFaqPeer::ID => 0, sfFaqFaqPeer::QUESTION => 1, sfFaqFaqPeer::ANSWER => 2, sfFaqFaqPeer::CATEGORY_ID => 3, sfFaqFaqPeer::CREATED_AT => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'question' => 1, 'answer' => 2, 'category_id' => 3, 'created_at' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('plugins.sfFaqPlugin.lib.model.map.sfFaqFaqMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfFaqFaqPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(sfFaqFaqPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfFaqFaqPeer::ID);

		$criteria->addSelectColumn(sfFaqFaqPeer::QUESTION);

		$criteria->addSelectColumn(sfFaqFaqPeer::ANSWER);

		$criteria->addSelectColumn(sfFaqFaqPeer::CATEGORY_ID);

		$criteria->addSelectColumn(sfFaqFaqPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(sf_faq_faq.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_faq_faq.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfFaqFaqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfFaqFaqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfFaqFaqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = sfFaqFaqPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfFaqFaqPeer::populateObjects(sfFaqFaqPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFaqFaqPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfFaqFaqPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfFaqFaqPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfFaqFaqPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfFaqCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfFaqFaqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfFaqFaqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfFaqFaqPeer::CATEGORY_ID, sfFaqCategoryPeer::ID);

		$rs = sfFaqFaqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfFaqCategory(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFaqFaqPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasesfFaqFaqPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfFaqFaqPeer::addSelectColumns($c);
		$startcol = (sfFaqFaqPeer::NUM_COLUMNS - sfFaqFaqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfFaqCategoryPeer::addSelectColumns($c);

		$c->addJoin(sfFaqFaqPeer::CATEGORY_ID, sfFaqCategoryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfFaqFaqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfFaqCategoryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfFaqCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfFaqFaq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfFaqFaqs();
				$obj2->addsfFaqFaq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfFaqFaqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfFaqFaqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfFaqFaqPeer::CATEGORY_ID, sfFaqCategoryPeer::ID);

		$rs = sfFaqFaqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFaqFaqPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasesfFaqFaqPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfFaqFaqPeer::addSelectColumns($c);
		$startcol2 = (sfFaqFaqPeer::NUM_COLUMNS - sfFaqFaqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfFaqCategoryPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfFaqCategoryPeer::NUM_COLUMNS;

		$c->addJoin(sfFaqFaqPeer::CATEGORY_ID, sfFaqCategoryPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfFaqFaqPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfFaqCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfFaqCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfFaqFaq($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfFaqFaqs();
				$obj2->addsfFaqFaq($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return sfFaqFaqPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFaqFaqPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfFaqFaqPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(sfFaqFaqPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfFaqFaqPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfFaqFaqPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFaqFaqPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfFaqFaqPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(sfFaqFaqPeer::ID);
			$selectCriteria->add(sfFaqFaqPeer::ID, $criteria->remove(sfFaqFaqPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfFaqFaqPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfFaqFaqPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(sfFaqFaqPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(sfFaqFaqPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfFaqFaq) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfFaqFaqPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(sfFaqFaq $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfFaqFaqPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfFaqFaqPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(sfFaqFaqPeer::DATABASE_NAME, sfFaqFaqPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfFaqFaqPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(sfFaqFaqPeer::DATABASE_NAME);

		$criteria->add(sfFaqFaqPeer::ID, $pk);


		$v = sfFaqFaqPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(sfFaqFaqPeer::ID, $pks, Criteria::IN);
			$objs = sfFaqFaqPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfFaqFaqPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('plugins.sfFaqPlugin.lib.model.map.sfFaqFaqMapBuilder');
}
