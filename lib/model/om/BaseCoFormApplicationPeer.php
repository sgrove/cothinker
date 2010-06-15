<?php


abstract class BaseCoFormApplicationPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_form_application';

	
	const CLASS_DEFAULT = 'lib.model.CoFormApplication';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_form_application.ID';

	
	const UUID = 'ct_form_application.UUID';

	
	const FORM_ID = 'ct_form_application.FORM_ID';

	
	const POSITION_ID = 'ct_form_application.POSITION_ID';

	
	const NAME = 'ct_form_application.NAME';

	
	const SLUG = 'ct_form_application.SLUG';

	
	const DESCRIPTION = 'ct_form_application.DESCRIPTION';

	
	const STATUS = 'ct_form_application.STATUS';

	
	const TYPE = 'ct_form_application.TYPE';

	
	const CREATED_AT = 'ct_form_application.CREATED_AT';

	
	const DELETED_AT = 'ct_form_application.DELETED_AT';

	
	const UPDATED_AT = 'ct_form_application.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'FormId', 'PositionId', 'Name', 'Slug', 'Description', 'Status', 'Type', 'CreatedAt', 'DeletedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (CoFormApplicationPeer::ID, CoFormApplicationPeer::UUID, CoFormApplicationPeer::FORM_ID, CoFormApplicationPeer::POSITION_ID, CoFormApplicationPeer::NAME, CoFormApplicationPeer::SLUG, CoFormApplicationPeer::DESCRIPTION, CoFormApplicationPeer::STATUS, CoFormApplicationPeer::TYPE, CoFormApplicationPeer::CREATED_AT, CoFormApplicationPeer::DELETED_AT, CoFormApplicationPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'form_id', 'position_id', 'name', 'slug', 'description', 'status', 'type', 'created_at', 'deleted_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'FormId' => 2, 'PositionId' => 3, 'Name' => 4, 'Slug' => 5, 'Description' => 6, 'Status' => 7, 'Type' => 8, 'CreatedAt' => 9, 'DeletedAt' => 10, 'UpdatedAt' => 11, ),
		BasePeer::TYPE_COLNAME => array (CoFormApplicationPeer::ID => 0, CoFormApplicationPeer::UUID => 1, CoFormApplicationPeer::FORM_ID => 2, CoFormApplicationPeer::POSITION_ID => 3, CoFormApplicationPeer::NAME => 4, CoFormApplicationPeer::SLUG => 5, CoFormApplicationPeer::DESCRIPTION => 6, CoFormApplicationPeer::STATUS => 7, CoFormApplicationPeer::TYPE => 8, CoFormApplicationPeer::CREATED_AT => 9, CoFormApplicationPeer::DELETED_AT => 10, CoFormApplicationPeer::UPDATED_AT => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'form_id' => 2, 'position_id' => 3, 'name' => 4, 'slug' => 5, 'description' => 6, 'status' => 7, 'type' => 8, 'created_at' => 9, 'deleted_at' => 10, 'updated_at' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.CoFormApplicationMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CoFormApplicationPeer::getTableMap();
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
		return str_replace(CoFormApplicationPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CoFormApplicationPeer::ID);

		$criteria->addSelectColumn(CoFormApplicationPeer::UUID);

		$criteria->addSelectColumn(CoFormApplicationPeer::FORM_ID);

		$criteria->addSelectColumn(CoFormApplicationPeer::POSITION_ID);

		$criteria->addSelectColumn(CoFormApplicationPeer::NAME);

		$criteria->addSelectColumn(CoFormApplicationPeer::SLUG);

		$criteria->addSelectColumn(CoFormApplicationPeer::DESCRIPTION);

		$criteria->addSelectColumn(CoFormApplicationPeer::STATUS);

		$criteria->addSelectColumn(CoFormApplicationPeer::TYPE);

		$criteria->addSelectColumn(CoFormApplicationPeer::CREATED_AT);

		$criteria->addSelectColumn(CoFormApplicationPeer::DELETED_AT);

		$criteria->addSelectColumn(CoFormApplicationPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ct_form_application.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_form_application.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CoFormApplicationPeer::doSelectRS($criteria, $con);
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
		$objects = CoFormApplicationPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CoFormApplicationPeer::populateObjects(CoFormApplicationPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseCoFormApplicationPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CoFormApplicationPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CoFormApplicationPeer::getOMClass();
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
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoFormApplicationPeer::FORM_ID, CoFormPeer::ID);

		$rs = CoFormApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProjectPosition(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoFormApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = CoFormApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCoForm(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseCoFormApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoFormApplicationPeer::addSelectColumns($c);
		$startcol = (CoFormApplicationPeer::NUM_COLUMNS - CoFormApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CoFormPeer::addSelectColumns($c);

		$c->addJoin(CoFormApplicationPeer::FORM_ID, CoFormPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoFormApplicationPeer::getOMClass();

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
										$temp_obj2->addCoFormApplication($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCoFormApplications();
				$obj2->addCoFormApplication($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProjectPosition(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseCoFormApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoFormApplicationPeer::addSelectColumns($c);
		$startcol = (CoFormApplicationPeer::NUM_COLUMNS - CoFormApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPositionPeer::addSelectColumns($c);

		$c->addJoin(CoFormApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoFormApplicationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPositionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProjectPosition(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCoFormApplication($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCoFormApplications();
				$obj2->addCoFormApplication($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoFormApplicationPeer::FORM_ID, CoFormPeer::ID);

		$criteria->addJoin(CoFormApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = CoFormApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseCoFormApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoFormApplicationPeer::addSelectColumns($c);
		$startcol2 = (CoFormApplicationPeer::NUM_COLUMNS - CoFormApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CoFormPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CoFormPeer::NUM_COLUMNS;

		ProjectPositionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPositionPeer::NUM_COLUMNS;

		$c->addJoin(CoFormApplicationPeer::FORM_ID, CoFormPeer::ID);

		$c->addJoin(CoFormApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoFormApplicationPeer::getOMClass();


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
					$temp_obj2->addCoFormApplication($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCoFormApplications();
				$obj2->addCoFormApplication($obj1);
			}


					
			$omClass = ProjectPositionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectPosition(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCoFormApplication($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCoFormApplications();
				$obj3->addCoFormApplication($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCoForm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoFormApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);

		$rs = CoFormApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProjectPosition(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CoFormApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CoFormApplicationPeer::FORM_ID, CoFormPeer::ID);

		$rs = CoFormApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCoForm(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseCoFormApplicationPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoFormApplicationPeer::addSelectColumns($c);
		$startcol2 = (CoFormApplicationPeer::NUM_COLUMNS - CoFormApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPositionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPositionPeer::NUM_COLUMNS;

		$c->addJoin(CoFormApplicationPeer::POSITION_ID, ProjectPositionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoFormApplicationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPositionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProjectPosition(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCoFormApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCoFormApplications();
				$obj2->addCoFormApplication($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProjectPosition(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseCoFormApplicationPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CoFormApplicationPeer::addSelectColumns($c);
		$startcol2 = (CoFormApplicationPeer::NUM_COLUMNS - CoFormApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CoFormPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CoFormPeer::NUM_COLUMNS;

		$c->addJoin(CoFormApplicationPeer::FORM_ID, CoFormPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CoFormApplicationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CoFormPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCoForm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCoFormApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCoFormApplications();
				$obj2->addCoFormApplication($obj1);
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
		return CoFormApplicationPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCoFormApplicationPeer', $values, $con);
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

		$criteria->remove(CoFormApplicationPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseCoFormApplicationPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCoFormApplicationPeer', $values, $con);
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
			$comparison = $criteria->getComparison(CoFormApplicationPeer::ID);
			$selectCriteria->add(CoFormApplicationPeer::ID, $criteria->remove(CoFormApplicationPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseCoFormApplicationPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseCoFormApplicationPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(CoFormApplicationPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CoFormApplicationPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CoFormApplication) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CoFormApplicationPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CoFormApplication $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CoFormApplicationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CoFormApplicationPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CoFormApplicationPeer::DATABASE_NAME, CoFormApplicationPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CoFormApplicationPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CoFormApplicationPeer::DATABASE_NAME);

		$criteria->add(CoFormApplicationPeer::ID, $pk);


		$v = CoFormApplicationPeer::doSelect($criteria, $con);

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
			$criteria->add(CoFormApplicationPeer::ID, $pks, Criteria::IN);
			$objs = CoFormApplicationPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCoFormApplicationPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.CoFormApplicationMapBuilder');
}
