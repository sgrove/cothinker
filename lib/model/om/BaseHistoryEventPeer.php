<?php


abstract class BaseHistoryEventPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_history_event';

	
	const CLASS_DEFAULT = 'lib.model.HistoryEvent';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_history_event.ID';

	
	const UUID = 'ct_history_event.UUID';

	
	const HISTORY_GROUP_ID = 'ct_history_event.HISTORY_GROUP_ID';

	
	const CATEGORY = 'ct_history_event.CATEGORY';

	
	const TITLE = 'ct_history_event.TITLE';

	
	const TEXT = 'ct_history_event.TEXT';

	
	const USER_ID = 'ct_history_event.USER_ID';

	
	const SLUG = 'ct_history_event.SLUG';

	
	const VERSION = 'ct_history_event.VERSION';

	
	const DELETED_AT = 'ct_history_event.DELETED_AT';

	
	const CREATED_AT = 'ct_history_event.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'HistoryGroupId', 'Category', 'Title', 'Text', 'UserId', 'Slug', 'Version', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (HistoryEventPeer::ID, HistoryEventPeer::UUID, HistoryEventPeer::HISTORY_GROUP_ID, HistoryEventPeer::CATEGORY, HistoryEventPeer::TITLE, HistoryEventPeer::TEXT, HistoryEventPeer::USER_ID, HistoryEventPeer::SLUG, HistoryEventPeer::VERSION, HistoryEventPeer::DELETED_AT, HistoryEventPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'history_group_id', 'category', 'title', 'text', 'user_id', 'slug', 'version', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'HistoryGroupId' => 2, 'Category' => 3, 'Title' => 4, 'Text' => 5, 'UserId' => 6, 'Slug' => 7, 'Version' => 8, 'DeletedAt' => 9, 'CreatedAt' => 10, ),
		BasePeer::TYPE_COLNAME => array (HistoryEventPeer::ID => 0, HistoryEventPeer::UUID => 1, HistoryEventPeer::HISTORY_GROUP_ID => 2, HistoryEventPeer::CATEGORY => 3, HistoryEventPeer::TITLE => 4, HistoryEventPeer::TEXT => 5, HistoryEventPeer::USER_ID => 6, HistoryEventPeer::SLUG => 7, HistoryEventPeer::VERSION => 8, HistoryEventPeer::DELETED_AT => 9, HistoryEventPeer::CREATED_AT => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'history_group_id' => 2, 'category' => 3, 'title' => 4, 'text' => 5, 'user_id' => 6, 'slug' => 7, 'version' => 8, 'deleted_at' => 9, 'created_at' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.HistoryEventMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HistoryEventPeer::getTableMap();
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
		return str_replace(HistoryEventPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HistoryEventPeer::ID);

		$criteria->addSelectColumn(HistoryEventPeer::UUID);

		$criteria->addSelectColumn(HistoryEventPeer::HISTORY_GROUP_ID);

		$criteria->addSelectColumn(HistoryEventPeer::CATEGORY);

		$criteria->addSelectColumn(HistoryEventPeer::TITLE);

		$criteria->addSelectColumn(HistoryEventPeer::TEXT);

		$criteria->addSelectColumn(HistoryEventPeer::USER_ID);

		$criteria->addSelectColumn(HistoryEventPeer::SLUG);

		$criteria->addSelectColumn(HistoryEventPeer::VERSION);

		$criteria->addSelectColumn(HistoryEventPeer::DELETED_AT);

		$criteria->addSelectColumn(HistoryEventPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_history_event.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_history_event.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HistoryEventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryEventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HistoryEventPeer::doSelectRS($criteria, $con);
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
		$objects = HistoryEventPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HistoryEventPeer::populateObjects(HistoryEventPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseHistoryEventPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HistoryEventPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HistoryEventPeer::getOMClass();
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
			$criteria->addSelectColumn(HistoryEventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryEventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryEventPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);

		$rs = HistoryEventPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(HistoryEventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryEventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryEventPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = HistoryEventPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinHistoryGroup(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseHistoryEventPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryEventPeer::addSelectColumns($c);
		$startcol = (HistoryEventPeer::NUM_COLUMNS - HistoryEventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		HistoryGroupPeer::addSelectColumns($c);

		$c->addJoin(HistoryEventPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryEventPeer::getOMClass();

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
										$temp_obj2->addHistoryEvent($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHistoryEvents();
				$obj2->addHistoryEvent($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseHistoryEventPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryEventPeer::addSelectColumns($c);
		$startcol = (HistoryEventPeer::NUM_COLUMNS - HistoryEventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(HistoryEventPeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryEventPeer::getOMClass();

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
										$temp_obj2->addHistoryEvent($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHistoryEvents();
				$obj2->addHistoryEvent($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HistoryEventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryEventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryEventPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);

		$criteria->addJoin(HistoryEventPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = HistoryEventPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseHistoryEventPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryEventPeer::addSelectColumns($c);
		$startcol2 = (HistoryEventPeer::NUM_COLUMNS - HistoryEventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HistoryGroupPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HistoryGroupPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(HistoryEventPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);

		$c->addJoin(HistoryEventPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryEventPeer::getOMClass();


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
					$temp_obj2->addHistoryEvent($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initHistoryEvents();
				$obj2->addHistoryEvent($obj1);
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
					$temp_obj3->addHistoryEvent($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initHistoryEvents();
				$obj3->addHistoryEvent($obj1);
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
			$criteria->addSelectColumn(HistoryEventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryEventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryEventPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = HistoryEventPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(HistoryEventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HistoryEventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HistoryEventPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);

		$rs = HistoryEventPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptHistoryGroup(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseHistoryEventPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryEventPeer::addSelectColumns($c);
		$startcol2 = (HistoryEventPeer::NUM_COLUMNS - HistoryEventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(HistoryEventPeer::USER_ID, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryEventPeer::getOMClass();

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
					$temp_obj2->addHistoryEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initHistoryEvents();
				$obj2->addHistoryEvent($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseHistoryEventPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HistoryEventPeer::addSelectColumns($c);
		$startcol2 = (HistoryEventPeer::NUM_COLUMNS - HistoryEventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HistoryGroupPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HistoryGroupPeer::NUM_COLUMNS;

		$c->addJoin(HistoryEventPeer::HISTORY_GROUP_ID, HistoryGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HistoryEventPeer::getOMClass();

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
					$temp_obj2->addHistoryEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initHistoryEvents();
				$obj2->addHistoryEvent($obj1);
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
		return HistoryEventPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseHistoryEventPeer', $values, $con);
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

		$criteria->remove(HistoryEventPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseHistoryEventPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseHistoryEventPeer', $values, $con);
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
			$comparison = $criteria->getComparison(HistoryEventPeer::ID);
			$selectCriteria->add(HistoryEventPeer::ID, $criteria->remove(HistoryEventPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseHistoryEventPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseHistoryEventPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(HistoryEventPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HistoryEventPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HistoryEvent) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HistoryEventPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HistoryEvent $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HistoryEventPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HistoryEventPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HistoryEventPeer::DATABASE_NAME, HistoryEventPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HistoryEventPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HistoryEventPeer::DATABASE_NAME);

		$criteria->add(HistoryEventPeer::ID, $pk);


		$v = HistoryEventPeer::doSelect($criteria, $con);

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
			$criteria->add(HistoryEventPeer::ID, $pks, Criteria::IN);
			$objs = HistoryEventPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHistoryEventPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.HistoryEventMapBuilder');
}
