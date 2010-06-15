<?php



class NetworkMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NetworkMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_soclian_connection');
		$tMap->setPhpName('Network');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 36);

		$tMap->addForeignKey('USER1_ID', 'User1Id', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('USER2_ID', 'User2Id', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

	} 
} 