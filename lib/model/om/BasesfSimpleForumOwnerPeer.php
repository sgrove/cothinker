<?php


abstract class BasesfSimpleForumOwnerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_simple_forum_owner_object';

	
	const CLASS_DEFAULT = 'lib.model.sfSimpleForumOwner';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_simple_forum_owner_object.ID';

	
	const UUID = 'sf_simple_forum_owner_object.UUID';

	
	const TITLE = 'sf_simple_forum_owner_object.TITLE';

	
	const SLUG = 'sf_simple_forum_owner_object.SLUG';

	
	const MODEL = 'sf_simple_forum_owner_object.MODEL';

	
	const MODEL_ID = 'sf_simple_forum_owner_object.MODEL_ID';

	
	const STANDALONE = 'sf_simple_forum_owner_object.STANDALONE';

	
	const CREATED_AT = 'sf_simple_forum_owner_object.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'Title', 'Slug', 'Model', 'ModelId', 'Standalone', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfSimpleForumOwnerPeer::ID, sfSimpleForumOwnerPeer::UUID, sfSimpleForumOwnerPeer::TITLE, sfSimpleForumOwnerPeer::SLUG, sfSimpleForumOwnerPeer::MODEL, sfSimpleForumOwnerPeer::MODEL_ID, sfSimpleForumOwnerPeer::STANDALONE, sfSimpleForumOwnerPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'title', 'slug', 'model', 'model_id', 'standalone', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'Title' => 2, 'Slug' => 3, 'Model' => 4, 'ModelId' => 5, 'Standalone' => 6, 'CreatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (sfSimpleForumOwnerPeer::ID => 0, sfSimpleForumOwnerPeer::UUID => 1, sfSimpleForumOwnerPeer::TITLE => 2, sfSimpleForumOwnerPeer::SLUG => 3, sfSimpleForumOwnerPeer::MODEL => 4, sfSimpleForumOwnerPeer::MODEL_ID => 5, sfSimpleForumOwnerPeer::STANDALONE => 6, sfSimpleForumOwnerPeer::CREATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'title' => 2, 'slug' => 3, 'model' => 4, 'model_id' => 5, 'standalone' => 6, 'created_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.sfSimpleForumOwnerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfSimpleForumOwnerPeer::getTableMap();
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
		return str_replace(sfSimpleForumOwnerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfSimpleForumOwnerPeer::ID);

		$criteria->addSelectColumn(sfSimpleForumOwnerPeer::UUID);

		$criteria->addSelectColumn(sfSimpleForumOwnerPeer::TITLE);

		$criteria->addSelectColumn(sfSimpleForumOwnerPeer::SLUG);

		$criteria->addSelectColumn(sfSimpleForumOwnerPeer::MODEL);

		$criteria->addSelectColumn(sfSimpleForumOwnerPeer::MODEL_ID);

		$criteria->addSelectColumn(sfSimpleForumOwnerPeer::STANDALONE);

		$criteria->addSelectColumn(sfSimpleForumOwnerPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(sf_simple_forum_owner_object.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_simple_forum_owner_object.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleForumOwnerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleForumOwnerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfSimpleForumOwnerPeer::doSelectRS($criteria, $con);
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
		$objects = sfSimpleForumOwnerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfSimpleForumOwnerPeer::populateObjects(sfSimpleForumOwnerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumOwnerPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleForumOwnerPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfSimpleForumOwnerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfSimpleForumOwnerPeer::getOMClass();
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
		return sfSimpleForumOwnerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumOwnerPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfSimpleForumOwnerPeer', $values, $con);
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

		$criteria->remove(sfSimpleForumOwnerPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfSimpleForumOwnerPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleForumOwnerPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumOwnerPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfSimpleForumOwnerPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfSimpleForumOwnerPeer::ID);
			$selectCriteria->add(sfSimpleForumOwnerPeer::ID, $criteria->remove(sfSimpleForumOwnerPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfSimpleForumOwnerPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleForumOwnerPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfSimpleForumOwnerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfSimpleForumOwnerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfSimpleForumOwner) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfSimpleForumOwnerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfSimpleForumOwner $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfSimpleForumOwnerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfSimpleForumOwnerPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfSimpleForumOwnerPeer::DATABASE_NAME, sfSimpleForumOwnerPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfSimpleForumOwnerPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfSimpleForumOwnerPeer::DATABASE_NAME);

		$criteria->add(sfSimpleForumOwnerPeer::ID, $pk);


		$v = sfSimpleForumOwnerPeer::doSelect($criteria, $con);

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
			$criteria->add(sfSimpleForumOwnerPeer::ID, $pks, Criteria::IN);
			$objs = sfSimpleForumOwnerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfSimpleForumOwnerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.sfSimpleForumOwnerMapBuilder');
}
