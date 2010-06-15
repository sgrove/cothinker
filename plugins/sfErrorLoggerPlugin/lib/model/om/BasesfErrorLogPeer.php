<?php


abstract class BasesfErrorLogPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_error_log';

	
	const CLASS_DEFAULT = 'plugins.sfErrorLoggerPlugin.lib.model.sfErrorLog';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TYPE = 'sf_error_log.TYPE';

	
	const CLASS_NAME = 'sf_error_log.CLASS_NAME';

	
	const MESSAGE = 'sf_error_log.MESSAGE';

	
	const MODULE_NAME = 'sf_error_log.MODULE_NAME';

	
	const ACTION_NAME = 'sf_error_log.ACTION_NAME';

	
	const EXCEPTION_OBJECT = 'sf_error_log.EXCEPTION_OBJECT';

	
	const REQUEST = 'sf_error_log.REQUEST';

	
	const URI = 'sf_error_log.URI';

	
	const CREATED_AT = 'sf_error_log.CREATED_AT';

	
	const ID = 'sf_error_log.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Type', 'ClassName', 'Message', 'ModuleName', 'ActionName', 'ExceptionObject', 'Request', 'Uri', 'CreatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (sfErrorLogPeer::TYPE, sfErrorLogPeer::CLASS_NAME, sfErrorLogPeer::MESSAGE, sfErrorLogPeer::MODULE_NAME, sfErrorLogPeer::ACTION_NAME, sfErrorLogPeer::EXCEPTION_OBJECT, sfErrorLogPeer::REQUEST, sfErrorLogPeer::URI, sfErrorLogPeer::CREATED_AT, sfErrorLogPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('type', 'class_name', 'message', 'module_name', 'action_name', 'exception_object', 'request', 'uri', 'created_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Type' => 0, 'ClassName' => 1, 'Message' => 2, 'ModuleName' => 3, 'ActionName' => 4, 'ExceptionObject' => 5, 'Request' => 6, 'Uri' => 7, 'CreatedAt' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (sfErrorLogPeer::TYPE => 0, sfErrorLogPeer::CLASS_NAME => 1, sfErrorLogPeer::MESSAGE => 2, sfErrorLogPeer::MODULE_NAME => 3, sfErrorLogPeer::ACTION_NAME => 4, sfErrorLogPeer::EXCEPTION_OBJECT => 5, sfErrorLogPeer::REQUEST => 6, sfErrorLogPeer::URI => 7, sfErrorLogPeer::CREATED_AT => 8, sfErrorLogPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('type' => 0, 'class_name' => 1, 'message' => 2, 'module_name' => 3, 'action_name' => 4, 'exception_object' => 5, 'request' => 6, 'uri' => 7, 'created_at' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('plugins.sfErrorLoggerPlugin.lib.model.map.sfErrorLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfErrorLogPeer::getTableMap();
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
		return str_replace(sfErrorLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfErrorLogPeer::TYPE);

		$criteria->addSelectColumn(sfErrorLogPeer::CLASS_NAME);

		$criteria->addSelectColumn(sfErrorLogPeer::MESSAGE);

		$criteria->addSelectColumn(sfErrorLogPeer::MODULE_NAME);

		$criteria->addSelectColumn(sfErrorLogPeer::ACTION_NAME);

		$criteria->addSelectColumn(sfErrorLogPeer::EXCEPTION_OBJECT);

		$criteria->addSelectColumn(sfErrorLogPeer::REQUEST);

		$criteria->addSelectColumn(sfErrorLogPeer::URI);

		$criteria->addSelectColumn(sfErrorLogPeer::CREATED_AT);

		$criteria->addSelectColumn(sfErrorLogPeer::ID);

	}

	const COUNT = 'COUNT(sf_error_log.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_error_log.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfErrorLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfErrorLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfErrorLogPeer::doSelectRS($criteria, $con);
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
		$objects = sfErrorLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfErrorLogPeer::populateObjects(sfErrorLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfErrorLogPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfErrorLogPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfErrorLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfErrorLogPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return sfErrorLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfErrorLogPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfErrorLogPeer', $values, $con);
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

		$criteria->remove(sfErrorLogPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfErrorLogPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfErrorLogPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfErrorLogPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfErrorLogPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfErrorLogPeer::ID);
			$selectCriteria->add(sfErrorLogPeer::ID, $criteria->remove(sfErrorLogPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfErrorLogPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfErrorLogPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfErrorLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfErrorLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfErrorLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfErrorLogPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfErrorLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfErrorLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfErrorLogPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfErrorLogPeer::DATABASE_NAME, sfErrorLogPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfErrorLogPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfErrorLogPeer::DATABASE_NAME);

		$criteria->add(sfErrorLogPeer::ID, $pk);


		$v = sfErrorLogPeer::doSelect($criteria, $con);

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
			$criteria->add(sfErrorLogPeer::ID, $pks, Criteria::IN);
			$objs = sfErrorLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfErrorLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('plugins.sfErrorLoggerPlugin.lib.model.map.sfErrorLogMapBuilder');
}
