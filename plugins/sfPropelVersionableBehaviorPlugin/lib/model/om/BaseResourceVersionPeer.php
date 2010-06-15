<?php


abstract class BaseResourceVersionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'resource_version';

	
	const CLASS_DEFAULT = 'plugins.sfPropelVersionableBehaviorPlugin.lib.model.ResourceVersion';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'resource_version.ID';

	
	const RESOURCE_ID = 'resource_version.RESOURCE_ID';

	
	const RESOURCE_NAME = 'resource_version.RESOURCE_NAME';

	
	const NUMBER = 'resource_version.NUMBER';

	
	const TITLE = 'resource_version.TITLE';

	
	const COMMENT = 'resource_version.COMMENT';

	
	const CREATED_BY = 'resource_version.CREATED_BY';

	
	const CREATED_AT = 'resource_version.CREATED_AT';

	
	const RESOURCE_VERSION_ID = 'resource_version.RESOURCE_VERSION_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ResourceId', 'ResourceName', 'Number', 'Title', 'Comment', 'CreatedBy', 'CreatedAt', 'ResourceVersionId', ),
		BasePeer::TYPE_COLNAME => array (ResourceVersionPeer::ID, ResourceVersionPeer::RESOURCE_ID, ResourceVersionPeer::RESOURCE_NAME, ResourceVersionPeer::NUMBER, ResourceVersionPeer::TITLE, ResourceVersionPeer::COMMENT, ResourceVersionPeer::CREATED_BY, ResourceVersionPeer::CREATED_AT, ResourceVersionPeer::RESOURCE_VERSION_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'resource_id', 'resource_name', 'number', 'title', 'comment', 'created_by', 'created_at', 'resource_version_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ResourceId' => 1, 'ResourceName' => 2, 'Number' => 3, 'Title' => 4, 'Comment' => 5, 'CreatedBy' => 6, 'CreatedAt' => 7, 'ResourceVersionId' => 8, ),
		BasePeer::TYPE_COLNAME => array (ResourceVersionPeer::ID => 0, ResourceVersionPeer::RESOURCE_ID => 1, ResourceVersionPeer::RESOURCE_NAME => 2, ResourceVersionPeer::NUMBER => 3, ResourceVersionPeer::TITLE => 4, ResourceVersionPeer::COMMENT => 5, ResourceVersionPeer::CREATED_BY => 6, ResourceVersionPeer::CREATED_AT => 7, ResourceVersionPeer::RESOURCE_VERSION_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'resource_id' => 1, 'resource_name' => 2, 'number' => 3, 'title' => 4, 'comment' => 5, 'created_by' => 6, 'created_at' => 7, 'resource_version_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('plugins.sfPropelVersionableBehaviorPlugin.lib.model.map.ResourceVersionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ResourceVersionPeer::getTableMap();
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
		return str_replace(ResourceVersionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ResourceVersionPeer::ID);

		$criteria->addSelectColumn(ResourceVersionPeer::RESOURCE_ID);

		$criteria->addSelectColumn(ResourceVersionPeer::RESOURCE_NAME);

		$criteria->addSelectColumn(ResourceVersionPeer::NUMBER);

		$criteria->addSelectColumn(ResourceVersionPeer::TITLE);

		$criteria->addSelectColumn(ResourceVersionPeer::COMMENT);

		$criteria->addSelectColumn(ResourceVersionPeer::CREATED_BY);

		$criteria->addSelectColumn(ResourceVersionPeer::CREATED_AT);

		$criteria->addSelectColumn(ResourceVersionPeer::RESOURCE_VERSION_ID);

	}

	const COUNT = 'COUNT(resource_version.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT resource_version.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResourceVersionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResourceVersionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ResourceVersionPeer::doSelectRS($criteria, $con);
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
		$objects = ResourceVersionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ResourceVersionPeer::populateObjects(ResourceVersionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseResourceVersionPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseResourceVersionPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ResourceVersionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ResourceVersionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResourceVersionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResourceVersionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ResourceVersionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseResourceVersionPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseResourceVersionPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResourceVersionPeer::addSelectColumns($c);
		$startcol2 = (ResourceVersionPeer::NUM_COLUMNS - ResourceVersionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResourceVersionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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
		return ResourceVersionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseResourceVersionPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseResourceVersionPeer', $values, $con);
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

		$criteria->remove(ResourceVersionPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseResourceVersionPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseResourceVersionPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseResourceVersionPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseResourceVersionPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ResourceVersionPeer::ID);
			$selectCriteria->add(ResourceVersionPeer::ID, $criteria->remove(ResourceVersionPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseResourceVersionPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseResourceVersionPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ResourceVersionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ResourceVersionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ResourceVersion) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ResourceVersionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ResourceVersion $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ResourceVersionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ResourceVersionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ResourceVersionPeer::DATABASE_NAME, ResourceVersionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ResourceVersionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ResourceVersionPeer::DATABASE_NAME);

		$criteria->add(ResourceVersionPeer::ID, $pk);


		$v = ResourceVersionPeer::doSelect($criteria, $con);

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
			$criteria->add(ResourceVersionPeer::ID, $pks, Criteria::IN);
			$objs = ResourceVersionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseResourceVersionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('plugins.sfPropelVersionableBehaviorPlugin.lib.model.map.ResourceVersionMapBuilder');
}
