<?php



class sfSimpleForumOwnerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.sfSimpleForumOwnerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_simple_forum_owner_object');
		$tMap->setPhpName('sfSimpleForumOwner');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, false, 36);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MODEL', 'Model', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MODEL_ID', 'ModelId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('STANDALONE', 'Standalone', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 