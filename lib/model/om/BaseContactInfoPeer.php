<?php


abstract class BaseContactInfoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_contactinfo';

	
	const CLASS_DEFAULT = 'lib.model.ContactInfo';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const USER_ID = 'ct_contactinfo.USER_ID';

	
	const UUID = 'ct_contactinfo.UUID';

	
	const TITLE = 'ct_contactinfo.TITLE';

	
	const EMAIL = 'ct_contactinfo.EMAIL';

	
	const PHONE = 'ct_contactinfo.PHONE';

	
	const ADDRESS1 = 'ct_contactinfo.ADDRESS1';

	
	const ADDRESS2 = 'ct_contactinfo.ADDRESS2';

	
	const CITY = 'ct_contactinfo.CITY';

	
	const STATE = 'ct_contactinfo.STATE';

	
	const POSTAL = 'ct_contactinfo.POSTAL';

	
	const PUBLISHED = 'ct_contactinfo.PUBLISHED';

	
	const PRIVACY_LEVEL = 'ct_contactinfo.PRIVACY_LEVEL';

	
	const DELETED_AT = 'ct_contactinfo.DELETED_AT';

	
	const VERSION = 'ct_contactinfo.VERSION';

	
	const UPDATED_AT = 'ct_contactinfo.UPDATED_AT';

	
	const CREATED_AT = 'ct_contactinfo.CREATED_AT';

	
	const ID = 'ct_contactinfo.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('UserId', 'Uuid', 'Title', 'Email', 'Phone', 'Address1', 'Address2', 'City', 'State', 'Postal', 'Published', 'PrivacyLevel', 'DeletedAt', 'Version', 'UpdatedAt', 'CreatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ContactInfoPeer::USER_ID, ContactInfoPeer::UUID, ContactInfoPeer::TITLE, ContactInfoPeer::EMAIL, ContactInfoPeer::PHONE, ContactInfoPeer::ADDRESS1, ContactInfoPeer::ADDRESS2, ContactInfoPeer::CITY, ContactInfoPeer::STATE, ContactInfoPeer::POSTAL, ContactInfoPeer::PUBLISHED, ContactInfoPeer::PRIVACY_LEVEL, ContactInfoPeer::DELETED_AT, ContactInfoPeer::VERSION, ContactInfoPeer::UPDATED_AT, ContactInfoPeer::CREATED_AT, ContactInfoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('user_id', 'uuid', 'title', 'email', 'phone', 'address1', 'address2', 'city', 'state', 'postal', 'published', 'privacy_level', 'deleted_at', 'version', 'updated_at', 'created_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('UserId' => 0, 'Uuid' => 1, 'Title' => 2, 'Email' => 3, 'Phone' => 4, 'Address1' => 5, 'Address2' => 6, 'City' => 7, 'State' => 8, 'Postal' => 9, 'Published' => 10, 'PrivacyLevel' => 11, 'DeletedAt' => 12, 'Version' => 13, 'UpdatedAt' => 14, 'CreatedAt' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (ContactInfoPeer::USER_ID => 0, ContactInfoPeer::UUID => 1, ContactInfoPeer::TITLE => 2, ContactInfoPeer::EMAIL => 3, ContactInfoPeer::PHONE => 4, ContactInfoPeer::ADDRESS1 => 5, ContactInfoPeer::ADDRESS2 => 6, ContactInfoPeer::CITY => 7, ContactInfoPeer::STATE => 8, ContactInfoPeer::POSTAL => 9, ContactInfoPeer::PUBLISHED => 10, ContactInfoPeer::PRIVACY_LEVEL => 11, ContactInfoPeer::DELETED_AT => 12, ContactInfoPeer::VERSION => 13, ContactInfoPeer::UPDATED_AT => 14, ContactInfoPeer::CREATED_AT => 15, ContactInfoPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('user_id' => 0, 'uuid' => 1, 'title' => 2, 'email' => 3, 'phone' => 4, 'address1' => 5, 'address2' => 6, 'city' => 7, 'state' => 8, 'postal' => 9, 'published' => 10, 'privacy_level' => 11, 'deleted_at' => 12, 'version' => 13, 'updated_at' => 14, 'created_at' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ContactInfoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContactInfoPeer::getTableMap();
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
		return str_replace(ContactInfoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContactInfoPeer::USER_ID);

		$criteria->addSelectColumn(ContactInfoPeer::UUID);

		$criteria->addSelectColumn(ContactInfoPeer::TITLE);

		$criteria->addSelectColumn(ContactInfoPeer::EMAIL);

		$criteria->addSelectColumn(ContactInfoPeer::PHONE);

		$criteria->addSelectColumn(ContactInfoPeer::ADDRESS1);

		$criteria->addSelectColumn(ContactInfoPeer::ADDRESS2);

		$criteria->addSelectColumn(ContactInfoPeer::CITY);

		$criteria->addSelectColumn(ContactInfoPeer::STATE);

		$criteria->addSelectColumn(ContactInfoPeer::POSTAL);

		$criteria->addSelectColumn(ContactInfoPeer::PUBLISHED);

		$criteria->addSelectColumn(ContactInfoPeer::PRIVACY_LEVEL);

		$criteria->addSelectColumn(ContactInfoPeer::DELETED_AT);

		$criteria->addSelectColumn(ContactInfoPeer::VERSION);

		$criteria->addSelectColumn(ContactInfoPeer::UPDATED_AT);

		$criteria->addSelectColumn(ContactInfoPeer::CREATED_AT);

		$criteria->addSelectColumn(ContactInfoPeer::ID);

	}

	const COUNT = 'COUNT(ct_contactinfo.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_contactinfo.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContactInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContactInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContactInfoPeer::doSelectRS($criteria, $con);
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
		$objects = ContactInfoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContactInfoPeer::populateObjects(ContactInfoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactInfoPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseContactInfoPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContactInfoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContactInfoPeer::getOMClass();
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
			$criteria->addSelectColumn(ContactInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContactInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContactInfoPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ContactInfoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactInfoPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseContactInfoPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContactInfoPeer::addSelectColumns($c);
		$startcol = (ContactInfoPeer::NUM_COLUMNS - ContactInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ContactInfoPeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContactInfoPeer::getOMClass();

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
										$temp_obj2->addContactInfo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContactInfos();
				$obj2->addContactInfo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContactInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContactInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContactInfoPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ContactInfoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactInfoPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseContactInfoPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContactInfoPeer::addSelectColumns($c);
		$startcol2 = (ContactInfoPeer::NUM_COLUMNS - ContactInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ContactInfoPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContactInfoPeer::getOMClass();


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
					$temp_obj2->addContactInfo($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initContactInfos();
				$obj2->addContactInfo($obj1);
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
		return ContactInfoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactInfoPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContactInfoPeer', $values, $con);
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

		$criteria->remove(ContactInfoPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseContactInfoPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseContactInfoPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactInfoPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContactInfoPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ContactInfoPeer::ID);
			$selectCriteria->add(ContactInfoPeer::ID, $criteria->remove(ContactInfoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseContactInfoPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseContactInfoPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ContactInfoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ContactInfoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ContactInfo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContactInfoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ContactInfo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContactInfoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContactInfoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ContactInfoPeer::DATABASE_NAME, ContactInfoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContactInfoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ContactInfoPeer::DATABASE_NAME);

		$criteria->add(ContactInfoPeer::ID, $pk);


		$v = ContactInfoPeer::doSelect($criteria, $con);

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
			$criteria->add(ContactInfoPeer::ID, $pks, Criteria::IN);
			$objs = ContactInfoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContactInfoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ContactInfoMapBuilder');
}
