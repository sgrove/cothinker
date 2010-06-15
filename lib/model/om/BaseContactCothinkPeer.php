<?php


abstract class BaseContactCothinkPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_cothink_contact';

	
	const CLASS_DEFAULT = 'lib.model.ContactCothink';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_cothink_contact.ID';

	
	const UUID = 'ct_cothink_contact.UUID';

	
	const USER_ID = 'ct_cothink_contact.USER_ID';

	
	const EMAIL = 'ct_cothink_contact.EMAIL';

	
	const NAME = 'ct_cothink_contact.NAME';

	
	const TITLE = 'ct_cothink_contact.TITLE';

	
	const SLUG = 'ct_cothink_contact.SLUG';

	
	const DESCRIPTION = 'ct_cothink_contact.DESCRIPTION';

	
	const STATUS = 'ct_cothink_contact.STATUS';

	
	const TYPE = 'ct_cothink_contact.TYPE';

	
	const CREATED_AT = 'ct_cothink_contact.CREATED_AT';

	
	const DELETED_AT = 'ct_cothink_contact.DELETED_AT';

	
	const UPDATED_AT = 'ct_cothink_contact.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'UserId', 'Email', 'Name', 'Title', 'Slug', 'Description', 'Status', 'Type', 'CreatedAt', 'DeletedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ContactCothinkPeer::ID, ContactCothinkPeer::UUID, ContactCothinkPeer::USER_ID, ContactCothinkPeer::EMAIL, ContactCothinkPeer::NAME, ContactCothinkPeer::TITLE, ContactCothinkPeer::SLUG, ContactCothinkPeer::DESCRIPTION, ContactCothinkPeer::STATUS, ContactCothinkPeer::TYPE, ContactCothinkPeer::CREATED_AT, ContactCothinkPeer::DELETED_AT, ContactCothinkPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'user_id', 'email', 'name', 'title', 'slug', 'description', 'status', 'type', 'created_at', 'deleted_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'UserId' => 2, 'Email' => 3, 'Name' => 4, 'Title' => 5, 'Slug' => 6, 'Description' => 7, 'Status' => 8, 'Type' => 9, 'CreatedAt' => 10, 'DeletedAt' => 11, 'UpdatedAt' => 12, ),
		BasePeer::TYPE_COLNAME => array (ContactCothinkPeer::ID => 0, ContactCothinkPeer::UUID => 1, ContactCothinkPeer::USER_ID => 2, ContactCothinkPeer::EMAIL => 3, ContactCothinkPeer::NAME => 4, ContactCothinkPeer::TITLE => 5, ContactCothinkPeer::SLUG => 6, ContactCothinkPeer::DESCRIPTION => 7, ContactCothinkPeer::STATUS => 8, ContactCothinkPeer::TYPE => 9, ContactCothinkPeer::CREATED_AT => 10, ContactCothinkPeer::DELETED_AT => 11, ContactCothinkPeer::UPDATED_AT => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'user_id' => 2, 'email' => 3, 'name' => 4, 'title' => 5, 'slug' => 6, 'description' => 7, 'status' => 8, 'type' => 9, 'created_at' => 10, 'deleted_at' => 11, 'updated_at' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ContactCothinkMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContactCothinkPeer::getTableMap();
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
		return str_replace(ContactCothinkPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContactCothinkPeer::ID);

		$criteria->addSelectColumn(ContactCothinkPeer::UUID);

		$criteria->addSelectColumn(ContactCothinkPeer::USER_ID);

		$criteria->addSelectColumn(ContactCothinkPeer::EMAIL);

		$criteria->addSelectColumn(ContactCothinkPeer::NAME);

		$criteria->addSelectColumn(ContactCothinkPeer::TITLE);

		$criteria->addSelectColumn(ContactCothinkPeer::SLUG);

		$criteria->addSelectColumn(ContactCothinkPeer::DESCRIPTION);

		$criteria->addSelectColumn(ContactCothinkPeer::STATUS);

		$criteria->addSelectColumn(ContactCothinkPeer::TYPE);

		$criteria->addSelectColumn(ContactCothinkPeer::CREATED_AT);

		$criteria->addSelectColumn(ContactCothinkPeer::DELETED_AT);

		$criteria->addSelectColumn(ContactCothinkPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ct_cothink_contact.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_cothink_contact.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContactCothinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContactCothinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContactCothinkPeer::doSelectRS($criteria, $con);
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
		$objects = ContactCothinkPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContactCothinkPeer::populateObjects(ContactCothinkPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactCothinkPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseContactCothinkPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContactCothinkPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContactCothinkPeer::getOMClass();
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
			$criteria->addSelectColumn(ContactCothinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContactCothinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContactCothinkPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ContactCothinkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactCothinkPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseContactCothinkPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContactCothinkPeer::addSelectColumns($c);
		$startcol = (ContactCothinkPeer::NUM_COLUMNS - ContactCothinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ContactCothinkPeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContactCothinkPeer::getOMClass();

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
										$temp_obj2->addContactCothink($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContactCothinks();
				$obj2->addContactCothink($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContactCothinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContactCothinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContactCothinkPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ContactCothinkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactCothinkPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseContactCothinkPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContactCothinkPeer::addSelectColumns($c);
		$startcol2 = (ContactCothinkPeer::NUM_COLUMNS - ContactCothinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ContactCothinkPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContactCothinkPeer::getOMClass();


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
					$temp_obj2->addContactCothink($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initContactCothinks();
				$obj2->addContactCothink($obj1);
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
		return ContactCothinkPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactCothinkPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContactCothinkPeer', $values, $con);
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

		$criteria->remove(ContactCothinkPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseContactCothinkPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseContactCothinkPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactCothinkPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContactCothinkPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ContactCothinkPeer::ID);
			$selectCriteria->add(ContactCothinkPeer::ID, $criteria->remove(ContactCothinkPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseContactCothinkPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseContactCothinkPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ContactCothinkPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ContactCothinkPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ContactCothink) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContactCothinkPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ContactCothink $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContactCothinkPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContactCothinkPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ContactCothinkPeer::DATABASE_NAME, ContactCothinkPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContactCothinkPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ContactCothinkPeer::DATABASE_NAME);

		$criteria->add(ContactCothinkPeer::ID, $pk);


		$v = ContactCothinkPeer::doSelect($criteria, $con);

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
			$criteria->add(ContactCothinkPeer::ID, $pks, Criteria::IN);
			$objs = ContactCothinkPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContactCothinkPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ContactCothinkMapBuilder');
}
