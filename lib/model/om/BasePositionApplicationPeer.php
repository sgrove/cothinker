<?php


abstract class BasePositionApplicationPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_position_application';

	
	const CLASS_DEFAULT = 'lib.model.PositionApplication';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_position_application.ID';

	
	const UUID = 'ct_position_application.UUID';

	
	const USER_ID = 'ct_position_application.USER_ID';

	
	const POSITION_ID = 'ct_position_application.POSITION_ID';

	
	const INTEREST = 'ct_position_application.INTEREST';

	
	const QUALIFICATION = 'ct_position_application.QUALIFICATION';

	
	const NOTES = 'ct_position_application.NOTES';

	
	const STATUS = 'ct_position_application.STATUS';

	
	const READ_AT = 'ct_position_application.READ_AT';

	
	const CREATED_AT = 'ct_position_application.CREATED_AT';

	
	const DELETED_AT = 'ct_position_application.DELETED_AT';

	
	const UPDATED_AT = 'ct_position_application.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'UserId', 'PositionId', 'Interest', 'Qualification', 'Notes', 'Status', 'ReadAt', 'CreatedAt', 'DeletedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (PositionApplicationPeer::ID, PositionApplicationPeer::UUID, PositionApplicationPeer::USER_ID, PositionApplicationPeer::POSITION_ID, PositionApplicationPeer::INTEREST, PositionApplicationPeer::QUALIFICATION, PositionApplicationPeer::NOTES, PositionApplicationPeer::STATUS, PositionApplicationPeer::READ_AT, PositionApplicationPeer::CREATED_AT, PositionApplicationPeer::DELETED_AT, PositionApplicationPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'user_id', 'position_id', 'interest', 'qualification', 'notes', 'status', 'read_at', 'created_at', 'deleted_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'UserId' => 2, 'PositionId' => 3, 'Interest' => 4, 'Qualification' => 5, 'Notes' => 6, 'Status' => 7, 'ReadAt' => 8, 'CreatedAt' => 9, 'DeletedAt' => 10, 'UpdatedAt' => 11, ),
		BasePeer::TYPE_COLNAME => array (PositionApplicationPeer::ID => 0, PositionApplicationPeer::UUID => 1, PositionApplicationPeer::USER_ID => 2, PositionApplicationPeer::POSITION_ID => 3, PositionApplicationPeer::INTEREST => 4, PositionApplicationPeer::QUALIFICATION => 5, PositionApplicationPeer::NOTES => 6, PositionApplicationPeer::STATUS => 7, PositionApplicationPeer::READ_AT => 8, PositionApplicationPeer::CREATED_AT => 9, PositionApplicationPeer::DELETED_AT => 10, PositionApplicationPeer::UPDATED_AT => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'user_id' => 2, 'position_id' => 3, 'interest' => 4, 'qualification' => 5, 'notes' => 6, 'status' => 7, 'read_at' => 8, 'created_at' => 9, 'deleted_at' => 10, 'updated_at' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.PositionApplicationMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PositionApplicationPeer::getTableMap();
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
		return str_replace(PositionApplicationPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PositionApplicationPeer::ID);

		$criteria->addSelectColumn(PositionApplicationPeer::UUID);

		$criteria->addSelectColumn(PositionApplicationPeer::USER_ID);

		$criteria->addSelectColumn(PositionApplicationPeer::POSITION_ID);

		$criteria->addSelectColumn(PositionApplicationPeer::INTEREST);

		$criteria->addSelectColumn(PositionApplicationPeer::QUALIFICATION);

		$criteria->addSelectColumn(PositionApplicationPeer::NOTES);

		$criteria->addSelectColumn(PositionApplicationPeer::STATUS);

		$criteria->addSelectColumn(PositionApplicationPeer::READ_AT);

		$criteria->addSelectColumn(PositionApplicationPeer::CREATED_AT);

		$criteria->addSelectColumn(PositionApplicationPeer::DELETED_AT);

		$criteria->addSelectColumn(PositionApplicationPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ct_position_application.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_position_application.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PositionApplicationPeer::doSelectRS($criteria, $con);
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
		$objects = PositionApplicationPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PositionApplicationPeer::populateObjects(PositionApplicationPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasePositionApplicationPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PositionApplicationPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PositionApplicationPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PositionApplicationPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = PositionApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProjectPosition(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PositionApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = PositionApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasePositionApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PositionApplicationPeer::addSelectColumns($c);
		$startcol = (PositionApplicationPeer::NUM_COLUMNS - PositionApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(PositionApplicationPeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PositionApplicationPeer::getOMClass();

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
										$temp_obj2->addPositionApplication($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPositionApplications();
				$obj2->addPositionApplication($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProjectPosition(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasePositionApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PositionApplicationPeer::addSelectColumns($c);
		$startcol = (PositionApplicationPeer::NUM_COLUMNS - PositionApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPositionPeer::addSelectColumns($c);

		$c->addJoin(PositionApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PositionApplicationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPositionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProjectPosition(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPositionApplication($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPositionApplications();
				$obj2->addPositionApplication($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PositionApplicationPeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(PositionApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = PositionApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasePositionApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PositionApplicationPeer::addSelectColumns($c);
		$startcol2 = (PositionApplicationPeer::NUM_COLUMNS - PositionApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPositionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPositionPeer::NUM_COLUMNS;

		$c->addJoin(PositionApplicationPeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(PositionApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PositionApplicationPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPositionApplication($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPositionApplications();
				$obj2->addPositionApplication($obj1);
			}


					
			$omClass = ProjectPositionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectPosition(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPositionApplication($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initPositionApplications();
				$obj3->addPositionApplication($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PositionApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = PositionApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProjectPosition(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PositionApplicationPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = PositionApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BasePositionApplicationPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PositionApplicationPeer::addSelectColumns($c);
		$startcol2 = (PositionApplicationPeer::NUM_COLUMNS - PositionApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPositionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPositionPeer::NUM_COLUMNS;

		$c->addJoin(PositionApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PositionApplicationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPositionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProjectPosition(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPositionApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPositionApplications();
				$obj2->addPositionApplication($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProjectPosition(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BasePositionApplicationPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PositionApplicationPeer::addSelectColumns($c);
		$startcol2 = (PositionApplicationPeer::NUM_COLUMNS - PositionApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(PositionApplicationPeer::USER_ID, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PositionApplicationPeer::getOMClass();

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
					$temp_obj2->addPositionApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPositionApplications();
				$obj2->addPositionApplication($obj1);
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
		return PositionApplicationPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePositionApplicationPeer', $values, $con);
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

		$criteria->remove(PositionApplicationPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasePositionApplicationPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePositionApplicationPeer', $values, $con);
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
			$comparison = $criteria->getComparison(PositionApplicationPeer::ID);
			$selectCriteria->add(PositionApplicationPeer::ID, $criteria->remove(PositionApplicationPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasePositionApplicationPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasePositionApplicationPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(PositionApplicationPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PositionApplicationPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PositionApplication) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PositionApplicationPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PositionApplication $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PositionApplicationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PositionApplicationPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PositionApplicationPeer::DATABASE_NAME, PositionApplicationPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PositionApplicationPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PositionApplicationPeer::DATABASE_NAME);

		$criteria->add(PositionApplicationPeer::ID, $pk);


		$v = PositionApplicationPeer::doSelect($criteria, $con);

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
			$criteria->add(PositionApplicationPeer::ID, $pks, Criteria::IN);
			$objs = PositionApplicationPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePositionApplicationPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.PositionApplicationMapBuilder');
}
