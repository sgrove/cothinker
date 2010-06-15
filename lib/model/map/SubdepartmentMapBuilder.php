<?php



class SubdepartmentMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SubdepartmentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_subdepartment');
		$tMap->setPhpName('Subdepartment');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 36);

		$tMap->addForeignKey('DEPARTMENT_ID', 'DepartmentId', 'int', CreoleTypes::INTEGER, 'ct_department', 'ID', true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('ABBREVIATION', 'Abbreviation', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 