<?php


abstract class BaseCoApplicationFieldEntryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_application_field_entry';

	
	const CLASS_DEFAULT = 'lib.model.CoApplicationFieldEntry';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_application_field_entry.ID';

	
	const UUID = 'ct_application_field_entry.UUID';

	
	const APPLICATION_ID = 'ct_application_field_entry.APPLICATION_ID';

	
	const FIELD_ID = 'ct_application_field_entry.FIELD_ID';

	
	const VALUE = 'ct_application_field_entry.VALUE';

	
	const STATUS = 'ct_application_field_entry.STATUS';

	
	const CREATED_AT = 'ct_application_field_entry.CREATED_AT';

	
	const DELETED_AT = 'ct_application_field_entry.DELETED_AT';

	
	const UPDATED_AT = 'ct_application_field_entry.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'ApplicationId', 'FieldId', 'Value', 'Status', 'CreatedAt', 'DeletedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (CoApplicationFieldEntryPeer::ID, CoApplicationFieldEntryPeer::UUID, CoApplicationFieldEntryPeer::APPLICATION_ID, CoApplicationFieldEntryPeer::FIELD_ID, CoApplicationFieldEntryPeer::VALUE, CoApplicationFieldEntryPeer::STATUS, CoApplicationFieldEntryPeer::CREATED_AT, CoApplicationFieldEntryPeer::DELETED_AT, CoApplicationFieldEntryPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'application_id', 'field_id', 'value', 'status', 'created_at', 'deleted_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'ApplicationId' => 2, 'FieldId' => 3, 'Value' => 4, 'Status' => 5, 'CreatedAt' => 6, 'DeletedAt' => 7, 'UpdatedAt' => 8, ),
		BasePeer::TYPE_COLNAME => array (CoApplicationFieldEntryPeer::ID => 0, CoApplicationFieldEntryPeer::UUID => 1, CoApplicationFieldEntryPeer::APPLICATION_ID => 2, CoApplicationFieldEntryPeer::FIELD_ID => 3, CoApplicationFieldEntryPeer::VALUE => 4, CoApplicationFieldEntryPeer::STATUS => 5, CoApplicationFieldEntryPeer::CREATED_AT => 6, CoApplicationFieldEntryPeer::DELETED_AT => 7, CoApplicationFieldEntryPeer::UPDATED_AT => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'application_id' => 2, 'field_id' => 3, 'value' => 4, 'status' => 5, 'created_at' => 6, 'deleted_at' => 7, 'updated_at' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.CoApplicationFieldEntryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CoApplicationFieldEntryPeer::getTableMap();
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
		return str_replace(CoApplicationFieldEntryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::ID);

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::UUID);

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::APPLICATION_ID);

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::FIELD_ID);

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::VALUE);

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::STATUS);

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::CREATED_AT);

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::DELETED_AT);

		$criteria->addSelectColumn(CoApplicationFieldEntryPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ct_application_field_entry.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_application_field_entry.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CoApplicationFieldEntryPeer::doSelectRS($criteria, $con);
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
		$objects = CoApplicationFieldEntryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CoApplicationFieldEntryPeer::populateObjects(CoApplicationFieldEntryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CoApplicationFieldEntryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CoApplicationFieldEntryPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCoApplication(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoApplicationFieldEntryPeer::APPLICATION_ID, CoApplicationPeer::ID);

		$rs = CoApplicationFieldEntryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCoField(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoApplicationFieldEntryPeer::FIELD_ID, CoFieldPeer::ID);

		$rs = CoApplicationFieldEntryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCoApplication(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoApplicationFieldEntryPeer::addSelectColumns($c);
		$startcol = (CoApplicationFieldEntryPeer::NUM_COLUMNS - CoApplicationFieldEntryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CoApplicationPeer::addSelectColumns($c);

		$c->addJoin(CoApplicationFieldEntryPeer::APPLICATION_ID, CoApplicationPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoApplicationFieldEntryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CoApplicationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCoApplication(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCoApplicationFieldEntry($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCoApplicationFieldEntrys();
				$obj2->addCoApplicationFieldEntry($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCoField(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoApplicationFieldEntryPeer::addSelectColumns($c);
		$startcol = (CoApplicationFieldEntryPeer::NUM_COLUMNS - CoApplicationFieldEntryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CoFieldPeer::addSelectColumns($c);

		$c->addJoin(CoApplicationFieldEntryPeer::FIELD_ID, CoFieldPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoApplicationFieldEntryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CoFieldPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCoField(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCoApplicationFieldEntry($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCoApplicationFieldEntrys();
				$obj2->addCoApplicationFieldEntry($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoApplicationFieldEntryPeer::APPLICATION_ID, CoApplicationPeer::ID);

		$criteria->addJoin(CoApplicationFieldEntryPeer::FIELD_ID, CoFieldPeer::ID);

		$rs = CoApplicationFieldEntryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoApplicationFieldEntryPeer::addSelectColumns($c);
		$startcol2 = (CoApplicationFieldEntryPeer::NUM_COLUMNS - CoApplicationFieldEntryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CoApplicationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CoApplicationPeer::NUM_COLUMNS;

		CoFieldPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CoFieldPeer::NUM_COLUMNS;

		$c->addJoin(CoApplicationFieldEntryPeer::APPLICATION_ID, CoApplicationPeer::ID);

		$c->addJoin(CoApplicationFieldEntryPeer::FIELD_ID, CoFieldPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoApplicationFieldEntryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CoApplicationPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCoApplication(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCoApplicationFieldEntry($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCoApplicationFieldEntrys();
				$obj2->addCoApplicationFieldEntry($obj1);
			}


					
			$omClass = CoFieldPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCoField(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCoApplicationFieldEntry($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCoApplicationFieldEntrys();
				$obj3->addCoApplicationFieldEntry($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCoApplication(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoApplicationFieldEntryPeer::FIELD_ID, CoFieldPeer::ID);

		$rs = CoApplicationFieldEntryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCoField(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoApplicationFieldEntryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoApplicationFieldEntryPeer::APPLICATION_ID, CoApplicationPeer::ID);

		$rs = CoApplicationFieldEntryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCoApplication(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoApplicationFieldEntryPeer::addSelectColumns($c);
		$startcol2 = (CoApplicationFieldEntryPeer::NUM_COLUMNS - CoApplicationFieldEntryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CoFieldPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CoFieldPeer::NUM_COLUMNS;

		$c->addJoin(CoApplicationFieldEntryPeer::FIELD_ID, CoFieldPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoApplicationFieldEntryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CoFieldPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCoField(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCoApplicationFieldEntry($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCoApplicationFieldEntrys();
				$obj2->addCoApplicationFieldEntry($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCoField(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoApplicationFieldEntryPeer::addSelectColumns($c);
		$startcol2 = (CoApplicationFieldEntryPeer::NUM_COLUMNS - CoApplicationFieldEntryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CoApplicationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CoApplicationPeer::NUM_COLUMNS;

		$c->addJoin(CoApplicationFieldEntryPeer::APPLICATION_ID, CoApplicationPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoApplicationFieldEntryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CoApplicationPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCoApplication(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCoApplicationFieldEntry($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCoApplicationFieldEntrys();
				$obj2->addCoApplicationFieldEntry($obj1);
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
		return CoApplicationFieldEntryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $values, $con);
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

		$criteria->remove(CoApplicationFieldEntryPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $values, $con);
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
			$comparison = $criteria->getComparison(CoApplicationFieldEntryPeer::ID);
			$selectCriteria->add(CoApplicationFieldEntryPeer::ID, $criteria->remove(CoApplicationFieldEntryPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntryPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseCoApplicationFieldEntryPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(CoApplicationFieldEntryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CoApplicationFieldEntryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CoApplicationFieldEntry) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CoApplicationFieldEntryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CoApplicationFieldEntry $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CoApplicationFieldEntryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CoApplicationFieldEntryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CoApplicationFieldEntryPeer::DATABASE_NAME, CoApplicationFieldEntryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CoApplicationFieldEntryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CoApplicationFieldEntryPeer::DATABASE_NAME);

		$criteria->add(CoApplicationFieldEntryPeer::ID, $pk);


		$v = CoApplicationFieldEntryPeer::doSelect($criteria, $con);

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
			$criteria->add(CoApplicationFieldEntryPeer::ID, $pks, Criteria::IN);
			$objs = CoApplicationFieldEntryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCoApplicationFieldEntryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.CoApplicationFieldEntryMapBuilder');
}
