<?php


abstract class BaseDidYouKnowPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_did_you_know';

	
	const CLASS_DEFAULT = 'lib.model.DidYouKnow';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_did_you_know.ID';

	
	const UUID = 'ct_did_you_know.UUID';

	
	const TITLE = 'ct_did_you_know.TITLE';

	
	const TEXT = 'ct_did_you_know.TEXT';

	
	const SLUG = 'ct_did_you_know.SLUG';

	
	const VERSION = 'ct_did_you_know.VERSION';

	
	const DELETED_AT = 'ct_did_you_know.DELETED_AT';

	
	const CREATED_AT = 'ct_did_you_know.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'Title', 'Text', 'Slug', 'Version', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (DidYouKnowPeer::ID, DidYouKnowPeer::UUID, DidYouKnowPeer::TITLE, DidYouKnowPeer::TEXT, DidYouKnowPeer::SLUG, DidYouKnowPeer::VERSION, DidYouKnowPeer::DELETED_AT, DidYouKnowPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'title', 'text', 'slug', 'version', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'Title' => 2, 'Text' => 3, 'Slug' => 4, 'Version' => 5, 'DeletedAt' => 6, 'CreatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (DidYouKnowPeer::ID => 0, DidYouKnowPeer::UUID => 1, DidYouKnowPeer::TITLE => 2, DidYouKnowPeer::TEXT => 3, DidYouKnowPeer::SLUG => 4, DidYouKnowPeer::VERSION => 5, DidYouKnowPeer::DELETED_AT => 6, DidYouKnowPeer::CREATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'title' => 2, 'text' => 3, 'slug' => 4, 'version' => 5, 'deleted_at' => 6, 'created_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.DidYouKnowMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DidYouKnowPeer::getTableMap();
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
		return str_replace(DidYouKnowPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DidYouKnowPeer::ID);

		$criteria->addSelectColumn(DidYouKnowPeer::UUID);

		$criteria->addSelectColumn(DidYouKnowPeer::TITLE);

		$criteria->addSelectColumn(DidYouKnowPeer::TEXT);

		$criteria->addSelectColumn(DidYouKnowPeer::SLUG);

		$criteria->addSelectColumn(DidYouKnowPeer::VERSION);

		$criteria->addSelectColumn(DidYouKnowPeer::DELETED_AT);

		$criteria->addSelectColumn(DidYouKnowPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_did_you_know.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_did_you_know.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DidYouKnowPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DidYouKnowPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DidYouKnowPeer::doSelectRS($criteria, $con);
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
		$objects = DidYouKnowPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DidYouKnowPeer::populateObjects(DidYouKnowPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseDidYouKnowPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseDidYouKnowPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DidYouKnowPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DidYouKnowPeer::getOMClass();
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
		return DidYouKnowPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseDidYouKnowPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDidYouKnowPeer', $values, $con);
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

		$criteria->remove(DidYouKnowPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseDidYouKnowPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseDidYouKnowPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseDidYouKnowPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseDidYouKnowPeer', $values, $con);
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
			$comparison = $criteria->getComparison(DidYouKnowPeer::ID);
			$selectCriteria->add(DidYouKnowPeer::ID, $criteria->remove(DidYouKnowPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseDidYouKnowPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseDidYouKnowPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(DidYouKnowPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DidYouKnowPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof DidYouKnow) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DidYouKnowPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(DidYouKnow $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DidYouKnowPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DidYouKnowPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DidYouKnowPeer::DATABASE_NAME, DidYouKnowPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DidYouKnowPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DidYouKnowPeer::DATABASE_NAME);

		$criteria->add(DidYouKnowPeer::ID, $pk);


		$v = DidYouKnowPeer::doSelect($criteria, $con);

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
			$criteria->add(DidYouKnowPeer::ID, $pks, Criteria::IN);
			$objs = DidYouKnowPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDidYouKnowPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.DidYouKnowMapBuilder');
}
