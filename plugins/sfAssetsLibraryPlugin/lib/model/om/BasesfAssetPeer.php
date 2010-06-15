<?php


abstract class BasesfAssetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_asset';

	
	const CLASS_DEFAULT = 'plugins.sfAssetsLibraryPlugin.lib.model.sfAsset';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_asset.ID';

	
	const FOLDER_ID = 'sf_asset.FOLDER_ID';

	
	const FILENAME = 'sf_asset.FILENAME';

	
	const DESCRIPTION = 'sf_asset.DESCRIPTION';

	
	const AUTHOR = 'sf_asset.AUTHOR';

	
	const COPYRIGHT = 'sf_asset.COPYRIGHT';

	
	const TYPE = 'sf_asset.TYPE';

	
	const FILESIZE = 'sf_asset.FILESIZE';

	
	const CREATED_AT = 'sf_asset.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FolderId', 'Filename', 'Description', 'Author', 'Copyright', 'Type', 'Filesize', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfAssetPeer::ID, sfAssetPeer::FOLDER_ID, sfAssetPeer::FILENAME, sfAssetPeer::DESCRIPTION, sfAssetPeer::AUTHOR, sfAssetPeer::COPYRIGHT, sfAssetPeer::TYPE, sfAssetPeer::FILESIZE, sfAssetPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'folder_id', 'filename', 'description', 'author', 'copyright', 'type', 'filesize', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FolderId' => 1, 'Filename' => 2, 'Description' => 3, 'Author' => 4, 'Copyright' => 5, 'Type' => 6, 'Filesize' => 7, 'CreatedAt' => 8, ),
		BasePeer::TYPE_COLNAME => array (sfAssetPeer::ID => 0, sfAssetPeer::FOLDER_ID => 1, sfAssetPeer::FILENAME => 2, sfAssetPeer::DESCRIPTION => 3, sfAssetPeer::AUTHOR => 4, sfAssetPeer::COPYRIGHT => 5, sfAssetPeer::TYPE => 6, sfAssetPeer::FILESIZE => 7, sfAssetPeer::CREATED_AT => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'folder_id' => 1, 'filename' => 2, 'description' => 3, 'author' => 4, 'copyright' => 5, 'type' => 6, 'filesize' => 7, 'created_at' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('plugins.sfAssetsLibraryPlugin.lib.model.map.sfAssetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfAssetPeer::getTableMap();
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
		return str_replace(sfAssetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfAssetPeer::ID);

		$criteria->addSelectColumn(sfAssetPeer::FOLDER_ID);

		$criteria->addSelectColumn(sfAssetPeer::FILENAME);

		$criteria->addSelectColumn(sfAssetPeer::DESCRIPTION);

		$criteria->addSelectColumn(sfAssetPeer::AUTHOR);

		$criteria->addSelectColumn(sfAssetPeer::COPYRIGHT);

		$criteria->addSelectColumn(sfAssetPeer::TYPE);

		$criteria->addSelectColumn(sfAssetPeer::FILESIZE);

		$criteria->addSelectColumn(sfAssetPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(sf_asset.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_asset.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfAssetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfAssetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfAssetPeer::doSelectRS($criteria, $con);
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
		$objects = sfAssetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfAssetPeer::populateObjects(sfAssetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfAssetPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfAssetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfAssetPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfAssetFolder(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfAssetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfAssetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfAssetPeer::FOLDER_ID, sfAssetFolderPeer::ID);

		$rs = sfAssetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfAssetFolder(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasesfAssetPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfAssetPeer::addSelectColumns($c);
		$startcol = (sfAssetPeer::NUM_COLUMNS - sfAssetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfAssetFolderPeer::addSelectColumns($c);

		$c->addJoin(sfAssetPeer::FOLDER_ID, sfAssetFolderPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfAssetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfAssetFolderPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfAssetFolder(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfAsset($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfAssets();
				$obj2->addsfAsset($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfAssetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfAssetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfAssetPeer::FOLDER_ID, sfAssetFolderPeer::ID);

		$rs = sfAssetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasesfAssetPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfAssetPeer::addSelectColumns($c);
		$startcol2 = (sfAssetPeer::NUM_COLUMNS - sfAssetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfAssetFolderPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfAssetFolderPeer::NUM_COLUMNS;

		$c->addJoin(sfAssetPeer::FOLDER_ID, sfAssetFolderPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfAssetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfAssetFolderPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfAssetFolder(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfAsset($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfAssets();
				$obj2->addsfAsset($obj1);
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
		return sfAssetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfAssetPeer', $values, $con);
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

		$criteria->remove(sfAssetPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfAssetPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfAssetPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfAssetPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfAssetPeer::ID);
			$selectCriteria->add(sfAssetPeer::ID, $criteria->remove(sfAssetPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfAssetPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfAssetPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfAssetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfAssetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfAsset) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfAssetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfAsset $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfAssetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfAssetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfAssetPeer::DATABASE_NAME, sfAssetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfAssetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfAssetPeer::DATABASE_NAME);

		$criteria->add(sfAssetPeer::ID, $pk);


		$v = sfAssetPeer::doSelect($criteria, $con);

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
			$criteria->add(sfAssetPeer::ID, $pks, Criteria::IN);
			$objs = sfAssetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfAssetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('plugins.sfAssetsLibraryPlugin.lib.model.map.sfAssetMapBuilder');
}
