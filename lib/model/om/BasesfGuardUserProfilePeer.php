<?php


abstract class BasesfGuardUserProfilePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_guard_user_profile';

	
	const CLASS_DEFAULT = 'lib.model.sfGuardUserProfile';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_guard_user_profile.ID';

	
	const USER_ID = 'sf_guard_user_profile.USER_ID';

	
	const UUID = 'sf_guard_user_profile.UUID';

	
	const CAMPUS_ID = 'sf_guard_user_profile.CAMPUS_ID';

	
	const DEPARTMENT_ID = 'sf_guard_user_profile.DEPARTMENT_ID';

	
	const SUBDEPARTMENT_ID = 'sf_guard_user_profile.SUBDEPARTMENT_ID';

	
	const FIRST_NAME = 'sf_guard_user_profile.FIRST_NAME';

	
	const LAST_NAME = 'sf_guard_user_profile.LAST_NAME';

	
	const TITLE = 'sf_guard_user_profile.TITLE';

	
	const GENDER = 'sf_guard_user_profile.GENDER';

	
	const ABOUT = 'sf_guard_user_profile.ABOUT';

	
	const PRIMARY_EMAIL = 'sf_guard_user_profile.PRIMARY_EMAIL';

	
	const PICTURE = 'sf_guard_user_profile.PICTURE';

	
	const RATING = 'sf_guard_user_profile.RATING';

	
	const RATING_COUNT = 'sf_guard_user_profile.RATING_COUNT';

	
	const PRIVACY_LEVEL = 'sf_guard_user_profile.PRIVACY_LEVEL';

	
	const PRIVATE_KEY = 'sf_guard_user_profile.PRIVATE_KEY';

	
	const KARMA = 'sf_guard_user_profile.KARMA';

	
	const VERSION = 'sf_guard_user_profile.VERSION';

	
	const IS_APPROVED = 'sf_guard_user_profile.IS_APPROVED';

	
	const TOKEN = 'sf_guard_user_profile.TOKEN';

	
	const UPDATED_AT = 'sf_guard_user_profile.UPDATED_AT';

	
	const DELETED_AT = 'sf_guard_user_profile.DELETED_AT';

	
	const CREATED_AT = 'sf_guard_user_profile.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'UserId', 'Uuid', 'CampusId', 'DepartmentId', 'SubdepartmentId', 'FirstName', 'LastName', 'Title', 'Gender', 'About', 'PrimaryEmail', 'Picture', 'Rating', 'RatingCount', 'PrivacyLevel', 'PrivateKey', 'Karma', 'Version', 'IsApproved', 'Token', 'UpdatedAt', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfGuardUserProfilePeer::ID, sfGuardUserProfilePeer::USER_ID, sfGuardUserProfilePeer::UUID, sfGuardUserProfilePeer::CAMPUS_ID, sfGuardUserProfilePeer::DEPARTMENT_ID, sfGuardUserProfilePeer::SUBDEPARTMENT_ID, sfGuardUserProfilePeer::FIRST_NAME, sfGuardUserProfilePeer::LAST_NAME, sfGuardUserProfilePeer::TITLE, sfGuardUserProfilePeer::GENDER, sfGuardUserProfilePeer::ABOUT, sfGuardUserProfilePeer::PRIMARY_EMAIL, sfGuardUserProfilePeer::PICTURE, sfGuardUserProfilePeer::RATING, sfGuardUserProfilePeer::RATING_COUNT, sfGuardUserProfilePeer::PRIVACY_LEVEL, sfGuardUserProfilePeer::PRIVATE_KEY, sfGuardUserProfilePeer::KARMA, sfGuardUserProfilePeer::VERSION, sfGuardUserProfilePeer::IS_APPROVED, sfGuardUserProfilePeer::TOKEN, sfGuardUserProfilePeer::UPDATED_AT, sfGuardUserProfilePeer::DELETED_AT, sfGuardUserProfilePeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'user_id', 'uuid', 'campus_id', 'department_id', 'subdepartment_id', 'first_name', 'last_name', 'title', 'gender', 'about', 'primary_email', 'picture', 'rating', 'rating_count', 'privacy_level', 'private_key', 'karma', 'version', 'is_approved', 'token', 'updated_at', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'UserId' => 1, 'Uuid' => 2, 'CampusId' => 3, 'DepartmentId' => 4, 'SubdepartmentId' => 5, 'FirstName' => 6, 'LastName' => 7, 'Title' => 8, 'Gender' => 9, 'About' => 10, 'PrimaryEmail' => 11, 'Picture' => 12, 'Rating' => 13, 'RatingCount' => 14, 'PrivacyLevel' => 15, 'PrivateKey' => 16, 'Karma' => 17, 'Version' => 18, 'IsApproved' => 19, 'Token' => 20, 'UpdatedAt' => 21, 'DeletedAt' => 22, 'CreatedAt' => 23, ),
		BasePeer::TYPE_COLNAME => array (sfGuardUserProfilePeer::ID => 0, sfGuardUserProfilePeer::USER_ID => 1, sfGuardUserProfilePeer::UUID => 2, sfGuardUserProfilePeer::CAMPUS_ID => 3, sfGuardUserProfilePeer::DEPARTMENT_ID => 4, sfGuardUserProfilePeer::SUBDEPARTMENT_ID => 5, sfGuardUserProfilePeer::FIRST_NAME => 6, sfGuardUserProfilePeer::LAST_NAME => 7, sfGuardUserProfilePeer::TITLE => 8, sfGuardUserProfilePeer::GENDER => 9, sfGuardUserProfilePeer::ABOUT => 10, sfGuardUserProfilePeer::PRIMARY_EMAIL => 11, sfGuardUserProfilePeer::PICTURE => 12, sfGuardUserProfilePeer::RATING => 13, sfGuardUserProfilePeer::RATING_COUNT => 14, sfGuardUserProfilePeer::PRIVACY_LEVEL => 15, sfGuardUserProfilePeer::PRIVATE_KEY => 16, sfGuardUserProfilePeer::KARMA => 17, sfGuardUserProfilePeer::VERSION => 18, sfGuardUserProfilePeer::IS_APPROVED => 19, sfGuardUserProfilePeer::TOKEN => 20, sfGuardUserProfilePeer::UPDATED_AT => 21, sfGuardUserProfilePeer::DELETED_AT => 22, sfGuardUserProfilePeer::CREATED_AT => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'user_id' => 1, 'uuid' => 2, 'campus_id' => 3, 'department_id' => 4, 'subdepartment_id' => 5, 'first_name' => 6, 'last_name' => 7, 'title' => 8, 'gender' => 9, 'about' => 10, 'primary_email' => 11, 'picture' => 12, 'rating' => 13, 'rating_count' => 14, 'privacy_level' => 15, 'private_key' => 16, 'karma' => 17, 'version' => 18, 'is_approved' => 19, 'token' => 20, 'updated_at' => 21, 'deleted_at' => 22, 'created_at' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.sfGuardUserProfileMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfGuardUserProfilePeer::getTableMap();
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
		return str_replace(sfGuardUserProfilePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfGuardUserProfilePeer::ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::USER_ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::UUID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::CAMPUS_ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::DEPARTMENT_ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::SUBDEPARTMENT_ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::FIRST_NAME);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::LAST_NAME);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::TITLE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::GENDER);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::ABOUT);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PRIMARY_EMAIL);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PICTURE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::RATING);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::RATING_COUNT);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PRIVACY_LEVEL);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PRIVATE_KEY);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::KARMA);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::VERSION);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::IS_APPROVED);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::TOKEN);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::UPDATED_AT);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::DELETED_AT);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::CREATED_AT);

	}

	const COUNT = 'COUNT(sf_guard_user_profile.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_guard_user_profile.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
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
		$objects = sfGuardUserProfilePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfGuardUserProfilePeer::populateObjects(sfGuardUserProfilePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfGuardUserProfilePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfGuardUserProfilePeer::getOMClass();
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
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinSubdepartment(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

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
										$temp_obj2->addsfGuardUserProfile($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCampus(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CampusPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

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
										$temp_obj2->addsfGuardUserProfile($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DepartmentPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

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
										$temp_obj2->addsfGuardUserProfile($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinSubdepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SubdepartmentPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SubdepartmentPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSubdepartment(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfGuardUserProfile($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DepartmentPeer::NUM_COLUMNS;

		SubdepartmentPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + SubdepartmentPeer::NUM_COLUMNS;

		$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();


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
					$temp_obj2->addsfGuardUserProfile($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1);
			}


					
			$omClass = CampusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCampus(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addsfGuardUserProfile($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initsfGuardUserProfiles();
				$obj3->addsfGuardUserProfile($obj1);
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
					$temp_obj4->addsfGuardUserProfile($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initsfGuardUserProfiles();
				$obj4->addsfGuardUserProfile($obj1);
			}


					
			$omClass = SubdepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getSubdepartment(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addsfGuardUserProfile($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initsfGuardUserProfiles();
				$obj5->addsfGuardUserProfile($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptSubdepartment(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$criteria->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CampusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CampusPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DepartmentPeer::NUM_COLUMNS;

		SubdepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + SubdepartmentPeer::NUM_COLUMNS;

		$c->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CampusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCampus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1);
			}

			$omClass = DepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDepartment(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initsfGuardUserProfiles();
				$obj3->addsfGuardUserProfile($obj1);
			}

			$omClass = SubdepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getSubdepartment(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initsfGuardUserProfiles();
				$obj4->addsfGuardUserProfile($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCampus(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DepartmentPeer::NUM_COLUMNS;

		SubdepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + SubdepartmentPeer::NUM_COLUMNS;

		$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

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
					$temp_obj2->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1);
			}

			$omClass = DepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDepartment(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initsfGuardUserProfiles();
				$obj3->addsfGuardUserProfile($obj1);
			}

			$omClass = SubdepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getSubdepartment(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initsfGuardUserProfiles();
				$obj4->addsfGuardUserProfile($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		SubdepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + SubdepartmentPeer::NUM_COLUMNS;

		$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, SubdepartmentPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

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
					$temp_obj2->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1);
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
					$temp_obj3->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initsfGuardUserProfiles();
				$obj3->addsfGuardUserProfile($obj1);
			}

			$omClass = SubdepartmentPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getSubdepartment(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initsfGuardUserProfiles();
				$obj4->addsfGuardUserProfile($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptSubdepartment(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		CampusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CampusPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DepartmentPeer::NUM_COLUMNS;

		$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::CAMPUS_ID, CampusPeer::ID);

		$c->addJoin(sfGuardUserProfilePeer::DEPARTMENT_ID, DepartmentPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

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
					$temp_obj2->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1);
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
					$temp_obj3->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initsfGuardUserProfiles();
				$obj3->addsfGuardUserProfile($obj1);
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
					$temp_obj4->addsfGuardUserProfile($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initsfGuardUserProfiles();
				$obj4->addsfGuardUserProfile($obj1);
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
		return sfGuardUserProfilePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardUserProfilePeer', $values, $con);
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

		$criteria->remove(sfGuardUserProfilePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardUserProfilePeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfGuardUserProfilePeer::ID);
			$selectCriteria->add(sfGuardUserProfilePeer::ID, $criteria->remove(sfGuardUserProfilePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfGuardUserProfilePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserProfilePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfGuardUserProfilePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfGuardUserProfile) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfGuardUserProfilePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfGuardUserProfile $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfGuardUserProfilePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfGuardUserProfilePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfGuardUserProfilePeer::DATABASE_NAME, sfGuardUserProfilePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfGuardUserProfilePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		$criteria->add(sfGuardUserProfilePeer::ID, $pk);


		$v = sfGuardUserProfilePeer::doSelect($criteria, $con);

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
			$criteria->add(sfGuardUserProfilePeer::ID, $pks, Criteria::IN);
			$objs = sfGuardUserProfilePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfGuardUserProfilePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.sfGuardUserProfileMapBuilder');
}
