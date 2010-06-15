<?php


abstract class BaseSubdepartmentPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_subdepartment';

	
	const CLASS_DEFAULT = 'lib.model.Subdepartment';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_subdepartment.ID';

	
	const UUID = 'ct_subdepartment.UUID';

	
	const DEPARTMENT_ID = 'ct_subdepartment.DEPARTMENT_ID';

	
	const NAME = 'ct_subdepartment.NAME';

	
	const ABBREVIATION = 'ct_subdepartment.ABBREVIATION';

	
	const SLUG = 'ct_subdepartment.SLUG';

	
	const DELETED_AT = 'ct_subdepartment.DELETED_AT';

	
	const CREATED_AT = 'ct_subdepartment.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'DepartmentId', 'Name', 'Abbreviation', 'Slug', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (SubdepartmentPeer::ID, SubdepartmentPeer::UUID, SubdepartmentPeer::DEPARTMENT_ID, SubdepartmentPeer::NAME, SubdepartmentPeer::ABBREVIATION, SubdepartmentPeer::SLUG, SubdepartmentPeer::DELETED_AT, SubdepartmentPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'department_id', 'name', 'abbreviation', 'slug', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'DepartmentId' => 2, 'Name' => 3, 'Abbreviation' => 4, 'Slug' => 5, 'DeletedAt' => 6, 'CreatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (SubdepartmentPeer::ID => 0, SubdepartmentPeer::UUID => 1, SubdepartmentPeer::DEPARTMENT_ID => 2, SubdepartmentPeer::NAME => 3, SubdepartmentPeer::ABBREVIATION => 4, SubdepartmentPeer::SLUG => 5, SubdepartmentPeer::DELETED_AT => 6, SubdepartmentPeer::CREATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'department_id' => 2, 'name' => 3, 'abbreviation' => 4, 'slug' => 5, 'deleted_at' => 6, 'created_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.SubdepartmentMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SubdepartmentPeer::getTableMap();
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
		return str_replace(SubdepartmentPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SubdepartmentPeer::ID);

		$criteria->addSelectColumn(SubdepartmentPeer::UUID);

		$criteria->addSelectColumn(SubdepartmentPeer::DEPARTMENT_ID);

		$criteria->addSelectColumn(SubdepartmentPeer::NAME);

		$criteria->addSelectColumn(SubdepartmentPeer::ABBREVIATION);

		$criteria->addSelectColumn(SubdepartmentPeer::SLUG);

		$criteria->addSelectColumn(SubdepartmentPeer::DELETED_AT);

		$criteria->addSelectColumn(SubdepartmentPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_subdepartment.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_subdepartment.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubdepartmentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubdepartmentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SubdepartmentPeer::doSelectRS($criteria, $con);
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
		$objects = SubdepartmentPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SubdepartmentPeer::populateObjects(SubdepartmentPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSubdepartmentPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseSubdepartmentPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SubdepartmentPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SubdepartmentPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinDepartment(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubdepartmentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubdepartmentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SubdepartmentPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = SubdepartmentPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinDepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSubdepartmentPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseSubdepartmentPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SubdepartmentPeer::addSelectColumns($c);
		$startcol = (SubdepartmentPeer::NUM_COLUMNS - SubdepartmentPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DepartmentPeer::addSelectColumns($c);

		$c->addJoin(SubdepartmentPeer::DEPARTMENT_ID, DepartmentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SubdepartmentPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepartmentPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDepartment(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSubdepartment($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSubdepartments();
				$obj2->addSubdepartment($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubdepartmentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubdepartmentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SubdepartmentPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = SubdepartmentPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSubdepartmentPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseSubdepartmentPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SubdepartmentPeer::addSelectColumns($c);
		$startcol2 = (SubdepartmentPeer::NUM_COLUMNS - SubdepartmentPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepartmentPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepartmentPeer::NUM_COLUMNS;

		$c->addJoin(SubdepartmentPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SubdepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = DepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDepartment(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSubdepartment($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initSubdepartments();
				$obj2->addSubdepartment($obj1);
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
		return SubdepartmentPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSubdepartmentPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSubdepartmentPeer', $values, $con);
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

		$criteria->remove(SubdepartmentPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseSubdepartmentPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseSubdepartmentPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSubdepartmentPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSubdepartmentPeer', $values, $con);
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
			$comparison = $criteria->getComparison(SubdepartmentPeer::ID);
			$selectCriteria->add(SubdepartmentPeer::ID, $criteria->remove(SubdepartmentPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseSubdepartmentPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseSubdepartmentPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(SubdepartmentPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SubdepartmentPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Subdepartment) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SubdepartmentPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Subdepartment $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SubdepartmentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SubdepartmentPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SubdepartmentPeer::DATABASE_NAME, SubdepartmentPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SubdepartmentPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SubdepartmentPeer::DATABASE_NAME);

		$criteria->add(SubdepartmentPeer::ID, $pk);


		$v = SubdepartmentPeer::doSelect($criteria, $con);

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
			$criteria->add(SubdepartmentPeer::ID, $pks, Criteria::IN);
			$objs = SubdepartmentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSubdepartmentPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.SubdepartmentMapBuilder');
}
