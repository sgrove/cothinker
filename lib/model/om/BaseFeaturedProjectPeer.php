<?php


abstract class BaseFeaturedProjectPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_featured_project';

	
	const CLASS_DEFAULT = 'lib.model.FeaturedProject';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_featured_project.ID';

	
	const UUID = 'ct_featured_project.UUID';

	
	const PROJECT_ID = 'ct_featured_project.PROJECT_ID';

	
	const COMMENT = 'ct_featured_project.COMMENT';

	
	const SLUG = 'ct_featured_project.SLUG';

	
	const TITLE = 'ct_featured_project.TITLE';

	
	const CREATED_AT = 'ct_featured_project.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'ProjectId', 'Comment', 'Slug', 'Title', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (FeaturedProjectPeer::ID, FeaturedProjectPeer::UUID, FeaturedProjectPeer::PROJECT_ID, FeaturedProjectPeer::COMMENT, FeaturedProjectPeer::SLUG, FeaturedProjectPeer::TITLE, FeaturedProjectPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'project_id', 'comment', 'slug', 'title', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'ProjectId' => 2, 'Comment' => 3, 'Slug' => 4, 'Title' => 5, 'CreatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (FeaturedProjectPeer::ID => 0, FeaturedProjectPeer::UUID => 1, FeaturedProjectPeer::PROJECT_ID => 2, FeaturedProjectPeer::COMMENT => 3, FeaturedProjectPeer::SLUG => 4, FeaturedProjectPeer::TITLE => 5, FeaturedProjectPeer::CREATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'project_id' => 2, 'comment' => 3, 'slug' => 4, 'title' => 5, 'created_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.FeaturedProjectMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FeaturedProjectPeer::getTableMap();
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
		return str_replace(FeaturedProjectPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FeaturedProjectPeer::ID);

		$criteria->addSelectColumn(FeaturedProjectPeer::UUID);

		$criteria->addSelectColumn(FeaturedProjectPeer::PROJECT_ID);

		$criteria->addSelectColumn(FeaturedProjectPeer::COMMENT);

		$criteria->addSelectColumn(FeaturedProjectPeer::SLUG);

		$criteria->addSelectColumn(FeaturedProjectPeer::TITLE);

		$criteria->addSelectColumn(FeaturedProjectPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_featured_project.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_featured_project.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FeaturedProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FeaturedProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FeaturedProjectPeer::doSelectRS($criteria, $con);
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
		$objects = FeaturedProjectPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FeaturedProjectPeer::populateObjects(FeaturedProjectPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseFeaturedProjectPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseFeaturedProjectPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FeaturedProjectPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FeaturedProjectPeer::getOMClass();
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
			$criteria->addSelectColumn(FeaturedProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FeaturedProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FeaturedProjectPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = FeaturedProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinProject(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseFeaturedProjectPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseFeaturedProjectPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FeaturedProjectPeer::addSelectColumns($c);
		$startcol = (FeaturedProjectPeer::NUM_COLUMNS - FeaturedProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(FeaturedProjectPeer::PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FeaturedProjectPeer::getOMClass();

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
										$temp_obj2->addFeaturedProject($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFeaturedProjects();
				$obj2->addFeaturedProject($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FeaturedProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FeaturedProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FeaturedProjectPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = FeaturedProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseFeaturedProjectPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseFeaturedProjectPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FeaturedProjectPeer::addSelectColumns($c);
		$startcol2 = (FeaturedProjectPeer::NUM_COLUMNS - FeaturedProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(FeaturedProjectPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FeaturedProjectPeer::getOMClass();


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
					$temp_obj2->addFeaturedProject($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initFeaturedProjects();
				$obj2->addFeaturedProject($obj1);
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
		return FeaturedProjectPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseFeaturedProjectPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseFeaturedProjectPeer', $values, $con);
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

		$criteria->remove(FeaturedProjectPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseFeaturedProjectPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseFeaturedProjectPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseFeaturedProjectPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseFeaturedProjectPeer', $values, $con);
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
			$comparison = $criteria->getComparison(FeaturedProjectPeer::ID);
			$selectCriteria->add(FeaturedProjectPeer::ID, $criteria->remove(FeaturedProjectPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseFeaturedProjectPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseFeaturedProjectPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(FeaturedProjectPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FeaturedProjectPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof FeaturedProject) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FeaturedProjectPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(FeaturedProject $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FeaturedProjectPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FeaturedProjectPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FeaturedProjectPeer::DATABASE_NAME, FeaturedProjectPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FeaturedProjectPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FeaturedProjectPeer::DATABASE_NAME);

		$criteria->add(FeaturedProjectPeer::ID, $pk);


		$v = FeaturedProjectPeer::doSelect($criteria, $con);

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
			$criteria->add(FeaturedProjectPeer::ID, $pks, Criteria::IN);
			$objs = FeaturedProjectPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFeaturedProjectPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.FeaturedProjectMapBuilder');
}
