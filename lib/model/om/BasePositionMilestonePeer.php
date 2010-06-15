<?php


abstract class BasePositionMilestonePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_position_milestone';

	
	const CLASS_DEFAULT = 'lib.model.PositionMilestone';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_position_milestone.ID';

	
	const UUID = 'ct_position_milestone.UUID';

	
	const POSITION_ID = 'ct_position_milestone.POSITION_ID';

	
	const TITLE = 'ct_position_milestone.TITLE';

	
	const DESCRIPTION = 'ct_position_milestone.DESCRIPTION';

	
	const DELIVERABLES = 'ct_position_milestone.DELIVERABLES';

	
	const DEADLINE = 'ct_position_milestone.DEADLINE';

	
	const STATUS = 'ct_position_milestone.STATUS';

	
	const RANK = 'ct_position_milestone.RANK';

	
	const FILLED = 'ct_position_milestone.FILLED';

	
	const UPDATED_AT = 'ct_position_milestone.UPDATED_AT';

	
	const DELETED_AT = 'ct_position_milestone.DELETED_AT';

	
	const CREATED_AT = 'ct_position_milestone.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'PositionId', 'Title', 'Description', 'Deliverables', 'Deadline', 'Status', 'Rank', 'Filled', 'UpdatedAt', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (PositionMilestonePeer::ID, PositionMilestonePeer::UUID, PositionMilestonePeer::POSITION_ID, PositionMilestonePeer::TITLE, PositionMilestonePeer::DESCRIPTION, PositionMilestonePeer::DELIVERABLES, PositionMilestonePeer::DEADLINE, PositionMilestonePeer::STATUS, PositionMilestonePeer::RANK, PositionMilestonePeer::FILLED, PositionMilestonePeer::UPDATED_AT, PositionMilestonePeer::DELETED_AT, PositionMilestonePeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'position_id', 'title', 'description', 'deliverables', 'deadline', 'status', 'rank', 'filled', 'updated_at', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'PositionId' => 2, 'Title' => 3, 'Description' => 4, 'Deliverables' => 5, 'Deadline' => 6, 'Status' => 7, 'Rank' => 8, 'Filled' => 9, 'UpdatedAt' => 10, 'DeletedAt' => 11, 'CreatedAt' => 12, ),
		BasePeer::TYPE_COLNAME => array (PositionMilestonePeer::ID => 0, PositionMilestonePeer::UUID => 1, PositionMilestonePeer::POSITION_ID => 2, PositionMilestonePeer::TITLE => 3, PositionMilestonePeer::DESCRIPTION => 4, PositionMilestonePeer::DELIVERABLES => 5, PositionMilestonePeer::DEADLINE => 6, PositionMilestonePeer::STATUS => 7, PositionMilestonePeer::RANK => 8, PositionMilestonePeer::FILLED => 9, PositionMilestonePeer::UPDATED_AT => 10, PositionMilestonePeer::DELETED_AT => 11, PositionMilestonePeer::CREATED_AT => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'position_id' => 2, 'title' => 3, 'description' => 4, 'deliverables' => 5, 'deadline' => 6, 'status' => 7, 'rank' => 8, 'filled' => 9, 'updated_at' => 10, 'deleted_at' => 11, 'created_at' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.PositionMilestoneMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PositionMilestonePeer::getTableMap();
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
		return str_replace(PositionMilestonePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PositionMilestonePeer::ID);

		$criteria->addSelectColumn(PositionMilestonePeer::UUID);

		$criteria->addSelectColumn(PositionMilestonePeer::POSITION_ID);

		$criteria->addSelectColumn(PositionMilestonePeer::TITLE);

		$criteria->addSelectColumn(PositionMilestonePeer::DESCRIPTION);

		$criteria->addSelectColumn(PositionMilestonePeer::DELIVERABLES);

		$criteria->addSelectColumn(PositionMilestonePeer::DEADLINE);

		$criteria->addSelectColumn(PositionMilestonePeer::STATUS);

		$criteria->addSelectColumn(PositionMilestonePeer::RANK);

		$criteria->addSelectColumn(PositionMilestonePeer::FILLED);

		$criteria->addSelectColumn(PositionMilestonePeer::UPDATED_AT);

		$criteria->addSelectColumn(PositionMilestonePeer::DELETED_AT);

		$criteria->addSelectColumn(PositionMilestonePeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_position_milestone.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_position_milestone.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionMilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionMilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PositionMilestonePeer::doSelectRS($criteria, $con);
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
		$objects = PositionMilestonePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PositionMilestonePeer::populateObjects(PositionMilestonePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionMilestonePeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasePositionMilestonePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PositionMilestonePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PositionMilestonePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinProjectPosition(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionMilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionMilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PositionMilestonePeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = PositionMilestonePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinProjectPosition(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionMilestonePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasePositionMilestonePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PositionMilestonePeer::addSelectColumns($c);
		$startcol = (PositionMilestonePeer::NUM_COLUMNS - PositionMilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPositionPeer::addSelectColumns($c);

		$c->addJoin(PositionMilestonePeer::POSITION_ID, ProjectPositionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PositionMilestonePeer::getOMClass();

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
										$temp_obj2->addPositionMilestone($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPositionMilestones();
				$obj2->addPositionMilestone($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PositionMilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PositionMilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PositionMilestonePeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = PositionMilestonePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionMilestonePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasePositionMilestonePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PositionMilestonePeer::addSelectColumns($c);
		$startcol2 = (PositionMilestonePeer::NUM_COLUMNS - PositionMilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPositionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPositionPeer::NUM_COLUMNS;

		$c->addJoin(PositionMilestonePeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PositionMilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ProjectPositionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProjectPosition(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPositionMilestone($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPositionMilestones();
				$obj2->addPositionMilestone($obj1);
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
		return PositionMilestonePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionMilestonePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePositionMilestonePeer', $values, $con);
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

		$criteria->remove(PositionMilestonePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasePositionMilestonePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasePositionMilestonePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePositionMilestonePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePositionMilestonePeer', $values, $con);
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
			$comparison = $criteria->getComparison(PositionMilestonePeer::ID);
			$selectCriteria->add(PositionMilestonePeer::ID, $criteria->remove(PositionMilestonePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasePositionMilestonePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasePositionMilestonePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(PositionMilestonePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PositionMilestonePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PositionMilestone) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PositionMilestonePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PositionMilestone $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PositionMilestonePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PositionMilestonePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PositionMilestonePeer::DATABASE_NAME, PositionMilestonePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PositionMilestonePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PositionMilestonePeer::DATABASE_NAME);

		$criteria->add(PositionMilestonePeer::ID, $pk);


		$v = PositionMilestonePeer::doSelect($criteria, $con);

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
			$criteria->add(PositionMilestonePeer::ID, $pks, Criteria::IN);
			$objs = PositionMilestonePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePositionMilestonePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.PositionMilestoneMapBuilder');
}
