<?php



class StarMapBuilder {

	
	const CLASS_NAME = 'plugins.sfPropelActAsStarredBehaviorPlugin.lib.model.map.StarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('star');
		$tMap->setPhpName('Star');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STARRED_MODEL', 'StarredModel', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('STARRED_ID', 'StarredId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 