<?php


abstract class BaseContactMessagePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_contact_message';

	
	const CLASS_DEFAULT = 'lib.model.ContactMessage';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_contact_message.ID';

	
	const UUID = 'ct_contact_message.UUID';

	
	const NAME = 'ct_contact_message.NAME';

	
	const EMAIL = 'ct_contact_message.EMAIL';

	
	const MESSAGE = 'ct_contact_message.MESSAGE';

	
	const TITLE = 'ct_contact_message.TITLE';

	
	const SLUG = 'ct_contact_message.SLUG';

	
	const STATUS = 'ct_contact_message.STATUS';

	
	const TYPE = 'ct_contact_message.TYPE';

	
	const CATEGORY = 'ct_contact_message.CATEGORY';

	
	const FEELING = 'ct_contact_message.FEELING';

	
	const CREATED_AT = 'ct_contact_message.CREATED_AT';

	
	const DELETED_AT = 'ct_contact_message.DELETED_AT';

	
	const UPDATED_AT = 'ct_contact_message.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'Name', 'Email', 'Message', 'Title', 'Slug', 'Status', 'Type', 'Category', 'Feeling', 'CreatedAt', 'DeletedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ContactMessagePeer::ID, ContactMessagePeer::UUID, ContactMessagePeer::NAME, ContactMessagePeer::EMAIL, ContactMessagePeer::MESSAGE, ContactMessagePeer::TITLE, ContactMessagePeer::SLUG, ContactMessagePeer::STATUS, ContactMessagePeer::TYPE, ContactMessagePeer::CATEGORY, ContactMessagePeer::FEELING, ContactMessagePeer::CREATED_AT, ContactMessagePeer::DELETED_AT, ContactMessagePeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'name', 'email', 'message', 'title', 'slug', 'status', 'type', 'category', 'feeling', 'created_at', 'deleted_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'Name' => 2, 'Email' => 3, 'Message' => 4, 'Title' => 5, 'Slug' => 6, 'Status' => 7, 'Type' => 8, 'Category' => 9, 'Feeling' => 10, 'CreatedAt' => 11, 'DeletedAt' => 12, 'UpdatedAt' => 13, ),
		BasePeer::TYPE_COLNAME => array (ContactMessagePeer::ID => 0, ContactMessagePeer::UUID => 1, ContactMessagePeer::NAME => 2, ContactMessagePeer::EMAIL => 3, ContactMessagePeer::MESSAGE => 4, ContactMessagePeer::TITLE => 5, ContactMessagePeer::SLUG => 6, ContactMessagePeer::STATUS => 7, ContactMessagePeer::TYPE => 8, ContactMessagePeer::CATEGORY => 9, ContactMessagePeer::FEELING => 10, ContactMessagePeer::CREATED_AT => 11, ContactMessagePeer::DELETED_AT => 12, ContactMessagePeer::UPDATED_AT => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'name' => 2, 'email' => 3, 'message' => 4, 'title' => 5, 'slug' => 6, 'status' => 7, 'type' => 8, 'category' => 9, 'feeling' => 10, 'created_at' => 11, 'deleted_at' => 12, 'updated_at' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ContactMessageMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContactMessagePeer::getTableMap();
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
		return str_replace(ContactMessagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContactMessagePeer::ID);

		$criteria->addSelectColumn(ContactMessagePeer::UUID);

		$criteria->addSelectColumn(ContactMessagePeer::NAME);

		$criteria->addSelectColumn(ContactMessagePeer::EMAIL);

		$criteria->addSelectColumn(ContactMessagePeer::MESSAGE);

		$criteria->addSelectColumn(ContactMessagePeer::TITLE);

		$criteria->addSelectColumn(ContactMessagePeer::SLUG);

		$criteria->addSelectColumn(ContactMessagePeer::STATUS);

		$criteria->addSelectColumn(ContactMessagePeer::TYPE);

		$criteria->addSelectColumn(ContactMessagePeer::CATEGORY);

		$criteria->addSelectColumn(ContactMessagePeer::FEELING);

		$criteria->addSelectColumn(ContactMessagePeer::CREATED_AT);

		$criteria->addSelectColumn(ContactMessagePeer::DELETED_AT);

		$criteria->addSelectColumn(ContactMessagePeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ct_contact_message.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_contact_message.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContactMessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContactMessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContactMessagePeer::doSelectRS($criteria, $con);
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
		$objects = ContactMessagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContactMessagePeer::populateObjects(ContactMessagePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactMessagePeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseContactMessagePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContactMessagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContactMessagePeer::getOMClass();
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
		return ContactMessagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactMessagePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContactMessagePeer', $values, $con);
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

		$criteria->remove(ContactMessagePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseContactMessagePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseContactMessagePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContactMessagePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContactMessagePeer', $values, $con);
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
			$comparison = $criteria->getComparison(ContactMessagePeer::ID);
			$selectCriteria->add(ContactMessagePeer::ID, $criteria->remove(ContactMessagePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseContactMessagePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseContactMessagePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ContactMessagePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ContactMessagePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ContactMessage) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContactMessagePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ContactMessage $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContactMessagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContactMessagePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ContactMessagePeer::DATABASE_NAME, ContactMessagePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContactMessagePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ContactMessagePeer::DATABASE_NAME);

		$criteria->add(ContactMessagePeer::ID, $pk);


		$v = ContactMessagePeer::doSelect($criteria, $con);

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
			$criteria->add(ContactMessagePeer::ID, $pks, Criteria::IN);
			$objs = ContactMessagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContactMessagePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ContactMessageMapBuilder');
}
