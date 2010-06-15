<?php



class CampusMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CampusMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_campus');
		$tMap->setPhpName('Campus');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 36);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('ADDRESS', 'Address', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STATE', 'State', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ZIP', 'Zip', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('URL', 'Url', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PHONE', 'Phone', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('ABOUT', 'About', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('VERSION', 'Version', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 