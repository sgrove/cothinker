<?php



class sfGuardUserProfileMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.sfGuardUserProfileMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('sf_guard_user_profile');
		$tMap->setPhpName('sfGuardUserProfile');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 36);

		$tMap->addForeignKey('CAMPUS_ID', 'CampusId', 'int', CreoleTypes::INTEGER, 'ct_campus', 'ID', true, null);

		$tMap->addForeignKey('DEPARTMENT_ID', 'DepartmentId', 'int', CreoleTypes::INTEGER, 'ct_department', 'ID', true, null);

		$tMap->addForeignKey('SUBDEPARTMENT_ID', 'SubdepartmentId', 'int', CreoleTypes::INTEGER, 'ct_subdepartment', 'ID', false, null);

		$tMap->addColumn('FIRST_NAME', 'FirstName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LAST_NAME', 'LastName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('GENDER', 'Gender', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ABOUT', 'About', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('PRIMARY_EMAIL', 'PrimaryEmail', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PICTURE', 'Picture', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('RATING', 'Rating', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('RATING_COUNT', 'RatingCount', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PRIVACY_LEVEL', 'PrivacyLevel', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PRIVATE_KEY', 'PrivateKey', 'string', CreoleTypes::VARCHAR, false, 36);

		$tMap->addColumn('KARMA', 'Karma', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('VERSION', 'Version', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('IS_APPROVED', 'IsApproved', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TOKEN', 'Token', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 