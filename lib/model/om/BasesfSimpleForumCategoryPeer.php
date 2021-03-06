<?php


abstract class BasesfSimpleForumCategoryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_simple_forum_category';

	
	const CLASS_DEFAULT = 'lib.model.sfSimpleForumCategory';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_simple_forum_category.ID';

	
	const OWNER_ID = 'sf_simple_forum_category.OWNER_ID';

	
	const NAME = 'sf_simple_forum_category.NAME';

	
	const STRIPPED_NAME = 'sf_simple_forum_category.STRIPPED_NAME';

	
	const DESCRIPTION = 'sf_simple_forum_category.DESCRIPTION';

	
	const RANK = 'sf_simple_forum_category.RANK';

	
	const CREATED_AT = 'sf_simple_forum_category.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'OwnerId', 'Name', 'StrippedName', 'Description', 'Rank', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfSimpleForumCategoryPeer::ID, sfSimpleForumCategoryPeer::OWNER_ID, sfSimpleForumCategoryPeer::NAME, sfSimpleForumCategoryPeer::STRIPPED_NAME, sfSimpleForumCategoryPeer::DESCRIPTION, sfSimpleForumCategoryPeer::RANK, sfSimpleForumCategoryPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'owner_id', 'name', 'stripped_name', 'description', 'rank', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'OwnerId' => 1, 'Name' => 2, 'StrippedName' => 3, 'Description' => 4, 'Rank' => 5, 'CreatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (sfSimpleForumCategoryPeer::ID => 0, sfSimpleForumCategoryPeer::OWNER_ID => 1, sfSimpleForumCategoryPeer::NAME => 2, sfSimpleForumCategoryPeer::STRIPPED_NAME => 3, sfSimpleForumCategoryPeer::DESCRIPTION => 4, sfSimpleForumCategoryPeer::RANK => 5, sfSimpleForumCategoryPeer::CREATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'owner_id' => 1, 'name' => 2, 'stripped_name' => 3, 'description' => 4, 'rank' => 5, 'created_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.sfSimpleForumCategoryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfSimpleForumCategoryPeer::getTableMap();
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
		return str_replace(sfSimpleForumCategoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfSimpleForumCategoryPeer::ID);

		$criteria->addSelectColumn(sfSimpleForumCategoryPeer::OWNER_ID);

		$criteria->addSelectColumn(sfSimpleForumCategoryPeer::NAME);

		$criteria->addSelectColumn(sfSimpleForumCategoryPeer::STRIPPED_NAME);

		$criteria->addSelectColumn(sfSimpleForumCategoryPeer::DESCRIPTION);

		$criteria->addSelectColumn(sfSimpleForumCategoryPeer::RANK);

		$criteria->addSelectColumn(sfSimpleForumCategoryPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(sf_simple_forum_category.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_simple_forum_category.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleForumCategoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleForumCategoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfSimpleForumCategoryPeer::doSelectRS($criteria, $con);
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
		$objects = sfSimpleForumCategoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfSimpleForumCategoryPeer::populateObjects(sfSimpleForumCategoryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumCategoryPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleForumCategoryPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfSimpleForumCategoryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfSimpleForumCategoryPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfSimpleForumOwner(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleForumCategoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleForumCategoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfSimpleForumCategoryPeer::OWNER_ID, sfSimpleForumOwnerPeer::ID);

		$rs = sfSimpleForumCategoryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfSimpleForumOwner(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumCategoryPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleForumCategoryPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfSimpleForumCategoryPeer::addSelectColumns($c);
		$startcol = (sfSimpleForumCategoryPeer::NUM_COLUMNS - sfSimpleForumCategoryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfSimpleForumOwnerPeer::addSelectColumns($c);

		$c->addJoin(sfSimpleForumCategoryPeer::OWNER_ID, sfSimpleForumOwnerPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfSimpleForumCategoryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfSimpleForumOwnerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfSimpleForumOwner(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfSimpleForumCategory($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfSimpleForumCategorys();
				$obj2->addsfSimpleForumCategory($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleForumCategoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleForumCategoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfSimpleForumCategoryPeer::OWNER_ID, sfSimpleForumOwnerPeer::ID);

		$rs = sfSimpleForumCategoryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumCategoryPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleForumCategoryPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfSimpleForumCategoryPeer::addSelectColumns($c);
		$startcol2 = (sfSimpleForumCategoryPeer::NUM_COLUMNS - sfSimpleForumCategoryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfSimpleForumOwnerPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfSimpleForumOwnerPeer::NUM_COLUMNS;

		$c->addJoin(sfSimpleForumCategoryPeer::OWNER_ID, sfSimpleForumOwnerPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfSimpleForumCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfSimpleForumOwnerPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfSimpleForumOwner(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfSimpleForumCategory($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfSimpleForumCategorys();
				$obj2->addsfSimpleForumCategory($obj1);
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
		return sfSimpleForumCategoryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumCategoryPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfSimpleForumCategoryPeer', $values, $con);
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

		$criteria->remove(sfSimpleForumCategoryPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfSimpleForumCategoryPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleForumCategoryPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumCategoryPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfSimpleForumCategoryPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfSimpleForumCategoryPeer::ID);
			$selectCriteria->add(sfSimpleForumCategoryPeer::ID, $criteria->remove(sfSimpleForumCategoryPeer::ID), $comparison);

			$comparison = $criteria->getComparison(sfSimpleForumCategoryPeer::OWNER_ID);
			$selectCriteria->add(sfSimpleForumCategoryPeer::OWNER_ID, $criteria->remove(sfSimpleForumCategoryPeer::OWNER_ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfSimpleForumCategoryPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleForumCategoryPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfSimpleForumCategoryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfSimpleForumCategoryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfSimpleForumCategory) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
			}

			$criteria->add(sfSimpleForumCategoryPeer::ID, $vals[0], Criteria::IN);
			$criteria->add(sfSimpleForumCategoryPeer::OWNER_ID, $vals[1], Criteria::IN);
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

	
	public static function doValidate(sfSimpleForumCategory $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfSimpleForumCategoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfSimpleForumCategoryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfSimpleForumCategoryPeer::DATABASE_NAME, sfSimpleForumCategoryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfSimpleForumCategoryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $id, $owner_id, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(sfSimpleForumCategoryPeer::ID, $id);
		$criteria->add(sfSimpleForumCategoryPeer::OWNER_ID, $owner_id);
		$v = sfSimpleForumCategoryPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BasesfSimpleForumCategoryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.sfSimpleForumCategoryMapBuilder');
}
