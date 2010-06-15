<?php


abstract class BaseProjectUserPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_project_user';

	
	const CLASS_DEFAULT = 'lib.model.ProjectUser';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_project_user.ID';

	
	const UUID = 'ct_project_user.UUID';

	
	const USER_ID = 'ct_project_user.USER_ID';

	
	const POSITION_ID = 'ct_project_user.POSITION_ID';

	
	const TOTAL_HOURS = 'ct_project_user.TOTAL_HOURS';

	
	const POSITION = 'ct_project_user.POSITION';

	
	const STATUS = 'ct_project_user.STATUS';

	
	const IS_APPROVED = 'ct_project_user.IS_APPROVED';

	
	const UPDATED_AT = 'ct_project_user.UPDATED_AT';

	
	const DELETED_AT = 'ct_project_user.DELETED_AT';

	
	const CREATED_AT = 'ct_project_user.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'UserId', 'PositionId', 'TotalHours', 'Position', 'Status', 'IsApproved', 'UpdatedAt', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (ProjectUserPeer::ID, ProjectUserPeer::UUID, ProjectUserPeer::USER_ID, ProjectUserPeer::POSITION_ID, ProjectUserPeer::TOTAL_HOURS, ProjectUserPeer::POSITION, ProjectUserPeer::STATUS, ProjectUserPeer::IS_APPROVED, ProjectUserPeer::UPDATED_AT, ProjectUserPeer::DELETED_AT, ProjectUserPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'user_id', 'position_id', 'total_hours', 'position', 'status', 'is_approved', 'updated_at', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'UserId' => 2, 'PositionId' => 3, 'TotalHours' => 4, 'Position' => 5, 'Status' => 6, 'IsApproved' => 7, 'UpdatedAt' => 8, 'DeletedAt' => 9, 'CreatedAt' => 10, ),
		BasePeer::TYPE_COLNAME => array (ProjectUserPeer::ID => 0, ProjectUserPeer::UUID => 1, ProjectUserPeer::USER_ID => 2, ProjectUserPeer::POSITION_ID => 3, ProjectUserPeer::TOTAL_HOURS => 4, ProjectUserPeer::POSITION => 5, ProjectUserPeer::STATUS => 6, ProjectUserPeer::IS_APPROVED => 7, ProjectUserPeer::UPDATED_AT => 8, ProjectUserPeer::DELETED_AT => 9, ProjectUserPeer::CREATED_AT => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'user_id' => 2, 'position_id' => 3, 'total_hours' => 4, 'position' => 5, 'status' => 6, 'is_approved' => 7, 'updated_at' => 8, 'deleted_at' => 9, 'created_at' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ProjectUserMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ProjectUserPeer::getTableMap();
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
		return str_replace(ProjectUserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ProjectUserPeer::ID);

		$criteria->addSelectColumn(ProjectUserPeer::UUID);

		$criteria->addSelectColumn(ProjectUserPeer::USER_ID);

		$criteria->addSelectColumn(ProjectUserPeer::POSITION_ID);

		$criteria->addSelectColumn(ProjectUserPeer::TOTAL_HOURS);

		$criteria->addSelectColumn(ProjectUserPeer::POSITION);

		$criteria->addSelectColumn(ProjectUserPeer::STATUS);

		$criteria->addSelectColumn(ProjectUserPeer::IS_APPROVED);

		$criteria->addSelectColumn(ProjectUserPeer::UPDATED_AT);

		$criteria->addSelectColumn(ProjectUserPeer::DELETED_AT);

		$criteria->addSelectColumn(ProjectUserPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_project_user.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_project_user.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ProjectUserPeer::doSelectRS($criteria, $con);
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
		$objects = ProjectUserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ProjectUserPeer::populateObjects(ProjectUserPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseProjectUserPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ProjectUserPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ProjectUserPeer::getOMClass();
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
			$criteria->addSelectColumn(ProjectUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectUserPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ProjectUserPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectUserPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = ProjectUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectUserPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectUserPeer::addSelectColumns($c);
		$startcol = (ProjectUserPeer::NUM_COLUMNS - ProjectUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectUserPeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectUserPeer::getOMClass();

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
										$temp_obj2->addProjectUser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectUsers();
				$obj2->addProjectUser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProjectPosition(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectUserPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectUserPeer::addSelectColumns($c);
		$startcol = (ProjectUserPeer::NUM_COLUMNS - ProjectUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPositionPeer::addSelectColumns($c);

		$c->addJoin(ProjectUserPeer::POSITION_ID, ProjectPositionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectUserPeer::getOMClass();

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
										$temp_obj2->addProjectUser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectUsers();
				$obj2->addProjectUser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectUserPeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectUserPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = ProjectUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseProjectUserPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectUserPeer::addSelectColumns($c);
		$startcol2 = (ProjectUserPeer::NUM_COLUMNS - ProjectUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPositionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPositionPeer::NUM_COLUMNS;

		$c->addJoin(ProjectUserPeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectUserPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectUserPeer::getOMClass();


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
					$temp_obj2->addProjectUser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectUsers();
				$obj2->addProjectUser($obj1);
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
					$temp_obj3->addProjectUser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectUsers();
				$obj3->addProjectUser($obj1);
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
			$criteria->addSelectColumn(ProjectUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectUserPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = ProjectUserPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectUserPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ProjectUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectUserPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectUserPeer::addSelectColumns($c);
		$startcol2 = (ProjectUserPeer::NUM_COLUMNS - ProjectUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPositionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPositionPeer::NUM_COLUMNS;

		$c->addJoin(ProjectUserPeer::POSITION_ID, ProjectPositionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectUserPeer::getOMClass();

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
					$temp_obj2->addProjectUser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectUsers();
				$obj2->addProjectUser($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProjectPosition(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectUserPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectUserPeer::addSelectColumns($c);
		$startcol2 = (ProjectUserPeer::NUM_COLUMNS - ProjectUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ProjectUserPeer::USER_ID, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectUserPeer::getOMClass();

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
					$temp_obj2->addProjectUser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectUsers();
				$obj2->addProjectUser($obj1);
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
		return ProjectUserPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectUserPeer', $values, $con);
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

		$criteria->remove(ProjectUserPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseProjectUserPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectUserPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectUserPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ProjectUserPeer::ID);
			$selectCriteria->add(ProjectUserPeer::ID, $criteria->remove(ProjectUserPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseProjectUserPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectUserPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ProjectUserPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ProjectUserPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ProjectUser) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProjectUserPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ProjectUser $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProjectUserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProjectUserPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ProjectUserPeer::DATABASE_NAME, ProjectUserPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ProjectUserPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ProjectUserPeer::DATABASE_NAME);

		$criteria->add(ProjectUserPeer::ID, $pk);


		$v = ProjectUserPeer::doSelect($criteria, $con);

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
			$criteria->add(ProjectUserPeer::ID, $pks, Criteria::IN);
			$objs = ProjectUserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseProjectUserPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ProjectUserMapBuilder');
}
