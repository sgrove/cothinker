<?php


abstract class BasesfAssetFolderPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_asset_folder';

	
	const CLASS_DEFAULT = 'plugins.sfAssetsLibraryPlugin.lib.model.sfAssetFolder';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_asset_folder.ID';

	
	const TREE_LEFT = 'sf_asset_folder.TREE_LEFT';

	
	const TREE_RIGHT = 'sf_asset_folder.TREE_RIGHT';

	
	const TREE_PARENT = 'sf_asset_folder.TREE_PARENT';

	
	const STATIC_SCOPE = 'sf_asset_folder.STATIC_SCOPE';

	
	const NAME = 'sf_asset_folder.NAME';

	
	const RELATIVE_PATH = 'sf_asset_folder.RELATIVE_PATH';

	
	const CREATED_AT = 'sf_asset_folder.CREATED_AT';

	
	const UPDATED_AT = 'sf_asset_folder.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TreeLeft', 'TreeRight', 'TreeParent', 'StaticScope', 'Name', 'RelativePath', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfAssetFolderPeer::ID, sfAssetFolderPeer::TREE_LEFT, sfAssetFolderPeer::TREE_RIGHT, sfAssetFolderPeer::TREE_PARENT, sfAssetFolderPeer::STATIC_SCOPE, sfAssetFolderPeer::NAME, sfAssetFolderPeer::RELATIVE_PATH, sfAssetFolderPeer::CREATED_AT, sfAssetFolderPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'tree_left', 'tree_right', 'tree_parent', 'static_scope', 'name', 'relative_path', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TreeLeft' => 1, 'TreeRight' => 2, 'TreeParent' => 3, 'StaticScope' => 4, 'Name' => 5, 'RelativePath' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
		BasePeer::TYPE_COLNAME => array (sfAssetFolderPeer::ID => 0, sfAssetFolderPeer::TREE_LEFT => 1, sfAssetFolderPeer::TREE_RIGHT => 2, sfAssetFolderPeer::TREE_PARENT => 3, sfAssetFolderPeer::STATIC_SCOPE => 4, sfAssetFolderPeer::NAME => 5, sfAssetFolderPeer::RELATIVE_PATH => 6, sfAssetFolderPeer::CREATED_AT => 7, sfAssetFolderPeer::UPDATED_AT => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'tree_left' => 1, 'tree_right' => 2, 'tree_parent' => 3, 'static_scope' => 4, 'name' => 5, 'relative_path' => 6, 'created_at' => 7, 'updated_at' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('plugins.sfAssetsLibraryPlugin.lib.model.map.sfAssetFolderMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfAssetFolderPeer::getTableMap();
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
		return str_replace(sfAssetFolderPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfAssetFolderPeer::ID);

		$criteria->addSelectColumn(sfAssetFolderPeer::TREE_LEFT);

		$criteria->addSelectColumn(sfAssetFolderPeer::TREE_RIGHT);

		$criteria->addSelectColumn(sfAssetFolderPeer::TREE_PARENT);

		$criteria->addSelectColumn(sfAssetFolderPeer::STATIC_SCOPE);

		$criteria->addSelectColumn(sfAssetFolderPeer::NAME);

		$criteria->addSelectColumn(sfAssetFolderPeer::RELATIVE_PATH);

		$criteria->addSelectColumn(sfAssetFolderPeer::CREATED_AT);

		$criteria->addSelectColumn(sfAssetFolderPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(sf_asset_folder.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_asset_folder.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfAssetFolderPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfAssetFolderPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfAssetFolderPeer::doSelectRS($criteria, $con);
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
		$objects = sfAssetFolderPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfAssetFolderPeer::populateObjects(sfAssetFolderPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetFolderPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfAssetFolderPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfAssetFolderPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfAssetFolderPeer::getOMClass();
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
		return sfAssetFolderPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetFolderPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfAssetFolderPeer', $values, $con);
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

		$criteria->remove(sfAssetFolderPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfAssetFolderPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfAssetFolderPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetFolderPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfAssetFolderPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfAssetFolderPeer::ID);
			$selectCriteria->add(sfAssetFolderPeer::ID, $criteria->remove(sfAssetFolderPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfAssetFolderPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfAssetFolderPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfAssetFolderPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfAssetFolderPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfAssetFolder) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfAssetFolderPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfAssetFolder $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfAssetFolderPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfAssetFolderPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfAssetFolderPeer::DATABASE_NAME, sfAssetFolderPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfAssetFolderPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfAssetFolderPeer::DATABASE_NAME);

		$criteria->add(sfAssetFolderPeer::ID, $pk);


		$v = sfAssetFolderPeer::doSelect($criteria, $con);

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
			$criteria->add(sfAssetFolderPeer::ID, $pks, Criteria::IN);
			$objs = sfAssetFolderPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfAssetFolderPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('plugins.sfAssetsLibraryPlugin.lib.model.map.sfAssetFolderMapBuilder');
}
