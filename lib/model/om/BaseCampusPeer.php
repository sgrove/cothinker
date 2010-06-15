<?php


abstract class BaseCampusPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_campus';

	
	const CLASS_DEFAULT = 'lib.model.Campus';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_campus.ID';

	
	const UUID = 'ct_campus.UUID';

	
	const NAME = 'ct_campus.NAME';

	
	const SLUG = 'ct_campus.SLUG';

	
	const ADDRESS = 'ct_campus.ADDRESS';

	
	const CITY = 'ct_campus.CITY';

	
	const STATE = 'ct_campus.STATE';

	
	const ZIP = 'ct_campus.ZIP';

	
	const URL = 'ct_campus.URL';

	
	const PHONE = 'ct_campus.PHONE';

	
	const EMAIL = 'ct_campus.EMAIL';

	
	const ABOUT = 'ct_campus.ABOUT';

	
	const VERSION = 'ct_campus.VERSION';

	
	const DELETED_AT = 'ct_campus.DELETED_AT';

	
	const CREATED_AT = 'ct_campus.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'Name', 'Slug', 'Address', 'City', 'State', 'Zip', 'Url', 'Phone', 'Email', 'About', 'Version', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (CampusPeer::ID, CampusPeer::UUID, CampusPeer::NAME, CampusPeer::SLUG, CampusPeer::ADDRESS, CampusPeer::CITY, CampusPeer::STATE, CampusPeer::ZIP, CampusPeer::URL, CampusPeer::PHONE, CampusPeer::EMAIL, CampusPeer::ABOUT, CampusPeer::VERSION, CampusPeer::DELETED_AT, CampusPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'name', 'slug', 'address', 'city', 'state', 'zip', 'url', 'phone', 'email', 'about', 'version', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'Name' => 2, 'Slug' => 3, 'Address' => 4, 'City' => 5, 'State' => 6, 'Zip' => 7, 'Url' => 8, 'Phone' => 9, 'Email' => 10, 'About' => 11, 'Version' => 12, 'DeletedAt' => 13, 'CreatedAt' => 14, ),
		BasePeer::TYPE_COLNAME => array (CampusPeer::ID => 0, CampusPeer::UUID => 1, CampusPeer::NAME => 2, CampusPeer::SLUG => 3, CampusPeer::ADDRESS => 4, CampusPeer::CITY => 5, CampusPeer::STATE => 6, CampusPeer::ZIP => 7, CampusPeer::URL => 8, CampusPeer::PHONE => 9, CampusPeer::EMAIL => 10, CampusPeer::ABOUT => 11, CampusPeer::VERSION => 12, CampusPeer::DELETED_AT => 13, CampusPeer::CREATED_AT => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'name' => 2, 'slug' => 3, 'address' => 4, 'city' => 5, 'state' => 6, 'zip' => 7, 'url' => 8, 'phone' => 9, 'email' => 10, 'about' => 11, 'version' => 12, 'deleted_at' => 13, 'created_at' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.CampusMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CampusPeer::getTableMap();
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
		return str_replace(CampusPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CampusPeer::ID);

		$criteria->addSelectColumn(CampusPeer::UUID);

		$criteria->addSelectColumn(CampusPeer::NAME);

		$criteria->addSelectColumn(CampusPeer::SLUG);

		$criteria->addSelectColumn(CampusPeer::ADDRESS);

		$criteria->addSelectColumn(CampusPeer::CITY);

		$criteria->addSelectColumn(CampusPeer::STATE);

		$criteria->addSelectColumn(CampusPeer::ZIP);

		$criteria->addSelectColumn(CampusPeer::URL);

		$criteria->addSelectColumn(CampusPeer::PHONE);

		$criteria->addSelectColumn(CampusPeer::EMAIL);

		$criteria->addSelectColumn(CampusPeer::ABOUT);

		$criteria->addSelectColumn(CampusPeer::VERSION);

		$criteria->addSelectColumn(CampusPeer::DELETED_AT);

		$criteria->addSelectColumn(CampusPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_campus.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_campus.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CampusPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CampusPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CampusPeer::doSelectRS($criteria, $con);
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
		$objects = CampusPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CampusPeer::populateObjects(CampusPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCampusPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseCampusPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CampusPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CampusPeer::getOMClass();
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
		return CampusPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCampusPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCampusPeer', $values, $con);
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

		$criteria->remove(CampusPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseCampusPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseCampusPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCampusPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCampusPeer', $values, $con);
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
			$comparison = $criteria->getComparison(CampusPeer::ID);
			$selectCriteria->add(CampusPeer::ID, $criteria->remove(CampusPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseCampusPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseCampusPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(CampusPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CampusPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Campus) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CampusPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Campus $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CampusPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CampusPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CampusPeer::DATABASE_NAME, CampusPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CampusPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CampusPeer::DATABASE_NAME);

		$criteria->add(CampusPeer::ID, $pk);


		$v = CampusPeer::doSelect($criteria, $con);

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
			$criteria->add(CampusPeer::ID, $pks, Criteria::IN);
			$objs = CampusPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCampusPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.CampusMapBuilder');
}
