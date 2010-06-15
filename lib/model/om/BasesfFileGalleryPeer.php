<?php


abstract class BasesfFileGalleryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_file_gallery';

	
	const CLASS_DEFAULT = 'lib.model.sfFileGallery';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_file_gallery.ID';

	
	const GROUP_ID = 'ct_file_gallery.GROUP_ID';

	
	const UUID = 'ct_file_gallery.UUID';

	
	const ENTITY = 'ct_file_gallery.ENTITY';

	
	const ENTITY_ID = 'ct_file_gallery.ENTITY_ID';

	
	const NAME = 'ct_file_gallery.NAME';

	
	const MIME_TYPE = 'ct_file_gallery.MIME_TYPE';

	
	const SIZE = 'ct_file_gallery.SIZE';

	
	const SUFFIX = 'ct_file_gallery.SUFFIX';

	
	const TITLE = 'ct_file_gallery.TITLE';

	
	const DESCRIPTION = 'ct_file_gallery.DESCRIPTION';

	
	const UPLOADED_BY = 'ct_file_gallery.UPLOADED_BY';

	
	const CREATED_AT = 'ct_file_gallery.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'GroupId', 'Uuid', 'Entity', 'EntityId', 'Name', 'MimeType', 'Size', 'Suffix', 'Title', 'Description', 'UploadedBy', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfFileGalleryPeer::ID, sfFileGalleryPeer::GROUP_ID, sfFileGalleryPeer::UUID, sfFileGalleryPeer::ENTITY, sfFileGalleryPeer::ENTITY_ID, sfFileGalleryPeer::NAME, sfFileGalleryPeer::MIME_TYPE, sfFileGalleryPeer::SIZE, sfFileGalleryPeer::SUFFIX, sfFileGalleryPeer::TITLE, sfFileGalleryPeer::DESCRIPTION, sfFileGalleryPeer::UPLOADED_BY, sfFileGalleryPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'group_id', 'uuid', 'entity', 'entity_id', 'name', 'mime_type', 'size', 'suffix', 'title', 'description', 'uploaded_by', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'GroupId' => 1, 'Uuid' => 2, 'Entity' => 3, 'EntityId' => 4, 'Name' => 5, 'MimeType' => 6, 'Size' => 7, 'Suffix' => 8, 'Title' => 9, 'Description' => 10, 'UploadedBy' => 11, 'CreatedAt' => 12, ),
		BasePeer::TYPE_COLNAME => array (sfFileGalleryPeer::ID => 0, sfFileGalleryPeer::GROUP_ID => 1, sfFileGalleryPeer::UUID => 2, sfFileGalleryPeer::ENTITY => 3, sfFileGalleryPeer::ENTITY_ID => 4, sfFileGalleryPeer::NAME => 5, sfFileGalleryPeer::MIME_TYPE => 6, sfFileGalleryPeer::SIZE => 7, sfFileGalleryPeer::SUFFIX => 8, sfFileGalleryPeer::TITLE => 9, sfFileGalleryPeer::DESCRIPTION => 10, sfFileGalleryPeer::UPLOADED_BY => 11, sfFileGalleryPeer::CREATED_AT => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'group_id' => 1, 'uuid' => 2, 'entity' => 3, 'entity_id' => 4, 'name' => 5, 'mime_type' => 6, 'size' => 7, 'suffix' => 8, 'title' => 9, 'description' => 10, 'uploaded_by' => 11, 'created_at' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.sfFileGalleryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfFileGalleryPeer::getTableMap();
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
		return str_replace(sfFileGalleryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfFileGalleryPeer::ID);

		$criteria->addSelectColumn(sfFileGalleryPeer::GROUP_ID);

		$criteria->addSelectColumn(sfFileGalleryPeer::UUID);

		$criteria->addSelectColumn(sfFileGalleryPeer::ENTITY);

		$criteria->addSelectColumn(sfFileGalleryPeer::ENTITY_ID);

		$criteria->addSelectColumn(sfFileGalleryPeer::NAME);

		$criteria->addSelectColumn(sfFileGalleryPeer::MIME_TYPE);

		$criteria->addSelectColumn(sfFileGalleryPeer::SIZE);

		$criteria->addSelectColumn(sfFileGalleryPeer::SUFFIX);

		$criteria->addSelectColumn(sfFileGalleryPeer::TITLE);

		$criteria->addSelectColumn(sfFileGalleryPeer::DESCRIPTION);

		$criteria->addSelectColumn(sfFileGalleryPeer::UPLOADED_BY);

		$criteria->addSelectColumn(sfFileGalleryPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_file_gallery.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_file_gallery.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfFileGalleryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfFileGalleryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfFileGalleryPeer::doSelectRS($criteria, $con);
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
		$objects = sfFileGalleryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfFileGalleryPeer::populateObjects(sfFileGalleryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFileGalleryPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfFileGalleryPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfFileGalleryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfFileGalleryPeer::getOMClass();
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
			$criteria->addSelectColumn(sfFileGalleryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfFileGalleryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfFileGalleryPeer::UPLOADED_BY, sfGuardUserPeer::ID);

		$rs = sfFileGalleryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFileGalleryPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasesfFileGalleryPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfFileGalleryPeer::addSelectColumns($c);
		$startcol = (sfFileGalleryPeer::NUM_COLUMNS - sfFileGalleryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(sfFileGalleryPeer::UPLOADED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfFileGalleryPeer::getOMClass();

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
										$temp_obj2->addsfFileGallery($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfFileGallerys();
				$obj2->addsfFileGallery($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfFileGalleryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfFileGalleryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfFileGalleryPeer::UPLOADED_BY, sfGuardUserPeer::ID);

		$rs = sfFileGalleryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFileGalleryPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasesfFileGalleryPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfFileGalleryPeer::addSelectColumns($c);
		$startcol2 = (sfFileGalleryPeer::NUM_COLUMNS - sfFileGalleryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(sfFileGalleryPeer::UPLOADED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfFileGalleryPeer::getOMClass();


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
					$temp_obj2->addsfFileGallery($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfFileGallerys();
				$obj2->addsfFileGallery($obj1);
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
		return sfFileGalleryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFileGalleryPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfFileGalleryPeer', $values, $con);
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

		$criteria->remove(sfFileGalleryPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfFileGalleryPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfFileGalleryPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfFileGalleryPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfFileGalleryPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfFileGalleryPeer::ID);
			$selectCriteria->add(sfFileGalleryPeer::ID, $criteria->remove(sfFileGalleryPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfFileGalleryPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfFileGalleryPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfFileGalleryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfFileGalleryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfFileGallery) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfFileGalleryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfFileGallery $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfFileGalleryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfFileGalleryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfFileGalleryPeer::DATABASE_NAME, sfFileGalleryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfFileGalleryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfFileGalleryPeer::DATABASE_NAME);

		$criteria->add(sfFileGalleryPeer::ID, $pk);


		$v = sfFileGalleryPeer::doSelect($criteria, $con);

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
			$criteria->add(sfFileGalleryPeer::ID, $pks, Criteria::IN);
			$objs = sfFileGalleryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfFileGalleryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.sfFileGalleryMapBuilder');
}
