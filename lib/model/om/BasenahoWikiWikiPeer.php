<?php


abstract class BasenahoWikiWikiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'naho_wiki_wiki';

	
	const CLASS_DEFAULT = 'lib.model.nahoWikiWiki';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'naho_wiki_wiki.ID';

	
	const UUID = 'naho_wiki_wiki.UUID';

	
	const TITLE = 'naho_wiki_wiki.TITLE';

	
	const SLUG = 'naho_wiki_wiki.SLUG';

	
	const MODEL = 'naho_wiki_wiki.MODEL';

	
	const MODEL_ID = 'naho_wiki_wiki.MODEL_ID';

	
	const STANDALONE = 'naho_wiki_wiki.STANDALONE';

	
	const CREATED_AT = 'naho_wiki_wiki.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'Title', 'Slug', 'Model', 'ModelId', 'Standalone', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (nahoWikiWikiPeer::ID, nahoWikiWikiPeer::UUID, nahoWikiWikiPeer::TITLE, nahoWikiWikiPeer::SLUG, nahoWikiWikiPeer::MODEL, nahoWikiWikiPeer::MODEL_ID, nahoWikiWikiPeer::STANDALONE, nahoWikiWikiPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'title', 'slug', 'model', 'model_id', 'standalone', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'Title' => 2, 'Slug' => 3, 'Model' => 4, 'ModelId' => 5, 'Standalone' => 6, 'CreatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (nahoWikiWikiPeer::ID => 0, nahoWikiWikiPeer::UUID => 1, nahoWikiWikiPeer::TITLE => 2, nahoWikiWikiPeer::SLUG => 3, nahoWikiWikiPeer::MODEL => 4, nahoWikiWikiPeer::MODEL_ID => 5, nahoWikiWikiPeer::STANDALONE => 6, nahoWikiWikiPeer::CREATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'title' => 2, 'slug' => 3, 'model' => 4, 'model_id' => 5, 'standalone' => 6, 'created_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.nahoWikiWikiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = nahoWikiWikiPeer::getTableMap();
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
		return str_replace(nahoWikiWikiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(nahoWikiWikiPeer::ID);

		$criteria->addSelectColumn(nahoWikiWikiPeer::UUID);

		$criteria->addSelectColumn(nahoWikiWikiPeer::TITLE);

		$criteria->addSelectColumn(nahoWikiWikiPeer::SLUG);

		$criteria->addSelectColumn(nahoWikiWikiPeer::MODEL);

		$criteria->addSelectColumn(nahoWikiWikiPeer::MODEL_ID);

		$criteria->addSelectColumn(nahoWikiWikiPeer::STANDALONE);

		$criteria->addSelectColumn(nahoWikiWikiPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(naho_wiki_wiki.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT naho_wiki_wiki.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(nahoWikiWikiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(nahoWikiWikiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = nahoWikiWikiPeer::doSelectRS($criteria, $con);
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
		$objects = nahoWikiWikiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return nahoWikiWikiPeer::populateObjects(nahoWikiWikiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasenahoWikiWikiPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasenahoWikiWikiPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			nahoWikiWikiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = nahoWikiWikiPeer::getOMClass();
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
		return nahoWikiWikiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasenahoWikiWikiPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasenahoWikiWikiPeer', $values, $con);
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

		$criteria->remove(nahoWikiWikiPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasenahoWikiWikiPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasenahoWikiWikiPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasenahoWikiWikiPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasenahoWikiWikiPeer', $values, $con);
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
			$comparison = $criteria->getComparison(nahoWikiWikiPeer::ID);
			$selectCriteria->add(nahoWikiWikiPeer::ID, $criteria->remove(nahoWikiWikiPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasenahoWikiWikiPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasenahoWikiWikiPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(nahoWikiWikiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(nahoWikiWikiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof nahoWikiWiki) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(nahoWikiWikiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(nahoWikiWiki $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(nahoWikiWikiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(nahoWikiWikiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(nahoWikiWikiPeer::DATABASE_NAME, nahoWikiWikiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = nahoWikiWikiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(nahoWikiWikiPeer::DATABASE_NAME);

		$criteria->add(nahoWikiWikiPeer::ID, $pk);


		$v = nahoWikiWikiPeer::doSelect($criteria, $con);

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
			$criteria->add(nahoWikiWikiPeer::ID, $pks, Criteria::IN);
			$objs = nahoWikiWikiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasenahoWikiWikiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.nahoWikiWikiMapBuilder');
}
