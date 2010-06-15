<?php


abstract class BaseSuggestedFeaturePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_suggest_feature';

	
	const CLASS_DEFAULT = 'lib.model.SuggestedFeature';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_suggest_feature.ID';

	
	const UUID = 'ct_suggest_feature.UUID';

	
	const USER_ID = 'ct_suggest_feature.USER_ID';

	
	const TITLE = 'ct_suggest_feature.TITLE';

	
	const SLUG = 'ct_suggest_feature.SLUG';

	
	const DESCRIPTION = 'ct_suggest_feature.DESCRIPTION';

	
	const STATUS = 'ct_suggest_feature.STATUS';

	
	const TYPE = 'ct_suggest_feature.TYPE';

	
	const CATEGORY = 'ct_suggest_feature.CATEGORY';

	
	const FEELING = 'ct_suggest_feature.FEELING';

	
	const CREATED_AT = 'ct_suggest_feature.CREATED_AT';

	
	const DELETED_AT = 'ct_suggest_feature.DELETED_AT';

	
	const UPDATED_AT = 'ct_suggest_feature.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'UserId', 'Title', 'Slug', 'Description', 'Status', 'Type', 'Category', 'Feeling', 'CreatedAt', 'DeletedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (SuggestedFeaturePeer::ID, SuggestedFeaturePeer::UUID, SuggestedFeaturePeer::USER_ID, SuggestedFeaturePeer::TITLE, SuggestedFeaturePeer::SLUG, SuggestedFeaturePeer::DESCRIPTION, SuggestedFeaturePeer::STATUS, SuggestedFeaturePeer::TYPE, SuggestedFeaturePeer::CATEGORY, SuggestedFeaturePeer::FEELING, SuggestedFeaturePeer::CREATED_AT, SuggestedFeaturePeer::DELETED_AT, SuggestedFeaturePeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'user_id', 'title', 'slug', 'description', 'status', 'type', 'category', 'feeling', 'created_at', 'deleted_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'UserId' => 2, 'Title' => 3, 'Slug' => 4, 'Description' => 5, 'Status' => 6, 'Type' => 7, 'Category' => 8, 'Feeling' => 9, 'CreatedAt' => 10, 'DeletedAt' => 11, 'UpdatedAt' => 12, ),
		BasePeer::TYPE_COLNAME => array (SuggestedFeaturePeer::ID => 0, SuggestedFeaturePeer::UUID => 1, SuggestedFeaturePeer::USER_ID => 2, SuggestedFeaturePeer::TITLE => 3, SuggestedFeaturePeer::SLUG => 4, SuggestedFeaturePeer::DESCRIPTION => 5, SuggestedFeaturePeer::STATUS => 6, SuggestedFeaturePeer::TYPE => 7, SuggestedFeaturePeer::CATEGORY => 8, SuggestedFeaturePeer::FEELING => 9, SuggestedFeaturePeer::CREATED_AT => 10, SuggestedFeaturePeer::DELETED_AT => 11, SuggestedFeaturePeer::UPDATED_AT => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'user_id' => 2, 'title' => 3, 'slug' => 4, 'description' => 5, 'status' => 6, 'type' => 7, 'category' => 8, 'feeling' => 9, 'created_at' => 10, 'deleted_at' => 11, 'updated_at' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.SuggestedFeatureMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SuggestedFeaturePeer::getTableMap();
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
		return str_replace(SuggestedFeaturePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SuggestedFeaturePeer::ID);

		$criteria->addSelectColumn(SuggestedFeaturePeer::UUID);

		$criteria->addSelectColumn(SuggestedFeaturePeer::USER_ID);

		$criteria->addSelectColumn(SuggestedFeaturePeer::TITLE);

		$criteria->addSelectColumn(SuggestedFeaturePeer::SLUG);

		$criteria->addSelectColumn(SuggestedFeaturePeer::DESCRIPTION);

		$criteria->addSelectColumn(SuggestedFeaturePeer::STATUS);

		$criteria->addSelectColumn(SuggestedFeaturePeer::TYPE);

		$criteria->addSelectColumn(SuggestedFeaturePeer::CATEGORY);

		$criteria->addSelectColumn(SuggestedFeaturePeer::FEELING);

		$criteria->addSelectColumn(SuggestedFeaturePeer::CREATED_AT);

		$criteria->addSelectColumn(SuggestedFeaturePeer::DELETED_AT);

		$criteria->addSelectColumn(SuggestedFeaturePeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ct_suggest_feature.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_suggest_feature.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SuggestedFeaturePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SuggestedFeaturePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SuggestedFeaturePeer::doSelectRS($criteria, $con);
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
		$objects = SuggestedFeaturePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SuggestedFeaturePeer::populateObjects(SuggestedFeaturePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSuggestedFeaturePeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseSuggestedFeaturePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SuggestedFeaturePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SuggestedFeaturePeer::getOMClass();
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
			$criteria->addSelectColumn(SuggestedFeaturePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SuggestedFeaturePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SuggestedFeaturePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = SuggestedFeaturePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSuggestedFeaturePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseSuggestedFeaturePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SuggestedFeaturePeer::addSelectColumns($c);
		$startcol = (SuggestedFeaturePeer::NUM_COLUMNS - SuggestedFeaturePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(SuggestedFeaturePeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SuggestedFeaturePeer::getOMClass();

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
										$temp_obj2->addSuggestedFeature($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSuggestedFeatures();
				$obj2->addSuggestedFeature($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SuggestedFeaturePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SuggestedFeaturePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SuggestedFeaturePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = SuggestedFeaturePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSuggestedFeaturePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseSuggestedFeaturePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SuggestedFeaturePeer::addSelectColumns($c);
		$startcol2 = (SuggestedFeaturePeer::NUM_COLUMNS - SuggestedFeaturePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(SuggestedFeaturePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SuggestedFeaturePeer::getOMClass();


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
					$temp_obj2->addSuggestedFeature($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initSuggestedFeatures();
				$obj2->addSuggestedFeature($obj1);
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
		return SuggestedFeaturePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSuggestedFeaturePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSuggestedFeaturePeer', $values, $con);
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

		$criteria->remove(SuggestedFeaturePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseSuggestedFeaturePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseSuggestedFeaturePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSuggestedFeaturePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSuggestedFeaturePeer', $values, $con);
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
			$comparison = $criteria->getComparison(SuggestedFeaturePeer::ID);
			$selectCriteria->add(SuggestedFeaturePeer::ID, $criteria->remove(SuggestedFeaturePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseSuggestedFeaturePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseSuggestedFeaturePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(SuggestedFeaturePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SuggestedFeaturePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof SuggestedFeature) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SuggestedFeaturePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(SuggestedFeature $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SuggestedFeaturePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SuggestedFeaturePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SuggestedFeaturePeer::DATABASE_NAME, SuggestedFeaturePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SuggestedFeaturePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SuggestedFeaturePeer::DATABASE_NAME);

		$criteria->add(SuggestedFeaturePeer::ID, $pk);


		$v = SuggestedFeaturePeer::doSelect($criteria, $con);

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
			$criteria->add(SuggestedFeaturePeer::ID, $pks, Criteria::IN);
			$objs = SuggestedFeaturePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSuggestedFeaturePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.SuggestedFeatureMapBuilder');
}
