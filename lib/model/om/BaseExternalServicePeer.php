<?php


abstract class BaseExternalServicePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_external_service';

	
	const CLASS_DEFAULT = 'lib.model.ExternalService';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_external_service.ID';

	
	const USER_ID = 'ct_external_service.USER_ID';

	
	const UUID = 'ct_external_service.UUID';

	
	const TWITTER_USERNAME = 'ct_external_service.TWITTER_USERNAME';

	
	const TWITTER_PASSWORD = 'ct_external_service.TWITTER_PASSWORD';

	
	const TWITTER_UPDATE = 'ct_external_service.TWITTER_UPDATE';

	
	const TWITTER_STATUS_UPDATE = 'ct_external_service.TWITTER_STATUS_UPDATE';

	
	const TWITTER_CONFIRMED = 'ct_external_service.TWITTER_CONFIRMED';

	
	const FACEBOOK_ACCOUNT = 'ct_external_service.FACEBOOK_ACCOUNT';

	
	const FACEBOOK_UPDATE = 'ct_external_service.FACEBOOK_UPDATE';

	
	const FACEBOOK_CONFIRMED = 'ct_external_service.FACEBOOK_CONFIRMED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'UserId', 'Uuid', 'TwitterUsername', 'TwitterPassword', 'TwitterUpdate', 'TwitterStatusUpdate', 'TwitterConfirmed', 'FacebookAccount', 'FacebookUpdate', 'FacebookConfirmed', ),
		BasePeer::TYPE_COLNAME => array (ExternalServicePeer::ID, ExternalServicePeer::USER_ID, ExternalServicePeer::UUID, ExternalServicePeer::TWITTER_USERNAME, ExternalServicePeer::TWITTER_PASSWORD, ExternalServicePeer::TWITTER_UPDATE, ExternalServicePeer::TWITTER_STATUS_UPDATE, ExternalServicePeer::TWITTER_CONFIRMED, ExternalServicePeer::FACEBOOK_ACCOUNT, ExternalServicePeer::FACEBOOK_UPDATE, ExternalServicePeer::FACEBOOK_CONFIRMED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'user_id', 'uuid', 'twitter_username', 'twitter_password', 'twitter_update', 'twitter_status_update', 'twitter_confirmed', 'facebook_account', 'facebook_update', 'facebook_confirmed', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'UserId' => 1, 'Uuid' => 2, 'TwitterUsername' => 3, 'TwitterPassword' => 4, 'TwitterUpdate' => 5, 'TwitterStatusUpdate' => 6, 'TwitterConfirmed' => 7, 'FacebookAccount' => 8, 'FacebookUpdate' => 9, 'FacebookConfirmed' => 10, ),
		BasePeer::TYPE_COLNAME => array (ExternalServicePeer::ID => 0, ExternalServicePeer::USER_ID => 1, ExternalServicePeer::UUID => 2, ExternalServicePeer::TWITTER_USERNAME => 3, ExternalServicePeer::TWITTER_PASSWORD => 4, ExternalServicePeer::TWITTER_UPDATE => 5, ExternalServicePeer::TWITTER_STATUS_UPDATE => 6, ExternalServicePeer::TWITTER_CONFIRMED => 7, ExternalServicePeer::FACEBOOK_ACCOUNT => 8, ExternalServicePeer::FACEBOOK_UPDATE => 9, ExternalServicePeer::FACEBOOK_CONFIRMED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'user_id' => 1, 'uuid' => 2, 'twitter_username' => 3, 'twitter_password' => 4, 'twitter_update' => 5, 'twitter_status_update' => 6, 'twitter_confirmed' => 7, 'facebook_account' => 8, 'facebook_update' => 9, 'facebook_confirmed' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ExternalServiceMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ExternalServicePeer::getTableMap();
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
		return str_replace(ExternalServicePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ExternalServicePeer::ID);

		$criteria->addSelectColumn(ExternalServicePeer::USER_ID);

		$criteria->addSelectColumn(ExternalServicePeer::UUID);

		$criteria->addSelectColumn(ExternalServicePeer::TWITTER_USERNAME);

		$criteria->addSelectColumn(ExternalServicePeer::TWITTER_PASSWORD);

		$criteria->addSelectColumn(ExternalServicePeer::TWITTER_UPDATE);

		$criteria->addSelectColumn(ExternalServicePeer::TWITTER_STATUS_UPDATE);

		$criteria->addSelectColumn(ExternalServicePeer::TWITTER_CONFIRMED);

		$criteria->addSelectColumn(ExternalServicePeer::FACEBOOK_ACCOUNT);

		$criteria->addSelectColumn(ExternalServicePeer::FACEBOOK_UPDATE);

		$criteria->addSelectColumn(ExternalServicePeer::FACEBOOK_CONFIRMED);

	}

	const COUNT = 'COUNT(ct_external_service.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_external_service.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExternalServicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExternalServicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ExternalServicePeer::doSelectRS($criteria, $con);
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
		$objects = ExternalServicePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ExternalServicePeer::populateObjects(ExternalServicePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseExternalServicePeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseExternalServicePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ExternalServicePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ExternalServicePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExternalServicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExternalServicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExternalServicePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ExternalServicePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseExternalServicePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseExternalServicePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExternalServicePeer::addSelectColumns($c);
		$startcol = (ExternalServicePeer::NUM_COLUMNS - ExternalServicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ExternalServicePeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExternalServicePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addExternalService($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExternalServices();
				$obj2->addExternalService($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExternalServicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExternalServicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExternalServicePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ExternalServicePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseExternalServicePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseExternalServicePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExternalServicePeer::addSelectColumns($c);
		$startcol2 = (ExternalServicePeer::NUM_COLUMNS - ExternalServicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ExternalServicePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExternalServicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addExternalService($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initExternalServices();
				$obj2->addExternalService($obj1);
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
		return ExternalServicePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseExternalServicePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseExternalServicePeer', $values, $con);
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

		$criteria->remove(ExternalServicePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseExternalServicePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseExternalServicePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseExternalServicePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseExternalServicePeer', $values, $con);
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
			$comparison = $criteria->getComparison(ExternalServicePeer::ID);
			$selectCriteria->add(ExternalServicePeer::ID, $criteria->remove(ExternalServicePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseExternalServicePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseExternalServicePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ExternalServicePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ExternalServicePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ExternalService) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ExternalServicePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ExternalService $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ExternalServicePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ExternalServicePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ExternalServicePeer::DATABASE_NAME, ExternalServicePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ExternalServicePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ExternalServicePeer::DATABASE_NAME);

		$criteria->add(ExternalServicePeer::ID, $pk);


		$v = ExternalServicePeer::doSelect($criteria, $con);

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
			$criteria->add(ExternalServicePeer::ID, $pks, Criteria::IN);
			$objs = ExternalServicePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseExternalServicePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ExternalServiceMapBuilder');
}
