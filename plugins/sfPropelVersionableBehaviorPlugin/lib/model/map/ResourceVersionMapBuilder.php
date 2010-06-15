<?php



class ResourceVersionMapBuilder {

	
	const CLASS_NAME = 'plugins.sfPropelVersionableBehaviorPlugin.lib.model.map.ResourceVersionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('resource_version');
		$tMap->setPhpName('ResourceVersion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('RESOURCE_ID', 'ResourceId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('RESOURCE_NAME', 'ResourceName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('NUMBER', 'Number', 'int', CreoleTypes::INTEGER, false, 11);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('RESOURCE_VERSION_ID', 'ResourceVersionId', 'int', CreoleTypes::INTEGER, 'resource_version', 'ID', false, 11);

	} 
} 