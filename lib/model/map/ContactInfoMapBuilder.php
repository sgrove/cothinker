<?php



class ContactInfoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ContactInfoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_contactinfo');
		$tMap->setPhpName('ContactInfo');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 36);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PHONE', 'Phone', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('ADDRESS1', 'Address1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ADDRESS2', 'Address2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STATE', 'State', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('POSTAL', 'Postal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PUBLISHED', 'Published', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PRIVACY_LEVEL', 'PrivacyLevel', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('VERSION', 'Version', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 