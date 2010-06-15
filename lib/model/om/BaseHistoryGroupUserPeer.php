<?php


abstract class BaseHistoryGroupUserPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_history_group_user';

	
	const CLASS_DEFAULT = 'lib.model.HistoryGroupUser';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_history_group_user.ID';

	
	const UUID = 'ct_history_group_user.UUID';

	
	const HISTORY_GROUP_ID = 'ct_history_group_user.HISTORY_GROUP_ID';

	
	const USER_ID = 'ct_history_group_user.USER_ID';

	
	const VERSION = 'ct_history_group_user.VERSION';

	
	const DELETED_AT = 'ct_history_group_user.DELETED_AT';

	
	const CREATED_AT = 'ct_history_group_user.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'HistoryGroupId', 'UserId', 'Version', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (HistoryGroupUserPeer::ID, HistoryGroupUserPeer::UUID, HistoryGroupUserPeer::HISTORY_GROUP_ID, HistoryGroupUserPeer::USER_ID, HistoryGroupUserPeer::VERSION, HistoryGroupUserPeer::DELETED_AT, HistoryGroupUserPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'history_group_id', 'user_id', 'version', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'HistoryGroupId' => 2, 'UserId' => 3, 'Version' => 4, 'DeletedAt' => 5, 'CreatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (HistoryGroupUserPeer::ID => 0, HistoryGroupUserPeer::UUID => 1, HistoryGroupUserPeer::HISTORY_GROUP_ID => 2, HistoryGroupUserPeer::USER_ID => 3, HistoryGroupUserPeer::VERSION => 4, HistoryGroupUserPeer::DELETED_AT => 5, HistoryGroupUserPeer::CREATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'history_group_id' => 2, 'user_id' => 3, 'version' => 4, 'deleted_at' => 5, 'created_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.HistoryGroupUserMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HistoryGroupUserPeer::getTableMap();
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
		return str_replace(HistoryGroupUserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HistoryGroupUserPeer::ID);

		$criteria->addSelectColumn(HistoryGroupUserPeer::UUID);

		$criteria->addSelectColumn(HistoryGroupUserPeer::HISTORY_GROUP_ID);

		$criteria->addSelectColumn(HistoryGroupUserPeer::USER_ID);

		$criteria->addSelectColumn(HistoryGroupUserPeer::VERSION);

		$criteria->addSelectColumn(HistoryGroupUserPeer::DELETED_AT);

		$criteria->addSelectColumn(HistoryGroupUserPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_history_group_user.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_history_group_user.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HistoryGroupUserPeer::doSelectRS($criteria, $con);
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
		$objects = HistoryGroupUserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HistoryGroupUserPeer::populateObjects(HistoryGroupUserPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseHistoryGroupUserPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HistoryGroupUserPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HistoryGroupUserPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinHistoryGroup(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryGroupUserPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);

		$rs = HistoryGroupUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryGroupUserPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = HistoryGroupUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinHistoryGroup(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseHistoryGroupUserPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryGroupUserPeer::addSelectColumns($c);
		$startcol = (HistoryGroupUserPeer::NUM_COLUMNS - HistoryGroupUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		HistoryGroupPeer::addSelectColumns($c);

		$c->addJoin(HistoryGroupUserPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryGroupUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = HistoryGroupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getHistoryGroup(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addHistoryGroupUser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHistoryGroupUsers();
				$obj2->addHistoryGroupUser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseHistoryGroupUserPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryGroupUserPeer::addSelectColumns($c);
		$startcol = (HistoryGroupUserPeer::NUM_COLUMNS - HistoryGroupUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(HistoryGroupUserPeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryGroupUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addHistoryGroupUser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHistoryGroupUsers();
				$obj2->addHistoryGroupUser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryGroupUserPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);

		$criteria->addJoin(HistoryGroupUserPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = HistoryGroupUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseHistoryGroupUserPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryGroupUserPeer::addSelectColumns($c);
		$startcol2 = (HistoryGroupUserPeer::NUM_COLUMNS - HistoryGroupUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HistoryGroupPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HistoryGroupPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(HistoryGroupUserPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);

		$c->addJoin(HistoryGroupUserPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryGroupUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = HistoryGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getHistoryGroup(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHistoryGroupUser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initHistoryGroupUsers();
				$obj2->addHistoryGroupUser($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addHistoryGroupUser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initHistoryGroupUsers();
				$obj3->addHistoryGroupUser($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptHistoryGroup(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryGroupUserPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = HistoryGroupUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryGroupUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryGroupUserPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);

		$rs = HistoryGroupUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptHistoryGroup(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseHistoryGroupUserPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryGroupUserPeer::addSelectColumns($c);
		$startcol2 = (HistoryGroupUserPeer::NUM_COLUMNS - HistoryGroupUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(HistoryGroupUserPeer::USER_ID, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryGroupUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHistoryGroupUser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initHistoryGroupUsers();
				$obj2->addHistoryGroupUser($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseHistoryGroupUserPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryGroupUserPeer::addSelectColumns($c);
		$startcol2 = (HistoryGroupUserPeer::NUM_COLUMNS - HistoryGroupUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HistoryGroupPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HistoryGroupPeer::NUM_COLUMNS;

		$c->addJoin(HistoryGroupUserPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryGroupUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = HistoryGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getHistoryGroup(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHistoryGroupUser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initHistoryGroupUsers();
				$obj2->addHistoryGroupUser($obj1);
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
		return HistoryGroupUserPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseHistoryGroupUserPeer', $values, $con);
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

		$criteria->remove(HistoryGroupUserPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseHistoryGroupUserPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseHistoryGroupUserPeer', $values, $con);
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
			$comparison = $criteria->getComparison(HistoryGroupUserPeer::ID);
			$selectCriteria->add(HistoryGroupUserPeer::ID, $criteria->remove(HistoryGroupUserPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseHistoryGroupUserPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseHistoryGroupUserPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(HistoryGroupUserPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HistoryGroupUserPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HistoryGroupUser) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HistoryGroupUserPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HistoryGroupUser $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HistoryGroupUserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HistoryGroupUserPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HistoryGroupUserPeer::DATABASE_NAME, HistoryGroupUserPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HistoryGroupUserPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HistoryGroupUserPeer::DATABASE_NAME);

		$criteria->add(HistoryGroupUserPeer::ID, $pk);


		$v = HistoryGroupUserPeer::doSelect($criteria, $con);

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
			$criteria->add(HistoryGroupUserPeer::ID, $pks, Criteria::IN);
			$objs = HistoryGroupUserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHistoryGroupUserPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.HistoryGroupUserMapBuilder');
}
