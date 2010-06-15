<?php


abstract class BaseProjectPositionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_project_position';

	
	const CLASS_DEFAULT = 'lib.model.ProjectPosition';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_project_position.ID';

	
	const UUID = 'ct_project_position.UUID';

	
	const PROJECT_ID = 'ct_project_position.PROJECT_ID';

	
	const USER_ID = 'ct_project_position.USER_ID';

	
	const TITLE = 'ct_project_position.TITLE';

	
	const QUALIFICATIONS = 'ct_project_position.QUALIFICATIONS';

	
	const DESCRIPTION = 'ct_project_position.DESCRIPTION';

	
	const DEADLINE = 'ct_project_position.DEADLINE';

	
	const WEEKLY_HOURS = 'ct_project_position.WEEKLY_HOURS';

	
	const STATUS = 'ct_project_position.STATUS';

	
	const FILLED = 'ct_project_position.FILLED';

	
	const MILESTONE_COUNT = 'ct_project_position.MILESTONE_COUNT';

	
	const CAMPUS_PREFERENCE = 'ct_project_position.CAMPUS_PREFERENCE';

	
	const UPDATED_AT = 'ct_project_position.UPDATED_AT';

	
	const DELETED_AT = 'ct_project_position.DELETED_AT';

	
	const CREATED_AT = 'ct_project_position.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'ProjectId', 'UserId', 'Title', 'Qualifications', 'Description', 'Deadline', 'WeeklyHours', 'Status', 'Filled', 'MilestoneCount', 'CampusPreference', 'UpdatedAt', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (ProjectPositionPeer::ID, ProjectPositionPeer::UUID, ProjectPositionPeer::PROJECT_ID, ProjectPositionPeer::USER_ID, ProjectPositionPeer::TITLE, ProjectPositionPeer::QUALIFICATIONS, ProjectPositionPeer::DESCRIPTION, ProjectPositionPeer::DEADLINE, ProjectPositionPeer::WEEKLY_HOURS, ProjectPositionPeer::STATUS, ProjectPositionPeer::FILLED, ProjectPositionPeer::MILESTONE_COUNT, ProjectPositionPeer::CAMPUS_PREFERENCE, ProjectPositionPeer::UPDATED_AT, ProjectPositionPeer::DELETED_AT, ProjectPositionPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'project_id', 'user_id', 'title', 'qualifications', 'description', 'deadline', 'weekly_hours', 'status', 'filled', 'milestone_count', 'campus_preference', 'updated_at', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'ProjectId' => 2, 'UserId' => 3, 'Title' => 4, 'Qualifications' => 5, 'Description' => 6, 'Deadline' => 7, 'WeeklyHours' => 8, 'Status' => 9, 'Filled' => 10, 'MilestoneCount' => 11, 'CampusPreference' => 12, 'UpdatedAt' => 13, 'DeletedAt' => 14, 'CreatedAt' => 15, ),
		BasePeer::TYPE_COLNAME => array (ProjectPositionPeer::ID => 0, ProjectPositionPeer::UUID => 1, ProjectPositionPeer::PROJECT_ID => 2, ProjectPositionPeer::USER_ID => 3, ProjectPositionPeer::TITLE => 4, ProjectPositionPeer::QUALIFICATIONS => 5, ProjectPositionPeer::DESCRIPTION => 6, ProjectPositionPeer::DEADLINE => 7, ProjectPositionPeer::WEEKLY_HOURS => 8, ProjectPositionPeer::STATUS => 9, ProjectPositionPeer::FILLED => 10, ProjectPositionPeer::MILESTONE_COUNT => 11, ProjectPositionPeer::CAMPUS_PREFERENCE => 12, ProjectPositionPeer::UPDATED_AT => 13, ProjectPositionPeer::DELETED_AT => 14, ProjectPositionPeer::CREATED_AT => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'project_id' => 2, 'user_id' => 3, 'title' => 4, 'qualifications' => 5, 'description' => 6, 'deadline' => 7, 'weekly_hours' => 8, 'status' => 9, 'filled' => 10, 'milestone_count' => 11, 'campus_preference' => 12, 'updated_at' => 13, 'deleted_at' => 14, 'created_at' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ProjectPositionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ProjectPositionPeer::getTableMap();
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
		return str_replace(ProjectPositionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ProjectPositionPeer::ID);

		$criteria->addSelectColumn(ProjectPositionPeer::UUID);

		$criteria->addSelectColumn(ProjectPositionPeer::PROJECT_ID);

		$criteria->addSelectColumn(ProjectPositionPeer::USER_ID);

		$criteria->addSelectColumn(ProjectPositionPeer::TITLE);

		$criteria->addSelectColumn(ProjectPositionPeer::QUALIFICATIONS);

		$criteria->addSelectColumn(ProjectPositionPeer::DESCRIPTION);

		$criteria->addSelectColumn(ProjectPositionPeer::DEADLINE);

		$criteria->addSelectColumn(ProjectPositionPeer::WEEKLY_HOURS);

		$criteria->addSelectColumn(ProjectPositionPeer::STATUS);

		$criteria->addSelectColumn(ProjectPositionPeer::FILLED);

		$criteria->addSelectColumn(ProjectPositionPeer::MILESTONE_COUNT);

		$criteria->addSelectColumn(ProjectPositionPeer::CAMPUS_PREFERENCE);

		$criteria->addSelectColumn(ProjectPositionPeer::UPDATED_AT);

		$criteria->addSelectColumn(ProjectPositionPeer::DELETED_AT);

		$criteria->addSelectColumn(ProjectPositionPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_project_position.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_project_position.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ProjectPositionPeer::doSelectRS($criteria, $con);
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
		$objects = ProjectPositionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ProjectPositionPeer::populateObjects(ProjectPositionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ProjectPositionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ProjectPositionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPositionPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = ProjectPositionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPositionPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ProjectPositionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCampus(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPositionPeer::CAMPUS_PREFERENCE, CampusPeer::ID);

		$rs = ProjectPositionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinProject(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPositionPeer::addSelectColumns($c);
		$startcol = (ProjectPositionPeer::NUM_COLUMNS - ProjectPositionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(ProjectPositionPeer::PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPositionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addProjectPosition($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectPositions();
				$obj2->addProjectPosition($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPositionPeer::addSelectColumns($c);
		$startcol = (ProjectPositionPeer::NUM_COLUMNS - ProjectPositionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectPositionPeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPositionPeer::getOMClass();

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
										$temp_obj2->addProjectPosition($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectPositions();
				$obj2->addProjectPosition($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCampus(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPositionPeer::addSelectColumns($c);
		$startcol = (ProjectPositionPeer::NUM_COLUMNS - ProjectPositionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CampusPeer::addSelectColumns($c);

		$c->addJoin(ProjectPositionPeer::CAMPUS_PREFERENCE, CampusPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPositionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CampusPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCampus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addProjectPosition($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectPositions();
				$obj2->addProjectPosition($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPositionPeer::PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ProjectPositionPeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPositionPeer::CAMPUS_PREFERENCE, CampusPeer::ID);

		$rs = ProjectPositionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPositionPeer::addSelectColumns($c);
		$startcol2 = (ProjectPositionPeer::NUM_COLUMNS - ProjectPositionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPositionPeer::PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ProjectPositionPeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPositionPeer::CAMPUS_PREFERENCE, CampusPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPositionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProjectPosition($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectPositions();
				$obj2->addProjectPosition($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProjectPosition($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectPositions();
				$obj3->addProjectPosition($obj1);
			}


					
			$omClass = CampusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCampus(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProjectPosition($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initProjectPositions();
				$obj4->addProjectPosition($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPositionPeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPositionPeer::CAMPUS_PREFERENCE, CampusPeer::ID);

		$rs = ProjectPositionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPositionPeer::PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ProjectPositionPeer::CAMPUS_PREFERENCE, CampusPeer::ID);

		$rs = ProjectPositionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCampus(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPositionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPositionPeer::PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ProjectPositionPeer::USER_ID, sfGuardUserPeer::ID);

		$rs = ProjectPositionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptProject(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPositionPeer::addSelectColumns($c);
		$startcol2 = (ProjectPositionPeer::NUM_COLUMNS - ProjectPositionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPositionPeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPositionPeer::CAMPUS_PREFERENCE, CampusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPositionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProjectPosition($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectPositions();
				$obj2->addProjectPosition($obj1);
			}

			$omClass = CampusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCampus(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProjectPosition($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectPositions();
				$obj3->addProjectPosition($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPositionPeer::addSelectColumns($c);
		$startcol2 = (ProjectPositionPeer::NUM_COLUMNS - ProjectPositionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPositionPeer::PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ProjectPositionPeer::CAMPUS_PREFERENCE, CampusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPositionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProjectPosition($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectPositions();
				$obj2->addProjectPosition($obj1);
			}

			$omClass = CampusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCampus(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProjectPosition($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectPositions();
				$obj3->addProjectPosition($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCampus(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPositionPeer::addSelectColumns($c);
		$startcol2 = (ProjectPositionPeer::NUM_COLUMNS - ProjectPositionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPositionPeer::PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ProjectPositionPeer::USER_ID, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPositionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProjectPosition($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectPositions();
				$obj2->addProjectPosition($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProjectPosition($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectPositions();
				$obj3->addProjectPosition($obj1);
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
		return ProjectPositionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectPositionPeer', $values, $con);
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

		$criteria->remove(ProjectPositionPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectPositionPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ProjectPositionPeer::ID);
			$selectCriteria->add(ProjectPositionPeer::ID, $criteria->remove(ProjectPositionPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseProjectPositionPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectPositionPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ProjectPositionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ProjectPositionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ProjectPosition) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProjectPositionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ProjectPosition $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProjectPositionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProjectPositionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ProjectPositionPeer::DATABASE_NAME, ProjectPositionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ProjectPositionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ProjectPositionPeer::DATABASE_NAME);

		$criteria->add(ProjectPositionPeer::ID, $pk);


		$v = ProjectPositionPeer::doSelect($criteria, $con);

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
			$criteria->add(ProjectPositionPeer::ID, $pks, Criteria::IN);
			$objs = ProjectPositionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseProjectPositionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ProjectPositionMapBuilder');
}
