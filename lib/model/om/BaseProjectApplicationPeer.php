<?php


abstract class BaseProjectApplicationPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_project_application';

	
	const CLASS_DEFAULT = 'lib.model.ProjectApplication';

	
	const NUM_COLUMNS = 48;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_project_application.ID';

	
	const UUID = 'ct_project_application.UUID';

	
	const CREATED_BY = 'ct_project_application.CREATED_BY';

	
	const OWNER_ID = 'ct_project_application.OWNER_ID';

	
	const DEPARTMENT_ID = 'ct_project_application.DEPARTMENT_ID';

	
	const CAMPUS_ID = 'ct_project_application.CAMPUS_ID';

	
	const TITLE = 'ct_project_application.TITLE';

	
	const PICTURE = 'ct_project_application.PICTURE';

	
	const SLUG = 'ct_project_application.SLUG';

	
	const DESCRIPTION = 'ct_project_application.DESCRIPTION';

	
	const NOTES = 'ct_project_application.NOTES';

	
	const COMMUNITY_BENEFITS = 'ct_project_application.COMMUNITY_BENEFITS';

	
	const STUDENT_REASONS = 'ct_project_application.STUDENT_REASONS';

	
	const KEYWORDS = 'ct_project_application.KEYWORDS';

	
	const BEGIN = 'ct_project_application.BEGIN';

	
	const FINISH = 'ct_project_application.FINISH';

	
	const BUDGET = 'ct_project_application.BUDGET';

	
	const STATUS = 'ct_project_application.STATUS';

	
	const APPLICATIONS = 'ct_project_application.APPLICATIONS';

	
	const SEASON = 'ct_project_application.SEASON';

	
	const LENGTH = 'ct_project_application.LENGTH';

	
	const PREFERRED_TERM_LENGTH = 'ct_project_application.PREFERRED_TERM_LENGTH';

	
	const YEAR = 'ct_project_application.YEAR';

	
	const SCALE = 'ct_project_application.SCALE';

	
	const COMMITMENT = 'ct_project_application.COMMITMENT';

	
	const GOALS = 'ct_project_application.GOALS';

	
	const GOALS_COMPLETE = 'ct_project_application.GOALS_COMPLETE';

	
	const HOURS_WEEKLY = 'ct_project_application.HOURS_WEEKLY';

	
	const HOURS_TOTAL = 'ct_project_application.HOURS_TOTAL';

	
	const PUBLISHED = 'ct_project_application.PUBLISHED';

	
	const FLAGGED_AUP = 'ct_project_application.FLAGGED_AUP';

	
	const FLAGGED_HELP = 'ct_project_application.FLAGGED_HELP';

	
	const PAGE1_COMPLETE = 'ct_project_application.PAGE1_COMPLETE';

	
	const PAGE2_COMPLETE = 'ct_project_application.PAGE2_COMPLETE';

	
	const PAGE3_COMPLETE = 'ct_project_application.PAGE3_COMPLETE';

	
	const PAGE4_COMPLETE = 'ct_project_application.PAGE4_COMPLETE';

	
	const LIABILITY = 'ct_project_application.LIABILITY';

	
	const LIABILITY_DETAILS = 'ct_project_application.LIABILITY_DETAILS';

	
	const PROFIT = 'ct_project_application.PROFIT';

	
	const PROFIT_DETAILS = 'ct_project_application.PROFIT_DETAILS';

	
	const IS_APPROVED = 'ct_project_application.IS_APPROVED';

	
	const POINTS = 'ct_project_application.POINTS';

	
	const APPROVED_BY = 'ct_project_application.APPROVED_BY';

	
	const HITS = 'ct_project_application.HITS';

	
	const VERSION = 'ct_project_application.VERSION';

	
	const UPDATED_AT = 'ct_project_application.UPDATED_AT';

	
	const DELETED_AT = 'ct_project_application.DELETED_AT';

	
	const CREATED_AT = 'ct_project_application.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'CreatedBy', 'OwnerId', 'DepartmentId', 'CampusId', 'Title', 'Picture', 'Slug', 'Description', 'Notes', 'CommunityBenefits', 'StudentReasons', 'Keywords', 'Begin', 'Finish', 'Budget', 'Status', 'Applications', 'Season', 'Length', 'PreferredTermLength', 'Year', 'Scale', 'Commitment', 'Goals', 'GoalsComplete', 'HoursWeekly', 'HoursTotal', 'Published', 'FlaggedAup', 'FlaggedHelp', 'Page1Complete', 'Page2Complete', 'Page3Complete', 'Page4Complete', 'Liability', 'LiabilityDetails', 'Profit', 'ProfitDetails', 'IsApproved', 'Points', 'ApprovedBy', 'Hits', 'Version', 'UpdatedAt', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (ProjectApplicationPeer::ID, ProjectApplicationPeer::UUID, ProjectApplicationPeer::CREATED_BY, ProjectApplicationPeer::OWNER_ID, ProjectApplicationPeer::DEPARTMENT_ID, ProjectApplicationPeer::CAMPUS_ID, ProjectApplicationPeer::TITLE, ProjectApplicationPeer::PICTURE, ProjectApplicationPeer::SLUG, ProjectApplicationPeer::DESCRIPTION, ProjectApplicationPeer::NOTES, ProjectApplicationPeer::COMMUNITY_BENEFITS, ProjectApplicationPeer::STUDENT_REASONS, ProjectApplicationPeer::KEYWORDS, ProjectApplicationPeer::BEGIN, ProjectApplicationPeer::FINISH, ProjectApplicationPeer::BUDGET, ProjectApplicationPeer::STATUS, ProjectApplicationPeer::APPLICATIONS, ProjectApplicationPeer::SEASON, ProjectApplicationPeer::LENGTH, ProjectApplicationPeer::PREFERRED_TERM_LENGTH, ProjectApplicationPeer::YEAR, ProjectApplicationPeer::SCALE, ProjectApplicationPeer::COMMITMENT, ProjectApplicationPeer::GOALS, ProjectApplicationPeer::GOALS_COMPLETE, ProjectApplicationPeer::HOURS_WEEKLY, ProjectApplicationPeer::HOURS_TOTAL, ProjectApplicationPeer::PUBLISHED, ProjectApplicationPeer::FLAGGED_AUP, ProjectApplicationPeer::FLAGGED_HELP, ProjectApplicationPeer::PAGE1_COMPLETE, ProjectApplicationPeer::PAGE2_COMPLETE, ProjectApplicationPeer::PAGE3_COMPLETE, ProjectApplicationPeer::PAGE4_COMPLETE, ProjectApplicationPeer::LIABILITY, ProjectApplicationPeer::LIABILITY_DETAILS, ProjectApplicationPeer::PROFIT, ProjectApplicationPeer::PROFIT_DETAILS, ProjectApplicationPeer::IS_APPROVED, ProjectApplicationPeer::POINTS, ProjectApplicationPeer::APPROVED_BY, ProjectApplicationPeer::HITS, ProjectApplicationPeer::VERSION, ProjectApplicationPeer::UPDATED_AT, ProjectApplicationPeer::DELETED_AT, ProjectApplicationPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'created_by', 'owner_id', 'department_id', 'campus_id', 'title', 'picture', 'slug', 'description', 'notes', 'community_benefits', 'student_reasons', 'keywords', 'begin', 'finish', 'budget', 'status', 'applications', 'season', 'length', 'preferred_term_length', 'year', 'scale', 'commitment', 'goals', 'goals_complete', 'hours_weekly', 'hours_total', 'published', 'flagged_aup', 'flagged_help', 'page1_complete', 'page2_complete', 'page3_complete', 'page4_complete', 'liability', 'liability_details', 'profit', 'profit_details', 'is_approved', 'points', 'approved_by', 'hits', 'version', 'updated_at', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'CreatedBy' => 2, 'OwnerId' => 3, 'DepartmentId' => 4, 'CampusId' => 5, 'Title' => 6, 'Picture' => 7, 'Slug' => 8, 'Description' => 9, 'Notes' => 10, 'CommunityBenefits' => 11, 'StudentReasons' => 12, 'Keywords' => 13, 'Begin' => 14, 'Finish' => 15, 'Budget' => 16, 'Status' => 17, 'Applications' => 18, 'Season' => 19, 'Length' => 20, 'PreferredTermLength' => 21, 'Year' => 22, 'Scale' => 23, 'Commitment' => 24, 'Goals' => 25, 'GoalsComplete' => 26, 'HoursWeekly' => 27, 'HoursTotal' => 28, 'Published' => 29, 'FlaggedAup' => 30, 'FlaggedHelp' => 31, 'Page1Complete' => 32, 'Page2Complete' => 33, 'Page3Complete' => 34, 'Page4Complete' => 35, 'Liability' => 36, 'LiabilityDetails' => 37, 'Profit' => 38, 'ProfitDetails' => 39, 'IsApproved' => 40, 'Points' => 41, 'ApprovedBy' => 42, 'Hits' => 43, 'Version' => 44, 'UpdatedAt' => 45, 'DeletedAt' => 46, 'CreatedAt' => 47, ),
		BasePeer::TYPE_COLNAME => array (ProjectApplicationPeer::ID => 0, ProjectApplicationPeer::UUID => 1, ProjectApplicationPeer::CREATED_BY => 2, ProjectApplicationPeer::OWNER_ID => 3, ProjectApplicationPeer::DEPARTMENT_ID => 4, ProjectApplicationPeer::CAMPUS_ID => 5, ProjectApplicationPeer::TITLE => 6, ProjectApplicationPeer::PICTURE => 7, ProjectApplicationPeer::SLUG => 8, ProjectApplicationPeer::DESCRIPTION => 9, ProjectApplicationPeer::NOTES => 10, ProjectApplicationPeer::COMMUNITY_BENEFITS => 11, ProjectApplicationPeer::STUDENT_REASONS => 12, ProjectApplicationPeer::KEYWORDS => 13, ProjectApplicationPeer::BEGIN => 14, ProjectApplicationPeer::FINISH => 15, ProjectApplicationPeer::BUDGET => 16, ProjectApplicationPeer::STATUS => 17, ProjectApplicationPeer::APPLICATIONS => 18, ProjectApplicationPeer::SEASON => 19, ProjectApplicationPeer::LENGTH => 20, ProjectApplicationPeer::PREFERRED_TERM_LENGTH => 21, ProjectApplicationPeer::YEAR => 22, ProjectApplicationPeer::SCALE => 23, ProjectApplicationPeer::COMMITMENT => 24, ProjectApplicationPeer::GOALS => 25, ProjectApplicationPeer::GOALS_COMPLETE => 26, ProjectApplicationPeer::HOURS_WEEKLY => 27, ProjectApplicationPeer::HOURS_TOTAL => 28, ProjectApplicationPeer::PUBLISHED => 29, ProjectApplicationPeer::FLAGGED_AUP => 30, ProjectApplicationPeer::FLAGGED_HELP => 31, ProjectApplicationPeer::PAGE1_COMPLETE => 32, ProjectApplicationPeer::PAGE2_COMPLETE => 33, ProjectApplicationPeer::PAGE3_COMPLETE => 34, ProjectApplicationPeer::PAGE4_COMPLETE => 35, ProjectApplicationPeer::LIABILITY => 36, ProjectApplicationPeer::LIABILITY_DETAILS => 37, ProjectApplicationPeer::PROFIT => 38, ProjectApplicationPeer::PROFIT_DETAILS => 39, ProjectApplicationPeer::IS_APPROVED => 40, ProjectApplicationPeer::POINTS => 41, ProjectApplicationPeer::APPROVED_BY => 42, ProjectApplicationPeer::HITS => 43, ProjectApplicationPeer::VERSION => 44, ProjectApplicationPeer::UPDATED_AT => 45, ProjectApplicationPeer::DELETED_AT => 46, ProjectApplicationPeer::CREATED_AT => 47, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'created_by' => 2, 'owner_id' => 3, 'department_id' => 4, 'campus_id' => 5, 'title' => 6, 'picture' => 7, 'slug' => 8, 'description' => 9, 'notes' => 10, 'community_benefits' => 11, 'student_reasons' => 12, 'keywords' => 13, 'begin' => 14, 'finish' => 15, 'budget' => 16, 'status' => 17, 'applications' => 18, 'season' => 19, 'length' => 20, 'preferred_term_length' => 21, 'year' => 22, 'scale' => 23, 'commitment' => 24, 'goals' => 25, 'goals_complete' => 26, 'hours_weekly' => 27, 'hours_total' => 28, 'published' => 29, 'flagged_aup' => 30, 'flagged_help' => 31, 'page1_complete' => 32, 'page2_complete' => 33, 'page3_complete' => 34, 'page4_complete' => 35, 'liability' => 36, 'liability_details' => 37, 'profit' => 38, 'profit_details' => 39, 'is_approved' => 40, 'points' => 41, 'approved_by' => 42, 'hits' => 43, 'version' => 44, 'updated_at' => 45, 'deleted_at' => 46, 'created_at' => 47, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ProjectApplicationMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ProjectApplicationPeer::getTableMap();
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
		return str_replace(ProjectApplicationPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ProjectApplicationPeer::ID);

		$criteria->addSelectColumn(ProjectApplicationPeer::UUID);

		$criteria->addSelectColumn(ProjectApplicationPeer::CREATED_BY);

		$criteria->addSelectColumn(ProjectApplicationPeer::OWNER_ID);

		$criteria->addSelectColumn(ProjectApplicationPeer::DEPARTMENT_ID);

		$criteria->addSelectColumn(ProjectApplicationPeer::CAMPUS_ID);

		$criteria->addSelectColumn(ProjectApplicationPeer::TITLE);

		$criteria->addSelectColumn(ProjectApplicationPeer::PICTURE);

		$criteria->addSelectColumn(ProjectApplicationPeer::SLUG);

		$criteria->addSelectColumn(ProjectApplicationPeer::DESCRIPTION);

		$criteria->addSelectColumn(ProjectApplicationPeer::NOTES);

		$criteria->addSelectColumn(ProjectApplicationPeer::COMMUNITY_BENEFITS);

		$criteria->addSelectColumn(ProjectApplicationPeer::STUDENT_REASONS);

		$criteria->addSelectColumn(ProjectApplicationPeer::KEYWORDS);

		$criteria->addSelectColumn(ProjectApplicationPeer::BEGIN);

		$criteria->addSelectColumn(ProjectApplicationPeer::FINISH);

		$criteria->addSelectColumn(ProjectApplicationPeer::BUDGET);

		$criteria->addSelectColumn(ProjectApplicationPeer::STATUS);

		$criteria->addSelectColumn(ProjectApplicationPeer::APPLICATIONS);

		$criteria->addSelectColumn(ProjectApplicationPeer::SEASON);

		$criteria->addSelectColumn(ProjectApplicationPeer::LENGTH);

		$criteria->addSelectColumn(ProjectApplicationPeer::PREFERRED_TERM_LENGTH);

		$criteria->addSelectColumn(ProjectApplicationPeer::YEAR);

		$criteria->addSelectColumn(ProjectApplicationPeer::SCALE);

		$criteria->addSelectColumn(ProjectApplicationPeer::COMMITMENT);

		$criteria->addSelectColumn(ProjectApplicationPeer::GOALS);

		$criteria->addSelectColumn(ProjectApplicationPeer::GOALS_COMPLETE);

		$criteria->addSelectColumn(ProjectApplicationPeer::HOURS_WEEKLY);

		$criteria->addSelectColumn(ProjectApplicationPeer::HOURS_TOTAL);

		$criteria->addSelectColumn(ProjectApplicationPeer::PUBLISHED);

		$criteria->addSelectColumn(ProjectApplicationPeer::FLAGGED_AUP);

		$criteria->addSelectColumn(ProjectApplicationPeer::FLAGGED_HELP);

		$criteria->addSelectColumn(ProjectApplicationPeer::PAGE1_COMPLETE);

		$criteria->addSelectColumn(ProjectApplicationPeer::PAGE2_COMPLETE);

		$criteria->addSelectColumn(ProjectApplicationPeer::PAGE3_COMPLETE);

		$criteria->addSelectColumn(ProjectApplicationPeer::PAGE4_COMPLETE);

		$criteria->addSelectColumn(ProjectApplicationPeer::LIABILITY);

		$criteria->addSelectColumn(ProjectApplicationPeer::LIABILITY_DETAILS);

		$criteria->addSelectColumn(ProjectApplicationPeer::PROFIT);

		$criteria->addSelectColumn(ProjectApplicationPeer::PROFIT_DETAILS);

		$criteria->addSelectColumn(ProjectApplicationPeer::IS_APPROVED);

		$criteria->addSelectColumn(ProjectApplicationPeer::POINTS);

		$criteria->addSelectColumn(ProjectApplicationPeer::APPROVED_BY);

		$criteria->addSelectColumn(ProjectApplicationPeer::HITS);

		$criteria->addSelectColumn(ProjectApplicationPeer::VERSION);

		$criteria->addSelectColumn(ProjectApplicationPeer::UPDATED_AT);

		$criteria->addSelectColumn(ProjectApplicationPeer::DELETED_AT);

		$criteria->addSelectColumn(ProjectApplicationPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_project_application.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_project_application.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
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
		$objects = ProjectApplicationPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ProjectApplicationPeer::populateObjects(ProjectApplicationPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ProjectApplicationPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ProjectApplicationPeer::getOMClass();
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
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectApplicationPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();

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
										$temp_obj2->addProjectApplicationRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectApplicationsRelatedByCreatedBy();
				$obj2->addProjectApplicationRelatedByCreatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByOwnerId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectApplicationPeer::OWNER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();

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
										$temp_obj2->addProjectApplicationRelatedByOwnerId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectApplicationsRelatedByOwnerId();
				$obj2->addProjectApplicationRelatedByOwnerId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DepartmentPeer::addSelectColumns($c);

		$c->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();

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
										$temp_obj2->addProjectApplication($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectApplications();
				$obj2->addProjectApplication($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCampus(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CampusPeer::addSelectColumns($c);

		$c->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();

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
										$temp_obj2->addProjectApplication($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectApplications();
				$obj2->addProjectApplication($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::OWNER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol2 = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DepartmentPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectApplicationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectApplicationPeer::OWNER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();


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
					$temp_obj2->addProjectApplicationRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectApplicationsRelatedByCreatedBy();
				$obj2->addProjectApplicationRelatedByCreatedBy($obj1);
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
					$temp_obj3->addProjectApplicationRelatedByOwnerId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectApplicationsRelatedByOwnerId();
				$obj3->addProjectApplicationRelatedByOwnerId($obj1);
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
					$temp_obj4->addProjectApplication($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initProjectApplications();
				$obj4->addProjectApplication($obj1);
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
					$temp_obj5->addProjectApplication($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initProjectApplications();
				$obj5->addProjectApplication($obj1);
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
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::OWNER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectApplicationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::OWNER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = ProjectApplicationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol2 = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepartmentPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepartmentPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();

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
					$temp_obj2->addProjectApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectApplications();
				$obj2->addProjectApplication($obj1);
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
					$temp_obj3->addProjectApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectApplications();
				$obj3->addProjectApplication($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByOwnerId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol2 = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepartmentPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepartmentPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();

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
					$temp_obj2->addProjectApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectApplications();
				$obj2->addProjectApplication($obj1);
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
					$temp_obj3->addProjectApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectApplications();
				$obj3->addProjectApplication($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol2 = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CampusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectApplicationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectApplicationPeer::OWNER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectApplicationPeer::CAMPUS_ID, CampusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();

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
					$temp_obj2->addProjectApplicationRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectApplicationsRelatedByCreatedBy();
				$obj2->addProjectApplicationRelatedByCreatedBy($obj1);
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
					$temp_obj3->addProjectApplicationRelatedByOwnerId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectApplicationsRelatedByOwnerId();
				$obj3->addProjectApplicationRelatedByOwnerId($obj1);
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
					$temp_obj4->addProjectApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjectApplications();
				$obj4->addProjectApplication($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCampus(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectApplicationPeer::addSelectColumns($c);
		$startcol2 = (ProjectApplicationPeer::NUM_COLUMNS - ProjectApplicationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DepartmentPeer::NUM_COLUMNS;

		$c->addJoin(ProjectApplicationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectApplicationPeer::OWNER_ID, sfGuardUserPeer::ID);

		$c->addJoin(ProjectApplicationPeer::DEPARTMENT_ID, DepartmentPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectApplicationPeer::getOMClass();

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
					$temp_obj2->addProjectApplicationRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectApplicationsRelatedByCreatedBy();
				$obj2->addProjectApplicationRelatedByCreatedBy($obj1);
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
					$temp_obj3->addProjectApplicationRelatedByOwnerId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjectApplicationsRelatedByOwnerId();
				$obj3->addProjectApplicationRelatedByOwnerId($obj1);
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
					$temp_obj4->addProjectApplication($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjectApplications();
				$obj4->addProjectApplication($obj1);
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
		return ProjectApplicationPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectApplicationPeer', $values, $con);
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

		$criteria->remove(ProjectApplicationPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectApplicationPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ProjectApplicationPeer::ID);
			$selectCriteria->add(ProjectApplicationPeer::ID, $criteria->remove(ProjectApplicationPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseProjectApplicationPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectApplicationPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ProjectApplicationPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ProjectApplicationPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ProjectApplication) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProjectApplicationPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ProjectApplication $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProjectApplicationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProjectApplicationPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ProjectApplicationPeer::DATABASE_NAME, ProjectApplicationPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ProjectApplicationPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ProjectApplicationPeer::DATABASE_NAME);

		$criteria->add(ProjectApplicationPeer::ID, $pk);


		$v = ProjectApplicationPeer::doSelect($criteria, $con);

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
			$criteria->add(ProjectApplicationPeer::ID, $pks, Criteria::IN);
			$objs = ProjectApplicationPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseProjectApplicationPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ProjectApplicationMapBuilder');
}
