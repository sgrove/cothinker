<?php


abstract class BaseToDoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_user_todo';

	
	const CLASS_DEFAULT = 'lib.model.ToDo';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_user_todo.ID';

	
	const UUID = 'ct_user_todo.UUID';

	
	const OWNER_ID = 'ct_user_todo.OWNER_ID';

	
	const NAME = 'ct_user_todo.NAME';

	
	const SLUG = 'ct_user_todo.SLUG';

	
	const DESCRIPTION = 'ct_user_todo.DESCRIPTION';

	
	const BEGIN = 'ct_user_todo.BEGIN';

	
	const FINISH = 'ct_user_todo.FINISH';

	
	const STATUS = 'ct_user_todo.STATUS';

	
	const CONTEXT = 'ct_user_todo.CONTEXT';

	
	const PRIORITY = 'ct_user_todo.PRIORITY';

	
	const PRIVILEGED = 'ct_user_todo.PRIVILEGED';

	
	const UPDATED_AT = 'ct_user_todo.UPDATED_AT';

	
	const DELETED_AT = 'ct_user_todo.DELETED_AT';

	
	const CREATED_AT = 'ct_user_todo.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'OwnerId', 'Name', 'Slug', 'Description', 'Begin', 'Finish', 'Status', 'Context', 'Priority', 'Privileged', 'UpdatedAt', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (ToDoPeer::ID, ToDoPeer::UUID, ToDoPeer::OWNER_ID, ToDoPeer::NAME, ToDoPeer::SLUG, ToDoPeer::DESCRIPTION, ToDoPeer::BEGIN, ToDoPeer::FINISH, ToDoPeer::STATUS, ToDoPeer::CONTEXT, ToDoPeer::PRIORITY, ToDoPeer::PRIVILEGED, ToDoPeer::UPDATED_AT, ToDoPeer::DELETED_AT, ToDoPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'owner_id', 'name', 'slug', 'description', 'begin', 'finish', 'status', 'context', 'priority', 'privileged', 'updated_at', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'OwnerId' => 2, 'Name' => 3, 'Slug' => 4, 'Description' => 5, 'Begin' => 6, 'Finish' => 7, 'Status' => 8, 'Context' => 9, 'Priority' => 10, 'Privileged' => 11, 'UpdatedAt' => 12, 'DeletedAt' => 13, 'CreatedAt' => 14, ),
		BasePeer::TYPE_COLNAME => array (ToDoPeer::ID => 0, ToDoPeer::UUID => 1, ToDoPeer::OWNER_ID => 2, ToDoPeer::NAME => 3, ToDoPeer::SLUG => 4, ToDoPeer::DESCRIPTION => 5, ToDoPeer::BEGIN => 6, ToDoPeer::FINISH => 7, ToDoPeer::STATUS => 8, ToDoPeer::CONTEXT => 9, ToDoPeer::PRIORITY => 10, ToDoPeer::PRIVILEGED => 11, ToDoPeer::UPDATED_AT => 12, ToDoPeer::DELETED_AT => 13, ToDoPeer::CREATED_AT => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'owner_id' => 2, 'name' => 3, 'slug' => 4, 'description' => 5, 'begin' => 6, 'finish' => 7, 'status' => 8, 'context' => 9, 'priority' => 10, 'privileged' => 11, 'updated_at' => 12, 'deleted_at' => 13, 'created_at' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ToDoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ToDoPeer::getTableMap();
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
		return str_replace(ToDoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ToDoPeer::ID);

		$criteria->addSelectColumn(ToDoPeer::UUID);

		$criteria->addSelectColumn(ToDoPeer::OWNER_ID);

		$criteria->addSelectColumn(ToDoPeer::NAME);

		$criteria->addSelectColumn(ToDoPeer::SLUG);

		$criteria->addSelectColumn(ToDoPeer::DESCRIPTION);

		$criteria->addSelectColumn(ToDoPeer::BEGIN);

		$criteria->addSelectColumn(ToDoPeer::FINISH);

		$criteria->addSelectColumn(ToDoPeer::STATUS);

		$criteria->addSelectColumn(ToDoPeer::CONTEXT);

		$criteria->addSelectColumn(ToDoPeer::PRIORITY);

		$criteria->addSelectColumn(ToDoPeer::PRIVILEGED);

		$criteria->addSelectColumn(ToDoPeer::UPDATED_AT);

		$criteria->addSelectColumn(ToDoPeer::DELETED_AT);

		$criteria->addSelectColumn(ToDoPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_user_todo.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_user_todo.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ToDoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ToDoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ToDoPeer::doSelectRS($criteria, $con);
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
		$objects = ToDoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ToDoPeer::populateObjects(ToDoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseToDoPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseToDoPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ToDoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ToDoPeer::getOMClass();
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
			$criteria->addSelectColumn(ToDoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ToDoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ToDoPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = ToDoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseToDoPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseToDoPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ToDoPeer::addSelectColumns($c);
		$startcol = (ToDoPeer::NUM_COLUMNS - ToDoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ToDoPeer::OWNER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ToDoPeer::getOMClass();

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
										$temp_obj2->addToDo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initToDos();
				$obj2->addToDo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ToDoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ToDoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ToDoPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = ToDoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseToDoPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseToDoPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ToDoPeer::addSelectColumns($c);
		$startcol2 = (ToDoPeer::NUM_COLUMNS - ToDoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ToDoPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ToDoPeer::getOMClass();


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
					$temp_obj2->addToDo($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initToDos();
				$obj2->addToDo($obj1);
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
		return ToDoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseToDoPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseToDoPeer', $values, $con);
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

		$criteria->remove(ToDoPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseToDoPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseToDoPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseToDoPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseToDoPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ToDoPeer::ID);
			$selectCriteria->add(ToDoPeer::ID, $criteria->remove(ToDoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseToDoPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseToDoPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ToDoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ToDoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ToDo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ToDoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ToDo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ToDoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ToDoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ToDoPeer::DATABASE_NAME, ToDoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ToDoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ToDoPeer::DATABASE_NAME);

		$criteria->add(ToDoPeer::ID, $pk);


		$v = ToDoPeer::doSelect($criteria, $con);

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
			$criteria->add(ToDoPeer::ID, $pks, Criteria::IN);
			$objs = ToDoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseToDoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ToDoMapBuilder');
}
