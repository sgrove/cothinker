<?php



class ExternalServiceMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ExternalServiceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_external_service');
		$tMap->setPhpName('ExternalService');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 36);

		$tMap->addColumn('TWITTER_USERNAME', 'TwitterUsername', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TWITTER_PASSWORD', 'TwitterPassword', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TWITTER_UPDATE', 'TwitterUpdate', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TWITTER_STATUS_UPDATE', 'TwitterStatusUpdate', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TWITTER_CONFIRMED', 'TwitterConfirmed', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FACEBOOK_ACCOUNT', 'FacebookAccount', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FACEBOOK_UPDATE', 'FacebookUpdate', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FACEBOOK_CONFIRMED', 'FacebookConfirmed', 'boolean', CreoleTypes::BOOLEAN, false, null);

	} 
} 