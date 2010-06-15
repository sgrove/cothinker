<?php


abstract class BaseProjectPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_project';

	
	const CLASS_DEFAULT = 'lib.model.Project';

	
	const NUM_COLUMNS = 35;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_project.ID';

	
	const UUID = 'ct_project.UUID';

	
	const CREATED_BY = 'ct_project.CREATED_BY';

	
	const OWNER_ID = 'ct_project.OWNER_ID';

	
	const DEPARTMENT_ID = 'ct_project.DEPARTMENT_ID';

	
	const CAMPUS_ID = 'ct_project.CAMPUS_ID';

	
	const TITLE = 'ct_project.TITLE';

	
	const PICTURE = 'ct_project.PICTURE';

	
	const SLUG = 'ct_project.SLUG';

	
	const DESCRIPTION = 'ct_project.DESCRIPTION';

	
	const NOTES = 'ct_project.NOTES';

	
	const KEYWORDS = 'ct_project.KEYWORDS';

	
	const BEGIN = 'ct_project.BEGIN';

	
	const FINISH = 'ct_project.FINISH';

	
	const BUDGET = 'ct_project.BUDGET';

	
	const STATUS = 'ct_project.STATUS';

	
	const APPLICATIONS = 'ct_project.APPLICATIONS';

	
	const SEASON = 'ct_project.SEASON';

	
	const YEAR = 'ct_project.YEAR';

	
	const SCALE = 'ct_project.SCALE';

	
	const COMMITMENT = 'ct_project.COMMITMENT';

	
	const GOALS = 'ct_project.GOALS';

	
	const GOALS_COMPLETE = 'ct_project.GOALS_COMPLETE';

	
	const HOURS_WEEKLY = 'ct_project.HOURS_WEEKLY';

	
	const HOURS_TOTAL = 'ct_project.HOURS_TOTAL';

	
	const PUBLISHED = 'ct_project.PUBLISHED';

	
	const FLAGGED_AUP = 'ct_project.FLAGGED_AUP';

	
	const FLAGGED_HELP = 'ct_project.FLAGGED_HELP';

	
	const MAIN_FORM = 'ct_project.MAIN_FORM';

	
	const IS_APPROVED = 'ct_project.IS_APPROVED';

	
	const HITS = 'ct_project.HITS';

	
	const VERSION = 'ct_project.VERSION';

	
	const UPDATED_AT = 'ct_project.UPDATED_AT';

	
	const DELETED_AT = 'ct_project.DELETED_AT';

	
	const CREATED_AT = 'ct_project.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'CreatedBy', 'OwnerId', 'DepartmentId', 'CampusId', 'Title', 'Picture', 'Slug', 'Description', 'Notes', 'Keywords', 'Begin', 'Finish', 'Budget', 'Status', 'Applications', 'Season', 'Year', 'Scale', 'Commitment', 'Goals', 'GoalsComplete', 'HoursWeekly', 'HoursTotal', 'Published', 'FlaggedAup', 'FlaggedHelp', 'MainForm', 'IsApproved', 'Hits', 'Version', 'UpdatedAt', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (ProjectPeer::ID, ProjectPeer::UUID, ProjectPeer::CREATED_BY, ProjectPeer::OWNER_ID, ProjectPeer::DEPARTMENT_ID, ProjectPeer::CAMPUS_ID, ProjectPeer::TITLE, ProjectPeer::PICTURE, ProjectPeer::SLUG, ProjectPeer::DESCRIPTION, ProjectPeer::NOTES, ProjectPeer::KEYWORDS, ProjectPeer::BEGIN, ProjectPeer::FINISH, ProjectPeer::BUDGET, ProjectPeer::STATUS, ProjectPeer::APPLICATIONS, ProjectPeer::SEASON, ProjectPeer::YEAR, ProjectPeer::SCALE, ProjectPeer::COMMITMENT, ProjectPeer::GOALS, ProjectPeer::GOALS_COMPLETE, ProjectPeer::HOURS_WEEKLY, ProjectPeer::HOURS_TOTAL, ProjectPeer::PUBLISHED, ProjectPeer::FLAGGED_AUP, ProjectPeer::FLAGGED_HELP, ProjectPeer::MAIN_FORM, ProjectPeer::IS_APPROVED, ProjectPeer::HITS, ProjectPeer::VERSION, ProjectPeer::UPDATED_AT, ProjectPeer::DELETED_AT, ProjectPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'created_by', 'owner_id', 'department_id', 'campus_id', 'title', 'picture', 'slug', 'description', 'notes', 'keywords', 'begin', 'finish', 'budget', 'status', 'applications', 'season', 'year', 'scale', 'commitment', 'goals', 'goals_complete', 'hours_weekly', 'hours_total', 'published', 'flagged_aup', 'flagged_help', 'main_form', 'is_approved', 'hits', 'version', 'updated_at', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'CreatedBy' => 2, 'OwnerId' => 3, 'DepartmentId' => 4, 'CampusId' => 5, 'Title' => 6, 'Picture' => 7, 'Slug' => 8, 'Description' => 9, 'Notes' => 10, 'Keywords' => 11, 'Begin' => 12, 'Finish' => 13, 'Budget' => 14, 'Status' => 15, 'Applications' => 16, 'Season' => 17, 'Year' => 18, 'Scale' => 19, 'Commitment' => 20, 'Goals' => 21, 'GoalsComplete' => 22, 'HoursWeekly' => 23, 'HoursTotal' => 24, 'Published' => 25, 'FlaggedAup' => 26, 'FlaggedHelp' => 27, 'MainForm' => 28, 'IsApproved' => 29, 'Hits' => 30, 'Version' => 31, 'UpdatedAt' => 32, 'DeletedAt' => 33, 'CreatedAt' => 34, ),
		BasePeer::TYPE_COLNAME => array (ProjectPeer::ID => 0, ProjectPeer::UUID => 1, ProjectPeer::CREATED_BY => 2, ProjectPeer::OWNER_ID => 3, ProjectPeer::DEPARTMENT_ID => 4, ProjectPeer::CAMPUS_ID => 5, ProjectPeer::TITLE => 6, ProjectPeer::PICTURE => 7, ProjectPeer::SLUG => 8, ProjectPeer::DESCRIPTION => 9, ProjectPeer::NOTES => 10, ProjectPeer::KEYWORDS => 11, ProjectPeer::BEGIN => 12, ProjectPeer::FINISH => 13, ProjectPeer::BUDGET => 14, ProjectPeer::STATUS => 15, ProjectPeer::APPLICATIONS => 16, ProjectPeer::SEASON => 17, ProjectPeer::YEAR => 18, ProjectPeer::SCALE => 19, ProjectPeer::COMMITMENT => 20, ProjectPeer::GOALS => 21, ProjectPeer::GOALS_COMPLETE => 22, ProjectPeer::HOURS_WEEKLY => 23, ProjectPeer::HOURS_TOTAL => 24, ProjectPeer::PUBLISHED => 25, ProjectPeer::FLAGGED_AUP => 26, ProjectPeer::FLAGGED_HELP => 27, ProjectPeer::MAIN_FORM => 28, ProjectPeer::IS_APPROVED => 29, ProjectPeer::HITS => 30, ProjectPeer::VERSION => 31, ProjectPeer::UPDATED_AT => 32, ProjectPeer::DELETED_AT => 33, ProjectPeer::CREATED_AT => 34, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'created_by' => 2, 'owner_id' => 3, 'department_id' => 4, 'campus_id' => 5, 'title' => 6, 'picture' => 7, 'slug' => 8, 'description' => 9, 'notes' => 10, 'keywords' => 11, 'begin' => 12, 'finish' => 13, 'budget' => 14, 'status' => 15, 'applications' => 16, 'season' => 17, 'year' => 18, 'scale' => 19, 'commitment' => 20, 'goals' => 21, 'goals_complete' => 22, 'hours_weekly' => 23, 'hours_total' => 24, 'published' => 25, 'flagged_aup' => 26, 'flagged_help' => 27, 'main_form' => 28, 'is_approved' => 29, 'hits' => 30, 'version' => 31, 'updated_at' => 32, 'deleted_at' => 33, 'created_at' => 34, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ProjectMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ProjectPeer::getTableMap();
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
		return str_replace(ProjectPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ProjectPeer::ID);

		$criteria->addSelectColumn(ProjectPeer::UUID);

		$criteria->addSelectColumn(ProjectPeer::CREATED_BY);

		$criteria->addSelectColumn(ProjectPeer::OWNER_ID);

		$criteria->addSelectColumn(ProjectPeer::DEPARTMENT_ID);

		$criteria->addSelectColumn(ProjectPeer::CAMPUS_ID);

		$criteria->addSelectColumn(ProjectPeer::TITLE);

		$criteria->addSelectColumn(ProjectPeer::PICTURE);

		$criteria->addSelectColumn(ProjectPeer::SLUG);

		$criteria->addSelectColumn(ProjectPeer::DESCRIPTION);

		$criteria->addSelectColumn(ProjectPeer::NOTES);

		$criteria->addSelectColumn(ProjectPeer::KEYWORDS);

		$criteria->addSelectColumn(ProjectPeer::BEGIN);

		$criteria->addSelectColumn(ProjectPeer::FINISH);

		$criteria->addSelectColumn(ProjectPeer::BUDGET);

		$criteria->addSelectColumn(ProjectPeer::STATUS);

		$criteria->addSelectColumn(ProjectPeer::APPLICATIONS);

		$criteria->addSelectColumn(ProjectPeer::SEASON);

		$criteria->addSelectColumn(ProjectPeer::YEAR);

		$criteria->addSelectColumn(ProjectPeer::SCALE);

		$criteria->addSelectColumn(ProjectPeer::COMMITMENT);

		$criteria->addSelectColumn(ProjectPeer::GOALS);

		$criteria->addSelectColumn(ProjectPeer::GOALS_COMPLETE);

		$criteria->addSelectColumn(ProjectPeer::HOURS_WEEKLY);

		$criteria->addSelectColumn(ProjectPeer::HOURS_TOTAL);

		$criteria->addSelectColumn(ProjectPeer::PUBLISHED);

		$criteria->addSelectColumn(ProjectPeer::FLAGGED_AUP);

		$criteria->addSelectColumn(ProjectPeer::FLAGGED_HELP);

		$criteria->addSelectColumn(ProjectPeer::MAIN_FORM);

		$criteria->addSelectColumn(ProjectPeer::IS_APPROVED);

		$criteria->addSelectColumn(ProjectPeer::HITS);

		$criteria->addSelectColumn(ProjectPeer::VERSION);

		$criteria->addSelectColumn(ProjectPeer::UPDATED_AT);

		$criteria->addSelectColumn(ProjectPeer::DELETED_AT);

		$criteria->addSelectColumn(ProjectPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_project.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_project.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
		$objects = ProjectPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ProjectPeer::populateObjects(ProjectPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ProjectPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ProjectPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByOwnerId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDepartment(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addProjectRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectsRelatedByCreatedBy();
				$obj2->addProjectRelatedByCreatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByOwnerId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::OWNER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByOwnerId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addProjectRelatedByOwnerId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectsRelatedByOwnerId();
				$obj2->addProjectRelatedByOwnerId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DepartmentPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepartmentPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDepartment(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addProject($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCampus(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CampusPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

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
										$temp_obj2->addProject($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::OWNER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DepartmentPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::OWNER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();


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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProjectRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectsRelatedByCreatedBy();
				$obj2->addProjectRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByOwnerId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProjectRelatedByOwnerId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectsRelatedByOwnerId();
				$obj3->addProjectRelatedByOwnerId($obj1);
			}


					
			$omClass = DepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getDepartment(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProject($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initProjects();
				$obj4->addProject($obj1);
			}


					
			$omClass = CampusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCampus(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addProject($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initProjects();
				$obj5->addProject($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByOwnerId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptDepartment(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::OWNER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::OWNER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepartmentPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepartmentPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDepartment(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
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
					$temp_obj3->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByOwnerId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepartmentPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepartmentPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDepartment(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
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
					$temp_obj3->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::OWNER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::CAMPUS_ID, CampusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProjectRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectsRelatedByCreatedBy();
				$obj2->addProjectRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByOwnerId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProjectRelatedByOwnerId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectsRelatedByOwnerId();
				$obj3->addProjectRelatedByOwnerId($obj1);
			}

			$omClass = CampusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCampus(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjects();
				$obj4->addProject($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCampus(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DepartmentPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::OWNER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::DEPARTMENT_ID, DepartmentPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProjectRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectsRelatedByCreatedBy();
				$obj2->addProjectRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByOwnerId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProjectRelatedByOwnerId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectsRelatedByOwnerId();
				$obj3->addProjectRelatedByOwnerId($obj1);
			}

			$omClass = DepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getDepartment(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjects();
				$obj4->addProject($obj1);
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
		return ProjectPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectPeer', $values, $con);
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

		$criteria->remove(ProjectPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseProjectPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ProjectPeer::ID);
			$selectCriteria->add(ProjectPeer::ID, $criteria->remove(ProjectPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseProjectPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ProjectPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ProjectPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Project) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProjectPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Project $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProjectPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProjectPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ProjectPeer::DATABASE_NAME, ProjectPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ProjectPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ProjectPeer::DATABASE_NAME);

		$criteria->add(ProjectPeer::ID, $pk);


		$v = ProjectPeer::doSelect($criteria, $con);

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
			$criteria->add(ProjectPeer::ID, $pks, Criteria::IN);
			$objs = ProjectPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseProjectPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ProjectMapBuilder');
}
