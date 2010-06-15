<?php


abstract class BaseCoFieldPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_field';

	
	const CLASS_DEFAULT = 'lib.model.CoField';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_field.ID';

	
	const UUID = 'ct_field.UUID';

	
	const FORM_ID = 'ct_field.FORM_ID';

	
	const NAME = 'ct_field.NAME';

	
	const SLUG = 'ct_field.SLUG';

	
	const DESCRIPTION = 'ct_field.DESCRIPTION';

	
	const STATUS = 'ct_field.STATUS';

	
	const TYPE = 'ct_field.TYPE';

	
	const POSITION = 'ct_field.POSITION';

	
	const CREATED_AT = 'ct_field.CREATED_AT';

	
	const DELETED_AT = 'ct_field.DELETED_AT';

	
	const UPDATED_AT = 'ct_field.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'FormId', 'Name', 'Slug', 'Description', 'Status', 'Type', 'Position', 'CreatedAt', 'DeletedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (CoFieldPeer::ID, CoFieldPeer::UUID, CoFieldPeer::FORM_ID, CoFieldPeer::NAME, CoFieldPeer::SLUG, CoFieldPeer::DESCRIPTION, CoFieldPeer::STATUS, CoFieldPeer::TYPE, CoFieldPeer::POSITION, CoFieldPeer::CREATED_AT, CoFieldPeer::DELETED_AT, CoFieldPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'form_id', 'name', 'slug', 'description', 'status', 'type', 'position', 'created_at', 'deleted_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'FormId' => 2, 'Name' => 3, 'Slug' => 4, 'Description' => 5, 'Status' => 6, 'Type' => 7, 'Position' => 8, 'CreatedAt' => 9, 'DeletedAt' => 10, 'UpdatedAt' => 11, ),
		BasePeer::TYPE_COLNAME => array (CoFieldPeer::ID => 0, CoFieldPeer::UUID => 1, CoFieldPeer::FORM_ID => 2, CoFieldPeer::NAME => 3, CoFieldPeer::SLUG => 4, CoFieldPeer::DESCRIPTION => 5, CoFieldPeer::STATUS => 6, CoFieldPeer::TYPE => 7, CoFieldPeer::POSITION => 8, CoFieldPeer::CREATED_AT => 9, CoFieldPeer::DELETED_AT => 10, CoFieldPeer::UPDATED_AT => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'form_id' => 2, 'name' => 3, 'slug' => 4, 'description' => 5, 'status' => 6, 'type' => 7, 'position' => 8, 'created_at' => 9, 'deleted_at' => 10, 'updated_at' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.CoFieldMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CoFieldPeer::getTableMap();
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
		return str_replace(CoFieldPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CoFieldPeer::ID);

		$criteria->addSelectColumn(CoFieldPeer::UUID);

		$criteria->addSelectColumn(CoFieldPeer::FORM_ID);

		$criteria->addSelectColumn(CoFieldPeer::NAME);

		$criteria->addSelectColumn(CoFieldPeer::SLUG);

		$criteria->addSelectColumn(CoFieldPeer::DESCRIPTION);

		$criteria->addSelectColumn(CoFieldPeer::STATUS);

		$criteria->addSelectColumn(CoFieldPeer::TYPE);

		$criteria->addSelectColumn(CoFieldPeer::POSITION);

		$criteria->addSelectColumn(CoFieldPeer::CREATED_AT);

		$criteria->addSelectColumn(CoFieldPeer::DELETED_AT);

		$criteria->addSelectColumn(CoFieldPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ct_field.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_field.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoFieldPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFieldPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CoFieldPeer::doSelectRS($criteria, $con);
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
		$objects = CoFieldPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CoFieldPeer::populateObjects(CoFieldPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFieldPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseCoFieldPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CoFieldPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CoFieldPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCoForm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoFieldPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFieldPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoFieldPeer::FORM_ID, CoFormPeer::ID);

		$rs = CoFieldPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCoForm(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFieldPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseCoFieldPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoFieldPeer::addSelectColumns($c);
		$startcol = (CoFieldPeer::NUM_COLUMNS - CoFieldPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CoFormPeer::addSelectColumns($c);

		$c->addJoin(CoFieldPeer::FORM_ID, CoFormPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoFieldPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CoFormPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCoForm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCoField($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCoFields();
				$obj2->addCoField($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoFieldPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFieldPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoFieldPeer::FORM_ID, CoFormPeer::ID);

		$rs = CoFieldPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFieldPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseCoFieldPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoFieldPeer::addSelectColumns($c);
		$startcol2 = (CoFieldPeer::NUM_COLUMNS - CoFieldPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CoFormPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CoFormPeer::NUM_COLUMNS;

		$c->addJoin(CoFieldPeer::FORM_ID, CoFormPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoFieldPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CoFormPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCoForm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCoField($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCoFields();
				$obj2->addCoField($obj1);
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
		return CoFieldPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFieldPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCoFieldPeer', $values, $con);
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

		$criteria->remove(CoFieldPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseCoFieldPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseCoFieldPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFieldPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCoFieldPeer', $values, $con);
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
			$comparison = $criteria->getComparison(CoFieldPeer::ID);
			$selectCriteria->add(CoFieldPeer::ID, $criteria->remove(CoFieldPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseCoFieldPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseCoFieldPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(CoFieldPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CoFieldPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CoField) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CoFieldPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CoField $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CoFieldPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CoFieldPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CoFieldPeer::DATABASE_NAME, CoFieldPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CoFieldPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CoFieldPeer::DATABASE_NAME);

		$criteria->add(CoFieldPeer::ID, $pk);


		$v = CoFieldPeer::doSelect($criteria, $con);

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
			$criteria->add(CoFieldPeer::ID, $pks, Criteria::IN);
			$objs = CoFieldPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCoFieldPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.CoFieldMapBuilder');
}
