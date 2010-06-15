<?php


abstract class BaseProjectFormPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_project_form';

	
	const CLASS_DEFAULT = 'lib.model.ProjectForm';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_project_form.ID';

	
	const PROJECT_ID = 'ct_project_form.PROJECT_ID';

	
	const UUID = 'ct_project_form.UUID';

	
	const TITLE = 'ct_project_form.TITLE';

	
	const SETTING = 'ct_project_form.SETTING';

	
	const DESCRIPTION = 'ct_project_form.DESCRIPTION';

	
	const WIDGET_1 = 'ct_project_form.WIDGET_1';

	
	const WIGEST_1_SETTING = 'ct_project_form.WIGEST_1_SETTING';

	
	const WIDGET_2 = 'ct_project_form.WIDGET_2';

	
	const WIGEST_2_SETTING = 'ct_project_form.WIGEST_2_SETTING';

	
	const WIDGET_3 = 'ct_project_form.WIDGET_3';

	
	const WIGEST_3_SETTING = 'ct_project_form.WIGEST_3_SETTING';

	
	const WIDGET_4 = 'ct_project_form.WIDGET_4';

	
	const WIGEST_4_SETTING = 'ct_project_form.WIGEST_4_SETTING';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ProjectId', 'Uuid', 'Title', 'Setting', 'Description', 'Widget1', 'Wigest1Setting', 'Widget2', 'Wigest2Setting', 'Widget3', 'Wigest3Setting', 'Widget4', 'Wigest4Setting', ),
		BasePeer::TYPE_COLNAME => array (ProjectFormPeer::ID, ProjectFormPeer::PROJECT_ID, ProjectFormPeer::UUID, ProjectFormPeer::TITLE, ProjectFormPeer::SETTING, ProjectFormPeer::DESCRIPTION, ProjectFormPeer::WIDGET_1, ProjectFormPeer::WIGEST_1_SETTING, ProjectFormPeer::WIDGET_2, ProjectFormPeer::WIGEST_2_SETTING, ProjectFormPeer::WIDGET_3, ProjectFormPeer::WIGEST_3_SETTING, ProjectFormPeer::WIDGET_4, ProjectFormPeer::WIGEST_4_SETTING, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'project_id', 'uuid', 'title', 'setting', 'description', 'widget_1', 'wigest_1_setting', 'widget_2', 'wigest_2_setting', 'widget_3', 'wigest_3_setting', 'widget_4', 'wigest_4_setting', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ProjectId' => 1, 'Uuid' => 2, 'Title' => 3, 'Setting' => 4, 'Description' => 5, 'Widget1' => 6, 'Wigest1Setting' => 7, 'Widget2' => 8, 'Wigest2Setting' => 9, 'Widget3' => 10, 'Wigest3Setting' => 11, 'Widget4' => 12, 'Wigest4Setting' => 13, ),
		BasePeer::TYPE_COLNAME => array (ProjectFormPeer::ID => 0, ProjectFormPeer::PROJECT_ID => 1, ProjectFormPeer::UUID => 2, ProjectFormPeer::TITLE => 3, ProjectFormPeer::SETTING => 4, ProjectFormPeer::DESCRIPTION => 5, ProjectFormPeer::WIDGET_1 => 6, ProjectFormPeer::WIGEST_1_SETTING => 7, ProjectFormPeer::WIDGET_2 => 8, ProjectFormPeer::WIGEST_2_SETTING => 9, ProjectFormPeer::WIDGET_3 => 10, ProjectFormPeer::WIGEST_3_SETTING => 11, ProjectFormPeer::WIDGET_4 => 12, ProjectFormPeer::WIGEST_4_SETTING => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'project_id' => 1, 'uuid' => 2, 'title' => 3, 'setting' => 4, 'description' => 5, 'widget_1' => 6, 'wigest_1_setting' => 7, 'widget_2' => 8, 'wigest_2_setting' => 9, 'widget_3' => 10, 'wigest_3_setting' => 11, 'widget_4' => 12, 'wigest_4_setting' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ProjectFormMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ProjectFormPeer::getTableMap();
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
		return str_replace(ProjectFormPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ProjectFormPeer::ID);

		$criteria->addSelectColumn(ProjectFormPeer::PROJECT_ID);

		$criteria->addSelectColumn(ProjectFormPeer::UUID);

		$criteria->addSelectColumn(ProjectFormPeer::TITLE);

		$criteria->addSelectColumn(ProjectFormPeer::SETTING);

		$criteria->addSelectColumn(ProjectFormPeer::DESCRIPTION);

		$criteria->addSelectColumn(ProjectFormPeer::WIDGET_1);

		$criteria->addSelectColumn(ProjectFormPeer::WIGEST_1_SETTING);

		$criteria->addSelectColumn(ProjectFormPeer::WIDGET_2);

		$criteria->addSelectColumn(ProjectFormPeer::WIGEST_2_SETTING);

		$criteria->addSelectColumn(ProjectFormPeer::WIDGET_3);

		$criteria->addSelectColumn(ProjectFormPeer::WIGEST_3_SETTING);

		$criteria->addSelectColumn(ProjectFormPeer::WIDGET_4);

		$criteria->addSelectColumn(ProjectFormPeer::WIGEST_4_SETTING);

	}

	const COUNT = 'COUNT(ct_project_form.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_project_form.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectFormPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectFormPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ProjectFormPeer::doSelectRS($criteria, $con);
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
		$objects = ProjectFormPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ProjectFormPeer::populateObjects(ProjectFormPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectFormPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseProjectFormPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ProjectFormPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ProjectFormPeer::getOMClass();
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
			$criteria->addSelectColumn(ProjectFormPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectFormPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectFormPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = ProjectFormPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinProject(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectFormPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseProjectFormPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectFormPeer::addSelectColumns($c);
		$startcol = (ProjectFormPeer::NUM_COLUMNS - ProjectFormPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(ProjectFormPeer::PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectFormPeer::getOMClass();

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
										$temp_obj2->addProjectForm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectForms();
				$obj2->addProjectForm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectFormPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectFormPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectFormPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = ProjectFormPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectFormPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseProjectFormPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectFormPeer::addSelectColumns($c);
		$startcol2 = (ProjectFormPeer::NUM_COLUMNS - ProjectFormPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(ProjectFormPeer::PROJECT_ID, ProjectPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectFormPeer::getOMClass();


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
					$temp_obj2->addProjectForm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initProjectForms();
				$obj2->addProjectForm($obj1);
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
		return ProjectFormPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectFormPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectFormPeer', $values, $con);
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

		$criteria->remove(ProjectFormPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseProjectFormPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectFormPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectFormPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectFormPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ProjectFormPeer::ID);
			$selectCriteria->add(ProjectFormPeer::ID, $criteria->remove(ProjectFormPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseProjectFormPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectFormPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ProjectFormPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ProjectFormPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ProjectForm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProjectFormPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ProjectForm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProjectFormPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProjectFormPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ProjectFormPeer::DATABASE_NAME, ProjectFormPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ProjectFormPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ProjectFormPeer::DATABASE_NAME);

		$criteria->add(ProjectFormPeer::ID, $pk);


		$v = ProjectFormPeer::doSelect($criteria, $con);

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
			$criteria->add(ProjectFormPeer::ID, $pks, Criteria::IN);
			$objs = ProjectFormPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseProjectFormPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ProjectFormMapBuilder');
}
