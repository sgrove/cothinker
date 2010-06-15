<?php



class sfErrorLogMapBuilder {

	
	const CLASS_NAME = 'plugins.sfErrorLoggerPlugin.lib.model.map.sfErrorLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_error_log');
		$tMap->setPhpName('sfErrorLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CLASS_NAME', 'ClassName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MESSAGE', 'Message', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('MODULE_NAME', 'ModuleName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ACTION_NAME', 'ActionName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EXCEPTION_OBJECT', 'ExceptionObject', 'string', CreoleTypes::CLOB, false, null);

		$tMap->addColumn('REQUEST', 'Request', 'string', CreoleTypes::CLOB, false, null);

		$tMap->addColumn('URI', 'Uri', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 