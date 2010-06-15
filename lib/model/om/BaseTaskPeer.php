<?php


abstract class BaseTaskPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_task';

	
	const CLASS_DEFAULT = 'lib.model.Task';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_task.ID';

	
	const UUID = 'ct_task.UUID';

	
	const PROJECT_ID = 'ct_task.PROJECT_ID';

	
	const OWNER_ID = 'ct_task.OWNER_ID';

	
	const NAME = 'ct_task.NAME';

	
	const SLUG = 'ct_task.SLUG';

	
	const DESCRIPTION = 'ct_task.DESCRIPTION';

	
	const BEGIN = 'ct_task.BEGIN';

	
	const FINISH = 'ct_task.FINISH';

	
	const STATUS = 'ct_task.STATUS';

	
	const CONTEXT = 'ct_task.CONTEXT';

	
	const PRIORITY = 'ct_task.PRIORITY';

	
	const PRIVILEGED = 'ct_task.PRIVILEGED';

	
	const VERSION = 'ct_task.VERSION';

	
	const UPDATED_AT = 'ct_task.UPDATED_AT';

	
	const DELETED_AT = 'ct_task.DELETED_AT';

	
	const CREATED_AT = 'ct_task.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'ProjectId', 'OwnerId', 'Name', 'Slug', 'Description', 'Begin', 'Finish', 'Status', 'Context', 'Priority', 'Privileged', 'Version', 'UpdatedAt', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (TaskPeer::ID, TaskPeer::UUID, TaskPeer::PROJECT_ID, TaskPeer::OWNER_ID, TaskPeer::NAME, TaskPeer::SLUG, TaskPeer::DESCRIPTION, TaskPeer::BEGIN, TaskPeer::FINISH, TaskPeer::STATUS, TaskPeer::CONTEXT, TaskPeer::PRIORITY, TaskPeer::PRIVILEGED, TaskPeer::VERSION, TaskPeer::UPDATED_AT, TaskPeer::DELETED_AT, TaskPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'project_id', 'owner_id', 'name', 'slug', 'description', 'begin', 'finish', 'status', 'context', 'priority', 'privileged', 'version', 'updated_at', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'ProjectId' => 2, 'OwnerId' => 3, 'Name' => 4, 'Slug' => 5, 'Description' => 6, 'Begin' => 7, 'Finish' => 8, 'Status' => 9, 'Context' => 10, 'Priority' => 11, 'Privileged' => 12, 'Version' => 13, 'UpdatedAt' => 14, 'DeletedAt' => 15, 'CreatedAt' => 16, ),
		BasePeer::TYPE_COLNAME => array (TaskPeer::ID => 0, TaskPeer::UUID => 1, TaskPeer::PROJECT_ID => 2, TaskPeer::OWNER_ID => 3, TaskPeer::NAME => 4, TaskPeer::SLUG => 5, TaskPeer::DESCRIPTION => 6, TaskPeer::BEGIN => 7, TaskPeer::FINISH => 8, TaskPeer::STATUS => 9, TaskPeer::CONTEXT => 10, TaskPeer::PRIORITY => 11, TaskPeer::PRIVILEGED => 12, TaskPeer::VERSION => 13, TaskPeer::UPDATED_AT => 14, TaskPeer::DELETED_AT => 15, TaskPeer::CREATED_AT => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'project_id' => 2, 'owner_id' => 3, 'name' => 4, 'slug' => 5, 'description' => 6, 'begin' => 7, 'finish' => 8, 'status' => 9, 'context' => 10, 'priority' => 11, 'privileged' => 12, 'version' => 13, 'updated_at' => 14, 'deleted_at' => 15, 'created_at' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.TaskMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TaskPeer::getTableMap();
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
		return str_replace(TaskPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TaskPeer::ID);

		$criteria->addSelectColumn(TaskPeer::UUID);

		$criteria->addSelectColumn(TaskPeer::PROJECT_ID);

		$criteria->addSelectColumn(TaskPeer::OWNER_ID);

		$criteria->addSelectColumn(TaskPeer::NAME);

		$criteria->addSelectColumn(TaskPeer::SLUG);

		$criteria->addSelectColumn(TaskPeer::DESCRIPTION);

		$criteria->addSelectColumn(TaskPeer::BEGIN);

		$criteria->addSelectColumn(TaskPeer::FINISH);

		$criteria->addSelectColumn(TaskPeer::STATUS);

		$criteria->addSelectColumn(TaskPeer::CONTEXT);

		$criteria->addSelectColumn(TaskPeer::PRIORITY);

		$criteria->addSelectColumn(TaskPeer::PRIVILEGED);

		$criteria->addSelectColumn(TaskPeer::VERSION);

		$criteria->addSelectColumn(TaskPeer::UPDATED_AT);

		$criteria->addSelectColumn(TaskPeer::DELETED_AT);

		$criteria->addSelectColumn(TaskPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_task.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_task.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TaskPeer::doSelectRS($criteria, $con);
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
		$objects = TaskPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TaskPeer::populateObjects(TaskPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TaskPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TaskPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinProject(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTask($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::OWNER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

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
										$temp_obj2->addTask($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(TaskPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(TaskPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTask($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1);
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
					$temp_obj3->addTask($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initTasks();
				$obj3->addTask($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptProject(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::OWNER_ID, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

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
					$temp_obj2->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1);
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
		return TaskPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseTaskPeer', $values, $con);
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

		$criteria->remove(TaskPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseTaskPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseTaskPeer', $values, $con);
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
			$comparison = $criteria->getComparison(TaskPeer::ID);
			$selectCriteria->add(TaskPeer::ID, $criteria->remove(TaskPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseTaskPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(TaskPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TaskPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Task) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TaskPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Task $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TaskPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TaskPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TaskPeer::DATABASE_NAME, TaskPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TaskPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TaskPeer::DATABASE_NAME);

		$criteria->add(TaskPeer::ID, $pk);


		$v = TaskPeer::doSelect($criteria, $con);

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
			$criteria->add(TaskPeer::ID, $pks, Criteria::IN);
			$objs = TaskPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTaskPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.TaskMapBuilder');
}
