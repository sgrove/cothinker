<?php


abstract class BaseCtSuggestFeaturePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_suggest_feature';

	
	const CLASS_DEFAULT = 'lib.model.CtSuggestFeature';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_suggest_feature.ID';

	
	const UUID = 'ct_suggest_feature.UUID';

	
	const USER_ID = 'ct_suggest_feature.USER_ID';

	
	const TITLE = 'ct_suggest_feature.TITLE';

	
	const DESCRIPTION = 'ct_suggest_feature.DESCRIPTION';

	
	const STATUS = 'ct_suggest_feature.STATUS';

	
	const TYPE = 'ct_suggest_feature.TYPE';

	
	const FEELING = 'ct_suggest_feature.FEELING';

	
	const CREATED_AT = 'ct_suggest_feature.CREATED_AT';

	
	const DELETED_AT = 'ct_suggest_feature.DELETED_AT';

	
	const UPDATED_AT = 'ct_suggest_feature.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'UserId', 'Title', 'Description', 'Status', 'Type', 'Feeling', 'CreatedAt', 'DeletedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (CtSuggestFeaturePeer::ID, CtSuggestFeaturePeer::UUID, CtSuggestFeaturePeer::USER_ID, CtSuggestFeaturePeer::TITLE, CtSuggestFeaturePeer::DESCRIPTION, CtSuggestFeaturePeer::STATUS, CtSuggestFeaturePeer::TYPE, CtSuggestFeaturePeer::FEELING, CtSuggestFeaturePeer::CREATED_AT, CtSuggestFeaturePeer::DELETED_AT, CtSuggestFeaturePeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'user_id', 'title', 'description', 'status', 'type', 'feeling', 'created_at', 'deleted_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'UserId' => 2, 'Title' => 3, 'Description' => 4, 'Status' => 5, 'Type' => 6, 'Feeling' => 7, 'CreatedAt' => 8, 'DeletedAt' => 9, 'UpdatedAt' => 10, ),
		BasePeer::TYPE_COLNAME => array (CtSuggestFeaturePeer::ID => 0, CtSuggestFeaturePeer::UUID => 1, CtSuggestFeaturePeer::USER_ID => 2, CtSuggestFeaturePeer::TITLE => 3, CtSuggestFeaturePeer::DESCRIPTION => 4, CtSuggestFeaturePeer::STATUS => 5, CtSuggestFeaturePeer::TYPE => 6, CtSuggestFeaturePeer::FEELING => 7, CtSuggestFeaturePeer::CREATED_AT => 8, CtSuggestFeaturePeer::DELETED_AT => 9, CtSuggestFeaturePeer::UPDATED_AT => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'user_id' => 2, 'title' => 3, 'description' => 4, 'status' => 5, 'type' => 6, 'feeling' => 7, 'created_at' => 8, 'deleted_at' => 9, 'updated_at' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.CtSuggestFeatureMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CtSuggestFeaturePeer::getTableMap();
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
		return str_replace(CtSuggestFeaturePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CtSuggestFeaturePeer::ID);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::UUID);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::USER_ID);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::TITLE);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::DESCRIPTION);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::STATUS);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::TYPE);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::FEELING);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::CREATED_AT);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::DELETED_AT);

		$criteria->addSelectColumn(CtSuggestFeaturePeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ct_suggest_feature.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_suggest_feature.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CtSuggestFeaturePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CtSuggestFeaturePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CtSuggestFeaturePeer::doSelectRS($criteria, $con);
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
		$objects = CtSuggestFeaturePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CtSuggestFeaturePeer::populateObjects(CtSuggestFeaturePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCtSuggestFeaturePeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseCtSuggestFeaturePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CtSuggestFeaturePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CtSuggestFeaturePeer::getOMClass();
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
			$criteria->addSelectColumn(CtSuggestFeaturePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CtSuggestFeaturePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CtSuggestFeaturePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = CtSuggestFeaturePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCtSuggestFeaturePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseCtSuggestFeaturePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CtSuggestFeaturePeer::addSelectColumns($c);
		$startcol = (CtSuggestFeaturePeer::NUM_COLUMNS - CtSuggestFeaturePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(CtSuggestFeaturePeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CtSuggestFeaturePeer::getOMClass();

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
										$temp_obj2->addCtSuggestFeature($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCtSuggestFeatures();
				$obj2->addCtSuggestFeature($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CtSuggestFeaturePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CtSuggestFeaturePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CtSuggestFeaturePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = CtSuggestFeaturePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCtSuggestFeaturePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseCtSuggestFeaturePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CtSuggestFeaturePeer::addSelectColumns($c);
		$startcol2 = (CtSuggestFeaturePeer::NUM_COLUMNS - CtSuggestFeaturePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(CtSuggestFeaturePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CtSuggestFeaturePeer::getOMClass();


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
					$temp_obj2->addCtSuggestFeature($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCtSuggestFeatures();
				$obj2->addCtSuggestFeature($obj1);
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
		return CtSuggestFeaturePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCtSuggestFeaturePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCtSuggestFeaturePeer', $values, $con);
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


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseCtSuggestFeaturePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseCtSuggestFeaturePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCtSuggestFeaturePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCtSuggestFeaturePeer', $values, $con);
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
			$comparison = $criteria->getComparison(CtSuggestFeaturePeer::ID);
			$selectCriteria->add(CtSuggestFeaturePeer::ID, $criteria->remove(CtSuggestFeaturePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseCtSuggestFeaturePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseCtSuggestFeaturePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(CtSuggestFeaturePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CtSuggestFeaturePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CtSuggestFeature) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CtSuggestFeaturePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CtSuggestFeature $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CtSuggestFeaturePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CtSuggestFeaturePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CtSuggestFeaturePeer::DATABASE_NAME, CtSuggestFeaturePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CtSuggestFeaturePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CtSuggestFeaturePeer::DATABASE_NAME);

		$criteria->add(CtSuggestFeaturePeer::ID, $pk);


		$v = CtSuggestFeaturePeer::doSelect($criteria, $con);

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
			$criteria->add(CtSuggestFeaturePeer::ID, $pks, Criteria::IN);
			$objs = CtSuggestFeaturePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCtSuggestFeaturePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.CtSuggestFeatureMapBuilder');
}
